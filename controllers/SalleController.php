<?php

require_once __DIR__ . "/../models/Salle.model.php";
require_once __DIR__ . "/../app/Validator.php";

use Model\Salle;
use Validation\Validator;

class SalleController {

    public function index($req,$res){

        $page = $req->getQueryParam("page");
        $result = Salle::paginate($page,5,5);
        $res->setStatusCode(200);
        $res->setHeader('Content-Type', 'text/html');
        $res->renderView('salles/salle.list.php',$result);
        $res->send();
    }

    public function edit($req,$res){
        $id = $req->getQueryParam("id");
        $result = Salle::find($id);
        $res->setStatusCode(200);
        $res->setHeader('Content-Type', 'text/html');
        $res->renderView('salles/salle.edit.php',$result);
        $res->send();
    }

    public function update($req,$res){
        $id = $req->getQueryParam("id");
        $body = $req->getBodyParams();
        $rules = [
            'nom' => 'required',
            'etat' => 'required',
        ];

        $errors = Validator::validate($body,$rules);
        
        if( count($errors) > 0){
            $result = Salle::find($id);
            $result["errors"] = $errors;
            $res->setHeader('Content-Type', 'text/html');
            $res->setStatusCode(200);
            $res->renderView('salles/salle.edit.php',$result);
            $res->send();
        }else{
            $updateResult = Salle::update($body,$id);
            $result = Salle::find($id);
            $_SESSION['success'] = "modifier avec success ";
            header('Location: edit?id='.$id);
        }

    }

    public function add($req,$res){
        $res->setStatusCode(200);
        $res->setHeader('Content-Type', 'text/html');
        $res->renderView('salles/salle.add.php',["errors"=>[]]);
        $res->send();
    }

    public function store($req,$res){
        $body = $req->getBodyParams();
        $rules = [
            'nom' => 'required',
            'etat' => 'required',
        ];
        $errors = Validator::validate($body,$rules);
        $result = [];

        if( count($errors) > 0){
            $result["errors"] = $errors;
            $res->setHeader('Content-Type', 'text/html');
            $res->setStatusCode(200);
            $res->renderView('salles/salle.add.php',$result);
            $res->send();
        }else{
            $result = Salle::findBy($body,["nom"]);
            if(count($result["data"]) > 0){
                $_SESSION['error'] = "salle avec ce libellé ou telephone est déjà enrigiste";
                header('Location:add');
            }else{
                $storeResult = Salle::store($body);
                $_SESSION['success'] = "ajouter avec success !";
                header('Location:add');
            }
        }



    }

    public function distroy($req,$res){
        $id = $req->getQueryParam("id");
        $result = Salle::find($id);
        if(count($result["data"]) > 0){
            $deleteResult = Salle::delete($id);
            $_SESSION['success'] = "supprime avec success !";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }else{
            $_SESSION['error'] = "Aucune matiere ...!";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    } 

}

?>