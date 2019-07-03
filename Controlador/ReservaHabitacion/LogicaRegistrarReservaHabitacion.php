<?php
// echo 'terminado hasta aquaa';
// var_dump($_POST);
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
if (isset($_REQUEST['idUsuario']) != '') {
    // si  la reserva es realizado por un resepcionista
    $objetoReserva->setIdHabitacion($_REQUEST['habitacion']);
    $objetoReserva->setIdUsuario($_REQUEST['idUsuario']);
    $objetoReserva->setIdAgenteTuristico(null);
    $objetoReserva->setFechaInicio($_REQUEST['fechaInicio']);
    $objetoReserva->setFechaFin($_REQUEST['fechaFin']);
    $objetoReserva->setMontoTotal($montoTotal);
    $objetoReserva->setReservaPersonal($_REQUEST['reservaPersonal']);
    $objetoReserva->setReservaOnline($_REQUEST['reservaOnline']);
    $objetoReserva->setActivo($_REQUEST['activo']);
} else if (isset($_REQUEST['idAgenteTuristico']) != '') {
    // si la reserva fue realizado por un Agente turistico 
    $objetoReserva->setIdHabitacion($_REQUEST['habitacion']);
    $objetoReserva->setIdUsuario(null);
    $objetoReserva->setIdAgenteTuristico($_REQUEST['idAgenteTuristico']);
    $objetoReserva->setFechaInicio($_REQUEST['fechaInicio']);
    $objetoReserva->setFechaFin($_REQUEST['fechaFin']);
    $objetoReserva->setMontoTotal($montoTotal);
    $objetoReserva->setReservaPersonal($_REQUEST['reservaPersonal']);
    $objetoReserva->setReservaOnline($_REQUEST['reservaOnline']);
    $objetoReserva->setActivo($_REQUEST['activo']);
} else {
    // si la reserva fue realizado personalmente 
    $objetoReserva->setIdHabitacion($_REQUEST['habitacion']);
    $objetoReserva->setIdUsuario(null);
    $objetoReserva->setIdAgenteTuristico(null);
    $objetoReserva->setFechaInicio($_REQUEST['fechaInicio']);
    $objetoReserva->setFechaFin($_REQUEST['fechaFin']);
    $objetoReserva->setMontoTotal($montoTotal);
    $objetoReserva->setReservaPersonal($_REQUEST['reservaPersonal']);
    $objetoReserva->setReservaOnline($_REQUEST['reservaOnline']);
    $objetoReserva->setActivo($_REQUEST['activo']);
}

$idReservaUltimo = $objetoBDManejadorReserva->registrarReserva($objetoReserva);
if (!is_null($idReservaUltimo)) {
    $estado = $objetoBDManejadorReserva->RegistrarClienteReserva($idReservaUltimo, $_REQUEST['idCliente'], 1);
    if ($estado) {
        //echo "se registro correctamente";
        echo "<script> alert(' se registro correctamente');location.href = ' ./LogicaListarRecervaHabitacion.php';</script> ";
    } else {
        //echo "error al registrar ";
        echo "<script> alert(' error al registrar ');location.href = ' ./LogicaListarRecervaHabitacion.php';</script> ";
    }
}
