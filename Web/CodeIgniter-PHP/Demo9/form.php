<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
 <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

        <title>Software Factory</title>
<!--

Template 2081 Solution

http://www.tooplate.com/view/2081-solution

-->
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="">
        <meta name="description" content="">

        <!-- animate -->
        <link rel="stylesheet" href="public/css/animate.min.css">
        <!-- bootstrap -->
        <link rel="stylesheet" href="public/css/bootstrap.min.css">
        <!-- font-awesome -->
        <link rel="stylesheet" href="public/css/font-awesome.min.css">
        <!-- google font -->
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700,800' rel='stylesheet' type='text/css'>
        <!-- custom -->
        <link rel="stylesheet" href="public/css/style.css">

    </head>
    <body data-spy="scroll" data-offset="50" data-target=".navbar-collapse">

        <!-- start navigation -->
        <div class="navbar navbar-fixed-top navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon icon-bar"></span>
                        <span class="icon icon-bar"></span>
                        <span class="icon icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand"><img src="public/images/logo.png" class="img-responsive" alt="logo"></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="logout.php">Cerrar Sesión</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end navigation -->

        <!-- start home -->
        <section id="home" class="text-center">
          <div class="templatemo_headerimage">
            <div class="flexslider">
              <ul class="slides">
                <li>
                    <img src="public/images/slider/1.jpg" alt="Slide 1">
                    <div class="slider-caption">
                        <div class="templatemo_homewrapper">
                          <h1 class="wow fadeInDown" data-wow-delay="2000">Google Drive</h1>
                          <h2 class="wow fadeInDown" data-wow-delay="2000">
                            <span>Subir Archivos al Drive</span>
                        </h2>
                        <a href="#service" class="smoothScroll btn btn-default wow fadeInDown" data-wow-delay="2000">Subir Archivos</a> 
                        </div>
                    </div>
                </li>

              </ul>
            </div>
          </div>                
        </section>
        <!-- end home -->

        <!-- start service -->
        <div id="service">
            <div class="container">
                <div class="row">

                 <h2>Archivos Existentes</h2>
                        
                        <?php foreach ($files as $file) { ?>
                             <h3 class="media-heading"> <i class="glyphicon glyphicon-file"></i><?php echo $file; ?> </h3><br>
                        <?php } ?>
                        
                        <form method="post" action="<?php echo $url; ?>">
                            <input type="submit" value="enviar" name="submit" class="smoothScroll btn btn-default wow fadeInDown animated">
                        </form>
                
                </div>
            </div>
        </div>
        <!-- end service -->

        <!-- start contact -->
        <div id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4 wow fadeInLeft" data-wow-delay="0.6s">
                        <h2><strong>Solution</strong> Co.</h2>
                        <p>Quisque at elit sapien. Sed velit enim, fringilla non suscipit quis, tristique et turpis. Proin vitae nisi justo.</p>
                        <ul class="social-icon">
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-instagram"></a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-4 wow fadeIn" data-wow-delay="0.9s">
                        <address>
                            <h3>Visit Office</h3>
                            <p><i class="fa fa-map-marker too-icon"></i> 123 Walking Street, New York</p>
                            <p><i class="fa fa-phone too-icon"></i> 010-010-0220</p>
                            <p><i class="fa fa-envelope-o too-icon"></i> hello@company.com</p>
                        </address>
                    </div>
                </div>
            </div>
        </div>
        <!-- end contact -->
        <!-- start footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-7">
                        <p>Copyright &copy; 2016 Solution Company</p>
                    </div>
                    <div class="col-md-4 col-sm-5">
                        <ul class="social-icon">
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-instagram"></a></li>
                            <li><a href="#" class="fa fa-pinterest"></a></li>
                            <li><a href="#" class="fa fa-google"></a></li>
                            <li><a href="#" class="fa fa-github"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end footer -->


        <!-- jQuery -->
        <script src="public/js/jquery.js"></script>
        <!-- bootstrap -->
        <script src="public/js/bootstrap.min.js"></script>
        <!-- isotope -->
        <script src="public/js/isotope.js"></script>
        <!-- images loaded -->
        <script src="public/js/imagesloaded.min.js"></script>
        <!-- wow -->
        <script src="public/js/wow.min.js"></script>
        <!-- smoothScroll -->
        <script src="public/js/smoothscroll.js"></script>
        <!-- jquery flexslider -->
        <script src="public/js/jquery.flexslider.js"></script>
        <!-- custom -->
        <script src="public/js/custom.js"></script>

    </body>
</html>