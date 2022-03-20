<?php
require_once("../config/conexion.php");
require_once("../models/Tickets.php");

$tickets = new Tickets();

switch($_GET["op"]){
    case "insert":
        $tickets -> insert_ticket($_POST["UsuarioID"],$_POST["CategoriaID"],$_POST["Titulo_Ticket"],$_POST["Descripcion_Ticket"]);
    break;
    case "listar_x_usuarios":
        $datos = $tickets -> listar_ticket_x_usuarios($_POST["UsuarioID"]);
        $data = Array();

        foreach($datos as $row)
        {
            $sub_array = array();
            $sub_array[] = $row["TicketID"];
            $sub_array[] = $row["Titulo_Ticket"];
            $sub_array[] = $row["Nombre_Categoria"];
            $sub_array[] = date("d/m/Y H:i:s", strtotime($row["Fecha_Creacion"]));
            $sub_array[] = '<button type="button" onClick="ver('.$row["TicketID"].');" id="'.$row["TicketID"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><div><i class="fa fa-eye"></i></div></button>';
            $data[]=$sub_array;
        }

        $results = array
        (
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data
        );

        echo json_encode($results);
    break;
}
?>