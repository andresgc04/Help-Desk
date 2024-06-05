<?php
require_once("../config/conexion.php");
require_once("../models/Tickets.php");

$tickets = new Tickets();

switch ($_GET["op"]) {
    case "insert":
        $tickets->insert_ticket($_POST["UsuarioID"], $_POST["CategoriaID"], $_POST["Titulo_Ticket"], $_POST["Descripcion_Ticket"]);
        break;
    case "listar_x_usuarios":
        $datos = $tickets->listar_ticket_x_usuarios($_POST["UsuarioID"]);
        $data = array();

        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["TicketID"];
            $sub_array[] = $row["Titulo_Ticket"];
            $sub_array[] = $row["Nombre_Categoria"];

            if ($row["Estado"] == "Abierto") {
                $sub_array[] = '<span class="label label-pill label-success">Abierto</span>';
            }

            if ($row["Estado"] == "Cerrado") {
                $sub_array[] = '<span class="label label-pill label-danger">Cerrado</span>';
            }

            $sub_array[] = date("d/m/Y H:i:s", strtotime($row["Fecha_Creacion"]));
            $sub_array[] = '<button type="button" onClick="ver(' . $row["TicketID"] . ');" id="' . $row["TicketID"] . '" class="btn btn-inline btn-primary btn-sm ladda-button"><div><i class="fa fa-eye"></i></div></button>';
            $data[] = $sub_array;
        }

        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );

        echo json_encode($results);
        break;
    case "listar_tickets":
        $datos = $tickets->listar_tickets();
        $data = array();

        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["TicketID"];
            $sub_array[] = $row["Titulo_Ticket"];
            $sub_array[] = $row["Nombre_Categoria"];

            if ($row["Estado"] == "Abierto") {
                $sub_array[] = '<span class="label label-pill label-success">Abierto</span>';
            }

            if ($row["Estado"] == "Cerrado") {
                $sub_array[] = '<span class="label label-pill label-danger">Cerrado</span>';
            }

            $sub_array[] = date("d/m/Y H:i:s", strtotime($row["Fecha_Creacion"]));
            $sub_array[] = '<button type="button" onClick="ver(' . $row["TicketID"] . ');" id="' . $row["TicketID"] . '" class="btn btn-inline btn-primary btn-sm ladda-button"><div><i class="fa fa-eye"></i></div></button>';
            $data[] = $sub_array;
        }

        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );

        echo json_encode($results);
        break;

    case "listarTicketDetalle":
        $datos = $tickets->listar_ticket_detalle_x_ticket($_POST['ticketID']);
?>
        <?php
        foreach ($datos as $row) {
        ?>
            <article class="activity-line-item box-typical">
                <div class="activity-line-date">
                    <?php echo date("d/m/Y", strtotime($row['Fecha_Creacion'])); ?>
                </div>
                <header class="activity-line-item-header">
                    <div class="activity-line-item-user">
                        <div class="activity-line-item-user-photo">
                            <a href="#">
                                <img src="../../public/img/photo-64-2.jpg" alt="">
                            </a>
                        </div>
                        <div class="activity-line-item-user-name"><?php echo $row['Usuario_Nombre'] . ' ' . $row['Usuario_Apellido']; ?></div>
                        <div class="activity-line-item-user-status">
                            <?php
                            if ($row['ROLID'] == 1) {
                                echo 'Usuario';
                            } else {
                                echo 'Soporte';
                            }
                            ?>
                        </div>
                    </div>
                </header>
                <div class="activity-line-action-list">
                    <section class="activity-line-action">
                        <div class="time"><?php echo date("H:i:s", strtotime($row['Fecha_Creacion'])); ?></div>
                        <div class="cont">
                            <div class="cont-in">
                                <p><?php echo $row['Descripcion_Ticket_Detalle']; ?></p>
                            </div>
                        </div>
                    </section>
                </div>
            </article>
        <?php
        }
        ?>

<?php
        break;
}
?>