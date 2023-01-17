<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class campaign_publisher_common extends Model
{
    protected $guarded = [];
    protected $table = 'campaign_publisher_common';
    protected $casts = [ 'planned' => 'array',  'url' => 'array' ];
    public function campaigns() { return $this->belongsTo(campaigns::class,'campaigns_id'); }
}
