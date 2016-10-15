<?php if(validation_errors()){ ?><h4 class="error message"><?php echo validation_errors(); ?></h4><?php } ?>

<section id="content">
	<div class="head_box">
		<h2>Modificar Servicio</h2>
		<ul>
			<li>
				<a href="<?php echo base_url() ?>panel/servicio/listado">Listado de Servicios</a>
			</li>
		</ul>
	</div>
	<div class="body_box">

		<?php echo form_open_multipart(base_url()."panel/servicio/update", array("name"=>"form_registro", "id"=>"form_registro", "method"=>"post")); ?>
			<article class="inline una_col">
			
      			<input type="hidden" name="id" value="<?php echo $servicio->id_servicio ?>" />

				<div class="block">
					<label>Titulo <span>(*)</span></label>
					<input type="text" name="no_servicio"  class="required" value="<?php echo $servicio->no_servicio; ?>" />				
                </div>

                 <div class="block">
                    <label>Descripción Breve<a href="javascript:;">(250 caracteres máximo)</a><span>(*)</span></label>
                    <textarea name="tx_servicio_breve" class="required" style="height:70px;" ><?php echo $servicio->tx_servicio_breve; ?></textarea>	
                </div>

                 <div class="block">
                    <label>Descripción<span>(*)</span></label>
                    <textarea name="tx_servicio" class="required editor" style="height:180px;" ><?php echo $servicio->tx_servicio; ?></textarea>	
                </div>

                <div class="block" style="width:450px">
					<label>Imagen <span>(*)</span></label>
					<input type="file" name="imagen" />
				</div>
				<div class="block imagen_editar">
					<?php if($servicio->im_servicio!=''){ ?>
						<img src="<?php echo base_url() ?>public/images/<?php echo $servicio->im_servicio ?>" width="100" />
					<?php }else{ ?>
						<span class="sin_imagen">* Registro sin Imagen *</span>
					<?php } ?>
				</div>
            
			</article>   
     
			<div class="block text_right una_col">
				<input type="submit" name="btn_guardar" value="Guardar Datos" />
			</div>
                        
		<?php echo form_close(); ?>
		
	</div>
</section>