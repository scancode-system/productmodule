<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\ProductCategory;
use \Exception;

class ProductCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        try{
            factory(ProductCategory::class, 10)->create();
        } catch(Exception $e){
            echo "\n".$e->getMessage()."\n\n";
        }

    }
}
