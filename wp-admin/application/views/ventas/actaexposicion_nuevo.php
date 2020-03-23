<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
    <meta http-equiv="Content-Language" content="es"> 
    <title><?php echo titulo;?></title>          
    <link rel="stylesheet" href="<?php echo css;?>estructura.css"/>
    <script type="text/javascript" src="<?php echo js;?>jquery.js"></script>   
    <script type="text/javascript" src="<?php echo js;?>jquery.simplemodal.js"></script>      
    <script type="text/javascript" src="<?php echo js;?>constants.js"></script>     
    <script type="text/javascript" src="<?php echo js;?>ventas/actaexposicion.js"></script>  
</head>
<body>
<div class="contenidotabla"> 
    <div class="titulo">
        <h1><?php echo $titulo;?></h1>
    </div> 
    <div id="cabecer">
        <?php echo $form_open;?>
            <ul id="frm_exposicion">
                <li>
                    <label>Archivo:</label>
                    <input type="file" name="file_exposicion" id="file_exposicion" multiple value="Cargar archivos">
                    Max. Tamaño(<?php echo $upload_max_filesize;?>&nbsp;MB)
                </li>
                <li>
                    <label>Profesor:</label>
                    <?php echo $form_profesor;?>
                </li>
                <li>
                    <label>Tema:</label>
                    <?php echo $form_tema;?>
                </li>
                <li>
                    <label>Descripcion:</label>
                    <?php echo $form_descripcion;?>
                </li>
                <li>
                    <label>Duracion:</label>
                    <?php echo $form_duracion;?>
                </li>            
                <li>
                    <input type="submit" value="Subir">
                </li>
            </ul>
            <?php echo $oculto;?>      
        <?php echo $form_close;?>          
    </div> 
    <div id="detalle" style="background-color: #f4f7ff">
        <table width="100%" id="tabla_detalle">
            <tr>
                <th width="3%" align="center">No</th>
                <th width="30%" align="center">Tema</th>
                <th width="20%" align="center">Descripcion</th>
                <th width="10%" align="center">Duracion</th>
                <th width="20%" align="center">Profesor</th>
                <th width="5%" align="center">File</th>
                <th align="center">Acciones</th>
            </tr>
            <?php
            if(count($lista)==0){
                ?>
                <tr>
                    <td colspan="7" align="center">::: No existen registros :::</td>
                </tr>
                <?php
            }
            else{
                foreach($lista as $indice => $value){
                    ?>
                    <tr id="<?php echo $value->codigo;?>">
                        <td align="center"><?php echo $indice+1;?></td>
                        <td align="left"><?php echo $value->tema;?></td>
                        <td align="left"><?php echo $value->descripcion;?></td>
                        <td align="center"><?php echo $value->duracion;?></td>
                        <td align="center"><?php echo $value->profesor;?></td>
                        <td align="center"><a href="<?php echo base_url()."files/".$value->archivo;?>" target="blank"><img src="<?php echo img."adjunto.jpg";?>" width="20px" height="20px"/></a></td>
                        <td align="center">
                            <a href="#" class="editar">Editar</a>&nbsp;&nbsp;
                            <a href="#" class="eliminar">Eliminar</a>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>           
    </div>  
    <div class="frmboton">
        <input id="cancelar" class="botones" type="button" alt="Salir" title="Salir" value="Salir"/>
    </div>    
</div>
</body>
</html>