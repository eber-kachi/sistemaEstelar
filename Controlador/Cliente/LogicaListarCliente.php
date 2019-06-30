
<?php
require '../../Modelo/Cliente/Cliente.php';
require '../../Modelo/Conexion.php';
require '../../Modelo/Cliente/BDBuscadorCliente.php';

$conexion = new Conexion();
$objetoBDBuscadorCliente = new BDBuscadorCliente();
$listaDeCliente = $objetoBDBuscadorCliente->listaDeClientes();

// Si descomentan esta linea, deben bloquear la otra, porque recuerden 


require_once "../../Vista/IUListaDeClientesConAjax.php";
