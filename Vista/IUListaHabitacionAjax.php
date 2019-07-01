<?php
// aqui hat que mostrar los select  
require_once '../Modelo/Conexion.php';
require_once '../Modelo/Habitacion/BDBuscadorHabitacion.php';
$conexion = new Conexion();

if (isset($_REQUEST['idTipoHabitacion']) && isset($_REQUEST['idHotel'])) {
    $objetoBDBuscadorHabitacion = new BDBuscadorHabitacion();
    $listaDehabitaciones = $objetoBDBuscadorHabitacion->listarTipoHabitacionesLibresSegunIdHotelIdTipoHabitacion(1, $_REQUEST['idTipoHabitacion']);
    $option = '';
    if (!is_null($listaDehabitaciones)) {
        foreach ($listaDehabitaciones as $habitacion) :
            $option .= '<option value=' . $habitacion['idHabitacion'] . '>' . $habitacion['nombre'] . '</option>';
        endforeach;

        echo $option;
    } else {
        echo $option;
    }
} else {
    echo "";
}