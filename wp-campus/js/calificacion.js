$(function(){
    $("#periodotarea").change(function(){
        var url;
        var curso = $("#curso").val();
        var txttarea = $(this).val();
        var arreglo = txttarea.split("_");
        var tarea   = arreglo[1];
        if(tarea=="0")
            url = base_url+"calificacion/inicio/"+curso;
        else
            url = base_url+"calificacion/editar/"+curso;
        $("#frmCalificacion").attr("action",url);
        $("#frmCalificacion").submit();
    });
    
    $(".clsnotas").blur(function(){
        var nota  = $(this).val();
        var calificacion = $(this).parent().parent().attr("id");
        var datos = new FormData();
        datos.append("calificacion",calificacion);
        datos.append("nota",nota);
        $.ajax({
            url:base_url+"calificacion/grabar/",
            method:"post",
            data:datos,
            contentType:false,
            processData:false,
            dataType:"json",
            success:function(data){
                //alert(data);
            },
            error:function(){
                alert("Ocurrio un error");
            }
        });
    });
});