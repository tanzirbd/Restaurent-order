<?php

use Faker\Generator as Faker;

$factory->define(App\SubCategory::class, function (Faker $faker) {
    return [
        'sub_category_name' => $faker->firstNameMale,
        'sub_category_description' => $faker->text(50),
        'mainmenu_id' => $faker->month,
        'category_id' => $faker->month,
        'sub_category_publish_status' => $faker->boolean,
    ];
});
