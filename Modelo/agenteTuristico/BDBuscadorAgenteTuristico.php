<?php
class BDBuscadorAgenteTuristico
{
    private $conexion;

    function __construct()
    {
        $this->conexion =  new Conexion();
    } //end construct

    public function verificaUsuarioContraseniaUsuario($usuario, $contrasenia)
    {
        $sqlUsuarioContrasenia = "call verificaUsuarioContraseniaAgenteTuristico(:usuario,:contrasenia);";
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
            echo 'ERROR: Error en la busqueda del Usuario y password  Agente turistico- ' . $e->getMesage();
            exit();
            return false;
        };
    }
}
