<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Demo 2 - Software Factory</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url() ?>assets/css/animate.min.css" rel="stylesheet"/>
   <link href="<?php echo base_url() ?>assets/css/bootstrap-social.css" rel="stylesheet"/>
    <!--  Light Bootstrap Table core CSS    -->
    <link href="<?php echo base_url() ?>assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url() ?>assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="<?php echo base_url() ?>assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a  class="simple-text">
                    Software Factory
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="<?php echo base_url() ?>hauth">
                        <i class="pe-7s-graph"></i>
                        <p>Login</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                   
                    
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row" >
                    <div class="col-md-4 " >
                      <a class="btn btn-block btn-social btn-lg btn-facebook" href="<?php echo base_url() ?>hauth/login/Facebook">
                        <span class="fa fa-facebook"></span> Sign in with facebook
                      </a>
                      <a class="btn btn-block btn-social btn-lg btn-google" href="<?php echo base_url() ?>hauth/login/Google">
                        <span class="fa fa-google"></span> Sign in with google
                      </a>
                      <a class="btn btn-block btn-social btn-lg btn-twitter" href="<?php echo base_url() ?>hauth/login/Twitter">
                        <span class="fa fa-twitter"></span> Sign in with twitter
                      </a>
                      <a class="btn btn-block btn-social btn-lg btn-github" href="<?php echo base_url() ?>hauth/login/Github">
                        <span class="fa fa-github"></span> Sign in with facebook
                      </a>
                      <a class="btn btn-block btn-social btn-lg btn-tumblr" href="<?php echo base_url() ?>hauth/login/Tumblr">
                        <span class="fa fa-tumblr"></span> Sign in with tumblr
                      </a>
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
