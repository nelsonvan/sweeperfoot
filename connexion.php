<?php require_once('inc/init.inc.php');
extract($_POST);

$pseduoError = '';
$emailError = '';
$passwordError = '';
 // Pa

//  if (internauteEstConnecte())
//  {
//    header("Location: acceuill.php");
//  }
if($_POST){

}
?>

<?php require_once('inc/nav.secondaire.inc.php');?>
<!DOCTYPE html>
<html lang="fr">
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
 <h1 class="text-center text-danger">Connexion</h1>  
 <div class="border"></div> 
<form class="mt-5"  method="POST">
  <div class="form-group mt-2">
  <i class="fas fa-user offset-md-6 fa-2x text-danger"></i>
    <input type="text" class="form-control mt-2" id="exampleInputPseudo" placeholder="Entrez votre pseudo"  name="userPseudo">
  </div>
    <div class="form-group">
    <i class="fas fa-at offset-md-6 fa-2x text-danger"></i>
        <input type="email" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre email"  name="userEmail">
  </div>
  <div class="form-group">
  <i class="fas fa-lock offset-md-6 fa-2x text-danger"></i>
    <input type="password" class="form-control mt-2" id="exampleInputPw" placeholder="Mot de passe"  name="userPw">
  </div>
  <button  class="btn  offset-md-5" value="Envoyer" type="submit">Connexion</button>
</form>
</body>
</html>
<?php require_once('inc/footer.inc.php');?>