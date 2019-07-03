<?php
require '../../Modelo/Cliente/Cliente.php';
require '../../Modelo/Conexion.php';
require '../../Modelo/Cliente/BDBuscadorCliente.php';
require '../../Modelo/Hotel/BDBuscadorHotel.php';
require '../../Modelo/Habitacion/Habitacion.php';
require '../../Modelo/Habitacion/BDBuscadorHabitacion.php';
session_start();

// echo "user" . $_SESSION['star_login'];
$idUsuario = $_SESSION['idUsuario'];
$conexion = new Conexion();
$objetoHabitacion = new Habitacion();
$conexion = new Conexion();
$objetoBDBuscadorCliente = new BDBuscadorCliente();
$objetoBDBuscadorHotel = new BDBuscadorHotel();
$objetoBDBuscadorHabitacion = new BDBuscadorHabitacion();

$clienteResultado = $objetoBDBuscadorCliente->listaDeClientesActivos();

$listaTipoHabitaciones = $objetoBDBuscadorHabitacion->listarTipoHabitacion();

$Hotel = $objetoBDBuscadorHotel->listaDeHotelePorId($clienteResultado[0]->getIdHotel());




include '../../Vista/UIListaDeReservaResepcionista.php';
