jQuery(document).ready(function(){

    $("body").on("click","#nuevo",function(){
        dataString = "";
        url = base_url+"index.php/archivos/editar/n";
        $.post(url,dataString,function(data){
            $('#basic-modal-content').modal();
            $('#mensaje').html(data);
        });             
    });     

    $("body").on("click","#limpiar",function(){
        url = base_url+"index.php/archivos/listar";
        location.href=url;
    });
    
    /*$("body").on("click","#grabar",function(){
        url = base_url+"index.php/archivos/grabar";
        dataString  = $('#frmPersona').serialize();
        $.post(url,dataString,function(data){
            alert('Operacion realizada con exito');
            location.href = base_url+"index.php/archivos/listar";
        });        
    });*/
    
    $("body").on("click","#cancelar",function(){
        url = base_url+"index.php/archivos/listar";
        location.href = url;
    });  
    
   /*$("body").on('change',"select",function(){
       accion      = $("#accion").val();
       codigo      = $("#codigo").val();
       dataString  = $('#frmPersona').serialize();
       url = base_url+"index.php/archivos/editar/"+accion+"/"+codigo;
       $.post(url,dataString,function(data){
           $('#mensaje').html(data);
       });             
   });*/ 

    $("body").on('change',"#curso",function(){
        url    = base_url+"index.php/seccion/obtener/";
        objRes = new Object();
        objRes.curso = $("#curso").val();
        dataString   = {objeto:JSON.stringify(objRes)};
        $("#seccion").empty()
        $.post(url,dataString,function(data){
            $("#seccion").append("<option value='0'>:: Seleccione ::</option>");
            $.each(data,function(item,value){
                opt      = document.createElement('option');
                opt.value = value.SECCIONP_Codigo;
                opt.appendChild(document.createTextNode(value.SECCIONC_Orden+' - '+value.SECCIONC_Descripcion));
                $("#seccion").append(opt);
            });
        },"json");
    }); 

    $("body").on('change','#seccion',function(){
        url    = base_url+"index.php/leccion/obtener/";
        objRes = new Object();
        objRes.seccion = $("#seccion").val();
        dataString   = {objeto:JSON.stringify(objRes)};
        $("#leccion").empty()
        $.post(url,dataString,function(data){
            $("#leccion").append("<option value='0'>:: Seleccione ::</option>");
            $.each(data,function(item,value){
                opt      = document.createElement('option');
                opt.value = value.LECCIONP_Codigo;
                opt.appendChild(document.createTextNode(value.LECCIONC_Nombre));
                $("#leccion").append(opt);
            });
        },"json");
    });

});
   

function editar(codigo){
    dataString = "codigo="+codigo;    
    url = base_url+"index.php/archivos/editar/e/"+codigo;
    $.post(url,dataString,function(data){
        $('#basic-modal-content').modal();
        $('#mensaje').html(data);
    });           
}

function eliminar(codigo){
    if(confirm('Esta seguro desea eliminar este archivo?')){
        dataString = "codigo="+codigo;
        url = base_url+"index.php/archivos/eliminar";
        $.post(url,dataString,function(data){
            url = base_url+"index.php/archivos/listar";
            location.href = url;
        });
    }
}