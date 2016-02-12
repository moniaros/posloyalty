<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model {

    protected $timestamps = false;

    public function products() {
        return $this->hasMany('App\SalesProducts');
    }

}
