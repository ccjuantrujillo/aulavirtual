jQuery(document).ready(function(){

    $("body").on("click","#nuevo",function(){
        dataString = "";
        url = base_url+"index.php/almacen/archivos/editar/n";
		alert(url);
        $.post(url,dataString,function(data){
            $('#basic-modal-content').modal();
            $('#mensaje').html(data);
        });             
    });     

    $("body").on("click","#limpiar",function(){
        url = base_url+"index.php/almacen/archivos/listar";
        location.href=url;
    });
    
    $("body").on("click","#grabar",function(){
        url = base_url+"index.php/almacen/archivos/grabar";
        dataString  = $('#frmPersona').serialize();
        $.post(url,dataString,function(data){
            alert('Operacion realizada con exito');
            location.href = base_url+"index.php/almacen/archivos/listar";
        });        
        
    });
    
    $("body").on("click","#cancelar",function(){
        url = base_url+"index.php/almacen/archivos/listar";
        location.href = url;
    });  
    
   $("body").on('change',"select",function(){
       accion      = $("#accion").val();
       codigo      = $("#codigo").val();
       dataString  = $('#frmPersona').serialize();
       url = base_url+"index.php/almacen/archivos/editar/"+accion+"/"+codigo;
       $.post(url,dataString,function(data){
           $('#mensaje').html(data);
       });             
   }); 
});
   

function editar(codigo){
    dataString = "codigo="+codigo;    
    url = base_url+"index.php/almacen/archivos/editar/e/"+codigo;
    $.post(url,dataString,function(data){
        $('#basic-modal-content').modal();
        $('#mensaje').html(data);
    });           
}

function eliminar(codigo){
    if(confirm('Esta seguro desea eliminar este archivo?')){
        dataString = "codigo="+codigo;
        url = base_url+"index.php/almacen/archivos/eliminar";
        $.post(url,dataString,function(data){
            url = base_url+"index.php/almacen/archivos/listar";
            location.href = url;
        });
    }
}