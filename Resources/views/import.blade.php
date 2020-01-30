@extends('dashboard::layouts.master')

@section('content')
@include('importwidget::index', ['module' => 'Product', 'method' => 'import', 'clear' => true, 'dropzone' => true])
<div class="col">
	<div id="dz-images" class="dropzone h-100"></div>
</div>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ route('dashboard') }}">Dashboard</a>
</li>
<li class="breadcrumb-item">
	Importar Clientes
</li>
@endsection



@push('styles')
{{ Html::style('modules/dashboard/dropzone/dropzone.css') }}
@endpush


@push('scripts')
{{ Html::script('modules/dashboard/dropzone/dropzone.js') }}


<script>
	Dropzone.autoDiscover = false;

	var dz_logo = new Dropzone('#dz-images', {
		url: '{{ route("products.import.images") }}',
		headers: {'X-CSRF-Token': "{{ csrf_token() }}"},
		dictDefaultMessage: '<h4>ARRASTE AS IMAGENS DOS PRODUTOS PARA O BOX</h4><h4>OU CLOQUE AQUI</h4><p>AS IMAGENS DEVE ESTAR NOMEADAS DE ACORDO COM A REFERÊNCIA DOS PRODUTOS E DEVE TER NO MÁXIMO 300x300 PIXELS EM ".jpg"</p>'
	});


</script>

@endpush
