<?php 
require_once('inc/nav.secondaire.inc.php');

require_once('inc/init.inc.php');
extract($_POST);
// Variable de verifiaction des champs
$firstNameError = '';
$pseudoError = '';
$emailError = '';
$mdpError = '';
$confMdpError = '';


if($_POST)
{
    echo '<pre class="text-danger">'; print_r($_POST); echo '</pre>';
  // Verifiaction des champs
    if (empty($userFirstName) || iconv_strlen($userFirstName) < 2 || iconv_strlen($userFirstName) > 60)
    {
      $firstNameError .= '<small class="text-danger"> ** Saisissez un prenom entre 2 et 60 clastéres</small>';
    }
    
    if (empty($userPseudo) || iconv_strlen($userPseudo) < 2 || iconv_strlen($userFirstName) > 60)
    {
      $pseudoError .= '<small class="text-danger"> ** Saisissez un Pseudo entre 2 et 60 clastéres</small>';
    }
   if (empty($userEmail) || !filter_var($userEmail, FILTER_VALIDATE_EMAIL))
   {
     
      $emailError .= '<small class="text-danger"> ** Votre email n\'est pas valide</small>';
      $confMdpError .= '<small class="text-danger"> ** Votre email n\'est pas valide</small>';

   }
   if (empty($userPw == $userPwConf)) 
   {
     
       $mdpError .= '<small class="text-danger"> ** Votre Mdp n\'est pas valide</small>';

    }

    // Inserion en base données
    if (empty($userFirstName) && empty($userPseudo) && empty($userEmail) && empty($userPw) && empty($userPwConf))
    {
      foreach ($_POST as $indice => $valeur)
      {
        $_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
      }
    
      // Requete d'insertion
    $newUser = $bdd->prepare("INSERT INTO user(userFirstName, userEmail, userPw, userPseudo, userPwConf) VALUES (:userFirstName, :userEmail, :userPw, :userPseudo, :userPwConf)");

    $newUser->bindValue(":userFirstName", $userFirstName, PDO::PARAM_STR);
    $newUser->bindValue(":userEmail", $userEmail, PDO::PARAM_STR);
    $newUser->bindValue(":userPw", $userPw, PDO::PARAM_STR);
    $newUser->bindValue(":userPseudo", $userPseudo, PDO::PARAM_STR);
    $newUser->bindValue(":userPwConf", $userPwConf, PDO::PARAM_STR);
    $newUser->execute();

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
  <form class="mt-4"  method="POST">
  <div class="form-group mt-4">
 <?php echo $firstNameError; ?>
    <input type="text" class="form-control" id="exampleInputfirstName" placeholder="Prénom" name="userFirstName">
  </div>
  <div class="form-group">
  <?php echo $firstNameError; ?>
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
  <button  class="btn btn-primary offset-md-5" value="Envoyer" type="submit">Inscription</button>
</form>
</div>
<?php require_once('inc/footer.secondaire.inc.php');?>

 



 

