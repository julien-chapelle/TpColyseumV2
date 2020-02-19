<?php
class Admin extends Database
{
    private $idAdmin;
    private $loginAdmin;
    private $passwordAdmin;

    public function getIdAdmin()
    {
        return $this->idAdmin;
    }
    public function setIdAdmin($idAdmin)
    {
        $this->idAdmin = $idAdmin;
    }
    public function getLoginAdmin()
    {
        return $this->loginAdmin;
    }
    public function setLoginAdmin($loginAdmin)
    {
        $this->loginAdmin = $loginAdmin;
    }
    public function getPasswordAdmin()
    {
        return $this->passwordAdmin;
    }
    public function setPasswordAdmin($passwordAdmin)
    {
        $this->passwordAdmin = $passwordAdmin;
    }
    public function getAdmin($idAdmin)
    {
        $queryAdmin = $this->db->query('SELECT * FROM `colyseum_admin` WHERE `id_Admin` = ' . $idAdmin);
        return $queryAdmin->fetchAll();
    }
    public function connexionAdmin()
    {
        $queryAdmin = $this->db->prepare('SELECT * FROM `colyseum_admin` WHERE `login_Admin` = :loginAdmin AND `password_Admin` = :passwordAdmin');
        $queryAdmin->bindValue(':loginAdmin', $this->getLoginAdmin(), PDO::PARAM_STR);
        $queryAdmin->bindValue(':passwordAdmin', $this->getPasswordAdmin(), PDO::PARAM_STR);
        if ($queryAdmin->execute())
        {
            foreach ($queryAdmin->fetchAll() as $index => $value)
            {
                $this->setIdAdmin($value['id_Admin']);
            }
            return true;
        }
        else
        {
            return false;
        }
    }
}
?>