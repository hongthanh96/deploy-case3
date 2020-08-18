<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Packdetail;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Packdetail::class, function (Faker $faker) {
    return [
        'name' =>Str::random(5),
        'price' => $faker->numberBetween($min = 2500000, $max = 100000000) ,
        'service1' =>Str::random(10),
        'service2' =>Str::random(10),
        'service3' =>Str::random(10),
        'service4' =>Str::random(10),
        'service5' =>Str::random(10)
    ];
});
