<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Adminpage - Responsive Bootstrap Admin Template Dashboard</title>
        <link rel="shortcut icon" href="{{asset('template/assets/dist/img/ico/favicon.png')}}" type="image/x-icon">
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
        <script>
            WebFont.load({
                google: {
                    families: ['Alegreya+Sans:100,100i,300,300i,400,400i,500,500i,700,700i,800,800i,900,900i', 'Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i', 'Open Sans']
                }
            });
        </script>
       
        <link href="{{asset('template/assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('template/assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('template/assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
     
        <link href="{{asset('template/assets/dist/css/component_ui.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('template/assets/dist/css/skins/component_ui_black.css')}}" rel="stylesheet" type="text/css"/>

        <link href="{{asset('template/assets/dist/css/custom.css')}}" rel="stylesheet" type="text/css"/>
    </head>
    <body>
       
        <div class="register-wrapper">
            <div class="container-center lg">
                <div class="panel panel-bd">
                    <div class="panel-heading">
                        <div class="view-header">
                            <div class="header-icon">
                                <i class="pe-7s-pen"></i>
                            </div>
                            <div class="header-title">
                                <h3>Register</h3>
                                <small><strong>Please enter your data<br> to register.</strong></small>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{route('register')}}">
                            <!--Social Buttons--> 
                          
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input id="email" type="email" class="form-control" name="email" placeholder="Please enter you email adress">
                                </div>
                            </div>
                      
                            <div class="form-group">
                                <label class="control-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input id="pass" type="password" class="form-control" name="password" placeholder="******">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Repeat Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input id="rpass" type="password" class="form-control" name="rpass" placeholder="******">
                                </div>
                            </div>
                            <div>
                                
                                <button type="submit" class="btn btn-success pull-right m-r-5">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->
        <!-- jQuery -->
        <script src="{{asset('template/assets/plugins/jQuery/jquery-1.12.4.min.js')}}"></script>
        <!-- bootstrap js -->
        <script src="{{asset('template/assets/bootstrap/js/bootstrap.min.js')}}"></script>
    </body>
</html>
