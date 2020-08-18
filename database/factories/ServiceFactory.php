<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Service;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Service::class, function (Faker $faker) {
    return [
        'name' => Str::random(10),
        'description' => $faker->text()
    ];
});
