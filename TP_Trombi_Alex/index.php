<?php
// Démarer la session PHP afin de véhiculer des données entre page
// qui s'autodétruiront
session_start();


# import des données et fonctions d'affichage
require_once "./Utils/View.php";

// choix de l'affichage
displayHTMLHeader("Login");
displayHTMLLogin();

// Si il y a déjà un session et qu'on se retouve sur cette page, c'est que soit:
// 1: erreur d'identification
// 2: enregistrement ok, il faut maintenant s'identifier
if(isset($_SESSION['connexion']))
{
    switch($_SESSION['connexion'])
    {
        case "registrationOK":displayMessage("Enregistrement effectué ! Veuillez vous connecter."); break;
        case "registrationKO":displayMessage("Erreur à l'enregistrement, veuillez reommencer."); break;
        case "badIdentifier": displayMessage("Identifiants inconnus, veuillez reommencer."); break;
        default: break;
    }
}

displayHTMLFooter();

    