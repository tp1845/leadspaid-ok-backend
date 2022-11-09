<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class campaign_forms_leads extends Model
{
    protected $fillable = [
        'form_id',
        'advertiser_id',
        'campaign_id',
        'publisher_id',
        'field_1',
        'field_2',
        'field_3',
        'field_4',
        'field_5'
    ];

}
