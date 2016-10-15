<?php if(validation_errors()){ ?><h4 class="error message"><?php echo validation_errors(); ?></h4><?php } ?>
<section id="content">
	<div class="head_box">
		<h2>Editar Usuario</h2>
		<ul>
			<li>
				<a href="<?php echo base_url() ?>panel/usuario/listado">Listado Usuarios</a>
			</li>
		</ul>
	</div>
	<div class="body_box">
		
		<?php echo form_open_multipart(base_url()."panel/usuario/actualizar", array("name"=>"form_registro", "id"=>"form_registro", "method"=>"post")); ?>
			<input type="hidden" name="id" value="<?php echo $usuario[0]['id_usuario'] ?>" />
			<article class="inline dos_col">
				<div class="block">
					<label>Nombres <span>(*)</span></label>
					<input type="text" name="usunombres" class="required" value="<?php echo $usuario[0]['usunombres'] ?>" />
				</div>
				<div class="block">
					<label>Apellido Paterno <span>(*)</span></label>
					<input type="text" name="usuapepaterno" class="required" value="<?php echo $usuario[0]['usuapepaterno'] ?>" />
				</div>
				<div class="block">
					<label>Apellido Materno <span>(*)</span></label>
					<input type="text" name="usuapematerno" class="required" value="<?php echo $usuario[0]['usuapematerno'] ?>" />
				</div>
				<div class="block">
					<label>Email <span>(*)</span></label>
					<input type="text" name="usuemail" class="required email" value="<?php echo $usuario[0]['usuemail'] ?>" />
				</div>
			</article>

			<article class="inline dos_col">
				
				<div class="block">
					<label>Usuario <span>(*)</span></label>
					<input type="text" name="usunick" class="required"  value="<?php echo $usuario[0]['usunick'] ?>" />
				</div>
				<div class="block">
					<label>Contraseña <span>(*)</span></label>
					<input type="text" name="usuclave" minlength="6" class="" />
				</div>	
			</article>

			<div class="block text_right una_col">
				<input type="submit" name="btn_guardar" value="Guardar Datos" />
			</div>
		<?php echo form_close(); ?>
		
		
	</div>
</section>