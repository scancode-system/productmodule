@alert_errors()
@if(isset($product))
{{ Form::open($product, ['route' => ['products.update', $product], 'method' => 'put']) }}
@else
{{ Form::open(['route' => 'products.store']) }}
@endif
<div class="form-group">
	{{ Form::label('sku', 'Referência') }}
	{{ Form::text('sku', old('sku'), ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('description', 'Descrição') }}
	{{ Form::text('description', old('description'), ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('price', 'Preço') }}
	{{ Form::number('price', old('price'), ['class' => 'form-control', 'step' => '0.1']) }}
</div>
<div class="form-group">
	{{ Form::label('product_category_id', 'Categoría') }}
	{{ Form::select('product_category_id', ['Selecione uma categoría', 1,2,3,4], old('product_category_id'),['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('min_qty', 'Quantidade Mínima') }}
	{{ Form::number('min_qty', old('min_qty'), ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('multiple', 'Múltiplo') }}
	{{ Form::number('multiple', old('multiple'), ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('max_disc', 'Disconto Máximo') }}
	{{ Form::number('max_disc', old('max_disc'), ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('barcode', 'Código de Barras') }}
	{{ Form::text('barcode', old('barcode'), ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::button('<i class="fa fa-save"></i><span>Salvar</span>', ['class' => 'btn btn-brand btn-primary', 'type' => 'submit']) }}
</div>
{{ Form::close() }}
<div class="alert alert-info mb-0" role="alert">
	<strong>Observações:</strong>
	<ol class="mb-0">
		<li>Números decimais são separados por ponto "." (ponto).</li>
	</ol>
</div>
