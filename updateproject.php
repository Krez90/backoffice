<?php

require("bdd.php");

//Pensez à vérifier sur chaque page que l'utilisateur est connecté
if(isset($_SESSION['id']) && !empty($_SESSION['id'])) :
    
    $id = $_GET['idProject'];

    $titre=$_POST['titre'];
    $desc=$_POST['description'];
    $url=$_POST['url'];

    $insert = $pdo->prepare ("INSERT INTO projets(titre, description, url) VALUES (?,?,?)");
    $insert -> execute(array($titre, $desc, $url,));
    $insert ->fetchAll();

endif;
header('Location: http://localhost/backoffice-portfolio/index.php?success=1#index.php');
header("Cache-Control: no-cache, must-revalidate");
exit;