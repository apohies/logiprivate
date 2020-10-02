@extends('layouts.master')
@section('content')

<div><!--<div class="row">-->
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
          @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
          @endif
          <ol class="breadcrumb"  style="font-size: 11px!important;">
              <li><a class="active" style="color: #999!important"> Configuración General / Empleados</li>
          </ol>
          <div class="block-header" style="padding: 20px;margin: 0px;">
              <h2 style="font-size: 24px;font-weight: bold;">
                Lista Empleados
              </h2>
          </div>
          <div class="body">
              <!-- BOTONERA -->
              <div class="botonera">
                <img src="{{asset('iconos/diagrama/iconosinternos/mas/masazul.png')}}" width="42px" id="add"
                  title="Agregar" class="boton">
                <img src="{{asset('iconos/diagrama/iconosinternos/ayuda/ayudaverde.png')}}" width="42px" id="help"
                  title="Ayuda" class="boton">
                <img src="{{asset('iconos/diagrama/iconosinternos/basura/basurarojo.png')}}" width="42px"
                  id="prueba" title="Eliminar" class="boton">
              </div>
              <!-- END BOTONERA -->
              <div class="table-responsive">
                  <table class="table table-striped table-hover" id="datatable" width="100%">
                      <thead style="background: #DCECEA" >
                        <tr>
                          <th> Nombres Empleado</th>
                          <th>E-mail</th>
                          <th>Cargo</th>
                          <th>Roles</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
          
                        @foreach($empleados as $user) 
                        <tr>
                        <td>{{$user->name}} {{$user->apellido}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->cargo}}</td>
                        
                        <td>@foreach($user->roles as $role)
                           <span class="label label-default role-label"> {{$role->name}}</span>
                          @endforeach</td>
            
                          <td>  
                                <button class="btn btn-warning btn-xs editar_empleado1" data-empleado="{{$user->id}}" > Editar</button>
                                 
                                  @if($user->cargo != 'Administrador General')
                                  <button class="btn btn-danger btn-xs bloquearEmpleado1" data-id="{{$user->id}}" > Desactivar</button>
                               
                                  @endcan
                            </td>       
                        </tr>
                        @endforeach 
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
</div>




      <div id="editar_empleado2" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"><i class="fa fa-pencil"></i> Editar Empleado</h4>
            </div>
            <div class="modal-body">
            <form  method="POST" id="form_editar_empleado" action="" >
              @csrf
                <div class="box-body">
                  <div class="form-group">
                    <label >Nombres</label>
                    <input type="text" class="form-control" id="editar_empleado_nombre" placeholder="Ingrese Nombre del empleado"  name="name" required>
                  </div>
      
                  <div class="form-group">
                      <label >Apellidos</label>
                      <input type="text" class="form-control" id="editar_empleado_apellido"placeholder="Ingrese Nombre del empleado"  name="apellido" required>
                    </div>
      
                  <div class="form-group">
                      <label >Correo Electrónico</label>
                      <input type="text" class="form-control" id="editar_empleado_email" placeholder="Ingrese Correo electronico" name="email"  required>
                    </div>
      
                    <div class="form-group">
                        <label >Cargo</label>
                        <input type="text" class="form-control"id="editar_empleado_cargo" placeholder="Ingrese el cargo" name="cargo" required>
                      </div>
      
                    <div class="form-group">
                    <label> Roles</label>
                    <select class="form-control select2" multiple="multiple" id="editar_empleado_roles" name="roles[]" style="width: 60%;" >
                        </select>
                  </div>
                  <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                  </form>
                    <div>
            </div>

            </div>
          </div>
      
        </div>
      </div>
   
  </div>


  <div id="crear_empleado" class="modal fade" role="dialog" >
    <div class="modal-dialog" >
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4>Crear Empleado</h4>
        </div>
        <div class="modal-body ">
        <form  method="POST" id="form_editar_empleado" action="">
          @csrf
            <div class="box-body">
              <div class="form-group col-md-6">
                <label >Nombres</label><span style="color:red"> *</span>
                <input type="text" class="form-control" id="nombreEmpleado" placeholder="Ingrese Nombre del empleado"  name="name" required>
              </div>
              <div class="form-group col-md-6">
                  <label >Apellidos</label><span style="color:red"> *</span>
                  <input type="text" class="form-control" id="apellidoEmpleado"placeholder="Ingrese Apellido del empleado"  name="apellido" required>
                </div>
              <div class="form-group col-md-6">
                  <label >Correo Electrónico</label><span style="color:red"> *</span>
                  <input type="text" class="form-control" id="emailEmpleado" placeholder="Ingrese Correo electronico" name="email"  required>
                </div>

               
                <div class="form-group col-md-6">
                    <label >Cargo</label><span style="color:red">*</span>
                    <input type="text" class="form-control"id="cargoEmpleado" placeholder="Ingrese el cargo" name="cargo" required>
                  </div>

                  <div class="form-group col-md-6">
                    <label> Roles</label><span style="color:red">*</span>
                    <select class="form-control select2" multiple="multiple"  id="roles" name="role[]" style="width: 60%;" >
                        @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->display_name}}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="modal fade" tabindex="-1" role="dialog" id="spinnerModal">
                    <div class="modal-dialog modal-dialog-centered text-center" role="document">
                        <span class="fa fa-spinner fa-spin fa-3x w-100">leando</span>
                    </div>
                  </div>

              <div class="box-footer">
                  <button type="button" id="CrearEmpleado" class="btn btn-primary " onclick="modal();">Crear</button>
                </div>
              </form>
                <div>
        </div>

        </div>
      </div>
  
    </div>
  </div>





  <div id="bloquearEmpleado2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Confirmación Acción</h4>
      </div>
      <div class="modal-body">
          <p> Al realizar esa acción el empleado perdera todos roles y permisos, ademas sus datos se convertiran en historicos<p>
        <form id="bloquearEmpleado3" method="POST" action="">
          <div class="box-body">
         @csrf
           
          <!-- /.box-body -->
          </div>
          <div class="box-footer">
            <button  type="button" class="btn btn-primary">Aceptar</button>
          </div>
        </form>
        
      </div>

    </div>

  </div>
