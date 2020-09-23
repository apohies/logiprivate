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

@can('crear_centro',new App\Administracion\Admincliente)
<div class="col-sm-6">
	<button type="button"  id="add" class="btn btn-success btn-rounded w-md m-b-5" onclick="abrir(this)">Crear Centro</button>
</div>
@endcan

<div class="col-sm-12">
	<div class="panel panel-bd lobidrag">
		<div class="panel-heading">
			<div class="panel-title">
				<h4> Listado </h4>
			</div>
		</div>
		<div class="panel-body">
			
			<div class="table-responsive">
				<table id="dataTableExample2" class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
                            <th>Estado</th>
							<th>Nombre</th>
							<th>Descripcion</th>
							<th>Periodo</th>
							<th>Gestion</th>
					
						
						</tr>
					</thead>
					<tbody>
                        @foreach($centros as $centro)
						<tr>
                            <td>{{$centro->estado}}</td>
                            <td>{{$centro->nombreCentro}}</td>
							<td>{{$centro->descripcionCentro}}</td>
                          
                            <td>{{$centro->periodo}}</td>
                            <td>
                                <a type="button" class="btn btn-labeled btn-warning m-b-5" href="#">
                                    <span class="btn-label"><i class="glyphicon glyphicon-bookmark"></i></span>Gestion
                                  </a>
                            </td>
						</tr>
                        @endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1 class="modal-title">Creacion Centro</h1>
			</div>
			<div class="modal-body">
                <form method="POST" action="{{route('centros.store')}}">  
                @csrf
				<div class="form-group">
					<label for="nombre">Nombre Centro costos</label>
					<input type="text" class="form-control" id="nombre" name="nombreCentro" required>
				</div>

                <div class="form-group">
                    <label for="exampleTextarea">Example textarea</label>
                    <textarea class="form-control" id="exampleTextarea" name="descripcionCentro" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleSelect1">Example select</label>
                    <select class="form-control" id="exampleSelect1" name="periodo">
                        <option value="quincenal">Quincenal</option>
                        <option value="mensual"> Mensual</option>
                    </select>
                </div>    


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-success" id="guardar">Save changes</button>
            </div>
        </form>
		</div>
	</div>
</div>

@endsection

@section('scripts')

<script>
function abrir(e)
{
    $("#myModal").modal("show");
}

</script>

@endsection