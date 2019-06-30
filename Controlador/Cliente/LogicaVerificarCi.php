<?php
require '../../Modelo/Conexion.php';
require '../../Modelo/Cliente/BDBuscadorCliente.php';
$conexion = new Conexion();

$objetoBDBuscadorCliente = new BDBuscadorCliente();

if (isset($_REQUEST['ciCliente'])) {
    $resultado = $objetoBDBuscadorCliente->verificaExisteCi($_REQUEST['ciCliente']);
    echo $resultado;
}
