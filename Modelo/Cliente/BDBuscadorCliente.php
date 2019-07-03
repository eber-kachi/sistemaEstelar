<?php
class BDBuscadorCliente
{
    private $conexion;

    function __construct()
    {
        $this->conexion =  new Conexion();
    } //end construct


    public function listaDeClientes()
    {
        $sqlListaDeClientes = "CALL listaDeClientes();";
        //PDO::prepare — Prepara una sentencia para su ejecución y devuelve un objeto sentencia

        $cmd = $this->conexion->prepare($sqlListaDeClientes);
        //Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). 
        /*Si el servidor de la base de datos prepara con éxito la sentencia, PDO::prepare() devuelve un objeto PDOStatement. Si no es posible, PDO::prepare() devuelve FALSE o emite una excepciónPDOException (dependiendo del manejo de errores). */
        $cmd->execute();
        /* Ejecuta una sentencia preparada pasando un array de valores */
        $listaDeClientesDeLaConsulta = $cmd->fetchAll();

        // Arreglo para llenar una lista de Articulos
        $listaDeClientes = array();
        $i = 0;

        foreach ($listaDeClientesDeLaConsulta as $registroCliente) {
            $objetoCliente = new Cliente();
            $objetoCliente->setIdCliente($registroCliente['idCliente']);
            $objetoCliente->setIdHotel($registroCliente['idHotel']);
            $objetoCliente->setCi($registroCliente['ci']);
            $objetoCliente->setPrimernombre($registroCliente['primerNombre']);
            $objetoCliente->setSegundoNombre($registroCliente['segundoNombre']);
            $objetoCliente->setApellidoPaterno($registroCliente['apellidoPaterno']);
            $objetoCliente->setApellidoMaterno($registroCliente['apellidoMaterno']);
            $objetoCliente->setTelefono($registroCliente['telefono']);
            $objetoCliente->setGenero($registroCliente['genero']);
            $objetoCliente->setFechaNacimiento($registroCliente['fechaNacimiento']);
            $objetoCliente->setUsuario($registroCliente['usuario']);
            $objetoCliente->setActivo($registroCliente['activo']);
            $listaDeClientes[$i] = $objetoCliente;
            $i++;
        }

        return $listaDeClientes;
    } //end function

    public function listaDeClientesActivos()
    {
        $sqlListaDeClientes = "CALL listaDeClientesActivos();";
        //PDO::prepare — Prepara una sentencia para su ejecución y devuelve un objeto sentencia

        $cmd = $this->conexion->prepare($sqlListaDeClientes);
        //Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). 
        /*Si el servidor de la base de datos prepara con éxito la sentencia, PDO::prepare() devuelve un objeto PDOStatement. Si no es posible, PDO::prepare() devuelve FALSE o emite una excepciónPDOException (dependiendo del manejo de errores). */
        $cmd->execute();
        /* Ejecuta una sentencia preparada pasando un array de valores */
        $listaDeClientesDeLaConsulta = $cmd->fetchAll();

        // Arreglo para llenar una lista de Cliente
        $listaDeClientes = array();
        $i = 0;

        foreach ($listaDeClientesDeLaConsulta as $registroCliente) {
            $objetoCliente = new Cliente();
            $objetoCliente->setIdCliente($registroCliente['idCliente']);
            $objetoCliente->setIdHotel($registroCliente['idHotel']);
            $objetoCliente->setCi($registroCliente['ci']);
            $objetoCliente->setPrimernombre($registroCliente['primerNombre']);
            $objetoCliente->setSegundoNombre($registroCliente['segundoNombre']);
            $objetoCliente->setApellidoPaterno($registroCliente['apellidoPaterno']);
            $objetoCliente->setApellidoMaterno($registroCliente['apellidoMaterno']);
            $objetoCliente->setTelefono($registroCliente['telefono']);
            $objetoCliente->setGenero($registroCliente['genero']);
            $objetoCliente->setFechaNacimiento($registroCliente['fechaNacimiento']);
            $objetoCliente->setUsuario($registroCliente['usuario']);
            $objetoCliente->setActivo($registroCliente['activo']);
            $listaDeClientes[$i] = $objetoCliente;
            $i++;
        }

        return $listaDeClientes;
    } //end function

