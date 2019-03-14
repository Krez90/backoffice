<?php require 'bdd.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Backoffice</title>
</head>
<body>
    

    <?php
        //Si on a un id dans $_SESSION, la connexion a réussi, on peut afficher le backoffice
        if(isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    ?>

    <h1>Bonjour <?=$_SESSION['email']?> que souhaitez-vous faire ?</h1>
    <a href="logout.php">Déconnexion</a>

    <form action="updateproject.php" method="POST">
        <input type="text" name="titre" placeholder="Titre"><br>
            <input type="text" name="description" placeholder="Description"><br>
            <input type="text" name="url" placeholder="Lien vers le site"><br>
            <input type="hidden" name="idProjet" value="<?=$projet['id']?>">
            <input type="submit" value="Ajouter">
        
    </form>

    <?php
        $projets = $pdo->query("SELECT id,titre,description,url FROM projets");

        foreach ($projets as $key => $projet) : 
    ?>

        <form action="deleteProject.php?idProject=<?=$projet['id']?>" method="POST" class="myForm">
            <h2><?=$projet['titre']?></h2>
            <p><?=$projet['description']?></p>
            <p><?=$projet['url']?></p>

            <input type="hidden" name="idProjet" value="<?=$projet['id']?>">
            <input type="submit" value="supprimer">
        </form>
 
    <?php endforeach;
        }
        // fin session

        else{
    ?>


    <h1>Bonjour connectez-vous pour avoir acces à l'espace admin<h1>
    <form action="connexion.php" method="POST">
        <input type="email" name="email">
        <input type="password" name="password">
        <input type="submit" value="Connexion">
    </form>
    <?php
    // fin du else
        };

    ?>
    </body>

<script> 

    function myFonction(e){
        e.preventDefault();
        var r = confirm("Souhaitez-vous réellement supprimer le dossier ?");
            if (r == true){
                e.target.submit();
            }
        }
    
        var myForm = document.getElementsByClassName("myForm");
            for (let i = 0; i < myForm.length; i++) {
                myForm[i].addEventListener("submit",function(e) {
                myFonction(e);
            })
        }

</script>
</html>