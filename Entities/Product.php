<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Modules\Product\Entities\ProductCategory;
use Modules\Product\Entities\Product;
use Modules\Product\Events\ProductFillablesEvent;
use Modules\Product\Events\ProductFamilyAliasEvent;

use Rocky\Eloquent\HasDynamicRelation;

class Product extends Model
{
	use HasDynamicRelation;
	
	protected $fillable = ['id', 'sku', 'barcode', 'description', 'price', 'min_qty', 'discount_limit', 'multiple', 'product_category_id'];

	protected $appends = ['image'];


	public function __construct($attributes = array())
	{
		$this->fillableAppends();
		parent::__construct($attributes);
	}

	private function fillableAppends()
	{
		$fillables = collect($this->fillable);
		$fillable_appends = event(new ProductFillablesEvent());
		foreach ($fillable_appends as $fillable_append) 
		{
			$fillables = $fillables->merge($fillable_append);
		}
		$this->fillable = $fillables->toArray();
	}

	public function product_category()
	{
		return $this->belongsTo(ProductCategory::class);
	}

	

	public function family()
	{
		return $this->hasMany(Product::class, 'sku', 'sku');
	}

	public function getFamilyAliasAttribute()
	{
		$alias = '';

		$aliases = event(new ProductFamilyAliasEvent($this));
		foreach ($aliases as $sub_alias) {
			$alias.= $sub_alias.' - ';			
		}
		if($alias != '')
		{
			$alias = substr($alias, 0, (strlen($alias)-3));
		} else 
		{
			$alias = '';//$this->description;
		}

		return $alias;
	}


	public function getImageAttribute()
	{
		$extensions = ['jpg'];
		foreach ($extensions as $extension) {
			if(Storage::disk('public')->exists('produtos/'.$this->sku.'.'.$extension))
			{
				return 'storage/produtos/'.$this->sku.'.'.$extension; 
			} elseif(Storage::disk('public')->exists('produtos/'.$this->barcode.'.'.$extension))
			{
				return 'storage/produtos/'.$this->barcode.'.'.$extension;
			}
		}
		return 'modules/dashboard/img/noimage.png';
	}
}
