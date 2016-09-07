<?php if($this->session->flashdata('message')){ echo $this->session->flashdata('message'); } ?>
<section id="content">
	<div class="head_box">
		<h2>Listado De Configuraciones</h2>
		<ul>
			<li>
				<a href="<?php echo base_url() ?>panel/configuracion/nuevo" class="">Nueva Configuración</a>
			</li>
		</ul>
	</div>
	<div class="body_box">
		<table class="tabla">
			<thead>
				<tr>
					<th>Titulo</th>
					<th>Valor</th>
					<th class="opciones_grande">Opciones</th>
				</tr>
			</thead>
			<tbody id="lista_noticia">
				<?php 
					if(is_array($configuracion) && count($configuracion)>0){ 
						foreach ($configuracion as $value) {
				?>
				<tr id="exp_<?php echo $value['id_configuracion'] ?>">
					<td><?php echo $value['contitulo'] ?></td>
					<td><?php echo $value['convalor'] ?></td>
					<td class="center">
						<a href="<?php echo base_url() ?>panel/configuracion/editar/<?php echo $value['id_configuracion'] ?>" title="Editar Registro" class="editar tooltip"></a>
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