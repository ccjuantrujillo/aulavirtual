
        <?php echo $form_open;?>
        <table style="background-color: #f4f7ff">

            <tr>
              <td width="50%" bgcolor="#d5e2f2">Semana</td>
              <td class="formss"><?php echo $semana;?> </td>
            </tr>                       
            <tr>
              <td bgcolor="#d5e2f2">Descripcion</td>
              <td class="formss"><textarea name="descripcion" id="descripcion" cols="1" rows="3" style="width:250px" class="textareaGrande"><?php echo $lista->descripcion;?></textarea></td>
            </tr>   
        </table>
        <?php echo $oculto?>
        <?php echo $form_close;?>
