<tr>
	<td>
		<img src="{{ url($product->image) }}" alt="..." class="img-thumbnail" style="height: 75px;">
	</td>
	<td class="align-middle">{{ $product->sku }}</td>
	<td class="align-middle">{{ $product->description }}</td>
	<td class="align-middle">
		@currency($product->price)
	</td>
	<td class="align-middle">{{ $product->product_category->description }}</td>
@loader(['loader_path' => 'products.tr'])
	<td class="text-right align-middle">
		<div class="btn-group" role="group" aria-label="Basic example">
			<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#products_view_{{ $product->id }}"><i class="fa fa-eye"></i></button>
			<a href="{{ route('products.edit', $product) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
			<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#products_destroy_{{ $product->id }}"><i class="fa fa-trash-o"></i></button>
		</div>
	</td>
	@include('product::modals.modal_view_products')
	@modal_destroy(['route_destroy' => 'products.destroy', 'model' => $product, 'modal_id' => 'products_destroy_'.$product->id])
</tr>