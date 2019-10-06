<?php

namespace App\Http\ViewComposers;

use App\Models\Area;
use Illuminate\View\View;
use Illuminate\Support\Str;

class AreaComposer
{
    protected $area;

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
        $area = Area::whereSlug($this->areaSlug())->first();

        return $area ?: Area::first();
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
        $countryData = json_decode(file_get_contents('http://www.geoplugin.net/json.gp'));

        if(! $countryData->geoplugin_countryName) return false;

        return Str::slug($countryData->geoplugin_countryCode);
    }
}
