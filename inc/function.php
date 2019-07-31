<?php
//-------------------function user----------------

function internauteEstConnecte(){
    // cette fonction verifie si le membre est connecté 
    if(!isset($_SESSION['user']))
    {
        return false;
    }else{
      //  si il retourne true, il est connecte
        return true;
    }
}
// ----------------------function ADMIN------------------------

function internauteEstConnecteEstAdmin(){
    // si l'internaute connecté a un statut égal a 1, il est donc administrateur, sinon => user 
    // Cette fonction permettra par la suite de bloquer des pages, a ceux qui n'en on pas le droit
    if(internauteEstConnecte() && $_SESSION['user']['statut'] == 1)
    {
        return true;
    }else{
        return false;
    }

}

//-------------------------------fonction de debug------------------------------

function debug($variable){

    echo '<pre>' .print_r($variable, true) . '</pre>';
}

