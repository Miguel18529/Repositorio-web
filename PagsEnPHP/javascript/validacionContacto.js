//Función sobre la que se comprueba que los datos introducidos son validados.
function validacionGeneral(){
    
    res = true;
    return res;
}

//Función para comprobar que los datos insertados no superan el límite de la base de datos
//Actualmente en desuso debido a que hay una mejor opción y más eficiente en html
function validacionNombre(){
    nombre = document.forms["formularioContacto"]["Nombre"].value;

    if(nombre > 15){
        alert("No se puede insertar un nombre tan largo");
        return false;
    }
}

//Función para comprobar que los datos insertados no superan el límite de la base de datos
//Actualmente en desuso debido a que hay una mejor opción y más eficiente en html
function validacionPrimerApellido(){
    apellido1 = document.forms["formularioContacto"]["PrimerApellido"].value;

    if(apellido1 > 15){
        alert("El primer apellido es demasiado largo");
        return false;
    }
}

//Función para comprobar que los datos insertados no superan el límite de la base de datos
//Actualmente en desuso debido a que hay una mejor opción y más eficiente en html
function validacionSegundoApellido(){
    apellido2 = document.forms["formularioContacto"]["SegundoApellido"].value;

    if(apellido2 > 15){
        alert("El segundo apellido es demasiado largo");
        return false;
    }
}

//Función para comprobar que los datos insertados no superan el límite de la base de datos
//Actualmente en desuso debido a que hay una mejor opción y más eficiente en html
function validacionCorreo(){
    correo = document.forms["formularioContacto"]["CorreoElectronico"].value;

    if(correo > 25){
        alert("El correo electronico es demasiado largo");
        return false;
    }
}

//Función para comprobar que los datos insertados no superan el límite de la base de datos
//Actualmente en desuso debido a que hay una mejor opción y más eficiente en html
function validacionAsunto(){
    asunto = document.forms["formularioContacto"]["Asunto"].value;

    if(asunto > 100){
        alert("El asunto es demasiado largo");
        return false;
    }
}