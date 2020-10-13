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
				<li><a href="{{route('home')}}"><i class=pe-7s-home></i> Contrato</a></li>
				<li class=active>Lista Clausulas</li>
			</ol>
		</div>
	</div>
</div>




<div class="col-sm-12">
	<div class="panel panel-bd lobidrag">
		<div class="panel-heading">
			<div class="panel-title">
            <h4> Lista Clausulas Asociadas  al contrato : {{$contrato->nombreContrato}}</h4>
			</div>
		</div>
		<div class="panel-body">
			
			<div class="table-responsive">
				<table id="dataTableExample2" class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>Nombre</th>
                            <th>Descripción</th>
                            <th>Descripción completa</th>
					
						</tr>
					</thead>
					<tbody>

                        @foreach ($clausulas as $item)
						<tr>
                        <td>{{$item->nombreClausula}}</td>
                        <td>{{$item->descripcionCorta}}</td>
                        <td>{{$item->descripcionCompleta}}</td>	
                        </tr>
                            
                        @endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
    
@endsection