<li class="nav-heading "> <span>Main Navigation</span></li>

<li class=active><a href=index.html class=material-ripple><i class=material-icons>home</i> Dashboard</a></li>


@can('ver_cliente', new App\Administracion\Admincliente)
    <li>
        <a href="2" class=material-ripple><i class="material-icons" style="color:#c43d4a;">fingerprint</i> Clientes<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="{{route('admincliente.index')}}">Ver Clientes</a></li>
        </ul>
    <li>
@endcan 

@can('ver_centro', new App\Administracion\Admincliente)
    <li>
        <a href="2" class=material-ripple><i class="material-icons" style="color:#c43d4a;">fingerprint</i> Centro Costos<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li><a href="{{route('centros.index')}}">Centros de Costo</a></li>
        </ul>
    <li>
@endcan   