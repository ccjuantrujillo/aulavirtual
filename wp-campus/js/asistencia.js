$(function(){
    $("#selcabasistencia").change(function(){
        var curso = $("#curso").val();
        if(this.value=="0")
            url = base_url+"asistencia/inicio/"+curso;
        else
            url = base_url+"asistencia/editar/"+curso;
        $("#frmAsistencia").attr("action",url);
        $("#frmAsistencia").submit();
    });
});