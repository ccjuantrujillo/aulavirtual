<?php
require_once 'conexion.php';
$query = "select * from ant_curso";
$rs = mysqli_query($link,$query);
?>
<!DOCTYPE html>
<html>
	<?php require_once 'header.php';?>
    <body>
	    <!-- Navigation -->
		<?php require_once 'menu.php';?>

	    <!--Content-->
		<div class="container">
			<h3>Cursos</h3>
			<ul class="list-unstyled video-list-thumbs row">
				<?php
				while($row = mysqli_fetch_array($rs)){
					?>
					<li class="col-lg-3 col-sm-4 col-xs-6">
						<a href="#" title="Claudio Bravo, antes su debut con el Barça en la Liga">
							<img src="http://i.ytimg.com/vi/ZKOtE9DOwGE/mqdefault.jpg" alt="Barca" class="img-responsive" height="130px" />
							<h2>Claudio Bravo, antes su debut con el Barça en la Liga</h2>
							<span class="play-button"></span>
							<span class="duration">03:15</span>
						</a>
						<h3><a href="./wp-campus/curso/inicio/<?php echo $row['CURSOP_Codigo'];?>"><?php echo $row['CURSOC_Nombre'];?></a></h3>
						<?php echo $row['CURSOC_DescripcionBreve'];?>
					</li>
					<?php
				}
				?>
			</ul>
		</div>

	    <!--footer start-->   
		<?php require_once 'footer.php';?>
		
    </body>
</html>