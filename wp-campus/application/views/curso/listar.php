<!--Contenido-->
<div class="container-fluid">
    <h3 class="mt-4">MIS CURSOS</h3>
    <div class="row">
        <?php
        foreach($cursos as $value){
        ?>        
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">
                            <?php
                            if($value->CURSOC_Imagen==""){
                                $imagen = dirname(base_url())."/wp-admin/img/sincurso_red.png";
                            }
                            else{
                                $imagen = dirname(base_url())."/wp-admin/img/".$value->CURSOC_Imagen;
                            }
                            ?>
                            <img src="<?php echo $imagen;?>" alt="Barca" class="img-responsive img-fluid" style="height: auto;max-width: 100%"/>   
                        </a>
                    </div>                  
                </div>
                <h4>
                    <a href="<?php echo base_url();?>curso/inicio/<?php echo $value->CURSOP_Codigo;?>"><?php echo $value->CURSOC_Nombre;?></a>
                </h4>
            </div>
        <?php
        }
        ?>
    </div>
</div>