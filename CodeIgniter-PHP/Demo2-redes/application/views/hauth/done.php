<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Software Factory</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url() ?>assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="<?php echo base_url() ?>assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url() ?>assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url() ?>assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="<?php echo base_url() ?>assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


        <div class="sidebar-wrapper">
            <div class="logo">
                <a  class="simple-text">
                   Software Factory
                </a>
            </div>

            <ul class="nav">
                
                <li class="active">
                    <a >
                        <i class="pe-7s-user"></i>
                        <p>Perfil de Usuario</p>
                    </a>
                </li>
                
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Perfil</a>
                </div>
                <div class="collapse navbar-collapse">
                    

                    <ul class="nav navbar-nav navbar-right">
                       
                        <li>
                            <a href="<?php echo base_url() ?>hauth/logout">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Editar Perfil</h4>
                            </div>
                            <div class="content">
                                <?php echo form_open_multipart(base_url()."hauth/editar", array("name"=>"form_registro", "id"=>"form_registro", "method"=>"post")); ?>
                                    <div class="row">
                                        <input type="hidden" name="identifier" value="<?php echo $user_profile['identifier']?>" />

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Usuario</label>
                                                <input type="text" class="form-control" placeholder="Usuario" name='displayName' value="<?php echo $user_profile['displayName'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email </label>
                                                <input type="email" class="form-control" placeholder="Email" name='email' value="<?php echo $user_profile['email'];?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input type="text" class="form-control" placeholder="Nombre" name='firstName' value="<?php echo $user_profile['firstName'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Apellido</label>
                                                <input type="text" class="form-control" placeholder="Apellido" name='lastName' value="<?php echo $user_profile['lastName'];?>">
                                            </div>
                                        </div>
                                    </div>

                                    

                    

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Editar Perfil</button>
                                    <div class="clearfix"></div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <img class="avatar border-gray" src="<?php echo $user_profile['photoURL'];?>" alt="..."/>

                                      <h4 class="title"><?php
 var_dump($user_profile);
?>
<br />
                                         <small><?php echo $user_profile['displayName'];?></small>
                                      </h4>
                                    </a>
                                </div>
                                <p class="description text-center"> 
                                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit, <br>
                                    sed do eiusmod tempor incididunt ut labore et dolore magna <br>
                                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation <br>
                                    ullamco laboris nisi ut aliquip ex ea commodo consequat. <br>
                                    esse cillum dolore eu fugiat nulla pariatur."<br>
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    Software Factory
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="<?php echo base_url() ?>assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="<?php echo base_url() ?>assets/js/bootstrap-checkbox-radio-switch.js"></script>

    <!--  Charts Plugin -->
    <script src="<?php echo base_url() ?>assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url() ?>assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="<?php echo base_url() ?>assets/js/light-bootstrap-dashboard.js"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="<?php echo base_url() ?>assets/js/demo.js"></script>

</html>
