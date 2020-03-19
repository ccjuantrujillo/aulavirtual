<div class="contenidotabla" >  
    <h1><?php echo $titulo;?></h1>   
    <?php echo $form_open;?>
    <table style="background-color: #f4f7ff">
        <tr>
          <td width="50%" bgcolor="#d5e2f2">Codigo:</td>
          <td class="formss"><input name="codigo" id="codigo" type="text" value="<?php echo $lista->codigo;?>" readonly="readonly" class="cajaMinima" style="background-color: #E6E6E6"/></td>
        </tr>      
        <tr>
          <td bgcolor="#d5e2f2">D.N.I.:</td>
          <td class="formss"><input name="dni" id="dni" type="text" maxlength="8" value="<?php echo $lista->dni;?>" class="cajaMinima" onkeydown="return numbersonly(this,event,'.');"/></td>
        </tr>
        <tr>
          <td bgcolor="#d5e2f2">Identificador:</td>
          <td class="formss"><input name="identificador" id="identificador" type="text" value="<?php echo $lista->identificador;?>" class="cajaMedia"/></td>
        </tr>        
        <tr>
          <td bgcolor="#d5e2f2">Paterno:</td>
          <td class="formss"><input name="paterno" id="paterno" type="text" value="<?php echo $lista->paterno;?>" class="cajaMedia"/></td>
        </tr>
        <tr>
          <td bgcolor="#d5e2f2">Materno:</td>
          <td class="formss"><input name="materno" id="materno" type="text" value="<?php echo $lista->materno;?>" class="cajaMedia"/></td>
        </tr>            
        <tr>
          <td bgcolor="#d5e2f2">Nombres:</td>
          <td class="formss"><input name="nombres" id="nombres" type="text" value="<?php echo $lista->nombres;?>" class="cajaMedia"/></td>
        </tr>   
        <tr>
          <td bgcolor="#d5e2f2">Email:</td>
          <td class="formss"><input name="email" id="email" type="text" value="<?php echo $lista->email;?>" class="cajaGrande minus" onblur="return ValidateEmail(this,event)"/></td>
        </tr>  
        <tr>
          <td bgcolor="#d5e2f2">Telefono:</td>
          <td class="formss"><input name="telefono" id="telefono" type="text" value="<?php echo $lista->telefono;?>" class="cajaMinima"/></td>
        </tr>  
        <tr>
          <td bgcolor="#d5e2f2">Direccion:</td>
          <td class="formss"><input name="direccion" id="direccion" type="text" value="<?php echo $lista->direccion;?>" class="cajaGrande"/></td>
        </tr>              
        <tr>
          <td bgcolor="#d5e2f2">F.Nacimiento:</td>
          <td class="formss">
              <input name="fnacimiento" id="fnacimiento" type="text"  value="<?php echo $lista->fnacimiento;?>" class="cajaMinima" maxlength="10">
          </td>
        </tr>    
        <tr>
          <td bgcolor="#d5e2f2">Estado:</td>
          <td class="formss"><?php echo $selestado;?></td>
        </tr> 
    </table>
    <?php echo $oculto;?>
    <?php echo $form_close;?>
    <div class="frmboton">
        <div class="frmboton_matricula">
            <input class="botones" id="cancelar" type="button" alt="Cancelar" title="Cancelar" value="Cancelar"/>                                                      
            <input class="botones" id="grabar" type="button" alt="Aceptar" title="Aceptar" value="Aceptar"/>
        </div>
    </div> 
</div>
  
