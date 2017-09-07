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

            $faker = Faker::create();

            $fakeImagePath =
                database_path("seeds/events/") . $faker->numberBetween(1,5) . '.jpg';

            $eventItem->addMedia($fakeImagePath)
                      ->preservingOriginal()
                      ->toMediaCollection('events');

        });
    }
}
