<?php

namespace HttpOz\Hook\Models;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Hook extends Model
{
    public $incrementing = false;
    protected $casts = ['is_active' => 'bool'];
    
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::generate()->string;
        });
    }
}
