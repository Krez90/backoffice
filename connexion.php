<?php 

require('bdd.php');

$email = $_POST['email'];
$pass = $_POST['password'];

//on récupère les infos de l'user correspondant à l'email
$query = $pdo->prepare("SELECT id,email,password FROM users WHERE email=?");
$query->execute([$email]);

$user = $query->fetch();

if($user) {
    //On compare le mot de passe en clair dans $_POST avec son hash en BDD avec password_verify
    if(password_verify($pass,$user['password'])) {
        //Si tout est OK, on peut stocker l'id dans une variable de session
        $_SESSION['id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        header('Location: http://localhost/backoffice-portfolio/index.php');
        header("Cache-Control: no-cache, must-revalidate");
        exit;
    }
    else {
        echo "echec de la connexion";
    }
}
else {
    echo "utilisateur inconnu";
}