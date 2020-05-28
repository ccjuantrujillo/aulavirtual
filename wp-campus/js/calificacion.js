$(function(){
    $("#tarea").change(function(){
        var url;
        var curso = $("#curso").val();
        var tarea = $(this).val();
        var arreglo = tarea.split("_");
        var periodo = arreglo[0];
        var tarea   = arreglo[1];
        if(tarea=="0")
            url = base_url+"calificacion/inicio/"+curso;
        else
            url = base_url+"calificacion/editar/"+curso;
        $("#frmCalificacion").attr("action",url);
        $("#frmCalificacion").submit();
    });
});