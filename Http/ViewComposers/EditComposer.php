<?php

namespace Modules\Product\Http\ViewComposers;


use Modules\Dashboard\Services\ViewComposer\ServiceComposer;
use Modules\Product\Repositories\ProductCategoryRepository;


class EditComposer extends ServiceComposer {

    private $product;
    private $select_product_categories;

    public function assign($view){
        $this->product();
        $this->select_product_categories();
    }


    private function product(){
        $this->product = request()->route('product');
    }

    private function select_product_categories(){
        $this->select_product_categories = ProductCategoryRepository::toSelect('id', 'description');
    }


    public function view($view){
        $view->with('product', $this->product);
        $view->with('select_product_categories', $this->select_product_categories);
    }

}