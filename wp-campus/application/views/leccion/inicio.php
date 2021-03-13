<div class="container-fluid">
    <section class="content">
      <div class="row">

        <!--div class="col-md-3">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"><?php echo $curso->CURSOC_Nombre;?></h4>
            </div>
            <div class="card-body p-0"><?php echo $menucent;?></div>
          </div>
        </div-->

        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <!-- /.card-header -->
            <div class="card-body p-0">
                <h4 class="section-title" style="margin-top: 8px;"><?php echo $leccion->LECCIONC_Orden." ".$leccion->LECCIONC_Nombre;?></h4>
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
                   ?>
                     <!--h3 class="mt-4" style="color:#007bff;">CONTENIDO</h3-->    
                   <?php
                   echo $descripcion;   
                   ?>
                     <hr style="margin-top: 0px;background: #337aff;">   
                   <?php
                 }
                 else{
                     ?>
                       <!--div class="row">
                           <h4>NO EXISTEN CONTENIDO PARA ESTA LECCION</h4>
                       </div-->
                     <?php
                 }
                 ?>  
                 <!--h3 class="mt-4" style="color:#007bff;">ARCHIVOS</h3-->    
                 <div>
                     <div class="card">
                         <div class="card-body">
                             <table class="table table-striped table-valign-middle">
                               <tbody>
                               <?php
                                 if(count($archivos)>0){
                                     foreach($archivos as $value){  
                                     ?>
                                     <tr>
                                       <td>
                                           <a href="<?php echo dirname(base_url())."/wp-campus/files/".$value->ARCHIVC_Adjunto;?>" target="_blank">
                                             <img src="<?php echo base_url();?>img/archivo.svg" alt="Product 1" class="img-circle img-size-32 mr-2">
                                             <?php echo $value->ARCHIVC_Nombre;?>                                  
                                           </a>
                                       </td>
                                       <td class="text-right">
                                           <a href="#" class="text-muted">Publicado el <?php echo substr($value->LECCIONC_FechaRegistro,0,10);?>
                                           <i class="fas fa-search"></i> 
                                         </a>
                                       </td>
                                     </tr>
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
                               </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
                <?php
                if($sgtelec!=""){
                ?>
                <div class="row justify-content-end">
                    <div style="margin-right: 15px;">
                        <a href="<?php echo base_url();?>leccion/inicio/<?php echo $sgtelec;?>" class="btn btn-warning">Siguiente</a>
                    </div>
                </div>
                <?php
                }
                ?>                            
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section> 
</div>