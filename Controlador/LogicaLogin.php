<?php
require '../Modelo/Conexion.php';
require '../Modelo/Cliente/BDBuscadorCliente.php';
require '../Modelo/Usuario/BDBuscadorUsuario.php';
require '../Modelo/agenteTuristico/BDBuscadorAgenteTuristico.php';
session_start();
$conexion = new Conexion();
if (isset($_REQUEST['usuario']) && isset($_REQUEST['contrasenia'])) {
    //verificar si es cliente 
    $objetoBDBuscadorCliente = new BDBuscadorCliente();
    $objetoBDBuscadorUsuario = new BDBuscadorUsuario();
    $objetoBDBuscadorAgenteTuristico = new BDBuscadorAgenteTuristico();
    $clienteResultado = $objetoBDBuscadorCliente->verificaUsuarioContraseniaCliente($_REQUEST['usuario'], $_REQUEST['contrasenia']);
    $usuarioResultado = $objetoBDBuscadorUsuario->verificaUsuarioContraseniaUsuario($_REQUEST['usuario'], $_REQUEST['contrasenia']);
    $agenteTuristicoResultado = $objetoBDBuscadorAgenteTuristico->verificaUsuarioContraseniaUsuario($_REQUEST['usuario'], $_REQUEST['contrasenia']);
    if (!is_null($clienteResultado)) {

        if ($clienteResultado['activo'] == '1') {
            // echo 'bien benido Cliente';
            $_SESSION['star_login'] = $clienteResultado['usuario'];
            $_SESSION['idCliente'] = $clienteResultado['idCliente'];
            echo " <script> alert(' Usuario Cliente');location.href = './ReservaHabitacion/LogicaListarRecervaHabitacion.php';</script> ";
        } else {
            echo 'verifica puede que el  cliente este de baja ';
        }
    } else if (!is_null($usuarioResultado)) {
        if ($usuarioResultado['nombre'] == 'Recepcionista' && $usuarioResultado['activo'] == '1') {
            //echo 'bien benido Recepcionista ';
            $_SESSION['star_login'] = $usuarioResultado['usuario'];
            $_SESSION['idUsuario'] = $usuarioResultado['idUsuario'];

            echo " <script> alert(' Usuario Resepcionistas');location.href = './Cliente/LogicaListarCliente.php';</script> ";
        } else if ($usuarioResultado['nombre'] == 'Administrador' && $usuarioResultado['activo'] == '1') {
            echo 'bien benido Administrador ';
        } else {

            echo " <script> alert(' verifica puede que el  usuario este de baja');location.href = ' ../index.html';</script> ";
        }
    } else if (!is_null($agenteTuristicoResultado)) {
        if ($agenteTuristicoResultado['activo'] == '1') {
            $_SESSION['star_login'] = $agenteTuristicoResultado['usuario'];
            $_SESSION['idAgenteTuristico'] = $agenteTuristicoResultado['idAgenteTuristico'];
            echo " <script> alert(' Usuario Resepcionistas');location.href = './ReservaHabitacion/LogicaListarReservaHabitacionAgenteTuristico.php';</script> ";
        } else {
            //echo 'verifica puede que el  cliente este de baja ';
            echo " <script> alert(' verifica puede que el  cliente este de baja ');location.href = ' ../index.html';</script> ";
        }
    } else {
        echo " <script> alert(' Usuario invalido');location.href = ' ../index.html';</script> ";
    }
} else {
    //echo 'Error...';
    echo " <script> alert(' Error...');location.href = ' ../index.html';</script> ";
}


//ar_dump($_REQUEST);
