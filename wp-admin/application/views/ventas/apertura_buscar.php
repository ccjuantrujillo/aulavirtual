<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
    <meta http-equiv="Content-Language" content="es"> 
    <title><?php echo titulo;?></title>          
    <link rel="stylesheet" href="<?php echo css;?>estructura.css" type="text/css" />     
    <link rel="stylesheet" href="<?php echo css;?>menu.css" type="text/css" /> 
    <script type="text/javascript" src="<?php echo js;?>jquery.js"></script>   
    <script type="text/javascript" src="<?php echo js;?>jquery.simplemodal.js"></script>      
    <script type="text/javascript" src="<?php echo js;?>constants.js"></script>     
    <script type="text/javascript" src="<?php echo js;?>ventas/apertura.js"></script>    
</head>
<body>
<div class="contenidotabla">  
    <div class="titulotabla">
        <h1><?php echo $titulo;?></h1>
    </div>
    <div class="listartabla" style="margin-top:5px;">
        <table  border="1"  cellspacing="0" cellpadding="0" width="90%">
          <tr class="list1">
            <td width="35">No</td>
            <td width="50">Tipo estudio</td>
            <td width="70">Local</td>
            <td width="70">Aula</td>
            <td width="50">Turno</td>
          </tr>
          <?php
          if(count($lista)>0){
            foreach($lista as $item => $value){
                $clase = ($item%2)==0?"list_a":"list_b";
               ?>
            <tr class="<?php echo $clase;?>" id="<?php echo $value->codigo;?>" onclick="selecciona_aula(<?php echo $value->codigo;?>);">
                <td><?php echo ++$j;?></td>
                <td align="left"><?php echo $value->tipoestudio;?></td>
                <td align="center"><?php echo $value->local;?></td>
                <td align="center"><?php echo $value->aula;?></td>
                <td align="center"><?php echo $value->turno;?></td>
              </tr>  
               <?php 
            }
          }
          else{
              ?>
            <tr class="list_a"><td colspan='4'>::NO EXISTEN REGISTROS::</td></tr>
              <?php
          }
          ?>
        </table>
        <div class="mensajetabla"><?php echo $paginacion;?></div>
    </div>
</div>	
</body>
</html>
