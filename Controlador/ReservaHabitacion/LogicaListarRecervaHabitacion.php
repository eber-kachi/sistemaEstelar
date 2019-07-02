<?php
require '../../Modelo/Cliente/Cliente.php';
require '../../Modelo/Conexion.php';
require '../../Modelo/Cliente/BDBuscadorCliente.php';
require '../../Modelo/Hotel/BDBuscadorHotel.php';
require '../../Modelo/Habitacion/Habitacion.php';
require '../../Modelo/Habitacion/BDBuscadorHabitacion.php';
session_start();

// echo $_SESSION['star_login'];
// echo $_SESSION['idCliente'];

$conexion = new Conexion();
$objetoBDBuscadorCliente = new BDBuscadorCliente();
$objetoBDBuscadorHabitacion = new BDBuscadorHabitacion();
$clienteResultado = $objetoBDBuscadorCliente->datosClientePorId($_SESSION['idCliente']);
$listaTipoHabitaciones = $objetoBDBuscadorHabitacion->listarTipoHabitacion();
$listaHabitaciones = $objetoBDBuscadorHabitacion->listarHabitacionesSinReservaSegunIdHotel($clienteResultado['idHotel']);

// var_dump($clienteResultado);
// echo "-------------------";
//var_dump($listaHabitaciones);
include '../../Vista/UIListaDeReservas.php';
