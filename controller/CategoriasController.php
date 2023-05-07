<?php
require_once("../config/conexion.php");
require_once("../models/Categorias.php");

$categorias = new Categorias();

switch($_GET["op"]){
    case "combo":
        $datos = $categorias -> getCategorias();
        if(is_array($datos) == true and count($datos)>0){

            $html .= "<option selected disabled>Por Favor Seleccione La Categoría Correspondiente.</option>";
            
            foreach($datos as $row)
            {
                $html.="<option value = '".$row['CategoriaID']."'>".$row['Nombre_Categoria']."</option>";
            }

            echo $html;
        }
    break;
}
?>