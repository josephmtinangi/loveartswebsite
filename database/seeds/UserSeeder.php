<?php

use Illuminate\Database\Seeder;
use App\ArtistPillar;
use App\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->truncate();

        factory(User::class, 11)->create();
    }
}
