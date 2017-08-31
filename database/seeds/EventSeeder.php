<?php

use App\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    public function run()
    {
        DB::table('events')->truncate();

        if (config('app.env') == 'local') {

            factory(Event::class, 27)->create();

        }
    }
}
