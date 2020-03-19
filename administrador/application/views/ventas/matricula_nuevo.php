<div class="contenidotabla">
    <h1><?php echo $titulo;?></h1>
    <?php echo $form_open;?>
    <div id="cabecera">
        <table style="background-color: #f4f7ff">
          <tr>
            <td width="10%" bgcolor="#d5e2f2">Nro.Matricula:</td>
            <td class="formss" width="40%"><input name="matricula" id="matricula" type="text" value="<?php echo $lista->matricula;?>" readonly="readonly" class="cajaMinima" style="background-color: #E6E6E6"/></td>
            <td bgcolor="#d5e2f2">Fecha:</td>
            <td class="formss">
                <input name="fecha" id="fecha" type="text" value="<?php echo $lista->fecha;?>" readonly="readonly" class="cajaMinima"/>
            </td>                        
          </tr>  
          <tr>
            <td width="20%" bgcolor="#d5e2f2">Ciclo:</td>
            <td class="formss" width="30%"><?php echo $selciclo;?></td>
            <td width="20%" bgcolor="#d5e2f2">Estado:</td>
            <td class="formss" width="30%"><?php echo $selestado;?></td>                
          </tr>                  
          <tr>
            <td bgcolor="#d5e2f2">Aula:</td>
            <td class="formss">
                <input name="apertura" id="apertura" type="text" value="<?php echo $lista->user_id;?>" readonly="readonly" class="cajaMinima" style="background-color: #E6E6E6"/>
                <input name="nombres" id="nombres" type="text" value="<?php echo $lista->apellidos.' '.$lista->nombres;?>" class="cajaGrande" readonly="readonly" style="background-color: #E6E6E6"/>
                <?php if($accion=='n'):;?>
                    <input id="ver_aula" name="ver_aula" type="button" class="aceptarlog2" alt="Buscar alumno" title="Buscar alumno" value="Buscar" />
                <?php endif;?>
            </td>
            <td bgcolor="#d5e2f2" colspan="2">&nbsp;</td>
          </tr>                            
        </table>
        <?php echo $oculto;?>
        <?php echo $form_close;?>
    </div>
    <div id="detalle" style = "float: left; height: 270px;overflow: auto; width: 100%;background: #e8edff;">
        <table width="100%" id="tabla_detalle">
            <tr>
                <th align="center" width="45%">Alumnos</th> 
                <th align="center" width="10%">&nbsp;</th> 
                <th align="center" width="45%">Alumnos matriculados</th>
            </tr>
            <tr>
                <td align="center">
                    <?php echo $selalum_total;?>
                </td>
                <td align="center" valign="center">
                    <input type="button" value=">>" class="pasar"><br><br>
                    <input type="button" value="<<" class="quitar">
                </td>
                <td align="center">
                    <?php echo $selalum_matri;?>
                </td>
            </tr>
        </table>
    </div>    
    <div class="frmboton">
        <div class="frmboton_matricula">
            <input class="botones" id="cancelar" type="button" alt="Cancelar" title="Cancelar" value="Cancelar"/>   
            <input class="botones" id="imprimir" type="button" value="Imprimir" alt="Imprimir" title="Imprimir"/>              
            <input class="botones" id="grabar" type="button" alt="Aceptar" title="Aceptar" value="Aceptar"/>
        </div>
    </div>          
</div>  