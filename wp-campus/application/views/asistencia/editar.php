<!--Contenido-->
<div class="container-fluid">
    <h3 class="mt-4"><?php echo $curso->CURSOC_Nombre;?>/Registro de Asistencia</h3>
        <div class="card mb-4">
            <div class="form-group row">
                <h5 class="col-sm-2">Seleccione fecha: </h5>
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
            </div>
        </div>
</div>