@modal_view(['modal_id' => 'products_view_1', 'edit_route' => 'dashboard', 'model_id' => '2'])

@slot('title')
Produto #{{ '1' }}
@endslot

<div class="d-flex justify-content-center mb-3">
	<img src="https://www.e-cadeiras.com.br/ccstore/v1/images/?source=/file/v4727738909922050738/products/EC000013173%20-%20CADEIRA%20PRESIDENTE%20CORINTO%20CINZA%20E%20BRANCA-1.jpg&height=777&width=585" alt="..." class="img-thumbnail w-50">
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-4"><strong>Referência: </strong></div>
	<div class="col-md-4">{{ 'CAC055' }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-4"><strong>Descrição: </strong></div>
	<div class="col-md-4">{{ 'Copo de vidro 200ml' }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-4"><strong>Preço: </strong></div>
	<div class="col-md-4">@currency(1567.45)</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-4"><strong>Categoria: </strong></div>
	<div class="col-md-4">{{ 'Pratos' }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-4"><strong>Quantidade mínima: </strong></div>
	<div class="col-md-4">{{ '3' }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-4"><strong>Multiplo: </strong></div>
	<div class="col-md-4">{{ '2' }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-4"><strong>Desconto Máximo: </strong></div>
	<div class="col-md-4">{{ 'CAC055' }}</div>
</div>
<div class="row justify-content-center mb-1">
	<div class="col-md-4"><strong>Código de Barras: </strong></div>
	<div class="col-md-4">{{ '13453253554' }}</div>
</div>


@endmodal_view