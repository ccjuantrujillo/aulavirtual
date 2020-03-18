<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
          <link href="img/favicon.png" rel="icon">
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
 <!-- Favicons -->
 
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <!--external css-->
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" type="text/css"/>
  <link href="css/style-responsive.css" rel="stylesheet" type="text/css"/>
  

        <title>Registrar Profesor</title>
    </head>
    <body>
        
        <div id="Cabecera">

<!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>Colegio<span>Steve Jobs</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="index.html">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <script src="js/jquery.ui.touch-punch.min.js"></script>
  <script src="js/jquery.dcjqaccordion.2.7.js"></script>
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js"></script>
  <!--common script for all pages-->
  <script src="js/common-scripts.js"></script>
  <!--script for this page-->
		
		
        </div>
     
        <div id="Menu">
		
		
<aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="img/ui-sam.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered">STEVE VALMER</h5>
          <li class="mt">
            <a href="listar.html">
              <i class="fa fa-dashboard"></i>
              <span>Inicio</span>
              </a>
          </li>

          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fab fa-black-tie"></i>
              <span>Mantenimientos Profesores</span>
              </a>
            <ul class="sub">
              <li><a href="index.html"><i class="fa fa-pencil"></i>Ingresar Nuevo Profesor</a></li>
                <li><a href="#"><i class="fa fa-eye"></i>Ver y Editar Profesores</a></li>    
                
            </ul>
          </li>

          
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
		
		
        </div>
        
        
        
        <div id="Cuerpo">
        <section id="main-content">
          <section class="wrapper site-min-height">
		<header>
                    <h1><p>Registrar Profesor</p></h1>		
		</header><br>

                  
            <div>      
                <form class="form-horizontal" role="form" name="frmRegistrarProfesor" method="post" action="listar.html">
      
    

      <div class="form-group">
    <label  class="col-lg-1 control-label">Nombre</label>
    <div class="col-lg-2">
      <input type="text" class="form-control" id="Nom_profe" name="Nom_profe"   placeholder="Nombre" minlength="1" required >
    </div>
    </div>
    
      <div class="form-group">
    <label  class="col-lg-1 control-label">Apellidos</label>
    <div class="col-lg-2">
      <input type="text" class="form-control" id="Ape_profe" name="Ape_profe"   placeholder="Apellidos" minlength="1" required>
    </div>
    </div>
    
     <div class="form-group">
    <label  class="col-lg-1 control-label">Genero</label>
    <div class="col-lg-2">
        <select name="Sex_profe" class="form-control" minlength="1" required>
            <option value="M">Masculino</option>
            <option value="F">Femenino</option>
        </select>
    </div>
    </div>
      <div class="form-group">
    <label  class="col-lg-1 control-label">Fecha De Nacimiento</label>
    <div class="col-lg-2">
      <input type="Date" class="form-control" id="Fec_nac_profe" name="Fec_nac_profe" placeholder="Fecha de Nacimiento" minlength="1" required>
    </div>
    </div>
    <div class="form-group">
      <label  class="col-lg-1 control-label">Usuario</label>
      <div class="col-lg-2">		
          <select name="Cod_usuario" id="Cod_subarea" class="form-control" minlength="1" required >
			<option value='1'>Administrador</option>
			<option value='2'>Usuario</option>
			<option value='3'>Invitado</option>
	</select>
      </div>
 
    </div> 
    
    <input type="hidden" name="action" id="action" value="grabarP">
  <div class="form-group">
    <div class="col-lg-1 control-label">
     
        <input type="submit" class="btn btn-send" style="margin-left: 200px;" value="Registrar">
    </div> 
  </div>
    
    </form>

    
  </div>
   
          </section>
        </section>  
        </div>
         
        <div id="Footer">
			<footer class="site-footer">
			  <div class="text-center">
				<p>
				  &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
				</p>
				<div class="credits">
				  <!--
					You are NOT allowed to delete the credit link to TemplateMag with free version.
					You can delete the credit link only if you bought the pro version.
					Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
					Licensing information: https://templatemag.com/license/
				  -->
				  Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
				</div>
				<a href="blank.html#" class="go-top">
				  <i class="fa fa-angle-up"></i>
				  </a>
			  </div>
			</footer>
		
        </div>  
    </body>
</html>


