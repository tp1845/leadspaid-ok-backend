<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublisherAd extends Model
{
    protected $guarded = [];
    
    public function advertise()
    {
        return $this->belongsTo(CreateAd::class,'create_ad_id');
    }
}
