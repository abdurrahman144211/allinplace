<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ini_set('memory_limit', -1);
        $categories = [
            [
                'name' => 'Community',
                'children' => [
                    ['name' => 'Activities'],
                    ['name' => 'Artists'],
                    ['name' => 'Childcare'],
                    ['name' => 'Classes'],
                    ['name' => 'Events'],
                    ['name' => 'General'],
                    ['name' => 'Groups'],
                    ['name' => 'Local news'],
                    ['name' => 'Lost and found'],
                    ['name' => 'Musicians'],
                    ['name' => 'Pets'],
                    ['name' => 'Politics'],
                    ['name' => 'Rideshare'],
                    ['name' => 'Volunteers'],
                ]
            ],
            [
                'name' => 'Personals',
                'children' => [
                    ['name' => 'Strictly platonic'],
                    ['name' => 'Women seeking women'],
                    ['name' => 'Women seeking men'],
                    ['name' => 'Men seeking women'],
                    ['name' => 'Men seeking men'],
                    ['name' => 'Misc romance'],
                    ['name' => 'Casual encounters'],
                    ['name' => 'Missed connections'],
                    ['name' => 'Rants and raves'],
                ]
            ],
            [
                'name' => 'Housing',
                'children' => [
                    ['name' => 'Apartments / housing'],
                    ['name' => 'Housing swap'],
                    ['name' => 'Housing wanted'],
                    ['name' => 'Office / commercial'],
                    ['name' => 'Parking / storage'],
                    ['name' => 'Real estate for sale'],
                    ['name' => 'Rooms / shared'],
                    ['name' => 'Rooms wanted'],
                    ['name' => 'Sublets / temporary'],
                    ['name' => 'Vacation rentals'],
                ]
            ],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
