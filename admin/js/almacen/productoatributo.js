jQuery(document).ready(function(){
    $("body").on("click","#nuevo",function(){
        dataString = "";
        url = base_url+"index.php/almacen/productoatributo/editar/n";
        $.post(url,dataString,function(data){
            $('#basic-modal-content').modal();
            $('#mensaje').html(data);
        });             
    }); 

    $("body").on("click","#limpiar",function(){
        url = base_url+"index.php/almacen/producto/listar";
        location.href=url;
    });
    
    $("body").on("click","#grabar",function(){
        url = base_url+"index.php/almacen/productoatributo/grabar";
        dataString  = $('#form1').serialize();
        $.post(url,dataString,function(data){
            alert('Operacion realizada con exito');
            location.href = base_url+"index.php/almacen/productoatributo/listar";
        });        
        
    });
    
    $("body").on("click","#cancelar",function(){
        url = base_url+"index.php/almacen/productoatributo/listar";
        location.href = url;
    });  
    
    $("body").on("click","#cerrar",function(){
        url = base_url+"index.php/inicio/index";
        location.href = url;
    });   
    
    $("body").on("click","#logo",function(){
        url = base_url+"index.php/inicio/principal";
        location.href = url;
    });         
});

function editar(codigo){
    dataString = "codigo="+codigo;    
    url = base_url+"index.php/almacen/productoatributo/editar/e/"+codigo;
    $.post(url,dataString,function(data){
        $('#basic-modal-content').modal();
        $('#mensaje').html(data);
    });           
}

function eliminar(codigo){
    if(confirm('Esta seguro desea eliminar este producto?')){
        dataString = "codigo="+codigo;
        url = base_url+"index.php/almacen/productoatributo/eliminar";
        $.post(url,dataString,function(data){
            obj = jQuery.parseJSON(data);
            if(obj){
                alert('Operacion realizada con exito');  
                url = base_url+"index.php/almacen/productoatributo/listar";
                location.href = url;                
            }
            else{
                alert("No se puede eliminar el registro,\nel video tiene preguntas ingresadas");
            }
        });
    }
}