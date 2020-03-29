<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
    <link href="<?php echo base_url();?>assets/css/styleLogin.css" rel="stylesheet" type="text/css"/>
    </head>
<body>
    <div class="loginbox">
    <img src="<?php echo base_url();?>assets/img/avatar.png" class="avatar">
    <h1><?php echo $datosempresa->EMPRC_RazonSocial;?></h1>
        <form action="<?php echo base_url();?>inicio/ingresar" method="POST">
            <p>Perfil</p>
            <?php echo $selrol;?>
            <p>Usuario</p>
            <input type="text" name="usuario" placeholder="- Ingresa tu usuario -">
            <p>Password</p>
            <input type="password" name="clave" placeholder="- Ingresa la contraseña -">
            <input type="submit" name="Ingresar" value="Ingresar">
        </form>
    </div>
</body>
</html>