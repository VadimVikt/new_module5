<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence(rand(3,8), true);
    $txt = $faker->realText(rand(1000,3000));
    $createdAt = $faker->dateTimeBetween('-1 months','1 day');
    return [
        'owner_id' => factory(App\User::class),
        'slug' => Str::slug($title),
        'title' => $title,
        'short_description' => $faker->text(rand(20,60)),
        'body' => $txt,
        'created_at' => $createdAt,
        'updated_at' => $createdAt,
    ];
});
