<?php
/**
 * File name: SlideFactory.php
 * Last modified: 2020.09.12 at 20:01:58
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2020
 *
 */

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Slide;
use Faker\Generator as Faker;

$factory->define(Slide::class, function (Faker $faker) {
    $product = $faker->boolean;
    $array = [
        'order' => $faker->numberBetween(0, 5),
        'text' => $faker->sentence(4),
        'button' => $faker->randomElement(['Discover It', 'Order Now', 'Get Discount']),
        'text_position' => $faker->randomElement(['start', 'end', 'center']),
        'text_color' => '#25d366',
        'button_color' => '#25d366',
        'background_color' => '#ccccdd',
        'indicator_color' => '#25d366',
        'image_fit' => 'cover',
        'product_id' => $product ? $faker->numberBetween(1, 15) : null,
        'market_id' => !$product ? $faker->numberBetween(1, 4) : null,
        'enabled' => $faker->boolean,
    ];

    return $array;
});
