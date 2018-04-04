<?php

use Faker\Generator as Faker;

$factory->define(App\Photo::class, function (Faker $faker) {
    return [
        'user_id'             => $faker->randomDigitNotNull,
        'collection_id'       => $faker->randomDigitNotNull,
        'title'               => $faker->sentence($nbWords = 3),
        'body'                => $faker->realText($maxNbChars = 120),
        'shot_at'             => $faker->dateTime,
        'camera'              => $faker->company,
        'lens'                => $faker->company,
        'shutterspeed'        => $faker->numberBetween($min = 1000, $max = 9000), // 8567,
        'aperture'            => $faker->randomFloat($nbMaxDecimals = 2, $min = 1.8, $max = 32), // 48.8932,
        'iso'                 => $faker->randomNumber($nbDigits = 3, $strict = false),
        'focallength'         => $faker->numberBetween($min = 1000, $max = 9000),
        'location'            => $faker->country,
        'keywords'            => $faker->word . ', ' . $faker->word . ', ' . $faker->word,
        'filename'            => $faker->domainWord . '.jpg',
        'views'               => $faker->randomNumber($nbDigits = 2),
    ];
});
