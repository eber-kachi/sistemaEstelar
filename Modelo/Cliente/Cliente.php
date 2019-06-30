<?php

class Cliente
{
    private $idCliente;
    private $idHotel;
    private $ci;
    private $primerNombre;
    private $segundoNombre;
    private $apellidoPaterno;
    private $apellidoMaterno;
    private $telefono;
    private $genero;
    private $fechaNacimiento;
    private $usuario;
    private $contrasenia;
    private $activo;
    public function __construct()
    { }
    /* metodos set */
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
    }
    public function setIdHotel($idHotel)
    {
        $this->idHotel = $idHotel;
    }
    public function setCi($ci)
    {
        $this->ci = $ci;
    }
    public function setPrimernombre($primerNombre)
    {
        $this->primerNombre = $primerNombre;
    }
    public function setSegundoNombre($segundoNombre)
    {
        $this->segundoNombre = $segundoNombre;
    }
    public function setApellidoPaterno($apellidoPaterno)
    {
        $this->apellidoPaterno = $apellidoPaterno;
    }
    public function setApellidoMaterno($apellidoMaterno)
    {
        $this->apellidoMaterno = $apellidoMaterno;
    }
    public function setDescuento($descuento)
    {
        $this->descuento = $descuento;
    }
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }
    public function setGenero($genero)
    {
        $this->genero = $genero;
    }
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    }
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }
    public function setContrasenia($contrasenia)
    {

        $this->contrasenia = $contrasenia;
    }
    public function setActivo($activo)
    {
        $this->activo = $activo;
    }

    /*   metodos de get */
    public function getIdCliente()
    {
        return  $this->idCliente;
    }
    public function getIdHotel()
    {
        return  $this->idHotel;
    }
    public function getCi()
    {
        return $this->ci;
    }
    public function getPrimernombre()
    {
        return $this->primerNombre;
    }
    public function getSegundoNombre()
    {
        return $this->segundoNombre;
    }
    public function getApellidoPaterno()
    {
        return  $this->apellidoPaterno;
    }
    public function getApellidoMaterno()
    {
        return  $this->apellidoMaterno;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }
    public function getGenero()
    {
        return $this->genero;
    }
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }
    public function getUsuario()
    {
        return $this->usuario;
    }
    public function getContrasenia()
    {
        return $this->contrasenia;
    }
    public function getActivo()
    {
        return $this->activo;
    }
}
