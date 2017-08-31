<?php

use Illuminate\Database\Seeder;

use Admin\UserSeeder;
use Admin\RoleSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(EventSeeder::class);
        $this->call(StreetDataSeeder::class);
        $this->call(PillarsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ArtistImagesTableSeeder::class);
        $this->call(MediaTableSeeder::class);

        $this->call(UserSeeder::class);
    }
}
