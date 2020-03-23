<div class="contenido">
    <div class="contenidotabla">
        <h1><?php echo $titulo;?></h1>
        <?php echo $form_open;?>
        <div id="cabecera">
            <table style="background-color: #f4f7ff">
              <tr>
                <td>Codigo:</td>
                <td class="formss"><input name="modulo" id="modulo" type="text" value="<?php echo $lista->codigo;?>" readonly="readonly" class="cajaMinima" style="background-color: #E6E6E6"></td>
                <td>Tipo Estudio:</td>
                <td class="formss"><?php echo $seltipoestudio;?></td>                
              </tr>                  
              <tr>
                <td>Turno:</td>
                <td class="formss"><?php echo $selturno;?></td>
                <td>Descripcion:</td>
                <td class="formss">
                    <input name="descripcion" id="descripcion" type="text" value="<?php echo $lista->descripcion;?>" class="cajaMinima"/>
                    &nbsp;<a href="#" id="agregar">Agregar</a>  
                </td>                
              </tr>                   
            </table>
        </div>
        <div id="detalle" style = "float: left; height: 400px;overflow: auto; width: 100%;background: #e8edff;">
            <table width="100%" id="tabla_detalle">
                <tr>
                    <th width="3%" align="center">No</th>
                    <th width="15%" align="center">Dia</th>
                    <th width="15%" align="center">Curso</th>
                    <th align="center">Desde</th> 
                    <th align="center">Hasta</th> 
                    <th align="center">Acciones</th>
                </tr>
                <?php
                if(count($lista->modulodetalle)>0){
                    foreach($lista->modulodetalle as $item => $value){
                        ?>
                        <tr id="<?php echo $value->MODULODETP_Codigo;?>">
                            <td width="3%" align="center"><?php echo $item+1;?></td>
                            <td align="center"><?php echo $semana[$value->MODULODETC_Dia];?></td>
                            <td align="center"><?php echo $value->PROD_Nombre;?></td>
                            <td align="center"><?php echo substr($value->MODULODETC_Desde,0,5);?></td> 
                            <td align="center"><?php echo substr($value->MODULODETC_Hasta,0,5);?></td> 
                            <td align="center">
                                <a href="#" class="editardetalle">Editar</a>&nbsp;
                                <a href="#" class="eliminardetalle">Eliminar</a>
                            </td>
                        </tr>                
                        <?php
                    ?>
                    <?php                                
                    }
                }
                else{
                    ?>
<!--                    <tr><td colspan="8" align="center">:::NO EXISTEN REGISTROS:::</td></tr>-->
                    <?php
                }
                ?>
            </table>
        </div>
        <div class="frmboton">
            <div class="frmboton_matricula">
                <input class="botones" id="cancelar" type="button" alt="Cancelar" title="Cancelar" value="Cancelar"/>       
                <input class="botones" id="imprimir" type="button" value="Imprimir" alt="Imprimir" title="Imprimir"/>                  
                <input class="botones" id="grabar" type="button" alt="Aceptar" title="Aceptar" value="Aceptar"/>
            </div>
        </div>        
        <?php echo $oculto;?>
        <?php echo $form_close;?>
    </div>
</div>    