jQuery(document).ready(function(){

    $("#nuevo").click(function(){
        dataString = "";
        url = base_url+"index.php/ciclo/editar/n";
        $.post(url,dataString,function(data){
            $('#basic-modal-content').modal();
            $('#mensaje').html(data);
        });

    });

//    $("#imprimir").click(function(){
//        codigo   = $("#codigo").val();
//        url = base_url+"index.php/ventas/cliente/ver/"+codigo;
//        window.open(url, this.target, 'width=800,height=400,top=150,left=200');
//    });

    $('body').on('click',"#cancelar",function(){
        url = base_url+"index.php/ciclo/listar";
        location.href = url;
    });

//    $("#cerrar").click(function(){
//        url = base_url+"index.php/inicio/index";
//        location.href = url;
//    });

    $("body").on('click',"#grabar",function(){
        url = base_url+"index.php/ciclo/grabar";
        dataString  = $('#frmPersona').serialize();
        $.post(url,dataString,function(data){
            alert('Operacion realizada con exito');
            location.href = base_url+"index.php/ciclo/listar";
        });
    });

    $("body").on("click","#logo",function(){
        url = base_url+"index.php/inicio/principal";
        location.href = url;
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
    url = base_url+"index.php/ciclo/editar/e/"+codigo;
    $.post(url,dataString,function(data){
        $('#basic-modal-content').modal();
        $('#mensaje').html(data);
    });
}

function eliminar(codigo){
    if(confirm('Esta seguro desea eliminar este ciclo?')){
        dataString = "codigo="+codigo;
        url = base_url+"index.php/ciclo/eliminar";
        $.post(url,dataString,function(data){
//            if(data=="true"){
                alert("El ciclo se borro correctamente");
                url = base_url+"index.php/ciclo/listar";
                location.href = url;
//            }
//            else{
//                alert("No es posible eliminar a este alumno,\n esta matriculado en al menos 1 curso");
//            }
        });
    }
}