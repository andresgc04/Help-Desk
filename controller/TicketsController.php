<?php
require_once("../config/conexion.php");
require_once("../models/Tickets.php");

$tickets = new Tickets();

switch($_GET["op"]){
    case "insert":
        $tickets -> insert_ticket($_POST["UsuarioID"],$_POST["CategoriaID"],$_POST["Titulo_Ticket"],$_POST["Descripcion_Ticket"]);
    break;
}
?>