$(document).ready(function(){
    $("#sessionEmpresa").on("change",function(){
        var empresa = $("#sessionEmpresa").val();
	$.ajax({
            type: 'post',
            dataType: 'json',
            url: base_url + "inicio/cambiar_sesion",
            data: {"empresa": empresa},
            success: function (data) {
                    if (data.result == 'success') {
                        window.location.reload();
                    }
            }
	});
    });
});