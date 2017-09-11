<?php

use Illuminate\Database\Seeder;

use Admin\UserSeeder as AdminSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(ArtistImagesTableSeeder::class);

        $this->call(UserSeeder::class);
        $this->call(ArtistPillarSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(StreetDataSeeder::class);

        $this->call(AdminSeeder::class);

        $this->call(MediaSeeder::class);
    }
}
