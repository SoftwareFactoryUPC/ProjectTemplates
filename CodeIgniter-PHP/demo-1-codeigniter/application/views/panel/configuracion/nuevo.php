<?php if(validation_errors()){ ?><h4 class="error message"><?php echo validation_errors(); ?></h4><?php } ?>

<section id="content">
	<div class="head_box">
		<h2>Registro de Configuraciones</h2>
		<ul>
			<li>
				<a href="<?php echo base_url() ?>panel/configuracion/listado">Listado de Configuraciones</a>
			</li>
		</ul>
	</div>
	<div class="body_box">

		<?php echo form_open_multipart(base_url()."panel/configuracion/agregar", array("name"=>"form_registro", "id"=>"form_registro", "method"=>"post")); ?>
			<article class="inline una_col">
      
				<div class="block">
					<label>Titulo <span>(*)</span></label>
					<input type="text" name="contitulo"  class="required" value="<?php echo set_value('contitulo'); ?>" />				
                </div>

                 <div class="block">
                    <label>Valor<span>(*)</span></label>
                    <textarea name="convalor" class="required" style="height:100px;" ><?php echo set_value('convalor'); ?></textarea>	
                </div>

			</article>   
     
			<div class="block text_right una_col">
				<input type="submit" name="btn_guardar" value="Guardar Datos" />
			</div>
                        
		<?php echo form_close(); ?>
		
	</div>
</section>