<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents(storage_path('locations.json'));
        $data = json_decode($json, true);

        foreach ($data as $location) {
            DB::table('locations')->insert([
                'location_name' => $location['location_name'],
                'location_type' => $location['location_type'],
                'location_lat' => $location['location_lat'],
                'location_lng' => $location['location_lng'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
