<?php

namespace Modules\Product\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Product\Repositories\ProductRepository;
use Modules\Product\Entities\Product;
use Modules\Product\Events\ProductLazyEagerLoadingEvent;
use Modules\Product\Events\ProductsLazyEagerLoadingEvent;

class ProductController extends Controller
{

    public function index()
    {
        $loads = event(new ProductsLazyEagerLoadingEvent());
        $loads = collect($loads)->flatten()->toArray();
        $loads = array_merge($loads, ['product_category:id,description']);

        return ProductRepository::load(['id','barcode', 'sku', 'description', 'price', 'product_category_id'], $loads);
    }

    public function product(Request $request, Product $product)
    {

        $loads = event(new ProductLazyEagerLoadingEvent());
        $loads = collect($loads)->flatten()->toArray();

    	$product->load(array_merge($loads, ['family', 'product_category'])); 

        foreach ($product->family as $product_family) {
            $product_family->family_alias = $product_family->family_alias;
            $product_family->product_category; 

            $product_family->load($loads);
        }


        return $product;
    }

}
