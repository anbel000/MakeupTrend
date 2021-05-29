
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
            console.log(respuesta['msg']);
            alert(respuesta['msg']);
        } else {
            console.log(respuesta['msg']);
            alert(respuesta['msg']);
            location.reload();
        }

        //Tratamos a respuesta según sea el tipo  y la estructura               
    }).fail(function (jqXHR, textStatus) {
        alert("Falta información para registrar la venta");
    });


}

function actualizarVenta() {

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
        'direction': $('[name="direction"]')[0].value,
        'neighborhood': $('[name="neighborhood"]')[0].value,
        'type_ubication': $('[name="type_ubication"]')[0].value,
        'payment_method': $('[name="payment_method"]')[0].value,
        'state': $('[name="state"]')[0].value,
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
            console.log(respuesta['msg']);
            alert(respuesta['msg']);
            location.reload();
        }
        //Tratamos a respuesta según sea el tipo  y la estructura               
    }).fail(function (jqXHR, textStatus) {
        alert("Falta información para actualizar la venta" + textStatus);
    });


}