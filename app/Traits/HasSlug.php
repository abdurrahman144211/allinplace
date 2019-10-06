<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasSlug
{
    protected static function bootHasSlug()
    {
        static::creating(function ($model) {
            $prefix = $model->parent ? $model->parent->name . ' ' : '';
            $model->slug = Str::slug($prefix . $model->name);
        });
    }
}
