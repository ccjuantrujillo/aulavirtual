<!--Menu Izquierdo-->
<?php echo $menuizq;?>

<!--Contenido-->
<div id="Cuerpo">
    <section id="main-content">
        <section class="wrapper site-min-height">
			<!-- Title -->
			<h3 class="mt-4">CURSOS</h3>
			<hr>
			<ul class="list-unstyled video-list-thumbs row">
				<?php
				foreach($cursos as $value){
					?>
					<li class="col-lg-3 col-sm-4 col-xs-6">
						<a href="#" title="Claudio Bravo, antes su debut con el Barça en la Liga">
							<img src="http://i.ytimg.com/vi/ZKOtE9DOwGE/mqdefault.jpg" alt="Barca" class="img-responsive" height="130px" />
							<h2>Claudio Bravo, antes su debut con el Barça en la Liga</h2>
							<span class="play-button"></span>
							<span class="duration">03:15</span>
						</a>
						<h3><a href="<?php echo base_url();?>curso/inicio/<?php echo $value->CURSOP_Codigo;?>"><?php echo $value->CURSOC_Nombre;?></a></h3>
						<?php echo $value->CURSOC_DescripcionBreve;?>
					</li>
					<?php
				}
				?>
			</ul>
        </section>
    </section>
</div>