<?php
class Habitacion
{
    private $idHabitacion;
    private $idHotel;
    private $idTipoHabitacion;
    private $nombre;
    private $precio;
    private $descripcion;
    public function __construct()
    { }
    //sets
    public function setIdHabitacion($idHabitacion)
    {
        $this->idHabitacion = $idHabitacion;
    }
    public function setIdHotel($idHotel)
    {
        $this->idHotel = $idHotel;
    }
    public function setIdTipoHabitacion($idTipoHabitacion)
    {
        $this->idTipoHabitacion = $idTipoHabitacion;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    // gets
    public function getIdHotel()
    {
        return $this->idHotel;
    }
    public function getIdHabitacion()
    {
        return $this->idHabitacion;
    }
    public function getIdTipoHabitacion()
    {
        return $this->idTipoHabitacion;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getPrecio()
    {
        return $this->precio;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
}
