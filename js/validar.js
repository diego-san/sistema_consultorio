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
    var rut;
    rut = document.getElementById("ru").value;
    if(rut != null && rut !=''){
    if (confirm("Seguro de Restablecer Contraseña") == true) {
        $.ajax({
            url: 'procesar.php',
            method: "GET",
            data: {nro: rut,tipo:2},
        })
            .done(function(data) {
                console.log("success");
                $("#mostrar").html('');
                $("#mostrar").append(data);

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
    }else{
        alert("Ingresar rut");
    }
    
}

function confimarROOT() {
    var rut;
    rut = document.getElementById("ru").value;
    if(rut != null && rut !=''){
        if (confirm("Seguro de Restablecer Contraceña") == true) {
            $.ajax({
                url: 'procesar.php',
                method: "GET",
                data: {nro: rut,tipo:3},
            })
                .done(function(data) {
                    console.log("success");
                    $("#mostrar").html('');
                    $("#mostrar").append(data);

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
    }else{
        alert("Ingresar rut");
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
                console.log("su");
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


function reserva(dia,hora,rut,tipo) {

    if (confirm("Seguro de Reservar") == true) {

        $.ajax({
            url: 'procesarreserva.php',
            method: "GET",
            data: {day: dia,rt:rut,hor:hora,ti:tipo},
        })
            .done(function(data) {
                console.log("L");
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

function reservaingreso(rut,tipo) {



        $.ajax({
            url: 'compruebareserva.php',
            method: "GET",
            data: {rt:rut,tp:tipo},
        })
            .done(function(data) {
                if (data=="true"){
                alert("Reserva Ya Registrada");
                return false;
                }else{
                    if(tipo == 10){
                        location.href= "reservaGE.php";
                    }else if(tipo ==20){
                        location.href= "reservaDEN.php";

                    }else if(tipo==30){
                        location.href= "reservaOFT.php";

                    }else if(tipo==40){
                        location.href= "reservaMEN.php";

                    }else if(tipo==50){
                        location.href= "reservaPED.php";

                    }else if(tipo==60){
                        location.href= "reservaKIN.php";

                    }else if(tipo==70){
                        location.href= "reservaMA.php";

                    }else if(tipo==80){
                        location.href= "reservaGI.php";

                    }

                }

            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });



}