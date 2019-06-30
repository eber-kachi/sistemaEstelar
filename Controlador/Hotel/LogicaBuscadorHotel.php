<?php
require_once '../../Modelo/Hotel/BDBuscadorHotel.php';
//require '../../Modelo/Conexion.php';

class LogicaBuscadorHotel
{

    private $conexion;
    private $objetoBDBuscadorHotel;

    function __construct()
    {
        $this->conexion =  new Conexion();
        $this->objetoBDBuscadorHotel = new BDBuscadorHotel();
    } //end construct

    public function listaDeHoteles()
    {

        return $this->objetoBDBuscadorHotel->listaDeHoteles();
    } //end function
    public function listaDeHotelePorId($idHotel)
    {

        return $this->objetoBDBuscadorHotel->listaDeHotelePorId($idHotel);
    } //end function


}//end class
