<?php

use App\Event;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class EventMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::all()->each(function ($eventItem) {

            $eventItem->addMedia(get_fake_image_path())
                      ->preservingOriginal()
                      ->toMediaCollection(Event::COLLECTION_NAME);

        });
    }
}
