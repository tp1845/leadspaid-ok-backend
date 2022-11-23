<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
