<?php

	require_once("../serverside/bootstrap.php");

	define("PAGE_TITLE", "Problemas");

	require_once("includes/head.php");

?>
	<div class="post_blanco" >
		<div align="center">
			<h2>Problem-Set</h2>
		</div>

		<div align="center">
		<table>
		<thead>
		<tr>
			<th width='5%'>ID</th>
			<th width='25%'>Titulo</th>
			<th width='12%'><a href="problemas.php?orden=vistas">Vistas</a></th>
			<th width='12%'><a href="problemas.php?orden=aceptados">Aceptados</a></th>
			<th width='12%'><a href="problemas.php?orden=intentos">Intentos</a></th>
			<th width='12%'>Radio</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$params = array("public" => "SI");
		$result = c_problema::lista($params);
		if (SUCCESS($result))
		{
			$problemas = $result["problemas"];
			for ($i = 0; $i < sizeof($problemas); $i++)
			{
				$prob = $problemas[$i];
				echo "<TR style='background:#e7e7e7;'>";
				echo "<TD align='center' >". $prob['probID'] ."</TD>";
				echo "<TD align='left' ><a href='verProblema.php?id=". $prob['probID']  ."'>". $prob['titulo']   ."</a> </TD>";
				echo "<TD align='center' >". $prob['vistas']   ." </TD>";
				echo "<TD align='center' >". $prob['aceptados']   ." </TD>";
				echo "<TD align='center' >". $prob['intentos']   ." </TD>";
				//printf("<TD align='center' >%2.2f%%</TD>", $ratio);
				echo "</TR>";
			}
		}
		?>
		</tbody>
		</table>
		</div>
	</div>

	<?php include_once("includes/footer.php"); ?>

