<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Product\Http\Requests\ProductCategoryRequest;
use Modules\Product\Repositories\ProductCategoryRepository;


class ProductCategoryController extends Controller 
{

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(ProductCategoryRequest $request)
    {
        ProductCategoryRepository::store($request->all());
        return redirect()->route('products.index')->with('success', 'Categoria de produto cadastrado.');
    }

}
