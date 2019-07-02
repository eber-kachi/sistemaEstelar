<?php
echo 'terminado hasta aquaa';
var_dump($_POST);
require '../../Modelo/Conexion.php';
require '../../Modelo/Reserva/Reserva.php';
require '../../Modelo/Reserva/BDManejadorReserva.php';
require '../../Modelo/Habitacion/BDBuscadorHabitacion.php';

$conexion = new Conexion();
$objetoReserva = new Reserva();
$objetoBDBuscadorHabitacion = new BDBuscadorHabitacion();
$objetoBDManejadorReserva = new BDManejadorReserva();
$precioHabitacion = $objetoBDBuscadorHabitacion->getPrecioHabitacionId($_REQUEST['habitacion']);
//multiplicamos cuanto  sera el precio total de la reserva
$montoTotal = $precioHabitacion['precio'] * (int) $_REQUEST['TotalDiasActual'];

$objetoReserva->setIdHabitacion($_REQUEST['habitacion']);
$objetoReserva->setIdUsuario(null);
$objetoReserva->setIdAgenteTuristico(null);
$objetoReserva->setFechaInicio($_REQUEST['fechaInicio']);
$objetoReserva->setFechaFin($_REQUEST['fechaFin']);
$objetoReserva->setMontoTotal($montoTotal);
$objetoReserva->setReservaPersonal($_REQUEST['reservaPersonal']);
$objetoReserva->setReservaOnline($_REQUEST['reservaOnline']);
$objetoReserva->setActivo($_REQUEST['activo']);

$idReservaUltimo = $objetoBDManejadorReserva->registrarReserva($objetoReserva);
if (!is_null($idReservaUltimo)) {
    $estado = $objetoBDManejadorReserva->RegistrarClienteReserva($idReservaUltimo, $_REQUEST['idCliente'], 1);
    if ($estado) {
        echo "se registro correctamente";
        echo "";
    } else {
        echo "error al registrar ";
    }
}
