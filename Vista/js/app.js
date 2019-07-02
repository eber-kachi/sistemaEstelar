// para seleccionar la fecha

//abrir modal de rigistrar
$('#modal-RegistrarCliente').modal('show');

/// sacar la diferencia de  dias de la fecha de recerva habitacion cliente
$(document).ready(function() {
    $('#fechaFin').change(function() {
        var fechaFin = $('#fechaFin').val();
        var fechaInicio = $('#fechaInicio').val();
        // let precioHabitacion = ('#precio').val();
        // console.log(fechaInicio);
        // console.log(fechaFin);
        $.ajax({
            type: "POST",
            data: { fechaFin: fechaFin, fechaInicio: fechaInicio },
            url: "../../Vista/IUCalcularFecha.php",
            success: function(respuesta) {
                console.log(respuesta);
                $('#TotalDiasActual').val(respuesta);
                $('#TotalDias').text(respuesta + " dias");
                $('#precioTotal').text(respuesta * 10);
            }
        });
    });
    $('#fechaInicio').change(function() {
        var fechaFin = $('#fechaFin').val();
        var fechaInicio = $('#fechaInicio').val();
        // let precioHabitacion = ('#precio').val();
        // console.log(fechaInicio);
        // console.log(fechaFin);
        $.ajax({
            type: "POST",
            data: { fechaFin: fechaFin, fechaInicio: fechaInicio },
            url: "../../Vista/IUCalcularFecha.php",
            success: function(respuesta) {
                /// aqui hacer  el total del otro dato
                $('#TotalDiasActual').val(respuesta);
                $('#TotalDias').text(respuesta + " dias");
                $('#precioTotal').text(respuesta * 10);
            }
        });
    });
});