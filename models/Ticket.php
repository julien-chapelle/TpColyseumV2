<?php 
class Ticket extends Database
{
    private $id_Ticket;
    private $price_Ticket;
    private $types_Tickets;
    private $id_Shows;

    public function getIdTicket()
    {
        return $this->id_Ticket;
    }
    public function setIdTicket($idTicket)
    {
        $this->id_Ticket = $idTicket;
    }
    public function getPriceTicket()
    {
        return $this->price_Ticket;
    }
    public function setPriceTicket($priceTicket)
    {
        $this->price_Ticket = $priceTicket;
    }
    public function getTypesTicket()
    {
        return $this->types_Tickets;
    }
    public function setTypesTickets($typesTickets)
    {
        $this->types_Tickets = $typesTickets;
    }
    public function getIdShows()
    {
        return $this->id_Shows;
    }
    public function setIdShows($idShows)
    {
        $this->id_Shows = $idShows;
    }
    public function getTicketsByShows($idShow)
    {
        $queryTickets = $this->db->query('SELECT * FROM `colyseum_tickets` INNER JOIN `colyseum_shows` ON `colyseum_tickets`.`id_Shows` = `colyseum_shows`.`id_Shows` WHERE `colyseum_shows`.`id_Shows` = ' . $idShow);
        return $queryTickets->fetchAll();
    }
    public function getListTickets()
    {
        $queryTickets = $this->db->query('SELECT * FROM `colyseum_tickets` INNER JOIN `colyseum_shows` ON `colyseum_tickets`.`id_Shows` = `colyseum_shows`.`id_Shows` ORDER BY `title_Shows`');
        return $queryTickets->fetchAll();
    }
    public function addTicket()
    {
        $queryTickets = $this->db->prepare('INSERT INTO `colyseum_tickets` (`price_Tickets`, `type_Tickets`, `id_Shows`) VALUES (:priceTickets, :typeTickets, :idShows)');
        $queryTickets->bindValue(':priceTickets', $this->getPriceTicket(), PDO::PARAM_INT);
        $queryTickets->bindValue(':typeTickets', $this->getTypesTicket(), PDO::PARAM_STR);
        $queryTickets->bindValue(':idShows', $this->getIdShows(), PDO::PARAM_INT);
        var_dump($queryTickets->execute());
    }
    public function updateTicket($idTicket)
    {
        $queryTickets = $this->db->prepare('UPDATE `colyseum_tickets` SET `price_Tickets` = :price_Tickets, `type_Tickets` = :type_Tickets, `id_Shows` = :id_Shows WHERE `id_Tickets` = ' . $idTicket);
        $queryTickets->bindValue(':price_Tickets', $this->getPriceTicket(), PDO::PARAM_STR);
        $queryTickets->bindValue(':type_Tickets', $this->getTypesTicket(), PDO::PARAM_STR);
        $queryTickets->bindValue(':id_Shows', $this->getIdShows(), PDO::PARAM_INT);
        $queryTickets->execute();
    }
    public function deleteTicket($idTicket)
    {
        $this->db->exec('DELETE FROM `colyseum_tickets` WHERE `id_Tickets` = ' . $idTicket);
    }
}
?>