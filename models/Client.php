<?php
class Clients extends Database
{
    //Attributs////////////////////////////////////////
    private $_id_Clients;
    private $_lastName_Clients;
    private $_firstName_Clients;
    private $_birthDate_Clients;
    private $_mail_Clients;
    private $_password_Clients;

    //Méthodes d'appels Get/set//////////////////////////
    //ID
    public function getId()
    {
        return $this->_id_Clients;
    }

    public function setId($id_Clients)
    {
        $this->_id_Clients = $id_Clients;
    }
    //LASTNAME
    public function getLastname()
    {
        return $this->_lastName_Clients;
    }

    public function setLastname($lastName_Clients)
    {
        $this->_lastName_Clients = $lastName_Clients;
    }
    //FIRSTNAME
    public function getFirstname()
    {
        return $this->_firstName_Clients;
    }

    public function setFirstname($firstName_Clients)
    {
        $this->_firstName_Clients = $firstName_Clients;
    }
    //BIRTHDATE
    public function getBirthdate()
    {
        return $this->_birthDate_Clients;
    }

    public function setBirthdate($birthDate_Clients)
    {
        $this->_birthDate_Clients = $birthDate_Clients;
    }
    //MAIL
    public function getMail()
    {
        return $this->_mail_Clients;
    }

    public function setMail($mail_Clients)
    {
        $this->_mail_Clients = $mail_Clients;
    }

    //PASSWORD
    public function getPassword()
    {
        return $this->_password_Clients;
    }

    public function setPassword($password_Clients)
    {
        $this->_password_Clients = $password_Clients;
    }

    //Constructeur
    public function __construct()
    {
        parent::__construct();
    }

    //Méthodes////////////////////////////////////////////////////////
    //ADD CLIENT
    public function addClients()
    {
        $addClientsQuery = "INSERT INTO `colyseum_clients`(`lastName_Clients`,`firstName_Clients`,`birthDate_Clients`,`mail_Clients`,`password_Clients`) 
        VALUES (:lastName,:firstName,:birthDate,:mail,:passwords)";

        $addClientsResult = $this->db->prepare($addClientsQuery);
        $addClientsResult->bindValue(':lastName', $this->getLastname(), PDO::PARAM_STR);
        $addClientsResult->bindValue(':firstName', $this->getFirstname(), PDO::PARAM_STR);
        $addClientsResult->bindValue(':birthDate', $this->getBirthdate(), PDO::PARAM_STR);
        $addClientsResult->bindValue(':mail', $this->getMail(), PDO::PARAM_STR);
        $addClientsResult->bindValue(':passwords', $this->getPassword(), PDO::PARAM_STR);
        $addClientsResult->execute();
        $lastId = $this->db->lastInsertId();
        return $lastId;
    }
    //LIST CLIENT
    public function listClients()
    {
        $listClientsQuery = "SELECT * FROM `colyseum_clients`";

        $listClientsResult = $this->db->prepare($listClientsQuery);
        if ($listClientsResult->execute()) {
            $dataListClients = $listClientsResult->fetchAll(PDO::FETCH_ASSOC);
            return $dataListClients;
        }
    }
    //CLIENT DETAIL
    public function detailClients()
    {
        $detailClientsQuery = "SELECT * FROM `colyseum_clients`
        WHERE `id_Clients` = :currentId";

        $detailClientsResult = $this->db->prepare($detailClientsQuery);
        $detailClientsResult->bindValue(':currentId', $this->getId(), PDO::PARAM_INT);
        if ($detailClientsResult->execute()) {
            $detailClients = $detailClientsResult->fetchAll(PDO::FETCH_ASSOC);
            return $detailClients;
        };
    }
    //EDIT CLIENT INFO
    public function editClientsInfo()
    {
        $editClientsInfoQuery = "UPDATE `colyseum_clients`
        SET `lastName_Clients` = :lastname,`firstName_Clients` = :firstname,`birthDate_Clients` = :birthdate,`mail_Clients` = :mail
        WHERE `id_Clients` = :currentId";

        $editClientsInfoResult = $this->db->prepare($editClientsInfoQuery);
        $editClientsInfoResult->bindValue(':currentId', $this->getId(), PDO::PARAM_INT);
        $editClientsInfoResult->bindValue(':lastname', $this->getLastname(), PDO::PARAM_STR);
        $editClientsInfoResult->bindValue(':firstname', $this->getFirstname(), PDO::PARAM_STR);
        $editClientsInfoResult->bindValue(':birthdate', $this->getBirthdate(), PDO::PARAM_STR);
        $editClientsInfoResult->bindValue(':mail', $this->getMail(), PDO::PARAM_STR);
        $editClientsInfoResult->execute();
    }
    //EDIT USER PASSWORD
    public function editClientsPassword()
    {
        $editClientsPasswordQuery = "UPDATE `colyseum_clients`
        SET `password_Clients` = :passwords
        WHERE `id_Clients` = :currentId";

        $editClientsPasswordResult = $this->db->prepare($editClientsPasswordQuery);
        $editClientsPasswordResult->bindValue(':currentId', $this->getId(), PDO::PARAM_INT);
        $editClientsPasswordResult->bindValue(':passwords', $this->getPassword(), PDO::PARAM_STR);
        $editClientsPasswordResult->execute();
    }
    //DELETE CLIENT
    public function deleteClients()
    {
        $deleteClientsQuery = "DELETE FROM `colyseum_clients` 
        WHERE `id_Clients` = :currentId";

        $deleteClients = $this->db->prepare($deleteClientsQuery);
        $deleteClients->bindValue(':currentId', $this->getId(), PDO::PARAM_INT);
        $deleteClients->execute();
    }
    //CLIENT BOOKING
    public function bookingClients()
    {
        $bookingClientsQuery = "SELECT `colyseum_clients`.`id_Clients`, 
        FROM `colyseum_clients`
        WHERE `id_Clients` = :currentId";

        $bookingClientsResult = $this->db->prepare($bookingClientsQuery);
        $bookingClientsResult->bindValue(':currentId', $this->getId(), PDO::PARAM_INT);
        if ($bookingClientsResult->execute()) {
            $bookingClients = $bookingClientsResult->fetchAll(PDO::FETCH_ASSOC);
            return $bookingClients;
        };
    }
}
?>