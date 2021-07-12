
function suggetion() {

    $('#sug_input').keyup(function (e) {

        var formData = {
            'product_name': $('input[name=title]').val()
        };

        if (formData['product_name'].length >= 1) {

            // process the form
            $.ajax({
                type: 'POST',
                url: 'ajax.php',
                data: formData,
                dataType: 'json',
                encode: true
            })
                .done(function (data) {
                    //console.log(data);
                    $('#result').html(data).fadeIn();
                    $('#result li').click(function () {

                        $('#sug_input').val($(this).text());
                        $('#result').fadeOut(500);

                    });

                    $("#sug_input").blur(function () {
                        $("#result").fadeOut(500);
                    });

                });

        } else {

            $("#result").hide();

        };

        e.preventDefault();
    });

}
$('#sug-form').submit(function (e) {
    var formData = {
        'p_name': $('input[name=title]').val()
    };
    // process the form
    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: formData,
        dataType: 'json',
        encode: true
    })
        .done(function (data) {
            //console.log(data);
            $('#product_info').html(data).show();
            total();
            $('.datePicker').datepicker('update', new Date());

        }).fail(function () {
            $('#product_info').html(data).show();
        });
    e.preventDefault();
});
function total() {
    $('#product_info input').change(function (e) {
        var elementoCantidad = $(e.currentTarget)[0];
        var tipo = $(elementoCantidad).attr('tipo').replace(elementoCantidad.name, '');
        var precio = parseInt($('[tipo=price' + tipo + ']')[0].value);
        var cantidad = parseInt(elementoCantidad.value);
        $('[tipo=total' + tipo + ']')[0].value = precio * cantidad;
    });
}

$(document).ready(function () {

    //tooltip
    $('[data-toggle="tooltip"]').tooltip();

    $('.submenu-toggle').click(function () {
        $(this).parent().children('ul.submenu').toggle(200);
    });
    //suggetion for finding product names
    suggetion();
    // Callculate total ammont
    total();

    $('.datepicker')
        .datepicker({
            format: 'yyyy-mm-dd',
            todayHighlight: true,
            autoclose: true
        });
});

function quitar(id) {
    var formData = {
        'p_id': id
    };
    // process the form
    $.ajax({
        type: 'POST',
        url: 'ajax.php',
        data: formData,
        dataType: 'json',
        encode: true
    })
        .done(function (data) {
            //console.log(data);
            $('#product_info').html(data).show();
            total();
            $('.datePicker').datepicker('update', new Date());

        }).fail(function () {
            $('#product_info').html(data).show();
        });

}


function registrarVenta() {

    if ($('[name="state"]')[0].value == 4 || $('[name="state"]')[0].value == 5) {
        alert("La venta no puede ser registrada con ese estado");
    } else {
        var productos = $('#tablaProductos').tableToJSON({
            extractor: function (cellIndex, $cell) {
                return $cell.find('span').text() || $cell.text() || $($cell[0]).children()[0].value;
            }
        });

        var formData = {
            'productos': productos,
            'add_sale': 'guardar',
            'name_sale': $('[name="name_sale"]')[0].value,
            'cel_phone': $('[name="cel_phone"]')[0].value,
            'email': $('[name="email"]')[0].value,
            'department': $('[name="departamento"]')[0].value,
            'city': $('[name="ciudad"]')[0].value,
            'direction': $('[name="direction"]')[0].value,
            'neighborhood': $('[name="neighborhood"]')[0].value,
            'type_ubication': $('[name="type_ubication"]')[0].value,
            'payment_method': $('[name="payment_method"]')[0].value,
            'shipping_type': $('[name="tipo_envio"]')[0].value,
            'state': $('[name="state"]')[0].value,
            'shipping': $('[name="shipping"]')[0].value,
            'channel': 'Sistema',
            'date': $('[name="date"]')[0].value
        };
        // process the form
        $.ajax({
            type: 'POST',
            url: 'insert_sale.php',
            data: formData,
            dataType: 'json',
            encode: true
        }).done(function (respuesta) {
            if (respuesta['error'] == true) {
                console.log('--->', respuesta['msg']);
                alert(respuesta['msg']);
            } else {
                valorTotal = 0;
                descripcion = "";
                for (var x = 0; x < productos.length; x++) {
                    precioProducto = parseInt(productos[x]["Total"]);
                    valorTotal = valorTotal + precioProducto;

                    descripcion = descripcion + productos[x]["Cantidad"] + " " + productos[x]["Producto"] + " + ";
                }
                if ($('[name="state"]')[0].value == 1 || $('[name="state"]')[0].value == 2 || $('[name="state"]')[0].value == 3) {
                    sendEmailBuy(descripcion, valorTotal);
                    if (valorTotal >= 60000 && ($('[name="state"]')[0].value == 1 || $('[name="state"]')[0].value == 3)) {
                        emailResponse = sendEmail();
                        emailResponse = JSON.parse(emailResponse);
                        console.log('-->', emailResponse["msg"]);
                        if (emailResponse['error'] == false) {
                            alert(respuesta['msg'] + " y envio del curso exitoso");
                            location.reload();
                        } else {
                            if (emailResponse['error'] == "5") {
                                alert(respuesta['msg'] + ", este usuario ya tiene acceso al curso");
                                location.reload();
                            } else {
                                alert(respuesta['msg'] + ", pero ha ocurrido un error en el envio del curso");
                                location.reload();
                            }

                        }
                    }else{
                        alert(respuesta['msg']);
                        location.reload();
                    }
                } else {
                    alert(respuesta['msg']);
                    location.reload();
                }

            }

            //Tratamos a respuesta según sea el tipo  y la estructura               
        }).fail(function (jqXHR, textStatus) {
            alert("Falta información para registrar la venta");
        });
    }
}


