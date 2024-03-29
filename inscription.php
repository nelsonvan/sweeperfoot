<?php 
require_once('inc/nav.secondaire.inc.php');



require_once('php/function.php');


if(internauteEstConnecte())
{
  header("Location: acceuil.php");
}

 

extract($_POST);
// Variable de verifiaction des champs
$firstNameError = '';
$pseudoError = '';
$emailError = '';
$mdpError = '';
$confMdpError = '';
$msgValidate = '';





if($_POST)
{

  $verif_pseudo = $bdd->prepare("SELECT*FROM user WHERE userPseudo = :userPseudo");
  $verif_pseudo->bindValue(':userPseudo', $userPseudo, PDO::PARAM_STR);
  $verif_pseudo->execute();
  if ($verif_pseudo->rowCount() > 0)
      // si le résultat de la requete est supérieur a 0, cela veut dire qu' un pseudo est bien existant en bdd, alors on affiche le mssage d' erreur
      {
          $pseudoError.= '<div class="col-md-6 offset-md-3 text-center alert alert-danger">Le pseudo <strong>' . $userPseudo . '</strong> est déjà pris. Merci d\' en saisir un autre</div>';
      }

    echo '<pre class="text-danger">'; print_r($_POST); echo '</pre>';
  // Verifiaction des champs
    if (empty($userFirstName) || iconv_strlen($userFirstName) < 2 || iconv_strlen($userFirstName) > 60)
    {
      $firstNameError .= '<small class="text-danger"> ** Saisissez un prenom entre 2 et 60 clastéres</small>';
    }
    
    if (empty($userPseudo) || iconv_strlen($userPseudo) < 2 || iconv_strlen($userPseudo) > 60)
    {
      $pseudoError .= '<small class="text-danger"> ** Saisissez un Pseudo entre 2 et 60 clastéres</small>';
    }

   if (empty($userEmail) || !filter_var($userEmail, FILTER_VALIDATE_EMAIL))
   {
     
      $emailError .= '<small class="text-danger"> ** Votre email n\'est pas valide</small>';
   

   }
   if (empty($userPw) || $userPw  !=  $userPwConf) 
   {
     
       $mdpError .= '<small class="text-danger"> ** Votre Mdp n\'est pas valide</small>';
       $confMdpError .= '<small class="text-danger"> ** Votre Mot de passe n\'est pas valide</small>';

      

    }

    // Inserion en base données
    if (empty($firstNameError) && empty($pseudoError ) && empty($emailError) && empty($mdpError) && empty($confMdpError))
    {

    
      foreach ($_POST as $indice => $valeur)
      {
        $_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
      }
    
      // je hach le mot de passe pour ne pas afficher les mot de passe en claire dans la bdd
      $userPw = password_hash($_POST['userPw'], PASSWORD_BCRYPT);
      $userPwConf = password_hash($_POST['userPwConf'], PASSWORD_BCRYPT);
      // Requete d'insertion
    $newUser = $bdd->prepare("INSERT INTO user(userFirstName, userEmail, userPw, userPseudo, userPwConf) VALUES (:userFirstName, :userEmail, :userPw, :userPseudo, :userPwConf)");

    $newUser->bindValue(":userFirstName", $userFirstName, PDO::PARAM_STR);
    $newUser->bindValue(":userEmail", $userEmail, PDO::PARAM_STR);
    $newUser->bindValue(":userPw", $userPw, PDO::PARAM_STR);
    $newUser->bindValue(":userPseudo", $userPseudo, PDO::PARAM_STR);
    $newUser->bindValue(":userPwConf", $userPwConf, PDO::PARAM_STR);
    $newUser->execute();
     $msgValidate = '<div class="alert alert-success">Votre Inscription a bien été enregistrer </div>';

     header("Location: connexion.php?action=validate");

    }
  } // Fin du if($_POST)

// if $user['userPw'] == $userPw && == $userConfPw 
// {
//   foreach($user as $key => $value)
//   {
//     if($key != 'userPw')
//     {
//       $_SESSION['user'][$key] = $value; 
//     }
//   }
// }

   

  


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <title>Document</title>
</head>
<body>
    
</body>
</html>
</header>
<div class="container col-md-4 mt-5">
  <h1 class="text-center text-danger">Inscription</h1>
  <?php echo $msgValidate; ?>
  <form class="mt-4"  method="POST" action="">
  <div class="form-group mt-4">
 <?php echo $firstNameError; ?>
    <input type="text" class="form-control" id="exampleInputfirstName2" placeholder="Prénom" name="userFirstName">
  </div>
  <div class="form-group">
  <?php echo $pseudoError; ?>
    <label for="exampleInputPassword1"></label>
    <input type="text" class="form-control" id="exampleInputPseudo1" placeholder="Entrez votre pseudo"  name="userPseudo">
  </div>
    <div class="form-group">
    <?php echo $emailError; ?>
        <label for="exampleInputEmail1"></label>
        <input type="email" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Entrez votre email"  name="userEmail">
  </div>
  <div class="form-group">
  <?php echo $mdpError; ?>
    <label for="exampleInputPassword"></label>
    <input type="password" class="form-control" id="exampleInputPassword" placeholder="Mot de passe"  name="userPw">
  </div>
  <div class="form-group">
  <?php echo $confMdpError; ?>
    <label for="exampleInputPassword"></label>
    <input type="password" class="form-control" id="exampleInputPassword" placeholder="Confirme mot de passe"  name="userPwConf">
  </div>
  <button  class="btn btn-primary offset-md-5" value="Envoyer" type="submit" action="validate">Inscription</button>
</form>
</div>
<?php require_once('inc/footer.secondaire.inc.php');?>

 



 

