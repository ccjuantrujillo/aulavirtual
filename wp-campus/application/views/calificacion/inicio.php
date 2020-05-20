<!--Contenido-->
<div class="container-fluid">
    <h3 class="mt-4"><?php echo $curso->CURSOC_Nombre;?>/Registro de notas</h3>

        <div class="card mb-4">
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