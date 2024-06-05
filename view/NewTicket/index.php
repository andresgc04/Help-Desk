<?php
require_once("../../config/conexion.php");
if(isset($_SESSION["UsuarioID"]))
{
?>

<!DOCTYPE html>
<html>
<head lang="es">
    <?php require_once("../MainHead/head.php"); ?>
    <title>Help Desk - Nuevo Ticket</title>
</head>
<body class="with-side-menu">

    <?php require_once("../MainHeader/header.php"); ?>

	<div class="mobile-menu-left-overlay"></div>

    <?php require_once("../MainNav/nav.php") ?>

	<!-- Contenido -->
	<div class="page-content">
		<div class="container-fluid">
		<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Nuevo Ticket</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Home</a></li>
								<li class="active">Nuevo Ticket</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">
				<p>
					Gestionar Nuevos Tickets de Help-Desk:
				</p>

				<h5 class="m-t-lg with-border">Ingresar Informacion:</h5>

				<div class="row">
					<form method="POST" id="ticket_form">

						<input type="hidden" id="UsuarioID" name="UsuarioID" value="<?php echo $_SESSION["UsuarioID"] ?>"/>

						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="exampleInput">Categoria:</label>
								<select id="CategoriaID" name="CategoriaID" class="form-control"></select>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="Titulo_Ticket">Titulo:</label>
								<input type="text" class="form-control" id="Titulo_Ticket" name="Titulo_Ticket" placeholder="Ingrese El Titulo Del Ticket">
							</fieldset>
						</div>
						<div class="col-lg-12">
							<fieldset class="form-group">
								<label class="form-label semibold" for="exampleInputPassword1">Descripcion:</label>
								<div class="summernote-theme-1">
									<textarea id="Descripcion_Ticket" name="Descripcion_Ticket" class="summernote" name="name"></textarea>
								</div>
							</fieldset>
						</div>
						<div class="col-lg-12">
							<button type="submit" name="action" value="add" class="btn btn-rounded btn-inline btn-primary">Guardar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
 	<!-- Contenido -->

    <?php require_once("../MainJs/js.php"); ?>
	<script type="text/javascript" src="newticket.js"></script>
</body>
</html>

<?php
}
else
{
	header("Location:".Conectar::ruta()."index.php");
}
?>