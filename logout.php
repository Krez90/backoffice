<?php

session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Backoffice_portfolio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
<a href="http://localhost/backoffice-portfolio/index.php">Retourner à la page de connexion</a>
    
</body>
</html>

<?php
$_SESSION = [];
session_destroy();