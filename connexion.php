<?php require_once('inc/init.inc.php');
extract($_POST);

$pseudoError = '';
$emailError = '';
$passwordError = '';
 // Pa

 if (isset($_GET['action']) && $_GET['action'] == 'validate') {
  $validate .= '<div class="col-md-6 offset-md-3 alert alert-success text-dark">Félicitations, vous etes inscrits sur le site. Vous pouvez dès a présent vous connecter</div>';
}


if($_POST){

  $resultat = $bdd->query("SELECT * FROM user");
  $user = $resultat->fetch(PDO::FETCH_ASSOC);
  
  
  
  '<pre>'; echo print_r($user) ; '</pre>';
    if(empty($userPseudo) || $userPseudo != $user['userPseudo'])
    {
      $pseudoError .=  '<small class="text-danger"> ** Saisissez un Pseudo valide</small>';
    }
    if(empty($userEmail) && !filter_var($userEmail, FILTER_VALIDATE_EMAIL) && $userEmail != $user['userEmail'])
    {
      $emailError .=  '<small class="text-danger"> ** Saisissez un Email valide</small>';
    }
    if (empty($userPw) || $userPw != $user['userPw'])
    {
      $passwordError .= '<small class="text-danger"> ** Saisissez un mot de passe valide</small>';
    }
  
    // Si je n'est aucun message d'erreur qui s'affiche on redirige vers la page profile
    if (empty($pseudoError) && empty($emailError) && empty($passwordError) && $user['status'] == 1)
    {
      header('Location:backOffice/admin.php');
    }else {
      header('Location:profil.php');
      # code...
    }
  

} //
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
 <?=  $validate ?>
 <div class="border"></div> 
<form class="mt-5"  method="post" action="">
  <div class="form-group mt-2">
  <i class="fas fa-user offset-md-6 fa-2x text-danger"></i>
  <?php echo $pseudoError; ?>
    <input type="text" class="form-control mt-2" id="exampleInputPseudo" placeholder="Entrez votre pseudo"  name="userPseudo">
  </div>
    <div class="form-group">
    <i class="fas fa-at offset-md-6 fa-2x text-danger"></i>
    <?php echo $emailError; ?>
        <input type="email" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre email"  name="userEmail">
  </div>
  <div class="form-group">
  <i class="fas fa-lock offset-md-6 fa-2x text-danger"></i>
  <?php echo  $passwordError; ?>
    <input type="password" class="form-control mt-2" id="exampleInputPw" placeholder="Mot de passe"  name="userPw">
  </div>
  <button   class="btn  offset-md-5"  type="submit" >Connexion</button>
</form>
</body>
</html>
<?php require_once('inc/footer.inc.php');?>