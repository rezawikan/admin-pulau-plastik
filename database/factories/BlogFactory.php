<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
use App\Models\Author;
use App\Models\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    return [
      'en' => [
         'title' => $slug_1 = $faker->sentence(5),
         'slug' => str_slug($slug_1),
         'content' => $faker->sentence(30)
        ],
      'id' => [
          'title' => $slug_2 = $faker->sentence(4),
          'slug' => str_slug($slug_2),
          'content' => $faker->text(30)
      ],
      'author_id' => factory(Author::class)->create()->id,
      'image' => 'null'
    ];
});
