<?php
class BDBuscadorHabitacion
{
    private $conexion;

    function __construct()
    {
        $this->conexion = new Conexion();
    } //end construct
    public function listarHabitacionesSinReservaSegunIdHotel($idHotel)
    {
        $sqlBuscarHabitaciones = "call listarHabitacionesSinReservaSegunIdHotel(:idHotel)";
        try {
            $cmd = $this->conexion->prepare($sqlBuscarHabitaciones);
            $cmd->bindParam(':idHotel', $idHotel);
            $cmd->execute();
            /* Ejecuta una sentencia preparada pasando un array de valores */
            $listaDeHabitacionesDeLaConsulta = $cmd->fetchAll();

            $listaDehabitaciones = array();
            $i = 0;
            foreach ($listaDeHabitacionesDeLaConsulta as $habitacion) :
                $objetoHabitacion = new Habitacion();
                $objetoHabitacion->setIdHabitacion($habitacion['idHabitacion']);
                $objetoHabitacion->setIdHotel($habitacion['idHotel']);
                $objetoHabitacion->setIdTipoHabitacion($habitacion['idTipoHabitacion']);
                $objetoHabitacion->setNombre($habitacion['nombre']);
                $objetoHabitacion->setPrecio($habitacion['precio']);
                $objetoHabitacion->setDescripcion($habitacion['descripcion']);
                $listaDehabitaciones[$i] = $objetoHabitacion;
                $i++;
            endforeach;

            if ($listaDehabitaciones) {
                return $listaDehabitaciones;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo 'ERROR: Error en la busqueda del habitaciones libres - ' . $e->getMesage();
            exit();
            return false;
        };
    }
    public function listarTipoHabitacion()
    {
        $sqlListarTipoHabitaciones = "call listarTipoHabitaciones();";

        $cmd = $this->conexion->prepare($sqlListarTipoHabitaciones);
        $cmd->execute();
        $listaTipoHabitaciones = $cmd->fetchAll();
        if ($listaTipoHabitaciones) {
            return $listaTipoHabitaciones;
        } else {
            return null;
        }
    }
    public function listarTipoHabitacionesLibresSegunIdHotelIdTipoHabitacion($idHotel, $idTipoHabitacion)
    {
        $sqlListarHabitaciones = "call listarTipoHabitacionesLibresSegunIdHotelIdTipoHabitacion(:idHotel,:idTipoHabitacion);";
        $cmd = $this->conexion->prepare($sqlListarHabitaciones);
        $cmd->bindParam(':idHotel', $idHotel);
        $cmd->bindParam(':idTipoHabitacion', $idTipoHabitacion);
        $cmd->execute();
        $listaHabitaciones = $cmd->fetchAll();
        if ($listaHabitaciones) {
            return $listaHabitaciones;
        } else {
            return null;
        }
    }
    public function getPrecioHabitacionId($idHabitacion)
    {
        $sqlListaHabitacionPrecio = "SELECT precio
                                    FROM habitacion WHERE idHabitacion=:idHabitacion";
        $cmd = $this->conexion->prepare($sqlListaHabitacionPrecio);
        $cmd->bindParam(':idHabitacion', $idHabitacion);
        $cmd->execute();
        $registroConsulta = $cmd->fetch(\PDO::FETCH_ASSOC);
        if ($registroConsulta) {
            return $registroConsulta;
        } else {
            return null;
        }
    }
}
