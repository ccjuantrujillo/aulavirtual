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
                  <td width="50%" bgcolor="#d5e2f2">Curso</td>
                  <td class="formss"><?php echo $selcurso;?></td>
                </tr>  
                <tr>
                  <td width="50%" bgcolor="#d5e2f2">Periodo</td>
                  <td class="formss"><?php echo $selperiodo;?></td>
                </tr>                 
                <tr>
                  <td bgcolor="#d5e2f2">Orden</td>
                  <td class="formss"><input type="text" class="cajaGrande" name="orden" id="orden" value="<?php echo $lista->orden;?>"></td>
                </tr>                         
                <tr>
                  <td bgcolor="#d5e2f2">Descripcion</td>
                  <td class="formss"><input type="text" class="cajaGrande" name="descripcion" id="descripcion" value="<?php echo $lista->descripcion;?>"></td>
                </tr>
                <tr>
                  <td bgcolor="#d5e2f2">Fecha de Inicio</td>
                  <td class="formss"><input type="text" class="cajaReducida" name="finicio" id="finicio" value="<?php echo $lista->finicio;?>" readonly="readonly" maxlength="8"></td>
                </tr> 
                <tr>
                  <td bgcolor="#d5e2f2">Fecha de Fin</td>
                  <td class="formss"><input type="text" class="cajaReducida" name="ffin" id="ffin" value="<?php echo $lista->ffin;?>" readonly="readonly" maxlength="8"></td>
                </tr>   
                <tr>
                  <td bgcolor="#d5e2f2">Estado</td>
                  <td class="formss"><?php echo $selestado;?></td>
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