<!--Menu Izquierdo-->
<?php echo $menuizq;?>

<!--Contenido-->
<div id="Cuerpo">
    <section id="main-content">
        <section class="wrapper site-min-height">
          <h3><?php echo $leccion->SECCIONC_Orden.'. '.$leccion->SECCIONC_Descripcion;?></h3>
          <p><?php echo $menulecc;?></p>
          <h3><?php echo $leccion->SECCIONC_Orden.".".$indice." ".$leccion->LECCIONC_Nombre;?></h3>
            <?php
            if(trim($leccion->LECCIONC_Video)!=""){
            ?>
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe width="560" height="315" src="<?php echo $leccion->LECCIONC_Video;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            <?php
            }
            ?>
          <?php echo $menuhorz;?>          
          <hr style="margin-top: 0px;">
          <!-- Contenido de Leccion -->
          <?php 
          if($descripcion!=""){
            echo $descripcion;    
          }
          else{
              ?>
                <div class="embed-responsive embed-responsive-16by9">
                    <h4>NO EXISTEN CONTENIDO PARA ESTA LECCION</h4>
                </div>
              <?php
          }
          ?>
        </section>
    </section>
</div>