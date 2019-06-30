$(ListarClientes());
$(document).ready(function() {
    $("#alerta div #mensajeCi").css("display", "none;");
    $('#buscarCliente').focus();
    // console.log('nombreClientee');
});

function ListarClientes(nombreClientee) {
    //console.log(nombreClientee);
    $.ajax({
            url: '../../Vista/IUMostrarCliente.php',
            type: 'POST',
            datatype: 'html',
            //nombreArticulo, es el que va justamente a la pagina: 'IUListaDeArticulos.php' 
            data: { nombreCliente: nombreClientee }

        })
        .done(function(resultado) {
            if (resultado === 'vacio') {
                $("#mensaje").html('No existe Clientes con ese criterio de busqueda');
            } else {
                $("#mensaje").html('');
                $("#tablaClientes").html(resultado);
            }
        })
        .fail(function() {
            $("#mensaje").html(' error al buscar');
        });
} //end function
$(document).on('keyup', '#buscarCliente', function() {
    var criterioBusqueda = $(this).val();
    /// console.log(criterioBusqueda);
    if (criterioBusqueda != " ") {
        ListarClientes(criterioBusqueda);
    } else {
        ListarClientes();
    }
});
///////Verificar Si se repite ci
$(VerificarCi());
$(document).ready(function() {
    $('#verificarCiInput').focus();
    //console.log('hisiste Clik');
});

function VerificarCi(ciCliente) {
    console.log(ciCliente);
    $.ajax({
            url: '../../Controlador/Cliente/LogicaVerificarCi.php',
            type: 'POST',
            datatype: 'html',
            //nombreArticulo, es el que va justamente a la pagina: 'IUListaDeArticulos.php' 
            data: { ciCliente: ciCliente }

        })
        .done(function(resultado) {
            console.log("estado" + resultado);
            var btn = document.getElementById('registrar');
            if (resultado == 1) {

                $('#mensajeCi').css('color', 'red');
                $("#mensajeCi").html('Ya existe Cliente');
                btn.disabled = true;

            } else {
                $("#mensajeCi").html('');
                btn.disabled = false;
            }
        })
        .fail(function() {
            $("#mensaje").html(' error al buscar');
        });
} //end function
$(document).on('keyup', '#verificarCiInput', function() {
    var criterioBusqueda = $(this).val();
    console.log("Clietrio: " + criterioBusqueda);
    if (criterioBusqueda != " ") {
        VerificarCi(criterioBusqueda);
    } else {
        $("#mensajeCi").html('');
    }
});
///