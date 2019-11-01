<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Payment\Http\Requests\PaymentRequest;
use Modules\Payment\Repositories\PaymentRepository;
use Modules\Payment\Entities\Payment;

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

}