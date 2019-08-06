<?php require_once('../inc/init.inc.php');
// Variable d'affichage
$titleError = '';
$photoError = '';
$contentError = '';
$linkError = '';

// verification des champs 
if($_POST)
{
    // Je vérifie que chaque champs n'esxistent pas ou qu'il ne correspondent pas a ce que j'attend. Dans ce cas un usage d'erreur sera affiché
    if(empty($_POST['title']) || iconv_strlen($_POST['title']) < 2 || iconv_strlen($_POST['title']) > 60)
    {
        $titleError .= '<span class="text-danger text-center"> ** Veuillez saisir votre titre entre 5 et 30 caractères</span>';
    }

    if(empty($_POST['link']) || !preg_match('#^(http|https)://[\w-]+[\w.-]+\.[a-zA-Z]{2,6}#i', $_POST['link']))
        {
           $linkError .= '<span class="text-danger text-center"> ** Veuillez mettre URL valide</span>';
        }

    if(empty($_POST['photo']))
    {
        $photoError .= '<span class="text-danger text-center"> ** Veuillez mettre image valide</span>';
    } 

    if(empty($_POST['content']))
    {
        $contentError .= '<span class="text-danger text-center"> ** Veuillez saisir votre article</span>';
    }
    
    // Si je n'ai pas de message d'erreur j'effectue l'insertion dans la bdd

        if(empty($titleError) && empty($linkError) && empty($photoError))
     {
         // assainissement des saisies de l'internaute
        foreach ($_POST as $indice => $valeur) {
            $_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
        }

        $data_insert = $bdd->prepare("INSERT INTO articles (title, photo, content, link ) VALUES (:title, :photo, :content, :link)");

        // J'associe les valeurs saisies dans le formulaire avec les marqueurs de securité php 

        $data_insert->bindParam(':title', $_POST['title']);
        $data_insert->bindParam(':photo', $_POST['photo']);
        $data_insert->bindParam(':content', $_POST['content']);
        $data_insert->bindParam(':link', $_POST['link']);
        // J'execute l'insertion en BDD
        $data_insert->execute();
     } // Fin du if(empty(titleError...))


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
    <title>Document</title>
</head>
<body>
    <h1 class="text-center bg-success">Formulaire article</h1>
<form class="form-article col-md-6 offset-3 mt-4" method="post">
        <div class="col" name="idArticle" value="">
            <input type="hidden">
        </div>
        <div class="row mt-3">
            <div class="col-md-12 text-center mt-4">
            <?php echo $titleError; ?>
            </div>
            <div class="col">
                <input type="text" class="form-control text-center rounded-pill border border-primary" name="title"
                    placeholder="titre">
            </div>
        </div>
        <!-- photo -->
        <div class="row mt-3">
            <div class="col-md-12 text-center">
            </div>
            <div class="col">
               <?php echo $photoError; ?>
                <label for="photo"></label>
                <input type="file" id="photo" aria-describedby="" name="photo">
            </div>
            <!-- Link -->
            <div class="col mt-2">
            <?php echo $linkError; ?>
                <input type="text" class="form-control text-center rounded-pill border border-primary" name="link"
                    placeholder="link">
            </div>
            <!-- Content -->
        </div>
        <div class="mb-3 mt-3">
        <?php echo $contentError; ?>
            <textarea class="form-control text-center border border-primary rounded" id="validationTextarea"
                name="content" placeholder="Contenu de l'article"></textarea>
            <div class="invalid-feedback">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
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