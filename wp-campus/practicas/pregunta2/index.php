<?php
require_once 'conexion.php';
//Hacemos la consulta
$cadena = "select * from persona";
$result = $conexion->query($cadena);
//Extraemos el resultado
$fila = "";
while($row = $result->fetch_assoc()){
	$fila.="<tr>";
	$fila.="<td>".$row['Codigo']."</td>";
	$fila.="<td>".$row['Nombre']."</td>";
	$fila.="<td>".$row['ApellidoPaterno']."</td>";
	$fila.="<td>".$row['ApellidoMaterno']."</td>";
	$fila.="<td>".$row['NumeroDocIdentidad']."</td>";
	$fila.="<td>".$row['Telefono']."</td>";
	$fila.="<td>".$row['FechaNacimiento']."</td>";
	$fila.="<td>";
	$fila.="<a href='editar.html' class='btn btn-primary'>Editar</a>&nbsp;";
	$fila.="<a href='eliminar.html' class='btn btn-primary'>Eliminar</a>";
	$fila.="</td>";
	$fila.="</tr>";
}
//Cerramos la conexion
$result->close();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mantenimiento de Personas</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<header>
			<a href="agregar.php" class="btn btn-primary">Agregar</a>			
		</header>
		<table class="table table-bordered table-hover table-striped">
			<tr>
				<td>CODIGO</td>
				<td>NOMBRE</td>
				<td>AP.PATERNO</td>
				<td>AP.MATERNO</td>
				<td>DNI</td>
				<td>TELEFONO</td>
				<td>F.NACIMIENTO</td>
				<td>ACCIONES</td>
			</tr>
			<?php echo $fila;?>
		</table>
	</div>
</body>
</html>