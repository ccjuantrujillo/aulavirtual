<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <META HTTP-EQUIV="Refresh" content="300">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="es">
    <title><?php echo titulo;?></title>
    <link rel="stylesheet" href="<?php echo css;?>estructura.css" type="text/css" />     
    <link rel="stylesheet" href="<?php echo css;?>menu.css" type="text/css" /> 
    <link rel="stylesheet" href="<?php echo css;?>jquery-ui.css" type="text/css" />       
    <script type="text/javascript" src="<?php echo js;?>jquery.js"></script>
    <script type="text/javascript" src="<?php echo js;?>jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo js;?>jquery.simplemodal.js"></script>
    <script type="text/javascript" src="<?php echo js;?>constants.js"></script>    
    <script type="text/javascript" src="<?php echo js;?>ventas/cabmatricula.js"></script>
</head>
<body>
<div class="contenido" >
    <div class="menu"><ul id="nav"><?php echo $menu;?></ul></div>
    <div class="titulo">
        <input name="" type="button" class="aceptarlog2" alt="Aceptar" title="Aceptar" value="Nuevo Tardanza / Reemplazo" id="nuevo"/>
        <h1>Maestro de matricula</h1>
    </div>
    <div class="mensaje">Se han encontrado (<?php echo $registros;?>) registros(s)</div>
    <div class="tabla">
        <table>
          <tr class="list1">
            <td width="10">Codigo</td>
            <td width="15">Fecha</td>
            <td width="100">Alumno</td>                  
            <td width="60">Ciclo</td>   
            <td width="50">Editar</td>
            <td width="50">Eliminar</td>
          </tr>
          <?php
          if(count($lista)>0){
            foreach($lista as $item => $value){
                $clase = ($item%2)==0?"list_a":"list_b";
               ?>
              <tr class="<?php echo $clase;?>" id="<?php echo $value->codigo;?>">
                <td align="center"><?php echo $value->codigo;?></td>
                <td align="center"><?php echo date_sql($value->fecha);?></td>
                <td align="center"><?php echo $value->alumno;?></td>
                <td align="center"><?php echo $value->ciclo;?></td>
                <td align="center"><a href="#" class="editar"><img src="<?php echo img;?>editar.jpg"/></a></td>
                <td align="center"><a href="#" class="eliminar"><img src="<?php echo img;?>eliminar.jpg"/></a></td>
                </td>
              </tr>
               <?php
            }
          }
          else{
              ?>
            <tr class="list_a"><td colspan='10'>::NO EXISTEN REGISTROS::</td></tr>
              <?php
          }
          ?>
        </table>
    </div>
    <div class="mensaje"><?php echo $paginacion;?></div>
    <div class="footer"><h4><?php echo pie;?></h4></div>
</div>
    <div id="basic-modal-content"><div id="mensaje">&nbsp;</div></div>
</body>
</html>
