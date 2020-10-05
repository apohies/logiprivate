@extends('layouts.general')

@section('content')

<div class=content>
	<div class=content-header>
		<div class=header-icon>
			<i class=pe-7s-tools></i>
		</div>
		<div class=header-title>
			<h1>Administracion</h1>
			<ol class=breadcrumb>
				<li><a href="{{route('home')}}"><i class=pe-7s-home></i> Clientes</a></li>
				<li class=active>Lista Clientes</li>
			</ol>
		</div>
	</div>
</div>

<div class="col-sm-6">
<a href="{{route('contratacion.createContrato')}}" id="add" class="btn btn-success btn-rounded w-md m-b-5" >Crear Contrato</a>
</div>




<div class="col-sm-12">
	<div class="panel panel-bd lobidrag">
		<div class="panel-heading">
			<div class="panel-title">
				<h4> Listado contratos </h4>
			</div>
		</div>
		<div class="panel-body">
			
			<div class="table-responsive">
				<table id="dataTableExample2" class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
                            <th>Nombre</th>
                            <th>Tipo </th>
                            <th>Código</th>
                            <th>Descripción</th>
							
						
						
						
						</tr>
					</thead>
					<tbody>
                        @foreach ($contratos as $item)
						<tr>
                                <td>{{$item->nombreContrato}}</td>
                                <td>{{$item->nombreTipocontrato}}</td>
                                <td>{{$item->codigoContrato}}</td>
                                <td>{{$item->descripcionContrato}}</td>
						
                        </tr>
                        @endforeach
                        
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
    
@endsection