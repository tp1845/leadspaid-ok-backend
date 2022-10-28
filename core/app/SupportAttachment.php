<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupportAttachment extends Model
{
    protected $guarded = ['id'];
    protected $table = "support_attachments";

    public function supportMessage()
    {
        return $this->belongsTo('App\SupportMessage','support_message_id');
    }
}
