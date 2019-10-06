<?php

namespace App\Models;

use App\Traits\HasSlug;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
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
}
