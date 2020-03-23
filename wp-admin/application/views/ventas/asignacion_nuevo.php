<div class="contenido">
    <div class="contenidotabla">
        <h1><?php echo $titulo;?></h1>
        <?php echo $form_open;?>
        <div id="cabecera">
            <table style="background-color: #f4f7ff">
              <tr>
                <td width="13%">Codigo:</td>
                <td class="formss" width="35%"><input name="asignacion" id="asignacion" type="text" value="<?php echo $lista->asignacion;?>" readonly="readonly" class="cajaReducida" style="background-color: #E6E6E6"/></td>
                <td>Fecha:</td>
                <td class="formss">
                    <input name="fecha" id="fecha" type="text" value="<?php echo $lista->fecha;?>" readonly="readonly" class="cajaMinima"/>
                </td>                        
              </tr>  
              <tr>
                <td>Ciclo:</td>
                <td class="formss"><?php echo $selciclo;?></td>
                <td>Estado:</td>
                <td class="formss"><?php echo $selestado;?></td>                
              </tr>                  
              <tr>
                <td>Apellidos y Nombres:</td>
                <td class="formss">
                    <input name="profesor" id="profesor" type="text" value="<?php echo $lista->profesor;?>" readonly="readonly" class="cajaReducida" style="background-color: #E6E6E6"/>
                    <input name="nombres" id="nombres" type="text" value="<?php echo $lista->paterno.' '.$lista->materno.' '.$lista->nombres;?>" class="cajaGrande" readonly="readonly" style="background-color: #E6E6E6"/>&nbsp;&nbsp;
                    <?php if($accion=='n'):;?>
                        <input id="ver_profesor" name="ver_profesor" type="button" class="aceptarlog2" alt="Buscar profesor" title="Buscar profesor" value="Buscar" />
                    <?php endif;?>
                </td>
                <td>Curso:</td>
                <td class="formss" align="left">
                    <input name="curso" id="curso" type="hidden" value="<?php echo $lista->curso;?>" readonly="readonly" class="cajaMedia" style="background-color: #E6E6E6"/>
                    <input name="course_id" id="course_id" type="hidden" value="<?php echo $lista->course_id;?>"/>
<!--                    <input name="code" id="code" type="text" value="< ?php echo $lista->code;?>" readonly="readonly" class="cajaMedia" style="background-color: #E6E6E6"/>-->
                    <input name="title" id="title" type="text" value="<?php echo $lista->title;?>" class="cajaGrande" readonly="readonly" style="background-color: #E6E6E6"/>&nbsp;&nbsp;
                    <input name="modulo" id="modulo" type="text" value="<?php echo $lista->modulo;?>" class="cajaMinima" readonly="readonly" style="background-color: #E6E6E6"/>
                    <?php if($accion=='n'):;?>
                        <input id="ver_cursos" name="ver_cursos" type="button" class="aceptarlog2" alt="Buscar curso" title="Buscar curso" value="Buscar" />
                        &nbsp;<a href="#" id="agregar">Agregar</a> 
                    <?php endif;?>  
                </td>               
              </tr>                    
            </table>
        </div>
        <div id="detalle" style = "float: left; height: 270px;overflow: auto; width: 100%;background: #e8edff;">
            <table width="100%" id="tabla_detalle">
                <tr>
                    <th width="3%" align="center">No</th>
                    <th width="5%" align="center">Dia</th>
                    <th align="center">Desde</th> 
                    <th align="center">Hasta</th> 
                    <th align="center">Acciones</th>
                </tr>
                <?php
                if(count($lista->asignaciondetalle)>0){
                    foreach($lista->asignaciondetalle as $item => $value){
                        ?>
                        <tr id="<?php echo $value->ASIGDETP_Codigo;?>">
                            <td width="3%" align="center"><?php echo $item+1;?></td>
                            <td align="center"><?php echo $semana[$value->ASIGDETC_Dia];?></td>
                            <td align="center"><?php echo substr($value->ASIGDETC_Desde,0,5);?></td> 
                            <td align="center"><?php echo substr($value->ASIGDETC_Hasta,0,5);?></td> 
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
<!--                <input class="botones" id="imprimir" type="button" value="Imprimir" alt="Imprimir" title="Imprimir"/>                  -->
                <input class="botones" id="grabar" type="button" alt="Aceptar" title="Aceptar" value="Aceptar"/>
            </div>
        </div>        
        <?php echo $oculto;?>
        <?php echo $form_close;?>
    </div>
</div>    