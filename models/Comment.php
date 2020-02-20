<?php
class Comment extends Database
{
    private $id_Comment;
    private $text_Comment;
    private $id_Shows;
    private $id_Clients;

    public function getId_Comment()
    {
        return $this->id_Comment;
    }

    public function setId_Comment($id_Comment)
    {
        $this->id_Comment = $id_Comment;
    }

    public function getText_Comment()
    {
        return $this->text_Comment;
    }

    public function setText_Comment($text_Comment)
    {
        $this->text_Comment = $text_Comment;
    }

    public function getId_Shows()
    {
        return $this->id_Shows;
    }

    public function setId_Shows($id_Shows)
    {
        $this->id_Shows = $id_Shows;
    }


    public function getId_Clients()
    {
        return $this->id_Clients;
    }

    public function setId_Clients($id_Clients)
    {
        $this->id_Clients = $id_Clients;
    }

    public function __construct()
    {
        parent::__construct();
    }

    public function toList(){        
        $pdoQuery = "SELECT colyseum_comment.text_Comment, colyseum_clients.firstName_Clients, colyseum_shows.title_Shows 
        FROM colyseum_comment, colyseum_shows, colyseum_clients
        WHERE colyseum_comment.id_Shows=colyseum_shows.id_Shows 
        AND colyseum_comment.id_Clients=colyseum_clients.id_Clients";

        $pdoResult = $this->db->prepare($pdoQuery);
        
        if ($pdoResult->execute()) {
            $result = $pdoResult->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } else {
            echo 'Erreur';
        }
    }

}