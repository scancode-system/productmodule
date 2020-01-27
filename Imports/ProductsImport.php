<?php

namespace Modules\Product\Imports;

use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Events\BeforeImport;
use Illuminate\Support\Facades\Storage;

use Modules\Product\Repositories\ProductRepository;
use Modules\Product\Repositories\ProductCategoryRepository;
use Modules\Product\Events\BeforeImportEvent;
use Modules\Product\Events\AfterImportEvent;
use Modules\Product\Entities\Product;
use Modules\ImportWidget\Services\SessionService;
use Exception;

class ProductsImport implements OnEachRow, WithHeadingRow, WithEvents
{

	use Importable, RegistersEventListeners;

	private $total_rows;

	public function onRow(Row $row)
	{
		try  
		{
			$data = $this->parse($row->toArray());

			$data = $this->beforeSave($data);
			$product = ProductRepository::productByUniqueKeys($data['barcode']);
			if($product){
				$product = ProductRepository::update($product, $data);
				SessionService::updated('Product', 'import', true, 'Produto '.$product->id.' atualizado: '. json_encode($product->toJson())."\r\n");
			} else {
				$product = ProductRepository::store($data);
				SessionService::new('Product', 'import', true);
			}
			$this->afterSave($product, $data);
		} catch(Exception $e) {
			SessionService::failures('Product', 'import', true, $e->getMessage()."\r\n"); 
		}
		SessionService::completed('Product', 'import', ($row->getRowIndex()/$this->total_rows)*100); 
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
		return $product_category->id;	
	}


	private function beforeSave($data)
	{
		$data = collect($data);
		$results = event(new BeforeImportEvent($data));

		foreach ($results as $result) {
			$data = $data->merge($result);
		}
		return $data->toArray();
	}

	private function afterSave(Product $product, $data)
	{
		event(new AfterImportEvent($product, $data));
	}

	public static function beforeImport(BeforeImport $event)
	{
		SessionService::title('Product', 'import', 'Produtos'); 
		$cells = $event->getDelegate()->getActiveSheet()->toArray();
		$import = $event->getConcernable();
		$import->data($cells);
	}

	public function data($cells)
	{
		$this->total_rows = count($cells);
	}

}



/*
<?php

namespace Modules\Product\Imports;

use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Events\BeforeImport;
use Illuminate\Support\Facades\Storage;

use Modules\Product\Repositories\ProductRepository;
use Modules\Product\Repositories\ProductCategoryRepository;
use Modules\Product\Events\BeforeImportEvent;
use Modules\Product\Events\AfterImportEvent;
use Modules\Product\Entities\Product;
use Modules\DashboardPortal\Services\SessionService;
use Exception;

class ProductsImport implements OnEachRow, WithHeadingRow, WithEvents
{

	use Importable, RegistersEventListeners;

	private $total_rows;

	public function onRow(Row $row)
	{
		try  
		{
			$data = $this->parse($row->toArray());

			$data = $this->beforeSave($data);
			$product = ProductRepository::productByUniqueKeys($data['barcode']);
			if($product){
				ProductRepository::update($product, $data);
				SessionService::updated('Product@import', 1);
			} else {
				$product = ProductRepository::store($data);
				SessionService::new('Product@import', 1);
			}
			$this->afterSave($product, $data);
		} catch(Exception $e) {
			SessionService::failures('Product@import', 1); 
			$previus_content = '';
			if(Storage::exists('failures/Product@import'))
			{
				$previus_content = Storage::get('failures/Product@import');
			}
			Storage::put('failures/Product@import', $previus_content.$e->getMessage()."\r\n");
		}
		SessionService::completed('Product@import', ($row->getRowIndex()/$this->total_rows)*100); 
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
		return $product_category->id;	
	}


	private function beforeSave($data)
	{
		$data = collect($data);
		$results = event(new BeforeImportEvent($data));

		foreach ($results as $result) {
			$data = $data->merge($result);
		}
		return $data->toArray();
	}

	private function afterSave(Product $product, $data)
	{
		event(new AfterImportEvent($product, $data));
	}

	public static function beforeImport(BeforeImport $event)
	{
		$cells = $event->getDelegate()->getActiveSheet()->toArray();
		$import = $event->getConcernable();
		$import->data($cells);
	}

	public function data($cells)
	{
		$this->total_rows = count($cells);
	}

}
*/