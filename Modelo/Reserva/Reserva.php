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
    //set 
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
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;
    }
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;
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
    //    GET

    public function getIdReserva()
    {
        return $this->idReserva;
    }
    public function getIdHabitacion()
    {
        return $this->idHabitacion;
    }
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
    public function getIdAgenteTuristico()
    {
        return $this->idAgenteTuristico;
    }
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }
    public function getFechaFin()
    {
        return $this->fechaFin;
    }
    public function getMontoTotal()
    {
        return $this->montoTotal;
    }
    public function getReservaPersonal()
    {
        return $this->reservaPersonal;
    }
    public function getReservaOnline()
    {
        return $this->reservaOnline;
    }
    public function getActivo()
    {
        return $this->activo;
    }
}
