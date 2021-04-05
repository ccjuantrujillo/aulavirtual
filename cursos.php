<?php
require_once 'conexion.php';
$query = "select * 
          from ant_curso c
          inner join ant_area a on a.AREAP_Codigo = c.AREAP_Codigo
          where c.CURSOC_FlagEstado=1 and 
          c.EMPRP_Codigo in (2) 
          order by c.EMPRP_Codigo,c.AREAP_Codigo";

$rs = mysqli_query($link,$query);
$listacursos = mysqli_fetch_all($rs,MYSQLI_ASSOC);
//Recuperamos datos de la empresa
$query = "select * from ant_empresa";
$rs    = mysqli_query($link,$query);
$datosempresa = mysqli_fetch_array($rs,MYSQLI_ASSOC);
//Configuramos menu
$inicio      = "class='active'";
$contactenos = "";
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from sbtechnosoft.com/education-world/multiple-pages/course-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Apr 2020 04:36:27 GMT -->
<?php require_once "header.php";?>
<body>
<!-- Pre Loader -->
<div id="dvLoading"></div>
<!-- Header Start -->
<?php require_once "menu.php";?>
<!-- Inner Banner Wrapper End -->
<section class="inner-wrapper">
  <div class="container">
    <div class="row">
      <div class="inner-wrapper-main">
        <div class="col-sm-12">
          <!--Fila1-->
          <div class="row"> 
            <h3>MUSICA</h3>
          <?php
          $area_ant = 0;
          foreach($listacursos as $index => $value){
            $area = $value['AREAP_Codigo'];
            if($area_ant != $area && $area_ant != 0){
              echo "</div>
                    <div class='row'> 
                    <div><h3 class='pl-3'>".$value['AREAC_Descripcion']."</h3></div>
                    ";
            } 
            ?>
              <div class="col-sm-4 col-md-4">
                <div class="courses">
                  <div class="course-thumb">
                      <a href="./wp-campus/inicio" target="_blank">
                          <img width="400" src="./wp-admin/img/<?php echo $value['CURSOC_Imagen']!=''?$value['CURSOC_Imagen']:'class-img1.jpg';?>" alt="Course Image"></a>
                  </div>
                  <div class="course-cnt">
                      <h3 class="text-center">
                        <a href="./wp-campus/inicio" target="_blank"><?php echo $value['CURSOC_Nombre'];?></a></h3>
                    <!--p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p-->
                  </div>
                </div>
              </div>

            <?php  
              if(($index+1)%3==0) echo "</div><div class='row'> ";
              $area_ant = $area;
            ?>

            <?php
            }
            ?>

          
          <!--Fin de Fila1-->
          <!--Fila2-->
      
          <!--Fin de Fila2-->          
          <!--div class="course-pagination">
            <ul class="pagination">
              <li> <a href="#" aria-label="Previous"> <span aria-hidden="true">Prev</span> </a> </li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li> <a href="#" aria-label="Next"> <span aria-hidden="true">Next</span> </a> </li>
            </ul>
          </div-->

        </div>
      </div>
    </div>
  </div>
</section>
<!-- Call to Action start -->
<!-- Call to Action End -->
<!-- Footer Links Start-->
<!-- Footer Links End -->
<!-- Copy Rights Start -->
<?php require_once 'footer.php';?>
<!-- Copy Rights End --> 
</body>
</html>