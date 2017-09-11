<?php

use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    public function run()
    {
        DB::table('media')->truncate();

        if (config('app.env') == 'local') {

            $this->call(EventMediaSeeder::class);
            $this->call(StreetDataMediaSeeder::class);
            $this->call(ArtistPillarMediaSeeder::class);

        }
    }
}
