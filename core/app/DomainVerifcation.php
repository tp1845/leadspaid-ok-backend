<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DomainVerifcation extends Model
{
    use SoftDeletes;

   protected $table = 'domain_verifcations';

   public function publisher()
   {
       return $this->belongsTo(Publisher::class);
   }
   public function scopePending()
   {
       return $this->whereStatus(2)->get();
   }

   protected $casts =[
    'keywords'=>'object'
   ];

}
