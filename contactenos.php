<?php
require_once 'conexion.php';
$query = "select * from ant_empresa where EMPRP_Codigo='".$empresa."'";
$rs = mysqli_query($link,$query);
$datosempresa = mysqli_fetch_array($rs);
//Configuramos menu
$inicio      = "";
$contactenos = "class='active'";
?>
<!DOCTYPE html>
<html>
    <head>
		<?php require_once 'header.php';?>		
    </head>
    <body>
    	<?php require_once 'menu.php';?>

		<!-- container -->
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<br>
					
					<form class="form-light mt-20" role="form">
						<div class="form-group">
							<label>Nombres</label>
							<input type="text" class="form-control" placeholder="Su nombre">
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Email</label>
									<input type="email" class="form-control" placeholder="Correo electronico">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Telefono</label>
									<input type="text" class="form-control" placeholder="Numero de telefono">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Asunto</label>
							<input type="text" class="form-control" placeholder="Asunto">
						</div>
						<div class="form-group">
							<label>Mensaje</label>
							<textarea class="form-control" id="message" placeholder="Escriba su mensaje aqui..." style="height:100px;"></textarea>
						</div>
						<button type="submit" class="btn btn-two">Enviar</button><p><br/></p>
					</form>
				</div>
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-6">
							<h3 class="section-title">Datos Empresa</h3>
							<div class="contact-info">
								<h5>Direccion</h5>
								<p><?php echo $datosempresa['EMPRC_Direccion'];?></p>
								
								<h5>Email</h5>
								<p><?php echo $datosempresa['EMPRC_Email'];?></p>
								
								<h5>Telefono</h5>
								<p><?php echo $datosempresa['EMPRC_Movil'];?></p>
							</div>
						</div> 
					</div> 						
				</div>
			</div>
		</div>
		<!-- /container -->
	<?php require_once 'footer.php';?>
    </body>
</html>