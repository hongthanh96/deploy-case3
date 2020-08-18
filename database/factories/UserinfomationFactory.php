<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Userinformation;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Userinformation::class, function (Faker $faker) {
    return [
        'gender' => $faker->numberBetween($min = 0,$max = 1),
        'DOB' => $faker->dateTimeThisMonth(),
        'phone' =>$faker->phoneNumber,
        'address' => Str::random(10),
        'image' => "http://lorempixel.com/400/200/sports/",
        'user_id' =>$faker->numberBetween($min = 1,$max = 5)
    ];
});
