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
                            <img src="http://i.ytimg.com/vi/ZKOtE9DOwGE/mqdefault.jpg" alt="Barca" class="img-responsive"/>   
                        </a>
                    </div>
                    <div class="card-footer">
                        
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