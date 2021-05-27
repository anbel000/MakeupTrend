

function pagar(){
    if (document.getElementById('name_sale').value !== "" &&
        document.getElementById('cel_phone').value !== "" &&
        document.getElementById('direction').value !== "" &&
        document.getElementById('neighborhood').value !== "" &&
        document.getElementById('type_ubication').value !== "" &&
        document.getElementById('email').value !== "") {


        var datos = localStorage.getItem('informacion');
        informacion = JSON.parse(datos);

        console.log(informacion);


    }else{
        swal({
            title: "¡Error!",
            text: "Hace falta información para continuar, por favor llene todos los campos",
            type: "error",
        });
    }
}

