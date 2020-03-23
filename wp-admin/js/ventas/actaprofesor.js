jQuery(document).ready(function(){     
   $("body").on("click","#buscar",function(){
        $("#form_busqueda").submit();
    });    
    
    $("body").on('click',"#imprimir",function(){
        codigo   = $("#codigo").val();
        url = base_url+"index.php/ventas/acta/ver/"+codigo;
        window.open(url, this.target, 'width=800,height=400,top=150,left=200');
    });    
    
    $("body").on('click',"#cancelar",function(){
        if(confirm("¡Una vez salga perdera los cambios que no ha guardado!\nAsegúrese de guardar los cambios.")){
            window.close();    
        }
    });      
    
    $("body").on('click',"#importar",function(){
        url        = base_url+"index.php/ventas/profesor/obtener";
        n          = $("#table-detalle-profesor tr").length - 1;
        objeto     = new Object();
        objeto.curso = $("#curso").val();
        dataString   = {objeto:JSON.stringify(objeto)};
        fila         = "";
        $(".clsimportar").hide();
        $(".titulo").append("<span class='clsagregar'><a href='#'>Agregar profesor&nbsp;&nbsp;<img src='"+base_url+"img/botonnuevo.png'></a></span>");
        $.post(url,dataString,function(data){
            $.each(data,function(item,value){
				clase = n%2==0?'list_a':'list_b';
                fila += "<tr class='"+clase+"'>";
                fila += "<td>"+(n+1)+"<input type='hidden' id='codigo["+n+"]' name='codigo["+n+"]' value=''><input type='hidden' id='profesor["+n+"]' name='profesor["+n+"]' value='"+value.PROP_Codigo+"'></td>";
                fila += "<td>"+value.PROD_Nombre+"</td>";
                fila += "<td>"+value.PERSC_ApellidoPaterno+" "+value.PERSC_ApellidoMaterno+" "+value.PERSC_Nombre+"</td>";
                fila += "<td><input type='time' value='' id='hingreso["+n+"]' name='hingreso["+n+"]' class='cajaReducida'></td>";
                fila += "<td><input type='time' value='' id='hsalida["+n+"]' name='hsalida["+n+"]' class='cajaReducida'></td>";
                fila += "<td><input type='text' value='' id='observacion["+n+"]' name='observacion["+n+"]' class='cajaGrande'></td>";
                fila += "<td align='center'><a href='#' class='eliminar'>Eliminar</a></td>";
                fila += "<tr>";  
				n++;
            });
            $("#table-detalle-profesor").append(fila);
        },"json");            
    });     
    
    $("body").on('click',"#grabar",function(){
        acta  = $("#acta").val();
        curso = $("#curso").val();
        url   = base_url+"index.php/ventas/actaprofesor/grabar";
        dataString = $('#frmPersona').serialize();
        $.post(url,dataString,function(data){
            if(data=="true"){
                alert('Operacion realizada con exito');   
                url2  = base_url+"index.php/ventas/actaprofesor/editar/"+acta+"/"+curso;
                location.href = url2;
            }
            else if(data=="false"){
                alert('Hubo problemas con la grabación, vuelva a intentarlo.');
            }
        });            
    });          
    
    $("body").on("click",".eliminar",function(){
       if(confirm('Esta seguro desea eliminar este registro?')){
           acta  = $("#acta").val();
           curso = $("#curso").val();
           coddetalle = $(this).parent().parent().attr("id");
           $(this).parent().parent().remove();
           dataString = "codigo="+coddetalle;
           url = base_url+"index.php/ventas/actaprofesor/eliminar";
           $.post(url,dataString,function(data){
               url2 = base_url+"index.php/ventas/actaprofesor/editar/"+acta+"/"+curso;   
               location.href = url2;
           });
       }        
    });  
    
   $("body").on("click",".editar",function(){
        codigo = $(this).parent().parent().attr("id");
        dataString = "";    
        url = base_url+"index.php/ventas/acta/editar/e/"+codigo;
        $.post(url,dataString,function(data){
            $('#basic-modal-content').modal();
            $('#mensaje').html(data);
        });  
    });    
    
   $("body").on("click",".clsagregar",function(){
       nro = $("#table-detalle-profesor tr").length;
       fila  = "<tr class='list_a'>";
       fila += "<td>"+nro+"<input type='hidden' value='' id='codigo["+(nro-1)+"]' name='codigo["+(nro-1)+"]' class='cajaReducida'></td>";
       fila += "<td><select class='comboMinimo' id='curso["+(nro-1)+"]' name='curso["+(nro-1)+"]' onchange='selectProfesor("+(nro-1)+");'><option>::: Seleccionar :::</option></select></td>";
       fila += "<td><select class='comboMedio' id='profesor["+(nro-1)+"]' name='profesor["+(nro-1)+"]'><option>::: Seleccionar :::</option></select></td>";
       fila += "<td><input type='time' value='' id='hingreso["+(nro-1)+"]' name='hingreso["+(nro-1)+"]' class='cajaReducida'></td>";
       fila += "<td><input type='time' value='' id='hsalida["+(nro-1)+"]' name='hsalida["+(nro-1)+"]' class='cajaReducida'></td>";
       fila += "<td><input type='text' value='' id='observacion["+(nro-1)+"]' name='observacion["+(nro-1)+"]' class='cajaGrande'></td>";
       fila += "<td align='center'><a href='#' class='eliminar'>Eliminar</a></td>";
       fila += "</tr>";
       $("#table-detalle-profesor").append(fila);
       selectCurso(nro-1);
       selectProfesor(nro-1,0)
    });      
});

function selectCurso(n){
    b      = "curso["+n+"]";
    url    = base_url+"index.php/almacen/curso/obtener";
    select_b = document.getElementById(b);
    objRes = new Object();
    objRes.curso = $("#curso").val();
    dataString   = {objeto: JSON.stringify(objRes)};
    $.post(url,dataString,function(data){
        $.each(data, function(item,value){
            opt       = document.createElement('option');
            opt.value = value.PROD_Codigo;
            texto     = value.PROD_Nombre;
            opt.appendChild(document.createTextNode(texto));
            select_b.appendChild(opt);
        });
    },"json");
}

function selectProfesor(n,valor){
    a = "profesor["+n+"]";
    b = "curso["+n+"]";    
    val_profe = ($.isPlainObject(valor)) ? valor["PROP_Codigo"] : null;
    val_curso = ($.isPlainObject(valor)) ? valor["PROD_Codigo"] : document.getElementById(b).value;
    select_a = document.getElementById(a);
    select_a.options.length=0;
    opt_a       = document.createElement('option');
    opt_a.value = "0";
    opt_a.appendChild(document.createTextNode("::Seleccione::"));
    select_a.appendChild(opt_a);  
    //Leo la lista de profesores
    objRes = new Object();
    objRes.curso = val_curso;
    dataString   = {objeto: JSON.stringify(objRes)};
    url    = base_url+"index.php/ventas/profesor/obtener";
    $.post(url,dataString,function(data){
        $.each(data, function(item,value){
            opt_a       = document.createElement('option');
            opt_a.value = value.PROP_Codigo;
            if(val_profe==value.PROP_Codigo){opt_a.selected=true;}
            texto     = value.PERSC_ApellidoPaterno+' '+value.PERSC_ApellidoMaterno+' '+value.PERSC_Nombre;
            opt_a.appendChild(document.createTextNode(texto));
            select_a.appendChild(opt_a);
        });
    },"json");
}