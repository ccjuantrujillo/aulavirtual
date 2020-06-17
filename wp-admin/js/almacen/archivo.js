jQuery(document).ready(function(){

    $("body").on("click","#nuevo",function(){
        dataString = "";
        url = base_url+"archivos/editar/n";
        $.post(url,dataString,function(data){
            $('#basic-modal-content').modal();
            $('#mensaje').html(data);
        });             
    });     

    $("body").on("click","#limpiar",function(){
        url = base_url+"archivos/listar";
        location.href=url;
    });
    
    /*$("body").on("click","#grabar",function(){
        url = base_url+"archivos/grabar";
        dataString  = $('#frmPersona').serialize();
        $.post(url,dataString,function(data){
            alert('Operacion realizada con exito');
            location.href = base_url+"archivos/listar";
        });        
    });*/
    
    $("body").on("click","#cancelar",function(){
        url = base_url+"archivos/listar";
        location.href = url;
    });  
    
   /*$("body").on('change',"select",function(){
       accion      = $("#accion").val();
       codigo      = $("#codigo").val();
       dataString  = $('#frmPersona').serialize();
       url = base_url+"archivos/editar/"+accion+"/"+codigo;
       $.post(url,dataString,function(data){
           $('#mensaje').html(data);
       });             
   });*/ 

    $("body").on('change',"#curso",function(){
        var datos = new FormData();
        datos.append("curso",this.value);
        $("#seccion").empty()
        $.ajax({
            url:base_url+"seccion/obtener/",
            method:"post",
            data:datos,
            dataType:"json",
            contentType:false,
            processData:false,
            success:function(data){
                $("#seccion").append("<option value='0'>:: Seleccione ::</option>");
                $.each(data,function(item,value){
                    opt      = document.createElement('option');
                    opt.value = value.SECCIONP_Codigo;
                    opt.appendChild(document.createTextNode(value.SECCIONC_Orden+' - '+value.SECCIONC_Descripcion));
                    $("#seccion").append(opt);
                });
            },
            error:function(){
                alert("Ocurrió un error.");
            }
        });
    }); 

    $("body").on('change','#seccion',function(){
        var datos = new FormData();
        datos.append("seccion",this.value);
        $("#leccion").empty();        
        $.ajax({
            url:base_url+"leccion/obtener/",
            method:"post",
            data:datos,
            dataType:"json",
            contentType:false,
            processData:false,
            success:function(data){
                $("#leccion").append("<option value='0'>:: Seleccione ::</option>");
                $.each(data,function(item,value){
                    opt      = document.createElement('option');
                    opt.value = value.LECCIONP_Codigo;
                    opt.appendChild(document.createTextNode(value.LECCIONC_Nombre));
                    $("#leccion").append(opt);
                });
            },
            error:function(){
                alert("Ocurrió un error");
            }
        });
    });

});
   

function editar(codigo){
    dataString = "codigo="+codigo;    
    url = base_url+"archivos/editar/e/"+codigo;
    $.post(url,dataString,function(data){
        $('#basic-modal-content').modal();
        $('#mensaje').html(data);
    });           
}

function eliminar(codigo){
    if(confirm('Esta seguro desea eliminar este archivo?')){
        dataString = "codigo="+codigo;
        url = base_url+"archivos/eliminar";
        $.post(url,dataString,function(data){
            url = base_url+"archivos/listar";
            location.href = url;
        });
    }
}