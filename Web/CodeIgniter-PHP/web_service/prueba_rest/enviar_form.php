<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Demo - Software Factory</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

 	 <link href="assets/css/docs.css" rel="stylesheet" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

   
</head>
<body>

<div id="content">
    <h1>Prueba Web Service Rest</h1>
 <h3>

</h3>
 <form action="../rest/api.php/enviarSMS" method="post" name="form">
		<input type="text" style="width:300px; margin-left: 30%;" name="usuario" placeholder="Usuario"><br>
		<input type="text" style="width:300px; margin-left: 30%;" name="password" placeholder="Password"><br>
		<br>
		<input type="text" style="width:300px; margin-left: 30%;" name="mensaje[]" placeholder="Mensaje"><br>
		<input type="text" style="width:300px; margin-left: 30%;" name="numero[]" placeholder="Numero 1"><br><br>
		<input type="text" style="width:300px; margin-left: 30%;" name="mensaje[]" placeholder="Mensaje"><br>
		<input type="text" style="width:300px; margin-left: 30%;" name="numero[]" placeholder="Numero 2"><br><br>
		<input type="text" style="width:300px; margin-left: 30%;" name="mensaje[]" placeholder="Mensaje"><br>
		<input type="text" style="width:300px; margin-left: 30%;" name="numero[]" placeholder="Numero 3"><br><br>

		<input type="submit" name="btn_enviar" value="Enviar">
	</form>
</div>
</body>

    

</html>









