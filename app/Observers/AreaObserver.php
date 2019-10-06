<?php

namespace App\Observers;

use App\Models\Area;
use Illuminate\Support\Str;

class AreaObserver
{
    /**
     * Handle the area "created" event.
     *
     * @param  \App\Models\Area  $area
     * @return void
     */
    public function created(Area $area)
    {
        //
    }

    /**
     * Handle the area "updated" event.
     *
     * @param  \App\Models\Area  $area
     * @return void
     */
    public function updated(Area $area)
    {
        //
    }

    /**
     * Handle the area "deleted" event.
     *
     * @param  \App\Models\Area  $area
     * @return void
     */
    public function deleted(Area $area)
    {
        //
    }

    /**
     * Handle the area "restored" event.
     *
     * @param  \App\Models\Area  $area
     * @return void
     */
    public function restored(Area $area)
    {
        //
    }

    /**
     * Handle the area "force deleted" event.
     *
     * @param  \App\Models\Area  $area
     * @return void
     */
    public function forceDeleted(Area $area)
    {
        //
    }

    public function creating(Area $area)
    {
        $prefix = $area->parent ? $area->parent->name . ' ' : '';
        $area->slug = Str::slug($prefix . $area->name);
    }
}
