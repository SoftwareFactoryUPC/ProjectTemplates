<?php if($this->session->flashdata('message')){ echo $this->session->flashdata('message'); } ?>
<section id="content">
	<div class="head_box">
		<h2>Listado De Usuarios</h2>
		<ul>
			<li>
				<a href="<?php echo base_url() ?>panel/usuario/nuevo" class="">Nuevo Usuario</a>
			</li>
		</ul>
	</div>
	<div class="body_box">
		
		<table class="tabla">
			<thead>
				<tr>
					<th>Nombres Completos</th>
					<th width="20%">Usuario</th>
					<th class="opciones_grande">Opciones</th>
				</tr>
			</thead>
			<tbody id="lista_noticia">
				<?php 
					if(is_array($usuario) && count($usuario)>0){ 
						foreach ($usuario as $value) {
				?>
				<tr id="<?php echo $value['id_usuario'] ?>">
					<td><?php echo $value['usuario'] ?></td>
					<td class="movil"><?php echo $value['usunick'] ?></td>
					<td class="center">
						<a href="<?php echo base_url() ?>panel/usuario/editar/<?php echo $value['id_usuario'] ?>" title="Editar Registro" class="editar tooltip"></a>
						<a href="<?php echo base_url() ?>panel/usuario/eliminar/<?php echo $value['id_usuario'] ?>" title="Eliminar Registro" class="eliminar tooltip" ></a>
					</td>
				</tr>
				<?php }}else{ ?>
				<tr>
					<td colspan="3" class="mensaje_sin_data">-- No se encontraron registros --</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<ul id="pagination-digg">
			<?php echo $this->pagination->create_links(); ?>
		</ul>
	</div>
</section>