<!--Contenido-->
<div class="container-fluid">
    <h3 class="mt-4"><?php echo $curso->CURSOC_Nombre;?>/Registro de notas</h3>
        <div class="card mb-4">
            <div class="form-group row">
                <h5 class="col-sm-2">Seleccione fecha</h5>
                <div class="col-sm-3">
                    <form id="frmCalificacion" method="post">
                        <?php echo $seltarea?>
                        <input type="hidden" name="curso" id="curso" value="<?php echo $curso->CURSOP_Codigo?>">
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr style="text-align:center;">
                                <?php echo $columna;?>
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