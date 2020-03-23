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
  <link href="<?php echo BASE_URL;?>css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <!--external css-->
  <link href="<?php echo BASE_URL;?>css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="<?php echo BASE_URL;?>css/style.css" rel="stylesheet" type="text/css"/>
  <link href="<?php echo BASE_URL;?>css/style-responsive.css" rel="stylesheet" type="text/css"/>
 
  

        <title>Listado de Profesores</title>
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
  <script src="<?php echo BASE_URL;?>js/jquery.min.js"></script>
  <script src="<?php echo BASE_URL;?>js/bootstrap.min.js"></script>
  <script src="<?php echo BASE_URL;?>js/jquery-ui-1.9.2.custom.min.js"></script>
  <script src="<?php echo BASE_URL;?>js/jquery.ui.touch-punch.min.js"></script>
  <script src="<?php echo BASE_URL;?>js/jquery.dcjqaccordion.2.7.js"></script>
  <script src="<?php echo BASE_URL;?>js/jquery.scrollTo.min.js"></script>
  <script src="<?php echo BASE_URL;?>js/jquery.nicescroll.js"></script>
  <!--common script for all pages-->
  <script src="<?php echo BASE_URL;?>js/common-scripts.js"></script>
  <!--script for this page-->
        </div>
     
        <div id="Menu">
		
		
<aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="listar.html"><img src="img/ui-sam.jpg" class="img-circle" width="80"></a></p>
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
                    <h1><p>Listado de Profesores</p></h1>		
		</header>
		<table class="table table-bordered table-hover table-striped" >
              <tr style="font-size: 20px;" >
				<th>CODIGO</th>
				<th>NOMBRE</th>
				<th>APELLIDOS</th>
				<th>GENERO</th>
				<th>FECHA DE NACIMIENTO</th>
				<th colspan="2">ACCIONES</th>
			</tr>
			<tr>
				<td>123</td>
				<td>Carlos Andres</td>
				<td>Perez Bustamante</td>
				<td>Masculino</td>
				<td>11/05/1978</td>
				<td><a href='editar.html' class='btn btn-primary'>&nbsp;Editar&nbsp;</a></td>
				<td><a href='elimninar.html' class='btn btn-danger'>Eliminar</a></td>
			</tr>


			
		</table>
                  
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