<?php
require_once("../inc/init.inc.php");

$contenue = "";

$resultat = $bdd->query("SELECT * FROM articles");

while ($articles = $resultat->fetch(PDO::FETCH_ASSOC)) {

    $contenu .= '<div class="articleAdmin">';
    $contenu .= '<tr>';
    $contenu .= '<td scope="col" class="text-center">' . $articles['id_article'] . '</td>';
  $contenu .= '<td scope="col" class="text-center">' . $articles['title'] . '</td>';
  $contenu .= '<td scope="col" class="text-center text-justify">' . $articles['content'] . '</td>';
  $contenu .= '<td scope="col" class="text-center">' . $articles['link'] . '</td>';
  $contenu .= '<td  scope="col" class="text-center"><img class="imgAdmin" src="../img/'.$articles['photo'].'">"</td>';
  $contenu .= '<td  scope="col" class="text-center"><a href="?action=suppression&id=' . $articles['id_article'] . '" onclick="return confirm(\'Etes-vous sûr ?\');"><i
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
        <h1 class="text-center mb-5">Gestion article</h1>
        <a href="admin.php" class="return mb-5" title="retour"><i
                class="fas fa-hand-point-left fa-2x text-dark"></i></a>
                
        <table class="table table-dark mt-5">
            <thead>
                <tr>
                    <th scope="col" class="text-center">N° d'article</th>
                    <th scope="col" class="text-center">titre</th>
                    <th scope="col" class="text-center">content</th>
                    <th scope="col" class="text-center">link</th>
                    <th scope="col" class="text-center">photo</th>
                    <th scope="col" class="text-center">action</th>
                </tr>
            </thead>

            <?php echo $contenu; ?>
        </table>
    </div>
    </div>
</body>
</html>