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
		<link rel="stylesheet" href="<?php echo base_url() ?>public/css/animate.min.css">
		<!-- bootstrap -->
		<link rel="stylesheet" href="<?php echo base_url() ?>public/css/bootstrap.min.css">
		<!-- font-awesome -->
		<link rel="stylesheet" href="<?php echo base_url() ?>public/css/font-awesome.min.css">
		<!-- google font -->
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700,800' rel='stylesheet' type='text/css'>
		<!-- custom -->
		<link rel="stylesheet" href="<?php echo base_url() ?>public/css/style.css">

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
					<a href="#" class="navbar-brand"><img src="<?php echo base_url() ?>public/images/logo.png" class="img-responsive" alt="logo"></a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#home" class="smoothScroll">HOME</a></li>
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
		        	<img src="<?php echo base_url() ?>public/images/slider/1.jpg" alt="Slide 1">
		        	<div class="slider-caption">
					    <div class="templatemo_homewrapper">
					      <h1 class="wow fadeInDown" data-wow-delay="2000">Web Service</h1>
					      <h2 class="wow fadeInDown" data-wow-delay="2000">
							<span>DEPARTAMENTOS POR PAIS</span>
						</h2>
						<a href="#service" class="smoothScroll btn btn-default wow fadeInDown" data-wow-delay="2000">Ubigeo</a>	
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

				 <?php echo form_open_multipart(base_url()."Welcome/index", array("name"=>"form_registro", "id"=>"form_registro", "method"=>"post")); ?>
			        
			          <h3>  <label for="pais"> Pais 
			                <span class="required">*:</span>
			            </label>
			            <input type="text" name="pais" id="pais" required="required" placeholder="Pais:" />
			        

			        <input type="submit" value="Buscar" class="smoothScroll btn btn-default wow fadeInDown animated" /></h3>

			    <?php echo form_close(); ?>
			    <br>
					<div class="col-md-4 col-sm-4">
						<div class="media">
							<div class="media-object media-left wow fadeIn" data-wow-delay="0.1s">
								<i class="fa fa-map-marker"></i>
							</div>
							<?php if($resultados=='' or $resultados==null or !isset($resultados)){ ?>
							<div class="media-body wow fadeIn">
								<h3 class="media-heading">No existe una busqueda</h3>
							</div>
							<?php } else{ ?>
							<div class="media-body wow fadeIn">
								<h3 class="media-heading">Departamentos por Pais</h3>
								<h3s><?php echo $resultados; ?></h3>
							</div>
							<?php } ?>


						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end service -->
		<!-- start portfolio -->
		<div id="portfolio">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h2 class="wow bounce">Recent Projects</h2>
							<div class="iso-section wow fadeIn" data-wow-delay="0.6s">

								<ul class="filter-wrapper clearfix">
                   					 <li><a href="#" data-filter="*" class="selected opc-main-bg">All</a></li>
                   					 <li><a href="#" class="opc-main-bg" data-filter=".graphic">Graphic</a></li>
                   					 <li><a href="#" class="opc-main-bg" data-filter=".photoshop">Photoshop</a></li>
                    				<li><a href="#" class="opc-main-bg" data-filter=".wallpaper">Wallpaper</a></li>
               					 </ul>

               				 	<div class="iso-box-section">
               				 		<div class="iso-box-wrapper col4-iso-box">

               				 			<div class="iso-box graphic photoshop wallpaper col-md-4 col-sm-6 col-xs-12">
               				 				<div class="portfolio-thumb">
               				 					<img src="<?php echo base_url() ?>public/images/portfolio-img1.jpg" class="fluid-img" alt="portfolio img">
               				 						<div class="portfolio-overlay">
               				 							<a href="#" class="fa fa-search"></a>
               				 							<a href="#" class="fa fa-link"></a>
               				 							<h4>Project title</h4>
               				 							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonumm.</p>
               				 						</div>
               				 				</div>
               				 			</div>

               				 			<div class="iso-box graphic wallpaper col-md-4 col-sm-6 col-xs-12">
               				 				<div class="portfolio-thumb">
               				 					<img src="<?php echo base_url() ?>public/images/portfolio-img2.jpg" class="fluid-img" alt="portfolio img">
               				 						<div class="portfolio-overlay">
               				 							<a href="#" class="fa fa-search"></a>
               				 							<a href="#" class="fa fa-link"></a>
               				 							<h4>Project title</h4>
               				 							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonumm.</p>
               				 						</div>
               				 				</div>
               				 			</div>

               				 			<div class="iso-box wallpaper col-md-4 col-sm-6 col-xs-12">
               				 				<div class="portfolio-thumb">
               				 					<img src="<?php echo base_url() ?>public/images/portfolio-img3.jpg" class="fluid-img" alt="portfolio img">
               				 						<div class="portfolio-overlay">
               				 							<a href="#" class="fa fa-search"></a>
               				 							<a href="#" class="fa fa-link"></a>
               				 							<h4>Project title</h4>
               				 							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonumm.</p>
               				 						</div>
               				 				</div>
               				 			</div>

               				 			<div class="iso-box graphic col-md-4 col-sm-6 col-xs-12">
               				 				<div class="portfolio-thumb">
               				 					<img src="<?php echo base_url() ?>public/images/portfolio-img4.jpg" class="fluid-img" alt="portfolio img">
               				 						<div class="portfolio-overlay">
               				 							<a href="#" class="fa fa-search"></a>
               				 							<a href="#" class="fa fa-link"></a>
               				 							<h4>Project title</h4>
               				 							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonumm.</p>
               				 						</div>
               				 				</div>
               				 			</div>

               				 			<div class="iso-box wallpaper col-md-4 col-sm-6 col-xs-12">
               				 				<div class="portfolio-thumb">
               				 					<img src="<?php echo base_url() ?>public/images/portfolio-img5.jpg" class="fluid-img" alt="portfolio img">
               				 						<div class="portfolio-overlay">
               				 							<a href="#" class="fa fa-search"></a>
               				 							<a href="#" class="fa fa-link"></a>
               				 							<h4>Project title</h4>
               				 							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonumm.</p>
               				 						</div>
               				 				</div>
               				 			</div>

               				 			<div class="iso-box graphic photoshop col-md-4 col-sm-6 col-xs-12">
               				 				<div class="portfolio-thumb">
               				 					<img src="<?php echo base_url() ?>public/images/portfolio-img6.jpg" class="fluid-img" alt="portfolio img">
               				 						<div class="portfolio-overlay">
               				 							<a href="#" class="fa fa-search"></a>
               				 							<a href="#" class="fa fa-link"></a>
               				 							<h4>Project title</h4>
               				 							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonumm.</p>
               				 						</div>
               				 				</div>
               				 			</div>

               				 		</div>
               				 	</div>

							</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end portfolio -->

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
		<script src="<?php echo base_url() ?>public/js/jquery.js"></script>
		<!-- bootstrap -->
		<script src="<?php echo base_url() ?>public/js/bootstrap.min.js"></script>
		<!-- isotope -->
		<script src="<?php echo base_url() ?>public/js/isotope.js"></script>
		<!-- images loaded -->
   		<script src="<?php echo base_url() ?>public/js/imagesloaded.min.js"></script>
   		<!-- wow -->
		<script src="<?php echo base_url() ?>public/js/wow.min.js"></script>
		<!-- smoothScroll -->
		<script src="<?php echo base_url() ?>public/js/smoothscroll.js"></script>
		<!-- jquery flexslider -->
		<script src="<?php echo base_url() ?>public/js/jquery.flexslider.js"></script>
		<!-- custom -->
		<script src="<?php echo base_url() ?>public/js/custom.js"></script>

	</body>
</html>