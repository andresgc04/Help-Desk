<?php
class Tickets extends Conectar{
    public function insert_ticket($UsuarioID,$CategoriaID,$Titulo_Ticket,$Descripcion_Ticket){
        $conectar = parent::Conexion();
        parent::set_names();

        $sql="INSERT INTO tm_tickets (TicketID,UsuarioID,CategoriaID,Titulo_Ticket,Descripcion_Ticket,Estado) VALUES (NULL,?,?,?,?,'1');";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $UsuarioID);
        $sql->bindValue(2, $CategoriaID);
        $sql->bindValue(3, $Titulo_Ticket);
        $sql->bindValue(4, $Descripcion_Ticket);
        $sql->execute();

        return $resultado = $sql -> fetchAll();
    }
}
?>