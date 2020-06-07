$(function(){
    //Nuevo
    $("#nuevo").click(function(){      
        $('#basic-modal-content').modal("show");
    });
    
    //Grabar
    $(document).on("click","#grabar",function(){
        var form = $("#frmPersona")[0];
        var datos = new FormData(form);
        $.ajax({
            url:base_url+"calificacion/grabar",
            method:"post",
            data:datos,
            dataType:"json",
            contentType:false,
            processData:false,
            success:function(data){
                if(data){
                    location.href=base_url+"calificacion/listar";
                }
                else{
                    alert("No se guardo ningun registro");
                }
            },
            error:function(){
                alert("Ocurrio un error");
            }
        });
    });
    
    //Editar
    $(".editar").click(function(){
        $('#basic-modal-content').modal("show");   
        $(".contenidotabla h1").html("Editar Calificacion");
        $("#grabar").val("Actualizar");
        $("#accion").val("e");
        var id = $(this).parent().parent().attr("id");
        var datos = new FormData();
        datos.append("calificacion",id);
        $.ajax({
            url:base_url+"calificacion/editar/",
            data:datos,
            method:"post",
            dataType:"json",
            contentType:false,
            processData:false,
            success:function(data){
                $("#codigo").val(data.CALIFICAP_Codigo);
                $("#curso").val(data.CURSOP_Codigo);
                $("#puntaje").val(data.CALIFICAC_Puntaje);
                var datosCurso = new FormData();
                datosCurso.append("curso",data.CURSOP_Codigo);
                listar_alumnos(datosCurso,data.MATRICP_Codigo);
                listar_tareas(datosCurso,data.TAREAP_Codigo);                
            },
            error:function(){
                alert("Ocurrio un error");
            }
        });
    });
    
    //Eliminar
    $(".eliminar").click(function(){
        var id    = $(this).parent().parent().attr("id");
        var datos = new FormData();
        datos.append("calificacion",id);
        if(confirm("¿Esta seguro que desea eliminar este registro?")){
            $.ajax({
                url:base_url+"calificacion/eliminar",
                method:"post",
                data:datos,
                contentType:false,
                processData:false,
                success:function(data){
                    if(data){
                        location.href=base_url+"calificacion/listar";      
                    }
                    else{
                        alert("Ocurrio un error 2");
                    }
                },
                error:function(){
                    alert("Ocurrio un error");
                }
            });            
        }
    });
    
    //Cancelar
    $(document).on("click","#cancelar",function(){
       location.href = base_url+"calificacion/listar" 
    });
    
    //Cambio de curso
    $(document).on("change","#curso",function(){
        $("#matricula").children("option").remove();
        $("#matricula").append("<option value='0'>::Seleccione::</option>");
        $("#tarea").children("option").remove();
        $("#tarea").append("<option value='0'>::Seleccione::</option>");        
        var datos = new FormData();
        datos.append("curso",this.value);
        //Listar alumnos matriculados
        listar_alumnos(datos);
        //Listar tareas por curso
        listar_tareas(datos);
    })
    
    function listar_alumnos(datos,valor=''){
        $.ajax({
            url:base_url+"matricula/obtener",
            method:"post",
            data:datos,
            dataType:"json",
            contentType:false,
            processData:false,
            success:function(data){
                $.each(data,function(item,value){
                    opt = document.createElement("option");
                    opt.value = value.MATRICP_Codigo;
                    if(valor==value.MATRICP_Codigo){opt.selected=true;}
                    opt.appendChild(document.createTextNode(value.PERSC_ApellidoPaterno+' '+value.PERSC_ApellidoMaterno+' '+value.PERSC_Nombre));
                    $("#matricula").append(opt);
                });
            },
            error:function(){
                alert("Ocurrio un error");
            }
        });        
    }
    
    function listar_tareas(datos,valor=''){
        $.ajax({
            url:base_url+"tarea/obtener",
            method:"post",
            data:datos,
            dataType:"json",
            contentType:false,
            processData:false,
            success:function(data){
                $.each(data,function(item,value){
                    opt = document.createElement("option");
                    opt.value = value.TAREAP_Codigo;
                    if(valor==value.TAREAP_Codigo){opt.selected=true;}
                    opt.appendChild(document.createTextNode(value.TAREAC_Nombre));
                    $("#tarea").append(opt);
                });
            },
            error:function(){
                alert("Ocurrio un error 2");
            }
        });        
    }
});