<!--Contenido-->
<div class="container-fluid">
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"><?php echo $curso->CURSOC_Nombre;?></h4>
            </div>
            <div class="card-body p-0"><?php echo $menucent;?></div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <!-- /.card-header -->
            <div class="card-body p-0">
                <h3 class="section-title" style="margin-top: 8px;">Registro de Asistencia</h3>
                <div class="card mb-4">
                     <div class="form-group row">
                         <h5 class="col-sm-3">Seleccione fecha: </h5>
                         <div class="col-sm-2">
                             <form id="frmAsistencia" method="post">
                                 <?php echo $selcabasis;?>   
                                 <input type="hidden" name="curso" id="curso" value="<?php echo $curso->CURSOP_Codigo?>">
                             </form>
                         </div>
                     </div>
                     <div class="card-body">
                         <div class="table-responsive">
                             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                 <thead>
                                     <tr style="text-align:center;">
                                         <th>No</th>
                                         <th>Codigo</th>
                                         <th>Apellidos</th>
                                         <th>Nombres</th>
                                         <th>Asistencia</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php echo $fila;?>
                                 </tbody>
                             </table>
                         </div>
                         <div class="text-right">
                             <a class="btn btn-success" id="btnGrabar" href="<?php echo base_url()."asistencia/inicio/".$curso->CURSOP_Codigo;?>">Guardar</a>
                         </div>
                     </div>
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