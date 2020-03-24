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
            <select name="rol" id="rol">
                <option value="0">- Seleccione perfil -</option>
                <option value="1">Alumno</option>                
                <option value="2">Profesor</option>
            </select>
            <p>Usuario</p>
            <input type="text" name="usuario" placeholder="- Ingresa tu usuario -">
            <p>Password</p>
            <input type="password" name="clave" placeholder="- Ingresa la contraseña -">
            <input type="submit" name="Ingresar" value="Ingresar">
        </form>
    </div>
</body>
</html>