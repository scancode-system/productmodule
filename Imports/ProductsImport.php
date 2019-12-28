<?php

namespace Modules\Product\Imports;

use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Modules\Product\Repositories\ProductRepository;
use Modules\Product\Repositories\ProductCategoryRepository;
use Exception;

class ProductsImport implements OnEachRow, WithHeadingRow
{

	public function onRow(Row $row)
	{
		try 
		{
			$product_data = $this->parse($row->toArray());
		//	dd($product_data);

			$product = ProductRepository::productByUniqueKeys($product_data['barcode']);

			if($product){
				ProductRepository::update($product, $product_data);
			} else 
			{
				$product = ProductRepository::store($product_data);
			}
		} catch(Exception $e) {
			dd($e);
		}
	}

	private function parse($data)
	{
		$data['product_category_id'] = $this->productCategoryId($data['category']);
		unset($data['id']);
		return $data;	
	}

	private function productCategoryId($category)
	{
		$product_category = ProductCategoryRepository::loadByDescription($category);
		if(!$product_category)
		{
			$product_category = ProductCategoryRepository::store(['description' => $category]);
		} 
		//dd($product_category);
		return $product_category->id;	
	}

}
