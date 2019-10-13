<?php

namespace App\Http\ViewComposers;

use App\Models\Area;
use App\Models\Category;
use Illuminate\View\View;

class AllCategoriesComposer
{
    /**
     * @param View $view
     * @return View
     */
    public function compose(View $view)
    {
        return $view->with([
            'categories' => Category::get()->toTree(),
        ]);
    }

}
