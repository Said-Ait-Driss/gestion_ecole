<?php

require_once __DIR__ . "/../models/Cours.model.php";
require_once __DIR__ . "/../models/Enseignant.model.php";
require_once __DIR__ . "/../app/Validator.php";

use Model\Cours;
use Model\Enseignant;
use Validation\Validator;

class CoursController {

    public function index($req,$res){

        $page = $req->getQueryParam("page");
        $result = Cours::paginate($page,5,5);
        $res->setStatusCode(200);
        $res->setHeader('Content-Type', 'text/html');
        $res->renderView('cours/cours.list.php',$result);
        $res->send();
    }

    public function edit($req,$res){
        $id = $req->getQueryParam("id");
        $enseignants = Enseignant::findAll();
        $result = Cours::find($id);
        $result["enseignants"] = $enseignants["data"];
        $res->setStatusCode(200);
        $res->setHeader('Content-Type', 'text/html');
        $res->renderView('cours/cours.edit.php',$result);
        $res->send();
    }

    public function update($req,$res){
        $id = $req->getQueryParam("id");
        $body = $req->getBodyParams();

        $rules = [
            'nom' => 'required',
            'id_enseignant' => 'required',
        ];

        $errors = Validator::validate($body,$rules);

        if( count($errors) > 0){
            $result = Cours::find($id);
            $result["errors"] = $errors;
            $res->setHeader('Content-Type', 'text/html');
            $res->setStatusCode(200);
            $res->renderView('cours/cours.edit.php',$result);
            $res->send();
        }else{
            $updateResult = Cours::update($body,$id);
            $result = Cours::find($id);
            $_SESSION['success'] = "modifier avec success ";
            header('Location: edit?id='.$id);

        }

    }

    public function add($req,$res){
        $enseignants = Enseignant::findAll();
        $res->setStatusCode(200);
        $res->setHeader('Content-Type', 'text/html');
        $res->renderView('cours/cours.add.php',$enseignants);
        $res->send();
    }

    public function store($req,$res){
        $body = $req->getBodyParams();

        $rules = [
            'nom' => 'required',
            'id_enseignant' => 'required',
        ];

        $errors = Validator::validate($body,$rules);
        $result = [];
        if( count($errors) > 0){
            $result = Enseignant::findAll();
            $result["errors"] = $errors;
            $res->setHeader('Content-Type', 'text/html');
            $res->setStatusCode(200);
            $res->renderView('cours/cours.add.php',$result);
            $res->send();
        }else{
            $result = Cours::findBy($body,["nom"]);
            if(count($result["data"]) > 0){
                $_SESSION['error'] = "cours avec ce nom est déjà enrigiste";
                header('Location:add');
            }else{
                $storeResult = Cours::store($body);
                $_SESSION['success'] = "ajouter avec success !";
                header('Location:add');
            }
        }



    }

    public function distroy($req,$res){
        $id = $req->getQueryParam("id");
        $result = Cours::find($id);
        if(count($result["data"]) > 0){
            $deleteResult = Cours::delete($id);
            $_SESSION['success'] = "supprime avec success !";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }else{
            $_SESSION['error'] = "Aucune matiere ...!";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    } 

}

?>