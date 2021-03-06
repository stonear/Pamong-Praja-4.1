<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
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
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'role'=>'USER',
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),

        'sex' => $faker->randomElement($array = array ('L', 'P')),
        'nationality' => 'Indonesia',
        'id_type' => $faker->creditCardType,
        'id_number' => $faker->creditCardNumber,
        'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'phone' => $faker->randomNumber(9),
        'community_name' => $faker->company,
        'community_type' => $faker->jobTitle,
        't_shirt' => $faker->randomElement($array = array ('XS', 'S', 'M', 'L', 'XL', 'XXL', '3XL')),

        'event_id' => $faker->numberBetween(1, 7),

        'status' => $faker->randomElement($array = array ('registered', 'unconfirmed', 'confirmed', 'rejected')),
    ];
});
