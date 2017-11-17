<?php

use Faker\Generator as Faker;

$factory->define(App\Mainmenu::class, function (Faker $faker) {
    return [
        'mainmenu_name' => $faker->firstNameMale,
        'mainmenu_description' => $faker->text(50),
        'mainmenu_publish_status' => $faker->boolean,
    ];
});
