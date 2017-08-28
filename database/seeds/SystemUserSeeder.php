<?php

use Illuminate\Database\Seeder;

use App\SystemUser;

class SystemUserSeeder extends Seeder
{
    public function run()
    {
        factory(SystemUser::class)->create([
            'email' => 'admin@loveartstanzania.com',
        ])->assign('admin');
    }
}
