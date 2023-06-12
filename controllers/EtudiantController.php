<?php

require_once __DIR__ . "/../models/Etudiant.model.php";
require_once __DIR__ . "/../app/Validator.php";

use Model\Etudiant;
use Validation\Validator;

class EtudiantController {

    public function index($req,$res){

        $page = $req->getQueryParam("page");
        $result = Etudiant::paginate($page,5,5);
        $res->setStatusCode(200);
        $res->setHeader('Content-Type', 'text/html');
        $res->renderView('etudiants/etudiant.list.php',$result);
        $res->send();
    }

    public function edit($req,$res){
        $id = $req->getQueryParam("id");
        $result = Etudiant::find($id);
        $res->setStatusCode(200);
        $res->setHeader('Content-Type', 'text/html');
        $res->renderView('etudiants/etudiant.edit.php',$result);
        $res->send();
    }

    public function update($req,$res){
        $id = $req->getQueryParam("id");
        $body = $req->getBodyParams();
        $rules = [
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
            $result = Etudiant::find($id);
            $result["errors"] = $errors;
            $res->setHeader('Content-Type', 'text/html');
            $res->setStatusCode(200);
            $res->renderView('etudiants/etudiant.edit.php',$result);
            $res->send();
        }else{
            $updateResult = Etudiant::update($body,$id);
            $result = Etudiant::find($id);
            $_SESSION['success'] = "modifier avec success ";
            header('Location: edit?id='.$id);

        }

    }

    public function add($req,$res){
        $res->setStatusCode(200);
        $res->setHeader('Content-Type', 'text/html');
        $res->renderView('etudiants/etudiant.add.php',["errors"=>[]]);
        $res->send();
    }

    public function store($req,$res){
        $body = $req->getBodyParams();
       
        $rules = [
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
            $res->renderView('etudiants/etudiant.add.php',$result);
            $res->send();
        }else{
            $result = Etudiant::findBy($body,["email","phone"]);
            if(count($result["data"]) > 0){
                $_SESSION['error'] = "éleve avec ce mail ou telephone est déjà š'inscrire";
                header('Location:add');
            }else{
                $storeResult = Etudiant::store($body);
                $_SESSION['success'] = "ajouter avec success !";
                header('Location:add');
            }
        }



    }

    public function distroy($req,$res){
        $id = $req->getQueryParam("id");
        $result = Etudiant::find($id);
        if(count($result["data"]) > 0){
            $deleteResult = Etudiant::delete($id);
            $_SESSION['success'] = "supprime avec success !";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }else{
            $_SESSION['error'] = "Aucune etudiant ...!";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    } 

}

?>