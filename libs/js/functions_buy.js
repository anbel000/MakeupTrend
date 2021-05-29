

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
                payU();
            }
            
        }else{
            if (informacion.tipoPago == "Contra Entrega") {
                console.log("ENTRO A CONTRA ENTREGA");
                respuesta = registrarVentaTemporal(informacion, 2);
                console.log(respuesta);
                if(respuesta['error'] == true){
                    swal({
                        title: "¡Error!",
                        text: respuesta['msg'],
                        type: "error",
                    });
                }else{
                    /*localStorage.removeItem("informacion");
                    response = eliminarSession();
                    swal({
                        title: "Compra Realizada",
                        text: "Tu compra ha sido registrada, te estaremos avisando cuando se realice el envio de tu pedido.",
                        type: "success",
                    }).then(function() {
                        window.location.href = "index.php";
                    });*/
                    console.log("NO VOTO ERROR");
                }
            }else{
                swal({
                    title: "¡Erro!",
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

    console.log("VA ENVIAR PETICION");
    // process the form
    
    var res = $.ajax({
        type: 'POST',
        url: 'insert_sale.php',
        data: formData,
        async: false,
        dataType: 'json',
        encode: true
    }).done(function (respuesta) {
        console.log('--->TERMINA: '+respuesta);
        //Tratamos a respuesta según sea el tipo  y la estructura               
    }).fail(function (jqXHR, textStatus) {
        alert("Falta información para registrar la venta: " + textStatus);
    }).responseText;

    return JSON.stringify(res);
}

function payU(){
    console.log("DATOS DE PAYU");
}

function eliminarSession(){
    

    /*var formData = {
        'eliminarSession': "eliminarSession"
    };

    //console.log(formData);
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
        alert("NO SE QUE PASO");
    }).responseText;
    
    return JSON.parse(res);*/
}