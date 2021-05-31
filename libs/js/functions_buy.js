if(localStorage.getItem('informacion')){

}else{
    window.location.replace("index.php");
}

function pagar(){
    if (document.getElementById('name_sale').value !== "" &&
        document.getElementById('cel_phone').value !== "" &&
        document.getElementById('direction').value !== "" &&
        document.getElementById('neighborhood').value !== "" &&
        document.getElementById('type_ubication').value !== "" &&
        document.getElementById('email').value !== "") {


        var datos = localStorage.getItem('informacion');
        informacion = JSON.parse(datos);
        
        

        //console.log(informacion);
        if(informacion.tipoPago == "PayU"){
            console.log("ENTRO A PAYU");
            respuesta = registrarVentaTemporal(informacion, 3);
            
            if(respuesta['error'] == true){
                swal({
                    title: "¡Error!",
                    text: respuesta['msg'],
                    type: "error",
                });
            }else{
                payU(informacion);
            }
            
        }else{
            if (informacion.tipoPago == "Contra Entrega") {
                respuesta = registrarVentaTemporal(informacion, 2);
                if(respuesta['error'] == true){
                    swal({
                        title: "¡Error!",
                        text: respuesta['msg'],
                        type: "error",
                    });
                }else{
                    localStorage.removeItem("informacion");
                    response = eliminarSession();
                    swal({
                        title: "Compra Realizada",
                        text: "Tu compra ha sido registrada, te estaremos avisando cuando se realice el envio de tu pedido.",
                        type: "success",
                    }).then(function() {
                        window.location.href = "index.php";
                    });
                }
            }else{
                swal({
                    title: "¡Error!",
                    text: "Lo sentimos, ha ocurrido un error al procesar el pedido",
                    type: "error",
                });
            }
        }
        //document.getElementsByName("")[0].value = "a lo que necesite";



    }else{
        swal({
            title: "¡Error!",
            text: "Hace falta información para continuar, por favor llene todos los campos",
            type: "error",
        });
    }
}


function registrarVentaTemporal(informacion, estado){

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
        'date': "2021-05-29"
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

    return JSON.stringify(res);
}

function payU(informacion){

    if (informacion.tipoEnvio == "Inter Rapidisimo") {
        document.getElementsByName("merchantId")[0].value = 508029;
        document.getElementsByName("accountId")[0].value = 512321;
        document.getElementById("description").value = "Productos de maquillaje"
        document.getElementsByName("referenceCode")[0].value = "PAGO01";
        document.getElementsByName("amount")[0].value = 30000;
        document.getElementsByName("tax")[0].value = 0;
        document.getElementsByName("taxReturnBase")[0].value = 0;
        document.getElementsByName("currency")[0].value = "COP";
        document.getElementsByName("signature")[0].value = "3c2d59d2395bf2e525592296f001e936";
        document.getElementsByName("test")[0].value = 1;
        document.getElementsByName("buyerEmail")[0].value = "wwandresbeltran@gmail.com";
        document.getElementsByName("buyerFullName")[0].value = "Andrés Beltrán";
        document.getElementsByName("mobilePhone")[0].value = 31231245;
        document.getElementsByName("shippingAddress")[0].value = "calle 91 n 47 - 65";
        document.getElementsByName("shippingCity")[0].value = "Bogotá";
        document.getElementsByName("shippingCountry")[0].value = "COL";
        document.getElementsByName("shippingValue")[0].value = "12000";
    
        document.getElementById("payment").click();
    }else{
        if(informacion.tipoEnvio == "A Domicilio"){
            document.getElementsByName("merchantId")[0].value = 508029;
            document.getElementsByName("accountId")[0].value = 512321;
            document.getElementById("description").value = "Productos de maquillaje"
            document.getElementsByName("referenceCode")[0].value = "PAGO01";
            document.getElementsByName("amount")[0].value = 30000;
            document.getElementsByName("tax")[0].value = 0;
            document.getElementsByName("taxReturnBase")[0].value = 0;
            document.getElementsByName("currency")[0].value = "COP";
            document.getElementsByName("signature")[0].value = "3c2d59d2395bf2e525592296f001e936";
            document.getElementsByName("test")[0].value = 1;
            document.getElementsByName("buyerEmail")[0].value = "wwandresbeltran@gmail.com";
            document.getElementsByName("buyerFullName")[0].value = "Andrés Beltrán";
            document.getElementsByName("mobilePhone")[0].value = 31231245;
            document.getElementsByName("shippingAddress")[0].value = "calle 91 n 47 - 65";
            document.getElementsByName("shippingCity")[0].value = "Bogotá";
            document.getElementsByName("shippingCountry")[0].value = "COL";
            document.getElementsByName("shippingValue")[0].value = "12000";
        
            document.getElementById("payment").click();
        }
    }
   
}

function eliminarSession(){
    

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