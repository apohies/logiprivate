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
<!-- Inicio Vista principal -->

<div class="col-sm-6">
	<button type="button"  id="add" class="btn btn-success btn-rounded w-md m-b-5">Crear Cliente</button>
</div>

<div class="col-sm-12">
	<div class="panel panel-bd lobidrag">
		<div class="panel-heading">
			<div class="panel-title">
				<h4> Clientes Activos </h4>
			</div>
		</div>
		<div class="panel-body">

			<div class="table-responsive">
				<table id="dataTableExample2" class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>Nombre</th>
              <th>Email</th>
              <th>Cuenta</th>
              <th>Gestion </th>
						</tr>
					</thead>
					<tbody>
						<tr>
                @foreach($adminclientes as $cliente)
                  <td>{{$cliente->name}}</td>
                  <td>{{$cliente->email}}</td>
                  <td>{{$cliente->nombreAdmincliente}}</td>
                  <td><a type="button" class="btn btn-labeled btn-warning m-b-5" href="{{route('admincliente.adminCliente_modulos',$cliente->id)}}">
                    <span class="btn-label"><i class="glyphicon glyphicon-bookmark"></i></span>Modulos
				  </a> </td>
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
				<h1 class="modal-title">Creacion Cliente</h1>
			</div>
			<div class="modal-body">
			
				<div class="form-group">
					<label for="nombreAdmincliente">Nombre o refencia cliente</label>
					<input type="text" class="form-control" id="nombreAdmincliente" aria-describedby="emailHelp" placeholder="referencia cliente">
				</div>

				<div class="form-group">
					<label for="name">Nombre Administrador</label>
					<input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="nombre administrador">
				</div>

				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="ingres email">
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success" id="guardar">Save changes</button>
			</div>
		</div>
	</div>
</div>



@endsection
@section('scripts')

<script type="text/javascript">
	//MUESTRAR EL MODAL AGREGAR
	$("#add").on("click",function(){

    
		$("#myModal").modal("show");
	});

    $('#guardar').on('click', function(){

      data={
            nombreAdmincliente:document.getElementById('nombreAdmincliente').value,
            name:document.getElementById('name').value,
            email:document.getElementById('email').value,
            }

      $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
			});
			$.ajax({
                type: "POST",
                url: "{{route('admincliente.store')}}",
                dataType: 'json',
                data: data,
                success: function(data){
      
                if(data=='ya'){
                  location.reload(); 
                }
                },
                error: function (data){
                   
                }
            });

    })




  </script>



@endsection



