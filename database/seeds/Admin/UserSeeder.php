<?php

namespace Admin;

use App\Admin\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        factory(User::class)->create([
            'email' => 'mabinajoshua@gmail.com',
            'mobile' => '+255 688 911 911',
            'name' => 'Joshua Mabina',
        ]);

        factory(User::class)->create([
            'name' => 'Walter Kimaro',
        ]);

        factory(User::class)->create([
            'name' => 'Samuel Thomas',
        ]);
    }
}
