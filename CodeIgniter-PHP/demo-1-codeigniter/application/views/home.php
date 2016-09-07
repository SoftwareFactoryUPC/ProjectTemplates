<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width , initial-scale=1 ,maximum-scale=1" />
		<title><?php echo TITULO_PAGINA ?></title>
		<link rel="shortcut icon" type="image/x-icon" href="<?php base_url() ?>public/images/favicon.ico" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/style.css" />

		<script type="text/javascript" src="<?php echo base_url() ?>public/js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>public/js/jquery-ui.min.js"></script>
	
		<script src="http://maps.google.com/maps/api/js?sensor=true"></script>

		<script type="text/javascript" src="<?php echo base_url() ?>public/js/jquery.contentcarousel.js"></script>

	 	<script type="text/javascript" src="<?php echo base_url() ?>public/js/js.js" ></script>
	
	 


	 	<style type="text/css">
	 		.fullwidthbanner-container { position: relative; overflow: hidden !important; max-height: 760px; }
			.fullwidthbanner-container ul { margin: 0; padding: 0; }
			.fullwidthbanner-container li > img { width: 100%; }

			.tp-caption.big_theme, .tp-caption.small_theme, .tp-caption.btn_theme { position: absolute; padding: 4px 10px; margin: 0; border-width: 0; border-style: none; letter-spacing: -0.07em; }

			.tp-caption.big_theme { font-family: 'MyriadPro-Bold', Sans-Serif; color: #555; text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25); font-size: 58px; line-height: 55px; font-weight: 700; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }
			.tp-caption.medium_theme { font-family: 'MyriadPro-Bold', Sans-Serif; color: #555; text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25); font-size: 54px; line-height: 55px; font-weight: 700; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }
			.tp-caption.small_theme { text-align: justify; width: 60%; white-space:normal !important; color: #777; font-size: 24px; line-height: 30px; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }

			#sliderRevLeft, #sliderRevRight { position: absolute; display: block; cursor: pointer; top: 50%; margin-top: -29px; height: 58px; width: 58px; line-height: 62px; font-size: 40px; color: #fff; z-index: 50; text-align: center; background: #000; -webkit-border-radius: 6px; -moz-border-radius: 6px; border-radius: 6px; opacity: 0.2; filter: alpha(opacity=20); -webkit-transition: opacity 0.2s ease; -moz-transition: opacity 0.2s ease; -o-transition: opacity 0.2s ease; transition: opacity 0.2s ease; }
			#sliderRevLeft:hover, #sliderRevRight:hover { opacity: 1; filter: alpha(opacity=100); }

			#sliderRevLeft { left: 20px; }

			#sliderRevRight { right: 20px; }
	 	</style>


		<script type="text/javascript">

	
		
			var map;

			function initialize() {
			  var myLatlng = new google.maps.LatLng(<?php echo COORDENADAS_DIRECCION ?>);
			  var myOptions = {
			  zoom: 17,
			  center: myLatlng,
			  mapTypeId: google.maps.MapTypeId.ROADMAP
			  }
			  map = new google.maps.Map(document.getElementById("mapa"), myOptions);
			  var marker = new google.maps.Marker({
			    position: myLatlng,
			    title:"<?php echo DIRECCION ?>",
			  });
			  marker.setMap(map);
			  var zoomLevel;
			  var infowindow = new google.maps.InfoWindow(
			  { 
			  	<?php if(COORDENADAS_DIRECCION!=''){ ?>
			  	content: '<center style="width: 200px; height: 100px; border:none;"><div style="width: 100%; text-align:center;"><img src="./public/images/logo.png" width="180" style="margin:0 0 8px 17px;"></div><div style="clear: both;"><p style="margin: 0; padding: 0;"><span style="color:#003c6e;font-family:Tahoma, Geneva, sans-serif;font-size:12px;text-align:-webkit-auto"><?php echo DIRECCION ?></span></p></div></center>',
			  	<?php } ?>
                size: new google.maps.Size(50,50),
                position: myLatlng
              });
			  infowindow.open(map);
			}
		</script>



	</head>

	<body onLoad="initialize();">
		<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url() ?>" />
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
		<header id="home">
			<div class="borde_top"></div>
			<div id="top_secundario">
				<h1 class="logo">
					<a href=""><img src="<?php echo base_url() ?>public/images/logo.png" width="200" /></a>
				</h1>
				<div class="menu_bar">
					<a href="javascript:;" class="bt-menu"></a>
				</div>
				<nav style="height:70px;">
					<ul id="menu">
						<li>
							<a href="#content-slider" class="menu active">Inicio</a>
						</li>
						<li>
							<a href="#content-soluciones" class="menu">Soluciones</a>
						</li>
						<li>
							<a href="#content-servicios" class="menu">Servicios</a>
						</li>
						<li>
							<a href="#content-empresa" class="menu">Empresa</a>
						</li>
						<li>
							<a href="#content-contactenos" class="menu">Contáctenos</a>
						</li>
					</ul>
					<ul id="menu_movil">
					
						<li>
							<a href="#content-soluciones" class="menu_movil">Soluciones</a>
						</li>
						<li>
							<a href="#content-servicios" class="menu_movil">Servicios</a>
						</li>
						<li>
							<a href="#content-empresa" class="menu_movil">Empresa</a>
						</li>
						<li>
							<a href="#content-contactenos" class="menu_movil">Contáctenos</a>
						</li>
					</ul>
				</nav>
			</div>
		</header>
		<section id="content-slider">
			<div class="fullwidthbanner-container">
				<div class="fullwidthbanner">
	                <ul>
	                							
	                    <li data-transition="fade" data-slotamount="7" data-masterspeed="500">
	                       
	                        <img src="<?php echo base_url() ?>public/images/banner_home_4.png" alt="Venta Flash" />
                        
	                        
	                    </li>

	                  
						<div class="bubble bubble_des"><h3></h3><span></span><p></p></div>

	                                        
	                </ul>
	                <div class="tp-bannertimer"></div>
	            </div>

	        </div>

		</section>
		<section id="content-soluciones">
			<img src="<?php echo base_url() ?>public/images/banner_soluciones.png" class="bg_solucion" />
			<div class="soluciones">
				<h2>Soluciones</h2>

				<div id="ca-container" class="ca-container" rel="222">
					<div class="ca-wrapper">
						<?php if(is_array($solucion)){
							$x=1; 
							foreach ($solucion as $value) {
						?>
						<div class="ca-item ca-item-<?php echo $x; ?>">
							<div class="ca-item-main">
								<div class="ca-icon"><img src="<?php echo base_url() ?>public/images/<?php echo $value['im_solucion'] ?>" width="170" /></div>
								<h3><?php echo $value['no_solucion'] ?></h3>
								<h4>
									
									<span><?php echo character_limiter($value['tx_solucion_breve'],190,'') ?></span>
								</h4>
									<a href="#" class="ca-more">Leer mas...</a>
							</div>
							<div class="ca-content-wrapper">
								<div class="ca-content">
									<h6><?php echo $value['no_solucion'] ?></h6>
									<a href="#" class="ca-close">close</a>
									<div class="ca-content-text">
										<?php echo $value['tx_solucion']; ?>
									</div>
									<div class="boton">
										<a href="#content-contactenos" class="menu">¿Quieres mas Información?</a>
									</div>
								</div>
							</div>
						</div>
						<?php $x++;}} ?>
						

					</div>
				</div>

			</div>
		</section>
		<section id="content-servicios">
		
			<div class="servicios">
				<h2>Servicios</h2>
				<div id="ca-container_3" class="ca-container">
					<div class="ca-wrapper">
						<?php if(is_array($servicio)){
							$z = 1;
							foreach ($servicio as $value) {
						?>
						<div class="ca-item ca-item-<?php echo $z; ?>">
							<div class="ca-item-main">
								<div class="ca-icon"><img src="<?php echo base_url() ?>public/images/<?php echo $value['im_servicio'] ?>" width="140" height="140" /></div>
								<h3><?php echo $value['no_servicio'] ?></h3>
								<h4>
									
									<span><?php echo character_limiter($value['tx_servicio_breve'],190,'') ?></span>
								</h4>
									
							</div>
							<div class="ca-content-wrapper">
								<div class="ca-content">
									<h6><?php echo $value['no_servicio'] ?></h6>
									<a href="#" class="ca-close">close</a>
									<div class="ca-content-text">
										<?php echo $value['tx_servicio']; ?>
									</div>
									<div class="boton">
										<a href="#content-contactenos" class="menu">¿Quieres mas Información?</a>
									</div>
								</div>
							</div>
						</div>
						<?php $z++;}} ?>

					</div>
				</div>

			</div>
		
			<div class="popup-overlay"></div>
		</section>
		<section id="content-empresa">
			<div class="empresa">
				<h2>Empresa</h2>
				<div class="iconos">
				<?php if(is_array($empresa)){ 
					foreach ($empresa as $value) {
				?>
					<article><img src="<?php echo base_url() ?>public/images/<?php echo $value['im_empresa'] ?>" /></article>
				<?php }} ?>
				</div>
				<div class="detalle">
				<?php if(is_array($empresa)){ 
					foreach ($empresa as $value) {
				?>
					<article>
						<h3><?php echo $value['no_empresa'] ?></h3>
						<?php echo $value['tx_empresa']?>
					</article>
				<?php }} ?>
				</div>
			</div>
		</section>
		<section id="content-contactenos">
			<img src="<?php echo base_url() ?>public/images/banner_contactenos.png" class="bg_contacto" />
			<div class="contactenos">
				<h2>Contáctenos</h2>
				<div id="mapa"></div>
				<div class="datos">
										
						<article class="detalle">
							<h3>Información de Contacto</h3>
							<div class="email"><?php echo EMAIL_CONTACTO ?></div>
							<div class="telefono"><?php echo TELEFONOS ?></div>
							<div class="direccion"><?php echo DIRECCION ?></div>
						</article>
					
				</div>
			</div>
			
		</section>
		<footer id="footer">
			
		</footer>
		
	</body>
</html>