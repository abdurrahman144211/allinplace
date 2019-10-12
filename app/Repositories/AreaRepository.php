<?php

namespace App\Repositories;

use App\Models\Area;
use App\Repositories\Contracts\AreaRepositoryInterface;

class AreaRepository implements AreaRepositoryInterface
{
    protected $area;

    /**
     * AreaRepository constructor.
     * @param Area $area
     */
    public function __construct(Area $area)
    {
        $this->area = $area;
    }

    /**
     * @return mixed
     */
    public function first()
    {
        return $this->area->first();
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function bySlug($slug)
    {
        return $this->area->whereSlug($slug)->first();
    }
}
