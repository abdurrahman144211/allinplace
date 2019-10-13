<?php

namespace App\Http\ViewComposers;

use App\Models\Area;
use App\Models\Category;
use Illuminate\View\View;

class AllAreasComposer
{
    /**
     * @param View $view
     * @return View
     */
    public function compose(View $view)
    {

       return $view->with([
           'areas' => Area::get()->toTree(),
       ]);
    }

}
