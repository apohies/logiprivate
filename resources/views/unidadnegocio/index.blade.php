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
				<li><a href="{{route('home')}}"><i class=pe-7s-home></i> Unidades</a></li>
				<li class=active>Lista Unidades</li>
			</ol>
		</div>
	</div>
</div>
<div class="col-sm-6">
	<button type="button"  id="add" class="btn btn-success btn-rounded w-md m-b-5" onclick="abrir(this)">Crear Unidad</button>
</div>

<div class="col-sm-12">
	<div class="panel panel-bd lobidrag">
		<div class="panel-heading">
			<div class="panel-title">
				<h4> Unidades de negocio  </h4>
			</div>
		</div>
		<div class="panel-body">
			
			<div class="table-responsive">
				<table id="dataTableExample2" class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>Nombre Unidad</th>
							<th>Direccion Unidad</th>
							<th>Estado</th>
							<th>Acciones</th>
						
						</tr>
					</thead>
					<tbody>
            @foreach($unidades as $unidad)
						<tr>
              <td>{{$unidad->unidadNegocio}}</td>
							<td>{{$unidad->direccionNegocio}}</td>
							<td>{{$unidad->estado}}</td>
              <td><a type="button" class="btn btn-labeled btn-warning m-b-5" href="{{route('unidadnegocio.gestion',$unidad->id)}}">
                <span class="btn-label"><i class="glyphicon glyphicon-bookmark"></i></span>Gestion
              </a></td>
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
				<h1 class="modal-title">Creación unidad negocio</h1>
			</div>
			<div class="modal-body">
                <form method="POST" action="{{route('unidadnegocio.store')}}">  
                @csrf
                <div class="form-group">
                  <label for="nombre">Nombre Unidad </label>
                  <input type="text" class="form-control" id="nombre" name="unidadNegocio" required>
                </div>

                <div class="form-group">
                  <label for="nombre"> Dirección Unidad </label>
                  <input type="text" class="form-control" id="nombre" name="direccionNegocio" required>
                </div>

                <div class="form-group">
                  <label for="nombre"> Código Unidad </label>
                  <input type="text" class="form-control" id="nombre" name="unidadCodigo">
                  <span>Opcional</span>
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


// llamado  del modal para crear una nueva unidad de negocio
$('#add').on('click',function(){

    $('#myModal').modal('show');


});


</script>

@endsection
