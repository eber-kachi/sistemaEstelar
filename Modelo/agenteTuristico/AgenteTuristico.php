<?php
class AgenteTuristico
{
    private $idAgenteTuristico;
    private $idAgencia;
    private $ciUsuario;
    private $primerNombre;
    private $segundoNombre;
    private $apellidoPaterno;
    private $apellidoMaterno;
    private $nombre;
    private $activo;
    public function __construct()
    { }
    public function setIdAgenteTuristico($idAgenteTuristico)
    {
        $this->idAgenteTuristico = $idAgenteTuristico;
    }
    public function setIdAgencia($idAgencia)
    {

        $this->idAgencia = $idAgencia;
    }
    public function setCiUsuario($ciUsuario)
    {

        $this->ciUsuario = $ciUsuario;
    }
    public function setPrimerNombre($primerNombre)
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
    public function setNombre($nombre)
    {

        $this->nombre = $nombre;
    }
    // GETSS
    public function getIdAgenteTuristico()
    {
        return $this->idAgenteTuristico;
    }
    public function getIdAgencia()
    {
        return $this->idAgencia;
    }
    public function getCiUsuario()
    {
        return $this->ciUsuario;
    }
    public function getPrimerNombre()
    {
        return $this->primerNombre;
    }
    public function getSegundoNombre()
    {
        return $this->segundoNombre;
    }
    public function getApellidoPaterno()
    {
        return $this->apellidoPaterno;
    }
    public function getApellidoMaterno()
    {
        return $this->apellidoMaterno;
    }
    public function getActivo()
    {
        return $this->activo;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
}
