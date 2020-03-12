jQuery(document).ready(function(){
    $("body").on("click","#nuevo",function(){
        dataString = "";
        url = base_url+"index.php/almacen/productoatributodetalle/editar/n";
        $.post(url,dataString,function(data){
            $('#basic-modal-content').modal();
            $('#mensaje').html(data);
        });             
    }); 
    
    $("body").on("change","#producto",function(){
        accion      = $("#accion").val();
        codigo      = $("#codigo").val();
        dataString  = $('#form1').serialize();
        url = base_url+"index.php/almacen/productoatributodetalle/editar/"+accion+"/"+codigo;
        $.post(url,dataString,function(data){
            $('#mensaje').html(data);
        });             
    });     
    
    $("body").on("change","#atributo",function(){
        accion      = $("#accion").val();
        codigo      = $("#codigo").val();
        dataString  = $('#form1').serialize();
        url = base_url+"index.php/almacen/productoatributodetalle/editar/"+accion+"/"+codigo;
        $.post(url,dataString,function(data){
            $('#mensaje').html(data);
        });             
    });         

    $("body").on("click","#limpiar",function(){
        url = base_url+"index.php/almacen/productoatributodetalle/listar";
        location.href=url;
    });
    
    $("body").on("click","#grabar",function(){
        url = base_url+"index.php/almacen/productoatributodetalle/grabar";
        dataString  = $('#form1').serialize();
        $.post(url,dataString,function(data){
            alert('Operacion realizada con exito');
            location.href = base_url+"index.php/almacen/productoatributodetalle/listar";
        });        
        
    });
    
    $("body").on("click","#cancelar",function(){
        url = base_url+"index.php/almacen/productoatributodetalle/listar";
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
    url = base_url+"index.php/almacen/productoatributodetalle/editar/e/"+codigo;
    $.post(url,dataString,function(data){
        $('#basic-modal-content').modal();
        $('#mensaje').html(data);
    });           
}

function eliminar(codigo){
    if(confirm('Esta seguro desea eliminar este producto?')){
        dataString = "codigo="+codigo;
        url = base_url+"index.php/almacen/productoatributodetalle/eliminar";
        $.post(url,dataString,function(data){
            url = base_url+"index.php/almacen/productoatributodetalle/listar";
            location.href = url;
        });
    }
}