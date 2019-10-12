<?php

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        ini_set('memory_limit', '-1');

        $data = file_get_contents(config_path('countries_states_cities.json'));

        $data = json_decode($data, true);

        $areas = collect($data)->map(function ($item) {
            $item = [
                'name' => $item['name'],
                'children' => array_key_exists('states', $item) ? array_values(
                    collect($item['states'])->map(function ($cities , $state) {
                        $cities = collect($cities)->map(function ($city) {return ['name' => $city];})->toArray();
                        return [
                            'name' => $state,
                            'children' => $cities,
                        ];
                    })->toArray()
                ) :  [],
            ];

            return $item;
        })->toArray();


        $wanted = [$areas[63], $areas[64], $areas[66], $areas[88]];
        foreach($wanted as $area) {
            \App\Models\Area::create($area);
        }
    }
}
