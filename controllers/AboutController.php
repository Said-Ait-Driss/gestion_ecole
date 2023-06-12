<?php

class AboutController {

    public function index($req,$res){


         $res->setStatusCode(200);

         $res->setHeader('Content-Type', 'text/html');
 
        $res->renderView('about.php', ['name' => 'John']);
        
        $res->send();
    }

}

?>