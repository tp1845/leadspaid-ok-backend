<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PricePlan extends Model
{
   protected $guarded = [];
  
   public function advertiser()
    {
        return $this->belongsToMany(Advertiser::class,'advertiser_plans');
    }
}
