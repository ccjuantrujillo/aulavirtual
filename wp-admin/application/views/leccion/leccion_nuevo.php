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
    <div class="contenidotabla">
        <h1><?php echo $titulo;?></h1>
        <?php echo $form_open;?>        
            <table style="background-color: #f4f7ff">
                <tr>
                  <td width="50%" bgcolor="#d5e2f2">Codigo</td>
                  <td class="formss"><input type="text" class="cajaReducida" name="codigo" id="codigo" value="<?php echo $lista->codigo;?>" readonly="readonly"></td>
                </tr>                 
                <tr>
                  <td width="50%" bgcolor="#d5e2f2">Curso</td>
                  <td class="formss"><?php echo $selcurso;?></td>
                </tr>    
                <tr>
                  <td width="50%" bgcolor="#d5e2f2">Periodo</td>
                  <td class="formss"><?php echo $selperiodo;?></td>
                </tr>                
                <tr>
                  <td width="50%" bgcolor="#d5e2f2">Seccion</td>
                  <td class="formss"><?php echo $selseccion;?></td>
                </tr>  
                <tr>
                  <td bgcolor="#d5e2f2">Orden</td>
                  <td class="formss"><input type="text" class="cajaGrande" name="orden" id="orden" value="<?php echo $lista->orden;?>"></td>
                </tr>                 
                <tr>
                  <td bgcolor="#d5e2f2">Nombre</td>
                  <td class="formss"><input type="text" class="cajaGrande" name="nombre" id="nombre" value="<?php echo $lista->nombre;?>"></td>
                </tr>    
                <tr>
                  <td bgcolor="#d5e2f2">Video</td>
                  <td class="formss"><input type="text" class="cajaGrande" name="video" id="video" value="<?php echo $lista->video;?>"></td>
                </tr>  
                <tr>
                  <td bgcolor="#d5e2f2" style="vertical-align: top;">Descripcion</td>
                  <td class="formss"><textarea class="form-control" name="descripcion" id="descripcion" rows="10"><?php echo $lista->descripcion;?></textarea></td>
                </tr>                                        
            </table>
        <?php echo $oculto?>     
        <?php echo $form_close;?>        
    </div>
     <div class="frmboton">
        <div class="frmboton_login">
            <input id="cancelar" class="botones" type="button" alt="Cancelar" title="Cancelar" value="Cancelar"/>
            <input id="grabar" class="botones" type="button" alt="Aceptar" title="Aceptar" value="Aceptar"/>
        </div>
    </div>
</div>    
</body>