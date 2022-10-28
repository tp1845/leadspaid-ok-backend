<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{
    protected $guarded = ['id'];

    public function getUsernameAttribute()
    {
        return $this->name;
    }

    public function advertiser()
    {
        return $this->belongsTo(Advertiser::class,'user_id');
    }
    public function publisher()
    {
        return $this->belongsTo(Publisher::class,'publisher_id');
    }

    public function supportMessage(){
        return $this->hasMany(SupportMessage::class);
    }

}
