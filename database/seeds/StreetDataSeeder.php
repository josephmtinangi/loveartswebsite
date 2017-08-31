<?php

use App\StreetData;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StreetDataSeeder extends Seeder
{
    public function run()
    {
        DB::table('street_data')->truncate();

        if (config('app.env') == 'local') {

            factory(StreetData::class, 3)->create();

        }
    }
}
