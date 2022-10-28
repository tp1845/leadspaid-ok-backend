<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Extension extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    protected $casts = [
        'shortcode' => 'object',
    ];

    public function scopeGenerateScript()
    {
        $script = $this->script;
        foreach ($this->shortcode as $key => $item) {
            $script = shortCodeReplacer('{{' . $key . '}}', $item->value, $script);
        }
        return $script;
    }
    public function shortCodeValue()
    {
        
        foreach ($this->shortcode as $key => $item) {
           return $item->value;
        }
        
    }
}
