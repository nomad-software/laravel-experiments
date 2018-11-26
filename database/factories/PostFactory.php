<?php

use App\Models\Blog\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        "title" => $faker->text(100),
        "text"  => $faker->text,
    ];
});
