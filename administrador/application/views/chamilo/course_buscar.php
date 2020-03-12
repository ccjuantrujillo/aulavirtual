<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>   
    <meta http-equiv="Content-Language" content="es"> 
    <title><?php echo titulo;?></title>          
    <link href="<?php echo css;?>estructura.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo js;?>jquery.js"></script>   
    <script type="text/javascript" src="<?php echo js;?>jquery.simplemodal.js"></script>      
    <script type="text/javascript" src="<?php echo js;?>constants.js"></script>     
    <script type="text/javascript" src="<?php echo js;?>chamilo/course.js"></script>    
</head>
<body>
<div class="contenido">  
    <div class="titulo">
        <h1><?php echo $titulo;?></h1>
    </div>
    <div class="tabla">
        <table  border="1"  cellspacing="0" cellpadding="0">
          <tr class="list1">
            <td width="30">No</td>
            <td width="30">Aula</td>
            <td width="30">Turno</td>
            <td width="30">Tipo Estudio</td>
            <td width="20">Codigo</td>
            <td width="90">Titulo</td>
            <td width="90">Modulo</td>
          </tr>
          <?php
          if(count($lista)>0){
            foreach($lista as $item => $value){
                $flgestado = $value->estado;
                $estado = $flgestado==1?"Activo":"Inactivo";
                $clase  = ($item%2)==0?"list_a":"list_b";
                switch ($value->turno){
                    case 1:$turno = "Mañana";break;
                    case 2:$turno = "Tarde";break;
                    case 3:$turno = "Noche";break;
                }
               ?>
            <tr class="<?php echo $clase;?>" id="<?php echo $value->codigo;?>" onclick="selecciona_curso(<?php echo $value->codigo;?>);">
                <td align="center"><?php echo ++$j;?></td>
                <td align="center"><?php echo $value->aula;?></td>
                <td align="center"><?php echo $turno;?></td>
                <td align="center"><?php echo $value->tipoestudio;?></td>
                <td align="center"><?php echo $value->code;?></td>
                <td align="center"><?php echo $value->title;?></td>
                <td align="center"><?php echo $value->modulo;?></td>
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
</div>	
</body>
</html>