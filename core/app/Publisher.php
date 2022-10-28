<?php


namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Publisher extends Authenticatable
{
    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at', 'ver_code_send_at'];

    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class,'user_id')->where('status','!=',0);
    }
    public  function transactions()
    {
        return $this->hasMany(Transaction::class,'publisher_id')->orderBy('id','desc');
    }
    public function login_logs()
    {
        return $this->hasMany(UserLogin::class,'publisher_id');
    }

    public function ads()
    {
        return $this->belongsToMany(CreateAd::class,'publisher_ads','publisher_id','create_ad_id');
    }

    public function domain()
    {
        return $this->hasMany(DomainVerifcation::class);
    }

    public function tickets()
    {
        return $this->hasMany(SupportTicket::class,'publisher_id');
    }
    public function scopeEmailUnverified()
    {
        return $this->where('ev', 0);
    }

    public function scopeSmsUnverified()
    {
        return $this->where('sv', 0);
    }
    public function scopeBanned()
    {
        return $this->where('status', 2);
    }
    
}

