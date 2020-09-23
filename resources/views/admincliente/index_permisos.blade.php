@extends('layout.general')

@section('content')


<div class="box">
        <div class="box-header">
          <h3 class="box-title"><img src="{{asset('AdminLTE/dist/img/iconos/O_ver permisos.png')}}" width="30px">Todos los Permisos</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <div class="col-md-12 table-responsive">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Número</th>
              <th>Módulo</th>
              <th>Permiso</th>
            
            </tr>
            </thead>
            <tbody>
                @foreach($permisos as $permiso)   
                    <tr>
                    <td>{{$permiso->id}}</td>
                    <td>{{$permiso->nombreModulo}} </td>
                    <td>{{$permiso->name}}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
           
            </tfoot>
          </table>
        </div>
      </div>
        <!-- /.box-body -->
      </div>

@endsection

