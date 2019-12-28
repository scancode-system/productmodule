<?php

namespace Modules\Product\Repositories;

use Modules\Product\Entities\ProductCategory;

class ProductCategoryRepository
{

	// LOAD
	public static function toSelect($value, $description){
		return ProductCategory::pluck($description, $value);
	}

	public static function loadByDescription($description)
	{
		return ProductCategory::where('description', $description)->first();
	}

	// SAVE
	public static function store($data){
		return ProductCategory::create($data);
	}


}
