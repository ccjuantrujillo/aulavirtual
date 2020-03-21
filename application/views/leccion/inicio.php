<!--Menu Izquierdo-->
<?php echo $menuizq;?>

<!--Contenido-->
<div id="Cuerpo">
    <section id="main-content">
        <section class="wrapper site-min-height">
          <h3 class="mt-4"><?php echo $curso->CURSOC_Nombre;?>/<?php echo $curso->SECCIONC_Orden.'. '.$curso->SECCIONC_Descripcion;?></h3>
          <p class="lead"><?php echo $filalecciones;?></p>
          <hr>
          <p><?php echo $leccion->SECCIONC_Orden.".".$indice." ".$leccion->LECCIONC_Nombre;?></p>
            <?php
            if(trim($leccion->LECCIONC_Video)!=""){
            ?>
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe width="560" height="315" src="<?php echo $leccion->LECCIONC_Video;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            <?php
            }
            ?>
          <hr>
          <!-- Contenido de Leccion -->
          <?php echo $descripcion;?>
          <hr>
        </section>
    </section>
</div>