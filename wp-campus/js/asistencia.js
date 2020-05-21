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
    
    $(".onoffswitch-checkbox").change(function(){
        var chk = this.checked;
        var id = $(this).parent().parent().parent().attr("id");
        var datos = new FormData();
        datos.append("id",id);
        datos.append("value",chk);
        $.ajax({
            url:base_url+"asistencia/grabar/",
            method:"post",
            data:datos,
            dataType:"json",
            contentType:false,
            processData:false,
            success:function(data){

            },
            error:function(data){
                alert("Ocurrio un error");
            }
        });
    });
});