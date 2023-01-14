<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class publisher_advertiser extends Model
{
    protected $guarded = [];
    protected $table = 'publisher_advertiser';
    protected $casts = [ 'ad_network' => 'array' ];
    public function publisher()
    {
        return $this->belongsTo(Publisher::class,'publisher_id');
    }
}
