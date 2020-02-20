<?php
class ShowTypes extends Database
{
    private $idShowTypes;
    private $typesShowTypes;

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
    /**
     * Get the value of typesShowTypes
     */ 
    public function getTypesShowTypes()
    {
        return $this->typesShowTypes;
    }
    /**
     * Set the value of typesShowTypes
     *
     * @return  self
     */ 
    public function setTypesShowTypes($typesShowTypes)
    {
        $this->typesShowTypes = $typesShowTypes;

        return $this;
    }
    public function getListShowTypes()
    {
        $queryShowTypes = $this->db->query('SELECT * FROM `colyseum_showtypes`');
        return $queryShowTypes->fetchAll();
    }
}
?>