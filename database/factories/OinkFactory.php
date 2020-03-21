<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Oink;
use Faker\Generator as Faker;

$factory->define(Oink::class, function (Faker $faker) {
    return [
        'body'  =>  $faker->realText($faker->numberBetween(30, 240)),
    ];
});
