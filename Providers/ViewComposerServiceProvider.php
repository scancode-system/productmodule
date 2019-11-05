<?php

namespace Modules\Product\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class ViewComposerServiceProvider extends ServiceProvider {

	public function boot() {
		View::composer('product::index', 'Modules\Product\Http\ViewComposers\IndexComposer');
		View::composer('product::create', 'Modules\Product\Http\ViewComposers\CreateComposer');
		View::composer('product::edit', 'Modules\Product\Http\ViewComposers\EditComposer');
	}

	public function register() {
        //
	}

}
