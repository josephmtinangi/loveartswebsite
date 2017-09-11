<?php

use App\Event;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class EventMediaSeeder extends Seeder
{
    public function run()
    {
        Event::all()->each(function ($eventItem) {

            $eventItem->addMedia(get_fake_image())
                      ->preservingOriginal()
                      ->toMediaCollection(Event::COLLECTION_NAME);

        });
    }
}
