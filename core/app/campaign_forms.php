<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class campaign_forms extends Model
{
    protected $guarded = [];
    protected $casts = [  'title' => 'array', 'form_desc' => 'array', 'field_1' => 'array','field_2' => 'array','field_3' => 'array', 'field_4' => 'array','field_5' => 'array', ];
    public function advertiser()
    {
        return $this->belongsTo(Advertiser::class,'advertiser_id');
    }

}
