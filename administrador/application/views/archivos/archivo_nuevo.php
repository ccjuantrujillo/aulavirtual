<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>	
    <title><?php echo titulo;?></title>
    <META HTTP-EQUIV="Refresh" content="300"> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="es"> 
</head>	
<body>
<div class="contenido">
    <?php echo $form_open;?>
    <div class="contenidotabla">
        <h1><?php echo $titulo;?></h1>
        <table style="background-color: #f4f7ff">
            <tr>
              <td width="50%" bgcolor="#d5e2f2">Curso</td>
              <td class="formss"><?php echo $selcurso;?> </td>
            </tr>  
            <tr>
              <td width="50%" bgcolor="#d5e2f2">Seccion</td>
              <td class="formss"><?php echo $selseccion;?> </td>
            </tr>   
            <tr>
              <td width="50%" bgcolor="#d5e2f2">Leccion</td>
              <td class="formss"><?php echo $selleccion;?> </td>
            </tr>  
            <tr>
              <td bgcolor="#d5e2f2">Orden</td>
              <td class="formss">
                <input type="text" id="orden" class="cajaMedia" name="orden" value="<?php echo $lista->orden;?>">   
              </td>
            </tr>                                 
            <tr>
              <td bgcolor="#d5e2f2">Nombre</td>
              <td class="formss">
                <input type="text" id="nombre" class="cajaMedia" name="nombre" value="<?php echo $lista->nombre;?>">   
              </td>
            </tr>  
            <tr>
              <td bgcolor="#d5e2f2">Descripcion</td>
              <td class="formss">
                <textarea rows="5" cols="35" class="textareaGrande" name="descripcion" id="descripcion"><?php echo $lista->descripcion;?></textarea>
              </td>
            </tr>  
            <tr>
              <td bgcolor="#d5e2f2">Adjunto</td>
              <td class="formss">
                <input name="adjunto" id="adjunto" style="font-size:0.9em" type="file"/>
                <?php echo $lista->adjunto;?>
              </td>
            </tr>              
        </table>
        <?php echo $oculto?>
    </div>
     <div class="frmboton">
        <div class="frmboton_login">
            <input id="cancelar" class="botones" type="button" alt="Cancelar" title="Cancelar" value="Cancelar"/>
            <input id="grabar" class="botones" type="submit" alt="Aceptar" title="Aceptar" value="Aceptar"/>
        </div>
    </div> 
    <?php echo $form_close;?>
</div>
</body>