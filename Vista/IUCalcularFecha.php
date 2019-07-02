<?php

if (isset($_REQUEST['fechaFin']) && $_REQUEST['fechaFin'] != '' && isset($_REQUEST['fechaInicio']) && $_REQUEST['fechaInicio'] != '') {
    //$this->calculaTiempo($_REQUEST['fechaInicio'], $_REQUEST['fechaFin']);
    $fechaInicio = $_REQUEST['fechaInicio'];
    $fechaFin = $_REQUEST['fechaFin'];

    echo calculaTiempo($fechaInicio, $fechaFin)[11];
} else {
    echo "";
}
function calculaTiempo($fechaInicio, $fechaFin)
{
    //indice 0 = años
    //indice 1= meses
    //indice 2 = dias
    //indice 11 = total en dias 
    $datetime1 = date_create($fechaInicio);
    $datetime2 = date_create($fechaFin);
    $interval = date_diff($datetime1, $datetime2);

    $tiempo = array();

    foreach ($interval as $valor) {
        $tiempo[] = $valor;
    }

    return $tiempo;
}
