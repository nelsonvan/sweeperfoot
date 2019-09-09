<?php require_once('../inc/init.inc.php');
// Variable d'affichage
extract($_POST);
$firstNameError = '';
$emailError = '';
$pwError = '';
$pwConfError = '';
$mdpError = '';
$pseudoError = '';


// verification des champs 
if($_POST)
{
    // Je vérifie que chaque champs n'esxistent pas ou qu'il ne correspondent pas a ce que j'attend. Dans ce cas un usage d'erreur sera affiché
    if(empty($userFirstName) || iconv_strlen($userFirstName) < 2 || iconv_strlen($userFirstName) > 60)
    {
        $firstNameError .= '<span class="text-danger text-center"> ** Veuillez saisir votre nom  entre 2 et 60 caractères</span>';
    }

    if (empty($userEmail) || !filter_var($userEmail, FILTER_VALIDATE_EMAIL))
        {
           $emailError .= '<span class="text-danger text-center"> ** Veuillez mettre un email valide</span>';
        }

        if (empty($userPw) || $userPw != $userPwConf) 
    {
        $pwError .= '<span class="text-danger text-center"> ** Veuillez mettre un Mot de passe valide</span>';
        $pwConfError .= '<span class="text-danger text-center"> ** Veuillez mettre un Mot de passe valide</span>';
    } 

    
    
    // Si je n'ai pas de message d'erreur j'effectue l'insertion dans la bdd

        if(empty($firstNameError) && empty($emailError) && empty($pwError) && empty($pwConfError))
     {
        // assainissement des saisies de l'internaute
        foreach ($_POST as $indice => $valeur) {
            $_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
        }

        $newUser = $bdd->prepare("INSERT INTO user (userFirstName, userEmail, userPw, userPwConf ) VALUES (:userFirstName, :userEmail, :userPw, :userPwConf)");

        // J'associe les valeurs saisies dans le formulaire avec les marqueurs de securité php 

        $newUser->bindValue(":userFirstName", $userFirstName, PDO::PARAM_STR);
        $newUser->bindValue("userEmail", $userEmail, PDO::PARAM_STR);
        $newUser->bindValue(":userPw", $userPw, PDO::PARAM_STR);
        $newUser->bindValue(":userPwConf", $userPwConf, PDO::PARAM_STR);
      
        // J'execute l'insertion en BDD
        $newUser->execute();
     } // Fin du if(empty(firstNameError...))


} // Fin du if($_POST)
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <!-- Lien CDN bootstrap -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Lien fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/admin-style.css">
    <title>Form User</title>
</head>
<body>
    <h1 class="text-center bg-success">Formulaire User</h1>
    <div class="container col-md-12 mt-5 mx-auto ">
            <div class="col-md-12">
                <a href="admin-gestion-user.php" class="return btn btn-outline-dark" firstName="retour">
                    <i class="far fa-hand-point-left fa-2x fa-le"></i>
                </a>
            </div>

            <form class="col-md-12 " method="POST">
            <div class="col-md-3  offset-md-4 text-center mt-4">
                    <?php echo $firstNameError; ?>
            </div>
            <div class="col-md-3 offset-md-4">
                <input type="text" class="form-control text-center rounded-pill border border-primary" name="userFirstName"
                    placeholder="FirstName">
            </div>
        </div>
        <div class="col-md-3  offset-md-4 text-center mt-4">
                    <?php echo $emailError; ?>
            </div>
            <div class="col-md-3 offset-md-4">
                <input type="text" class="form-control text-center rounded-pill border border-primary" name="userEmail"
                    placeholder="Email">
            </div>
        </div>
        <div class="col-md-3  offset-md-4 text-center mt-4">
                    <?php echo $pwError; ?>
            </div>
            <div class="col-md-3 offset-md-4">
                <input type="password" class="form-control text-center rounded-pill border border-primary" name="userPw"
                    placeholder="Password">
            </div>
        </div>
        <div class="col-md-3  offset-md-4 text-center mt-4">
                    <?php echo $pwConfError; ?>
            </div>
            <div class="col-md-3 offset-md-4">
                <input type="password" class="form-control text-center rounded-pill border border-primary" name="userPwConf"
                    placeholder="Password">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col offset-md-5">
                <button type="submit" 
                    class="btn btn-lg btn-outlines-secondary border border-secondary hover rounded-pill">Validez</button>
            </div>
        </form>  
</div>

  <!-- Lien CDN JS -->
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
</html>