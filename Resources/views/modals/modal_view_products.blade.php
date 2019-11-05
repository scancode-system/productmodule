@modal_view(['modal_id' => 'products_view_'.$product->id, 'edit_route' => 'products.edit', 'model_id' => $product->id])

@slot('title')
Produto #{{ $product->id }}
@endslot

<div class="d-flex justify-content-center mb-3">
	<img src="{{ url($product->image) }}" alt="..." class="img-thumbnail w-50">
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-4"><strong>Referência: </strong></div>
	<div class="col-md-4">{{ $product->sku }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-4"><strong>Descrição: </strong></div>
	<div class="col-md-4">{{ $product->description }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-4"><strong>Preço: </strong></div>
	<div class="col-md-4">@currency($product->price)</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-4"><strong>Categoria: </strong></div>
	<div class="col-md-4">{{ $product->product_category->description }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-4"><strong>Quantidade mínima: </strong></div>
	<div class="col-md-4">{{ $product->min_qty }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-4"><strong>Multiplo: </strong></div>
	<div class="col-md-4">{{ $product->multiple }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-4"><strong>Código de Barras: </strong></div>
	<div class="col-md-4">{{ $product->barcode }}</div>
</div>


@endmodal_view