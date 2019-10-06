<?php

namespace App\Models;

use App\Traits\HasSlug;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use NodeTrait, HasSlug;

    protected $guarded = [];

}
