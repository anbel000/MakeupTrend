const formatterPeso = new Intl.NumberFormat('es-CO', {
    style: 'currency',
    currency: 'COP',
    minimumFractionDigits: 0
})

function calculo(count) {
    subTotal = 0;
    total = 0;
    for (x = 1; x <= count; x++) {
        valorProducto = document.getElementById("qty" + x).value * document.getElementById("price" + x).textContent.substr(2,);
        subTotal = parseInt(subTotal) + parseInt(valorProducto);
    }
    document.getElementById("subTotal").innerHTML = formatterPeso.format(subTotal);
    total = parseInt(subTotal) + parseInt(document.getElementById("type_send").value);
    document.getElementById("total").innerHTML = formatterPeso.format(total);
}


function quitarProducto(id) {
    var formData = {
        'id': id,
        'remove_product': "remove_product"
    };
    // process the form
    $.ajax({
        type: 'POST',
        url: 'controller_shopping_cart.php',
        data: formData,
        dataType: 'json',
        encode: true
    }).done(function (respuesta) {
        location.reload();
    })
}



/////////// CARGAR INFORMACIÓN DE SELECTS /////////


var informacion = [];
//creando los options de area
var departamentoSelect = document.getElementById('departamentos');
var ciudadesSelect = document.getElementById('ciudades');
var tipoEnvioSelect = document.getElementById('type_send');
var tipoPagoSelect = document.getElementById('tipo_pago');


//getDepCiud();

var departamentos;

var res = $.ajax({
    type: 'GET',
    url: 'https://raw.githubusercontent.com/marcovega/colombia-json/master/colombia.min.json',
    async: false,
    success: function (result) { },
    error: function (error) {
        console.log('Error: ${error}')
    }

}).responseText;

informacion = JSON.parse(res);


informacion.forEach(function (area) {

    let opcion = document.createElement('option')
    opcion.value = area.id
    opcion.text = area.departamento
    departamentoSelect.add(opcion)
});




function cargarCiudades() {

    for (i = ciudadesSelect.length - 1; i >= 0; i--) {
        ciudadesSelect.remove(i);
    }

    var ciudades = this.informacion.filter(x => {
        return x.id == parseInt(document.getElementById("departamentos").value);
    })

    let opcion2 = document.createElement('option')
    opcion2.value = ""
    opcion2.text = "Seleccione la ciudad de destino"
    ciudadesSelect.add(opcion2)

    ciudades[0].ciudades.forEach(function (area) {
        let opcion = document.createElement('option')
        opcion.value = area
        opcion.text = area
        ciudadesSelect.add(opcion)
    })


}


function cargarEnvios() {

    for (i = tipoEnvioSelect.length - 1; i >= 0; i--) {
        tipoEnvioSelect.remove(i);
    }

    let opcion3 = document.createElement('option')
    opcion3.value = ""
    opcion3.text = "Seleccione el tipo de envio"
    tipoEnvioSelect.add(opcion3)

    if (document.getElementById("ciudades").value == "Bogotá") {

        let opcion = document.createElement('option')
        opcion.value = 7000
        opcion.text = "A Domicilio"
        tipoEnvioSelect.add(opcion)

        let opcion2 = document.createElement('option')
        opcion2.value = 0
        opcion2.text = "Inter Rapidisimo"
        tipoEnvioSelect.add(opcion2)

    } else {
        let opcion = document.createElement('option')
        opcion.value = 0
        opcion.text = "Inter Rapidisimo"
        tipoEnvioSelect.add(opcion)
    }

}


function cargarPagos() {

    for (i = tipoPagoSelect.length - 1; i >= 0; i--) {
        tipoPagoSelect.remove(i);
    }

    let opcion = document.createElement('option')
    opcion.value = ""
    opcion.text = "Seleccione el tipo de pago"
    tipoPagoSelect.add(opcion)

    if (document.getElementById("type_send").value == 7000) {

        let opcion = document.createElement('option')
        opcion.value = "Contra Entrega"
        opcion.text = "Contra Entrega"
        tipoPagoSelect.add(opcion)

        let opcion2 = document.createElement('option')
        opcion2.value = "PayU"
        opcion2.text = "Pago online - PayU"
        tipoPagoSelect.add(opcion2)

    } else {
        let opcion = document.createElement('option')
        opcion.value = "PayU"
        opcion.text = "Pago online - PayU"
        tipoPagoSelect.add(opcion)
    }



}



/////////// PREPARACION DE INFORMACIÓN PARA PAGO /////////

function almacenarInfo(count) {


    if (document.getElementById('departamentos').value !== "" &&
        document.getElementById('ciudades').value !== "" &&
        document.getElementById('type_send').value !== "" &&
        document.getElementById('tipo_pago').value !== "") {


        var productos = [];

        function agregarEntrada(id_producto, qty, total, qtyProducto, nombre) {
            productos.push({
                ID: id_producto,
                Cantidad: qty,
                "Cantidad Disponible": qtyProducto,
                Total: total,
                Nombre: nombre
            });
        }

        for (x = 1; x <= count; x++) {
            agregarEntrada(document.getElementById('id' + x).value, 
            document.getElementById('qty' + x).value, 
            parseInt(document.getElementById('qty' + x).value) * parseInt(document.getElementById("price" + x).textContent.substr(2,))
            ,document.getElementById('qtyDisponible' + x).value,document.getElementById('name_product' + x).textContent);

        }
        var el = document.getElementById('departamentos');
        var text = el.options[el.selectedIndex].innerHTML;
        var el2 = document.getElementById('type_send');
        var text2 = el2.options[el2.selectedIndex].innerHTML;

        var infoVenta = {
            productos: productos,
            departamento: text,
            ciudad: document.getElementById('ciudades').value,
            tipoEnvio: text2,
            tipoPago: document.getElementById('tipo_pago').value,
            total: document.getElementById('total').textContent.substr(2,)
        }

        localStorage.setItem('informacion', JSON.stringify(infoVenta));
        window.location.replace("buy_cart.php");


    }else{
        console.log("Hace falta información para continuar");
        swal({
            title: "¡Error!",
            text: "Hace falta información para continuar",
            type: "error",
        });
    }
    

    //console.log('----->', infoVenta.productos[0]['id_producto']);

}
