<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width , initial-scale=1 ,maximum-scale=1" />
		<title>MÓDULO DE ADMINISTRACIÓN - <?php echo TITULO_PAGINA ?></title>
		<link rel="shortcut icon" type="image/x-icon" href="<?php base_url() ?>public/images/favicon.ico" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/panel/reset.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/panel/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/panel/uniform.css" />

		<script type="text/javascript" src="<?php echo base_url() ?>public/js/panel/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>public/js/panel/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>public/js/panel/ddsmoothmenu.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>public/js/panel/tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>public/js/panel/jquery.uniform.min.js" ></script>
	 	<script type="text/javascript" src="<?php echo base_url() ?>public/js/panel/panel.js" ></script>

	</head>
	<body>
		<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url() ?>" />
		<header>
			<div class="titulo_web">
				<h1><a href="<?php echo base_url() ?>"><?php echo RAZON_SOCIAL ?></a></h1>
			</div>
		</header>
		<section id="login">
			<div class="head_box">
				<h2>Acceso al Sistema</h2>
				<ul><li><a href="javascript:;"><?php echo RAZON_SOCIAL ?></a></li></ul>
			</div>
			<div class="body_login">
				<?php $this->load->helper('cookie');?>
				<?php if($this->session->flashdata('message')){ echo $this->session->flashdata('message');} ?>
				<?php echo form_open(base_url()."panel/login/acceso", array("name"=>"form_login", "method"=>"post")); ?>
					<div class="block">
						<label>Usuario</label>
						<input type="text" name="usuario" value="<?php echo get_cookie('user_MKD')?>" />
					</div>
					<div class="block">
						<label>Contraseña</label>
						<input type="password" name="password" value="<?php echo get_cookie('pass_MKD')?>" />
					</div>
					<div class="block">
						<input type="submit" name="btn_acceder" value="Ingresar" />
					</div>
				<?php echo form_close(); ?>
			</div>
		</section>
		<footer>
			Copyright. All Rights Reserved.
		</footer>
	</body>
</html>