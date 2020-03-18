<!DOCTYPE html>
<html>
<head>
	<title>Editar Persona</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h2>Editar persona</h2>
	<form name="frmPersona" method="post" action="">
		<div class="form-group">
			<label for="Codigo">Codigo:</label>
			<input type="text" name="codigo" id="codigo" value="" class="form-control">
		</div>
		<div class="form-group">
			<label for="Nombre">Nombre:</label>
			<input type="text" name="Nombre" id="Nombre" value="" class="form-control">
		</div>
		<div class="form-group">
			<label for="ApellidoPaterno">Apellido Paterno: </label>
			<input type="text" name="ApellidoPaterno" id="ApellidoPaterno" value="" class="form-control">
		</div>
		<div class="form-group">
			<label for="ApellidoMaterno">Apellido Materno:</label>
			 <input type="text" name="ApellidoMaterno" id="ApellidoMaterno" value="" class="form-control">	
		</div>
		<div class="form-group">
			<label for="NumeroDocIdentidad">Documento Identidad:</label> 
			<input type="text" name="NumeroDocIdentidad" id="NumeroDocIdentidad" value="" class="form-control">
		</div>
		<div class="form-group">
			<label for="Telefono">Telefono:</label>
			<input type="text" name="Telefono" id="Telefono" value="" class="form-control">
		</div>
		<div class="form-group">
			<label for="FechaNacimiento">F.Nacimiento:</label>
			<input type="text" name="FechaNacimiento" id="FechaNacimiento" value="" class="form-control">
		</div>
		<input type="hidden" name="modo" id="modo" value="">
		<input type="hidden" name="Codigo" id="Codigo" value="">	
		<div class="form-group">
			<a href="#" onclick="" class="btn btn-primary">Grabar</a>
			<a href="#" class="btn btn-primary">Cancelar</a>
		</div>	
	</form>
</div>
</body>
</html>