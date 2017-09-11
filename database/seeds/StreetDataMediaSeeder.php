<?php

use App\StreetData;
use Illuminate\Database\Seeder;

class StreetDataMediaSeeder extends Seeder
{
    public function run()
    {
        StreetData::all()->each(function ($streetDataItem) {

            $streetDataItem->addMedia(get_fake_image())
                           ->preservingOriginal()
                           ->toMediaCollection(StreetData::COLLECTION_NAME);

        });
    }
}
