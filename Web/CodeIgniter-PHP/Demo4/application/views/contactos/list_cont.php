<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Demo 3 - Software Factory</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href='http://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url() ?>assets/css/docs.css" rel="stylesheet" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

</head>
<body>

<div id="content">
    <h1>Lista de Contactos</h1>
   <h3 style="text-align: center;"><a href="<?php echo base_url() ?>contactos/nuevo">Agregar Contacto </a>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
    <a href="<?php echo base_url() ?>welcome/index">Mandar Correo Masivo</a></h3>
        <table class="tabla">
            <thead>
                <tr>
                    <th style="width:6%; vertical-align: middle;">Nº</th>
                    <th >Nombre</th>
                    <th>Correo</th>
                    <th class="opciones_grande">Opciones</th>
                </tr>
            </thead>
            <tbody id="lista_correos">
                <?php 
                    if(is_array($contacto) && count($contacto)>0){ 
                        $it = 0;
                        foreach ($contacto as $value) {
                        $pagi = ($this->uri->segment(4)=="")? 0 : $this->uri->segment(4);
                ?>
                <tr>
                    <td><?php echo (++$it)+$pagi; ?></td>
                    <td><?php echo $value['no_contacto']?></td>
                    <td><?php echo ($value['cor_contacto'])?></td>
                    <td class="center">
                        <a href="<?php echo base_url() ?>contactos/editar/<?php echo $value['id_contacto'] ?>" title="Editar Contacto" class="editar tooltip"></a>
                        <a href="<?php echo base_url() ?>contactos/eliminar/<?php echo $value['id_contacto'] ?>" title="Eliminar Contacto" class="eliminar tooltip"></a>
                    </td>
                </tr>
                <?php }}else{ ?>
                <tr>
                    <td colspan="6" class="mensaje_sin_data">-- No se encontraron registros --</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <ul id="pagination-digg">
            <?php echo $this->pagination->create_links(); ?>
        </ul>
</div>
</body>

    

</html>
