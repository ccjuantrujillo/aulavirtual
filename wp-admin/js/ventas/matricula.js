jQuery(document).ready(function(){
   $("body").on("click","#buscar",function(){
        $("#form_busqueda").submit();
    });
    
    $("body").on("click","#nuevo",function(){
        dataString = "";
        url = base_url+"matricula/editar/n";
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
    
    $("body").on('click',"#ver_aula",function(){
        url = base_url+"apertura/buscar/";
        mywin = window.open("","wmatricula","width=700,height=400,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0");          
        $("#frmPersona").attr("action",url);
        $("#frmPersona").attr("target","wmatricula");
        $("#frmPersona").submit();
    });    
    
   $("body").on('change',"#local",function(){
       accion      = $("#accion").val();
       codigo      = $("#codigo").val();
       dataString  = $('#frmPersona').serialize();
       url = base_url+"matricula/editar/"+accion+"/"+codigo;
       $.post(url,dataString,function(data){
           $('#mensaje').html(data);
       });             
   });       
   
    $("body").on('change',"#ciclo",function(){
       accion      = $("#accion").val();
       codigo      = $("#codigo").val();
       dataString  = $('#frmPersona').serialize();
       url = base_url+"matricula/editar/"+accion+"/"+codigo;
       $.post(url,dataString,function(data){
           $('#mensaje').html(data);
       });             
   });  
   
   $("body").on("click",".pasar",function(e){
       return !$("#alum_total option:selected").remove().appendTo("#alum_matriculados");
   });
   
   $("body").on("click",".quitar",function(e){
       return !$("#alum_matriculados option:selected").remove().appendTo("#alum_total");
   });   
       
    $("body").on('click',"#imprimir",function(){
        codigo   = $("#codigo").val();
        url = base_url+"matricula/ver/"+codigo;
        window.open(url, this.target, 'width=800,height=400,top=150,left=200');
    });    
    
    $("body").on('click',"#cancelar",function(){
        url = base_url+"matricula/listar";
        location.href = url;
    });      
    
    $("body").on('click',"#grabar",function(){
        url        = base_url+"matricula/grabar";
        clave      = $("#clave").val();
        dataString = $('#frmPersona').serialize();
        if(clave != ""){
            $.post(url,dataString,function(data){
                if(data=="true"){
                    alert('Operacion realizada con exito');    
                    location.href = base_url+"matricula/listar";
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

    $("body").on('focus',"#fecha",function(){
         $(this).datepicker({
          dateFormat: "dd/mm/yy",
          changeYear: true,
          yearRange: "1945:2025"
         });
    }); 
	
    $("body").on('click',"#ver_alumno",function(){
        url = base_url+"alumno/buscar";
        window.open(url,"_blank","width=700,height=400,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0");          
    });   	
});

function editar(codigo){
    dataString = "codigo="+codigo;    
    url = base_url+"matricula/editar/e/"+codigo;
    $.post(url,dataString,function(data){
        $('#basic-modal-content').modal();
        $('#mensaje').html(data);
    });        
}

function eliminar(codigo){
    if(confirm('Esta seguro desea eliminar este registro?')){
        dataString = "codigo="+codigo;
        url = base_url+"matricula/eliminar";
        $.post(url,dataString,function(data){
            if(data=="true"){
                alert('Operacion realizada con exito');  
                url = base_url+"matricula/listar";
                location.href = url;
            }
            else if(data=="false"){
                alert("No se puede eliminar el registro,\nel usuario ha visualizado los videos");
            }
        });
    }
}

function selecciona_aula(codigo){
    objRes = new Object();
    objRes.apertura = codigo;
    dataString   = {objeto: JSON.stringify(objRes)};
    url    = base_url+"apertura/obtener/";
    $.post(url,dataString,function(data){
        nomper  = data.AULAC_Nombre+' '+data.TURNOC_Descripcion;
        apertura = data.APERTUP_Codigo;
        $("#nombres").val(nomper);
        $("#apertura").val(apertura);
    },"json");
}

function selecciona_alumno(codigo){
    objRes = new Object();
    objRes.alumno = codigo;
    dataString   = {objeto: JSON.stringify(objRes)};
    url    = base_url+"alumno/obtener/";
    $.post(url,dataString,function(data){
        nomper  = data.PERSC_Nombre+' '+data.PERSC_ApellidoPaterno;
        apertura = data.ALUMP_Codigo;
        $("#nombres").val(nomper);
        $("#alumno").val(apertura);
    },"json");
}