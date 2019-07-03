<?php
require '../../Modelo/Cliente/Cliente.php';
require '../../Modelo/Conexion.php';
require '../../Modelo/Cliente/BDBuscadorCliente.php';
require '../../Modelo/Hotel/BDBuscadorHotel.php';
require '../../Modelo/Habitacion/Habitacion.php';
require '../../Modelo/Habitacion/BDBuscadorHabitacion.php';
session_start();

echo "user" . $_SESSION['star_login'];
echo "id" . $_SESSION['idUsuario'];

$conexion = new Conexion();



include '../../Vista/UIListaDeReservaResepcionista.php';
