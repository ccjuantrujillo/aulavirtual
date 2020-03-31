<div class="container-fluid">
    <h3 class="mt-4">
        <a href="<?php echo base_url();?>curso/inicio/<?php echo $leccion->CURSOP_Codigo;?>"><?php echo $leccion->CURSOC_Nombre;?></a>
        /<?php echo $leccion->LECCIONC_Orden." ".$leccion->LECCIONC_Nombre;?>
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
    <hr style="margin-top: 0px;background: #337aff;">
    <?php 
    if($descripcion!=""){
      echo $descripcion;    
    }
    else{
        ?>
          <div class="row">
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