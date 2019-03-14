<?php require 'bdd.php'; ?>

<!--Mes ajouts-->
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Backoffice</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <?php
        //Si on a un id dans $_SESSION, la connexion a réussi, on peut afficher le backoffice
        if(isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    ?>

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="assets/img/sidebar-4.jpg">
    <!--
        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="index.php" class="simple-text">
                    Compte admin
                </a>
                <p class="adresse_mail"><?=$_SESSION['email']?></p>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="index.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="user.php">
                        <i class="pe-7s-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>

                <li>
                    <a href="icons.php">
                        <i class="pe-7s-science"></i>
                        <p>Icons</p>
                    </a>
                </li>
                <li>
                    <a href="maps.php">
                        <i class="pe-7s-map-marker"></i>
                        <p>Maps</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               <p>Compte</p>
                                   
                              
                            </a>
                            <ul class="dropdown-menu">
                                <li><p><?=$_SESSION['email']?></p></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
										Menu
										<b class="caret"></b>
									</p>

                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="user.php">User Profile</a></li>
                                <li><a href="icons.php">Icons</a></li>
                                <li><a href="maps.php">Maps</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li>
                        <li>
                            <a href="logout.php">
                                <p>Déconnexion</p>
                            </a>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Projets</h4>
                                <p class="category">Que souhaitez-vous faire ?</p>
                            </div>
                            <div class="content">
                                <div>
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
                                </div>
                                <div class="footer">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="https://bilelh.promo-24.codeur.online/portfolio/">Creative B.H</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>

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