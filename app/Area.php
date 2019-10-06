<?php

namespace App;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use NodeTrait;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($area) {
            $prefix = $area->parent ? $area->parent->name . ' ' : '';
            $area->slug = \Str::slug($prefix . $area->name);
        });
    }

     /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return "slug";
    }
}
