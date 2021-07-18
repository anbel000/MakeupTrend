

function pagar() {
    if (document.getElementById('name_sale').value !== "" &&
        document.getElementById('cel_phone').value !== "" &&
        document.getElementById('direction').value !== "" &&
        document.getElementById('neighborhood').value !== "" &&
        document.getElementById('type_ubication').value !== "" &&
        document.getElementById('email').value !== "") {


        name_sale = document.getElementById('name_sale').value;
        cel_phone = document.getElementById('cel_phone').value;
        direction = document.getElementById('direction').value;
        neighborhood = document.getElementById('neighborhood').value;
        type_ubication = document.getElementById('type_ubication').value;
        email = document.getElementById('email').value;

        registro = registrarVentaTemporal();
        registro = JSON.parse(registro);
        if (registro['error'] == true) {
            //console.log('--', registro);
            swal({
                title: "¡Error!",
                text: registro['msg'],
                type: "error",
            });
        } else {
            if (registro['error'] == false) {
                //console.log('-->', registro);
                if (registro['tpPago'] == "PayU") {
                    payU();
                } else {
                    if (registro['subvalor'] >= 60000) {
                        emailBuyResponse = sendEmailBuy();
                        //emailBuyResponse = JSON.parse(emailBuyResponse);

                        emailAccountResponse = sendEmailAccount();
                        emailAccountResponse = JSON.parse(emailAccountResponse);
                        //console.log('-->'+emailBuyResponse)
                        if (emailAccountResponse['error'] == false) {
                            response = eliminarSession();
                            swal({
                                title: "Compra Realizada",
                                text: "Tu compra ha sido registrada, te estaremos avisando cuando se realice el envio de tu pedido. Revisa tu correo para obtener acceso al curso.",
                                type: "success",
                            }).then(function () {
                                window.location.href = "index.php";
                            });
                        } else {
                            if (emailAccountResponse['error'] == "5") {
                                response = eliminarSession();
                                swal({
                                    title: "Compra Realizada",
                                    text: "Tu compra ha sido registrada, te estaremos avisando cuando se realice el envio de tu pedido.",
                                    type: "success",
                                }).then(function () {
                                    window.location.href = "index.php";
                                });
                            } else {
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
                        emailBuyResponse = sendEmailBuy();
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
            }
        }

    } else {
        swal({
            title: "¡Error!",
            text: "Hace falta información para continuar, por favor llene todos los campos",
            type: "error",
        });
    }



    function registrarVentaTemporal() {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;


        var formData = {
            'add_sale_online': 'guardar',
            'name_sale': name_sale,
            'cel_phone': cel_phone,
            'email': email,
            'direction': direction,
            'neighborhood': neighborhood,
            'type_ubication': type_ubication,
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

    function payU() {

        refereceCode = Math.floor(Math.random() * (9999 - 1000 + 1)) + 1000;
        refereceCode = registro['idSale'] + '' + refereceCode;
        
        //“ApiKey~merchantId~referenceCode~amount~currency”. 
        firma = "4Vj8eK4rloUd272L48hsrarnUA~508029~" + refereceCode + "~" + registro['valor'] + "~COP"

        document.getElementsByName("merchantId")[0].value = 508029;
        document.getElementsByName("accountId")[0].value = 512321;
        document.getElementById("description").value = registro['descripcion'];
        document.getElementsByName("referenceCode")[0].value = refereceCode;
        document.getElementsByName("amount")[0].value = registro['valor'];
        document.getElementsByName("tax")[0].value = 0;
        document.getElementsByName("taxReturnBase")[0].value = 0;
        document.getElementsByName("currency")[0].value = "COP";
        document.getElementsByName("signature")[0].value = CryptoJS.MD5(firma);
        document.getElementsByName("test")[0].value = 1;
        document.getElementsByName("buyerEmail")[0].value = email;
        document.getElementsByName("buyerFullName")[0].value = name_sale;
        document.getElementsByName("mobilePhone")[0].value = cel_phone;


        document.getElementById("payment").click();

    }

    function sendEmailBuy() {

        var formData = {
            'sendbuy': "true",
            'email': email,
            'plantilla': "lyNewBuy.php",
            'asunto': "Detalle de tu compra",
            'nombre': name_sale,
            'descripcion': registro['descripcion'],
            'total': registro['valor']
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

    function sendEmailAccount() {

        var formData = {
            'sendaccount': "true",
            'email': email,
            'plantilla': "lyNewAccount.php",
            'asunto': "Cuenta de acceso para el curso - Makeup Trend",
            'nombre': name_sale
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
            alert("Ha ocurrido un error inesperado, no te preocupes.");
        }).responseText;

        return JSON.parse(res);


    }

}









