<?php

namespace Modules\Product\Http\ViewComposers;


use Modules\Dashboard\Services\ViewComposer\ServiceComposer;
use Modules\Product\Repositories\ProductCategoryRepository;


class CreateComposer extends ServiceComposer {

    private $select_product_categories;

    public function assign($view){
        $this->select_product_categories();
    }


    private function select_product_categories(){
        $this->select_product_categories = ProductCategoryRepository::toSelect('id', 'description');
    }


    public function view($view){
        $view->with('select_product_categories', $this->select_product_categories);
    }

}