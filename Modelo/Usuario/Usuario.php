<?php
class Usuario
{
    private $idUsuario;
    private $idRol;
    private $idHotel;
    private $ciUsuario;
    private $primerNombre;
    private $segundoNombre;
    private $apellidoPaterno;
    private $apellidoMaterno;
    private $activo;

    public function setidUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }
    public function setidRol($idRol)
    {
        $this->idRol = $idRol;
    }

    public function setIdHotel($idHotel)
    {
        $this->idHotel = $idHotel;
    }
    public function setCiUsuario($ciUsuario)
    {
        $this->ciUsuario = $ciUsuario;
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
    public function setActivo($activo)
    {
        $this->activo = $activo;
    }
    // get
    public function getidUsuario()
    {
        return $this->idUsuario;
    }
    public function getIdHotel()
    {
        return  $this->idHotel;
    }
    public function getCiUsuario()
    {
        return $this->ciUsuario;
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
    public function getActivo()
    {
        return $this->activo;
    }
}
