//Función auxiliar para mostrar las fechas
function conversionFecha(){
    var fecha = new Date(document.getElementsByClassName[fechas].value);
    fecha.setDate(fecha.getDate-7);

    document.getElementsByClassName("fechas0").innerHTML = fecha;
}