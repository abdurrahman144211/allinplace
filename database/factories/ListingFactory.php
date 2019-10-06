<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Listing::class, function (Faker $faker) {
    return [
        'title' => $faker->text(22),
        'body' => $faker->paragraph,
        'user_id' => function () {return \App\Models\User::all()->random()->id;},
        'category_id' => function () {return \App\Models\Category::all()->random()->id;},
        'area_id' => function () {return \App\Models\Area::all()->random()->id;},
        'live' => true,
    ];
});
