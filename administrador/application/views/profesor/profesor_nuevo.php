<div class="contenidotabla" >        
    <h2><?php echo $titulo;?></h2>   
    <div id="container">     
        <input id="tab-1" type="radio" name="tab-group" checked="checked" />
        <label for="tab-1">Datos Principales</label>
        <input id="tab-2" type="radio" name="tab-group" />
        <label for="tab-2">Experiencia</label>	
		
        <div id="content"> 
            <div id="content-1">
                <?php echo $principal;?>
            </div>
            <div id="content-2">
                <div id="experiencia"><?php echo $experiencia;?></div>
            </div>
        </div>        
    </div>
    <div class="frmboton">
        <input class="botones" id="cancelar" type="button" alt="Cancelar" title="Cancelar" value="Cancelar"/>          
        <input class="botones" id="grabar" type="button" alt="Aceptar" title="Aceptar" value="Aceptar"/>
    </div>         
</div>