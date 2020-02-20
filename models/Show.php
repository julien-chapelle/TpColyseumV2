<?php
class Show extends Database
{
    private $id_Shows;
    private $img_Shows;
    private $title_Shows;
    private $performer_Shows;
    private $dateHour_Shows;
    private $duration_Shows;
    private $id_ShowTypes;
    private $id_Genres;

    public function getId_Shows()
    {
        return $this->id_Shows;
    }

    public function setId_Shows($id_Shows)
    {
        $this->id_Shows = $id_Shows;
    }
    public function getImg_Shows()
    {
        return $this->img_Shows;
    }

    public function setImg_Shows($img_Shows)
    {
        $this->img_Shows = $img_Shows;
    }

    public function getTitle_Shows()
    {
        return $this->title_Shows;
    }

    public function setTitle_Shows($title_Shows)
    {
        $this->title_Shows = $title_Shows;
    }

    public function getPerformer_Shows()
    {
        return $this->performer_Shows;
    }

    public function setPerformer_Shows($performer_Shows)
    {
        $this->performer_Shows = $performer_Shows;
    }

    public function getDateHour_Shows()
    {
        return $this->dateHour_Shows;
    }

    public function setDateHour_Shows($dateHour_Shows)
    {
        $this->dateHour_Shows = $dateHour_Shows;
    }

    public function getDuration_Shows()
    {
        return $this->duration_Shows;
    }

    public function setDuration_Shows($duration_Shows)
    {
        $this->duration_Shows = $duration_Shows;
    }

    public function getId_ShowTypes()
    {
        return $this->id_ShowTypes;
    }

    public function setId_ShowTypes($id_ShowTypes)
    {
        $this->id_ShowTypes = $id_ShowTypes;
    }
    public function getId_Genres()
    {
        return $this->id_Genres;
    }

    public function setId_Genres($id_Genres)
    {
        $this->id_Genres = $id_Genres;
    }

