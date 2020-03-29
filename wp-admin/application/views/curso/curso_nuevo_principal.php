<?php echo $form_open;?>
<table class="fuente8" style="background-color: #f4f7ff">
  <tr>
    <td width="16%" class="formss" bgcolor="#d5e2f2">C&oacute;digo Curso</td>
    <td width="38%" class="formss"><input type="text" id="interno" class="cajaMedia" style="width:60px; background-color: #E6E6E6" readonly="readonly" name="interno" value="<?php echo $lista->producto; ?>"></td>
    <td colspan="2" class="formss" rowspan="4">
        <?php echo '<img name="fileimagen" id="fileimagen" style="margin-top:10px;" src="'.img.$lista->imagen.'" alt="'.$lista->imagen.'" width="90" height="90" border="1" />';?>
        <input name="imagen" id="imagen" style="font-size:0.9em" type="file"/>
    </td>
  </tr>
  <tr>
    <td class="formss" bgcolor="#d5e2f2">Ciclo</td>
    <td class="formss"><?php echo $selciclo;?></td>
  </tr>   
  <tr>
    <td class="formss" bgcolor="#d5e2f2">Area</td>
    <td class="formss"><?php echo $selarea;?></td>
  </tr>    
  <tr>
    <td class="formss" bgcolor="#d5e2f2">Nombre de Curso</td>
    <td class="formss"><input type="text" class="cajaGrande" name="nombre" id="nombre" value="<?php echo trim($lista->nombre);?>"></td>
  </tr>
  <tr>
    <td class="formss" bgcolor="#d5e2f2">Profesor</td>
    <td class="formss"><?php echo $selprofesor;?></td>
    <td colspan="2" class="formss">
        <span>Subir Silabus:
        <?php
        if(trim($lista->imagenpdf)!= ""){
            echo '<a href="'.files.$lista->silabus.'" target="_blank"><img name="filearchivo" id="filearchivo" style="margin-top:10px;" src="'.img.$lista->imagenpdf.'" alt="'.$lista->imagenpdf.'" width="20" height="20" border="1" /></a>';                    
        }
        ?>
        </span>
        <span><input name="archivo" id="archivo" style="font-size:0.9em" type="file" value="Subir silabus"/></span>
    </td>  
  </tr>
  <tr>
    <td class="formss" bgcolor="#d5e2f2">Url Video</td>
    <td class="formss"><input type="text" class="cajaGrande" name="video" id="video" value="<?php echo trim($lista->video);?>"></td>
    <td class="formss" bgcolor="#d5e2f2">Max. n&uacute;mero de evaluaciones por video</td>
    <td class="formss"><input type="text" id="intentos" class="cajaMinima" name="intentos" value="<?php echo $lista->intentos;?>" onkeydown="return numbersonly(this,event,'.');"></td> 
    
  </tr>  
  <tr>
    <td class="formss" bgcolor="#d5e2f2">Cant.Videos</td>
    <td class="formss">
        <input type="text" id="cantidad" class="cajaMinima" name="cantidad" value="<?php echo $lista->cantidad;?>" onkeydown="return numbersonly(this,event,'.');">
        <span>Cargados</span><input type="text" id="cargados" class="cajaMinima" style="width:50px; background-color: #E6E6E6" name="cargados" readonly="readonly" value="">
    </td>
    <td class="formss" bgcolor="#d5e2f2">Tiempo m&iacute;nimo entre evaluaci&oacute;n (dias)</td>
    <td class="formss"><input type="text" id="tiempo" class="cajaMinima" name="tiempo" value="<?php echo $lista->tiempo;?>" onkeydown="return numbersonly(this,event,'.');"></td>
    
  </tr> 
  <tr>
    <td class="formss" valign="top" rowspan="3" bgcolor="#d5e2f2">Descripci�n</td>
    <td class="formss" rowspan="3"><textarea rows="5"  cols="35" class="textareaGrande"  name="descripcion" id="descripcion"><?php echo $lista->descripcion;?></textarea></td>
    <td class="formss" valign="top" bgcolor="#d5e2f2">Nota m&iacute;nima</td>
    <td class="formss"><input type="text" id="puntaje" class="cajaMinima" name="puntaje" value="<?php echo $lista->puntaje;?>" onkeydown="return numbersonly(this,event,'.');" maxlength="2"></td>
  </tr>                
  <tr>
    <td class="formss" valign="top" bgcolor="#d5e2f2">Estado</td>
    <td class="formss"><?php echo $selestado;?></td>
  </tr>              
</table>
<?php echo $oculto;?>
<?php echo $form_close;?>