@extends('dashboard::layouts.master')

@section('content')

<div class="card">
	<div class="card-header">
		<i class="fa fa-edit"></i> Produto #{{ '1' }}
	</div>
	<div class="card-body">
		@include('dashboard::products.forms.form')
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
	Editar Produto
</li>
@endsection
