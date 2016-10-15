<?php if(validation_errors()){ ?><h4 class="error message"><?php echo validation_errors(); ?></h4><?php } ?>

<section id="content">
	<div class="head_box">
		<h2>Registro de Servicios</h2>
		<ul>
			<li>
				<a href="<?php echo base_url() ?>panel/servicio/listado">Listado de Servicios</a>
			</li>
		</ul>
	</div>
	<div class="body_box">

		<?php echo form_open_multipart(base_url()."panel/servicio/agregar", array("name"=>"form_registro", "id"=>"form_registro", "method"=>"post")); ?>
			<article class="inline una_col">
      
				<div class="block">
					<label>Titulo <span>(*)</span></label>
					<input type="text" name="no_servicio"  class="required" value="<?php echo set_value('no_servicio'); ?>" />				
                </div>

                 <div class="block">
                    <label>Descripción Breve<a href="javascript:;">(250 caracteres máximo)</a><span>(*)</span></label>
                    <textarea name="tx_servicio_breve" class="required" style="height:70px;" ><?php echo set_value('tx_servicio_breve'); ?></textarea>	
                </div>

                 <div class="block">
                    <label>Descripción<span>(*)</span></label>
                    <textarea name="tx_servicio" class="required editor" style="height:180px;" ><?php echo set_value('tx_servicio'); ?></textarea>	
                </div>

                <div class="block" style="width:450px">
					<label>Imagen <span>(*)</span></label>
					<input type="file" name="imagen" class="required" />
				</div>
				<?php if($archivo!=''){ ?>
				<div class="block" style="padding-top:0px; margin-top:0px;">
					<input type="hidden" name="archivo_hidden" value="<?php echo $archivo; ?>" />
					<span class="msg_file">
					El archivo ya fue subido con exito!.<br/>
					Sin embargo hay campos que aun estan vacios y son obligatorios.<br/>
					Si desea reemplazar este archivo, seleccione otro nuevamente, de lo contrario dejar vacio.
					</span>
				</div>
				<?php } ?>
            
			</article>   
     
			<div class="block text_right una_col">
				<input type="submit" name="btn_guardar" value="Guardar Datos" />
			</div>
                        
		<?php echo form_close(); ?>
		
	</div>
</section>