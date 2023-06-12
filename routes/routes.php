
<?php
// routes.php
return [
    '/' => "WelcomeController@index",
    
    '/etudiants' => "EtudiantController@index",
    '/etudiants/edit'=>"EtudiantController@edit",
    '/etudiants/add'=>"EtudiantController@add",
    '/etudiants/store'=>"EtudiantController@store",
    '/etudiants/delete'=>"EtudiantController@distroy",
    '/etudiants/update'=>"EtudiantController@update",

    '/enseignants' => "EnseignantController@index",
    '/enseignants/edit'=>"EnseignantController@edit",
    '/enseignants/add'=>"EnseignantController@add",
    '/enseignants/store'=>"EnseignantController@store",
    '/enseignants/delete'=>"EnseignantController@distroy",
    '/enseignants/update'=>"EnseignantController@update",

    '/classes' => "ClasseController@index",
    '/classes/edit'=>"ClasseController@edit",
    '/classes/add'=>"ClasseController@add",
    '/classes/store'=>"ClasseController@store",
    '/classes/delete'=>"ClasseController@distroy",
    '/classes/update'=>"ClasseController@update",

    '/cours' => "CoursController@index",
    '/cours/edit'=>"CoursController@edit",
    '/cours/add'=>"CoursController@add",
    '/cours/store'=>"CoursController@store",
    '/cours/delete'=>"CoursController@distroy",
    '/cours/update'=>"CoursController@update",


    '/salles' => "SalleController@index",
    '/salles/edit'=>"SalleController@edit",
    '/salles/add'=>"SalleController@add",
    '/salles/store'=>"SalleController@store",
    '/salles/delete'=>"SalleController@distroy",
    '/salles/update'=>"SalleController@update",



    '/about' => 'AboutController@index',
    '/contact' => 'ContactController@index',
    '/user/{id}' => 'UserController@show',
    '/post/{slug}' => 'PostController@show',
];


?>