    public function listaDeClientesPorCriterioNombreCliente($nombreCliente)
    {
        $sqlListaDeClientes = "CALL listaDeClientesPorNombre(:nombreCliente);";

        $cmd = $this->conexion->prepare($sqlListaDeClientes);
        $cmd->bindParam(':nombreCliente', $nombreCliente);
        $cmd->execute();
        /* Ejecuta una sentencia preparada pasando un array de valores */
        $listaDeClientesDeLaConsulta = $cmd->fetchAll();

        // Arreglo para llenar una lista de Articulos
        $listaDeClientes = array();
        $i = 0;

        foreach ($listaDeClientesDeLaConsulta as $registroCliente) {
            $objetoCliente = new Cliente();
            $objetoCliente->setIdCliente($registroCliente['idCliente']);
            $objetoCliente->setIdHotel($registroCliente['idHotel']);
            $objetoCliente->setCi($registroCliente['ci']);
            $objetoCliente->setPrimernombre($registroCliente['primerNombre']);
            $objetoCliente->setSegundoNombre($registroCliente['segundoNombre']);
            $objetoCliente->setApellidoPaterno($registroCliente['apellidoPaterno']);
            $objetoCliente->setApellidoMaterno($registroCliente['apellidoMaterno']);
            $objetoCliente->setTelefono($registroCliente['telefono']);
            $objetoCliente->setGenero($registroCliente['genero']);
            $objetoCliente->setFechaNacimiento($registroCliente['fechaNacimiento']);
            $objetoCliente->setUsuario($registroCliente['usuario']);
            $objetoCliente->setActivo($registroCliente['activo']);
            $listaDeClientes[$i] = $objetoCliente;
            $i++;
        }

        return $listaDeClientes;
    } //end function


    public function datosClientePorId($idCliente)
    {
        $sqlDatosCliente = " CALL datosClientePorId(:idCliente);";
        try {
            $cmd = $this->conexion->prepare($sqlDatosCliente);
            $cmd->bindParam(':idCliente', $idCliente);
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
    } //end function
    public function verificaExisteCi($ci)
    {
        $sqlValidarCliente = "SELECT ci FROM cliente WHERE ci=:ci; ";
        try {
            $cmd = $this->conexion->prepare($sqlValidarCliente);
            $cmd->bindParam(':ci', $ci);
            $cmd->execute();
            /* Ejecuta una sentencia preparada pasando un array de valores */
            /*Para este caso solamente habra un registro o nada*/
            $registroConsulta = $cmd->fetchAll();

            if ($registroConsulta) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo 'ERROR: Error en la busqueda del Ci Cliente - ' . $e->getMesage();
            exit();
            return false;
        };
    }
    public function verificaUsuarioContraseniaCliente($usuario, $contrasenia)
    {
        $sqlUsuarioContrasenia = "call verificaUsuarioContraseniaCliente(:usuario,:contrasenia);";
        try {
            $cmd = $this->conexion->prepare($sqlUsuarioContrasenia);
            $cmd->bindParam(':usuario', $usuario);
            $cmd->bindParam(':contrasenia', $contrasenia);
            $cmd->execute();
            /* Ejecuta una sentencia preparada pasando un array de valores */
            /*Para este caso solamente habra un registro o nada*/
            $registroConsulta = $cmd->fetch(\PDO::FETCH_ASSOC);

            if ($registroConsulta) {
                return $registroConsulta;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo 'ERROR: Error en la busqueda del Usuario y password - ' . $e->getMesage();
            exit();
            return false;
        };
    }
    public function listaDeClientesActivoPorIdHotel($idHotels)
    {
        $sqlBuscarClientes = " SELECT c.idCliente,concat_ws(' ',c.apellidoPaterno,c.apellidoMaterno,c.segundoNombre,c.primerNombre)as nombreCompleto
                                    from hotel h inner join cliente c on h.idHotel = c.idHotel
                                    and h.idHotel=:idHotels 
                                    order by c.apellidoPaterno";
        try {
            $cmd = $this->conexion->prepare($sqlBuscarClientes);
            $cmd->bindParam(':idHotels', $idHotels);
            $cmd->execute();
            $registroConsulta = $cmd->fetchAll();
            if ($registroConsulta) {
                return $registroConsulta;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo 'ERROR: No se logro actualizar estado Cliente - ' . $e->getMesage();
            exit();
            return false;
        }
    }
}
