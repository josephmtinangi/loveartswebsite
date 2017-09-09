<?php

use App\ArtistPillar;
use Illuminate\Database\Seeder;

class ArtistPillarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artist_pillars')->truncate();

        $pillarNames = collect([
            'Music',
            'Photography',
            'Media',
            'Drama',
            'Dance',
            'Fashion',
            'Poetry',
            'Branding & Design',
            'Painting',
        ]);

        $pillarNames->each(function ($pillarName) {

            factory(ArtistPillar::class)->create(['name' => $pillarName]);

        });
    }
}
