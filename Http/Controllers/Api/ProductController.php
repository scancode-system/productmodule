<?php

namespace Modules\Product\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Product\Repositories\ProductRepository;
use Modules\Product\Entities\Product;
use Modules\Product\Events\ProductLazyEagerLoadingEvent;

class ProductController extends Controller
{

    public function index()
    {
        return ProductRepository::load(['id','barcode', 'sku', 'description', 'price', 'product_category_id'], ['product_category:id,description']);
    }

    public function product(Request $request, Product $product)
    {
        $loads = event(new ProductLazyEagerLoadingEvent());
        $loads = collect($loads)->flatten()->toArray();
    	$product->load($loads+['family']);
        foreach ($product->family as $product_family) {
            $product_family->family_alias = $product_family->family_alias;     
        }
        //$product->family_alias = $product->family_alias;
    	
        return $product;
    }

}
