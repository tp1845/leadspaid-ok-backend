<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreateAd extends Model
{
    protected $guarded = [];


    public function advertiser()
    {
        return $this->belongsTo(Advertiser::class,'advertiser_id');
    }

    public function type()
    {
        return $this->belongsTo(AdType::class,'ad_type_id');
    }
    
    public function publishers()
    {
        return $this->belongsToMany(Publisher::class,'publisher_ads');
    }

    public function analytic()
    {
        return $this->hasMany(Analytic::class,'ad_id');
    }
    public function scopeAd($adType)
    {
        return $this->where('ad_type_id', $adType)->whereStatus(1)->whereGlobal(1)->inRandomOrder()->first();
    }

    public function publisherAd()
    {
        return $this->hasMany(PublisherAd::class,'create_ad_id');
    }

    protected $casts = [
        't_country' => 'object',
        'keywords' => 'object'
    ];
}
