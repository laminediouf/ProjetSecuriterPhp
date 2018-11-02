<?php
    include_once('connexion_sql.php');
    session_start();
	include_once('logout.php');

    if(isset($_GET['id_client']))
    {
        $_SESSION['id_client']=$_GET['id_client'];
    }

    if(isset($_POST['nom']) OR isset($_POST['prenom']) OR isset($_POST['adresse'])
    OR isset($_POST['sexe']) OR isset($_POST['salaire']) OR isset($_POST['service']))
    {
        $req=$bdd->prepare('UPDATE client SET nom=:nom,prenom=:prenom,adresse=:adresse,sexe=:sexe,salaire=:salaire,service=:service WHERE codCli=:codCli') or die(print_r($bbd->errorInfo()));
        $req->execute(array(
            'codCli'=>$_SESSION['id_client'],
            'nom'=>$_POST['nom'],
            'prenom'=>$_POST['prenom'],
            'adresse'=>$_POST['adresse'],
            'sexe'=>$_POST['sexe'],
            'salaire'=>$_POST['salaire'],
            'service'=>$_POST['service']
        ));
        echo '<script>alert("La modification a ete prise en compte")</script>';
    }

    $reponse=$bdd->prepare('SELECT * FROM client WHERE codCli=:codCli') or die(print_r($bdd->errorInfo()));
    $reponse->execute(array(
        'codCli'=>$_SESSION['id_client']
    ));
    $donnees=$reponse->fetch();
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
            [class*="titre"]
            {
                margin-left: 42%;
                margin-right: 40%;
            }
            [class*="panel panel-primary"]
            {
                margin-top: 5%;
            }
        </style>
		<title>Modifier client</title>
    </head>
    <body>
        <div class="container">
            <?php include("menu.php"); ?>
            <form class="form-horizontal" action="modifier-client.php" method="post" onsubmit="return validate(this)">
                <fieldset>
                    <h2 class="titre">modifier client :</h2>
                    <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-4">
                            <input type="text" id="id_client" name="id_client" placeholder="id" class="form-control input-md" value="<?php echo htmlspecialchars($donnees['codCli']);?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-4">
                            <input type="text" id="nom" name="nom" placeholder="Nom" class="form-control input-md" value="<?php echo htmlspecialchars($donnees['nom']);?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-4">
                            <input type="text" id="prenom" name="prenom" placeholder="Prenom" class="form-control input-md" value="<?php echo htmlspecialchars($donnees['prenom']);?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-4">
                            <input type="text" id="adresse" name="adresse" placeholder="Adresse" class="form-control input-md" value="<?php echo htmlspecialchars($donnees['adresse']);?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-4">
                            <input type="text" id="sexe" name="sexe" placeholder="Sexe" class="form-control input-md" value="<?php echo htmlspecialchars($donnees['sexe']);?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-4">
                            <input type="text" id="salaire" name="salaire" placeholder="Salaire" class="form-control input-md" value="<?php echo htmlspecialchars($donnees['salaire']);?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-4">
                            <input type="text" id="service" name="service" placeholder="Service" class="form-control input-md" value="<?php echo htmlspecialchars($donnees['service']);?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-4 control-label">
                            <input type="submit" value="Modifier client" class="btn btn-info btn-block">
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <script src="../js/validate_form_client.js"></script>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script>
            $(function(){
                $('blockquote a').tooltip();
            });
        </script>
    </body>
</html>
