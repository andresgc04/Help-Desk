<?php
class Categorias extends Conectar{
    public function getCategorias(){
        $conectar = parent::Conexion();
        parent::set_names();

        $sql = "SELECT * FROM tm_categorias WHERE EstadoID = 1;";
        $sql = $conectar -> prepare($sql);
        $sql->execute();

        return $resultado = $sql -> fetchAll();
    }
}
?>