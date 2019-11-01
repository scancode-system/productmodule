<tr>
	<td>
		<img src="https://www.e-cadeiras.com.br/ccstore/v1/images/?source=/file/v4727738909922050738/products/EC000013173%20-%20CADEIRA%20PRESIDENTE%20CORINTO%20CINZA%20E%20BRANCA-1.jpg&height=777&width=585" alt="..." class="img-thumbnail" style="height: 75px;">
	</td>
	<td class="align-middle">{{ 'CADDXFS200' }}</td>
	<td class="align-middle">{{ 'Cadeira DXRacer Serie - F (Azul)' }}</td>
	<td class="align-middle">
		@currency(1567.45)
	</td>
	<td class="align-middle">{{ 'Prato' }}</td>
	<td class="text-right align-middle">
		<div class="btn-group" role="group" aria-label="Basic example">
			<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#products_view_1"><i class="fa fa-eye"></i></button>
			<a href="{{ route('products.edit', 1) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
			<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#products_destroy_1"><i class="fa fa-trash-o"></i></button>
		</div>
	</td>
	@include('dashboard::products.modals.modal_view_products')
	@modal_destroy(['route_destroy' => 'products.destroy', 'model' => 1, 'modal_id' => 'products_destroy_1'])
</tr>