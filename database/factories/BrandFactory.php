<?php

use Faker\Generator as Faker;

$factory->define(App\Brand::class, function (Faker $faker) {
    return [
        'brand_name' => $faker->firstNameMale,
        'brand_description' => $faker->text(50),
        'brand_logo' => $faker->imageUrl(),
        'brand_publish_status' => $faker->boolean,
    ];
});
