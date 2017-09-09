<?php

use App\ArtistPillar;
use Illuminate\Database\Seeder;

class ArtistPillarMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ArtistPillar::all()->each(function ($artistPillarItem) {

            $artistPillarItem->addMedia(get_fake_image_path())
                             ->preservingOriginal()
                             ->toMediaCollection(ArtistPillar::COLLECTION_NAME);

        });
    }
}
