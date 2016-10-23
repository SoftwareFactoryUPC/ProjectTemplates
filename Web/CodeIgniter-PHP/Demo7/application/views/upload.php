<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Software Factory | Demo 7</title>
    <link href="<?php echo base_url() ?>public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>public/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>public/css/lightbox.css" rel="stylesheet"> 
    <link href="<?php echo base_url() ?>public/css/animate.min.css" rel="stylesheet"> 
	<link href="<?php echo base_url() ?>public/css/main.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>public/css/responsive.css" rel="stylesheet">

    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url() ?>public/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url() ?>public/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url() ?>public/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url() ?>public/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header">      
        <div class="container">
            <div class="row">
                <div class="col-sm-12 overflow">
                   <div class="social-icons pull-right">
                        <ul class="nav nav-pills">
                            <li><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                            <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                            <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div> 
                </div>
             </div>
        </div>
        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="">
                        <h1><img src="<?php echo base_url() ?>public/images/logo.png" alt="logo"></h1>
                    </a>
                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="">Home</a></li>                 
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!--/#header-->

    <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">Como funciona: </h1>
                            <p>Solo tienes que crear un archivo .txt con los numeros que deseas buscar</p>
                        </div>
                     </div>
                </div>
            </div>
        </div>
   </section>
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center bottom-separator">
                    <img src="<?php echo base_url() ?>public/images/home/under.png" class="img-responsive inline" alt="">
                </div>
                <div class="col-md-8 col-sm-12">
                    <div class="contact-info bottom">
                                
                                <?php if(isset($error)){  ?>
                                <h2><?php echo $error; ?></h2>
                                <?php } ?>

                                <?php 
                                if(isset($datos_llenar)){
                                    ?>
                            <h2>Datos</h2>
                            <table>
                                    <?php
                                    for($i=0;$i<count($datos_llenar);$i++) {
                                        ?>
                                        <tr>
                                        <?php
                                        for($j=0;$j<count($datos_llenar[$i]);$j++) {?>

                                        <td><?php echo $datos_llenar[$i][$j]; ?></td>
                                        
                                        <?php } ?>

                                        </tr>
                                        <?php } ?>
                                    
                            </table>
                            <?php } ?>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="contact-form bottom">
                        <h2>Sube tu archivo</h2>
                        <?=form_open_multipart(base_url().'upload/upload_file')?>
				        <?=form_upload('file')?>
                        <div class="form-group">
                               
				        <?=form_submit('submit', 'Subir', "class='btn btn-submit'")?>

                        </div>
				        <?=form_close()?>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="copyright-text text-center">
                        <p>&copy; Your Company 2014. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/#footer-->


    <script type="text/javascript" src="<?php echo base_url() ?>public/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>public/js/lightbox.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>public/js/wow.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>public/js/main.js"></script>   
</body>
</html>