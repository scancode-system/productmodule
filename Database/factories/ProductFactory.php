<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Product\Entities\Product;

$factory->define(Product::class, function (Faker $faker) {
	\Bezhanov\Faker\ProviderCollectionHelper::addAllProvidersTo($faker);
    return [
        'sku' => $faker->unique()->ean13,
        'barcode' => $faker->unique()->ean13,
        'description' => $faker->productName,
        'price' => $faker->randomFloat(2, 1, 2000),
        'min_qty' => $faker->numberBetween(1,5),
        'discount_limit' => $faker->randomFloat(2, 0, 100),
        'multiple' => $faker->numberBetween(1,5),
        'product_category_id' => $faker->numberBetween(1,10),
    ];
});
