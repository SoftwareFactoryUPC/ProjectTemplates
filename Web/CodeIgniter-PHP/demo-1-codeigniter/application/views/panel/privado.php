<section id="content">
	<div class="head_box">
		<h2>Bienvenido</h2>
	</div>
	<div class="body_box">
		<h2>Panel administrativo de <?php echo TITULO_PAGINA ?></h2>
		<p>
			En este panel podran realizar diversas acciones y operaciones tales como: "Registrar, Editar, Eliminar, Visualizar y Exportar los datos que se encuentren en el panel."
		</p>
		<div id="iconos_panel">
			<?php if(is_array($iconos)){
					foreach ($iconos as $value) {
			?>
			<a href="<?php echo base_url() ?><?php echo $value['secciones']['securl'] ?>" class="icons_privado">
				<span class="icon <?php echo $value['secciones']['secclase'] ?>"></span>
				<span class="text">
					<span class="titulo"><?php echo $value['secciones']['secnombre'] ?></span>
					<span class="total"><?php echo $value['total']; ?></span>
				</span>
			</a>
			<?php }} ?>
		</div>
		
	</div>
</section>


