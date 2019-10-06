<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listing extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    /**
     * @param $query
     * @return mixed
     */
    public function scopeIsLive($query)
    {
        return $query->where('live', true);
    }
    /**
     * @param $query
     * @return mixed
     */
    public function scopeIsNotLive($query)
    {
        return $query->where('live', false);
    }
    /**
     * @return mixed
     */
    public function isLive()
    {
        return $this->live;
    }

    /**
     * @return mixed
     */
    public function cost()
    {
        return $this->category->price;
    }

    /**
     * @param $query
     * @param $category
     * @return mixed
     */
    public function scopeFromCateory($query, $category)
    {
        return $this->where('category_id', $category->id);
    }

    /**
     * @param $query
     * @param $category
     * @return mixed
     */
    public function scopeInArea($query, Area $area)
    {
        return $this->whereIn('area_id', array_merge(
            [$area->id],
            $area->descendants()->pluck('id')->toArray()
        ));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
