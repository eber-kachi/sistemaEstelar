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
}
