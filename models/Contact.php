<?php
class Contact extends DataBase
{
    private $idContact;
    private $objectContact;
    private $textContact;
    private $idClients;

    public function getIdContact()
    {
        return $this->idContact;
    }
    public function setIdContact($idContact)
    {
        $this->idContact = $idContact;
    }
    public function getObjectContact()
    {
        return $this->objectContact;
    }
    public function setObjectContact($objectContact)
    {
        $this->objectContact = $objectContact;
    }
    public function getTextContact()
    {
        return $this->textContact;
    }
    public function setTextContact($textContact)
    {
        $this->textContact = $textContact;
    }
    public function getIdClients()
    {
        return $this->idClients;
    }
    public function setIdClients($idClients)
    {
        $this->idClients = $idClients;
    }
    public function getListContact()
    {
        $queryContact = $this->db->query('SELECT * FROM `colyseum_contact`');
        return $queryContact->fetchAll();
    }
    public function getContact($idContact)
    {
        $queryContact = $this->db->query('SELECT * FROM `colyseum_contact` WHERE `id_Contact` = ' . $idContact);
        return $queryContact->fetchAll();
    }
    public function addContact()
    {
        $queryContact = $this->db->prepare('INSERT INTO `colyseum_contact` (`object_Contact`, `text_Contact`, `id_Clients`) VALUES (:objectContact, :textContact, :idClients)');
        $queryContact->bindValue(':objectContact', $this->getObjectContact(), PDO::PARAM_STR);
        $queryContact->bindValue(':textContact', $this->getTextContact(), PDO::PARAM_STR);
        $queryContact->bindValue(':idClients', $this->getIdClients(), PDO::PARAM_STR);
        $queryContact->execute();
    }
}
?>