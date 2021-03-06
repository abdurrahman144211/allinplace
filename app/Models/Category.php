<?php

namespace App\Models;

use App\Traits\HasSlug;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use NodeTrait, HasSlug;

    protected $guarded = [];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return "slug";
    }

    public function cost()
    {
        if($this->price > 0) {
            return "$" . number_format($this->price, 2);
        }

        return __('site.free');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function listings()
    {
        return $this->hasMany(Listing::class);
    }

    /**
     * @param $query
     * @param $area
     * @return mixed
     */
    public function scopeWithListingsInArea($query, $area)
    {
        return $query->with(['listings' => function ($q) use ($area) {
            return $q->isLive()->inArea($area);
        }]);
    }
}
