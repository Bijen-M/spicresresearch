<?php

use App\Models\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    $title = $faker->words(5, true);
    return [
        'category_id' => rand(1,2),
        'department_id' => rand(1,3),
        'title' => $title,
        'slug' => str_slug($title),
        'description' => $faker->words(200, true),
        'by' => $faker->name(),
        'date' => $faker->date(),
    ];
});
