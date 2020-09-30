@extends('layouts.general')
@section('content')


<div class=content>
	<div class=content-header>
		<div class=header-icon>
			<i class=pe-7s-tools></i>
		</div>
		<div class=header-title>
			<h1>Unidad de negocio - {{$unidadNegocio->unidadNegocio}}</h1>
			<ol class=breadcrumb>
				<li><a href="{{route('home')}}"><i class=pe-7s-home></i> Clientes</a></li>
				<li class=active>Lista Clientes</li>
			</ol>
		</div>
	</div>
</div>

<div class="row">
<div class="col-sm-6">
	<button type="button"  id="add" class="btn btn-success btn-rounded w-md m-b-5"  data-id={{$unidadNegocio->id}} onclick="onmodalDependencia(this)">Crear Dependencia</button>
</div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="statistic-box statistic-filled-1">
            <h2><span >{{count($depedencias)}}</span> <span class="slight"></span></h2>
            <div class="small">Dependencias</div>
            <i class="ti-server statistic_icon"></i>
         
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="statistic-box statistic-filled-2">
            <h2><span >{{count($areas)}}</span> <span class="slight"></span> </h2>
            <div class="small">Areas</div>
            <i class="ti-user statistic_icon"></i>
           
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="statistic-box statistic-filled-3">
            <h2><span >789</span>K <span class="slight"></span></h2>
            <div class="small"> Empleados </div>
            <i class="ti-world statistic_icon"></i>
         
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="statistic-box statistic-filled-4">
            <h2><span >5489</span>$ <span class="slight"></span></h2>
            <div class="small">Ynenral</div>
            <i class="ti-bag statistic_icon"></i>
          
        </div>
    </div>
</div>  

<div class="panel panel-bd">

	<div class="panel-body">

        @foreach ($depedencias as $dependencia)
            
        <div class="panel panel-bd  col-md-4">
            <div class="panel-heading">
                <div class="panel-title">

                <h4>{{$dependencia->nombreDependencia}}</h4>
                
                 
                </div>
            </div>
            <div class="panel-body">
                <p> <strong>Direccion </strong>:  {{$dependencia->descripcionDependencia}}</p>

                Areas Asociadas <button type="button" class="btn btn-success w-md m-b-5" data-id="{{$dependencia->id}}" onclick="onmodal(this)" >Crear Area</button>

                <div class="dd" id="nestable2">
                    <ol class="dd-list">
                        <li class="dd-item">
                            @foreach($dependencia->areas as $key=>$area)
                        <div class="dd-handle"><strong>{{$key+1}}</strong> - {{$area->nombreArea}}</div>
                            @endforeach
                        </li>
                    </ol>
                </div>
            </div>
           
        </div>

        @endforeach

	</div>
	<div class="panel-footer">
		This is standard panel footer
	</div>
</div>


<div class="modal fade" id="myDependencia" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1 class="modal-title">Creación dependencia</h1>
			</div>
			<div class="modal-body">
                <form method="POST" id="formDependencia"  action="">  
                @csrf

                <div class="form-group">
                  <label for="nombre">Nombre Dependencia </label>
                  <input type="text" class="form-control" id="nombre" name="nombreDependencia" required>
                </div>

                <div class="form-group">
                  <label for="nombre"> Dirección Dependencia </label>
                  <input type="text" class="form-control" id="nombre" name="descripcionDependencia" required>
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


<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1 class="modal-title">Creación area</h1>
			</div>
			<div class="modal-body">
                <form method="POST" id="formArea"  action="">  
                @csrf

                <div class="form-group">
                  <label for="nombre">Nombre area </label>
                  <input type="text" class="form-control" id="nombre" name="nombreArea" required>
                </div>

                <div class="form-group">
                  <label for="nombre"> Dirección area </label>
                  <input type="text" class="form-control" id="nombre" name="descripcionArea" required>
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

    function onmodal(e)
    {  
        var dependencia=e.getAttribute('data-id');
        var ruta="{{asset('unidadnegocio/create/area')}}/"+dependencia;

        $('#formArea').attr('action',ruta);
         $('#myModal').modal('show');
   
    }

    function onmodalDependencia(e)
    {  
         var unidad=e.getAttribute('data-id');
         var ruta="{{asset('unidadnegocio/create/dependencia')}}/"+unidad;

         $('#formDependencia').attr('action',ruta);
         $('#myDependencia').modal('show');
   
    }

    function agregarArea(e)
    {
        //asociarArea
        var area=e.getAttribute('data-id');
        var ruta="{{asset('unidadnegocio/create/asignacionarea')}}/"+area;

        $('#formAgregarArea').attr('action',ruta);
        $('#myAgregararea').modal('show');
        
    }

   </script>
@endsection