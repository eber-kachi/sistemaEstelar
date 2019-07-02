<?php
require '../../Modelo/Cliente/Cliente.php';
require '../../Modelo/Conexion.php';
require '../../Modelo/Cliente/BDBuscadorCliente.php';
require '../../Modelo/Cliente/BDManejadorCliente.php';
$conexion = new Conexion();
$objetoCliente = new Cliente();
$objetoBDManejadorCliente = new BDManejadorCliente();
//$objetoBDBuscadorCliente= new BDBuscadorCliente();
$objetoBDBuscadorCliente = new BDBuscadorCliente();
// if (isset($_REQUEST['ciCliente'])) {
//     $resultado = $objetoBDBuscadorCliente->verificaExisteCi($_REQUEST['ciCliente']);
//     echo $resultado;
// } else {
$ci = strtoupper($_REQUEST['ci']);
$primerNombre = mb_convert_case($_REQUEST['primerNombre'], MB_CASE_TITLE, "UTF-8");
$segundoNombre = mb_convert_case($_REQUEST['segundoNombre'], MB_CASE_TITLE, "UTF-8");
$apellidoPaterno = mb_convert_case($_REQUEST['apellidoPaterno'], MB_CASE_TITLE, "UTF-8");
$apellidoMaterno = mb_convert_case($_REQUEST['apellidoMaterno'], MB_CASE_TITLE, "UTF-8");
$telefono = (int) $_REQUEST['telefono'];
$genero = strtoupper($_REQUEST['genero']);

$objetoCliente->setIdHotel($_REQUEST['hotel']);
$objetoCliente->setCi($ci);
$objetoCliente->setPrimernombre($primerNombre);
$objetoCliente->setSegundoNombre($segundoNombre);
$objetoCliente->setApellidoPaterno($apellidoPaterno);
$objetoCliente->setApellidoMaterno($apellidoMaterno);
$objetoCliente->setTelefono($telefono);
$objetoCliente->setGenero($genero);
$objetoCliente->setFechaNacimiento($_REQUEST['fechaNacimiento']);
$objetoCliente->setUsuario('');
$objetoCliente->setContrasenia('');
$objetoCliente->setActivo($_REQUEST['activo']);

$objetoBDManejadorCliente->registrarCliente($objetoCliente);

require_once "../../Vista/IUListaDeClientesConAjax.php";
