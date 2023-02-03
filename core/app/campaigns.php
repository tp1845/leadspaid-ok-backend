<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class campaigns extends Model
{
    protected $casts = [ 'target_placements' => 'array', 'target_categories' => 'array' ];
    protected $guarded = [];
    public function advertiser()
    {
        return $this->belongsTo(Advertiser::class,'advertiser_id');
    }
    public function campaign_forms()
    {
        return $this->belongsTo(campaign_forms::class, 'form_id');
    }
    public function campaign_forms_exits()
    {
        return $this->belongsTo(campaign_forms::class, 'form_id_existing');
    }
    public function campaign_publisher()
    {
        return $this->hasone(campaign_publisher::class, 'campaign_id')->where('publisher_id', Auth::guard('publisher')->user()->id);
    }
    public function campaign_publisher_common()
    {
        return $this->hasone(campaign_publisher_common::class, 'campaign_id');
    }
    public function publisher_advertiser()
    {
        return $this->hasone(publisher_advertiser::class, 'advertiser_id', 'advertiser_id');
    }
}
