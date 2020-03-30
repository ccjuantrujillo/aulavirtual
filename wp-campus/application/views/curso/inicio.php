<!--Contenido-->
<div class="container-fluid">
    <h3 class="mt-4"><?php echo $curso->CURSOC_Nombre;?></h3>
    <?php
    if(trim($curso->CURSOC_Video)!=""){
    ?>
        <div class="embed-responsive embed-responsive-16by9">
          <iframe width="560" height="315" src="<?php echo $curso->CURSOC_Video;?>" frameborder="0" 
                  allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    <?php
    }
    ?>
    <h3 class="section-title">Introduccion</h3>
    <div class="row">
        <ol class="style1"><?php echo $curso->CURSOC_DescripcionBreve;?></ol>
    </div>
    <h3 class="section-title">Programa</h3>
    <div class="row">
        <ol><?php echo $menu;?></ol>
    </div>
</div>