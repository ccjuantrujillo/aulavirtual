<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>  
    <META HTTP-EQUIV="Refresh" content="300"> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
    <meta http-equiv="Content-Language" content="es"> 
    <title><?php echo titulo;?></title>          
    <link rel="stylesheet" href="<?php echo css;?>estructura.css" type="text/css" />     
    <link rel="stylesheet" href="<?php echo css;?>menu.css" type="text/css" />   
    <link rel="stylesheet" href="<?php echo css;?>tabs.css" type="text/css" />	
    <script type="text/javascript" src="<?php echo js;?>jquery.js"></script>   
    <script type="text/javascript" src="<?php echo js;?>jquery.simplemodal.js"></script>     
    <script type="text/javascript" src="<?php echo js;?>constants.js"></script>     
    <script type="text/javascript" src="<?php echo js;?>almacen/curso.js"></script>
</head>
<body>
<div class="contenido" > 
    <div class="menu"><ul id="nav"><?php echo $menu;?></ul></div>
    <div class="titulo">     	            
        <input name="" type="button" class="aceptarlog2" alt="Aceptar" title="Aceptar" value="Crear nuevo curso" id="nuevo"/>
        <h1>Listado de cursos</h1>            
    </div>    
    <div class="mensaje">Se han encontrado (<?php echo $registros;?>) registro(s)</div>
    <div class="tabla">
        <table>
          <tr class="list1">
            <td width="5%">No</td>
            <td width="20%">Curso</td>
            <td width="10%">Area</td>
            <td width="15%">Ciclo</td>			
            <td width="25%">Profesor</td>  
            <td width="8%">Estado</td>
            <td width="8%">Editar</td>
            <td width="8%">Eliminar</td>
          </tr>
          <?php
          if(count($lista)>0){
            foreach($lista as $item => $value){
                $flgestado = $value->estado;
                $estado = $flgestado==1?"Activo":"Inactivo";
                $clase = ($item%2)==0?"list_a":"list_b";
               ?>
              <tr class="<?php echo $clase;?>">
                <td><?php echo ++$j;?></td>
                <td class="formss" style="text-align:left;"><?php echo $value->nombre;?></td>
                <td class="formss"><?php echo $value->area;?></td>				
                <td class="formss"><?php echo $value->ciclo;?></td>	
                <td class="formss"><?php echo $value->profesor;?></td>   
                <td><img src="<?php echo img.($flgestado==1?"check.jpg":"uncheck.jpg");?>" width="20px" height="20px"/><?php echo $estado;?></td>
                <td><a href="#" onclick='editar("<?php echo $value->codigo;?>")'><img src="<?php echo img;?>editar.jpg"/></a></td>
                <td><a href="#" onclick='eliminar("<?php echo $value->codigo;?>")'><img src="<?php echo img;?>eliminar.jpg"/></a></td>
              </tr>  
               <?php 
            }
          }
          else{
              ?>
                <tr class="list_a"><td colspan='7'>::NO EXISTEN REGISTROS::</td></tr>
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