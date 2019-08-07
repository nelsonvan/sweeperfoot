<?php
require_once("../inc/init.inc.php");

// Variable d'affichage 
$contenue = "";

$resultat = $bdd->query("SELECT * FROM user");

while ($user = $resultat->fetch(PDO::FETCH_ASSOC)){
    
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
    <h1 class="text-center bg-success">Gestion Users</h1>
    <table class="array-user table-primary">
  <thead >
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Job Title</th>
      <th>Twitter</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td data-column="First Name">James</td>
      <td data-column="Last Name">Matman</td>
      <td data-column="Job Title">Chief Sandwich Eater</td>
      <td data-column="Twitter">@james</td>
    </tr>
    <tr>
      <td data-column="First Name">Andor</td>
      <td data-column="Last Name">Nagy</td>
      <td data-column="Job Title">Designer</td>
      <td data-column="Twitter">@andornagy</td>
    </tr>
    <tr>
      <td data-column="First Name">Tamas</td>
      <td data-column="Last Name">Biro</td>
      <td data-column="Job Title">Game Tester</td>
      <td data-column="Twitter">@tamas</td>
    </tr>
    <tr>
      <td data-column="First Name">Zoli</td>
      <td data-column="Last Name">Mastah</td>
      <td data-column="Job Title">Developer</td>
      <td data-column="Twitter">@zoli</td>
    </tr>
    <tr>
      <td data-column="First Name">Szabi</td>
      <td data-column="Last Name">Nagy</td>
      <td data-column="Job Title">Chief Sandwich Eater</td>
      <td data-column="Twitter">@szabi</td>
    </tr>
  </tbody>
</table>



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