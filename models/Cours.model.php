<?php

namespace Model;

class Cours {
    private $id;
    private $nom;
    private $id_enseignant;
    private $description;
    
    private static $table = "cours";

    public function __construct($id = "", $nom = "", $id_enseignant = "",$description = "") {
        $this->id = $id;
        $this->nom = $nom;
        $this->id_enseignant = $id_enseignant;
        $this->description = $description;
    }

    private static function totalItems($items_per_page){
        $db = $GLOBALS['db'];
        $sql = "SELECT COUNT(*) FROM ". self::$table ."";
        $total = $db->totalRecords($sql);
        $total_pages = ceil($total / $items_per_page);
        return  $total_pages;
    }

    public static function paginate($page = 1,$limit = 5){
        $db = $GLOBALS['db'];
        $offset = ($page - 1) * $limit;
        $sql = "SELECT c.id, c.nom, c.description ,CONCAT(e.fName ,' ', e.lName) as enseignant FROM cours as c JOIN enseignants as e ON e.id = c.id_enseignant LIMIT 0, 5";
        $result = $db->query($sql);
        $total_pages = self::totalItems($limit);
        $current_page = $page;
        return [
            "data"=>$result,
            "total_pages"=>$total_pages,
            "current_page" => $current_page
        ];
    }

    public static function find($id){
        $db = $GLOBALS['db'];
        $sql = "SELECT * FROM ". self::$table ." WHERE id=$id";
        $result = $db->query($sql);
        return [
            "data"=>$result[0],
            "id"=>$id,
            "errors"=>[],
        ];
    }

    public static function update($body,$id){

        $db = $GLOBALS['db'];
        $sql = "UPDATE ". self::$table ." SET nom = '$body[nom]',id_enseignant = '$body[id_enseignant]', description = '$body[description]'  WHERE id=$id";
        $result = $db->totalRecords($sql);
        return $result;
    }


    public static function findBy( $body, $arr){
        $db = $GLOBALS['db'];
        $conditions = [];
        foreach ($arr as $field) {
            $conditions[] = "$field = '" . $body[$field] . "'";
        }
        $sql = "SELECT * FROM " . self::$table . " WHERE " . implode(" OR ", $conditions);
        $result = $db->query($sql);
        return [
            "data"=>$result,
            "errors"=>[],
        ];

    }

    public static function store($body){
        $db = $GLOBALS['db'];
        $sql = "INSERT INTO ". self::$table ." (nom, id_enseignant, description) VALUES('$body[nom]','$body[id_enseignant]','$body[description]')";
        $result = $db->totalRecords($sql);
        return $result;
    }


    public static function delete($id){
        $db = $GLOBALS['db'];
        $sql = "DELETE FROM " . self::$table . " WHERE id=$id";
        $result = $db->totalRecords($sql);
        return $result;
    }
}