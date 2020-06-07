jQuery(document).ready(function(){     
    'use strict';
    var url = base_url+'ventas/actaexposicion/upload',
        uploadButton = $('<button/>').addClass('btn btn-primary').prop('disabled', true).text('Processing...').on('click', function () {
            var $this = $(this),data = $this.data();
            $this.off('click').text('Abort').on('click', function () {
                $this.remove();
                data.abort();
            });
            data.submit().always(function () {
                $this.remove();
            });
        });
        
    $("body").on('click',"#cancelar",function(){
        window.close();    
    }); 
    
    $("body").on("click",".eliminar",function(){
       var acta  = $("#acta").val();
       var curso = $("#curso").val();
       if(confirm('Esta seguro desea eliminar este registro?')){
           var coddetalle = $(this).parent().parent().attr("id");
           $(this).parent().parent().remove();
           var dataString = "codigo="+coddetalle;
           url = base_url+"ventas/actaexposicion/eliminar";
           $.post(url,dataString,function(data){
               var url2 = base_url+"ventas/actaexposicion/editar/"+acta+"/"+curso;   
               location.href = url2;
           });
       }        
    });   
    
    $("body").on("click",".editar",function(){  
       var acta  = $("#acta").val();
       var curso = $("#curso").val();
       var tr    = $(this).parent().parent();
       var n     = tr.children("td")[0].innerHTML-1;   
       var actaexposicion = $(this).parent().parent().attr("id"); 
       var url = base_url+"ventas/actaexposicion/obtener";
       var objRes = new Object();
       objRes.actaexposicion = actaexposicion;
       var dataString   = {objeto: JSON.stringify(objRes)};       
       $.post(url,dataString,function(data){
            tr.empty();
            tr.append("<td align='center'>"+(parseInt(n)+1)+"</td>");
            tr.append("<td align='center'><select name='tema["+n+"]' class='comboMedio' id='tema["+n+"]'><option>::Seleccione::</option></select></td> ");
            tr.append("<td align='center'><input type='text' class='cajaMedia' name='descripcion["+n+"]' id='descripcion["+n+"]' value='"+data.ACTAEXPOSC_Descripcion+"' readonly='readonly'></td>");
            tr.append("<td align='center'><input type='text' class='cajaMinima' name='duracion["+n+"]' id='duracion["+n+"]' value='"+data.ACTAEXPOSC_Duracion+"'></td> ");
            tr.append("<td align='center'><select name='profesor["+n+"]' id='profesor["+n+"]' class='comboMedio'><option>::Seleccione::</option></select></td>");
            tr.append("<td align='center'><img src='"+base_url+"img/adjunto.jpg' width='20px' height='20px'/></td>");
            tr.append("<td align='center'><a href='#' class='editardetalle'>Editar</a>&nbsp;<a href='#' class='eliminardetalle'>Eliminar</a></td>");       
       },"json");
     });      
    
//    $('#fileupload').fileupload({
//        url: url,
//        dataType: 'json',
//        autoUpload: false,
//        acceptFileTypes: /(\.|\/)(doc|docx|pdf|ppt|pptx)$/i,
//        maxFileSize: 9990000,
//        disableImageResize: /Android(?!.*Chrome)|Opera/
//            .test(window.navigator.userAgent),
//        previewMaxWidth: 100,
//        previewMaxHeight: 100,
//        previewCrop: true
//    }).on('fileuploadadd', function (e, data) {
//        data.context = $('<div/>').appendTo('#files');
//        $.each(data.files, function (index, file) {
//            var node = $('<p/>').append($('<span/>').text(file.name));
//            if (!index) {
//                node.append('<br>').append(uploadButton.clone(true).data(data));
//            }
//            node.appendTo(data.context);
//        });
//    }).on('fileuploadprocessalways', function (e, data){
//        var index = data.index,
//            file = data.files[index],
//            node = $(data.context.children()[index]);
//        if (file.preview) {
//            node.prepend('<br>').prepend(file.preview);
//        }
//        if (file.error) {
//            node
//                .append('<br>')
//                .append($('<span class="text-danger"/>').text(file.error));
//        }
//        if (index + 1 === data.files.length) {
//            data.context.find('button')
//                .text('Upload')
//                .prop('disabled', !!data.files.error);
//        }
//    }).on('fileuploadprogressall', function (e, data) {
//        var progress = parseInt(data.loaded / data.total * 100, 10);
//        $('#progress .progress-bar').css(
//            'width',
//            progress + '%'
//        );
//    }).on('fileuploaddone', function (e, data) {
//        $.each(data.result.files, function (index, file) {
//            if (file.url) {
//                var link = $('<a>')
//                    .attr('target', '_blank')
//                    .prop('href', file.url);
//                $(data.context.children()[index])
//                    .wrap(link);
//            } else if (file.error) {
//                var error = $('<span class="text-danger"/>').text(file.error);
//                $(data.context.children()[index])
//                    .append('<br>')
//                    .append(error);
//            }
//        });
//    }).on('fileuploadfail', function (e, data) {
//        $.each(data.files, function (index) {
//            var error = $('<span class="text-danger"/>').text('File upload failed.');
//            $(data.context.children()[index])
//                .append('<br>')
//                .append(error);
//        });
//    }).prop('disabled', !$.support.fileInput)
//        .parent().addClass($.support.fileInput ? undefined : 'disabled');     
});

function valida_frm_exposicion(){
    if($("#file_exposicion").val()==""){
        alert("Debe seleccionar un archivo a subir");
        return false;
    }
    else if($("#profesor").val()==0){
        alert("Debe seleccionar un profesor");
        return false;
    }
    else if($("#tema").val()==0){
        alert("Debe seleccionar un tema");
        return false;
    }
    else if($("#descripcion").val()==""){
        alert("Debe seleccionar una descripcion");
        return false;
    }  
    else if($("#duracion").val()==""){
        alert("Debe seleccionar una duracion");
        return false;
    }       
    return true;
}