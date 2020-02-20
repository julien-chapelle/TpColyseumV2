<?php
class Genres extends Database
{
    private $idGenres;
    private $nameGenres;
    private $idShowTypes;

    /**
     * Get the value of idGenres
     */ 
    public function getIdGenres()
    {
        return $this->idGenres;
    }
    /**
     * Set the value of idGenres
     *
     * @return  self
     */ 
    public function setIdGenres($idGenres)
    {
        $this->idGenres = $idGenres;

        return $this;
    }
    /**
     * Get the value of nameGenres
     */ 
    public function getNameGenres()
    {
        return $this->nameGenres;
    }
    /**
     * Set the value of nameGenres
     *
     * @return  self
     */ 
    public function setNameGenres($nameGenres)
    {
        $this->nameGenres = $nameGenres;

        return $this;
    }
    /**
     * Get the value of idShowTypes
     */ 
    public function getIdShowTypes()
    {
        return $this->idShowTypes;
    }
    /**
     * Set the value of idShowTypes
     *
     * @return  self
     */ 
    public function setIdShowTypes($idShowTypes)
    {
        $this->idShowTypes = $idShowTypes;

        return $this;
    }

    public function getListGenres()
    {
        $queryGenres = $this->db->query('SELECT * FROM `colyseum_genres`');
        return $queryGenres->fetchAll();
    }
}
?>