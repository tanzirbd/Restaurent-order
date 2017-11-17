<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    static $password;

    return [
        'category_name' => $faker->firstNameMale,
        'category_description' => $faker->text(50),
        'mainmenu_id' => $faker->month,
        'category_publish_status' => $faker->boolean,
    ];
});
