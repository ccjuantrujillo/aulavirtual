jQuery(document).ready(function(){
    $("#nuevo").click(function(){
        dataString = "";
        url = base_url+"alumno/editar/n";
        $.post(url,dataString,function(data){
            $('#basic-modal-content').modal();
            $('#mensaje').html(data);
        });             
        
    });
    
   $("body").on("click",".editar",function(){
        codigo = $(this).parent().parent().attr("id");
        dataString = "codigo="+codigo;
        url = base_url+"alumno/editar/e/"+codigo;
        $.post(url,dataString,function(data){
            $('#basic-modal-content').modal();
            $('#mensaje').html(data);
        }); 
    });   
    
   $("body").on("click",".eliminar",function(){
        codigo = $(this).parent().parent().attr("id");
        if(confirm('Esta seguro desea eliminar este alumno?')){
            dataString = "codigo="+codigo;
            url = base_url+"alumno/eliminar";
            $.post(url,dataString,function(data){
                if(data=="true"){
                    alert("El alumno se borro correctamente");
                    url = base_url+"alumno/listar";
                    location.href = url;                
                }
                else{
                    alert("No es posible eliminar a este alumno,\n esta matriculado en al menos 1 curso");
                }
            });
        }        
    });       
    
    $('body').on('click',"#cancelar",function(){
        url = base_url+"alumno/listar";
        location.href = url;
    });        
    
    $("body").on('click',"#grabar",function(){
        url = base_url+"alumno/grabar";
        dataString  = $('#frmPersona').serialize();
        $.post(url,dataString,function(data){
            alert('Operacion realizada con exito');
            location.href = base_url+"alumno/listar";
        });
    }); 
    
  $("body").on('focus',"#fnacimiento",function(){
       $(this).datepicker({
        dateFormat: "dd/mm/yy",
        changeYear: true,
        yearRange: "1945:2025" 
       });
  });    
});

function editar(codigo){
    dataString = "codigo="+codigo;    
    url = base_url+"alumno/editar/e/"+codigo;
    $.post(url,dataString,function(data){
        $('#basic-modal-content').modal();
        $('#mensaje').html(data);
    });     
}

function eliminar(codigo){
    if(confirm('Esta seguro desea eliminar este alumno?')){
        dataString = "codigo="+codigo;
        url = base_url+"alumno/eliminar";
        $.post(url,dataString,function(data){
            if(data=="true"){
                alert("El alumno se borro correctamente");
                url = base_url+"alumno/listar";
                location.href = url;                
            }
            else{
                alert("No es posible eliminar a este alumno,\n esta matriculado en al menos 1 curso");
            }
        });
    }
}

function abrir_formulario_ubigeo(){
	ubigeo = $("#cboNacimiento").val();
	url = base_url+"maestros/ubigeo/formulario_ubigeo/"+ubigeo;
	window.open(url,'Formulario Ubigeo','menubar=no,resizable=no,width=200,height=180');
}

function selecciona_alumno(codigo){
    window.opener.selecciona_alumno(codigo); 
    window.close();
}
