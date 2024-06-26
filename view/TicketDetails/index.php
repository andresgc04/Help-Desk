<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["UsuarioID"])) {
?>

    <!DOCTYPE html>
    <html>

    <head lang="es">
        <?php require_once("../MainHead/head.php"); ?>
        <title>Help Desk - Consultar Ticket</title>
    </head>

    <body class="with-side-menu">

        <?php require_once("../MainHeader/header.php"); ?>

        <div class="mobile-menu-left-overlay"></div>

        <?php require_once("../MainNav/nav.php") ?>

        <!-- Contenido -->
        <div class="page-content">
            <div class="container-fluid">
                <div class="container-fluid">
                    <section id="ticketDetalles" class="activity-line">

                    </section>
                </div>
            </div>
            <!-- Contenido -->

            <?php require_once("../MainJs/js.php"); ?>
            <script type="text/javascript" src="ticket_details.js"></script>
    </body>

    </html>

<?php
} else {
    header("Location:" . Conectar::ruta() . "index.php");
}
?>