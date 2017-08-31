<?php

use Illuminate\Database\Seeder;

use Admin\UserSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(PillarsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ArtistImagesTableSeeder::class);

        $this->call(EventSeeder::class);
        $this->call(StreetDataSeeder::class);
        $this->call(UserSeeder::class);

        $this->call(MediaSeeder::class);
    }
}
