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
			<h4>Crear Contrato</h4>
		</div>
	</div>
	<div class="panel-body">
    <form id="crearContrato" method="POST" action="{{route('contratacion.storeContrato')}}">
        @csrf

        <div class="row">
            <div class="form-group col-md-4">
                <label > Nombre referencia <span style="color:red">*</span></label>
                <input type="text" class="form-control" name="nombreContrato" required >
            </div>

            <div class="form-group col-md-3">
                <label > Código referencia <span style="color:red">*</span></label>
                <input type="text" class="form-control" name="codigoContrato" required >
            </div>

            <div class="form-group col-md-5">
                <label for="exampleInputEmail1">Tipo Contrato <span style="color:red">*</span></label>
                <select class="form-control"  name="tipoContrato_id" required>
                  <option value="" selected>Opcion</option>
                  @foreach ($tipoContratos as $item)
                      <option value="{{$item->id}}">{{$item->nombreTipocontrato}}</option>
                  @endforeach
                </select>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="exampleTextarea">Descripción completa</label>
                    <textarea class="form-control" name="descripcionContrato" rows="3" required></textarea>
                </div>

                

                <div class="col-sm-12">
                    <div class="panel panel-bd ">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4> Seleccione Clausulas </h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            
                            <div class="table-responsive">
                                <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre </th>
                                            <th>Descripción corta</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clausulas as $key => $item)
                                        <tr>
                                            <td><div class="checkbox ">
                                            <input id="checkbox{{$key}}" type="checkbox"  value="{{$item->id}}" onclick="Clicker(this)">
                                            <label for="checkbox{{$key}}"></label>
                                                </div></td>
                                            <td>{{$item->nombreClausula}}</td>
                                            <td>{{$item->descripcionCorta}}</td>
                                        
                                        </tr>
                                            
                                        @endforeach
                
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>

	</div>
	<div class="panel-footer">
        <input type="hidden" id="clausulasSelect" name="clausulas[]" />
        <button type="submit" class="btn btn-primary">Confirmar</button>
    </form>
	</div>
</div>


<div class="modal fade" id="advertencia" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h1 class="modal-title">Advertencia</h1>
            </div>
            <div class="modal-body">
                EL contrato debe llevar clausulas.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
             
            </div>
        </div>
    </div>
</div>
    
@endsection

@section('scripts')

    <script>

         clausulas=[];

         function Comparador(elemento,comparar){
            return elemento != comparar;
        }

        function Clicker(e)
        {
          
        if(e.checked == true)
        {
            clausulas.push(parseInt(e.value));
        }else if(e.checked == false)
        {
            filtraje=clausulas.filter(el=>Comparador(el,e.value));
            clausulas=filtraje

        }
        
        }

        $("#crearContrato").submit(function(e){

        if(clausulas.length === 0)
        {
        e.preventDefault();
        $('#advertencia').modal('show');
        }else{
            document.getElementById('clausulasSelect').value=clausulas;
        }

        
    });

    </script>

@endsection