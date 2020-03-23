<div class="contenidotabla">
    <h1><?php echo $titulo;?></h1>
    <?php echo $form_open;?>
    <div id="cabecera">
        <table style="background-color: #f4f7ff">
          <tr>
            <td width="20%" bgcolor="#d5e2f2">Codigo:</td>
            <td class="formss" width="30%"><input name="matricula" id="matricula" type="text" value="<?php echo $lista->codigo;?>" readonly="readonly" class="cajaMinima" style="background-color: #E6E6E6"/></td>
            <td bgcolor="#d5e2f2">Fecha:</td>
            <td class="formss">
                <input name="fecha" id="fecha" type="text" value="<?php echo $lista->fecha;?>" readonly="readonly" class="cajaMinima"/>
            </td>                        
          </tr>  
          <tr>
            <td width="20%" bgcolor="#d5e2f2">Ciclo:</td>
            <td class="formss" width="30%"><?php echo $selciclo;?></td>
            <td width="20%" bgcolor="#d5e2f2">Modulo:</td>
            <td class="formss" width="30%"><?php echo $selmodulo;?></td>                
          </tr>
          <tr>
            <td width="20%" bgcolor="#d5e2f2">Local:</td>
            <td class="formss" width="30%"><?php echo $sellocal;?></td>              
            <td bgcolor="#d5e2f2">Aula:</td>
            <td class="formss" width="30%"><?php echo $selaula;?></td> 
          </tr>                     
          <tr>
            <td bgcolor="#d5e2f2">Turno:</td>
            <td class="formss" width="30%"><?php echo $selturno;?></td> 
            <td bgcolor="#d5e2f2">Estado:</td>
            <td class="formss"><?php echo $selestado;?></td>      
          </tr>   
          <tr>
            <td bgcolor="#d5e2f2">Tipo de estudio:</td>
            <td class="formss" width="30%"><?php echo $seltipoe;?></td> 
            <td bgcolor="#d5e2f2">&nbsp;</td>
            <td class="formss">
                <?php if($accion=="n"):;?>
                <input id="agregar" name="ver_cliente" type="button" class="aceptarlog2" alt="Cargar cursos" title="Cargar cursos" value="Cargar cursos"/>
                <?php endif;?>
            </td>      
          </tr>            
        </table>
    </div>
    <div id="detalle" style = "float: left; height: 270px;overflow: auto; width: 100%;background: #e8edff;">
        <table width="100%" id="tabla_detalle">
            <tr>
                <th width="3%" align="center">No</th>
                <th align="center">Curso</th> 
                <th align="center">Codigo</th>
                <th align="center">Titulo</th> 
<!--                <th align="center">Espacio(MB)</th> -->
                <th align="center">Acciones</th>
            </tr>
            <?php
            if(count($lista->aperturadetalle)>0){
                foreach($lista->aperturadetalle as $item => $value){
                    ?>
                    <tr id="<?php echo $value->id;?>">
                        <td width="3%" align="center"><?php echo $item+1;?></td>
                        <td align="center"><?php echo $value->PROD_Nombre;?></td> 
                        <td align="center"><?php echo $value->code;?></td>
                        <td align="center"><?php echo $value->title;?></td> 
<!--                        <td align="center">< ?php echo round($value->disk_quota/(1024*1024),1);?></td> -->
                        <td align="center"><a href='#' class='editardetalle'>Editar</a>&nbsp;<a href='#' class='eliminardetalle'>Eliminar</a></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
    </div>
    <div class="frmboton">
        <div class="frmboton_matricula">
            <input class="botones" id="cancelar" type="button" alt="Cancelar" title="Cancelar" value="Cancelar"/>   
<!--            <input class="botones" id="imprimir" type="button" value="Imprimir" alt="Imprimir" title="Imprimir"/>              -->
            <input class="botones" id="grabar" type="button" alt="Aceptar" title="Aceptar" value="Aceptar"/>
        </div>
    </div>          
    <?php echo $oculto;?>
    <?php echo $form_close;?>
</div>    