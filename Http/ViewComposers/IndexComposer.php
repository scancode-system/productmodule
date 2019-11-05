<?php

namespace Modules\Product\Http\ViewComposers;

use Modules\Dashboard\Services\ViewComposer\ServiceComposer;
use Modules\Product\Repositories\ProductRepository;

class IndexComposer extends ServiceComposer {

    private $search;
    private $products;

    public function assign($view){
        $this->search();
        $this->products();
    }


    private function search(){
        if(isset(request()->search)){
            $this->search = request()->search;
        } else {
            $this->search = '';
        }
    }


    private function products(){
        $this->products = ProductRepository::list($this->search);
    }


    public function view($view){
        $view->with('products', $this->products);
        $view->with('search', $this->search);
    }

}