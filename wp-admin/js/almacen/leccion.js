jQuery(document).ready(function(){
//    $('ul li:has(ul)').hover(function(e) {
//         $(this).find('ul').css({display: "block"});
//     },
//     function(e) {
//         $(this).find('ul').css({display: "none"});
//     });        
    
    $("body").on("click","#nuevo",function(){
        dataString = "";
        url = base_url+"leccion/editar/n";
        $.post(url,dataString,function(data){
            $('#basic-modal-content').modal();
            $('#mensaje').html(data);
        });             
    }); 

    $("body").on("click","#limpiar",function(){
        url = base_url+"leccion/listar";
        location.href=url;
    });
    
    $("body").on("click","#grabar",function(){
        url = base_url+"leccion/grabar";
        dataString  = $('#frmPersona').serialize();
        $.post(url,dataString,function(data){
            alert('Operacion realizada con exito');
            location.href = base_url+"leccion/listar";
        });        
        
    });
    
    $("body").on("click","#cancelar",function(){
        url = base_url+"leccion/listar";
        location.href = url;
    });  

    $("body").on('change',"#curso",function(){
        url    = base_url+"periodo/obtener/";
        var datos   = new FormData();
        datos.append("curso",this.value); 
        $("#periodo").empty();
        $("#periodo").append("<option value='0'>:: Seleccione ::</option>");
        $.ajax({
            url:url,
            method:"post",
            data:datos,
            dataType:"json",
            contentType:false,
            processData:false,
            success:function(data){
                $.each(data,function(item,value){
                    opt      = document.createElement('option');
                    opt.value = value.PERIODP_Codigo;
                    opt.appendChild(document.createTextNode(value.PERIODC_DESCRIPCION));
                    $("#periodo").append(opt);
                });
            },
            error:function(){
                alert("Ocurrio un error");
            }
        });
    });  

    $("body").on('change','#periodo',function(){
        var datos = new FormData();
        datos.append("periodo",this.value);
        datos.append("curso",$("#curso").val());
        $("#seccion").empty();
        $("#seccion").append("<option value='0'>:: Seleccione ::</option>");
        $.ajax({
            url:base_url+"seccion/obtener/",
            data:datos,
            method:"post",
            dataType:"json",
            contentType:false,
            processData:false,
            success:function(data){
                $.each(data,function(item,value){
                   opt       = document.createElement('option');
                   opt.value = value.SECCIONP_Codigo;
                   opt.appendChild(document.createTextNode(value.SECCIONC_Orden+' - '+value.SECCIONC_Descripcion));
                   $('#seccion').append(opt);
                });
            },
            error:function(){
                alert('Ocurrio un error');
            }
        });
    });
    
    $("body").on('change','#periodo_',function(){
        url = base_url+"";
    });
   
    $("body").on('focus',"#finicio",function(){
         $(this).datepicker({
          dateFormat: "dd/mm/yy",
          changeYear: true,
          yearRange: "1945:2025"
         });
    });   
    
    $("body").on('focus',"#ffin",function(){
         $(this).datepicker({
          dateFormat: "dd/mm/yy",
          changeYear: true,
          yearRange: "1945:2025"
         });
    });       
});

function editar(codigo){
    dataString = "codigo="+codigo;    
    url = base_url+"leccion/editar/e/"+codigo;
    $.post(url,dataString,function(data){
        $('#basic-modal-content').modal();
        $('#mensaje').html(data);
    });           
}

function eliminar(codigo){
    if(confirm('Esta seguro desea eliminar esta semana?')){
        dataString = "codigo="+codigo;
        url = base_url+"leccion/eliminar";
        $.post(url,dataString,function(data){
            obj = jQuery.parseJSON(data);
            if(obj){
                alert('Operacion realizada con exito');  
                url = base_url+"leccion/listar";
                location.href = url;                
            }
            else{
                alert("No se puede eliminar el registro,\nel video tiene preguntas ingresadas");
            }
        });
    }
}