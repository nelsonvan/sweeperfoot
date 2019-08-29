<?php
require_once("../inc/init.inc.php");


if (isset($_GET['action']) && $_GET['action'] == 'deconnexion') {
    session_destroy();
    header("Location:../acceuil.php");
   }
  

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/cerulean/bootstrap.min.css" rel="stylesheet" integrity="sha384-C++cugH8+Uf86JbNOnQoBweHHAe/wVKN/mb0lTybu/NZ9sEYbd+BbbYtNpWYAsNP" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin-style.css">
    <title>Document</title>
</head>
<body>
    <h1 class="text-center text-success">Ma page admin</h1>
  
   <a href="?action=deconnexion"><button type="button"  class="admin-btn btn-dark offset-md-2 mt-4">Deconnexion</button></a> 
    <div class="list-group listAdmin" style="width:30rem;">
            <a href="admin-gestion-article.php"
                class="list-group-item list-group-item-action primary text-center btn-outline-primary  hover">Gestion des article</a>
            <a href="admin-gestion-user.php"
                class="list-group-item list-group-item-action primary text-center btn-outline-primary  hover">Gestion
                 user</a>
            <a href="admin-gestion-contact.php"
                class="list-group-item list-group-item-action primary text-center btn-outline-primary  hover">Gestion
                de
                contact</a>

       
       </div>
</body>
</html>