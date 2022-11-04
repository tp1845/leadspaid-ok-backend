<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionAdvertiser extends Model
{
    protected $table = "transactions_advertiser";

    protected  $guarded = ['id'];
   
    public function user()
    {
        return $this->belongsTo(Advertiser::class,'user_id');
    }


}
