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
    <h1>Agregar Contacto</h1>
    <h3 style="text-align: center;"><a href="<?php echo base_url() ?>contactos/listado">Lista de Contactos </a></h3>
        
    <?php echo form_open_multipart(base_url()."contactos/agregar", array("name"=>"form_registro", "id"=>"form_registro", "method"=>"post")); ?>
               <p>
            <label for="nombre" class="icon-user"> Nombre: 
                <span class="required">*</span>
            </label>
            <input type="text" name="nombre" id="nombre" required="required" placeholder="nombre:" />
        </p>

        <p>
            <label for="email" class="icon-envelope"> Email: 
                <span class="required">*</span>
            </label>
            <input type="text" name="email" id="email" placeholder="Asunto:" required="required" />
        </p>

        
        <p class="indication">* Campos requerido</p>

        <input type="submit" value="Agregar Contacto " />

    <?php echo form_close(); ?>
        
</div>
</body>

    

</html>
