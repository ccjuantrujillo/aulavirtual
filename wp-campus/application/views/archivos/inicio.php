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
    <div>
        <?php
        if(count($archivos)>0){
            foreach($archivos as $value){
            ?>
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title"><?php echo $value->ARCHIVC_Nombre;?></h3>
                  <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-4">
                      <a href="<?php echo base_url()."administrador/files/".$value->ARCHIVC_Adjunto;?>" target="blank"><img src="http://i.ytimg.com/vi/ZKOtE9DOwGE/mqdefault.jpg" alt="Barca" class="img-responsive" height="200px" width="350px"/></a>
                      </div>
                    <div class="col-lg-10 col-md-9 col-sm-8"><p class="card-text"><?php echo $value->ARCHIVC_Descripcion;?></p></div>                  
                  </div>
                </div>
                <div class="card-footer text-muted">
                  Publicado el 01 Enero 2018 
                </div>
              </div>     
             <?php
             }
        }
        else{
            ?>
            <div class="row">
                <h4>NO EXISTEN ARCHIVOS PARA ESTA LECCION</h4>
            </div>
            <?php
        }
        ?>  
    </div>
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