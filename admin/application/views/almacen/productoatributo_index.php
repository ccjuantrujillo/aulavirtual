<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>  
    <META HTTP-EQUIV="Refresh" content="300"> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
    <meta http-equiv="Content-Language" content="es"> 
    <title><?php echo titulo;?></title>          
    <link rel="stylesheet" href="<?php echo css;?>estructura.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo css;?>basic.css" type="text/css">      
    <script type="text/javascript" src="<?php echo js;?>constants.js"></script> 
    <script type="text/javascript" src="<?php echo js;?>jquery.js"></script>   
    <script type="text/javascript" src="<?php echo js;?>jquery.simplemodal.js"></script>     
    <script type="text/javascript" src="<?php echo js;?>almacen/productoatributo.js"></script>	
</head>
<body>
<div class="contenido" > 
    <div class="header">
        <a href="#" id="logo"><img src="<?php echo img;?>logopuertosaber.jpg"/></a>
        <h2>Administrador del sistema de cursos online<br>Puerto Saber S.A.C.<br>2014</h2>
        <h3><a href="#" id="cerrar">Cerrar Sesi&oacute;n</a></h3>
    </div>
    <div class="zonebody patbotom">
        <ul class="nav">
            <?php foreach($menu as $item => $value):;?>
            	<li><a href="<?php echo base_url().$value->MENU_Url;?>"><?php echo $value->MENU_Descripcion;?></a></li>
            <?php endforeach;?>
        </ul>
        <div class="titulotabla">
            <input name="" type="button" class="aceptarlog2" alt="Aceptar" title="Aceptar" value="Crear un nuevo video" id="nuevo"/>
            <h1>Listado de videos</h1>
            <?php foreach($menu_hijo as $item => $value){
                ?>
                <span><a href="<?php echo base_url().$value->MENU_Url;?>"><?php echo $value->MENU_Descripcion;?></a></span>             
                <?php
            }
            ?>
        </div>
        <div class="listartabla">
            <div class="mensajetabla">Se han encontrado (<?php echo $registros;?>) registros(s)</div>
                <table  border="1"  cellspacing="0" cellpadding="0">
                  <tr class="list1">
                    <td width="43">No</td>
                    <td width="86">Curso</td>
                    <td width="193">Nombre del video</td>
                    <td width="86">Preguntas<br>necesarias</td>
                    <td width="86">Preguntas<br>cargadas</td>
                    <td width="63">¿Video?</td>
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
                        <td align="left"><?php echo $value->producto;?></td>
                        <td align="left"><?php echo $value->nombre;?></td>
                        <td align="center"><?php echo $value->preguntasnec;?></td>
                        <td align="center"><?php echo $value->preguntas;?></td>
                        <td align="center"><img src="<?php echo img.($value->vimeo==""?"uncheck.jpg":"check.jpg");?>" width="20px" height="20px"/></td>
                        <td><a href="#" onclick='editar("<?php echo $value->codigo;?>")'><img src="<?php echo img;?>editar.jpg"/></a></td>
                        <td><a href="#" onclick='eliminar("<?php echo $value->codigo;?>")'><img src="<?php echo img;?>eliminar.jpg"/></a></td>
                      </tr>  
                       <?php 
                    }
                  }
                  else{
                      ?>
                        <tr class="list_a" colspan='5'>::NO EXISTEN REGISTROS::</tr>
                      <?php
                  }
                  ?>
                </table>
            <div class="mensajetabla"><?php echo $paginacion;?></div>
        </div>
    </div>
    <div class="footer"><h4><?php echo pie;?></h4></div>
</div>
 <div id="basic-modal-content"><div id="mensaje">&nbsp;</div></div>  
</body>
</html>
