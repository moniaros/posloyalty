<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model {

    public function scopeNewData($query, $lastUpdateDate) {
        return $query->where("updated_at", ">", $lastUpdateDate);
    }
    
    public function product() {
        return $this->belongsTo('App\Product', 'condition_product_id');
    }

}
