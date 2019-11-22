<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Product\Database\Seeders\ProductTableSeeder;
use Modules\Product\Database\Seeders\ProductCategoryTableSeeder;

class ProductDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(ProductCategoryTableSeeder::class);
         $this->call(ProductTableSeeder::class);
    }
}
