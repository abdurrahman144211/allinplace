<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Repositories\Contracts\AreaRepositoryInterface;
use App\Http\Services\Location\Contracts\LocationFinder;

class AreaComposer
{
    protected $area, $areaRepository, $locationFinder;

    /**
     * AreaComposer constructor.
     * @param AreaRepositoryInterface $areaRepository
     */
    public function __construct(AreaRepositoryInterface $areaRepository, LocationFinder $locationFinder)
    {
        $this->areaRepository = $areaRepository;
        $this->locationFinder = $locationFinder;
    }

    /**
     * @param View $view
     * @return View
     */
    public function compose(View $view)
    {
        if(! $this->area) $this->area = $this->getArea();

        return $view->with(['area' => $this->area]);
    }

    /**
     * @return mixed
     */
    protected function getArea()
    {
        $area = $this->areaRepository->bySlug($this->areaSlug());

        return $area ?: $this->areaRepository->first();
    }

    /**
     * @return mixed
     */
    protected function areaSlug()
    {
        return session()->get(
            'area', $this->getAreaByLocation()
        );
    }

    /**
     * @return bool|string
     */
    protected function getAreaByLocation()
    {
        return Str::slug($this->locationFinder->locate(request()->ip()));
    }
}
