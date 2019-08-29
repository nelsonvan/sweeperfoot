<?php require_once('inc/header.inc.php');
require_once('inc/init.inc.php');

extract($_POST);
// variable de verfication
$contactFirstNameError = '';
$contactEmailError = '';
$contactMessageError = '';

if($_POST)
{
  if(empty($contactFirstName) || iconv_strlen($contactFirstName) < 2 || iconv_strlen($contactFirstName) > 60)
  {
    $contactFirstNameError .= '<small class="text-danger"> ** Saisissez un prenom entre 2 et 60 clastéres</small>';
  }

  if (empty($contactEmail) || !filter_var($contactEmail, FILTER_VALIDATE_EMAIL))
   {
     
      $contactEmailError .= '<small class="text-danger"> ** Votre email n\'est pas valide</small>';
     
   }
  if (empty($contactMessage))
   {
     
      $contactMessageError .= '<small class="text-danger"> ** Votre email n\'est pas valide</small>';
     

   }
   // Inserion en base données
   if (empty($contactfirstNameError) && empty($contactEmailError) && empty($contactMessageError))
   {
        foreach ($_POST as $indice => $valeur)
      {
        $_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
      }

      $newMessage = $bdd->prepare("INSERT INTO contact(contactFirstName,  contactEmail, contactMessage) VALUES (:contactFirstName,  :contactEmail, :contactMessage)");

      $msgValidate = '<div class="alert alert-success">Votre Message a été Envoyer </div>';

      
    $newMessage->bindValue(":contactFirstName", $contactFirstName, PDO::PARAM_STR);
    $newMessage->bindValue(":contactEmail", $contactEmail, PDO::PARAM_STR);
    $newMessage->bindValue(":contactMessage", $contactMessage, PDO::PARAM_STR);
    $newMessage->execute();
   }

  //  if(isset($_POST['form1'])){
  //   $entete  = 'MIME-Version: 1.0' . "\r\n";
  //   $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
  //   $entete .= 'From: ' . $_POST['contactEmail'] . "\r\n";

  //   $message = '<h1>Message envoyé depuis la page Contact de monsite.fr</h1>
  //   <p><b>Nom : </b>' . $_POST['contactFirstName'] . '<br>
  //   <b>Email : </b>' . $_POST['contactEmail'] . '<br>
  //   <b>Message : </b>' . $_POST['contactMessage'] . '</p>';
 

  //   $retour = mail('nelson.vanicatte@lepoles.com', 'Envoi depuis page Contact', $message, $entete);
  //   if($retour) {
  //       echo '<p>Votre message a bien été envoyé.</p>';
  //   }

  if (isset($_POST['form1'])) {
    $position_arobase = strpos($_POST['contactEmail'], '@');
    if($position_arobase === false)
        echo '<p>Votre email doit comporter un arobase.</p>';
    else {
        $retour = mail('nelson.vanicatte@lepoles.com', 'Envoi depuis page Contact', $_POST['contactMessage'], 'From : ' . $_POST['contactEmail']);
        if($retour)
            echo '<p>Votre message a été envoyé.</p>';
        else
            echo '<p>Erreur.</p>';
    }
}

    

   
} // Fin du if($_POST)
?>
   <?php
  
    ?>
<h1 class="text-center">Contact</h1>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
<div class="container">
<form name="form1"  method="POST">
  <div class="form-contact">
  <?php echo $contactFirstNameError; ?>
    <label for="exampleFormControlInput1">Prénom</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Votre prénom" name="contactFirstName">
  </div>
  <div class="form-contact">
  <?php echo $contactEmailError; ?>
    <label for="exampleFormControlInput1">Email</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Votre email" name="contactEmail">
  </div>
  <div class="form-contact">
  <?php echo $contactMessageError; ?>
    <label for="exampleFormControlTextarea1">Votre message</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="contactMessage" ></textarea>
    <button  class="btn btn-primary offset-md-5 mt-4" value="Envoyer" type="submit" action="validate">Envoyer</button>
  </div>
</div>

</body>
</html>


<?php require_once('inc/footer.inc.php');?>
