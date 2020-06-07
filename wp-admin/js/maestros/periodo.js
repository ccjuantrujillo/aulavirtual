jQuery(document).ready(function(){
								
    $("#nuevo").click(function(){
        dataString = "";
        url = base_url+"periodo/editar/n";
        $.post(url,dataString,function(data){
            $('#basic-modal-content').modal();
            $('#mensaje').html(data);
        });

    });

    $('body').on('click',"#cancelar",function(){
        url = base_url+"periodo/listar";
        location.href = url;
    });

    $("body").on('click',"#grabar",function(){
        url = base_url+"periodo/grabar";
        dataString  = $('#frmPersona').serialize();
        $.post(url,dataString,function(data){
            alert('Operacion realizada con exito');
            location.href = base_url+"periodo/listar";
        });
    });

    $("body").on("click","#logo",function(){
        url = base_url+"inicio/principal";
        location.href = url;
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
    url = base_url+"periodo/editar/e/"+codigo;
    $.post(url,dataString,function(data){
        $('#basic-modal-content').modal();
        $('#mensaje').html(data);
    });
}

function eliminar(codigo){
    if(confirm('Esta seguro desea eliminar este periodo?')){
        dataString = "codigo="+codigo;
        url = base_url+"periodo/eliminar";
        $.post(url,dataString,function(data){
//            if(data=="true"){
                alert("El ciclo se borro correctamente");
                url = base_url+"periodo/listar";
                location.href = url;
//            }
//            else{
//                alert("No es posible eliminar a este alumno,\n esta matriculado en al menos 1 curso");
//            }
        });
    }
}