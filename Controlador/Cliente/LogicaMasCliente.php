<?php
require '../../Modelo/Cliente/Cliente.php';
require '../../Modelo/Conexion.php';
require '../../Modelo/Cliente/BDBuscadorCliente.php';
require '../../Modelo/Cliente/BDManejadorCliente.php';
require '../../Modelo/Hotel/BDBuscadorHotel.php';

$conexion = new Conexion();
$objetoLogicaBuscadorCliente = new BDBuscadorCliente();
$objetoLogicaBuscadorHotel = new BDBuscadorHotel();

$datosCliente = $objetoLogicaBuscadorCliente->datosClientePorId($_REQUEST['idCliente']);
$datosHotel = $objetoLogicaBuscadorHotel->listaDeHotelePorId($_REQUEST['idHotel']);


require_once '../../Vista/IUMasCliente.php';
