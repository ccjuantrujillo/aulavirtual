<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>	
    <title><?php echo titulo;?></title>
    <META HTTP-EQUIV="Refresh" content="300"> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="es"> 
    <link href="<?php echo css;?>estructura.css" rel="stylesheet" type="text/css" />      
<!--    <script type="text/javascript" src="< ?php echo js;?>constants.js"></script> 
    <script type="text/javascript" src="< ?php echo js;?>jquery.js"></script>
    <script type="text/javascript" src="< ?php echo js;?>jquery.simplemodal.js"></script>           
    <script type="text/javascript" src="< ?php echo js;?>almacen/producto.js"></script>-->
</head>
<body>
<div class="contenido">
    <div class="contenidotabla">
        <h1><?php echo $titulo;?></h1>    
        <?php echo $form_open;?>
        <table class="fuente8">
          <tr>
            <td width="16%" class="formss">C&oacute;digo Curso</td>
            <td width="38%" class="formss"><input type="text" id="interno" class="cajaMedia" style="width:60px; background-color: #E6E6E6" readonly="readonly" name="interno" value="<?php echo $lista->producto;?>"></td>                  
            <td colspan="2" class="formss" rowspan="3">
                <?php echo '<img name="fileimagen" id="fileimagen" style="margin-top:10px;" src="'.img.$lista->imagen.'" alt="'.$lista->imagen.'" width="80" height="80" border="1" />';?>
                <input name="imagen" id="imagen" style="font-size:0.9em" type="file"/>
            </td>
          </tr>
          <tr>
            <td class="formss">Categoria</td>
            <td class="formss"><?php echo $seltipo;?></td>
          </tr>                
          <tr>
            <td class="formss">Nombre de Curso</td>
            <td class="formss"><input type="text" class="cajaGrande" name="nombre" id="nombre" value="<?php echo trim($lista->nombre);?>"></td>
          </tr>
          <tr>
            <td class="formss">Cant.Videos</td>
            <td class="formss">
                <input type="text" id="cantidad" class="cajaMinima" name="cantidad" value="<?php echo $lista->cantidad;?>" onkeydown="return numbersonly(this,event,'.');">
                <span>Cargados</span><input type="text" id="cargados" class="cajaMinima" style="width:50px; background-color: #E6E6E6" name="cargados" readonly="readonly" value="<?php echo $lista->cargados;?>">
            </td>
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
            <td class="formss">Tiempo Prueba(min)</td>
            <td class="formss"><input type="text" id="tiempoprueba" class="cajaMinima" name="tiempoprueba" value="<?php echo $lista->tiempoprueba;?>" onkeydown="return numbersonly(this,event,'.');"></td>
            <td class="formss">Max. n&uacute;mero de evaluaciones por video</td>
            <td class="formss"><input type="text" id="intentos" class="cajaMinima" name="intentos" value="<?php echo $lista->intentos;?>" onkeydown="return numbersonly(this,event,'.');"></td>
          </tr>  
          <tr>
            <td class="formss" valign="top" rowspan="3">Descripción</td>
            <td class="formss" rowspan="3"><textarea rows="5"  cols="35" class="textareaGrande"  name="descripcion" id="descripcion"><?php echo $lista->descripcion;?></textarea></td>
            <td class="formss">Tiempo m&iacute;nimo entre evaluaci&oacute;n (dias)</td>
            <td class="formss"><input type="text" id="tiempo" class="cajaMinima" name="tiempo" value="<?php echo $lista->tiempo;?>" onkeydown="return numbersonly(this,event,'.');"></td>
          </tr>                
          <tr>
            <td class="formss" valign="top">Nota m&iacute;nima</td>
            <td class="formss"><input type="text" id="puntaje" class="cajaMinima" name="puntaje" value="<?php echo $lista->puntaje;?>" onkeydown="return numbersonly(this,event,'.');" maxlength="2"></td>
          </tr>
          <tr>
            <td class="formss" valign="top">Estado</td>
            <td class="formss"><?php echo $selestado;?></td>
          </tr>                
          <tr>
              <td colspan="4">
                <div class="frmboton">
                    <div class="frmboton_login">
                        <input id="cancelar" class="botones" type="button" alt="Cancelar" title="Cancelar" value="Cancelar"/>
                        <input id="grabar" class="botones" type="submit" alt="Aceptar" title="Aceptar" value="Aceptar"/>
                    </div>
                </div>
              </td>
          </tr>
        </table>
        <?php echo $oculto;?>
        <?php echo $form_close;?>
    </div>
</div>
</body>
</html>