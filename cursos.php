<?php
if(isset($_GET["id"]))
	$id = $_GET["id"];
else
	$id = 1;
if($id==1)
	$enlace_curso = 'courses/ingles_maestria_191/index.php';
elseif($id==2)
	$enlace_curso = 'courses/musica_20201/index.php';
elseif($id==3)
	$enlace_curso = 'courses/php_2020/index.php';		
elseif($id==4)
	$enlace_curso = 'courses/oracle_intro_2020/index.php';				
else
	$enlace_curso = 'courses/musica_20201/index.php';		
?>
<!DOCTYPE html>
<html lang="en">
<head><?php require_once "header.php";?></head>
<body>
	<?php require_once "menu.php";?>
	<section class="container">
		<div class="row">
			<div class="col-md-8">
		   		<?php require_once $enlace_curso;?>
			</div>
			<div class="col-md-4">
				<?php require_once 'ultimos_cursos.php';?>
			 </div>
		</div>
    </section>
	<?php require_once "footer.php";?>
</body>
</html>