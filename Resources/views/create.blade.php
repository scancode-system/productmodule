@extends('dashboard::layouts.master')

@section('content')

<div class="card">
	<div class="card-header">
		<i class="fa fa-plus-square-o"></i> Novo Produto
	</div>
	<div class="card-body">
		@include('product::forms.form')
		@loader(['loader_path' => 'products.create'])
	</div>
</div>

@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ route('dashboard') }}">Dashboard</a>
</li>
<li class="breadcrumb-item">
	<a href="{{ route('products.index') }}">Produtos</a>
</li>
<li class="breadcrumb-item">
	Adicionar Produto
</li>
@endsection
