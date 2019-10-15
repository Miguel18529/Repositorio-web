//Función para comprobar que los datos introducidos en formulario-reserva son correctos para introducirlos en la base de datos
function validacionGeneral() {

    res = true;
    res = res && validacionFormulario();
    res = res && validacionFechas();
    res = res && validacionConfirmacionContraseña();
    return res;
}

//Comprobación de que el DNI que es introducido es correcto
function validacionFormulario() {
    var DNI = document.forms["formularioReserva"]["DNI"].value;
    var LetrasDNI = 'TRWAGMYFPDXBNJZSQVHLCKE';

    var letra = DNI.charAt(8);
    var numero = parseInt(DNI.slice(0, 8));
    if (LetrasDNI.charAt(numero % 23) != letra) {
        return false;
    } else {
        return true;
    }
}

//Comprobación de que la fecha de llegada sea anterior a la fecha de salida
function validacionFechas() {
    var fechaLLegada = new Date(document.forms["formularioReserva"]["FechaLlegada"].value);
    var fechaSalida = new Date(document.forms["formularioReserva"]["FechaSalida"].value);

    if (fechaSalida <= fechaLLegada) {
        return false;
    } else {
        return true;
    }
}

//Comprobación de que el nombre no sea demasiado largo como para introducirlo en la base de datos
//Actualmente en desuso debido a que hay una alternativa más óptima en html
function validacionNombre() {
    var nombre = document.forms["formularioReserva"]["Nombre"].value;

    if (nombre.length > 15) {
        return false;
    } else {
        return true;
    }
}

//Comprobación de que el primer apellido que se introduce en el formulario no sobrepasa el límite establecido en la base de datos
//Actualmente en desuso debido a que hay una alternativa más óptima en html
function validacionPrimerApellido() {
    var apellido1 = document.forms["formularioReserva"]["PrimerApellido"].value;

    if (apellido1.length > 15) {
        return false;
    } else {
        return true;
    }
}

//Comprobación de que el segundo apellido que se introduce en el formulario no sobrepasa el límite establecido en la base de datos
//Actualmente en desuso debido a que hay una alternativa más óptima en html
function validacionSegundoApellido() {
    var apellido2 = document.forms["formularioReserva"]["SegundoApellido"].value;

    if (apellido2.length > 15) {
        return false;
    } else {
        return true;
    }
}

//Comprobación de que la confirmación de la contraseña coincide con la contraseña escrita anteriormente
function validacionConfirmacionContraseña() {
    var contraseña = document.forms["formularioReserva"]["pass"].value;
    var confirmarContraseña = document.forms["formularioReserva"]["confirmpass"].value;

    if (contraseña != confirmarContraseña) {
        return false;

    } else {

        if (contraseña.length > 25) {
            return false;

        } else {
            var valid = true;
            var hasNumber = /\d/; var hasUpperCases = /[A-Z]/; var hasLowerCases = /[a-z]/;
            valid = valid && (contraseña.length >= 6) && (hasNumber.test(contraseña)) && (hasUpperCases.test(contraseña)) && (hasLowerCases.test(contraseña));
            if (valid == false) {
                return valid;
            } else {
                return true;
            }
        }
    }
}

//Comprobación de que la población que se introduce en el formulario no sobrepasa el límite establecido en la base de datos
//Actualmente en desuso debido a que hay una alternativa más óptima en html
function validacionPoblacion() {
    var poblacion = document.forms["formularioReserva"]["Domicilio"].value;

    if (poblacion != "") {
        if (poblacion.length > 30) {
            return false;
        } else {
            return true;
        }
    } else {
        return true;
    }
}

//Comprobación de que los correos que se introducen en el formulario no sobrepasan el límite establecido en la base de datos
//Actualmente en desuso debido a que hay una alternativa más óptima en html
function validacionCorreo() {
    var correo = document.forms["formularioReserva"]["CorreoElectronico"].value;
    var correoPadre = document.forms["formularioReserva"]["CorreoPadre"].value;

    if (correo != "" || correoPadre != "") {
        if (correo.length > 25 || correoPadre.length > 25) {
            return false;
        } else {
            return true;
        }
    } else {
        return true;
    }
}

//Función que escribe en el span de contraseña si la contraseña escrita no es suficientemente segura
function inputContraseña() {
    var contraseña = document.forms["formularioReserva"]["pass"].value;
    var hasNumber = /\d/; var hasUpperCases = /[A-Z]/; var hasLowerCases = /[a-z]/;

    if (contraseña == "") {
        document.getElementById("TextosPass").innerHTML = "";
    } else if (!hasNumber.test(contraseña)) {
        document.getElementById("TextosPass").innerHTML = "La contraseña no contiene números";
    } else if (!hasUpperCases.test(contraseña)) {
        document.getElementById("TextosPass").innerHTML = "La contraseña no contiene mayúsculas";
    } else if (!hasLowerCases.test(contraseña)) {
        document.getElementById("TextosPass").innerHTML = "La contraseña no contiene minúsculas";
    } else if (contraseña.length < 8) {
        document.getElementById("TextosPass").innerHTML = "La contraseña debe de tener almenos 8 dígitos";
    } else {
        document.getElementById("TextosPass").innerHTML = "";
    }

}

//Función que escribe en el span de DNI si el DNI introducido es válido ó no.
function inputDNI() {
    var DNI = document.forms["formularioReserva"]["DNI"].value;
    var LetrasDNI = 'TRWAGMYFPDXBNJZSQVHLCKE';
    var hasUpperCases = /[A-Z]/;


    var letra = DNI.charAt(8);
    var numero = parseInt(DNI.slice(0, 8));
    if (DNI == "") {
        document.getElementById("TextoDNI").innerHTML = "";
    } else if (!hasUpperCases.test(DNI)) {
        document.getElementById("TextoDNI").innerHTML = "Mayúscula Requerida";
    } else if (LetrasDNI.charAt(numero % 23) != letra) {
        document.getElementById("TextoDNI").innerHTML = "DNI inexistente";
    } else {
        document.getElementById("TextoDNI").innerHTML = "";
    }
}

//Función que escribe en el span de fecha de llegada si las fechas introducidas son válidas o no
function inputFechas() {
    var fechaLLegada = new Date(document.forms["formularioReserva"]["FechaLlegada"].value);
    var fechaSalida = new Date(document.forms["formularioReserva"]["FechaSalida"].value);

    if (fechaSalida <= fechaLLegada) {
        document.getElementById("textoFecha").innerHTML = "Fechas incoherentes";
    } else {
        document.getElementById("textoFecha").innerHTML = "";
    }
}

//Función que escribe en el span de confirmación de contraseña si las contraseñas escritas coinciden o no
function inputCoincidenContraseñas() {
    var contraseña = document.forms["formularioReserva"]["pass"].value;
    var confirmarContraseña = document.forms["formularioReserva"]["confirmpass"].value;

    if (confirmarContraseña == "") {
        document.getElementById("textoConfirm").innerHTML = "";
    } else if (contraseña != confirmarContraseña) {
        document.getElementById("textoConfirm").innerHTML = "Contraseña incorrecta";
    } else {
        document.getElementById("textoConfirm").innerHTML = "";
    }
}
