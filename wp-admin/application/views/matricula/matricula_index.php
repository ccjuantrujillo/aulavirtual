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
    <script type="text/javascript" src="<?php echo js;?>ventas/matricula.js"></script>
</head>
<body>
<div class="contenido" > 
    <div class="menu"><ul id="nav"><?php echo $menu;?></ul></div>
    <div class="titulo">                  
        <input name="" type="button" class="aceptarlog2" alt="Aceptar" title="Aceptar" value="Crear nueva matricula" id="nuevo"/>
        <h1>Matricula de alumnos</h1>            
    </div> 
    <div class="mensaje">Se han encontrado (<?php echo $registros;?>) registros(s)</div>
    <div class="tabla">
      <table>
        <tr class="list1">
          <td width="43">No</td>
          <td width="193">Apellidos y Nombres</td>
          <td width="193">Curso</td>
          <td width="63">Aula</td>          
          <td width="86">Fecha</td>
          <td width="62">Editar</td>
          <td width="77">Eliminar</td>
        </tr>
        <?php
        if(count($lista)>0){
          foreach($lista as $item => $value){
              $clase = ($item%2)==0?"list_a":"list_b";
             ?>
            <tr class="<?php echo $clase;?>">
              <td><?php echo ++$j;?></td>
              <td align="left"><?php echo $value->paterno." ".$value->materno." ".$value->nombres;?></td>
              <td align="left"><?php echo $value->curso;?></td>     
              <td align="center"><?php echo $value->aula;?></td>              
              <td align="center"><?php echo $value->fechareg;?></td>
              <td><a href="#" onclick='editar("<?php echo $value->codigo;?>")'><img src="<?php echo img;?>editar.jpg"/></a></td>
              <td><a href="#" onclick='eliminar("<?php echo $value->codigo;?>")'><img src="<?php echo img;?>eliminar.jpg"/></a></td>
            </tr>  
             <?php 
          }
        }
        else{
            ?>
          <tr class="list_a"><td colspan='6'>::NO EXISTEN REGISTROS::</td></tr>
            <?php
        }
        ?>
      </table>
        <div class="mensajetabla"><?php echo $paginacion;?></div>
    </div>

    <div class="footer"><h4><?php echo pie;?></h4></div>
</div>
 <div id="basic-modal-content"><div id="mensaje">&nbsp;</div></div>  
</body>
</html>
