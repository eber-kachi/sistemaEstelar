<?php

require '../../Modelo/Cliente/Cliente.php';
require '../../Modelo/Conexion.php';
require '../../Modelo/Cliente/BDBuscadorCliente.php';
require '../../Modelo/Cliente/BDManejadorCliente.php';
$conexion = new Conexion();
$objetoBDBuscadorCliente = new BDBuscadorCliente();
$objetoBDManejadorCliente = new BDManejadorCliente();
/* echo $_REQUEST['idCliente'];
echo $_REQUEST['estado']; */

if ($_REQUEST['estado'] == 1) {

    $objetoBDManejadorCliente->actualizarEstadoDeActivo($_REQUEST['idCliente'], 0);
} else {
    $objetoBDManejadorCliente->actualizarEstadoDeActivo($_REQUEST['idCliente'], 1);
}
$listaDeCliente = $objetoBDBuscadorCliente->listaDeClientes();

require_once "../../Vista/IUListaDeClientesConAjax.php";
