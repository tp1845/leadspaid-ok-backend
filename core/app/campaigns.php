<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class campaigns extends Model
{
    protected $guarded = [];
    public function advertiser()
    {
        return $this->belongsTo(Advertiser::class,'advertiser_id');
    }
}
