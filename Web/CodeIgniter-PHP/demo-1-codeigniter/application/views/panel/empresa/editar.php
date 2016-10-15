<?php if(validation_errors()){ ?><h4 class="error message"><?php echo validation_errors(); ?></h4><?php } ?>

<section id="content">
	<div class="head_box">
		<h2>Modificar Empresa</h2>
		<ul>
			<li>
				<a href="<?php echo base_url() ?>panel/empresa/listado">Listado de Empresas</a>
			</li>
		</ul>
	</div>
	<div class="body_box">

		<?php echo form_open_multipart(base_url()."panel/empresa/update", array("name"=>"form_registro", "id"=>"form_registro", "method"=>"post")); ?>
			<article class="inline una_col">
			
      			<input type="hidden" name="id" value="<?php echo $empresa->id_empresa ?>" />

				<div class="block">
					<label>Titulo <span>(*)</span></label>
					<input type="text" name="no_empresa"  class="required" value="<?php echo $empresa->no_empresa; ?>" />				
                </div>

                 <div class="block">
                    <label>Descripción<span>(*)</span></label>
                    <textarea name="tx_empresa" class="required editor" style="height:180px;" ><?php echo $empresa->tx_empresa; ?></textarea>	
                </div>

                <div class="block" style="width:450px">
					<label>Imagen <span>(*)</span></label>
					<input type="file" name="imagen" />
				</div>
				<div class="block imagen_editar">
					<?php if($empresa->im_empresa!=''){ ?>
						<img src="<?php echo base_url() ?>public/images/<?php echo $empresa->im_empresa ?>" width="100" />
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