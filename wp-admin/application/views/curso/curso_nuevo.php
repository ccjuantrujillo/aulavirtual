<div class="contenidotabla">
	<h1><?php echo $titulo;?></h1>    
    <div id="container">     
        <input id="tab-1" type="radio" name="tab-group" checked="checked" />
        <label for="tab-1">Principales</label>
        <input id="tab-2" type="radio" name="tab-group" />
        <label for="tab-2">Archivos</label>	
						
        <div id="content"> 
            <div id="content-1">
                <?php echo $principal;?>
            </div>
            <div id="content-2">
                <?php echo $archivos;?>
            </div>								
        </div>        
    </div>
	<div class="frmboton">
		<input id="cancelar" class="botones" type="button" alt="Cancelar" title="Cancelar" value="Cancelar"/>
		<input id="grabar" class="botones" type="button" alt="Aceptar" title="Aceptar" value="Aceptar"/>
	</div>
</div>

