<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Modules\Product\Entities\ProductCategory;

use Rocky\Eloquent\HasDynamicRelation;

class Product extends Model
{
	use HasDynamicRelation;
	
	protected $guarded = [];

	protected $appends = ['image'];

	public function product_category()
	{
		return $this->belongsTo(ProductCategory::class);
	}


	public function getImageAttribute()
	{
		$extensions = ['jpg'];
		foreach ($extensions as $extension) {
			if(Storage::disk('public')->exists('produtos/'.$this->sku.'.'.$extension)){
				return 'storage/produtos/'.$this->sku.'.'.$extension; 
			}	
		}
		return 'modules/dashboard/img/noimage.png';
	}
}
