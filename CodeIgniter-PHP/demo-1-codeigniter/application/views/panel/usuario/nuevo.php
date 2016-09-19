<?php if(validation_errors()){ ?><h4 class="error message"><?php echo validation_errors(); ?></h4><?php } ?>
<section id="content">
	<div class="head_box">
		<h2>Registro de Usuarios</h2>
		<ul>
			<li>
				<a href="<?php echo base_url() ?>panel/usuario/listado">Listado Usuarios</a>
			</li>
		</ul>
	</div>
	<div class="body_box">
		
		
		<?php echo form_open_multipart(base_url()."panel/usuario/agregar", array("name"=>"form_registro", "id"=>"form_registro", "method"=>"post")); ?>

			<article class="inline dos_col">
				<div class="block">
					<label>Nombres <span>(*)</span></label>
					<input type="text" name="usunombres" class="required" />
				</div>
				<div class="block">
					<label>Apellido Paterno <span>(*)</span></label>
					<input type="text" name="usuapepaterno" class="required" />
				</div>
				<div class="block">
					<label>Apellido Materno <span>(*)</span></label>
					<input type="text" name="usuapematerno" class="required" />
				</div>
				<div class="block">
					<label>Email <span>(*)</span></label>
					<input type="text" name="usuemail" class="required email" />
				</div>
			</article>

			<article class="inline dos_col">
				
				<div class="block">
					<label>Usuario <span>(*)</span></label>
					<input type="text" name="usunick" class="required" />
				</div>
				<div class="block">
					<label>Contraseña <span>(*)</span></label>
					<input type="text" name="usuclave" minlength="6" class="required" />
				</div>
				
				
			</article>

			<div class="block text_right una_col">
				<input type="submit" name="btn_guardar" value="Guardar Datos" />
			</div>
		<?php echo form_close(); ?>
		
	</div>
</section>