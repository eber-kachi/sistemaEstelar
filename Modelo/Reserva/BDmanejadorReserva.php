<?php
class BDManejadorReserva
{
    private $conexion;

    function __construct()
    {
        $this->conexion = new Conexion();
    } //end construct

    public function registrarReserva(Reserva $objetoReserva)
    {
        $sqlInsertarReserva = "INSERT INTO  reserva (idHabitacion, idUsuario, idAgenteTuristico, fechaInicio, fechaFin, montoTotal, reservaPersonal, reservaOnline, activo)
              VALUES (:idHabitacion,:idUsuario,:idAgenteTuristico,:fechaInicio,:fechaFin,:montoTotal,:reservaPersonal,:reservaOnline,:activo);";

        $idHabitacion = $objetoReserva->getIdHabitacion();
        $idUsuario = $objetoReserva->getIdUsuario();
        $idAgenteTuristico = $objetoReserva->getIdAgenteTuristico();

        $fechaInicio = $objetoReserva->getFechaInicio();
        $fechaFin = $objetoReserva->getFechaFin();
        $montoTotal = $objetoReserva->getMontoTotal();
        $reservaPersonal = $objetoReserva->getReservaPersonal();
        $reservaOnline = $objetoReserva->getReservaOnline();
        $activo = $objetoReserva->getActivo();

        try {
            $cmd = $this->conexion->prepare($sqlInsertarReserva);
            $cmd->bindParam(':idHabitacion', $idHabitacion);
            $cmd->bindParam(':idUsuario', $idUsuario);
            $cmd->bindParam(':idAgenteTuristico', $idAgenteTuristico);
            $cmd->bindParam(':fechaInicio', $fechaInicio);
            $cmd->bindParam(':fechaFin', $fechaFin);
            $cmd->bindParam(':montoTotal', $montoTotal);
            $cmd->bindParam(':reservaPersonal', $reservaPersonal);
            $cmd->bindParam(':reservaOnline', $reservaOnline);
            $cmd->bindParam(':activo', $activo);
            $cmd->execute();
            //retornando el ultimo ID del Articulo
            return $this->conexion->lastInsertId();
        } catch (PDOException $e) {
            echo 'ERROR: No se logro realizar la nueva inserción - ' . $e->getMesage();
            exit();
            return false;
        }
    }
    public function RegistrarClienteReserva($idReserva, $idCliente, $esTitular)
    {
        $sqlClienteReserva = "INSERT INTO clientereserva(idReserva, idCliente, esTitular)
                          VALUES (:idReserva,:idCliente,:esTitular);";
        try {
            $cmd = $this->conexion->prepare($sqlClienteReserva);
            $cmd->bindParam(':idReserva', $idReserva);
            $cmd->bindParam(':idCliente', $idCliente);
            $cmd->bindParam(':esTitular', $esTitular);
            $cmd->execute();
            return true;
        } catch (PDOException $e) {
            echo 'ERROR: No se logro realizar la nueva inserción - ' . $e->getMesage();
            exit();
            return false;
        }
    }
}
