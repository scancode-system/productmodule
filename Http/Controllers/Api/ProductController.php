<?php

namespace Modules\Product\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Product\Repositories\ProductRepository;
use Modules\Product\Entities\Product;

class ProductController extends Controller
{

    public function index()
    {
        return ProductRepository::load(['id', 'sku', 'description', 'price', 'product_category_id'], ['product_category:id,description']);
    }

    public function product(Request $request, Product $product)
    {
        return $product;
    }

}
