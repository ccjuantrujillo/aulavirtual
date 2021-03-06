jQuery(document).ready(function(){
//    $('ul li:has(ul)').hover(function(e) {
//         $(this).find('ul').css({display: "block"});
//     },
//     function(e) {
//         $(this).find('ul').css({display: "none"});
//     });        
    
    $("body").on("click","#nuevo",function(){
        dataString = "";
        url = base_url+"seccion/editar/n";
        $.post(url,dataString,function(data){
            $('#basic-modal-content').modal();
            $('#mensaje').html(data);
        });             
    }); 

    $("body").on("click","#limpiar",function(){
        url = base_url+"seccion/listar";
        location.href=url;
    });
    
    $("body").on("click","#grabar",function(){
        url = base_url+"seccion/grabar";
        dataString  = $('#frmPersona').serialize();
        $.post(url,dataString,function(data){
            alert('Operacion realizada con exito');
            location.href = base_url+"seccion/listar";
        });        
        
    });
    
    $("body").on("click","#cancelar",function(){
        url = base_url+"seccion/listar";
        location.href = url;
    });  

    $("body").on('change',"#ciclo",function(){
        url    = base_url+"periodo/obtener/";
        objRes = new Object();
        objRes.ciclo = $("#ciclo").val();
        dataString   = {objeto:JSON.stringify(objRes)};
        $("#periodo").empty()
        $.post(url,dataString,function(data){
            $("#periodo").append("<option value='0'>:: Seleccione ::</option>");
            $.each(data,function(item,value){
                opt      = document.createElement('option');
                opt.value = value.PERIODP_Codigo;
                opt.appendChild(document.createTextNode(value.PERIODC_DESCRIPCION));
                $("#periodo").append(opt);
            });
        },"json");
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
    url = base_url+"seccion/editar/e/"+codigo;
    $.post(url,dataString,function(data){
        $('#basic-modal-content').modal();
        $('#mensaje').html(data);
    });           
}

function eliminar(codigo){
    if(confirm('Esta seguro desea eliminar esta semana?')){
        dataString = "codigo="+codigo;
        url = base_url+"seccion/eliminar";
        $.post(url,dataString,function(data){
            obj = jQuery.parseJSON(data);
            if(obj){
                alert('Operacion realizada con exito');  
                url = base_url+"seccion/listar";
                location.href = url;                
            }
            else{
                alert("No se puede eliminar el registro,\nel video tiene preguntas ingresadas");
            }
        });
    }
}