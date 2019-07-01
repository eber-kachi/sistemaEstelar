<?php
class Reserva
{
    private $idReserva;
    private $idHabitacion;
    private $idUsuario;
    private $idAgenteTuristico;
    private $fechaInicio;
    private $fechaFin;
    private $montoTotal;
    private $reservaPersonal;
    private $reservaOnline;
    private $activo;
    public function __construct()
    { }
    public function setIdReserva($idReserva)
    {
        $this->idReserva = $idReserva;
    }
    public function setIdHabitacion($idHabitacion)
    {
        $this->idHabitacion = $idHabitacion;
    }
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }
    public function setIdAgenteTuristico($idAgenteTuristico)
    {
        $this->idAgenteTuristico = $idAgenteTuristico;
    }
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;
    }
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;
    }
    public function setMontoTotal($montoTotal)
    {
        $this->montoTotal = $montoTotal;
    }
    public function setReservaPersonal($reservaPersonal)
    {
        $this->reservaPersonal = $reservaPersonal;
    }
    public function setReservaOnline($reservaOnline)
    {
        $this->reservaOnline = $reservaOnline;
    }
    public function setActivo($activo)
    {
        $this->activo = $activo;
    }
}
