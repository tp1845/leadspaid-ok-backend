<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmsTemplate extends Model
{
    protected $guarded = ['id'];

    protected $table = 'email_sms_templates';

    protected $casts = [
        'shortcodes' => 'object'
    ];
}
