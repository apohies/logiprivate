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
			<h3> Información bancaria y restaciones social</h3>

			<p>Entendemos que  no siempre se cuenta con esta  información para completar el registro del empleado. pero es de vital importancia completar esta lo mas pronto posible.  </p>
		</div>
	</div>
	<div class="panel-body">
    <form method="POST" action="#">



		<div class="row">
			<div class="form-group col-md-3">
			  <label for="exampleInputEmail1"> Entidad promotora salud  <span style="color:red">*</span></label>
			  <select class="form-control"  name="salud" required>
				<option  value=""  selected>Opcion</option>
				@foreach ($saluds as $item)
					<option value="{{$item->id}}">{{$item->nombreEntidad}}</option>
				@endforeach
			  </select>
			</div>
	  
			<div class="form-group col-md-3">
			  <label for="exampleInputFile">Anexo EPS</label>
			  <input type="file" id="exampleInputFile" aria-describedby="fileHelp">
			  <small id="fileHelp" class="text-muted">anexo soporte </small>
		  </div>
	  
		  <div class="form-group col-md-3">
			<label for="exampleInputEmail1"> Administradora riesgos profesionales  <span style="color:red">*</span></label>
			<select class="form-control"  name="arl" required>
			  <option  value=""  selected>Opcion</option>
			  @foreach ($arls as $item)
				  <option value="{{$item->id}}">{{$item->nombreEntidad}}</option>
			  @endforeach
			</select>
		  </div>
	  
		  <div class="form-group col-md-3">
			<label for="exampleInputFile">Anexo ARL</label>
			<input type="file" id="exampleInputFile" aria-describedby="fileHelp">
			<small id="fileHelp" class="text-muted">anexo soporte </small>
		</div>
			
	  
	  
		  </div>
	  
	  
		  <div class="row">
	  
			<div class="form-group col-md-3">
			  <label for="exampleInputEmail1"> Administradora fondo pensional  <span style="color:red">*</span></label>
			  <select class="form-control"  name="pensiones" required>
				<option  value=""  selected>Opcion</option>
				@foreach ($pensiones as $item)
					<option value="{{$item->id}}">{{$item->nombreEntidad}}</option>
				@endforeach
			  </select>
			</div>
	  
			<div class="form-group col-md-3">
			  <label for="exampleInputFile">Anexo EPS</label>
			  <input type="file" id="exampleInputFile" aria-describedby="fileHelp">
			  <small id="fileHelp" class="text-muted">anexo soporte </small>
		  </div>
	  
		  <div class="form-group col-md-3">
			<label for="exampleInputEmail1"> Administradora fondo cesantias  <span style="color:red">*</span></label>
			<select class="form-control"  name="cesantias" required>
			  <option  value=""  selected>Opcion</option>
			  @foreach ($pensiones as $item)
				  <option value="{{$item->id}}">{{$item->nombreEntidad}}</option>
			  @endforeach
			</select>
		  </div>
	  
		  <div class="form-group col-md-3">
			<label for="exampleInputFile">Anexo ARL</label>
			<input type="file" id="exampleInputFile" aria-describedby="fileHelp">
			<small id="fileHelp" class="text-muted">anexo soporte </small>
		</div>
			
	  
	  
		  </div>
        
	</div>
	<div class="panel-footer">
		This is standard panel footer
    </div>
</form>
</div>

@endsection
