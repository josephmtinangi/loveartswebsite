<?php

use Illuminate\Database\Seeder;
use Silber\Bouncer\Database\Role as SystemUserRole;

class SystemUserRoleSeeder extends Seeder
{
    public function run()
    {
        Bouncer::allow(
            SystemUserRole::create([
                'name' => 'admin',
                'title' => 'System Administrator',
                'description' => 'Responsible for the upkeep and reliable operation of this system',
            ])
        )->everything();
    }
}
