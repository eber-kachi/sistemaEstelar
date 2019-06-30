
<?php

class Hotel
{
    private $idHotel;
    private $idDepartamento;
    private $nombre;
    private $telefono;
    private $direccion;


    function __construct()
    { }

    //set 
    public function setIdHotel($idHotel)
    {
        $this->idHotel = $idHotel;
    }
    public function setIdDepartamento($idDepartamento)
    {
        $this->idDepartamento = $idDepartamento;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    //get
    public function getIdHotel()
    {
        return $this->idHotel;
    }
    public function getIdDepartamento()
    {
        return $this->idDepartamento;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }
} //end class

?>