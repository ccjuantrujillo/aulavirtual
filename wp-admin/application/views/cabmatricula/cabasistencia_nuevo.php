<div class="contenidotabla" >
    <h1><?php echo $titulo;?> </h1>
    <?php echo $form_open;?>
    <div id="cabecera">
        <table style="background-color: #f4f7ff">
          <tr>
            <td>Codigo:</td>
            <td class="formss"><input name="modulo" id="modulo" type="text" value="<?php echo $lista->codigo;?>" readonly="readonly" class="cajaMinima" style="background-color: #E6E6E6"></td>               
          </tr> 
          <tr>
            <td>Fecha:</td>
            <td class="formss"><input name="fecha" id="fecha" type="text" value="<?php echo $lista->fecha;?>" class="cajaMinima"/></td>                
          </tr>          
          <tr>
            <td>Curso:</td>
            <td class="formss"><?php echo $selcurso;?></td>            
          </tr> 
          <tr>
            <td>Descripcion:</td>
            <td class="formss"><?php echo $descripcion;?></td>                
          </tr>            
        </table>
    </div>
    <div class="frmboton">
        <input id="cancelar" class="botones" type="button" alt="Cancelar" title="Cancelar" value="Cancelar"/>
        <input id="grabar" class="botones" type="button" alt="Aceptar" title="Aceptar" value="Aceptar"/>   
    </div>
    <?php echo $oculto;?>
    <?php echo $form_close;?>
</div>