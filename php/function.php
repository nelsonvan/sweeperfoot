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



