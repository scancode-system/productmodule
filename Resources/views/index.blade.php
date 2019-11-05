@extends('dashboard::layouts.master')

@section('content')

<div class="card">
	@header_search_add(['search' => $search, 'route_search' => 'products.index', 'route_add' => 'products.create'])
	<div class="card-body">
		@alert_success()
		<table class="table table-responsive-sm bg-white table-hover border">
			@include('product::tables.thead')
			<tbody>
				@each('product::tables.tr', $products, 'product')
			</tbody>
		</table>
		{{ $products->links() }}
	</div>
</div>

@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ route('dashboard') }}">Dashboard</a>
</li>
<li class="breadcrumb-item">
	Produtos
</li>
@endsection
