<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    protected $guarded = ['id'];

    protected $casts = ['mail_config' => 'object'];

    public function scopeSitename($query, $page_title)
    {
        $page_title = empty($page_title) ? '' : $page_title . ' - ' ;
        return $page_title . $this->sitename;
    }
}
