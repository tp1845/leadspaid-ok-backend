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
    public function campaign_publisher()
    {
        return $this->hasone(campaign_publisher::class, 'campaign_id')->where('publisher_id', Auth::guard('publisher')->user()->id);
    }
}
