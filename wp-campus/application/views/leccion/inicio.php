<div class="container-fluid">
    <h3 class="mt-4">
        <?php echo $leccion->SECCIONC_Descripcion;?>/<?php echo $leccion->LECCIONC_Nombre;?>
    </h3>
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
    <?php
    if($sgtelec!=""){
    ?>
    <div class="row justify-content-end">
        <div>
            <a href="<?php echo base_url();?>leccion/inicio/<?php echo $sgtelec;?>" class="btn btn-warning">Siguiente</a>
        </div>
    </div>
    <?php
    }
    ?>
</div>