<?php

namespace Modules\Product\Repositories;

use Modules\Product\Entities\ProductCategory;

class ProductCategoryRepository
{

	public static function toSelect($value, $description){
		return ProductCategory::pluck($description, $value);
	}

	public static function store($data){
		ProductCategory::create($data);
	}
 

}
