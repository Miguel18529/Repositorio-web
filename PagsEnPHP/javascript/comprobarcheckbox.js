//Función para ocultar el correo electrónico del padre
$(document).ready(function() {
    $('#MayoriaEdad').on('change', function () {
        if ($(this).is(':checked')) {
            $(".jquery").hide();
        } else {
            $(".jquery").show();
        }
    })
});