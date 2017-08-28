<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(PillarsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(InfosTableSeeder::class);
        $this->call(ArtistImagesTableSeeder::class);
        $this->call(MediaTableSeeder::class);

        // System Administration
        $this->call(SystemUserRoleSeeder::class);
        $this->call(SystemUserSeeder::class);
    }
}
