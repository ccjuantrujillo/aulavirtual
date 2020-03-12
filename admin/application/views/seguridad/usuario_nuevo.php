<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php echo titulo;?></title>
    <META HTTP-EQUIV="Refresh" content="300"> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
    <meta http-equiv="Content-Language" content="es"> 
    <link href="<?php echo css;?>estructura.css" rel="stylesheet" type="text/css"/>        
    <script type="text/javascript" src="<?php echo js;?>constants.js"></script> 
    <script type="text/javascript" src="<?php echo js;?>jquery.js"></script>    
    <script type="text/javascript" src="<?php echo js;?>jquery.simplemodal.js"></script>           
    <script type="text/javascript" src="<?php echo js;?>seguridad/usuario.js"></script>			
</head>
<body>
    <div class="container">
        <div class="header"><?php echo $titulo;?></div>
        <div class="case_top">
            <?php echo $form_open;?>
                <div style="width:100%; text-align: left;">
                    <table class="fuente8" width="100%" cellspacing="0" cellpadding="6" border="0" bgcolor="#fff">
                        <tr>
                          <td width="16%">Nombres</td>
                          <td width="42%">
                              <input type="text" class="cajaMedia" name="nombres" id="nombres" value="<?php echo $lista->nombres;?>">
                          </td>
                        </tr>
                        <tr>
                          <td width="16%">Apellido Paterno</td>
                          <td width="42%">
                              <input type="text" class="cajaMedia" name="paterno" id="paterno" value="<?php echo $lista->paterno;?>">
                          </td>
                        </tr>
                        <tr>
                          <td width="16%">Apellido Materno</td>
                          <td width="42%">
                              <input type="text" class="cajaMedia" name="materno" id="materno" value="<?php echo $lista->materno;?>">
                          </td>
                        </tr>
                        <tr>
                          <td width="16%">Usuario</td>
                          <td width="42%">
                              <input type="text" class="cajaMedia" name="login" id="login" value="<?php echo $lista->login;?>">
                          </td>
                        </tr>   
                        <tr>
                          <td width="16%">Clave</td>
                          <td width="42%">
                              <input type="password" class="cajaMedia" name="clave" id="clave" value="<?php echo $lista->clave;?>">
                          </td>
                        </tr>  
                        <tr>
                          <td width="16%">Rol</td>
                          <td width="42%"><?php echo $selrol;?></td>
                        </tr>                         
                    </table>
                </div>
                <div style="margin-top:20px; text-align: center">
                    <a href="#" id="grabar"><img src="<?php echo img;?>botonaceptar.jpg" width="85" height="22" class="imgBoton" ></a>
                    <a href="#" id="cancelar"><img src="<?php echo img;?>botoncancelar.jpg" width="85" height="22" class="imgBoton" ></a>
                    <?php echo $oculto?>
                </div>
            <?php echo $form_close;?>
        </div>
    </div>
</body>
</html>