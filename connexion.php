<?php require_once('inc/nav.secondaire.inc.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="css/style-connexion.css"> -->
    <title>Document</title>
</head>
<body>
</header>   
<div class="container col-md-4 mt-5" style="color: white;">
 <h1 class="text-center">Connexion</h1>   
<form class="mt-5"  method="POST">
  <div class="form-group mt-2">
  <i class="fas fa-user offset-md-6 fa-2x"></i>
    <input type="text" class="form-control mt-2" id="exampleInputPseudo" placeholder="Entrez votre pseudo"  name="userPseudo">
  </div>
    <div class="form-group">
        <input type="email" class="form-control mt-5" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre email"  name="userEmail">
  </div>
  <div class="form-group">
  <i class="fas fa-lock offset-md-6 fa-2x fa-danger"></i>
    <input type="password" class="form-control mt-2" id="exampleInputPassword" placeholder="Mot de passe"  name="userPw">
  </div>
  <button  class="btn btn-primary offset-md-5" value="Envoyer" type="submit">Connexion</button>
</form>
</body>
</html>
<?php require_once('inc/footer.inc.php');?>