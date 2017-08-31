<?php

$factory->define(App\Event::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence($faker->numberBetween(3, 5)),
        'description' => $faker->realText(120),
        'poster' => $faker->numberBetween(1, 19) . '.jpg',
        'location' => $faker->city,
        'url' => $faker->url,
        'date' => $faker->dateTime,
        'start_date' => $faker->dateTime,
        'archived_at' => $faker->boolean ? null : $faker->dateTime,
    ];

});

$factory->define(App\StreetData::class, function (Faker\Generator $faker) {
    $mediaIsVideo = $faker->boolean;
    $mediaUrl = $faker->numberBetween(1, 19);

    return [
        'title' => $faker->sentence($faker->numberBetween(3, 5)),
        'description' => $faker->realText(120),
        'type' => $mediaIsVideo ? 1 : 0,
        'url' => $mediaIsVideo ? $mediaUrl . '.gif' : $mediaUrl . '.jpg',
        'archived_at' => $faker->boolean ? null : $faker->dateTime,
    ];

});

$factory->define(App\Admin\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'mobile' => $faker->phoneNumber,
        'password' => $password ?: $password = bcrypt('secret@qwerty'),
        'remember_token' => str_random(10),
    ];

});
