<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3),
        'body' => $faker->text(70),
        'category' => ucfirst($faker->word),
        'price' => $faker->biasedNumberBetween(10, 99),
        'image' => $faker->imageUrl(200, 150)
    ];
});
