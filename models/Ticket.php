<?php 
class Ticket extends Database
{
    private $id_Ticket;
    private $price_Ticket;
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
    public function getIdShows()
    {
        return $this->id_Shows;
    }
    public function setIdShows($idShows)
    {
        $this->id_Shows = $idShows;
    }
    public function getListTickets()
    {
        $queryTickets = $this->db->query('SELECT * FROM `colyseum_tickets`');
        return $queryTickets->fetchAll();
    }
}
?>