<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>  
    <META HTTP-EQUIV="Refresh" content="300"> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
    <meta http-equiv="Content-Language" content="es"> 
    <title><?php echo titulo;?></title>          
    <link rel="stylesheet" href="<?php echo css;?>estructura.css" type="text/css" />     
    <link rel="stylesheet" href="<?php echo css;?>menu.css" type="text/css" />   
    <link rel="stylesheet" href="<?php echo css;?>tabs.css" type="text/css" />  
    <script type="text/javascript" src="<?php echo js;?>jquery.js"></script>   
    <script type="text/javascript" src="<?php echo js;?>jquery.simplemodal.js"></script>     
    <script type="text/javascript" src="<?php echo js;?>constants.js"></script>     
    <script type="text/javascript" src="<?php echo js;?>ventas/calificacion.js"></script>
</head>
<body>
<div class="contenido" > 
    <div class="menu"><ul id="nav"><?php echo $menu;?></ul></div>
    <div class="titulo">                  
        <input name="" type="button" class="aceptarlog2" alt="Aceptar" title="Aceptar" value="Crear nueva matricula" id="nuevo"/>
        <h1>Calificacion de alumnos</h1>            
    </div> 
    <div class="mensaje">Se han encontrado (<?php echo $registros;?>) registros(s)</div>
    <div class="tabla">
      <table>
        <tr class="list1">
          <td width="43">No</td>
          <td width="193">Apellidos y Nombres</td>
          <td width="100">Curso</td>
          <td width="120">Tarea</td>          
          <td width="60">Nota</td>
          <td width="62">Editar</td>
          <td width="60">Eliminar</td>
        </tr>
        <?php
        if(count($lista)>0){
          foreach($lista as $item => $value){
              $clase = ($item%2)==0?"list_a":"list_b";
             ?>
            <tr class="<?php echo $clase;?>" id="<?php echo $value->codigo;?>">
              <td><?php echo ++$j;?></td>
              <td align="left"><?php echo $value->paterno." ".$value->materno." ".$value->nombres;?></td>
              <td align="left"><?php echo $value->curso;?></td>     
              <td align="center"><?php echo $value->tarea;?></td>              
              <td align="center"><?php echo $value->puntaje;?></td>
              <td><a href="#" class="editar"><img src="<?php echo img;?>editar.jpg"/></a></td>
              <td><a href="#" class="eliminar"><img src="<?php echo img;?>eliminar.jpg"/></a></td>
            </tr>  
             <?php 
          }
        }
        else{
            ?>
          <tr class="list_a"><td colspan='6'>::NO EXISTEN REGISTROS::</td></tr>
            <?php
        }
        ?>
      </table>
        <div class="mensajetabla"><?php echo $paginacion;?></div>
    </div>

    <div class="footer"><h4><?php echo pie;?></h4></div>
</div>
 <div id="basic-modal-content">
     <div id="mensaje">
        <div class="contenidotabla">
            <h1><?php echo $titulo;?></h1>
            <?php echo $form_open;?>
            <table>
              <tr>
                <td align="right">Codigo:</td>
                <td class="formss">
                    <input name="codigo" id="codigo" type="text" class="cajaMinima" readonly="readonly"/>
                </td>        
              </tr>                  
              <tr>
                <td width="20%" align="right">Curso:</td>
                <td class="formss" width="30%"><?php echo $selcurso;?></td>                       
              </tr>               
              <tr>
                  <td width="20%" align="right">Nro.Matricula:</td>
                  <td class="formss" width="30%">
                      <select id="matricula" name="matricula" class="comboGrande">
                          <option value="0">::Seleccione::</option>
                      </select>
                  </td>                       
              </tr>        
              <tr>
                <td width="20%" align="right">Tarea:</td>
                <td class="formss" width="30%">
                    <select name="tarea" id="tarea" class="comboGrande">
                        <option value="0">::Seleccione::</option>
                    </select>
                </td>                       
              </tr>                       
              <tr>
                <td align="right">Puntaje:</td>
                <td class="formss">
                    <input name="puntaje" id="puntaje" type="text" class="cajaMinima"/>
                </td>        
              </tr>               
              <tr>
                <td colspan="4" class="formss">
                    <div class="frmboton">
                        <div class="frmboton_matricula">
                            <input class="botones" id="cancelar" type="button" alt="Cancelar" title="Cancelar" value="Cancelar"/>                                                           
                            <input class="botones" id="grabar" type="button" alt="Grabar" title="Grabar" value="Grabar"/>
                        </div>
                    </div>
                </td>
              </tr>
            </table>
            <?php echo $oculto;?>
            <?php echo $form_close;?>
        </div>
     </div>
 </div>  
</body>
</html>
