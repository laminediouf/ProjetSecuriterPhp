<?php
//Connexion a la base de donnees
try
{
    $bdd=new PDO('mysql:host=localhost;dbname=devoir_php','root','');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
