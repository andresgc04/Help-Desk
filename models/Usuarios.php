<?php
class Usuarios extends Conectar
{
    public function Login()
    {
        $conectar = parent::Conexion();
        parent::set_names();

        if(isset($_POST["enviar"]))
        {
            $correo = $_POST["Usuario_Correo"];
            $pass = $_POST["Usuario_Pass"];

            if(empty($correo) and empty($pass))
            {
                header("Location:".Conectar::ruta()."index.php?m=2");
                exit();
            }
            else
            {
                $sql = "SELECT * FROM tm_usuarios WHERE Usuario_Correo=? AND Usuario_Pass=? AND Estado = 1";
                $stmt = $conectar->prepare($sql);
                $stmt->bindValue(1, $correo);
                $stmt->bindValue(2,$pass);
                $stmt->execute();
                $resultado = $stmt->fetch();

                if(is_array($resultado) and count($resultado)>0)
                {
                    $_SESSION["UsuarioID"]=$resultado["UsuarioID"];
                    $_SESSION["RolID"]=$resultado["RolID"];
                    $_SESSION["Usuario_Nombre"]=$resultado["Usuario_Nombre"];
                    $_SESSION["Usuario_Apellido"]=$resultado["Usuario_Apellido"];
                    
                    header("Location:".Conectar::ruta()."view/Home/");
                    exit();
                }
                else
                {
                    header("Location:".Conectar::ruta()."index.php?m=1");
                    exit();
                }
            }
        }
    }
}
?>