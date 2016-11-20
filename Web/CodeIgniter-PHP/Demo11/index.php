
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/fancywebsocket.js"></script>
<script src="http://code.jquery.com/ui/1.8.21/jquery-ui.min.js"></script>
<script src="js/jquery.ui.touch-punch.js"></script>

<style type="text/css">
.tablero{ width:560px; height:570px;}
.blanco{width:70px; height:70px; float:left; background-color: #F6F6F6; vertical-align: baseline;}
.negro{width:70px; height:70px; float:left; background-color:#000000;vertical-align:central;}
li{list-style: none;height: 70px; width:70px;padding: 0px;margin-left: 10px; margin-top:5px;	}
ul{ list-style:none; margin:0px; padding:0px;}
.trash{width:100%;height:100%; display:inline-block;}
.activo{ background-color:#F7FF9E; opacity:.4;}
</style>
</head>

<div class="tablero">
<input type="hidden" value="<?php echo $_GET['jugador']?>" id="jugador" />
<ul id="gallery">
<?php
for($a = 1; $a<=8; $a++)
{
	for($i = 1; $i<=8; $i++)
	{
		if($a%2==0)
		{
			if($i%2==0)
			{
				echo '<div class="blanco" id="c'.$a.$i.'"><span class="trash" id="'.$a.$i.'"></span></div>';
			}
			else
			{
				echo '<div class="negro" id="c'.$a.$i.'"><span class="trash" id="'.$a.$i.'"></span></div>';
			}
		}
		else
		{
			if($i%2==0)
			{
				echo '<div class="negro" id="c'.$a.$i.'"><span class="trash" id="'.$a.$i.'"></span></div>';
			}
			else
			{
				
				echo '<div class="blanco" id="c'.$a.$i.'"><span class="trash" id="'.$a.$i.'"></span></div>';
			}
		}
	}
}
?>
</ul><hr />
</div>
        <script>
        $(function() 
		{
          var $gallery = $( "#gallery" ),
              $trash = $( ".trash" );

          $( "li", $gallery ).draggable({
            helper: "clone",
            cursor: "move",
          });

          $trash.droppable({
			   	hoverClass: "activo",
            	drop: function( event, ui ) {
				
				var id = $(this).attr("id");//extraemos el ID del elemento en donde se soltara la pieza
				var idprovene = ui.draggable.attr("title");//extraemos el valor te title del objeto arrastrado
				var jugador = document.getElementById('jugador').value;//extraemos el id del jugador
				arr = id+","+jugador+","+idprovene;
				send(arr);//este es el socket, enviamos los identificadores de cuadro y pieza  	
				
				ui.draggable.append().appendTo( "#"+id ).show();//colocamos la pieza arrastrada en el cuadro seleccionado			
				
            }
          });
		  
		  		   
        });
		
		$("#18").html('<li title="18" id="p18"><img src="with.png" /></li>');
	    $("#81").html('<li title="81" id="p81"><img src="black.png" /></li>');
	    $("#82").html('<li title="82" id="p82"><img src="black.png" /></li>');
	    $("#83").html('<li title="83" id="p83"><img src="black.png" /></li>');
	    $("#84").html('<li title="84" id="p84"><img src="black.png" /></li>');
	    $("#85").html('<li title="85" id="p85"><img src="black.png" /></li>');
	    $("#86").html('<li title="86" id="p86"><img src="black.png" /></li>');
	    $("#87").html('<li title="87" id="p87"><img src="black.png" /></li>');
	    $("#88").html('<li title="88" id="p88"><img src="black.png" /></li>');
		
		function moverpieza(arr)
		{
			var elem = arr.split(',');
			var idcuadro = elem[0];
			var jugador  = elem[1];
			var proviene = elem[2];
			var jugadoractual = document.getElementById('jugador').value;
			
			alert(jugador+" "+jugadoractual+" "+idcuadro);
			if(jugador == jugadoractual)
			{
			}
			else
			{
				var pieza = $("#"+proviene).html();	
				$("#"+proviene).html("");	
				$("#"+idcuadro).html(pieza);	
			}
			$("#p"+proviene).attr("title",idcuadro);
			$("#p"+proviene).attr("id","p"+idcuadro);
		}
        </script>
<body>


</body>
</html>