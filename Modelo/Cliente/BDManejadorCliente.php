<?php

class BDManejadorCliente
{
    private $conexion;

    function __construct()
    {
        $this->conexion =  new Conexion();
    }
    public function registrarCliente(Cliente $objetoCliente)
    {

        $sqlInsertarCliente = "INSERT into cliente ( idHotel, ci, primerNombre, segundoNombre, apellidoPaterno, apellidoMaterno, telefono, genero, fechaNacimiento,usuario, contrasenia ,activo)
                                            values (:idHotel,:ci,:primerNombre,:segundoNombre,:apellidoPaterno,:apellidoMaterno,:telefono,:genero,:fechaNacimiento,:usuario,:contrasenia,:activo);
                                            ";

        //En php se necesita descargar los valores  del objeto, si lo hace de manera directa le saldra error.
        //var_dump($objetoCliente);
        $idCliente = $objetoCliente->getIdCliente();
        $idHotel = (int) $objetoCliente->getIdHotel();
        $ci = $objetoCliente->getCi();
        $primerNombre = $objetoCliente->getPrimerNombre();
        $segundoNombre = $objetoCliente->getSegundoNombre();
        $apellidoPaterno = $objetoCliente->getApellidoPaterno();
        $apellidoMaterno = $objetoCliente->getApellidoMaterno();
        $telefono = (int) $objetoCliente->getTelefono();
        $genero = $objetoCliente->getGenero();
        $fechaNacimiento = $objetoCliente->getFechaNacimiento();
        $usuario = $objetoCliente->getUsuario();
        $contrasenia = $objetoCliente->getContrasenia();
        $activo = (int) $objetoCliente->getActivo();



        try {
            $cmd = $this->conexion->prepare($sqlInsertarCliente);
            $cmd->bindParam(':idHotel', $idHotel);
            $cmd->bindParam(':ci', $ci);
            $cmd->bindParam(':primerNombre', $primerNombre);
            $cmd->bindParam(':segundoNombre', $segundoNombre);
            $cmd->bindParam(':apellidoPaterno', $apellidoPaterno);
            $cmd->bindParam(':apellidoMaterno', $apellidoMaterno);
            $cmd->bindParam(':telefono', $telefono);
            $cmd->bindParam(':genero', $genero);
            $cmd->bindParam(':fechaNacimiento', $fechaNacimiento);
            $cmd->bindParam(':usuario', $usuario);
            $cmd->bindParam(':contrasenia', $contrasenia);
            $cmd->bindParam(':activo', $activo);
            $cmd->execute();
            //retornando el ultimo ID del Articulo
            return $this->conexion->lastInsertId();
        } catch (PDOException $e) {
            echo 'ERROR: No se logro realizar la nueva inserción - ' . $e->getMesage();
            exit();
            return false;
        }
    } //end function
    public function actualizarEstadoDeActivo($idCliente, $activo)
    {
        $sqlActualizarActivo = 'UPDATE cliente SET activo=:activo WHERE idCliente=:idCliente  ';

        try {
            $cmd = $this->conexion->prepare($sqlActualizarActivo);
            $cmd->bindParam(':idCliente', $idCliente);

            $cmd->bindParam(':activo', $activo);
            $cmd->execute();

            return true;
        } catch (PDOException $e) {
            echo 'ERROR: No se logro actualizar estado Cliente - ' . $e->getMesage();
            exit();
            return false;
        }
    }
    public function actualizarCliente(Cliente $objetoCliente)
    {
        $sqlActualizarCliente = " Call actualizarCliente(:idCliente,:idHotel,:ci,:primerNombre,:segundoNombre,:apellidoPaterno,:apellidoMaterno,
                                   :telefono,:genero,:fechaNacimiento,:usuario,:contrasenia,:activo )";

        $idCliente = $objetoCliente->getIdCliente();
        $idHotel = (int) $objetoCliente->getIdHotel();
        $ci = $objetoCliente->getCi();
        $primerNombre = $objetoCliente->getPrimerNombre();
        $segundoNombre = $objetoCliente->getSegundoNombre();
        $apellidoPaterno = $objetoCliente->getApellidoPaterno();
        $apellidoMaterno = $objetoCliente->getApellidoMaterno();
        $telefono = (int) $objetoCliente->getTelefono();
        $genero = $objetoCliente->getGenero();
        $fechaNacimiento = $objetoCliente->getFechaNacimiento();
        $usuario = $objetoCliente->getUsuario();
        $contrasenia = $objetoCliente->getContrasenia();
        $activo = (int) $objetoCliente->getActivo();



        try {
            $cmd = $this->conexion->prepare($sqlActualizarCliente);
            $cmd->bindParam(':idCliente', $idCliente);
            $cmd->bindParam(':idHotel', $idHotel);
            $cmd->bindParam(':ci', $ci);
            $cmd->bindParam(':primerNombre', $primerNombre);
            $cmd->bindParam(':segundoNombre', $segundoNombre);
            $cmd->bindParam(':apellidoPaterno', $apellidoPaterno);
            $cmd->bindParam(':apellidoMaterno', $apellidoMaterno);
            $cmd->bindParam(':telefono', $telefono);
            $cmd->bindParam(':genero', $genero);
            $cmd->bindParam(':fechaNacimiento', $fechaNacimiento);
            $cmd->bindParam(':usuario', $usuario);
            $cmd->bindParam(':contrasenia', $contrasenia);
            $cmd->bindParam(':activo', $activo);
            $cmd->execute();
            //retornando el ultimo ID del Articulo
            return true;
        } catch (PDOException $e) {
            echo 'ERROR: No se logro realizar la nueva inserción - ' . $e->getMesage();
            exit();
            return false;
        }
    }
}
