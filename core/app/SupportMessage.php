<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupportMessage extends Model
{

    protected $guarded = ['id'];

    public function ticket(){
        return $this->belongsTo(SupportTicket::class, 'supportticket_id', 'id');
    }

    public function admin(){
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function attachments()
    {
        return $this->hasMany('App\SupportAttachment','support_message_id','id');
    }
}
