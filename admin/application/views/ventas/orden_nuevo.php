<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>  
    <META HTTP-EQUIV="Refresh" content="300"> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
    <meta http-equiv="Content-Language" content="es"> 
    <title><?php echo titulo;?></title>          
    <link rel="stylesheet" href="<?php echo css;?>estructura.css" type="text/css" />    
</head>
<body>
<div class="contenido">
    <div class="contenidotabla">
        <h1><?php echo $titulo;?></h1>
        <?php echo $form_open;?>
        <table>
          <tr>
            <td width="20%">Nro.Matricula:</td>
            <td class="formss" width="30%"><input name="matricula" id="matricula" type="text" value="<?php echo $lista->matricula;?>" readonly="readonly" class="cajaMinima" style="background-color: #E6E6E6"/></td>
            <td>Fecha:</td>
            <td class="formss">
                <input name="fecha" id="fecha" type="text" value="<?php echo $lista->fecha;?>" readonly="readonly" class="cajaMinima"/>
            </td>                        
          </tr>        
          <tr>
            <td width="20%">Curso:</td>
            <td class="formss" width="30%"><?php echo $selcurso;?></td>
            <td>Numero de Intentos:</td>
            <td class="formss"><input name="intentos" id="intentos" type="text" value="<?php echo $lista->intentos;?>" readonly="readonly" class="cajaMinima" style="background-color: #E6E6E6"/></td>                        
          </tr>
          <tr>
            <td>Cant.Videos:</td>
            <td class="formss"><input name="cantidad" id="cantidad" type="text" value="<?php echo $lista->cantidad;?>" readonly="readonly" class="cajaMinima" style="background-color: #E6E6E6"/></td>
            <td>Estado:</td>
            <td class="formss"><?php echo $selestado;?></td>                        
          </tr>                        
          <tr>
            <td>Codigo de alumno:</td>
            <td colspan="3" class="formss">
                <input name="alumno" id="alumno" type="text" value="<?php echo $lista->alumno;?>" readonly="readonly" class="cajaMinima" style="background-color: #E6E6E6"/>
                <?php if($accion=='n'):;?>
                    <input id="ver_cliente" name="ver_cliente" type="button" class="aceptarlog2" alt="Buscar alumno" title="Buscar alumno" value="Buscar" />
                <?php endif;?>
            </td>
          </tr>
          <tr>
            <td>Apellidos y Nombres:</td>
            <td colspan="3" class="formss" align="left"><input name="nombres" id="nombres" type="text" value="<?php echo $lista->paterno.' '.$lista->materno.' '.$lista->nombres;?>" class="cajaGrande" readonly="readonly" style="background-color: #E6E6E6"/></td>
          </tr>     
          <tr>
            <td>Usuario:</td>
            <td colspan="3" class="formss"><input name="usuario" id="usuario" type="text" value="<?php echo $lista->usercurso;?>" class="cajaMinima"/></td>
          </tr> 
          <tr>
            <td>Password:</td>
            <td colspan="3" class="formss">
                <input name="clave" id="clave" type="text" value="<?php echo $lista->clavecurso;?>" class="cajaMinima" maxlength="50"/>
                <input name="generar" id="generar" type="button" class="aceptarlog2" alt="Generar password" title="Generar password" value="Generar"/>
            </td>
          </tr> 
          <tr>
            <td>Tiempo de acceso(dias):</td>
            <td colspan="3" class="formss"><input name="tiempo" id="tiempo" type="text" value="<?php echo $lista->tiempo;?>" class="cajaMinima" onkeydown="return numbersonly(this,event,'.');"/></td>
          </tr>                         
          <tr>
            <td colspan="4" class="formss">
                <div class="frmboton">
                    <div class="frmboton_matricula">
                        <input class="botones" id="cancelar" type="button" alt="Cancelar" title="Cancelar" value="Cancelar"/>                        
                        <input class="botones" id="imprimir" type="button" value="Imprimir" alt="Imprimir" title="Imprimir"/>                                    
                        <input class="botones" id="grabar" type="button" alt="Aceptar" title="Aceptar" value="Aceptar"/>
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
