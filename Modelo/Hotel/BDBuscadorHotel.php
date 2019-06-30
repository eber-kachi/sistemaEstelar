<?php
require_once '../../Modelo/Hotel/Hotel.php';
class BDBuscadorHotel
{
    private $conexion;

    function __construct()
    {
        $this->conexion =  new Conexion();
    } //end construct


    public function listaDeHoteles()
    {
        $sqlListaDeHoteles = "SELECT idHotel,idDepartamento,nombre,telefono,direccion FROM hotel;";
        //PDO::prepare — Prepara una sentencia para su ejecución y devuelve un objeto sentencia

        $cmd = $this->conexion->prepare($sqlListaDeHoteles);
        //Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). 
        /*Si el servidor de la base de datos prepara con éxito la sentencia, PDO::prepare() devuelve un objeto PDOStatement. Si no es posible, PDO::prepare() devuelve FALSE o emite una excepciónPDOException (dependiendo del manejo de errores). */
        $cmd->execute();
        /* Ejecuta una sentencia preparada pasando un array de valores */
        $listaDeHotelesDeLaConsulta = $cmd->fetchAll();

        // Arreglo para llenar una lista de Articulos
        $listaDeHoteles = array();
        $i = 0;
        foreach ($listaDeHotelesDeLaConsulta as $registroHotel) {

            $objetoHotel = new Hotel();
            $objetoHotel->setIdHotel($registroHotel['idHotel']);
            $objetoHotel->setIdDepartamento($registroHotel['idDepartamento']);
            $objetoHotel->setNombre($registroHotel['nombre']);
            $objetoHotel->setTelefono($registroHotel['telefono']);
            $objetoHotel->setDireccion($registroHotel['direccion']);
            $listaDeHoteles[$i] = $objetoHotel;
            $i++;
        }

        return $listaDeHoteles;
    }
    public function listaDeHotelePorId($idHotel)
    {
        $sqlListaDeHotel = "call listaDeHotelId(:idHotel)";
        try {
            $cmd = $this->conexion->prepare($sqlListaDeHotel);
            $cmd->bindParam(':idHotel', $idHotel);
            $cmd->execute();
            /* Ejecuta una sentencia preparada pasando un array de valores */
            /*Para este caso solamente habra un registro o nada*/
            $registroConsulta = $cmd->fetch(\PDO::FETCH_ASSOC);

            return $registroConsulta;
        } catch (PDOException $e) {
            echo 'ERROR: Error en la busqueda del cliente por ID- ' . $e->getMesage();
            exit();
            return false;
        };
    }
}
