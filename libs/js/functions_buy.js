if (localStorage.getItem('informacion')) {

} else {
    window.location.replace("index.php");
}

function pagar() {
    if (document.getElementById('name_sale').value !== "" &&
        document.getElementById('cel_phone').value !== "" &&
        document.getElementById('direction').value !== "" &&
        document.getElementById('neighborhood').value !== "" &&
        document.getElementById('type_ubication').value !== "" &&
        document.getElementById('email').value !== "") {


        var datos = localStorage.getItem('informacion');
        informacion = JSON.parse(datos);

        if (informacion == null) {
            window.location="index.php"
        }

        //console.log(informacion);
        if (informacion.tipoPago == "PayU") {
            respuesta = registrarVentaTemporal(informacion, 3);
            respuesta = JSON.parse(respuesta);
            if (respuesta['error'] == true) {
                swal({
                    title: "¡Error!",
                    text: respuesta['msg'],
                    type: "error",
                });
            } else {
                payU(informacion);
            }

        } else {
            if (informacion.tipoPago == "Contra Entrega") {
                respuesta = registrarVentaTemporal(informacion, 2);
                respuesta = JSON.parse(respuesta);
                if (respuesta['error'] == true) {
                    swal({
                        title: "¡Error!",
                        text: respuesta['msg'],
                        type: "error",
                    });
                } else {

                    if (informacion.total > 1) {
                        emailResponse = sendEmail();
                        emailResponse = JSON.parse(emailResponse);
                        if (emailResponse['error'] == false) {
                            localStorage.removeItem("informacion");
                            response = eliminarSession();
                            swal({
                                title: "Compra Realizada",
                                text: "Tu compra ha sido registrada, te estaremos avisando cuando se realice el envio de tu pedido. Revisa tu correo para obtener acceso al curso.",
                                type: "success",
                            }).then(function () {
                                window.location.href = "index.php";
                            });
                        } else {
                            if (emailResponse['error'] == "5") {
                                localStorage.removeItem("informacion");
                                response = eliminarSession();
                                swal({
                                    title: "Compra Realizada",
                                    text: "Tu compra ha sido registrada, te estaremos avisando cuando se realice el envio de tu pedido.",
                                    type: "success",
                                }).then(function () {
                                    window.location.href = "index.php";
                                });
                            } else {
                                localStorage.removeItem("informacion");
                                response = eliminarSession();
                                swal({
                                    title: "Compra Realizada",
                                    text: "Tu compra ha sido registrada, te estaremos avisando cuando se realice el envio de tu pedido. Ponte en contacto con nosotros para darte acceso al curso.",
                                    type: "success",
                                }).then(function () {
                                    window.location.href = "index.php";
                                });
                            }

                        }
                    } else {
                        localStorage.removeItem("informacion");
                        response = eliminarSession();
                        swal({
                            title: "Compra Realizada",
                            text: "Tu compra ha sido registrada, te estaremos avisando cuando se realice el envio de tu pedido.",
                            type: "success",
                        }).then(function () {
                            window.location.href = "index.php";
                        });
                    }


                }
            } else {
                swal({
                    title: "¡Error!",
                    text: "Lo sentimos, ha ocurrido un error al procesar el pedido",
                    type: "error",
                });
            }
        }

    } else {
        swal({
            title: "¡Error!",
            text: "Hace falta información para continuar, por favor llene todos los campos",
            type: "error",
        });
    }
}


function registrarVentaTemporal(informacion, estado) {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;


    var formData = {
        'productos': informacion.productos,
        'add_sale': 'guardar',
        'name_sale': document.getElementById('name_sale').value,
        'cel_phone': document.getElementById('cel_phone').value,
        'email': document.getElementById('email').value,
        'department': informacion.departamento,
        'city': informacion.ciudad,
        'direction': document.getElementById('direction').value,
        'neighborhood': document.getElementById('neighborhood').value,
        'type_ubication': document.getElementById('type_ubication').value,
        'payment_method': informacion.tipoPago,
        'shipping_type': informacion.tipoEnvio,
        'state': estado,
        'date': today
    };

    // process the form

    var res = $.ajax({
        type: 'POST',
        url: 'insert_sale.php',
        data: formData,
        async: false,
        dataType: 'json',
        encode: true
    }).done(function (respuesta) {
        //Tratamos a respuesta según sea el tipo  y la estructura               
    }).fail(function (jqXHR, textStatus) {
        alert("Falta información para registrar la venta: " + textStatus);
    }).responseText;
    return res;
    //return JSON.stringify(res);
}

function payU(informacion) {

    refereceCode = Math.floor(Math.random() * (9999 - 1000 + 1)) + 1000;
    descripcion = prepararDescripcion(informacion);
    //“ApiKey~merchantId~referenceCode~amount~currency”.
    firma = "4Vj8eK4rloUd272L48hsrarnUA~508029~" + refereceCode + "~" + informacion.total + "~COP"

    document.getElementsByName("merchantId")[0].value = 508029;
    document.getElementsByName("accountId")[0].value = 512321;
    document.getElementById("description").value = descripcion;
    document.getElementsByName("referenceCode")[0].value = refereceCode;
    document.getElementsByName("amount")[0].value = informacion.total;
    document.getElementsByName("tax")[0].value = 0;
    document.getElementsByName("taxReturnBase")[0].value = 0;
    document.getElementsByName("currency")[0].value = "COP";
    document.getElementsByName("signature")[0].value = CryptoJS.MD5(firma);
    document.getElementsByName("test")[0].value = 1;
    document.getElementsByName("buyerEmail")[0].value = document.getElementById('email').value;
    document.getElementsByName("buyerFullName")[0].value = document.getElementById('name_sale').value;
    document.getElementsByName("mobilePhone")[0].value = document.getElementById('cel_phone').value;


    document.getElementById("payment").click();

}

function eliminarSession() {


    var formData = {
        'eliminarSession': "eliminarSession"
    };
    // process the form

    var res = $.ajax({
        type: 'POST',
        url: 'add_shopping_cart.php',
        data: formData,
        async: false,
        dataType: 'json',
        encode: true
    }).done(function (respuesta) {
        //Tratamos a respuesta según sea el tipo  y la estructura               
    }).fail(function (jqXHR, textStatus) {
        alert("Ha ocurrido un error inesperado, no te preocupes. Ponte en contacto con nostros para verificar el estado de tu pedido.");
    }).responseText;

    return JSON.parse(res);


}

function prepararDescripcion(informacion) {

    var descripcion = "Usted esta realizando la compra de:";
    for (x = 0; x < informacion.productos.length; x++) {
        descripcion = descripcion + ' ' + informacion.productos[x].Cantidad + ' ' + informacion.productos[x].Nombre;
        if (x + 1 < informacion.productos.length) {
            descripcion = descripcion + ' +';
        } else {

        }
    }
    return descripcion;
}

function sendEmail() {

    var formData = {
        'sendaccount': "true",
        'email': document.getElementById('email').value,
        'plantilla': "lyNewAccount.php",
        'asunto': "Cuenta de acceso para el curso - Makeup Trend",
        'nombre': document.getElementById('name_sale').value
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
    }).responseText;
    return res;
    //return JSON.stringify(res);

}