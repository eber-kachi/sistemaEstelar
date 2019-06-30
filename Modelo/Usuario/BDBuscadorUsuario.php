<?php
class BDBuscadorUsuario
{
    private $conexion;
    public function __construct()
    {
        $this->conexion = new Conexion;
    }
    public function verificaUsuarioContraseniaUsuario($usuario, $contrasenia)
    {
        $sqlUsuarioContrasenia = "call  verificaUsuarioContraseniaUsuario(:usuario,:contrasenia)";
        try {
            $cmd = $this->conexion->prepare($sqlUsuarioContrasenia);
            $cmd->bindParam(':usuario', $usuario);
            $cmd->bindParam('contrasenia', $contrasenia);
            $cmd->execute();

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
        }
    }
}