    public function __construct()
    {
        parent::__construct();
    }
    public function getShow($idShows)
    {
        $queryShows = $this->db->query('SELECT * FROM `colyseum_shows` INNER JOIN `colyseum_showtypes` ON `colyseum_shows`.`id_ShowTypes` = `colyseum_showtypes`.`id_ShowTypes` INNER JOIN `colyseum_genres` ON `colyseum_shows`.`id_Genres` = `colyseum_genres`.`id_Genres` WHERE `id_Shows` = ' . $idShows);
        foreach ($queryShows->fetchAll() as $index => $value)
        {
            $this->setId_Shows($value['id_Shows']);
            $this->setImg_Shows($value['img_Shows']);
            $this->setTitle_Shows($value['title_Shows']);
            $this->setPerformer_Shows($value['performer_Shows']);
            $this->setDateHour_Shows($value['dateHour_Shows']);
            $this->setDuration_Shows($value['duration_Shows']);
            $this->setId_ShowTypes($value['types_ShowTypes']);
            $this->setId_Genres($value['name_Genres']);
        }
    }
    public function addShows()
    {
        $queryShows = $this->db->prepare('INSERT INTO `colyseum_shows` (`img_Shows`, `title_Shows`, `performer_Shows`, `dateHour_Shows`, `duration_Shows`, `id_ShowTypes`, `id_Genres`) VALUES (:imgShows, :titleShows, :performerShows, :dateHourShows, :durationShows, :idShowtypes, :idGenres)');
        $queryShows->bindValue(':imgShows', $this->getImg_Shows(), PDO::PARAM_STR);
        $queryShows->bindValue(':titleShows', $this->getTitle_Shows(), PDO::PARAM_STR);
        $queryShows->bindValue(':performerShows', $this->getPerformer_Shows(), PDO::PARAM_STR);
        $queryShows->bindValue(':dateHourShows', $this->getDateHour_Shows(), PDO::PARAM_STR);
        $queryShows->bindValue(':durationShows', $this->getDuration_Shows(), PDO::PARAM_STR);
        $queryShows->bindValue(':idShowtypes', $this->getId_ShowTypes(), PDO::PARAM_INT);
        $queryShows->bindValue(':idGenres', $this->getId_Genres(), PDO::PARAM_INT);
        $queryShows->execute();

    }
    public function updateShows($idShows)
    {
        $queryUpdateShow = $this->db->prepare('UPDATE `colyseum_shows` SET `img_Shows` = :imgShows, `title_Shows` = :titleShows, `performer_Shows` = :performerShows, `dateHour_Shows` = :dateHourShows, `duration_Shows` = :durationShows, `id_ShowTypes` = :id_ShowTypes, `id_Genres` = :id_Genres WHERE `id_Shows` = ' . $idShows);
        $queryUpdateShow->bindValue(':imgShows', $this->getImg_Shows(), PDO::PARAM_STR);
        $queryUpdateShow->bindValue(':titleShows', $this->getTitle_Shows(), PDO::PARAM_STR);
        $queryUpdateShow->bindValue(':performerShows', $this->getPerformer_Shows(), PDO::PARAM_STR);
        $queryUpdateShow->bindValue(':dateHourShows', $this->getDateHour_Shows(), PDO::PARAM_STR);
        $queryUpdateShow->bindValue(':durationShows', $this->getDuration_Shows(), PDO::PARAM_STR);
        $queryUpdateShow->bindValue(':id_ShowTypes', $this->getId_ShowTypes(), PDO::PARAM_INT);
        $queryUpdateShow->bindValue(':id_Genres', $this->getId_Genres(), PDO::PARAM_INT);
        $queryUpdateShow->execute();
    }
    public function deleteShows($idShows)
    {
        $this->db->exec('DELETE FROM `colyseum_shows` WHERE `id_Shows` = ' . $idShows);
    }
    public function toSearch($search)
    {
        $query_search = 'SELECT colyseum_Shows.img_Shows, colyseum_Shows.title_Shows, 
        colyseum_Shows.performer_Shows, colyseum_Shows.dateHour_Shows, colyseum_Shows.duration_Shows,
         colyseum_ShowTypes.types_ShowTypes FROM colyseum_Shows INNER JOIN colyseum_ShowTypes 
         on colyseum_Shows.id_ShowTypes=colyseum_showtypes.id_ShowTypes WHERE colyseum_Shows.title_Shows
        LIKE :search';

        $pdoResult = $this->db->prepare($query_search);
        $pdoResult->bindValue(':search', "%" . $search . "%", PDO::PARAM_STR);

        if ($pdoResult->execute()) {
            $result = $pdoResult->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } else {
            echo 'Erreur';
        }

    }
    public function toListAll()
    {
        $query_all = $this->db->query('SELECT * FROM `colyseum_shows` INNER JOIN `colyseum_showtypes` ON `colyseum_shows`.`id_ShowTypes` = `colyseum_showtypes`.`id_ShowTypes` INNER JOIN `colyseum_genres` ON `colyseum_shows`.`id_Genres` = `colyseum_genres`.`id_Genres`');
        return $query_all->fetchAll();
    }
    public function toListByMonth()
    {  
        
       $query_cards = 'SELECT colyseum_shows.img_Shows, colyseum_shows.title_Shows, colyseum_shows.performer_Shows, colyseum_shows.dateHour_Shows, colyseum_shows.duration_Shows, colyseum_showTypes.types_ShowTypes, DATE_FORMAT(colyseum_shows.dateHour_Shows,\'%M\') as `month` FROM colyseum_shows INNER JOIN colyseum_showtypes ON colyseum_shows.id_ShowTypes = colyseum_showtypes.id_ShowTypes ORDER BY UNIX_TIMESTAMP(colyseum_shows.dateHour_Shows) ASC';

        $pdoResult = $this->db->prepare($query_cards);
        
        if ($pdoResult->execute())
        {
            $result = $pdoResult->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        else
        {
            echo 'Erreur';
        }
    }
}
?>