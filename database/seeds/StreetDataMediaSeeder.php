<?php

use App\StreetData;
use Illuminate\Database\Seeder;

class StreetDataMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StreetData::all()->each(function ($streetDataItem) {

            $streetDataItem->addMedia(get_fake_image_path())
                           ->preservingOriginal()
                           ->toMediaCollection(StreetData::COLLECTION_NAME);

        });
    }
}
