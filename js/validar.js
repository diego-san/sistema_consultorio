function validar(){
	var pass1 , pass2;
	pass1 = document.getElementById("pass1").value;
	pass2 = document.getElementById("pass2").value;

	if (pass1 != pass2) {
		alert("contraseñas distintas");
		return false;
	}
}

function seguro(id,rut) {

    if (confirm("Seguro de Eliminar") == true) {

        $.ajax({
            url: 'procesar.php',
            method: "GET",
            data: {nro: id,r:rut},
        })
            .done(function(data) {
                console.log("success");
                location.reload(true);
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });

    } else {
        return false;
    }

}