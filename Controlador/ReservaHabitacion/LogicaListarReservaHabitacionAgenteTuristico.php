<?php
require '../../Modelo/Cliente/Cliente.php';
require '../../Modelo/Conexion.php';
require '../../Modelo/Cliente/BDBuscadorCliente.php';
require '../../Modelo/Hotel/BDBuscadorHotel.php';
require '../../Modelo/Habitacion/Habitacion.php';
require '../../Modelo/Habitacion/BDBuscadorHabitacion.php';
require '../../Modelo/agenteTuristico/BDBuscadorAgenteTuristico.php';
session_start();

// echo "user" . $_SESSION['star_login'];
$idAgenteTuristico = $_SESSION['idAgenteTuristico'];
$conexion = new Conexion();
$objetoHabitacion = new Habitacion();
$conexion = new Conexion();
$objetoBDBuscadorCliente = new BDBuscadorCliente();
$objetoBDBuscadorHotel = new BDBuscadorHotel();
$objetoBDBuscadorHabitacion = new BDBuscadorHabitacion();
$objetoBDBuscadorAgenteTuristico = new BDBuscadorAgenteTuristico();

$clienteResultado = $objetoBDBuscadorCliente->listaDeClientesActivos();
// listar segun el hotel las hhabitaciones 
$listaTipoHabitaciones = $objetoBDBuscadorHabitacion->listarTipoHabitacion();

$ListaObjetoHotel = $objetoBDBuscadorHotel->listaDeHoteles();

include_once '../../Vista/UIListaDeReservaAgenteTuristico.php';
