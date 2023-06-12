<?php

class WelcomeController {


    public function index($req,$res){

         $res->setStatusCode(200);

         $res->setHeader('Content-Type', 'text/html');
 
        $res->renderView('index.php',);
        
        $res->send();
    }

}

?>