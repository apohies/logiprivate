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


<div class="panel panel-bd lobidisable">
	<div class="panel-heading">
		<div class="panel-title">
			<h4>Selector modulos</h4>
		</div>
	</div>
	<div class="panel-body">

	<form  method="POST" action="{{route('admincliente.admincliente_storemodulos',$admincliente)}}">
		@csrf	
		@foreach($modulos as $key => $modulo)
		
		<div class="checkbox checkbox-success">
		<input id='checkbox{{$key}}' type="checkbox"  class="modelos" value="{{$modulo->id}}" data-modulo="{{$modulo->id}}" name="modulos[]">
			<label for="checkbox{{$key}}">{{$modulo->nombreModulo}}</label>
		</div>
		@endforeach
	</div>
	<div class="panel-footer">
		<button type="submit" class="btn btn-success w-md m-b-5">Confirmar</button>
	</div>
</div>

@endsection


    @section('scripts')
     <script type="text/javascript">

        $(document).ready(function() {

         
          var activos= @JSON($moduloActivos);
          var elementos = document.getElementsByClassName('modelos');
			
          console.log(elementos);
          
          for(var i=0; i < elementos.length ; i++)
          {
            for(var j=0; j< activos.length; j++){
             if(parseInt(elementos[i].getAttribute('data-modulo')) == activos[j].modulo_id )
             {
               elementos[i].setAttribute('checked','cheaked');
             }

               
            }
          }

        });
     
       </script>

    @endsection