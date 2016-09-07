<?php if($this->session->flashdata('message')){ echo $this->session->flashdata('message'); } ?>
<section id="content">
	<div class="head_box">
		<h2>Listado De Servicios</h2>
		<ul>
			<li>
				<a href="<?php echo base_url() ?>panel/servicio/nuevo" class="">Nuevo Servicio</a>
			</li>
		</ul>
	</div>
	<div class="body_box">
		<table class="tabla">
			<thead>
				<tr>
					<th>Titulo</th>
					<th class="opciones_grande">Opciones</th>
				</tr>
			</thead>
			<tbody id="lista_noticia">
				<?php 
					if(is_array($servicio) && count($servicio)>0){ 
						foreach ($servicio as $value) {
				?>
				<tr id="exp_<?php echo $value['id_servicio'] ?>">
					<td><?php echo $value['no_servicio'] ?></td>
					<td class="center">
						<a href="<?php echo base_url() ?>panel/servicio/editar/<?php echo $value['id_servicio'] ?>" title="Editar Registro" class="editar tooltip"></a>
						<a href="javascript:;" title="Eliminar Registro" class="eliminar tooltip" onclick="confirmar_eliminacion('<?php echo base_url() ?>panel/servicio/eliminar/<?php echo $value['id_servicio'] ?>')"></a>
					</td>
				</tr>
				<?php }}else{ ?>
				<tr>
					<td colspan="2" class="mensaje_sin_data">-- No se encontraron registros --</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<ul id="pagination-digg">
			<?php echo $this->pagination->create_links(); ?>
		</ul>
	</div>
</section>