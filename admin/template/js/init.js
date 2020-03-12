(function() {    var validation = function(){        var numero = " '\\@ñÑ+-|*/°!\"#$%&/()=?¡¨*[];:_^`~¬\\,.-{}´+abcdefghijklmnopqrstuvwxyz¡¢£¤¥¦§¨©ª«¬®¯°±²³´µ¶·¸¹º»¼½¾¿ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõö÷øùúûüýþÿŒœŠšŸƒ–—‘’‚“”„†‡•…‰€™¿¡";        var solotexto = '\'\\@+-*/°!"#$%&/()=?¡¨*[];:_^`~¬\\,.-{}+|¡¢£¤¥¦§¨©ª«¬®¯°±²³µ¶·¸¹º»¼½¾¿ÀÂÃÄÅÆÇÈÊËÌÎÏÐÒÔÕÖ×ØÙÛÜÝÞßàâãäåæçèêëìîïðòôõö÷øùûüýþÿŒœŠšŸƒ–—‘’‚“”„†‡•…‰€™´¨¨';        $('#txtDni').numeric({            ichars: numero + '<>'        });        $('#txtUser,#txtApPat,#txtApMat,#txtName').alpha({            ichars: solotexto        });        $('#txtCod').alphanumeric({            ichars: solotexto        });        $('#formAcceso').validate({            rules: {                txtUser: {                    required: true                },                txtPass: {                    required: true                }            },            messages: {                txtUser: {                    required: 'Ingrese Usuario'                },                txtPass: {                    required: 'Ingrese Password'                }            },            showErrors: function(errorMap, errorList) {                var all, i, _i, _ref;                for (i = _i = 0, _ref = errorList.length; 0 <= _ref ? _i < _ref : _i > _ref; i = 0 <= _ref ? ++_i : --_i) {                    all = errorList[0].message;                }                $('.form-errors').html('');                $('.form-errors').html(all);            }        });        $('#formCuenta').validate({            rules: {                txtCod: {                    required: true                },                txtApPat: {                    required: true                },                txtApMat: {                    required: true                },                txtName: {                    required: true                },                txtAdress: {                    required: true                },                txtDni: {                    required: true,                    rangelength: [8, 8]                }            },            messages: {                txtCod: {                    required: 'Código vacio'                },                txtApPat: {                    required: 'Ingrese su apellido paterno'                },                txtApMat: {                    required: 'Ingrese su apellido materno'                },                txtName: {                    required: 'Ingrese su nombre'                },                txtAdress: {                    required: 'Ingrese su direección'                },                txtDni: {                    required: 'Ingrese su DNI',                    rangelength: 'Debe ingresar 8 dígitos'                }            },            showErrors: function(errorMap, errorList) {                var all, i, _i, _ref;                for (i = _i = 0, _ref = errorList.length; 0 <= _ref ? _i < _ref : _i > _ref; i = 0 <= _ref ? ++_i : --_i) {                    all = errorList[0].message;                }                $('.form-errors').html('');                $('.form-errors').html(all);            }        });    };        var actionButon = function(){        $(".olvido").on('click',function(){            txtUser = $("#txtUser").val();            if(txtUser==""){                alert("Ingrese su usuario para enviar la contraseña a su correo.");                }            else{                alert("Se ha enviado una nueva contraseña a su correo.");            }        });                $('.btnAceptar').on('click',function(){             if ($('#formAcceso').valid()) {                 $('#formAcceso').submit();             }else{                 console.log('no paso');             }        });             $('#btnPreguntaSiguiente').on('click',function(){            $('#preguntas').hide();            $('#final').show();        });        $('.list').on('click',function(){            var id  = $(this).attr('id');            $('.column1 a').removeClass('on');            $(this).addClass('on');            $('.tab').hide();            $('.tab'+id).show();              if(id=='0'){                $.post("view_cursos.php", function(data) {                                     $(".tab0").html(data);                });            }                        if(id=='1'){                $.post("view_micuenta.php", function(data) {                                     $(".tab1").html(data);                });            }            else if(id=='2'){                $.post("view_videos.php", function(data) {                    $(".tab2").html(data);                });            }            else if(id=='3'){                $.post("view_evaluacion.php", function(data) {                    $(".tab3").html(data);                });            }              else if(id=='4'){                $.post("view_notas.php", function(data) {                    $(".tab4").html(data);                });            }               if(id == '2'){                $(".tabCursos").toggle(500);            }else{                $(".tabCursos").slideUp(500);            }                     });               $('.tabCursos ul li a').on('click',function(){            id = $(this).attr('id');            dataString = "video="+id;             $.post("view_videos.php",dataString,function(data) {                $(".tab2").html(data);            });        });                /*Evaluacion*/        $('.btnIniciarExa').live('click',function(){            $.post("view_evaluacion_inicio.php",function(data) {                /*Habilito botones*/                $("#alternativa:checked").removeAttr('checked');                   $("#checkFinal").attr("disabled",false);                $(".clsalternativa").each(function(){                    $(this).attr("disabled",false);                });                  /*REaliuzo las acciones*/                tiempo = $("#tiempoexamen").val();                $('#counter1').countdown({until: tiempo +'m +0s',compact:true,format:'MS'});                $(".btnSguiente#adel").attr("id","adelante");                $(".timeExa").show();                 $(".btnIniciarExa").hide();            });                 });                        $('.btnSguiente').live('click',function(){             accion   = $(this).attr('id');             video    = $("#video").val();             pregunta = $("#pregunta").val();             check1   = $('#checkFinal');             alternativa = "";             envia    = false;             if(accion!=""){                if(check1.is(':checked')){                    alternativa = 'P';                    envia = true;                }                else if($("input:radio[name=alternativa]:checked").is(':checked')){                    alternativa = $("input:radio[name=alternativa]:checked").val();                    envia = true;                }                                 if(accion=="adelante" && !envia){                     alert("Tiene que seleccionar una opcion");                }                else if(accion=="adel"){                    alert("Debe presionar inciar el examen");                    envia=false;                }                else if(accion=="atras"){                    envia=true;                }              }             dataString = "video="+video+"&pregunta="+pregunta+"&alternativa="+alternativa+"&accion="+accion;              if(envia){                         $.getJSON("get_siguiente.php",dataString,function(data) {                     pregunta  = data.pregunta;                     situacion = data.situacion;                     dataString = "video="+video+"&pregunta="+pregunta;                      if(situacion==""){                        $.post("get_pregunta.php",dataString,function(data2) {                            $(".borPreg").html(data2);                        });                                              }                     else{                        $.post("view_resultado.php", function(data) {                            $(".tab3").html(data);                        });                         }                 });                                         }         });         $('#checkFinal').live('click',function(){            if($(this).is(':checked')){                $("#alternativa:checked").removeAttr('checked');                $("#alternativa").each(function(){                    $(".clsalternativa").each(function(){                        $(this).attr("disabled",true);                    });                });            }            else{                $(".clsalternativa").each(function(){                    $(this).attr("disabled",false);                });                        }        });                   $('#video').live('change',function(){            idvideo = parseInt($(this).val());            dataString = "video="+idvideo+"&pregunta=0";             $(".rowpregunta").hide();            if(idvideo!=-1){                $.getJSON("get_diasentreevaluacion.php",dataString,function(data) {                    horas     = parseInt(data.horas);                    maximo   = parseInt(data.maxintentos);                    intentos = parseInt(data.intentos);                    qpreguntas = parseInt(data.qpreguntas);                    if(qpreguntas>0){                        if(horas<=0){                            $(".rowpregunta").show();                            $.post("view_evaluacion.php",dataString,function(data) {                                $(".tab3").html(data);                            });                                             }                        else{                            alert("Puede volver a intentarlo dentro de "+Math.ceil(horas/24)+" dias,\n Tiene "+intentos+" de "+maximo+" intentos");                        }                                            }                    else{                        alert('El video aún no tiene preguntas.');                    }                });                             }        });                        /*Videos*/        $('.btnAceptar3').live('click',function(){            accion = $(this).attr('id');            video = parseFloat($("#numvideo").val());            if(accion=="adelante"){                codigo = video+1;            }            else if(accion=="atras"){                codigo = video-1;            }            dataString = "video="+codigo;             $.post("view_videos.php",dataString,function(data) {                $(".tab2").html(data);            });        });          /*Mi Cuenta*/        $('.btnAceptar2').live('click',function(){            if ($('#formCuenta').valid()) {                dataString = $('#formCuenta').serialize();                $.post("view_micuenta.php",dataString,function(){                    alert("Se guardaron los datos correctamente");                    location.href = "intranet.php";                });            }else{                console.log('no paso');            }        });        $('.btnLimpiar').live('click',function(){            location.href="intranet.php";        });                  };        var actionOnload = function(){        $('.tab').hide();        $('.tab0').show();         $('.tab0').addClass('on');        $.post("view_cursos.php", function(data) {                             $(".tab0").html(data);        });    };    $(function(){        actionOnload();        validation();        actionButon();    });}).call(this);