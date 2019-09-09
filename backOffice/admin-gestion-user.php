<?php
require_once("../inc/init.inc.php");

// Variable d'affichage 
extract($_POST);
$contenu = "";
if (isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['id'])){

  $user_delete = $bdd->prepare("DELETE FROM user WHERE id_user = :id_user");
  // Je recupere l'id qui se trouve dans l'URL
  $user_delete->bindValue(':id_user', $_GET['id'], PDO::PARAM_INT);

  

  $user_delete->execute();
}


$resultat = $bdd->query("SELECT * FROM user");

while ($user = $resultat->fetch(PDO::FETCH_ASSOC)){
  $contenu .= '<div class="articleAdmin mt-4">';
  $contenu .= '<tr>';
  $contenu .= '<td scope="col" class="array-article text-center">' . $user['id_user'] . '</td>';
$contenu .= '<td scope="col" class="array-article  text-center">' . $user['userFirstName'] . '</td>';
$contenu .= '<td scope="col" class="array-article  text-center text-justify">' . $user['userEmail'] . '</td>';
$contenu .= '<td scope="col" class="array-article  text-center text-justify">' . $user['status'] . '</td>';
$contenu .= '<td class="array-article  text-center"><a href="form_article.php?action=modif"><i class="far fa-edit text-warning fa-2x"></i></a></td>';
$contenu .= '<td  scope="col" class="array-article  text-center"><a class="return"  href="?action=suppression&id=' . $user['id_user'] . '" onClick="return confirm(\'Etes-vous sûr ?\');"><i
class="fas fa-trash-alt fa-2x text-danger"></i></a></td>';
  $contenu .= '</tr>';
  $contenu .= '</div>';
  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/cerulean/bootstrap.min.css" rel="stylesheet" integrity="sha384-C++cugH8+Uf86JbNOnQoBweHHAe/wVKN/mb0lTybu/NZ9sEYbd+BbbYtNpWYAsNP" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin-style.css">
      <!-- Lien fontawesome -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <!-- Google font -->
        <link href="https://fonts.googleapis.com/css?family=Blinker&display=swap" rel="stylesheet"> 
    <title>Document</title>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center bg-success">Gestion Users</h1>
    <div class="row">
            <div class="col-md-6">
                <a href="admin.php" class="return btn btn-outline-dark" title="retour">
                    <i class="far fa-hand-point-left fa-2x"></i>
                </a>
            </div>
            <div class="col-md-6">
                <a class="offset-10 mb-5 btn btn-outline-dark" href="form_user.php" title="ajouter un Article">
                    <i class="fas fa-pencil-alt fa-2x"></i>
                </a>
            </div>
        </div>
    <table class="table table-dark table-bordered mt-5">
            <thead>
                <tr>
                    <th scope="col" class="array-user text-center">N° User</th>
                    <th scope="col" class="array-user  text-center">prénom</th>
                    <th scope="col" class="array-user text-center">Email</th>
                    <th scope="col" class="array-user text-center">status</th>
                    <th scope="col" class="array-user text-center">modifie</th>
                    <th scope="col" class="array-user text-center">supprimer</th>
                </tr>
            </thead>
            <div class="container mt-4">
            <?php echo $contenu; ?>
            </div>
           
        </table>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>