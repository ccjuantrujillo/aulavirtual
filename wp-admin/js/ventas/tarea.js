jQuery(document).ready(function(){     
   $("body").on("click","#buscar",function(){
        $("#form_busqueda").submit();
    });

    $("body").on("click","#nuevo",function(){
        dataString = "";
        url = base_url+"tarea/editar/n";
        $.post(url,dataString,function(data){
            $('#basic-modal-content').modal();
            $('#mensaje').html(data);
        });          
    });         
   
     $("body").on('change',"#curso",function(){
        var datos = new FormData();
        datos.append("curso",this.value);
        $("#seccion").append("<option value='0'>:: Seleccione ::</option>");
        $.ajax({
            url:base_url+"seccion/obtener/",
            method:"post",
            data:datos,
            dataType:"json",
            contentType:false,
            processData:false,
            success:function(data){
                $.each(data, function(item,value){
                   opt       = document.createElement('option');
                   opt.value = value.SECCIONP_Codigo;
                   opt.appendChild(document.createTextNode(value.SECCIONC_Descripcion));
                   $('#seccion').append(opt);
               });
            },
            error:function(){
                alert("Ocurrio un error");
            }
        });       
   });            
    
    $("body").on('change',"#seccion",function(){
        var datos = new FormData();
        datos.append("seccion",this.value);
        $("#leccion").append("<option value='0'>:: Seleccione ::</option>");
        $("#leccion").children("option").remove();
        $.ajax({
            url:base_url+"leccion/obtener/",
            method:"post",
            data:datos,
            dataType:"json",
            contentType:false,
            processData:false,
            success:function(data){
                $.each(data, function(item,value){
                   opt       = document.createElement('option');
                   opt.value = value.LECCIONP_Codigo;
                   opt.appendChild(document.createTextNode(value.LECCIONC_Nombre));
                   $('#leccion').append(opt);
               });
            },
            error:function(){
                alert("Ocurrio un error");
            }
        });       
   });     
    
    $("body").on('click',"#cancelar",function(){
        url = base_url+"tarea/listar";
        location.href = url;
    });      
    
    $("body").on('click',"#grabar",function(){
        url        = base_url+"tarea/grabar";
        dataString = $('#frmPersona').serialize();
        $.post(url,dataString,function(data){
            if(data!=""){
                alert('Operacion realizada con exito');    
                location.href = base_url+"tarea/listar";
            }
            else if(data){
                alert('Ocurrio un error durante la grabacion');
            }
        });            
    });    
    
    //Eliminar tareas
    $("body").on("click",".eliminar",function(){
       if(confirm('Este accion borrará todas las tareas\n¿Esta seguro desea eliminar este registro?')){
            coddetalle = $(this).parent().parent().attr("id");
            dataString = "codigo="+coddetalle;
            url = base_url+"tarea/eliminar";
            $.post(url,dataString,function(data){
                if(data!=""){
                    url = base_url+"tarea/listar";
                    location.href = url;
                }
                else{
                    alert("No se puede eliminar el registro");
                }
            });           
       }        
    });           
    
   $("body").on("click",".editar",function(){
        codigo = $(this).parent().parent().attr("id");
        url = base_url+"tarea/editar/e/"+codigo;
        $.post(url,"",function(data){
            $('#basic-modal-content').modal();
            $('#mensaje').html(data);
        });  
    });        
    
  $("body").on('focus',"#fecha",function(){
       $(this).datepicker({
        dateFormat: "dd/mm/yy",
        changeYear: true,
        yearRange: "1945:2025"
       });
  });

  $("body").on('focus',".rowfecha",function(){
       $(this).datepicker({
        dateFormat: "dd/mm/yy",
        changeYear: true,
        yearRange: "1945:2025"
       });
  });

  $("body").on('focus',"#fechaentrega",function(){
       $(this).datepicker({
        dateFormat: "dd/mm/yy",
        changeYear: true,
        yearRange: "1945:2025"
       });
  });  
});