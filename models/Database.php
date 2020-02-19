<?php
date_default_timezone_set('Europe/Paris');
setlocale(LC_ALL, 'fra', 'fr_FR.utf8');
session_start();
class Database
{
    protected $db;

    public function __construct()
    {
        // Initialisation de PDO
        try {
        $this->db = new PDO('mysql:host=localhost;dbname=colyseum2;charset=utf8', 'root', '');
        } catch (Exception $e) {
            //AFFICHE UN MESSAGE D'ERREUR SI N'EST PAS CONNECTE AU SERVEUR
            die('Erreur : ' . $e->getMessage()); 
        }
    }
}
?>