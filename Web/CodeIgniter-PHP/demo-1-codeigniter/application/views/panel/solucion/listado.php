<?php if($this->session->flashdata('message')){ echo $this->session->flashdata('message'); } ?>
<section id="content">
	<div class="head_box">
		<h2>Listado De Soluciones</h2>
		<ul>
			<li>
				<a href="<?php echo base_url() ?>panel/solucion/nuevo" class="">Nueva Solución</a>
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
					if(is_array($solucion) && count($solucion)>0){ 
						foreach ($solucion as $value) {
				?>
				<tr id="exp_<?php echo $value['id_solucion'] ?>">
					<td><?php echo $value['no_solucion'] ?></td>
					<td class="center">
						<a href="<?php echo base_url() ?>panel/solucion/editar/<?php echo $value['id_solucion'] ?>" title="Editar Registro" class="editar tooltip"></a>
						<a href="<?php echo base_url() ?>panel/solucion/eliminar/<?php echo $value['id_solucion'] ?>" title="Eliminar Registro" class="eliminar tooltip" ></a>
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