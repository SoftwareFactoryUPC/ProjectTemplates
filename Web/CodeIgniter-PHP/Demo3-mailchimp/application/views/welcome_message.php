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

    <script type="text/javascript">
        $().ready(function() 
        {
            $('.pasar').click(function() { return !$('#origen option:selected').remove().appendTo('#destino'); });  
            $('.quitar').click(function() { return !$('#destino option:selected').remove().appendTo('#origen'); });
            $('.pasartodos').click(function() { $('#origen option').each(function() { $(this).remove().appendTo('#destino'); }); });
            $('.quitartodos').click(function() { $('#destino option').each(function() { $(this).remove().appendTo('#origen'); }); });
            $('.submit').click(function() { $('#destino option').prop('selected', 'selected'); });
        });
    </script>
</head>
<body>

<div id="content">
    <h1><a href="<?php echo base_url() ?>contactos/listado" data-toggle="tooltip" title="Agregar Contactos!">Correo Masivo</a></h1>
 <h3>
<?php
    if($mensaje!=null or $mensaje!='')
    {
        echo $mensaje;
    }

?>
</h3>
 <?php echo form_open_multipart(base_url()."welcome/enviaremail", array("name"=>"form_registro", "id"=>"form_registro", "method"=>"post")); ?>     <p>
            <label for="de" class="icon-user"> De: 
                <span class="required">*</span>
            </label>
            <input type="text" name="de" id="de" required="required" placeholder="De:" />
        </p>

        <p>
            <label for="asunto" class="icon-envelope"> Asunto: 
                <span class="required">*</span>
            </label>
            <input type="text" name="asunto" id="asunto" placeholder="Asunto:" required="required" />
        </p>

        <p>
            <label for="contactos" class="icon-link"> Contactos: </label>
            <br>
            <select name="origen[]" id="origen" size="10" multiple>

            <?php 
                    if(is_array($contacto) && count($contacto)>0){ 
                        foreach ($contacto as $value) {
                ?>

                    <option><?php echo $value['cor_contacto']?></option>

                <?php }}?>



            </select>
            <br><br>
            <input type="button" style="width:70px; margin-left: 35%;"class="pasar izq" value="Pasar »">
            <input type="button" style="width:70px; margin-left: 35%;"class="quitar der" value="« Quitar">
            <br>
            <select name="destino[]"  id="destino" style="display:inline-block;" size="10" multiple>

            </select>
        </p>

        <p>
            <label for="message" class="icon-comment"> Mensaje
                <span class="required">*</span>
            </label>
            <textarea placeholder="Escribe tu mensaje" name="texto" required="required"></textarea>
        </p>
        <p class="indication">* Campos requerido</p>

        <input type="submit" value=" Envia tu correo ! " />

  
    <?php echo form_close(); ?>
</div>
</body>

    

</html>