</div>

<!-- Prueba -->

@endsection

@section('scripts')

<script>


    $('#prueba').on('click',function(){
    $('#Prueba_modal').modal('show');
    });

  $('#add').on('click',function(){
    $('#crear_empleado').modal('show');
  });

  $('#CrearEmpleado').on('click',function(){

    data={
          name:document.getElementById('nombreEmpleado').value,
          apellido:document.getElementById('apellidoEmpleado').value,
          email:document.getElementById('emailEmpleado').value,
          cargo:document.getElementById('cargoEmpleado').value,
          roles:$('#roles').val()
          }

    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

    $.ajax({
				type:"POST",
        url:"{{route('empleadosadmincliente.store')}}",
        dataType: "json",
        data:data,
				success: function(data){

          if(data=="creado"){
            location.reload(true);
          }
				},
				error: function (data){

				}
			});


  });
   </script>  
   
   
   <script>
   
   

      $('.editar_empleado1').on('click',function(){

        var id=$(this).attr('data-empleado');

        $.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});


        $.ajax({
				type: "GET",
        url:"{{asset('empleados/cliente/ver/')}}/"+$(this).attr('data-empleado'),
        dataType: "json",
			
				success: function(data){

          $('#form_editar_empleado').attr('action',"{{asset('empleados/cliente/update')}}/"+id); 
         $('#editar_empleado_nombre').val(data.usuario.name);
         $('#editar_empleado_apellido').val(data.usuario.apellido);
         $('#editar_empleado_apellido').val(data.usuario.apellido);
         $('#editar_empleado_email').val(data.usuario.email);
         $('#editar_empleado_cargo').val(data.empleado.cargo);

         
          
         $('#editar_empleado_roles').empty();
         $.each(data.roles,function(key, rol) {
              $("#editar_empleado_roles").append('<option selected="selected" value='+rol.id+'>'+ rol.display_name + " </option>");
                });

                $.each(data.libres,function(key, rol) {
              $("#editar_empleado_roles").append('<option  value='+rol.id+'>'+ rol.display_name + " </option>");
                });

             

         $('#editar_empleado2').modal('show');



				},
				error: function (data){

         
					
				}
			});



      });


    
   
   </script>


<script>

    $('.bloquearEmpleado1').on('click',function(){

        var id=$(this).attr('data-id');
        var ruta="{{asset('/roles/personal/borrar/')}}/"+id;
        $('#bloquearEmpleado3').attr('action',ruta)
        $('#bloquearEmpleado2').modal('show');
    })




</script>

@endsection

