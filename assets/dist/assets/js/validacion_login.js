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
                largo = $('#username').val() +1;
                //alert(largo.length);
            }

            if ( !regex.test(key) )  
            {
                largo = $('#username').val(); 
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
            $("#username").val(rutPuntos);

           

        }
    }

    function validarRut(rut)
    {
       // var nuevoRut = '';
        //var mantiza = '';
        //var dv = '';
        //longitud = rut.length;
        rutEntero = rut;
        rutEntero = rutEntero.replace(/[\.]/g, "");

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
                toastr.error('RUN Incorrecto !!!', 'Información',
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
                $('input[id=username]').val('');
                $('input[id=username]').focus();
            }
            else
            {
                //////////
                //alert(rutEntero);
                if(rutEntero) 
                { 
                    $.ajax({
                        url: '/SessionController/verificaExistencia/'+rutEntero,
                        type: "GET",
                        dataType: "json",
                        success:function(rut_existe) 
                        { 
                            $.each(rut_existe, function(key, value) 
                            { 
                                if(value.TOTAL == 0)
                                {
                                    toastr.info('El RUN ingresado no esta registrado !!!', 'Información',
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
                                    $('input[id=username]').val('');
                                    $('input[id=username]').focus();
                                }
                                else
                                {
                                    //$('#txt_fechaCreacion').val(document.getElementById('txt_fecha').value);
                                    //$('#username').val('');
                                    //habilitaCampos();
                                }
                                
                            });
                                    
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            alertModal(thrownError, 'Error de conexion');
                        }
                                            
                    });
                }
                /////////
            }

        }
    }