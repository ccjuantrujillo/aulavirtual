jQuery(document).ready(function(){
   $("body").on("click","#buscar",function(){
        $("#form_busqueda").submit();
    });
    
    $("body").on("click","#nuevo",function(){
        dataString = "";
        url = base_url+"index.php/ventas/orden/editar/n";
        $.post(url,dataString,function(data){
            $('#basic-modal-content').modal();
            $('#mensaje').html(data);
        });          
    });
    
    $("body").on('click',"#generar",function(){
       curso  = $("#curso").val();
       usuario  = $("#usuario").val();
       usuario  = usuario.substring(1,3);
       ascii = "";
       for(i=0;i<usuario.length;i++){
           ascii += ""+usuario.charCodeAt(i);
       }
       $("#clave").val(curso+ascii);
    });    
    
    $("body").on('click',"#ver_cliente",function(){
        url = base_url+"index.php/ventas/cliente/buscar";
        window.open(url,"_blank","width=700,height=400,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0");          
    });    
    
    $("body").on('change',"#curso",function(){
        accion      = $("#accion").val();
        codigo      = $("#codigo").val();
        dataString  = $('#frmPersona').serialize();
        url = base_url+"index.php/ventas/orden/editar/"+accion+"/"+codigo;
        $.post(url,dataString,function(data){
            $('#mensaje').html(data);
        });             
    });       
    
    $("body").on('click',"#imprimir",function(){
        codigo   = $("#codigo").val();
        url = base_url+"index.php/ventas/orden/ver/"+codigo;
        window.open(url, this.target, 'width=800,height=400,top=150,left=200');
    });    
    
    $("body").on('click',"#cancelar",function(){
        url = base_url+"index.php/ventas/orden/listar";
        location.href = url;
    });
    
    $("body").on("click","#cerrar",function(){
        url = base_url+"index.php/inicio/index";
        location.href = url;
    });          
    
    $("body").on('click',"#grabar",function(){
        url        = base_url+"index.php/ventas/orden/grabar";
        clave      = $("#clave").val();
        dataString = $('#frmPersona').serialize();
        if(clave != ""){
            $.post(url,dataString,function(data){
                if(data=="true"){
                    alert('Operacion realizada con exito');    
                    location.href = base_url+"index.php/ventas/orden/listar";
                }
                else if(data=="false"){
                    alert('El usuario ya esta matriculado en el curso');
                }
            });            
        }
        else{
            alert("Debe escribir una clave");
        }
    }); 
    
    $("body").on("click","#logo",function(){
        url = base_url+"index.php/inicio/principal";
        location.href = url;
    });   
});

function editar(codigo){
    dataString = "codigo="+codigo;    
    url = base_url+"index.php/ventas/orden/editar/e/"+codigo;
    $.post(url,dataString,function(data){
        $('#basic-modal-content').modal();
        $('#mensaje').html(data);
    });        
}

function eliminar(codigo){
    if(confirm('Esta seguro desea eliminar este registro?')){
        dataString = "codigo="+codigo;
        url = base_url+"index.php/ventas/orden/eliminar";
        $.post(url,dataString,function(data){
            if(data=="true"){
                alert('Operacion realizada con exito');  
                url = base_url+"index.php/ventas/orden/listar";
                location.href = url;
            }
            else if(data=="false"){
                alert("No se puede eliminar el registro,\nel usuario ha visualizado los videos");
            }
        });
    }
}

function selecciona_familia(codigo){
    url    = base_url+"index.php/ventas/cliente/obtener/"+codigo;
    $.getJSON(url,function(data){
        nomper  = data.PERSC_ApellidoPaterno+' '+data.PERSC_ApellidoMaterno+' '+data.PERSC_Nombre;
        nombre  = data.PERSC_Nombre;
        usuario = nombre.substring(0,1)+data.PERSC_ApellidoPaterno;
        $("#alumno").val(codigo);
        $("#nombres").val(nomper);
        $("#usuario").val(usuario);
        $("#clave").val("");
    });
}