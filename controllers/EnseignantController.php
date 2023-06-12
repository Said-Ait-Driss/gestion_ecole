<?php

require_once __DIR__ . "/../models/Enseignant.model.php";
require_once __DIR__ . "/../app/Validator.php";

use Model\Enseignant;
use Validation\Validator;

class EnseignantController {

    public function index($req,$res){

        $page = $req->getQueryParam("page");
        $result = Enseignant::paginate($page,5,5);
        $res->setStatusCode(200);
        $res->setHeader('Content-Type', 'text/html');
        $res->renderView('enseignants/enseignant.list.php',$result);
        $res->send();
    }

    public function edit($req,$res){
        $id = $req->getQueryParam("id");
        $result = Enseignant::find($id);
        $res->setStatusCode(200);
        $res->setHeader('Content-Type', 'text/html');
        $res->renderView('enseignants/enseignant.edit.php',$result);
        $res->send();
    }

    public function update($req,$res){
        $id = $req->getQueryParam("id");
        $body = $req->getBodyParams();
        $rules = [
            'matricule' => 'required',
            'fName' => 'required',
            'lName' => 'required',
            'email' => 'required|email',
            'city' => 'required',
            'adresse' => 'required',
            'phone' => 'required|min:10|max:10',
            'dateBirth' => 'required',
        ];

        $errors = Validator::validate($body,$rules);

        if( count($errors) > 0){
            $result = Enseignant::find($id);
            $result["errors"] = $errors;
            $res->setHeader('Content-Type', 'text/html');
            $res->setStatusCode(200);
            $res->renderView('enseignants/enseignant.edit.php',$result);
            $res->send();
        }else{
            $updateResult = Enseignant::update($body,$id);
            $result = Enseignant::find($id);
            $_SESSION['success'] = "modifier avec success ";
            header('Location: edit?id='.$id);

        }

    }

    public function add($req,$res){
        $res->setStatusCode(200);
        $res->setHeader('Content-Type', 'text/html');
        $res->renderView('enseignants/enseignant.add.php',["errors"=>[]]);
        $res->send();
    }

    public function store($req,$res){
        $body = $req->getBodyParams();
        $rules = [
            'matricule' => 'required',
            'fName' => 'required',
            'lName' => 'required',
            'email' => 'required|email',
            'city' => 'required',
            'adresse' => 'required',
            'phone' => 'required|min:10|max:10',
            'dateBirth' => 'required',
        ];

        $errors = Validator::validate($body,$rules);
    
        $result = [];
        if( count($errors) > 0){
            $result["errors"] = $errors;
            $res->setHeader('Content-Type', 'text/html');
            $res->setStatusCode(200);
            $res->renderView('enseignants/enseignant.add.php',$result);
            $res->send();
        }else{
            $result = Enseignant::findBy($body,["matricule","email", "phone"]);
            if(count($result["data"]) > 0){
                $_SESSION['error'] = "enseignant avec ce mail ou telephone est déjà š'inscrire";
                header('Location:add');
            }else{
                $storeResult = Enseignant::store($body);
                $_SESSION['success'] = "ajouter avec success !";
                header('Location:add');
            }
        }



    }

    public function distroy($req,$res){
        
        $id = $req->getQueryParam("id");
        $result = Enseignant::find($id);
        if(count($result["data"]) > 0){
            $deleteResult = Enseignant::delete($id);
            $_SESSION['success'] = "supprime avec success !";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }else{
            $_SESSION['error'] = "Aucune enseignant ...!";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    } 

}

?>