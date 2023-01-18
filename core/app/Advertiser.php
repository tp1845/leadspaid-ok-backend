<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Advertiser extends Authenticatable
{
    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at', 'ver_code_send_at'];
    protected $casts = [ 'assign_publisher' => 'array', 'assign_publisher_by_pub' => 'array', 'assign_cm' => 'array', 'assign_cm_by_pub' => 'array' ];
    public function publisher_advertiser()
    {
        return $this->hasone(publisher_advertiser::class, 'advertiser_id');
    }

    public function ads()
    {
        return $this->hasMany(CreateAd::class,'advertiser_id');
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class,'user_id')->where('status','!=',0);
    }

    public function login_logs()
    {
        return $this->hasMany(UserLogin::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class,'user_id')->orderBy('id','desc');
    }
    public function plans()
    {
        return $this->belongsToMany(PricePlan::class,'advertiser_plans');
    }

    public function analytics()
{
        return $this->hasMany(Analytic::class);
    }

    public function tickets()
    {
        return $this->hasMany(SupportTicket::class,'user_id');
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
    public function campaigns()
    {
        return $this->hasMany(campaigns::class,'advertiser_id');
    }
}
