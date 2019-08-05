<?php
require_once('inc/header.inc.php');

// requete de selection on recupere les articles de la  BDD
$resultat = $bdd->query("SELECT * FROM articles");
while($article = $resultat->fetch(PDO::FETCH_ASSOC)){
// J'affuche  les article via la bdd avec la variable $contenue
  '<div class="main-section bg-transparent col-md-10 mt-2">';
   $contenu .=   '<div class="card-container">';
   $contenu .=      '<img src="img/'.$article['photo'].'" alt="" class="cardImage">';
   $contenu .=       '<div class="card-text-container">';
   $contenu .=      '<span class="card-span"></span>';
   $contenu .=    '<h1 class="article-title">'.$article['title'].'</h1>';
   $contenu .=       '<p class="article-descrip bg-transparent">'.$article['content'].'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugit pariatur eos ipsum voluptate a animi placeat velit sapiente explicabo blanditiis? Pariatur ut in temporibus nesciunt voluptate doloremque cum, error quasi?</p>';
   $contenu .=      '<a  href="#" target="_blank" class="read-more-button">Read More</a>';
   $contenu .=     '</div>';
   $contenu .=   '</div>';
}

?>


<h1 class="text-center text-primary">articles</h1>

 

   
     <div class="menue col-md-8 offset-md-4">
      <section class="nav-article col-md-4 offset-md-8 bg-dark">
       
      </section>
     </div>
     <section class="container">
    <div class="row">
        <?= $contenu; ?>
    </div><!--  Fin row -->
</section>

<?php require_once('inc/footer.inc.php');?>
