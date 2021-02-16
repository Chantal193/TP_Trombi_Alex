<?php 

session_start();

require_once "./Utils/View.php";
require_once "./Utils/Model.php";
require_once "./Utils/Utils.php";


// Si pas de données passées, on affiche le formulaire d'enregistrement
if(empty($_POST))
{
    displayRegistrationForm();
}
else
{
    // si les données envoyées sont bonnes
    if(    verifyKey($_POST, 'name')    
        && verifyKey($_POST, 'firstname') 
        && verifyKey($_POST, 'photo')
        && verifyKey($_POST, 'pwd')
        && verifyKey($_POST, 'description'))
    {
        // insertion dans la  bdd
        insertIntoDB($_POST['name'], $_POST['firstname'], $_POST['photo'], $_POST['description'], $_POST['pwd']);
        $_SESSION['connexion'] = "registrationOK";
        // redirection vers la page index pour s'identifier après enregistrement
        $lURL = "Location: " . "./index.php";
        header($lURL);
    }
    else
    {
        // redirection vers la page index pour gérer l'erreur
        $_SESSION['connexion'] = "registrationKO";
        $lURL = "Location: " . "./index.php";
        header($lURL);
    }
}
