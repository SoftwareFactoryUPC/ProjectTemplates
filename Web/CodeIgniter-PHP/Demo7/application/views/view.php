<!DOCTYPE html>
<html>
    <head>
	    <title>
	    	View your Excel File in a Web Page. | Visualiza tu Archivo Excel en una Pagina Web
	    </title>
    </head>
    <body> 
		<table>
			<?php foreach($excel as $row) : ?>		
				<tr>
					<?php foreach ($row as $col) : ?>
						<td><?=$col?></td>
					<?php endforeach; ?>
				</tr>
			<?php endforeach; ?>
		</table>
	</body>
</html>







