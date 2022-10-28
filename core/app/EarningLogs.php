<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EarningLogs extends Model
{
    protected $guarded = [];

    /**
     * Get the ad that owns the EarningLogs
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ad()
    {
        return $this->belongsTo(CreateAd::class,'ad_id');
    }
    public function publisher()
    {
        return $this->belongsTo(Publisher::class,'publisher_id');
    }
}
