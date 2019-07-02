<?php
require '../../Modelo/Cliente/Cliente.php';
require '../../Modelo/Conexion.php';
require '../../Modelo/Cliente/BDBuscadorCliente.php';
require '../../Modelo/Cliente/BDManejadorCliente.php';
require '../../Modelo/Hotel/BDBuscadorHotel.php';
//print_r($_REQUEST);
$conexion = new Conexion();
$objetoLogicaBuscadorCliente = new BDBuscadorCliente();
$objetoLogicaBuscadorHotel = new BDBuscadorHotel();
$paso = true;
if (isset($_REQUEST['idCliente']) && $paso == true) {
    $datosCliente = $objetoLogicaBuscadorCliente->datosClientePorId($_REQUEST['idCliente']);
    $listaDehoteles = $objetoLogicaBuscadorHotel->listaDeHoteles();
    $HotelId = $_REQUEST['idHotel'];
    $paso = false;
    // $Nombre = $datosCliente['primerNombre'][0];
    // // //$Nombre = $Nombre[0];
    // // $apellidoP = $datosCliente['apellidoPaterno'];
    // $ci = $datosCliente['ci'];
    $usuarioCreado = trim($datosCliente['primerNombre'][0]) . trim($datosCliente['apellidoPaterno']) . trim($datosCliente['ci']);
    $usuarioCreado = mb_strtolower($usuarioCreado, 'UTF-8');

    $contraseniaCreado = mb_strtolower($datosCliente['ci'], 'UTF-8');;

    require_once '../../Vista/IUActualizarCliente.php';
} else {
    $objetoCliente = new Cliente();

    $ci = strtoupper($_REQUEST['ci']);
    $primerNombre = mb_convert_case($_REQUEST['primerNombre'], MB_CASE_TITLE, "UTF-8");
    $segundoNombre = mb_convert_case($_REQUEST['segundoNombre'], MB_CASE_TITLE, "UTF-8");
    $apellidoPaterno = mb_convert_case($_REQUEST['apellidoPaterno'], MB_CASE_TITLE, "UTF-8");
    $apellidoMaterno = mb_convert_case($_REQUEST['apellidoMaterno'], MB_CASE_TITLE, "UTF-8");
    $telefono = (int) $_REQUEST['telefono'];
    $genero = strtoupper($_REQUEST['genero']);

    $objetoCliente->setIdCliente($_REQUEST['idClienteActual']);
    $objetoCliente->setIdHotel($_REQUEST['hotel']);
    $objetoCliente->setCi($ci);
    $objetoCliente->setPrimernombre($primerNombre);
    $objetoCliente->setSegundoNombre($segundoNombre);
    $objetoCliente->setApellidoPaterno($apellidoPaterno);
    $objetoCliente->setApellidoMaterno($apellidoMaterno);
    $objetoCliente->setTelefono($telefono);
    $objetoCliente->setGenero($genero);
    $objetoCliente->setFechaNacimiento($_REQUEST['fechaNacimiento']);
    $objetoCliente->setUsuario($_REQUEST['usuario']);
    $objetoCliente->setContrasenia($_REQUEST['contrasenia']);
    $objetoCliente->setActivo($_REQUEST['activo']);

    $objetoBDManejadorCliente = new BDManejadorCliente();
    $objetoBDManejadorCliente->actualizarCliente($objetoCliente);

    require_once "../../Vista/IUListaDeClientesConAjax.php";
}
