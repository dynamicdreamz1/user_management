<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

//use App\User;
use App\Models\User;
use App\Models\ProductCategory;
use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'fullname' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$12$HL7O8XdgqtUN5WKxolmOCeBbjgUjtWkH6pXP2j0avURdbTM7saXlu', // 123456789
        'role' => 2,
        'remember_token' => Str::random(10),
    ];
});

$factory->define(ProductCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'parent' => ProductCategory::all()->random()->id,
        'user_id' => User::all()->random()->id,
    ];
});


$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'category_id' => ProductCategory::all()->random()->id,
        'stock' => $faker->name,
        'price' => $faker->name,
        'weight' => $faker->name,
        'user_id' => User::all()->random()->id,
    ];
});

