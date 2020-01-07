<?php

namespace Modules\Product\Repositories;

use Modules\Product\Entities\Product;

class ProductRepository
{

	// LOAD
	public static function load($attributes = ['*'], $relationship = [])
	{
		return Product::with($relationship)->get($attributes);
	}

	public static function loadById($id)
	{
		return Product::find($id);
	}

	public static function loadAll(){
		return Product::all();
	}

	public static function loadPaginate($items_per_page = 10){
		$products =  Product::paginate($items_per_page);
		$products->appends(request()->query());
		return $products;
	}

	public static function list($search = '', $limit = 10){
		$products =  Product::where('description', 'like', '%'.$search.'%')->orWhere('sku', 'like', '%'.$search.'%')->paginate($limit);
		$products->appends(request()->query());
		return $products;
	}

	public static function productByUniqueKeys($barcode)
	{
		$product = Product::where('barcode', $barcode)->first();
		return $product;
	}


	// SAVE
	public static function store($data){
		return Product::create($data);
	}


	public static function update(Product $product, $data){
		$product->update($data);
		return $product;
	}


	public static function destroy($product){
		$product->delete();
	}

	public static function toSelect($value, $description){
		return Product::pluck($description, $value);
	}

}
