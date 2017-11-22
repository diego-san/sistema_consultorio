function validar(){
	var pass1 , pass2;
	pass1 = document.getElementById("pass1").value;
	pass2 = document.getElementById("pass2").value;

	if (pass1 != pass2) {
		alert("contraseñas distintas");
		return false;
	}
}

function confimar() {
    var pass1;
    rut = document.getElementById("ru").value;
    if (confirm("Seguro de Restablecer Contraceña") == true) {
        $.ajax({
            url: 'procesar.php',
            method: "GET",
            data: {nro: rut,tipo:2},
        })
            .done(function(data) {
                console.log("success");
                $(".mostrar").html('');
                $(".mostrar").append(data);
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
    }else{
        return false;
    }
    
}

function seguro(id,rut) {

    if (confirm("Seguro de Eliminar") == true) {

        $.ajax({
            url: 'procesar.php',
            method: "GET",
            data: {nro: id,r:rut,tipo: 1},
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