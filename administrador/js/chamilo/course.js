jQuery(document).ready(function(){
   $("body").on("click","#buscar",function(){
        $("#form_busqueda").submit();
    });
    
    $("body").on("click","#nuevo",function(){
        dataString = "";
        url = base_url+"index.php/ventas/apertura/editar/n";
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
    
    $("body").on('click',"#agregar",function(){
        tipoestudiociclo = $("#tipoestudiociclo").val();
        aula      = $("#aula").val();
        turno     = $("#turno").val();
        ciclo     = $("#ciclo").val();
        textaula  = $("#aula option:selected").text();
        textturno = $("#turno option:selected").text();
        if(tipoestudiociclo!=0 && aula!=0 && turno!=0){
            url = base_url+"index.php/almacen/cursociclo/obtener";
            objeto = new Object();
            objeto.ciclo = ciclo;
            dataString   = {objeto: JSON.stringify(objeto)};   
            $.post(url,dataString,function(data){
                $.each(data,function(item,value){
                    txtcurso = value.PROD_Nombre;
                    codigo   = ciclo+txtcurso.substr(0,3)+textaula+textturno.substr(0,1);
                    n      = $("#tabla_detalle tr").length - 1;
                    fila   = "<tr>";
                    fila  += "<td align='center'>"+(parseInt(n)+1)+"</td>";
                    fila  += "<td align='center'><input type='hidden' id='course_id["+n+"]' name='course_id["+n+"]' value=''><input type='hidden' id='cursociclo["+n+"]' name='cursociclo["+n+"]' value='"+value.CURSOCIP_Codigo+"'><input type='text' class='cajaMedia' name='curso["+n+"]' id='curso["+n+"]' value='"+txtcurso+"' readonly='readonly'></td>";        
                    fila  += "<td align='center'><input type='text' class='cajaMinima' name='code["+n+"]' id='code["+n+"]' value='"+codigo.toUpperCase()+"' readonly='readonly'></td>";        
                    fila  += "<td align='center'><input type='text' class='cajaGrande' name='title["+n+"]' id='title["+n+"]' value='"+txtcurso+" "+textaula+" "+textturno+"'></td>";
                    fila  += "<td align='center'><input type='text' maxlength='6' class='cajaReducida' name='disk_quota["+n+"]' id='disk_quota["+n+"]' value='95.4'></td>";        
                    fila  += "<td align='center'><a href='#' class='editardetalle'>Editar</a>&nbsp;<a href='#' class='eliminardetalle'>Eliminar</a></td>";
                    fila  += "</tr>";
                    $("#tabla_detalle").append(fila);
                });
            },"json");
        }
        else{
            alert("Debe seleccionar los campos requeridos.");
        }
    });       
    
    $("body").on('click',"#ver_profesor",function(){
        url = base_url+"index.php/ventas/profesor/buscar";
        window.open(url,"_blank","width=700,height=400,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0");          
    });       
   
    $("body").on('change',"#ciclo,#local",function(){
       accion      = $("#accion").val();
       codigo      = $("#codigo").val();
       dataString  = $('#frmPersona').serialize();
       url = base_url+"index.php/ventas/apertura/editar/"+accion+"/"+codigo;
       $.post(url,dataString,function(data){
           $('#mensaje').html(data);
       });             
   });   
    
    $("body").on('click',"#imprimir",function(){
        codigo   = $("#codigo").val();
        url = base_url+"index.php/ventas/apertura/ver/"+codigo;
        window.open(url, this.target, 'width=800,height=400,top=150,left=200');
    });    
    
    $("body").on('click',"#cancelar",function(){
        url = base_url+"index.php/ventas/apertura/listar";
        location.href = url;
    });
    
    $("body").on("click",".eliminar",function(){
       if(confirm('Esta seguro desea eliminar este registro?')){
            coddetalle = $(this).parent().parent().attr("id");
            dataString = "codigo="+coddetalle;
            url = base_url+"index.php/ventas/apertura/eliminar";
            $.post(url,dataString,function(data){
                if(data=="true"){
                    //alert('Operacion realizada con exito');  
                    url = base_url+"index.php/ventas/apertura/listar";
                    location.href = url;
                }
                else if(data=="false"){
                    alert("No se puede eliminar el registro");
                }
            });           
       }        
    });             
    
   $("body").on("click",".editar",function(){
        codigo = $(this).parent().parent().attr("id");
        dataString = "codigo="+codigo;    
        url = base_url+"index.php/ventas/apertura/editar/e/"+codigo;
        $.post(url,dataString,function(data){
            $('#basic-modal-content').modal();
            $('#mensaje').html(data);
        });  
    });     
    
    $("body").on('click',"#grabar",function(){
        url        = base_url+"index.php/ventas/apertura/grabar";
        clave      = $("#clave").val();
        $('#estado').removeAttr('disabled');
        $('#ciclo').removeAttr('disabled');
        $('#local').removeAttr('disabled');
        $('#aula').removeAttr('disabled');
        $('#turno').removeAttr('disabled');
        $('#tipoestudiociclo').removeAttr('disabled');
        dataString = $('#frmPersona').serialize();
        $.post(url,dataString,function(data){
            if(data=="true"){
                alert('Operacion realizada con exito');    
                location.href = base_url+"index.php/ventas/apertura/listar";
            }
            else if(data=="false"){
                alert('El usuario ya esta matriculado en el curso');
            }
        });            
    }); 
    
   $("body").on("click",".eliminardetalle",function(){
        if(confirm('Esta seguro desea eliminar este registro?')){
            course = $(this).parent().parent().attr("id");
            dataString = "";
            url = base_url+"index.php/ventas/apertura/eliminardetalle/"+course;
            $.post(url,dataString,function(data){
//                if(data=="true"){
//                    alert('Operacion realizada con exito');  
                    accion      = $("#accion").val();
                    codigo      = $("#codigo").val();
                    dataString  = $('#frmPersona').serialize();
                    url = base_url+"index.php/ventas/apertura/editar/"+accion+"/"+codigo;
                    $.post(url,dataString,function(data2){
                        $('#mensaje').html(data2);
                    });  
//                }
//                else if(data=="false"){
//                    alert("No se puede eliminar el registro,\nel usuario ha visualizado los videos");
//                }                
            });
        }
    });   
    
    $("body").on("click",".editardetalle",function(){  
       tr = $(this).parent().parent();  
       n  = tr.children("td")[0].innerHTML-1;        
       course_id = $(this).parent().parent().attr("id"); 
       url = base_url+"index.php/ventas/apertura/obtenerdetalle";
       objRes = new Object();
       objRes.course = course_id;
       dataString   = {objeto: JSON.stringify(objRes)};       
       $.post(url,dataString,function(data){
            data = json = $.parseJSON(data); 
            tr.empty();
            tr.append("<td align='center'>"+(parseInt(n)+1)+"</td>");
            tr.append("<td align='center'><input type='hidden' id='course_id["+n+"]' name='course_id["+n+"]' value='"+course_id+"'><input type='hidden' id='cursociclo["+n+"]' name='cursociclo["+n+"]' value='"+data.CURSOCIP_Codigo+"'><input type='text' class='cajaMedia' name='curso["+n+"]' id='curso["+n+"]' value='"+data.PROD_Nombre+"' readonly='readonly'></td> ");
            tr.append("<td align='center'><input type='text' class='cajaMinima' name='code["+n+"]' id='code["+n+"]' value='"+data.code+"' readonly='readonly'></td>");
            tr.append("<td align='center'><input type='text' class='cajaGrande' name='title["+n+"]' id='title["+n+"]' value='"+data.title+"'></td> ");
            tr.append("<td align='center'><input type='text' maxlength='6' class='cajaReducida' name='disk_quota["+n+"]' id='disk_quota["+n+"]' value='"+Math.round(data.disk_quota*10/(1024*1024))/10+"'></td>");
            tr.append("<td align='center'><a href='#' class='editardetalle'>Editar</a>&nbsp;<a href='#' class='eliminardetalle'>Eliminar</a></td>");       
       });
     });   
    
    $("body").on('focus',"#fecha",function(){
         $(this).datepicker({
          dateFormat: "dd/mm/yy",
          changeYear: true,
          yearRange: "1945:2025"
         });
    });     
});

function selecciona_curso(codigo){
    window.opener.selecciona_curso(codigo); 
    window.close();
}

function selectDia(n,valor){
    valor = (valor) ? valor : null;
    a      = "dia["+n+"]";
    select = document.getElementById(a);
    dias   = ["Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado"];
    $.each(dias, function(item,value){
        opt       = document.createElement('option');
        opt.value = item;
        if(valor==item){opt.selected=true;}
        opt.appendChild(document.createTextNode(value));
        select.appendChild(opt);
    });
}

function selectTipoEstudio(n,valor){
    valor = (valor) ? valor : null;
    a      = "tipoestudiociclo["+n+"]";
    url    = base_url+"index.php/maestros/tipoestudiociclo/obtener";
    selecttipo = document.getElementById(a);
    objRes = new Object();
    objRes.ciclo = $("#ciclo").val();
    dataString   = {objeto: JSON.stringify(objRes)};
    $.post(url,dataString,function(data){
        $.each(data, function(item,value){
            opt       = document.createElement('option');
            opt.value = value.TIPCICLOP_Codigo;
            if(valor==value.TIPCICLOP_Codigo){opt.selected=true;}
            opt.appendChild(document.createTextNode(value.TIPC_Nombre));
            selecttipo.appendChild(opt);
        });
    },"json");
}

function selectLocal(n,valor){
    valor = (valor) ? valor : null;
    a      = "local["+n+"]";
    url    = base_url+"index.php/maestros/local/obtener";
    selectloc = document.getElementById(a);
    objRes = new Object();
    dataString   = {objeto: JSON.stringify(objRes)};
    $.post(url,dataString,function(data){
        $.each(data, function(item,value){
            opt       = document.createElement('option');
            opt.value = value.LOCP_Codigo;
            if(valor==value.LOCP_Codigo){opt.selected=true;}
            opt.appendChild(document.createTextNode(value.LOCC_Nombre));
            selectloc.appendChild(opt);
        });
    },"json");
}

function selectAula(n,idlocal,valor){
    valor = (valor) ? valor : null;
    idlocal = (idlocal) ? idlocal : null;
    a      = "aula["+n+"]";
    b      = "local["+n+"]";
    url    = base_url+"index.php/maestros/aula/obtener";
    selectaula = document.getElementById(a);
    selectaula.options.length=0;
    objRes = new Object();
    objRes.local = idlocal;
    dataString   = {objeto: JSON.stringify(objRes)};
    $.post(url,dataString,function(data){
        opt       = document.createElement('option');
        opt.value = 0;
        opt.appendChild(document.createTextNode("::Seleccione::"));
        selectaula.appendChild(opt);
        $.each(data, function(item,value){
            opt       = document.createElement('option');
            opt.value = value.AULAP_Codigo;
            if(valor==value.AULAP_Codigo){opt.selected=true;}
            opt.appendChild(document.createTextNode(value.AULAC_Nombre));
            selectaula.appendChild(opt);
        });
    },"json");
}