<?php $auth = new Auth(); ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width , initial-scale=1 ,maximum-scale=1" />
		<title>MÓDULO DE ADMINISTRACIÓN - <?php echo TITULO_PAGINA ?></title>

		<link rel="shortcut icon" type="image/x-icon" href="<?php base_url() ?>public/images/favicon.ico" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/panel/reset.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/panel/style.css" />
		<script type="text/javascript" src="<?php echo base_url() ?>public/js/panel/jquery-1.7.1.min.js"></script>
  		<script type="text/javascript" src="<?php echo base_url() ?>public/js/panel/ddsmoothmenu.js"></script>
	 	<script type="text/javascript" src="<?php echo base_url() ?>public/js/panel/panel.js" ></script>
</head>
	<body>
		<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url() ?>" />
		<header>
			<div class="datos_usuarios">
				<a href="javascript:;">Usuario: <?php echo $auth->__get("_usuario"); ?></a> |
				<a href="<?php echo base_url() ?>panel/login/cerrar_sesion">Cerrar Sesi&oacute;n</a>
			</div>
			<div class="titulo_web">
				<h1><a href="<?php echo base_url() ?>panel"><?php echo RAZON_SOCIAL ?></a></h1>
			</div>
			<nav  id="smoothmenu1" class="ddsmoothmenu">
				<ul>
					<li><a href="<?php echo base_url() ?>panel">Pagina de Inicio</a></li>
					<?php if(is_array($modulos)){
							foreach ($modulos as $value) {
					?>
					<li><a href="javascript:;"><?php echo $value['modulos']['modnombre'] ?></a>
						<ul>
							<?php 
							$secciones = $value['secciones'];
							if(is_array($secciones)){
								foreach ($secciones as $sec) {
							?>
							<li><a href="<?php echo base_url() ?><?php echo $sec['securl'] ?>"><?php echo $sec['secnombre'] ?></a></li>
							<?php }} ?>
						</ul>
					</li>
					<?php }} ?>
				</ul>
				<br style="clear: left" />
			</nav>
		</header>

		<?php $this->load->view($content_template); ?>

		<footer>
			Copyright. All Rights Reserved.
		</footer>
	</body>
</html>