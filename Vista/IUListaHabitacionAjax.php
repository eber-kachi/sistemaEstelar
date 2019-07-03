<?php
// aqui hat que mostrar los select  
require_once '../Modelo/Conexion.php';
require_once '../Modelo/Habitacion/BDBuscadorHabitacion.php';
require_once '../Modelo/Cliente/BDBuscadorCliente.php';
$conexion = new Conexion();

if (isset($_REQUEST['idTipoHabitacion']) && isset($_REQUEST['idHotel'])) {
    $objetoBDBuscadorHabitacion = new BDBuscadorHabitacion();
    $listaDehabitaciones = $objetoBDBuscadorHabitacion->listarTipoHabitacionesLibresSegunIdHotelIdTipoHabitacion($_REQUEST['idHotel'], $_REQUEST['idTipoHabitacion']);
    $option = '';
    if (!is_null($listaDehabitaciones)) {
        foreach ($listaDehabitaciones as $habitacion) :
            $option .= '<option value=' . $habitacion['idHabitacion'] . '>' . $habitacion['nombre'] . ' -> ' . $habitacion['precio'] . ' Bs' . '</option>';
        endforeach;

        echo $option;
    } else {
        echo $option;
    }
} else if (isset($_REQUEST['idtipoHotel'])) {
    $objetoBDBuscadorCliente = new BDBuscadorCliente();
    $listaDeClientes = $objetoBDBuscadorCliente->listaDeClientesActivoPorIdHotel($_REQUEST['idtipoHotel']);
    $option = '';
    if (!is_null($listaDeClientes)) {
        foreach ($listaDeClientes as $Cliente) :
            $option .= '<option value=' . $Cliente['idCliente'] . '>' . $Cliente['nombreCompleto'] . '</option>';

        endforeach;

        echo $option;
    } else {
        echo $option;
    }
} else {
    echo "";
}
