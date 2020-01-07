<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Product\Http\Requests\ProductRequest;
use Modules\Product\Repositories\ProductRepository;
use Modules\Product\Entities\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index(Request $request){
        return view('product::index');
    }


    public function create()
    {
        return view('product::create');
    }


    public function store(ProductRequest $request){
        ProductRepository::store($request->all());
        return redirect()->route('products.index')->with('success', 'Produto cadastrado.');
    }


    public function storeImage(Request $request, Product $product){
        Storage::disk('public')->putFileAs('produtos', $request->file, $product->sku.'.jpg');
    }


    public function edit(Request $request, Product $product)
    {
        return view('product::edit');
    }


    public function update(ProductRequest $request, Product $product){
        ProductRepository::update($product, $request->all());
        return redirect()->route('products.edit', $product->id)->with('success', 'Produto atualizado.');
    }


    public function destroy(Request $request, Product $product){
        ProductRepository::destroy($product);
        return back()->with('success', 'Produto deletado.');
    }

    public function import(Request $request)
    {
        return view('product::import');
    }

}