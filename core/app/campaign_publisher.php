<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class campaign_publisher extends Model
{
    protected $guarded = [];
    protected $table = 'campaign_publisher';
    protected $casts = [ 'url' => 'array' ];
    public function publisher()
    {
        return $this->belongsTo(Publisher::class,'publisher_id');
    }
    public function campaigns()
    {
        return $this->belongsTo(campaigns::class,'campaigns_id');
    }
}
