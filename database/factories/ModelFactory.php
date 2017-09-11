<?php

$factory->define(App\ArtistPillar::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
    ];
});

$factory->define(App\Event::class, function (Faker\Generator $faker) {
    $numberBetween = $faker->numberBetween(2, 5);

    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'location' => $faker->city,
        'source_url' => $faker->url,
        'start_date' => $faker->boolean ? now()->addDays($numberBetween) : now()->subDays($numberBetween),
    ];

});

$factory->define(App\StreetData::class, function (Faker\Generator $faker) {

    return [
        'title' => $faker->sentence($faker->numberBetween(3, 5)),
        'description' => $faker->realText(120),
        'archived_at' => $faker->boolean ? null : $faker->dateTime,
    ];

});

$factory->define(App\User::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'verified_at' => $faker->boolean ? now() : null,
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
