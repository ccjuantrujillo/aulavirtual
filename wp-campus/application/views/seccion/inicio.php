<!-- container -->
<div id="wrapper">
	<div class="row">
		<div class="col-md-3">
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i> Inicio<span class="fa arrow"></span></a>
                            <!-- /.nav-second-level -->	
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i> Programa<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            	<?php echo $filaizq;?>
                            </ul>
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i> Archivos<span class="fa arrow"></span></a>         
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i> Tareas<span class="fa arrow"></span></a>
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i> Evaluacion<span class="fa arrow"></span></a>
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i> Calificacion<span class="fa arrow"></span></a>                                                                                                       					
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
		</div>
		<div class="col-md-9">
			<div class="row">
				<h3 class="section-title"><?php echo $nomcurso;?>/<?php echo $ordseccion.'. '.$nomseccion;?></h3>
                <?php echo $filalecciones;?>
				<!--div class="embed-responsive embed-responsive-16by9">
				  <iframe width="560" height="315" src="https://www.youtube.com/embed/gYfb2wL9gDQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div-->
				<h3 class="section-title">Programa</h3>
		      	<ol class="style1">
		      	  <?php echo $fila;?>
		        </ol>

			</div> 						
		</div>
	</div>
</div>
<!-- /container -->