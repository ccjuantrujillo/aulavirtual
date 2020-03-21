<!DOCTYPE html>
<html>
    <head>
		<meta charset="UTF-8">
        <link href="<?php echo base_url();?>assets/img/favicon.png" rel="icon">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="Dashboard">
		<meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
		<!-- Favicons -->
		<!-- Bootstrap core CSS -->
		<link href="<?php echo base_url();?>assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<!--external css-->
		<link href="<?php echo base_url();?>assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
		<!-- Custom styles for this template -->
		<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url();?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
        <title>CECCOS Circulo de Estudios</title>
		<!-- js placed at the end of the document so the pages load faster -->
		<script src="<?php echo base_url();?>assets/lib/jquery/jquery.min.js"></script>
		<script src="<?php echo base_url();?>assets/lib/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>assets/lib/jquery-ui-1.9.2.custom.min.js"></script>
		<script src="<?php echo base_url();?>assets/lib/jquery.ui.touch-punch.min.js"></script>
		<script class="include" type="text/javascript" src="<?php echo base_url();?>assets/lib/jquery.dcjqaccordion.2.7.js"></script>
		<script src="<?php echo base_url();?>assets/lib/jquery.scrollTo.min.js"></script>
		<script src="<?php echo base_url();?>assets/lib/jquery.nicescroll.js" type="text/javascript"></script>
		<!--common script for all pages-->
		<script src="<?php echo base_url();?>assets/lib/common-scripts.js"></script>
		<!--script for this page-->		
    </head>
    <body>
        <div id="Cabecera">
			<!--header start-->
			<header class="header black-bg">
			  <div class="sidebar-toggle-box">
				<div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
			  </div>
			  <!--logo start-->
			  <a href="<?php echo base_url();?>inicio" class="logo"><b>CECCOS<span> Circulo de Estudios</span></b></a>
			  <!--logo end-->
			  <div class="nav notify-row" id="top_menu">
				<!--  notification start -->
				
			  </div>
			  <div class="top-menu">
				<!--ul class="nav pull-right top-menu">
				  <li><a class="logout" href="index.html">Logout</a></li>
				</ul-->
			  </div>
			</header>
			<!--header end-->
        </div>
     
	    <!--Content-->
	    <?php echo $content;?>

        <div id="Footer">
			<footer class="site-footer">
			  <div class="text-center">
				<p>
				  &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
				</p>
				<div class="credits">
				  Created with Dashio template by <a href="#">TemplateMag</a>
				</div>
				<a href="blank.html#" class="go-top">
				  <i class="fa fa-angle-up"></i>
				  </a>
			  </div>
			</footer>  
        </div>  
    </body>
</html>