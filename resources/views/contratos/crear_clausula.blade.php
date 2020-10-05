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
			<h4>Crear Clausula</h4>
		</div>
	</div>
	<div class="panel-body">
    <form method="POST" action="{{route('contratacion.storeClausula')}}">
        @csrf
        <div class="row">
            <div class="form-group col-md-4">
                <label >Nombre Clausula</label>
                <input type="text" class="form-control" name="nombreClausula" required>
            </div>
            <div class="form-group col-md-8">
                <label for="exampleTextarea">Descripción corta</label>
                <textarea class="form-control" name="descripcionCorta" rows="3" required></textarea>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12">
                <label for="exampleTextarea">Descripción completa</label>
                <textarea class="form-control" name="descripcionCompleta" rows="6" required></textarea>
            </div>
        </div>

        
	</div>
	<div class="panel-footer">

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
	</div>
</div>
    
@endsection