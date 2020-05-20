<?php
require_once 'conexion.php';
$query = "select * from ant_curso";
$rs = mysqli_query($link,$query);
$listacursos = mysqli_fetch_all($rs,MYSQLI_ASSOC);
//Recuperamos datos de la empresa
$query = "select * from ant_empresa";
$rs    = mysqli_query($link,$query);
$datosempresa = mysqli_fetch_array($rs,MYSQLI_ASSOC);
//Configuramos menu
$inicio      = "class='active'";
$contactenos = "";
?>
<!DOCTYPE html>
<html>
    <head>
	<?php require_once 'header.php';?>	
    </head>
    <body>
 	<?php require_once 'menu.php';?>

	<!--content start--> 
    <div class="container" style="padding-bottom:30px;">
		<h3><a href="">Cursos</a></h3>
		<!--p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
		</p>
		<br/-->
		<ul class="list-unstyled video-list-thumbs row">
                    <?php
                    foreach($listacursos as $value){
                        ?>
                        <li class="col-lg-3 col-sm-4 col-xs-6">
                                <a href="#" title="Claudio Bravo, antes su debut con el Barça en la Liga">
                                    <img src="http://i.ytimg.com/vi/ZKOtE9DOwGE/mqdefault.jpg" alt="Barca" class="img-responsive" height="130px"/>
                                    <h2>Claudio Bravo, antes su debut con el Barça en la Liga</h2>
                                    <span class="play-button"></span>
                                    <span class="duration">03:15</span>
                                </a>
                            <?php
                            //antes inicio/directo
                            ?>
                                <h3><a href="./wp-campus/inicio/index/<?php echo $value['CURSOP_Codigo'];?>"><?php echo $value['CURSOC_Nombre'];?></a></h3>
                                <?php echo $value['CURSOC_DescripcionBreve'];?>
                        </li>
                        <?php
                    }
                    ?>
		</ul>		
		
	</div>
	<?php require_once 'footer.php';?>
    </body>
</html>