function actualizarVenta() {
    if ($('[name="state"]')[0].value == 4 || $('[name="state"]')[0].value == 5) {
        alert("La venta no puede ser actualizada con ese estado");
    } else {
        var productos = $('#tablaProductos').tableToJSON({
            extractor: function (cellIndex, $cell) {
                return ($($cell[0]).children()[0] ? $($cell[0]).children()[0].value : null) || $cell.find('span').text() || $cell.text();
            }
        });

        var formData = {
            'productos': productos,
            'update_sale': 'guardar',
            'id': $('[name="id"]')[0].value,
            'name_sale': $('[name="name_sale"]')[0].value,
            'cel_phone': $('[name="cel_phone"]')[0].value,
            'email': $('[name="email"]')[0].value,
            'department': $('[name="departamento"]')[0].value,
            'city': $('[name="ciudad"]')[0].value,
            'direction': $('[name="direction"]')[0].value,
            'neighborhood': $('[name="neighborhood"]')[0].value,
            'type_ubication': $('[name="type_ubication"]')[0].value,
            'payment_method': $('[name="payment_method"]')[0].value,
            'shipping_type': $('[name="tipo_envio"]')[0].value,
            'state': $('[name="state"]')[0].value,
            'shipping': $('[name="shipping"]')[0].value,
            'date': $('[name="date"]')[0].value
        };
        // process the form
        $.ajax({
            type: 'POST',
            url: 'update_sale.php',
            data: formData,
            dataType: 'json',
            encode: true
        }).done(function (respuesta) {
            if (respuesta['error'] == true) {
                console.log(respuesta['msg']);
                alert(respuesta['msg']);
            } else {
                emailResponse = sendEmail();
                emailResponse = JSON.parse(emailResponse);
                console.log('-->', emailResponse["msg"]);
                if (emailResponse['error'] == false) {
                    alert(respuesta['msg'] + " y envio del curso exitoso");
                    location.reload();
                } else {
                    if (emailResponse['error'] == "5") {
                        alert(respuesta['msg'] + ", este usuario ya tiene acceso al curso");
                        location.reload();
                    } else {
                        alert(respuesta['msg'] + ", pero ha ocurrido un error en el envio del curso");
                        location.reload();
                    }

                }

            }
            //Tratamos a respuesta según sea el tipo  y la estructura               
        }).fail(function (jqXHR, textStatus) {
            alert("Falta información para actualizar la venta" + textStatus);
        });
    }

}


function sendEmail() {

    var formData = {
        'sendaccount': "true",
        'email': $('[name="email"]')[0].value,
        'plantilla': "lyNewAccount.php",
        'asunto': "Cuenta de acceso para el curso - Makeup Trend",
        'nombre': $('[name="name_sale"]')[0].value
    };
    // process the form

    var res = $.ajax({
        type: 'POST',
        url: 'sendemail.php',
        data: formData,
        async: false,
        dataType: 'json',
        encode: true
    }).done(function (respuesta) {
        //Tratamos a respuesta según sea el tipo  y la estructura
        result = true;
    }).fail(function (jqXHR, textStatus) {
        result = false;
        alert("Proceso dañado, elimine y reanude");
    }).responseText;
    return res;
}


function sendEmailBuy(descripcion, total) {

    var formData = {
        'sendbuy': "true",
        'email': $('[name="email"]')[0].value,
        'plantilla': "lyNewBuy.php",
        'asunto': "Compra realizada - Makeup Trend",
        'nombre': $('[name="name_sale"]')[0].value,
        'descripcion': descripcion,
        'total': total
    };
    // process the form

    var res = $.ajax({
        type: 'POST',
        url: 'sendemail.php',
        data: formData,
        async: false,
        dataType: 'json',
        encode: true
    }).done(function (respuesta) {
        //Tratamos a respuesta según sea el tipo  y la estructura
        result = true;
    }).fail(function (jqXHR, textStatus) {
        result = false;
        alert("Proceso dañado, elimine y reanude");
    }).responseText;
    return res;
}