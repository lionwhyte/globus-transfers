<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoutesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents(storage_path('route_results.json'));
        $data = json_decode($json, true);

        foreach ($data as $route) {
            DB::table('routes')->insert([
                'departure_location_name' => $route['departure_location_name'],
                'destination_location_name' => $route['destination_location_name'],
                'departure_location_lat' => $route['departure_location_lat'],
                'departure_location_lng' => $route['departure_location_lng'],
                'destination_location_lat' => $route['destination_location_lat'],
                'destination_location_lng' => $route['destination_location_lng'],
                'distance_km' => $route['distance'],
                'duration' => $route['duration'],
                'standardPrice' => $route['standardPrice'],
                'minivanPrice' => $route['minivanPrice'],
                'minibusPrice' => $route['minibusPrice'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
