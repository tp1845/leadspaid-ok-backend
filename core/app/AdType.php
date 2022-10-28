<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdType extends Model
{
    protected $guarded = [];
    protected $table = 'ad_types';

    public function advertises()
    {
        return $this->hasMany(CreateAd::class,'ad_type_id');
    }
}
