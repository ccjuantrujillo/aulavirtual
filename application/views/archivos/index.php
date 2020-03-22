<!--Menu Izquierdo-->
<?php echo $menuizq;?>

<!--Contenido-->
<div id="Cuerpo">
    <section id="main-content">
        <section class="wrapper site-min-height">
          <h3>ARCHIVOS PARA LAS LECCIONES</h3>
          <hr style="margin-top: 0px;">
          <!-- Contenido de Archivos -->
          <div>
          <?php
          $nomseccion_ant = "";
          if(count($archivos)>0){
            foreach($archivos as $value){
              if($nomseccion_ant!=$value->SECCIONC_Descripcion){
                ?>
                <h3><?php echo $value->SECCIONC_Orden.". ".$value->SECCIONC_Descripcion;?></h3>
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
              else{
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
                 $nomseccion_ant=$value->SECCIONC_Descripcion;
                }
                //Ultima fila
                //
              }
             ?>       
          </div>
        </section>
    </section>
</div>