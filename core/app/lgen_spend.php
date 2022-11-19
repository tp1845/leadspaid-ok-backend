<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lgen_spend extends Model
{
    protected $table = 'lgen_spend';
    protected $fillable = [
        'campaign_id',
        'lgen_date',
        'lgen_source',
        'lgen_medium',
        'lgen_campaign'
    ];

    public function campaigns(){
        return $this->hasOne(campaigns::class, 'id', 'campaign_id');
    }
}
