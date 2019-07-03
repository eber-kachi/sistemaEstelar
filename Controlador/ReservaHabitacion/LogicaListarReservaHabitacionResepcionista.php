<?php
require '../../Modelo/Cliente/Cliente.php';
require '../../Modelo/Conexion.php';
require '../../Modelo/Cliente/BDBuscadorCliente.php';
require '../../Modelo/Hotel/BDBuscadorHotel.php';
require '../../Modelo/Habitacion/Habitacion.php';
require '../../Modelo/Habitacion/BDBuscadorHabitacion.php';
session_start();

echo $_SESSION['star_login'];
echo $_SESSION['idCliente'];

$conexion = new Conexion();



include '../../Vista/UIListaDeReservaResepcionista.php';
