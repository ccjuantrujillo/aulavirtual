(function() {    var validation = function(){        var numero = " '\\@ñÑ+-|*/°!\"#$%&/()=?¡¨*[];:_^`~¬\\,.-{}´+abcdefghijklmnopqrstuvwxyz¡¢£¤¥¦§¨©ª«¬®¯°±²³´µ¶·¸¹º»¼½¾¿ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõö÷øùúûüýþÿŒœŠšŸƒ–—‘’‚“”„†‡•…‰€™¿¡";        var solotexto = '\'\\@+-*/°!"#$%&/()=?¡¨*[];:_^`~¬\\,.-{}+|¡¢£¤¥¦§¨©ª«¬®¯°±²³µ¶·¸¹º»¼½¾¿ÀÂÃÄÅÆÇÈÊËÌÎÏÐÒÔÕÖ×ØÙÛÜÝÞßàâãäåæçèêëìîïðòôõö÷øùûüýþÿŒœŠšŸƒ–—‘’‚“”„†‡•…‰€™´¨¨';        $('#txtDni').numeric({            ichars: numero + '<>'        });        $('#txtUser,#txtApPat,#txtApMat,#txtName').alpha({            ichars: solotexto        });        $('#txtCod').alphanumeric({            ichars: solotexto        });        $('#formAcceso').validate({            rules: {                txtUser: {                    required: true                },                txtPass: {                    required: true                }            },            messages: {                txtUser: {                    required: 'Ingrese Usuario'                },                txtPass: {                    required: 'Ingrese Password'                }            },            showErrors: function(errorMap, errorList) {                var all, i, _i, _ref;                for (i = _i = 0, _ref = errorList.length; 0 <= _ref ? _i < _ref : _i > _ref; i = 0 <= _ref ? ++_i : --_i) {                    all = errorList[0].message;                }                $('.form-errors').html('');                $('.form-errors').html(all);            }        });        $('#formCuenta').validate({            rules: {                txtCod: {                    required: true                },                txtApPat: {                    required: true                },                txtApMat: {                    required: true                },                txtName: {                    required: true                },                txtAdress: {                    required: true                },                txtDni: {                    required: true,                    rangelength: [8, 8]                }            },            messages: {                txtCod: {                    required: 'Código vacio'                },                txtApPat: {                    required: 'Ingrese su apellido paterno'                },                txtApMat: {                    required: 'Ingrese su apellido materno'                },                txtName: {                    required: 'Ingrese su nombre'                },                txtAdress: {                    required: 'Ingrese su direección'                },                txtDni: {                    required: 'Ingrese su DNI',                    rangelength: 'Debe ingresar 8 dígitos'                }            },            showErrors: function(errorMap, errorList) {                var all, i, _i, _ref;                for (i = _i = 0, _ref = errorList.length; 0 <= _ref ? _i < _ref : _i > _ref; i = 0 <= _ref ? ++_i : --_i) {                    all = errorList[0].message;                }                $('.form-errors').html('');                $('.form-errors').html(all);            }        });    };    var actionButon = function(){         $('.btnAceptar').on('click',function(){             if ($('#formAcceso').valid()) {                 $('#formAcceso').submit();                 //location.href = 'intranet.php'             }else{                 console.log('no paso');             }         });        $('.btnAceptar2').on('click',function(){            if ($('#formCuenta').valid()) {                $('#formCuenta').submit();            }else{                console.log('no paso');            }        });        $('.btnAceptar3').on('click',function(){            accion = $(this).attr('id');            video = parseInt($("#video").val());            if(accion=="adelante"){                codigo = video+1;            }            else if(accion=="atras"){                codigo = video-1;            }            $("#video").val(codigo)            $("#formPregunta").submit();        });        $('.btnSguiente').on('click',function(){            accion   = $(this).attr('id');            pregunta = parseInt($("#pregunta").val());            if(accion=="adelante"){                codigo = pregunta+1;            }            else if(accion=="atras"){                codigo = pregunta-1;            }            $("#pregunta").val(codigo)                $("#formPregunta").submit();            });        $('.btnLimpiar').on('click',function(){            //$('input').val('')            location.href="intranet.php";        });        $('#video').on('change',function(){            $("#formPregunta").submit();        });        $('.btnIniciarExa').on('click',function(){            $('.timeExa').show();        });        $('.column1 a').on('click',function(){            var id = $(this).attr('id');            $('.column1 a').removeClass('on');            $(this).addClass('on');            $('.tab').hide();            $('.tab'+id).show();            if(id == '2'){                $(".tabCursos").toggle(500);            }else{                $(".tabCursos").slideUp(500);            }        });        $('.tabCursos a').on('click',function(){            video = $(this).attr('id');            $("#video").val(video);            $("#formPregunta").submit();        });    };    $(function() {        validation();        actionButon();    });}).call(this);