<?php

use App\Telegram\Domain\Models\TelegramUser;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/* @var Factory $factory */

$factory->define(TelegramUser::class, function (Faker $faker) {
    return [
        'id' => $faker->randomNumber(5),
        'user_id' => $faker->randomNumber(5),
    ];
});
