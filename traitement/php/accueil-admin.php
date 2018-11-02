<?php
    include_once('connexion_sql.php');
	session_start();
	include_once('logout.php');
    
/*    $reponse=$bdd->query('SELECT commande.id AS id_commande, nom, prenom, adresse, dateCom, SUM( prix_total ) AS total FROM commande, ligne_commande, client WHERE commande.id=ligne_commande.codCom GROUP BY commande.id') or die(print_r($bdd->errorInfo()));
    //Ceci verifie si il y a des commandes
    $verification=false;  */
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <link href="../css/bootstrap.css" rel="stylesheet">
        <style type="text/css">
            body
            {
                background-color: #DDD;
                padding-top: 10px;
            }
            [class*="col-"]
            {
                margin-bottom: 20px;
            }
            img
            {
                width: 100%;
            }
            .well
            {
                background-color: #CCC;
                padding: 20px;
            }
            a:active, a:focus
            {
                outline: none;
            }
            [class*="nav navbar-nav"]
            {
                margin-left: 35px;
            }
        </style>
	<title>Accueil</title>
    </head>
    <body>
        <div class="container">
            <?php include("menu.php"); ?>
            <div class="row">
                <section class="col-sm-8">
                    <div id="carousel" class="carousel slide">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel" data-slide-to="1"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active"><img alt="Paysage" src="../../media/1237.jpg"></div>
                            <div class="item"><img alt="Paysage" src="../../media/1238.jpg"></div>
                        </div>
                    </div>
                </section>
            </div>

        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script>
            $(function(){
                $('.carousel').carousel();
                $('blockquote a').tooltip();
            });
        </script>
    </body>
</html>
