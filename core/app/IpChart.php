<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IpChart extends Model
{
    protected $table = 'ip_charts';
    public function iplogs()
    {
        return $this->hasMany(IpLog::class,'ip_id');
    }
}
