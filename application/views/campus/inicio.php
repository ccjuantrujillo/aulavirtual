<!--Menu Izquierdo-->
<?php echo $menuizq;?>

<!--Contenido-->
<div id="Cuerpo">
    <section id="main-content">
        <section class="wrapper site-min-height">
			<!-- Title -->
			<h3 class="mt-4"><?php echo $curso->CURSOC_Nombre;?></h3>
			<hr>
			<?php
			if(trim($curso->CURSOC_Video)!=""){
			?>
				<div class="embed-responsive embed-responsive-16by9">
				  <iframe width="560" height="315" src="<?php echo $curso->CURSOC_Video;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			<?php
			}
			?>
			<h3 class="section-title">Introduccion</h3>
	      	<ol class="style1">
	      	  <?php echo $curso->CURSOC_DescripcionBreve;?>
	        </ol>
        </section>
    </section>
</div>