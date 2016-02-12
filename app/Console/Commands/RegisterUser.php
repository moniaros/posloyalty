<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Console\Command;
use Illuminate\Contracts\Bus\SelfHandling;

class RegisterUser extends Command implements SelfHandling {

    protected $name = 'pos:register-user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle() {

        $user = new User();

        $user->email = $this->ask('Email');
        $user->name  = $this->ask('Name');

        $rawPassword = $this->ask('password');
        $password    = Hash::make($rawPassword);

        $user->password  = $password;
        $user->is_active = User::ACTIVE;

        try {
            $user->save();
            $this->info("User saved with id {$user->id}");
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }

}
