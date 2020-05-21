<!--Contenido-->
<div class="container-fluid">
    <h3 class="mt-4"><?php echo $curso->CURSOC_Nombre;?>/Participantes</h3>

        <div class="card mb-4">
            <div class="card-header">
                <?php
                $correos = "";
                foreach($alumnos as $value){
                    if($value->PERSC_Email!="")  $correos.=$value->PERSC_Email.";";
                    if($value->PERSC_EmailInstitucional!="")  $correos.=$value->PERSC_EmailInstitucional.";";
                }
                //echo $correos;
                ?>
            </div>            
            <div class="card-body">
                <div class="table-responsive table-condensed">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr style="text-align:center;">
                                <th>No</th>
                                <th>Codigo</th>
                                <th>Identificador</th>
                                <th>Apellidos</th>
                                <th>Nombres</th>
                                <th>Correo</th>
                                <!--th>Correo Inst.</th-->
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