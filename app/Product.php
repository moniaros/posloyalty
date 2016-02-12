<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    public function scopeNewData($query, $lastUpdateDate) {
        return $query->where("updated_at", ">", $lastUpdateDate);
    }

}
