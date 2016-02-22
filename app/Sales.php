<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model {

    public $timestamps = false;

    public function products() {
        return $this->hasMany('App\SalesProduct');
    }

    public function store() {
        return $this->belongsTo('App\Store');
    }

    public function customer() {
        return $this->belongsTo('App\Customer');
    }

}
