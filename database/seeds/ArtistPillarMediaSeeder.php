<?php

use App\ArtistPillar;
use Illuminate\Database\Seeder;

class ArtistPillarMediaSeeder extends Seeder
{
    public function run()
    {
        ArtistPillar::all()->each(function ($artistPillarItem) {

            $artistPillarItem->addMedia(get_fake_image())
                             ->preservingOriginal()
                             ->toMediaCollection(ArtistPillar::COLLECTION_NAME);

        });
    }
}
