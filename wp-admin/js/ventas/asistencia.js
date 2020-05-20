jQuery(document).ready(function(){
    $("#nuevo").click(function(){
        dataString = "";
        url = base_url+"index.php/asistencia/editar/n";
        $.post(url,dataString,function(data){
            $('#basic-modal-content').modal();
            $('#mensaje').html(data);
        });
    });  

    $('body').on('click',"#cancelar",function(){
        url = base_url+"index.php/asistencia/listar";
        location.href = url;
    });

    $("body").on('click',"#grabar",function(){
        url = base_url+"index.php/asistencia/grabar";
        dataString  = $('#frmPersona').serialize();
        $.post(url,dataString,function(data){
            alert('Operacion realizada con exito');
            location.href = base_url+"index.php/asistencia/listar";
        });
    });

    $("body").on("click","#logo",function(){
        url = base_url+"index.php/inicio/principal";
        location.href = url;
    });

    $("body").on('focus',"#fecha",function(){
         $(this).datepicker({
          dateFormat: "dd/mm/yy",
          changeYear: true,
          yearRange: "1945:2025"
         });
    });  
    
     $("body").on('change',"#curso",function(){
        //Cargamos el combo matricula         
        url    = base_url+"index.php/matricula/obtener/";
        objRes = new Object();
        objRes.curso = $("#curso").val();
        dataString   = {objeto: JSON.stringify(objRes)};
        $("#matricula").children().remove().end().append("<option value='0'>:: Seleccione ::</option>");
        $.post(url,dataString,function(data){
            $.each(data, function(item,value){
               opt       = document.createElement('option');
               opt.value = value.MATRICP_Codigo;
               opt.appendChild(document.createTextNode(value.PERSC_ApellidoPaterno+' '+value.PERSC_ApellidoMaterno+' '+value.PERSC_Nombre));
               $('#matricula').append(opt);
           });
       },"json");             
       //Cargamos el combo cabasistencia
        url    = base_url+"index.php/cabasistencia/obtener/";
        objRes = new Object();
        objRes.curso = $("#curso").val();
        dataString   = {objeto: JSON.stringify(objRes)};
        $("#cabasistencia").children().remove().end().append("<option value='0'>:: Seleccione ::</option>");
        $.post(url,dataString,function(data2){
            $.each(data2, function(item,value){
               opt2       = document.createElement('option');
               opt2.value = value.CABASISTP_Codigo;
               opt2.appendChild(document.createTextNode(value.CABASISTC_Fecha));
               $('#cabasistencia').append(opt2);
           });
       },"json");   
   });   
   
   $("body").on("click",".editar",function(){
        codigo = $(this).parent().parent().attr("id");
        dataString = "";    
        url = base_url+"index.php/asistencia/editar/e/"+codigo;
        $.post(url,dataString,function(data){
            $('#basic-modal-content').modal();
            $('#mensaje').html(data);
        });  
    });    
    
    $("body").on("click",".eliminar",function(){
       if(confirm('Esta seguro desea eliminar este registro?')){
            coddetalle = $(this).parent().parent().attr("id");
            dataString = "codigo="+coddetalle;
            url = base_url+"index.php/asistencia/eliminar";
            $.post(url,dataString,function(data){
                if(data=="true"){
                    url = base_url+"index.php/asistencia/listar";
                    location.href = url;
                }
                else if(data=="false"){
                    alert("No se puede eliminar el registro");
                }
            });           
       }        
    });    
    
    $("body").on('click',"#cargar",function(){
        n      = 1
        objRes = new Object();
        objRes.curso = $("#curso").val();
        objRes.fecha = $("#fecha").val();
        dataString   = {objeto: JSON.stringify(objRes)};
        url = base_url+"index.php/asistencia/obtener";
        $.post(url,dataString,function(data){
            $.each(data, function(item,value){
                fila   = "<tr>";
                fila  += "<td align='center'><input type='hidden' id='codigodetalle["+n+"]' name='codigodetalle["+n+"]' value=''>"+(parseInt(n)+1)+"</td>";
                fila  += "<td align='center' valgin='top'><select class='comboMinimo' name='dia["+n+"]' id='dia["+n+"]'><option value=''>::Seleccione::</option></select></td>";
                fila  += "<td align='center' valgin='top'><select class='comboMinimo' name='curso["+n+"]' id='curso["+n+"]'><option value=''>::Seleccione::</option></select></td>";
                fila  += "<td align='center'><input type='time' maxlength='5' class='cajaReducida' name='desde["+n+"]' id='desde["+n+"]' value='00:00'></td>";
                fila  += "<td align='center'><input type='time' maxlength='5' class='cajaReducida' name='hasta["+n+"]' id='hasta["+n+"]' value='00:00'></td>";        
                fila  += "<td align='center'><a href='#' class='editardetalle'>Editar</a>&nbsp;<a href='#' class='eliminardetalle'>Eliminar</a></td>";
                fila  += "</tr>";
                $("#tabla_detalle").append(fila); 
           });
        },"json");             
    });  
    
});
function abrir_formulario_ubigeo(){
	ubigeo = $("#cboNacimiento").val();
	url = base_url+"index.php/ubigeo/formulario_ubigeo/"+ubigeo;
	window.open(url,'Formulario Ubigeo','menubar=no,resizable=no,width=200,height=180');
}

function selecciona_familia(codigo){
    window.opener.selecciona_familia(codigo);
    window.close();
}

function selecciona_profesor(codigo){
    url    = base_url+"index.php/profesor/obtener/";
    objRes = new Object();
    objRes.profesor = codigo;
    dataString   = {objeto: JSON.stringify(objRes)};
    $.post(url,dataString,function(data){
        $.each(data, function(item,value){
            nombres = value.PERSC_Nombre+' '+value.PERSC_ApellidoPaterno+' '+value.PERSC_ApellidoMaterno;
            $("#nombres").val(nombres);            
            $("#profesor").val(value.PROP_Codigo); 
        });
    },"json");
}

function selecciona_profesor2(codigo){
    url    = base_url+"index.php/profesor/obtener/";
    objRes = new Object();
    objRes.profesor = codigo;
    dataString   = {objeto: JSON.stringify(objRes)};
    $.post(url,dataString,function(data){
        $.each(data, function(item,value){
            nomper = value.PERSC_ApellidoPaterno+' '+value.PERSC_ApellidoMaterno+' '+value.PERSC_Nombre;
            $("#reemplazo").val(value.PROP_Codigo);
            $("#nombres_reemp").val(nomper);           
        });
    },"json");
}