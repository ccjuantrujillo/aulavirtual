(function() {    var validation = function(){        var numero = " '\\@ñÑ+-|*/°!\"#$%&/()=?¡¨*[];:_^`~¬\\,.-{}´+abcdefghijklmnopqrstuvwxyz¡¢£¤¥¦§¨©ª«¬®¯°±²³´µ¶·¸¹º»¼½¾¿ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõö÷øùúûüýþÿŒœŠšŸƒ–—‘’‚“”„†‡•…‰€™¿¡";        var solotexto = '\'\\@+-*/°!"#$%&/()=?¡¨*[];:_^`~¬\\,.-{}+|¡¢£¤¥¦§¨©ª«¬®¯°±²³µ¶·¸¹º»¼½¾¿ÀÂÃÄÅÆÇÈÊËÌÎÏÐÒÔÕÖ×ØÙÛÜÝÞßàâãäåæçèêëìîïðòôõö÷øùûüýþÿŒœŠšŸƒ–—‘’‚“”„†‡•…‰€™´¨¨';        $('#txtDni').numeric({            ichars: numero + '<>'        });        $('#txtUser,#txtApPat,#txtApMat,#txtName').alpha({            ichars: solotexto        });        $('#txtCod').alphanumeric({            ichars: solotexto        });        $('#formAcceso').validate({            rules: {                txtUser: {                    required: true                },                txtPass: {                    required: true                }            },            messages: {                txtUser: {                    required: 'Ingrese Usuario'                },                txtPass: {                    required: 'Ingrese Password'                }            },            showErrors: function(errorMap, errorList) {                var all, i, _i, _ref;                for (i = _i = 0, _ref = errorList.length; 0 <= _ref ? _i < _ref : _i > _ref; i = 0 <= _ref ? ++_i : --_i) {                    all = errorList[0].message;                }                $('.form-errors').html('');                $('.form-errors').html(all);            }        });        $('#formCuenta').validate({            rules: {                txtCod: {                    required: true                },                txtApPat: {                    required: true                },                txtApMat: {                    required: true                },                txtName: {                    required: true                },                txtAdress: {                    required: true                },                txtDni: {                    required: true,                    rangelength: [8, 8]                }            },            messages: {                txtCod: {                    required: 'Código vacio'                },                txtApPat: {                    required: 'Ingrese su apellido paterno'                },                txtApMat: {                    required: 'Ingrese su apellido materno'                },                txtName: {                    required: 'Ingrese su nombre'                },                txtAdress: {                    required: 'Ingrese su direección'                },                txtDni: {                    required: 'Ingrese su DNI',                    rangelength: 'Debe ingresar 8 dígitos'                }            },            showErrors: function(errorMap, errorList) {                var all, i, _i, _ref;                for (i = _i = 0, _ref = errorList.length; 0 <= _ref ? _i < _ref : _i > _ref; i = 0 <= _ref ? ++_i : --_i) {                    all = errorList[0].message;                }                $('.form-errors').html('');                $('.form-errors').html(all);            }        });    };        var actionButon = function(){         $('.btnAceptar').on('click',function(){             if ($('#formAcceso').valid()) {                 $('#formAcceso').submit();             }else{                 console.log('no paso');             }         });        $('.btnIniciarExa').on('click',function(){            $('.timeExa').show();        });        $('#btnPreguntaSiguiente').on('click',function(){            $('#preguntas').hide();            $('#final').show();        });        $('.list').on('click',function(){            var id  = $(this).attr('id');            $('.column1 a').removeClass('on');            $(this).addClass('on');            $('.tab').hide();            $('.tab'+id).show();                           if(id=='1'){                $.post("view_micuenta.php", function(data) {                                     $(".tab1").html(data);                });            }            else if(id=='2'){                $.post("view_videos.php", function(data) {                    $(".tab2").html(data);                });            }            else if(id=='3'){                $.post("view_evaluacion.php", function(data) {                    $(".tab3").html(data);                });            }              else if(id=='4'){                $.post("view_notas.php", function(data) {                    $(".tab4").html(data);                });            }               if(id == '2'){                $(".tabCursos").toggle(500);            }else{                $(".tabCursos").slideUp(500);            }                     });               $('.tabCursos ul li a').on('click',function(){            id = $(this).attr('id');            dataString = "video="+id;             $.post("view_videos.php",dataString,function(data) {                $(".tab2").html(data);            });        });    };        var actionOnload = function(){        $('.tab').hide();        $('.tab0').show();         $('.tab0').addClass('on');        $.post("view_cursos.php", function(data) {                             $(".tab0").html(data);        });    };    $(function(){        actionOnload();        validation();        actionButon();    });}).call(this);