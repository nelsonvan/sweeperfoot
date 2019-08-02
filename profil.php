<script>
    session_start();

</script>
<?php 
require_once("inc/init.inc.php"); 






if (isset($_GET['action']) && $_GET['action'] == 'deconnexion') {
    session_destroy();
    header('Location: acceuil.php');
}
require_once("inc/header.inc.php");




?>



<h1 class="col-md-6 text-center text-primary">Mon profil </h1>

<a href="?action=deconnexion" class="admin-btn btn-danger rounded-pill offset-10 mt-2
    ">Deconnexion</a>


