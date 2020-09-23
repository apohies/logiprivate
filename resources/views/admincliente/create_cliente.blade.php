@extends('layouts.master')
@section('content')

<div class="row clearfix">
  <div class="col-md-6 col-md-offset-3">
      <div class="card">
          <div class="container-fluid">
              <div class="col-md-10 " >
                <div class="card-header">
                  <h3 class="box-title">  Crear Cliente/Empresa</h3>
                </div>
              
                <form role="form" method="POST" action="{{route('admincliente.store')}}" style="padding-bottom: 20px;" >
                    @csrf
                  <div class="card-body">
                        <div class="form-group">
                            <label >Nombre o Referencia Cliente</label><span style="color:red">*</span>
                            <input type="text" class="form-control" name="nombreAdmincliente"  placeholder="Ingrese Nombre Cliente" required>
                        </div>

                    <div class="form-group">
                      <label > Nombre Usuario Administrador</label><span style="color:red">*</span>
                      <input type="text" class="form-control"  name="name" placeholder="Ingrese Nombre Usuario" required>
                    </div>

                    <div class="form-group">
                        <label > Correo Electrónico</label><span style="color:red">*</span>
                        <input type="email" class="form-control" name="email" placeholder="Ingrese el Correo Electrónico" required>
                    </div>
                  </div>
                  <div class="footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>

                </form>
              </div>
            </div>
      </div>
    </div>
  </div>
  @stop