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


<div class="col-sm-12">
	<div class="panel panel-bd lobidrag">
		<div class="panel-heading">
			<div class="panel-title">
				<h4> Lista empleados sin asignación </h4>
			</div>
		</div>
		<div class="panel-body">
			
			<div class="table-responsive">
				<table id="dataTableExample2" class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>Nombres</th>
							<th>Apellidos</th>
							<th>Email</th>
							<th>Tipo Documento</th>
							<th> Número documento</th>
							<th>Fecha Registro</th>
							<th>Acciones<th>
						</tr>
					</thead>
					<tbody>

                        @foreach ($empleados as $item)
                            
						<tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->apellido}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->tipoDocumento}}</td>
                            <td>{{$item->tipoDocumento}}</td>
                            <td>{{$item->numeroDocumento}}</td>
							<td>{{$item->created_at}}</td>
						<td> <a href="{{route('home')}}" class="btn btn-labeled btn-warning m-b-5">
								<span class="btn-label"><i class="glyphicon glyphicon-bookmark"></i></span>Bookmark
							</a></td>
                        </tr>
                        
                        @endforeach

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
    
@endsection