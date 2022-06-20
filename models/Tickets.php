<?php
class Tickets extends Conectar{
    public function insert_ticket($UsuarioID,$CategoriaID,$Titulo_Ticket,$Descripcion_Ticket){
        $conectar = parent::Conexion();
        parent::set_names();

        $sql="INSERT INTO tm_tickets (TicketID,UsuarioID,CategoriaID,Titulo_Ticket,Descripcion_Ticket,Fecha_Creacion,EstadoID) VALUES (NULL,?,?,?,?,now(),'1');";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $UsuarioID);
        $sql->bindValue(2, $CategoriaID);
        $sql->bindValue(3, $Titulo_Ticket);
        $sql->bindValue(4, $Descripcion_Ticket);
        $sql->execute();

        return $resultado = $sql -> fetchAll();
    }

    public function listar_ticket_x_usuarios($UsuarioID){
        $conectar = parent::Conexion();
        parent::set_names();

        $sql = "SELECT 
                tm_tickets.TicketID, 
                tm_tickets.UsuarioID, 
                tm_tickets.CategoriaID, 
                tm_tickets.Titulo_Ticket, 
                tm_tickets.Descripcion_Ticket, 
                tm_estados.Estado,
                tm_tickets.Fecha_Creacion,
                tm_usuarios.Usuario_Nombre, 
                tm_usuarios.Usuario_Apellido, 
                tm_categorias.Nombre_Categoria 
                FROM tm_tickets 
                INNER JOIN tm_categorias ON tm_tickets.CategoriaID = tm_categorias.CategoriaID 
                INNER JOIN tm_usuarios ON tm_tickets.UsuarioID = tm_usuarios.UsuarioID 
                INNER JOIN tm_estados ON tm_tickets.EstadoID = tm_estados.EstadoID
                WHERE tm_tickets.EstadoID = 1 
                AND tm_usuarios.UsuarioID=?";
        $sql = $conectar -> prepare($sql);
        $sql -> bindValue(1,$UsuarioID);
        $sql -> execute();

        return $resultado = $sql -> fetchAll();
    }

    public function listar_tickets(){
        $conectar = parent::Conexion();
        parent::set_names();

        $sql = "SELECT 
                tm_tickets.TicketID, 
                tm_tickets.UsuarioID, 
                tm_tickets.CategoriaID, 
                tm_tickets.Titulo_Ticket, 
                tm_tickets.Descripcion_Ticket, 
                tm_estados.Estado,
                tm_tickets.Fecha_Creacion,
                tm_usuarios.Usuario_Nombre, 
                tm_usuarios.Usuario_Apellido, 
                tm_categorias.Nombre_Categoria 
                FROM tm_tickets 
                INNER JOIN tm_categorias ON tm_tickets.CategoriaID = tm_categorias.CategoriaID 
                INNER JOIN tm_usuarios ON tm_tickets.UsuarioID = tm_usuarios.UsuarioID 
                INNER JOIN tm_estados ON tm_tickets.EstadoID = tm_estados.EstadoID
                WHERE tm_tickets.EstadoID = 1";
        $sql = $conectar -> prepare($sql);
        $sql -> execute();

        return $resultado = $sql -> fetchAll();
    }
}
?>