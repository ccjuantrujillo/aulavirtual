jQuery(document).ready(function(){
   $("body").on("click","#buscar",function(){
        $("#form_busqueda").submit();
    });
    
    $("body").on("click","#nuevo",function(){
        dataString = "";
        url = base_url+"index.php/ventas/modulo/editar/n";
        $.post(url,dataString,function(data){
            $('#basic-modal-content').modal();
            $('#mensaje').html(data);
        });          
    });
    
   $("body").on("click","#pdf",function(){
        url = base_url+"index.php/ventas/modulo/export_pdf/rpt_modulo_aulas";
        $("#frmReporte").attr("action",url);
        $("#frmReporte").attr("target","framereporte");
        $("#frmReporte").submit();
    });  
    
   $("body").on("click","#pdf_horario",function(){
        url = base_url+"index.php/ventas/modulo/export_pdf/rpt_horario_curso";
        $("#frmReporte").attr("action",url);
        $("#frmReporte").attr("target","framereporte");
        $("#frmReporte").submit();
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
        n      = $("#tabla_detalle tr").length - 1;
        fila   = "<tr>";
        fila  += "<td align='center'><input type='hidden' id='codigodetalle["+n+"]' name='codigodetalle["+n+"]' value=''>"+(parseInt(n)+1)+"</td>";
        fila  += "<td align='center' valgin='top'><select class='comboMinimo' name='dia["+n+"]' id='dia["+n+"]'><option value=''>::Seleccione::</option></select></td>";
        fila  += "<td align='center' valgin='top'><select class='comboMinimo' name='curso["+n+"]' id='curso["+n+"]'><option value=''>::Seleccione::</option></select></td>";
        fila  += "<td align='center'><input type='time' maxlength='5' class='cajaReducida' name='desde["+n+"]' id='desde["+n+"]' value='00:00'></td>";
        fila  += "<td align='center'><input type='time' maxlength='5' class='cajaReducida' name='hasta["+n+"]' id='hasta["+n+"]' value='00:00'></td>";        
        fila  += "<td align='center'><a href='#' class='editardetalle'>Editar</a>&nbsp;<a href='#' class='eliminardetalle'>Eliminar</a></td>";
        fila  += "</tr>";
        $("#tabla_detalle").append(fila);
        selectDia(n);
        selectCurso(n);
//        selectTipoEstudio(n);
//            selectLocal(n);   
    });       
    
    $("body").on('click',"#ver_profesor",function(){
        url = base_url+"index.php/ventas/profesor/buscar";
        window.open(url,"_blank","width=700,height=400,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0");          
    });
    
    $("body").on('click',"#ver_cursos",function(){
        url = base_url+"index.php/chamilo/course/buscar";
        win = window.open('',"mywin","width=900,height=400,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0");    
        $("#frmPersona").attr("action",url);
        $("#frmPersona").attr("target","mywin");
        $("#frmPersona").submit();
    });      
   
    $("body").on('change',"#ciclo",function(){
       accion      = $("#accion").val();
       codigo      = $("#codigo").val();
       dataString  = $('#frmPersona').serialize();
       url = base_url+"index.php/ventas/modulo/editar/"+accion+"/"+codigo;
       $.post(url,dataString,function(data){
           $('#mensaje').html(data);
       });             
   });   
    
    $("body").on('click',"#imprimir",function(){
        codigo   = $("#codigo").val();
        url = base_url+"index.php/ventas/modulo/ver/"+codigo;
        window.open(url, this.target, 'width=800,height=400,top=150,left=200');
    });    
    
    $("body").on('click',"#cancelar",function(){
        url = base_url+"index.php/ventas/modulo/listar";
        location.href = url;
    });
    
    $("body").on("click",".eliminar",function(){
       if(confirm('Esta seguro desea eliminar este registro?')){
            coddetalle = $(this).parent().parent().attr("id");
            dataString = "codigo="+coddetalle;
            url = base_url+"index.php/ventas/modulo/eliminar";
            $.post(url,dataString,function(data){
                if(data=="true"){
                    //alert('Operacion realizada con exito');  
                    url = base_url+"index.php/ventas/modulo/listar";
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
        url = base_url+"index.php/ventas/modulo/editar/e/"+codigo;
        $.post(url,dataString,function(data){
            $('#basic-modal-content').modal();
            $('#mensaje').html(data);
        });  
    });     
    
    $("body").on('click',"#grabar",function(){
        url        = base_url+"index.php/ventas/modulo/grabar";
        clave      = $("#clave").val();
        $('#estado').removeAttr('disabled');
        $('#ciclo').removeAttr('disabled');
        dataString = $('#frmPersona').serialize();
        if(clave != ""){
            $.post(url,dataString,function(data){
                if(data=="true"){
                    alert('Operacion realizada con exito');    
                    location.href = base_url+"index.php/ventas/modulo/listar";
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
    
   $("body").on("click",".eliminardetalle",function(){
        if(confirm('Esta seguro desea eliminar este registro?')){
            coddetalle = $(this).parent().parent().attr("id");
            dataString = "codigodetalle="+coddetalle;
            url = base_url+"index.php/ventas/modulo/eliminardetalle";
            $.post(url,dataString,function(data){
                if(data=="true"){
//                    alert('Operacion realizada con exito');  
                    accion      = $("#accion").val();
                    codigo      = $("#codigo").val();
                    dataString  = $('#frmPersona').serialize();
                    url = base_url+"index.php/ventas/modulo/editar/"+accion+"/"+codigo;
                    $.post(url,dataString,function(data2){
                        $('#mensaje').html(data2);
                    });  
                }
                else if(data=="false"){
                    alert("No se puede eliminar el registro,\nel usuario ha visualizado los videos");
                }                
            });
        }
    });   
    
    $("body").on("click",".editardetalle",function(){  
       tr = $(this).parent().parent();  
       n  = tr.children("td")[0].innerHTML - 1;        
       codigodetalle = $(this).parent().parent().attr("id"); 
       url = base_url+"index.php/ventas/modulo/obtenerdetalle";
       objRes = new Object();
       objRes.modulodetalle = codigodetalle;
       dataString   = {objeto: JSON.stringify(objRes)};       
       $.post(url,dataString,function(data){
            data = json = $.parseJSON(data); 
            tr.empty();
            tr.append("<td align='center'><input type='hidden' id='codigodetalle["+n+"]' name='codigodetalle["+n+"]' value='"+codigodetalle+"'>"+(parseInt(n)+1)+"</td>");
            tr.append("<td align='center' valgin='top'><select class='comboMinimo' name='dia["+n+"]' id='dia["+n+"]'><option value=''>::Seleccione::</option></select></td>");
            tr.append("<td align='center' valgin='top'><select class='comboMinimo' name='curso["+n+"]' id='curso["+n+"]'><option value=''>::Seleccione::</option></select></td>");
            tr.append("<td align='center'><input type='time' maxlength='5' class='cajaReducida' name='desde["+n+"]' id='desde["+n+"]' value='00:00'></td>");
            tr.append("<td align='center'><input type='time' maxlength='5' class='cajaReducida' name='hasta["+n+"]' id='hasta["+n+"]' value='00:00'></td>");
            tr.append("<td align='center'><a href='#' class='editardetalle'>Editar</a>&nbsp;<a href='#' class='eliminardetalle'>Eliminar</a></td>");       
            selectDia(n,data["MODULODETC_Dia"]);
            selectCurso(n,data["PROD_Codigo"]);
            document.getElementById("desde["+n+"]").value=data["MODULODETC_Desde"];
            document.getElementById("hasta["+n+"]").value=data["MODULODETC_Hasta"];
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

function selecciona_profesor(codigo){
    url    = base_url+"index.php/ventas/profesor/obtener/";
    objRes = new Object();
    objRes.profesor = codigo;
    dataString   = {objeto: JSON.stringify(objRes)};
    $.post(url,dataString,function(data){
        $.each(data, function(item,value){
            nomper = value.PERSC_ApellidoPaterno+' '+value.PERSC_ApellidoMaterno+' '+value.PERSC_Nombre;
            $("#profesor").val(value.PROP_Codigo);
            $("#nombres").val(nomper);
            $("#nombre_curso").val(value.PROD_Nombre);
            $("#curso").val(value.PROD_Codigo);
        });
    },"json");
}

function selecciona_curso(codigo){
    url    = base_url+"index.php/chamilo/course/obtener/";
    objRes = new Object();
    objRes.course = codigo;
    dataString   = {objeto: JSON.stringify(objRes)};
    $.post(url,dataString,function(data){
        $("#course_id").val(data.id);
        //$("#code").val(data.code);
        $("#title").val(data.title);
    },"json");
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

function selectCurso(n,valor){
    valor = (valor) ? valor : null;
    b      = "curso["+n+"]";
    select2 = document.getElementById(b);
    url    = base_url+"index.php/almacen/curso/obtener";
    objRes = new Object();
    dataString   = {objeto: JSON.stringify(objRes)};
    $.post(url,dataString,function(data){
        $.each(data, function(item,val){
            opt2       = document.createElement('option');
            opt2.value = val.PROD_Codigo;
            if(valor==val.PROD_Codigo){opt2.selected=true;}
            opt2.appendChild(document.createTextNode(val.PROD_Nombre));
            select2.appendChild(opt2);
        });        
    },"json");
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
    c      = "tipoestudiociclo["+n+"]";
    url    = base_url+"index.php/ventas/apertura/obtener";
    selectaula = document.getElementById(a);
    selectaula.options.length=0;
    objRes = new Object();
    objRes.local = idlocal;
    objRes.ciclo = $("#ciclo").val();
    objRes.tipoestudiociclo = document.getElementById(c).value;
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