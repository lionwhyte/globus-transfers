<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

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
        $faker = Faker::create();

        foreach ($data as $location) {
            // Generate image names
            $imageName = str_replace(" ", "-", strtolower(explode(",",$location['location_name'])[0]));
            $coverImage = $imageName . '-cover.jpg';
            $thumbnailImage = $imageName . '-thumbnail.jpg';

            // Generate a short article in HTML using Lorem Ipsum
            $description = '<p>' . $faker->paragraph . '</p>';
            $description .= '<p>' . $faker->paragraph . '</p>';
            $description .= '<p>' . $faker->paragraph . '</p>';
            $description .= '<p>' . $faker->paragraph . '</p>';
            // Add more paragraphs as needed

            DB::table('locations')->insert([
                'location_name' => $location['location_name'],
                'location_slug' => strtolower(str_replace(" ", "-", str_replace(",", "", $location['location_name']))),
                'location_type' => $location['location_type'],
                'location_images' => $coverImage . ',' . $thumbnailImage,
                'location_description' => $description,
                'location_lat' => $location['location_lat'],
                'location_lng' => $location['location_lng'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
