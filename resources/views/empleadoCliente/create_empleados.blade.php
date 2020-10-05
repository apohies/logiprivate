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
			<h4>Registro empleado</h4>
		</div>
	</div>
	<div class="panel-body">

    <form  method="POST" action="{{route('empleadosadmincliente.store')}}">  
      <div class="row">
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Nombres empleado <span style="color:red">*</span></label>
            <input type="text" class="form-control" name="name" required >
        </div>

        <div class="form-group col-md-6">
          <label for="exampleInputEmail1"> Apellido empleado <span style="color:red">*</span></label>
          <input type="text" class="form-control" name="apellido"  required >
      </div>
    </div>

    <div class="row">


      @csrf
      <div class="form-group col-md-4">
        <label for="exampleInputEmail1">Tipo de identificación <span style="color:red">*</span></label>
        <select class="form-control" required name="tipoIdentificacion" required>
          <option value="" selected>Opcion</option>
          @foreach ($tipodocumentos as $item)
              <option value="{{$item->id}}">{{$item->tipoDocumento}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group col-md-4">
          <label for="exampleInputEmail1"> Número idenficación <span style="color:red">*</span></label>
          <input type="text" class="form-control" name="numeroIdentificacion" aria-describedby="emailHelp" required>
      </div>

      <div class="form-group col-md-4">
        <label for="exampleInputEmail1"> Email <span style="color:red">*</span></label>
        <input type="text" class="form-control" name="email" aria-describedby="emailHelp" required >
      </div>

    </div>

    <div class="row">

        <div class="form-group col-md-4">
        <label for="exampleInputEmail1"> Pais Nacimiento <span style="color:red">*</span></label>
        <select class="form-control"  name="paisNacimiento" required onchange="cambioPais(this)">
          <option value=""  selected>Opcion</option>
          @foreach ($paises as $item)
              <option value="{{$item->id}}">{{$item->nombrePais}}</option>
          @endforeach
        </select>
        </div>

        <div  id="departamentoInterno" class="form-group col-md-4" style="display: none;">
        <label for="exampleInputEmail1"> Departamento nacimiento <span style="color:red">*</span></label>
        <select class="form-control" id="inputInterno" name="departamentoNacimiento" required >
          <option  value=""  selected>Opcion</option>
          @foreach ($departamentos as $item)
              <option value="{{$item->nombreDepartamento}}">{{$item->nombreDepartamento}}</option>
          @endforeach
        </select>
        </div>

        <div class="form-group col-md-4" id="departamentoExterno" style="display: none;">
          <label for="exampleInputEmail1"> Departamento / Estado nacimiento <span style="color:red">*</span></label>
          <input type="text" id="inputExterno" class="form-control" name="departamentoNacimiento" aria-describedby="emailHelp" required >
        </div>

        <div class="form-group col-md-4">
          <label for="exampleInputEmail1"> Ciudad / Municipio Nacimiento <span style="color:red">*</span></label>
          <input type="text" class="form-control" name="ciudadNacimiento" aria-describedby="emailHelp" required>
        </div>
    </div>


    <div class="row">

      <div class="form-group col-md-4">
        <label for="exampleInputEmail1"> Departamento Residencia <span style="color:red">*</span></label>
        <select class="form-control"  name="departamentoResidencia" required>
          <option value=""  selected>Opcion</option>
          @foreach ($departamentos as $item)
              <option value="{{$item->id}}">{{$item->nombreDepartamento}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group col-md-4">
        <label for="exampleInputEmail1"> Ciudad / Municipio Residencia <span style="color:red">*</span></label>
        <input type="text" class="form-control" name="ciudadResidencia" aria-describedby="emailHelp" required>
      </div>

      <div class="form-group col-md-4">
        <label for="exampleInputEmail1"> Dirección Residencia <span style="color:red">*</span></label>
        <input type="text" class="form-control" name="ciudadResidencia" aria-describedby="emailHelp" required>
      </div>

     
    </div>

    <div class="row">

      <div class="form-group col-md-3">
        <label for="exampleInputEmail1"> Estado civil <span style="color:red">*</span></label>
        <select value=""  class="form-control"  name="estadoCivil" required>
          <option selected>Opcion</option>
          @foreach ($estadociviles as $item)
              <option value="{{$item->id}}">{{$item->nombreEstadocivil}}</option>
          @endforeach
        </select>
        </div>

        <div class="form-group col-md-3">
          <label for="exampleInputEmail1"> Tipo de sangre  <span style="color:red">*</span></label>
          <select class="form-control"  name="rh" required>
            <option  value=""  selected>Opcion</option>
            @foreach ($rhs as $item)
                <option value="{{$item->id}}">{{$item->tipoSangre}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group col-md-3">
          <label for="exampleInputEmail1"> Estatura <span style="color:red">*</span></label>
          <input type="number" class="form-control" name="estatura" aria-describedby="emailHelp" required>
      </div>

      <div class="form-group col-md-3">
        <label for="exampleInputEmail1"> Hijos <span style="color:red">*</span></label>
        <input type="number" class="form-control" name="hijos" aria-describedby="emailHelp" required>
    </div>



    </div>

    <div class="row">
			<div class="form-group col-md-4">
				<label > Entidad Bancaria  <span style="color:red">*</span></label>
				<select class="form-control"  name="banco" required>
				  <option  value=""  selected>Opcion</option>
				  @foreach ($bancos as $item)
					  <option value="{{$item->id}}">{{$item->nombreEntidad}}</option>
				  @endforeach
				</select>
			  </div>

			  <div class="form-group col-md-4">
				<label > Tipo cuenta  <span style="color:red">*</span></label>
				<select class="form-control"  name="tipocuenta" required>
				  <option  value=""  selected>Opcion</option>
					<option value="ahorros"> Ahorros</option>
					<option value="corriente"> Corriente</option>
				</select>
			  </div>

			  <div class="form-group col-md-4">
				<label for="exampleInputEmail1"> Número Cuenta <span style="color:red">*</span></label>
				<input type="text" class="form-control" name="numeroCuenta" aria-describedby="emailHelp" required>
			</div>
		

		</div>

   
	
  </div>
  

	<div class="panel-footer">
		<button type="submit" class="btn btn-primary w-md m-b-5">Guardar</button>
  </div>
  </form>
</div>

@endsection

@section('scripts')


<script>

  function cambioPais(e)
  {
    if(e.value==1){
      document.getElementById('departamentoExterno').style.display="none";
      document.getElementById('inputExterno').removeAttribute("required");
      document.getElementById('inputExterno').removeAttribute("name");  

      document.getElementById('departamentoInterno').style.display="block";  
    }else
      {
        
        document.getElementById('departamentoInterno').style.display="none"; 
        document.getElementById('inputInterno').removeAttribute("required");
      document.getElementById('inputInterno').removeAttribute("name"); 
      document.getElementById('departamentoExterno').style.display="block";
      }
  }

  </script>


@endsection