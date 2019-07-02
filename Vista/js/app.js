// para seleccionar la fecha

//abrir modal de rigistrar
$('#modal-RegistrarCliente').modal('show');

/// sacar la diferencia de  dias de la fecha de recerva habitacion cliente
$(document).ready(function() {
    $('#fechaFin').change(function() {
        var fechaFin = $('#fechaFin').val();
        var fechaInicio = $('#fechaInicio').val();
        console.log(fechaInicio);
        console.log(fechaFin);
        $.ajax({
            type: "POST",
            data: { fechaFin: fechaFin, fechaInicio: fechaInicio },
            url: "../../Vista/IUCalcularFecha.php",
            success: function(respuesta) {
                console.log(respuesta);
                $('#TotalDias').text(respuesta + " dias");
            }
        });
    });
    // $('#fechaInicio').change(function() {
    //     var fechaFin = $('#fechaFin').val();
    //     var fechaInicio = $('#fechaInicio').val();
    //     // console.log(fechaInicio);
    //     // console.log(fechaFin);
    //     $.ajax({
    //         type: "POST",
    //         data: { fechaFin: fechaFin, fechaInicio: fechaInicio },
    //         url: "../../Vista/IUCalcularFecha.php",
    //         success: function(respuesta) {
    //             $('#TotalDias').text(respuesta + " dias");
    //         }
    //     });
    // });
});
$(document).on('change', '#fechaFin', function() {

    var fechaFin = $('#fechaFin').val();
    var fechaInicio = $('#fechaInicio').val();
    // console.log(fechaFin);
    // console.log(fechaInicio);


    // $.ajax({
    //     type: "POST",
    //     data: "fecha=" + $('#calendario').val(),
    //     url: "php/calcularEdad.php",
    //     success: function(r) {
    //         $('#edadCalculada').text(r + " años");
    //     }
    // });


});