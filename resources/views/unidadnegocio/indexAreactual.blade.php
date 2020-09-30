@extends('layouts.master')
@section('content')

<!-- Inicio Vista principal -->

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <ol class="breadcrumb"  style="font-size: 11px!important;">
                <li><a class="active" style="color: #999!important"> Asignacion General/Empleados</li>
            </ol>
            <div class="block-header" style="padding: 20px;margin: 0px;">
                <h2 style="font-size: 24px;font-weight: bold;">
                Unidades  / Empleados 
                </h2>
            </div>
            <div class="body">
                <!-- BOTONERA -->
                <div class="botonera">
                  <img src="{{asset('iconos/diagrama/iconosinternos/mas/masazul.png')}}" width="42px" id="add"
                    title="Agregar" class="boton">
                  
                </div>
                <!-- END BOTONERA -->
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="datatable" width="100%">
                        <thead style="background: #DCECEA" >
                          <tr>
                              <th>click</th>
                              <th>Nombres</th>
                              <th>Unidad</th>
                              <th>Dependencia</th>
                              <th>Area</th>
                          </tr>
                        </thead>
                        <tbody>
                           @foreach($empleadosSalida as $empleado) 
                          <tr>
                           <td> <input type="checkbox" class="form-check-input nachos" name="nachos[]" onclick="Clicker(this)" value={{$empleado->id}}> </td>
                                <td>{{$empleado->name}} {{$empleado->apellido}}</td>
                                <td>{{$empleado->unidadNegocio}}</td>
                                <td>{{$empleado->nombreDependencia}}</td>
                                <td>{{$empleado->nombreArea}}</td>
                          </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="AddModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background: #105151;padding: 2px">
          <a class="btn btn-link waves-effect" data-dismiss="modal"
          style="float:right; background: red;color: white">X</a>
          <h4 class="modal-title">	Ubicacion / Empleados</h4>
        </div>
        <div class="modal-body">
          <div class="col-md-6">
            <label for="numero"> Unidad </label><span style="color:red"> *</span>

            <div class="form-group">
                <select  class="form-control" id="unidad" onchange="unidades(this)"> 
                            <option selected> Selecione</option>
                            @foreach($unidades as $unidad)
                                <option value="{{$unidad->id}}">{{$unidad->unidadNegocio}}</option>
                            @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6" id="contenedorDependencia" style="display:none;">
            <label for="numero"> Depedencias </label><span style="color:red"> *</span>
            <div class="form-group">
                <select class="form-control" id="dependencia" onchange="depedencia(this)"> 
                    <option selected> Selecione</option>
                </select>
            </div>
        </div>

        <div class="col-md-6" id="contenedorAreas" style="display:none;">
            <label for="numero"> Areas </label><span style="color:red"> *</span>
            <div class="form-group">
                <select class="form-control" id="areas"> 
                    <option selected> Selecione</option>
                </select>
            </div>
        </div>

        <div class="modal-footer">
          <img src="{{asset('iconos/diagrama/iconosinternos/guardar/guardar-verde.png')}}" width="32px" id="guardar"
                      title="guardar" style="cursor: pointer;border-radius: 0px;">
        </div>
      </div>
  
    </div>
  </div>

@endsection

@section('scripts')

  <script>

    globalEmpleado=[];

    function Comparador(elemento,comparar){
      return elemento != comparar;
    }

    function Clicker(e)
    {
       if(e.checked == true)
       {
        globalEmpleado.push(parseInt(e.value));
        console.log(globalEmpleado)
       }else if(e.checked == false)
       {
          filtraje=globalEmpleado.filter(el=>Comparador(el,e.value));
          globalEmpleado=filtraje

       }
    
       console.log(globalEmpleado)
     
    }


    $('#add').on('click',function(){

        if(globalEmpleado.length>0)
        {
            $('#AddModal').modal('show');
        }else 
        {
            alert('debe seleccionar por lo menos un empleado');
        }
    })


    function unidades(e)
    {
        unidad=e.value
        
        if(e.value)
        {
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

            $.ajax({
            type:"GET",
            url:"{{asset('unidadnegocio/unidad/dependencia')}}/"+parseInt(e.value),
            dataType: "json",
            success: function(data){

                    if(data['dependencias'].length >0)
                    {
                        
                        for(var i=0; i<data['dependencias'].length ; i++)
                        {
                            $('#dependencia').append("<option value="+data['dependencias'][i].id+">"+data['dependencias'][i].nombreDependencia+"</option>");
                        }

                        document.getElementById("contenedorDependencia").style.display = "block";

                    }
                
            },
            error: function (data){

            }
            });

        }

    }

    function depedencia(e)
    {
        unidad=e.value
        
        if(e.value)
        {
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

            $.ajax({
            type:"GET",
            url:"{{asset('unidadnegocio/dependencia/area')}}/"+parseInt(e.value),
            dataType: "json",
            success: function(data){

                    if(data['areas'].length >0)
                    {
                        
                        for(var i=0; i<data['areas'].length ; i++)
                        {
                            $('#areas').append("<option value="+data['areas'][i].id+">"+data['areas'][i].nombreArea+"</option>");
                        }

                        document.getElementById("contenedorAreas").style.display = "block";

                    }
                
            },
            error: function (data){

            }
            });

        }


    }

    $('#guardar').on('click',function(){

        data={
                empleados:globalEmpleado,
                unidad:parseInt(document.getElementById('unidad').value),
                dependencia:parseInt(document.getElementById('dependencia').value),
                area:parseInt(document.getElementById('areas').value)
            }

            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

            $.ajax({
                type:"POST",
            url:"{{route('unidadnegocio.asignacionGrupalEmpleados')}}",
            dataType: "json",
            data:data,
                success: function(data){

            location.reload(true);


                },
                error: function (data){

                }
            });

    });

</script>

    @endsection