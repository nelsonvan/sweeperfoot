<?php 
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

        // Verification des champs 
        
        
        
    }
 ?>
<?php require_once('inc/header.inc.php');?>


<form  method="POST">
<div class="container col-md-5 mt-4">
  <div class="form-group">
    <label for="exampleInputPassword1"></label>
    <input type="text" class="form-control" id="exampleInputfirstName" placeholder="Prénom" name="userFirstName">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"></label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Entrez votre pseudo"  name="userPseudo">
  </div>
    <div class="form-group">
        <label for="exampleInputEmail1"></label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre email"  name="userEmail">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword"></label>
    <input type="password" class="form-control" id="exampleInputPassword" placeholder="Mot de passe"  name="userPw">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword"></label>
    <input type="password" class="form-control" id="exampleInputPassword" placeholder="Confirme mot de passe"  name="userPwConf">
  </div>
  <button  class="btn btn-primary offset-md-5" value="Envoyer" type="submit">Inscription</button>
</form>
</div>
 

