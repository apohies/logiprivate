<!DOCTYPE html>
<html lang=en>
    <head>
        <meta charset=utf-8>
        <meta http-equiv=X-UA-Compatible content="IE=edge">
        <meta name=viewport content="width=device-width, initial-scale=1">
        <meta name=description content="">
        <meta name=author content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Adminpage - Responsive Bootstrap Admin Template Dashboard</title>
        <link rel="shortcut icon" href="assets/dist/img/ico/favicon.png" type="image/x-icon">
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
        <script>
            WebFont.load({
                google: {
                    families: ['Alegreya+Sans:100,100i,300,300i,400,400i,500,500i,700,700i,800,800i,900,900i', 'Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i', 'Open Sans']
                }
            });
        </script>
        <!-- START GLOBAL MANDATORY STYLE -->
        <link href="{{asset('template/assets/dist/css/base.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('template/assets/plugins/toastr/toastr.min.css')}}" rel=stylesheet type="text/css"/>
        <link href="{{asset('template/assets/plugins/emojionearea/emojionearea.min.css')}}" rel=stylesheet type="text/css"/>
        <link href="{{asset('template/assets/plugins/monthly/monthly.min.css')}}" rel=stylesheet type="text/css"/>
        <link href="{{asset('template/assets/plugins/amcharts/export.css')}}" rel=stylesheet type="text/css"/>
        <link href="{{asset('template/assets/dist/css/component_ui.min.css')}}" rel=stylesheet type="text/css"/>
        <link id=defaultTheme href="{{asset('template/assets/dist/css/skins/component_ui_black.css')}}" rel=stylesheet type="text/css"/>
        <link href="{{asset('template/assets/dist/css/custom.cs')}}" rel=stylesheet type="text/css"/>
        <link href="{{asset('template/assets/plugins/datatables/dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
        <!--[if lt IE 9]>
                    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
                <![endif]-->
    </head>
    <body>
        <div id="wrapper"class="wrapper animsition">

            {{-- inicio nav--}}
            <nav class="navbar navbar-fixed-top" role=navigation>
                <div class=navbar-header>
                    <button type=button class=navbar-toggle data-toggle=collapse data-target=.navbar-collapse>
                        <span class=sr-only>Toggle navigation</span>
                        <i class=material-icons>apps</i>
                    </button>
                    <a class=navbar-brand href=index.html>
                        <img class=main-logo src="{{asset('icono/Negativo.png')}}" alt="">
                    </a>
                </div>
                <div class=nav-container>
                    <ul class="nav navbar-nav hidden-xs">
                        <li><a id=fullscreen href="#"><i class=material-icons>fullscreen</i> </a></li>
                        <li class=hidden-xs>
                            <a class=search-trigger href="#">
                                <i class=material-icons>search</i>
                            </a>
                            <div class=fullscreen-search-overlay id=search-overlay>
                                <a href="#" class=fullscreen-close id=fullscreen-close-button><i class=ti-close></i></a>
                                <div id=fullscreen-search-wrapper>
                                    <form id=fullscreen-searchform action="">
                                        <input value="" placeholder="Type keyword(s) here" id=fullscreen-search-input>
                                        <i class="ti-search fullscreen-search-icon"><input value="" type=submit></i>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>

                    
                    <ul class="nav navbar-top-links navbar-right">
                    
                   
                     
                        <li class=dropdown>
                            <a class=dropdown-toggle data-toggle=dropdown href="#">
                                <i class=material-icons>person_add</i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href=profile.html><i class=ti-user></i>&nbsp; Profile</a></li>
                                <li><a href=mailbox.html><i class=ti-email></i>&nbsp; My Messages</a></li>
                                <li><a href=lockscreen.html><i class=ti-lock></i>&nbsp; Lock Screen</a></li>
                                <li><a href="#"><i class=ti-settings></i>&nbsp; Settings</a></li>
                                <li><a href=login.html><i class=ti-layout-sidebar-left></i>&nbsp; Logout</a></li>
                            </ul>
                        </li>
                        <li class=log_out>
                            <a href="{{route('logout')}}">
                                <i class=material-icons>power_settings_new</i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            {{-- final  nav--}}


             {{-- inicio  aside--}}
            <div class=sidebar role=navigation>
                <div class="sidebar-nav navbar-collapse">


                    <ul class=nav id=side-menu>

                        @include('partial.side-bars')
                       
               
                    </ul>
                </div>
            </div>

            {{-- final aside--}}

          
        <div class=control-sidebar-bg></div>
         <div id=page-wrapper>
               
            


                @yield('content')
            </div>
    </div>
        
        <script src="{{asset('template/assets/plugins/jQuery/jquery-1.12.4.min.js')}}"></script>
        <script src="{{asset('template/assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js')}}"></script>
        <script src="{{asset('template/assets/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('template/assets/plugins/metisMenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('template/assets/plugins/lobipanel/lobipanel.min.js')}}"></script>
        <script src="{{asset('template/assets/plugins/animsition/js/animsition.min.js')}}"></script>
        <script src="{{asset('template/assets/plugins/fastclick/fastclick.min.js')}}"></script>
        <script src="{{asset('template/assets/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('template/assets/plugins/toastr/toastr.min.js')}}"></script>
        <script src="{{asset('template/assets/plugins/sparkline/sparkline.min.js')}}"></script>
        <script src="{{asset('template/assets/plugins/counterup/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('template/assets/plugins/counterup/waypoints.js')}}"></script>
        <script src="{{asset('template/assets/plugins/emojionearea/emojionearea.min.js')}}"></script>
        <script src="{{asset('template/assets/plugins/monthly/monthly.min.js')}}"></script>
        <script src="{{asset('template/assets/plugins/amcharts/amcharts.js')}}"></script>
        <script src="{{asset('template/assets/plugins/amcharts/ammap.js')}}"></script>
        <script src="{{asset('template/assets/plugins/amcharts/worldLow.js')}}"></script>
        <script src="{{asset('template/assets/plugins/amcharts/serial.js')}}"></script>
        <script src="{{asset('template/assets/plugins/amcharts/export.min.js')}}"></script>
        <script src="{{asset('template/assets/plugins/amcharts/dark.js')}}"></script>
        <script src="{{asset('template/assets/plugins/amcharts/pie.js')}}"></script>
        <script src="{{asset('template/assets/dist/js/app.min.js')}}"></script>
        <script src="{{asset('template/assets/dist/js/page/dashboard_dark.js')}}"></script>
        <script src="{{asset('template/assets/dist/js/jQuery.style.switcher.min.js')}}"></script>
        <script src="{{asset('template/assets/plugins/datatables/dataTables.min.js')}}"></script>

        @yield('scripts')

        <script>

            $(document).ready(function () {

            $("#dataTableExample2").DataTable({
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            buttons: [
            {extend: 'copy', className: 'btn-sm'},
            {extend: 'csv', title: 'ExampleFile', className: 'btn-sm'},
            {extend: 'excel', title: 'ExampleFile', className: 'btn-sm'},
            {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'},
            {extend: 'print', className: 'btn-sm'}
            ]
            });

            });


        </script>
    </body>
</html>
