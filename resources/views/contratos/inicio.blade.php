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
		</div>
	</div>
	<div class="panel-body" style="padding-left: 40%;">

     
            <ul class="social-media clearfix">
                <li>
                <a href="{{route('contratacion.indexTipocontrato')}}" class="rss">
                        <i class="hvr-buzz-out pe-7s-wallet" style="font-size: 50px;"></i>
                       
                        <p>Tipo Contratos</p>
                    </a>
                </li>
                <li>
                <a href="{{route('contratacion.indexContratos')}}" class="fb">
                        <i class="hvr-buzz-out pe-7s-id" style="font-size: 50px;"></i>
                  
                        <p>Contratos</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('contratacion.indexClausulas')}}" class="g_plus">
                        <i class="hvr-buzz-out pe-7s-search" style="font-size: 50px;"></i>
                        <p>Clausulas</p>
                     
                    </a>
                </li>
          
            </ul>  
	</div>
	
</div>



    
@endsection