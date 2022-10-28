<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    protected $guarded = ['id'];

    protected $table = 'email_sms_templates';

    protected $casts = [
        'shortcodes' => 'object'
    ];

}
