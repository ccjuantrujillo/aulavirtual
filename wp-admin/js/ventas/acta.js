jQuery(document).ready(function(){     
   $("body").on("click","#buscar",function(){
        $("#form_busqueda").submit();
    });
    
    $("body").on("click","#nuevo",function(){
        dataString = "";
        url = base_url+"ventas/acta/editar/n";
        $.post(url,dataString,function(data){
            $('#basic-modal-content').modal();
            $('#mensaje').html(data);
        });          
    });
    
    $("body").on('click',"#agregar",function(){
        if($("#ciclo").val()==0){
            alert("Seleccinar un ciclo");
        }
        else if($("#curso").val()==0){
             alert("Seleccinar un curso");
        }
        else{
            n      = $("#tabla_detalle tr").length - 1;
            fila   = "<tr id=''>";
            fila  += "<td align='center'><input type='hidden' id='codigodetalle["+n+"]' name='codigodetalle["+n+"]' value=''>"+(parseInt(n)+1)+"</td>";
            fila  += "<td align='center'><input type='text' class='cajaMedia' name='nombre["+n+"]' id='nombre["+n+"]' value=''></td>";
            fila  += "<td align='left' valgin='top'><textarea name='acuerdo["+n+"]' id='acuerdo["+n+"]' placeholder='Acuerdos de la reunion' cols='53' rows='1'></textarea></td>";
            fila  += "<td align='center'><a href='#'>Editar</a>&nbsp;<a href='#' class='eliminardetalle'>Eliminar</a></td>";
            fila  += "</tr>";
            $("#tabla_detalle").append(fila);      
            $("#flgdetalle").val(n+1);
            document.getElementById("nombre["+n+"]").focus();
        }
    });      
    
    $("body").on('click',"#cancelar",function(){
        url = base_url+"ventas/acta/listar";
        location.href = url;
    });      
    
    $("body").on('click',"#grabar",function(){
        url        = base_url+"ventas/acta/grabar";
        $('#profesor').removeAttr('disabled');
        $('#tipoestudio').removeAttr('disabled');
        dataString = $('#frmPersona').serialize();
        if($("#ciclo").val()==0){
            alert("Debe ingresar el ciclo");
        }
        else if($("#curso").val()==0){
            alert("Debe ingresar el curso");
        }
        else if($("#tipoestudio").val()==0){
            alert("Debe ingresar el tipo de estudio");
        }
        else if($("#profesor").val()==0){
            alert("Debe seleccionar la persona que elabora el documento");
        }
        else if($("#titulo").val()==""){
            alert("Debe ingresar un titulo");
        }
        else if($("#flgdetalle").val()==0){
            alert("Debe ingresar un detalle");
        }
        else{
            $.post(url,dataString,function(data){
                if(data==true){
                    alert('Operacion realizada con exito');    
                    location.href = base_url+"ventas/acta/listar";
                }
                else if(data==false){
                    alert('El usuario ya esta actado en el curso');
                }
            },"json");  
        }
    });     
    
   $("body").on("click",".editar",function(){
        codigo = $(this).parent().parent().attr("id");
        dataString = "";    
        url = base_url+"ventas/acta/editar/e/"+codigo;
        $.post(url,dataString,function(data){
            $('#basic-modal-content').modal();
            $('#mensaje').html(data);
        });  
    });  
    
   $("body").on("click",".ver",function(){
        codigo = $(this).parent().parent().attr("id");
        url = base_url+"ventas/acta/ver/"+codigo;
        window.open(url,"_blank","width=800,height=400,top=150,left=200");
    }); 
    
    $("body").on('click',"#imprimir",function(){
        codigo   = $("#codigo").val();
        url = base_url+"ventas/acta/ver/"+codigo;
        window.open(url, this.target, 'width=800,height=400,top=150,left=200');
    });      
    
    $("body").on("click",".eliminar",function(){
       if(confirm('Esta seguro desea eliminar este registro?')){
            coddetalle = $(this).parent().parent().attr("id");
            url = base_url+"ventas/acta/eliminar";
            dataString = "codigo="+coddetalle;
            $.post(url,dataString,function(data){
                if(data==true){
                    //alert('Operacion realizada con exito');  
                    url = base_url+"ventas/acta/listar";
                    location.href = url;
                }
                else if(data==false){
                    alert("No se puede eliminar el registro");
                }
            },"json");           
       }        
    });      
    
    $("body").on('click',"#ver_asistentes",function(){
        if($('#codigo').val()!=""){
            curso = $("#curso").val();
            acta  = $("#codigo").val();
            url = base_url+"ventas/actaprofesor/editar/"+acta+"/"+curso;
            window.open(url,"_blank","width=850,height=400,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0");                      
        }
        else{
            alert("Primero debe guardar el acta");
        }
    });    
    
    $("body").on('click',"#ver_exposiciones",function(){
        if($('#codigo').val()!=""){
            curso = $("#curso").val();
            acta  = $("#codigo").val();
            url = base_url+"ventas/actaexposicion/editar/"+acta+"/"+curso;
            window.open(url,"_blank","width=850,height=400,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0");                      
        }
        else{
            alert("Primero debe guardar el acta");
        }
    });      
    
    $("body").on('change',"#ciclo",function(){
        url    = base_url+"maestros/tipoestudiociclo/obtener/";
        objRes = new Object();
        objRes.ciclo = $("#ciclo").val();
        dataString   = {objeto:JSON.stringify(objRes)};
        $("#tipoestudio").children().remove().end().append("<option value='0'>:: Seleccione ::</option>");
        $.post(url,dataString,function(data){
            $.each(data,function(item,value){
                opt      = document.createElement('option');
                opt.value = value.TIPCICLOP_Codigo;
                opt.appendChild(document.createTextNode(value.TIPC_Nombre));
                $("#tipoestudio").append(opt);
            });
        },"json");
    });
   
     $("body").on('change',"#curso",function(){
        url    = base_url+"ventas/profesor/obtener/";
        objRes = new Object();
        objRes.curso = $("#curso").val();
        objRes.flgcoordinador = 1;
        dataString   = {objeto: JSON.stringify(objRes)};
        $("#profesor").children().remove().end().append("<option value='0'>:: Seleccione ::</option>");
       $.post(url,dataString,function(data){
            $.each(data, function(item,value){
               opt       = document.createElement('option');
               opt.value = value.PROP_Codigo;
               opt.appendChild(document.createTextNode(value.PERSC_ApellidoPaterno+' '+value.PERSC_ApellidoMaterno+' '+value.PERSC_Nombre));
               $('#profesor').append(opt);
           });
       },"json");             
   }); 
        
   $("body").on("click",".eliminardetalle",function(){
        if(confirm('Esta seguro desea eliminar este registro?')){
            tr = $(this).parent().parent();
            coddetalle = tr.attr("id");
            dataString = "codigo="+coddetalle;
            url = base_url+"ventas/acta/eliminardetalle";
            if(coddetalle!=""){
                $.post(url,dataString,function(data){
                    if(data==true){  
                        tr.remove();
                    }
                    else if(data==false){
                        alert("No se puede eliminar el registro,\nel usuario ha visualizado los videos");
                    }
                },"json"); 
            }
            else{
                $(this).parent().parent().remove();
            }
        }        
    });    
    
    $("body").on("click",".editardetalle",function(){ 
        tr = $(this).parent().parent();  
        n  = tr.children("td")[0].innerHTML - 1;        
        codigodetalle = $(this).parent().parent().attr("id"); 
        url = base_url+"ventas/acta/obtenerdetalle";
        objRes = new Object();
        objRes.actadetalle = codigodetalle;
        dataString   = {objeto: JSON.stringify(objRes)}; 
        $.post(url,dataString,function(data){
            tr.empty();              
            tr.append("<td align='center'><input type='hidden' id='codigodetalle["+n+"]' name='codigodetalle["+n+"]' value='"+codigodetalle+"'>"+(parseInt(n)+1)+"</td>");
            tr.append("<td align='center'><input type='text' class='cajaMedia' name='nombre["+n+"]' id='nombre["+n+"]' value='"+data["ACTADETC_Nombre"]+"'></td>");
            tr.append("<td align='left' valgin='top'><textarea name='acuerdo["+n+"]' id='acuerdo["+n+"]' placeholder='Acuerdos de la reunion' cols='53' rows='1'>"+data["ACTADETC_Observacion"]+"</textarea></td>");
            tr.append("<td align='center'><a href='#' class='editardetalle'>Editar</a>&nbsp;<a href='#' class='eliminardetalle'>Eliminar</a></td>");
        },"json");          
     });                    
    
  $("body").on('focus',"#fecha",function(){
       $(this).datepicker({
        dateFormat: "dd/mm/yy",
        changeYear: true,
        yearRange: "1945:2025"
       });
  });  
});