<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <META HTTP-EQUIV="Refresh" content="300"> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
    <meta http-equiv="Content-Language" content="es"> 
    <title><?php echo titulo;?></title>
    <link href="<?php echo css;?>estructura.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo js;?>jquery.js"></script>	
    <script type="text/javascript" src="<?php echo js;?>constants.js"></script>
    <script type="text/javascript" src="<?php echo js;?>inicio.js"></script>	   
</head>
<body>
<div class="contenido" > 
    <div class="header">
        <a href="#" id="logo"><img src="<?php echo img;?>logopuertosaber.jpg"/></a>
        <h2>Administrador del sistema de cursos online<br>Puerto Saber S.A.C.<br>2014</h2>
        <h3><a href="#" id="cerrar">Cerrar Sesi&oacute;n</a></h3>
    </div>
    <div class="zonebody">
        <ul class="nav">            
        <?php foreach($menu as $item => $value):;?>
            <li><a href="<?php echo base_url().$value->MENU_Url;?>"><?php echo $value->MENU_Descripcion;?></a></li>
        <?php endforeach;?>
        </ul>
        <ul class="body_section">
            <?php 
            $col = 2;
            $fil = ceil(count($menu)/$col);
            foreach($menu as $j => $value){
                if($j%$fil==0){
                    if(($j/$fil) == $col-1) echo "<li>";    
                    if(($j/$fil) != $col-1) echo "<li>";  
                }
                ?>
                 <span class="caja_contenidos">
                 <img src="<?php echo img.$value->MENU_Imagen;?>"/>
                    <span class="cajatitle">
                        <h2>  MODULO DE <?php echo $value->MENU_Descripcion;?></h2>
                        <h3><?php echo substr(utf8_encode($value->MENU_Comentario),1,80);?></h3>
                        <a href="<?php echo base_url().$value->MENU_Url;?>">Ingresar</a> 
                    </span>
                 </span>
                <?php
                if($j%3==$fil - 1) echo "</li>";
            }
            ?>
        </ul>
    </div>
    <div class="footer"><h4><?php echo pie;?></h4></div>
</div>
</body>
</html>
