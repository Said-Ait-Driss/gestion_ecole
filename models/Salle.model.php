<?php

namespace Model;

class Salle {
    private $id;
    private $nom;
    private $etat; // good , bad ,under construction,...
    private $description;
    
    private static $table = "salles";

    public function __construct($id = "", $nom = "", $etat = "",$description = "") {
        $this->id = $id;
        $this->nom = $nom;
        $this->etat = $etat;
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
        $sql = "SELECT * FROM ". self::$table ." LIMIT $offset, $limit";
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
        $sql = "UPDATE ". self::$table ." SET nom = '$body[nom]',etat = '$body[etat]', description = '$body[description]'  WHERE id=$id";
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
        $sql = "INSERT INTO ". self::$table ." (nom, etat, description) VALUES('$body[nom]','$body[etat]','$body[description]')";
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