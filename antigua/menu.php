<?php
if(!isset($inicio))      $inicio="";
if(!isset($contactenos)) $contactenos="";
?>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-dark bg-dark fixed-top" style="margin-bottom:0px">
	<div class="container">
		<div class="navbar-collapse collapse" id="navbarResponsive">
			<ul class="nav navbar-nav pull-right mainNav">
				<li <?php echo $inicio;?>><a href="index.php">INICIO</a></li>
				<li <?php echo $contactenos;?>><a href="contactenos.php">CONTACTENOS</a></li>
			</ul>
		</div>
	</div>
</nav>

<!-- Page Header -->
<header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1><?php echo $datosempresa['EMPRC_RazonSocial'];?></h1>
          <span class="subheading"><?php echo $datosempresa['EMPRC_DescripcionBreve'];?></span>
        </div>
      </div>
    </div>
  </div>
</header>