<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Author;
use Faker\Generator as Faker;

$factory->define(Author::class, function (Faker $faker) {
    return [
        'name' => $faker->name('male')
    ];
});
