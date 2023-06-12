<?php

namespace Model;

class Etudiant {
    private $id;
    private $fName;
    private $lName;
    private $email;
    private $password;
    private $phone;
    private $dateBirth;
    private $adresse;
    
    private static $table = "etudiants";

    public function __construct($id = "", $fName= "", $lName= "", $email= "", $password= "", $phone= "", $dateBirth= "", $adresse = "") {
        $this->id = $id;
        $this->fName = $fName;
        $this->lName = $lName;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
        $this->dateBirth = $dateBirth;
        $this->adresse = $adresse;
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
        $sql = "UPDATE ". self::$table ." SET fName = '$body[fName]', lName = '$body[lName]', email = '$body[email]', city = '$body[city]', adresse = '$body[adresse]', dateBirth = '$body[dateBirth]', phone = '$body[phone]'  WHERE id=$id";
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
        $sql = "INSERT INTO ". self::$table ." (fName, lName, email, dateBirth, phone, adresse, city) VALUES('$body[fName]','$body[lName]','$body[email]','$body[dateBirth]', '$body[phone]','$body[adresse]','$body[city]')";
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