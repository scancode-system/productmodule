@alert_errors()
@if(isset($product))
{{ Form::model($product, ['route' => ['products.update', $product], 'method' => 'put']) }}
{{ Form::hidden('id', $product->id) }}
@else
{{ Form::open(['route' => 'products.store']) }}
@endif
@alert_success()

<div class="row">
	<div class="col">
		<div class="form-group">
			{{ Form::label('sku', 'Referência') }}
			{{ Form::text('sku', old('sku'), ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('barcode', 'Código de Barras') }}
			{{ Form::text('barcode', old('barcode'), ['class' => 'form-control']) }}
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
			{{ Form::label('product_category_id', 'Categoria') }}
			<div class="input-group">
				<span class="input-group-prepend" data-toggle="modal" data-target="#modal_create_product_categories">
					{{ Form::button('<i class="fa fa-plus-square-o"></i>', ['class' => 'btn btn-primary']) }}
				</span>
				{{ Form::select('product_category_id', $select_product_categories, old('product_category_id'), ['class' => 'form-control', 'placeholder' => 'Selecione uma categoria']) }}
			</div>
		</div>	
	</div>
	<div class="col">
		<div class="form-group">
			{{ Form::label('min_qty', 'Quantidade Mínima') }}
			{{ Form::number('min_qty', old('min_qty'), ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('multiple', 'Múltiplo') }}
			{{ Form::number('multiple', old('multiple'), ['class' => 'form-control']) }}
		</div>
		@if(isset($product))
		<div class="d-flex flex-column flex-md-row">
			<img src="{{ url($product->image) }}" alt="..." class="img-thumbnail mr-md-4 mb-3 mb-md-0" style="height: 200px;">
			<div id="dz-image" class="dropzone" style="display: inline-block; height:200px;"></div>
		</div>
		@endif
	</div>
</div>
<div class="form-group">
	{{ Form::button('<i class="fa fa-save"></i><span>Salvar</span>', ['class' => 'btn btn-brand btn-primary', 'type' => 'submit']) }}
</div>
{{ Form::close() }}
@include('product::modals.modal_create_product_categories')


@if(isset($product))
@push('styles')
{{ Html::style('modules/dashboard/dropzone/dropzone.css') }}
@endpush


@push('scripts')
{{ Html::script('modules/dashboard/dropzone/dropzone.js') }}


<script>
	Dropzone.autoDiscover = false;

	var dz_logo = new Dropzone('#dz-image', {
		url: '{{ route("products.store.image", $product) }}',
		headers: {'X-CSRF-Token': "{{ csrf_token() }}"},
		dictDefaultMessage: 'Upload da Imagem do Produto',
		success: function(file, response, xhr){
            window.location.replace("{{ route('products.edit', $product) }}");
        }
	});	
</script>

@endpush
@endif
