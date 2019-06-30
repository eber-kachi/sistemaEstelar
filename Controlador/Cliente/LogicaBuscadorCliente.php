<?php
require('../Modelo/Conexion.php');
require('../Modelo/Cliente/Cliente.php');
require('../Modelo/Cliente/BDBuscadorCliente.php');

class LogicaBuscadorCliente
{

    private $conexion;
    private $objetoBDBuscadorCliente;

    function __construct()
    {
        $this->conexion =  new Conexion();
        $this->objetoBDBuscadorCliente = new BDBuscadorCliente();
    } //end construct

    public function datosClientePorId($idCliente)
    {
        return $this->objetoBDBuscadorCliente->datosClientePorId($idCliente);
    } //end function 

    public function listaDeClientes()
    {

        return $this->objetoBDBuscadorCliente->listaDeClientes();
    } //end function

    public function listaDeClientesActivos()
    {
        return $this->objetoBDBuscadorCliente->listaDeClientesActivos();
    } //end function

    public function listaDeClientesPorCriterioNombreCliente($nombreCliente)
    {
        return $this->objetoBDBuscadorCliente->listaDeClientesPorCriterioNombreCliente($nombreCliente);
    } //end function
    public function verificaExisteCi($ci)
    {
        return $this->objetoBDBuscadorCliente->verificaExisteCi($ci);
    } //end function

}//end class
