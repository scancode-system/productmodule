<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Product\Entities\ProductCategory;

$factory->define(ProductCategory::class, function (Faker $faker) {
	\Bezhanov\Faker\ProviderCollectionHelper::addAllProvidersTo($faker);
    return [
        'description' => $faker->unique()->department
    ];
});
