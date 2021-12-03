function soloNumeros(evt) 
        {
            var theEvent = evt || window.event;

            // Handle paste
            if (theEvent.type === 'paste') 
            {
                key = event.clipboardData.getData('text/plain');
            } else 
            {
            // Handle key press
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
            }

            var numeros = /[0-9]|[K]|[k]|\./;
            var regex = /[0-9]|\./;
            
            if ( regex.test(key) )
            {
                largo = $('#txt_run').val() +1;
            }

            if ( !regex.test(key) )  
            {
                largo = $('#txt_run').val(); 
                longitud = largo.length;
                
                if(longitud >= 9)
                {
                    
                    if( !numeros.test(key) )
                    {
                        theEvent.returnValue = false;
                        if(theEvent.preventDefault) theEvent.preventDefault();
                    }                   
                }
                else
                {
                    theEvent.returnValue = false;
                    if(theEvent.preventDefault) theEvent.preventDefault();
                }
                
            }

        }

    function formatearRut(rut) 
    {
        var actual = rut.replace(/^0+/, "");
        if (actual != '' && actual.length > 1) 
        {
            var sinPuntos = actual.replace(/\./g, "");
            var actualLimpio = sinPuntos.replace(/-/g, "");
            var inicio = actualLimpio.substring(0, actualLimpio.length - 1);
            var rutPuntos = "";
            var i = 0;
            var j = 1;
            for (i = inicio.length - 1; i >= 0; i--) 
            {
                var letra = inicio.charAt(i);
                rutPuntos = letra + rutPuntos;
                if (j % 3 == 0 && j <= inicio.length - 1) 
                {
                    rutPuntos = "." + rutPuntos;
                }
                j++;
            }
            var dv = actualLimpio.substring(actualLimpio.length - 1);
            rutPuntos = rutPuntos + "-" + dv;
            $("#txt_run").val(rutPuntos);  

        }
    }

    function permisosNotificar(email)
    {
        if(email) 
        { 
            $.ajax({
                url: '/Notificacion/verificaJefatura/'+email,
                type: "GET",
                dataType: "json",
                success:function(funcionario) 
                { 
                    if(funcionario.length < 1)
                    {
                        $('#lbl_nombre').text('');
                        toastr.info('El Email no existe en los registros <br /> Favor ingresar un Email valido  !!!', 'Información',
                        {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": true,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "4000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        })

                        limpiarCampos();
                        $('#contenedorIM').show();
                    }
                    else
                    {
                        $('#contenedorIM').hide();
                        $('#lbl_nombre').html('');
                        $.each(funcionario, function(key, value) { 
                            $('#lbl_nombre').html(value.NC);
                        });
                    }
                            
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alertModal(thrownError, 'Error de conexion');
                }
                                      
            });
        }
    }

    function validarRutFuncionario(rut)
    {
        var rutOriginal = rut;
        rutOriginal = rutOriginal.replace(/[\.]/g, "");
        rut = rut.replace(/[\.-]/g, "");
        rut = rut.toUpperCase();
        var patt = /^\d{1,8}[0-9K]$/;
        var ok = patt.test(rut);
        var cStr = rut.slice(0, -1);
        var cDig = rut.slice(-1);
        var nSum = 0;
        var nVal = 0;
        var cVal = "";
        if (ok) 
        {
            for (nMul = 2; cStr != ""; nMul = (nMul == 7) ? 2 : nMul + 1) 
            {
                nSum += Number(cStr.slice(-1)) * nMul;
                cStr = cStr.slice(0, -1);
            }
            nVal = 11 - (nSum % 11);
            switch (nVal) 
            {
                case 11:
                    cVal = "0";
                    break;
                case 10:
                    cVal = "K";
                    break;
                    default:
                    cVal = nVal.toString();
            }
            ok = cVal == cDig;
            if(ok == false)
            {
                toastr.error('Rut del Funcionario Incorrecto !!!', 'Información',
                {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "3000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                })
                $('input[id=txt_run]').val('');
                $('input[id=txt_run]').focus();
            }
            else
            {
                var stateID = rutOriginal; 
                if(stateID) 
                { 
                    $.ajax({
                        url: '/Funcionario/cargaDatosFuncionario/'+stateID,
                        type: "GET",
                        dataType: "json",
                        success:function(funcionario) 
                        { 
                            if(funcionario.length >= 1)
                            {
                                //$('#lbl_nombre').text('');
                                toastr.info('El RUN ya existe en los registros  !!!', 'Información',
                                {
                                    "closeButton": true,
                                    "debug": false,
                                    "newestOnTop": true,
                                    "progressBar": true,
                                    "positionClass": "toast-top-right",
                                    "preventDuplicates": false,
                                    "onclick": null,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "4000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                })

                                //limpiarCampos();
                                $('#txt_run').val('');
                            }
                            /*
                            else
                            {
                                $('#contenedorIM').hide();
                                $('#lbl_nombre').html('');
                                $.each(funcionario, function(key, value) { 
                                    $('#lbl_nombre').html(value.NC);
                                });
                            }
                            */
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            alertModal(thrownError, 'Error de conexion');
                        }
                                      
                    });
                }
                
            }
        }  
    }

    function validarRut(rut)
    {
        var rutOriginal = rut;
        rutOriginal = rutOriginal.replace(/[\.]/g, "");
        rut = rut.replace(/[\.-]/g, "");
        rut = rut.toUpperCase();
        var patt = /^\d{1,8}[0-9K]$/;
        var ok = patt.test(rut);
        var cStr = rut.slice(0, -1);
        var cDig = rut.slice(-1);
        var nSum = 0;
        var nVal = 0;
        var cVal = "";
        if (ok) 
        {
            for (nMul = 2; cStr != ""; nMul = (nMul == 7) ? 2 : nMul + 1) 
            {
                nSum += Number(cStr.slice(-1)) * nMul;
                cStr = cStr.slice(0, -1);
            }
            nVal = 11 - (nSum % 11);
            switch (nVal) 
            {
                case 11:
                    cVal = "0";
                    break;
                case 10:
                    cVal = "K";
                    break;
                    default:
                    cVal = nVal.toString();
            }
            ok = cVal == cDig;
            if(ok == false)
            {
                toastr.error('Rut del Funcionario Incorrecto !!!', 'Información',
                {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "3000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                })
                $('input[id=txt_run]').val('');
                $('input[id=txt_run]').focus();
            }
            else
            {
                var stateID = rutOriginal; 
                if(stateID) 
                { 
                    $.ajax({
                        url: '/Funcionario/cargaDatosFuncionario/'+stateID,
                        type: "GET",
                        dataType: "json",
                        success:function(funcionario) 
                        { 
                            if(funcionario.length < 1)
                            {
                                $('#lbl_nombre').text('');
                                toastr.info('El RUN no existe en los registros <br /> Favor ingresar campos de manualmente  !!!', 'Información',
                                {
                                    "closeButton": true,
                                    "debug": false,
                                    "newestOnTop": true,
                                    "progressBar": true,
                                    "positionClass": "toast-top-right",
                                    "preventDuplicates": false,
                                    "onclick": null,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "4000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                })

                                limpiarCampos();
                                $('#contenedorIM').show();
                            }
                            else
                            {
                                $('#contenedorIM').hide();
                                $('#lbl_nombre').html('');
                                $.each(funcionario, function(key, value) { 
                                    $('#lbl_nombre').html(value.NC);
                                });
                            }
                            
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            alertModal(thrownError, 'Error de conexion');
                        }
                                      
                    });
                }
                
            }
        }  
    }

    function limpiarCampos()
    {
        $('#txt_nombre').val('');
        $('#txt_paterno').val('');
        $('#txt_materno').val('');
        $('#cmb_cargo').prop('selectedIndex', -1);
        $('#cmb_estamento').prop('selectedIndex', -1);
        $('#cmb_calidadJuridica').prop('selectedIndex', -1);


       // $('#cmb_estamento').val( $('#cmb_estamento').prop('defaultSelected') );
       // $('select[name="cmb_estamento"]').empty();
        
    }

    function validaFuncionario()
    {
        if($('#lbl_nombre').html().length == 0)
        {
            toastr.info('RUN no registrado en la base de funcionarios !!!', 'Información',
            {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "3000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            })

            $('input[id=txt_run]').val('');
            $('input[id=txt_run]').focus();
        }
    }
    

    function mensajeSave()
    {
        
        toastr.success('Funcionario agregado !!!', 'Información',
        {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        })
        //$("#submit").prop("disabled", true);
    }

    function validaCampos()
    {
       if( ($('#txt_run').val().length > 5) && ($('#txt_nombre').val().length > 2) && ($('#txt_paterno').val().length > 2) && ($('#txt_materno').val().length > 2) && ($('#cmb_cj').val() > 0) && ($('#cmb_estamento').val() > 0) && ($('#cmb_servicio').val() > 0) && ($('#cmb_genero').val() > 0) && ($('#cmb_region').val() > 0) && ($('#cmb_comuna').val() > 0) )
       {
            $('#submit').removeAttr('disabled');
       } 
       else
       {
            $("#submit").prop("disabled", true);
       }     
    }

    function soloNumerosCuidador(evt) 
        {
            var theEvent = evt || window.event;

            // Handle paste
            if (theEvent.type === 'paste') 
            {
                key = event.clipboardData.getData('text/plain');
            } else 
            {
            // Handle key press
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
            }

            var numeros = /[0-9]|[K]|[k]|\./;
            var regex = /[0-9]|\./;
            
            if ( regex.test(key) )
            {
                largo = $('#txt_run_cuidador').val() +1;
            }

            if ( !regex.test(key) )  
            {
                largo = $('#txt_run_cuidador').val(); 
                longitud = largo.length;
                
                if(longitud >= 9)
                {
                    
                    if( !numeros.test(key) )
                    {
                        theEvent.returnValue = false;
                        if(theEvent.preventDefault) theEvent.preventDefault();
                    }                   
                }
                else
                {
                    theEvent.returnValue = false;
                    if(theEvent.preventDefault) theEvent.preventDefault();
                }
                
            }

        }

    function formatearRutCuidador(rut) 
    {
        var actual = rut.replace(/^0+/, "");
        if (actual != '' && actual.length > 1) 
        {
            var sinPuntos = actual.replace(/\./g, "");
            var actualLimpio = sinPuntos.replace(/-/g, "");
            var inicio = actualLimpio.substring(0, actualLimpio.length - 1);
            var rutPuntos = "";
            var i = 0;
            var j = 1;
            for (i = inicio.length - 1; i >= 0; i--) 
            {
                var letra = inicio.charAt(i);
                rutPuntos = letra + rutPuntos;
                if (j % 3 == 0 && j <= inicio.length - 1) 
                {
                    rutPuntos = "." + rutPuntos;
                }
                j++;
            }
            var dv = actualLimpio.substring(actualLimpio.length - 1);
            rutPuntos = rutPuntos + "-" + dv;
            $("#txt_run_cuidador").val(rutPuntos);  

        }
    }

    function validarRutCuidador(rut)
    {
        rut = rut.replace(/[\.-]/g, "");
        rut = rut.toUpperCase();
        var patt = /^\d{1,8}[0-9K]$/;
        var ok = patt.test(rut);
        var cStr = rut.slice(0, -1);
        var cDig = rut.slice(-1);
        var nSum = 0;
        var nVal = 0;
        var cVal = "";
        if (ok) 
        {
            for (nMul = 2; cStr != ""; nMul = (nMul == 7) ? 2 : nMul + 1) 
            {
                nSum += Number(cStr.slice(-1)) * nMul;
                cStr = cStr.slice(0, -1);
            }
            nVal = 11 - (nSum % 11);
            switch (nVal) 
            {
                case 11:
                    cVal = "0";
                    break;
                case 10:
                    cVal = "K";
                    break;
                    default:
                    cVal = nVal.toString();
            }
            ok = cVal == cDig;
            if(ok == false)
            {
                toastr.error('Rut del Cuidador es Incorrecto !!!', 'Información',
                {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "3000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                })
                $('input[id=txt_run_cuidador]').val('');
                $('input[id=txt_run_cuidador]').focus();
            }

        }
    }

    $(document).ready(function() 
        {
            $('select[name="cmb_region"]').on('change', function() 
            {
                var stateID = $(this).val(); 
                if(stateID) 
                { 
                    $.ajax({
                        url: '/Funcionario/cargaComunasAjax/'+stateID,
                        type: "GET",
                        dataType: "json",
                        success:function(data) 
                        { 
                            $('select[name="cmb_comuna"]').empty();
                            $('select[name="cmb_comuna"]').append('<option value="">Seleccione una comuna</option>');
                            $.each(data, function(key, value) { 
                                $('select[name="cmb_comuna"]').append('<option value="'+ value.COM_id +'">'+ value.COM_nombre +'</option>');
                            });
                            $('#cmb_comuna').selectpicker('refresh');

                            $('#cmb_comuna').on({
                                mouseenter: function() {
                                    $(this).css({"font-size": "14px"});
                                }
                            });
                        }
                        
                    });
                }
                else
                {
                    $('select[name="cmb_comuna"]').empty();
                }
            });
        });

        function validarEmail() 
        {
            var mail1 = $('#txt_email').val();
            var mail2 = $('#txt_email2').val();
            if(mail1 != mail2) 
            {
                toastr.success('Los Email no coinciden', 'Información',
                {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "3000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                })
                $('input[id=txt_email]').focus();
            }
            else
            {
                $('#submit').prop('disabled', false);
            }
        }

        function botoneria()
        {
            //document.getElementById('submit').prop("disabled", true);
            $('#submit').hide();
            $('#btnEsperar').show();
        }

        function activaNotificacion()
        {
            $('#submit').prop('disabled', false);
        }
    