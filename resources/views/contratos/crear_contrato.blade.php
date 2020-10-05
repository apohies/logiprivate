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
        <form method="POST" action="#">
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
                <select class="form-control" required name="tipoContrato_id" required>
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
                                            <td>{{$key+1}}</td>
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
        
    </form>
	</div>
</div>
    
@endsection