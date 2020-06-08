<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="es"> 
    <title><?php echo titulo;?></title>        
    <link href="<?php echo css;?>estructura.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo css;?>jquery-ui.css" rel="stylesheet" type="text/css" />    
</head>
<body>
<div class="contenidotabla" >  
    <h1><?php echo $titulo;?></h1>    
    <?php echo $form_open;?>
    <div id="cabecera">
        <table  style="background-color: #f4f7ff" border="1">
            <tr>
                <td  width='18%' align="right">Codigo:</td>
                <td width='38%' colspan="3" class="formss">
                    <input type='text' name="codigo" id="codigo" value="<?php echo $lista->tarea;?>" class="cajaReducida" onkeydown="return numbersonly(this,event,'.');" readonly="readonly"/>
                </td>
                <td align="right">Fecha de entrega;</td>
                <td width='29%' class="formss"><input type="text" name="fecha" id="fecha" style="width:60px" readonly value="<?php echo $lista->fecha;?>" class="cajaMinima" maxlength="10"></td>
            </tr>
            <tr>
                <td align="right">Curso:</td>
                <td align="left" colspan="3" class="formss"><?php echo $selcurso;?></td>
                <td align="right"></td>
                <td align="left" class="formss"></td>                
            </tr>                
            <tr>
                <td align="right">Seccion:</td>
                <td align="left" colspan="3" class="formss"><?php echo $selseccion;?></td>
                <td align="right">Tipo tarea:</td>
                <td align="left" class="formss"><span><?php echo $seltipotarea;?></span></td>              
            </tr>             
            <tr>
                <td align="right">Leccion: </td>
                <td align="left" colspan="3" class="formss"><span><?php echo $selleccion;?></span></td>
                <td align="right"></td>
                <td align="left" class="formss"></td>
            </tr>
            <tr>
                <td align="right">Nombre: </td>
                <td align="left" class="formss" colspan="5"><input type='text' name="nombre" id="nombre" value="<?php echo $lista->nombre;?>" class="cajaSuperGrande"></td>
            </tr>  
            <tr>
                <td valign="top" align="right">Instrucciones: </td>
                <td align="left" colspan="5" class="formss">
                    <span><textarea style="width:480px;" type='text' name="instrucciones" id="instrucciones" class="get text"><?php echo $lista->descripcion;?></textarea></span>
                </td>
            </tr>
        </table>
    </div>
    <div class="frmboton">
        <input id="cancelar" class="botones" type="button" alt="Cancelar" title="Cancelar" value="Cancelar"/>
<!--        <input id="imprimir" class="botones" type="button" value="Imprimir" alt="Imprimir" title="Imprimir"/>                        -->
        <input id="grabar" class="botones" type="button" alt="Grabar" title="Grabar" value="Grabar"/>
    </div>
    <?php echo $oculto;?>
    <?php echo $form_close;?>
</div>
</body>
</html>