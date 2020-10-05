@extends('layouts.general')

@section('content')

<div class=content>
	<div class=content-header>
		<div class=header-icon>
			<i class=pe-7s-tools></i>
		</div>
		<div class=header-title>
			<h1>Clausulas</h1>
			<ol class=breadcrumb>
				<li><a href="{{route('home')}}"><i class=pe-7s-home></i> Clientes</a></li>
				<li class=active>Lista Clientes</li>
			</ol>
		</div>
	</div>
</div>

<div class="col-sm-6">
<a class="btn btn-success btn-rounded w-md m-b-5"  href="{{route('contratacion.createClausula')}}"">Crear Clausula</a>
</div>

<div class="col-sm-12">
	<div class="panel panel-bd lobidrag">
		<div class="panel-heading">
			<div class="panel-title">
				<h4> Listado Clausulas </h4>
			</div>
		</div>
		<div class="panel-body">
			
			<div class="table-responsive">
				<table id="dataTableExample2" class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
                            <th>#</th>
							<th>Nombre </th>
							<th>Descripción corta</th>
						</tr>
					</thead>
					<tbody>
                        @foreach ($clausulas as $key => $item)
						<tr>
                            <td>{{$key+1}}</td>
                            <td>{{$item->nombreClausula}}</td>
                            <td>{{$item->descripcionCorta}}</td>
						
						</tr>
                            
                        @endforeach

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
    
@endsection