<!--Contenido-->
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
                <?php
                if(trim($curso->CURSOC_Video)!=""){
                ?>
                    <div class="embed-responsive embed-responsive-16by9">
                      <iframe width="560" height="315" src="<?php echo $curso->CURSOC_Video;?>" frameborder="0" 
                              allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                <?php
                }
                ?>
                <h3 class="section-title" style="margin-top: 8px;">Introduccion</h3>
                <div class="row">
                    <ol class="style1"><?php echo $curso->CURSOC_DescripcionBreve;?></ol>
                </div>
                <h3 class="section-title">Programa</h3>
                <div class="row">
                    <ol><?php echo $menu;?></ol>
                </div>                
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