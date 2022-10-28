<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLogin extends Model
{
    protected $guarded = ['id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Advertiser()
    {
        return $this->belongsTo(Advertiser::class);
    }
    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }
}
