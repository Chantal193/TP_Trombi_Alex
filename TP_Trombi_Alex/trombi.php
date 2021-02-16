<?php
session_start();

# import des données et fonctions d'affichage
require_once "./Utils/Model.php";
require_once "./Utils/View.php";
require_once "./Utils/Utils.php";

// Vérification si: pas de données d'identification en POST ou d'information de session
// de connexion --> c'est une erreur
if(empty($_POST) && !verifyKey($_SESSION, 'connexion'))
{
    $_SESSION['connexion'] = "badIdentifier";
}
else
{   // test de l'identification
    if(     verifyKey($_POST, 'login')  
        &&  verifyKey($_POST, 'pwd'))
    {
        // récupération du mot de passe dans la bdd
        $lRes = getPassword($_POST['login']);

        // Comparaison du mdp bdd avec celui envoyé via le formulaire
        $lPWD = $_POST['pwd'];
        $lIsPasswordCorrect = password_verify($lPWD, $lRes['MotDePasse']);

        // si le mot de passe existe, ajout du nom de la personne dans $_SESSION
        // pour indiquer que tout est OK et pour s'en resservir par la suite
        // pour lui souhaiter la bienvenue
        if ($lIsPasswordCorrect) 
        {
            $_SESSION['Nom'] = $lRes['Nom'];
        }

        // sinon on véhicule des informations d'erreur de connexion
        // et revenir à la page de login
        if(!$lRes)
        {
            $_SESSION['connexion'] = "badIdentifier";
        }
        else
        {
            $_SESSION['connexion'] = "identificationOK";
        }
    }
}

// identifiant d'erreur ou pas de nom enregistré --> retour au login, avec un 
// un message d'erreur
if($_SESSION['connexion'] == "badIdentifier" || !isset($_SESSION["Nom"]))
{
    // au cas où, retirer notre variables NOM qui nous sert à valider que la connexion est OK
    unset($_SESSION["Nom"]);
    $lURL = "Location: " . "./index.php";
    // redirection vers URL (index)
    header($lURL);
    exit();
}
else
{    
    // Si identification ok, on affiche la recherche et le trombi.
    // affichage de la page
    displayHTMLHeader("Googloscope");
    displayMessage("Bienvenue ". $_SESSION["Nom"] . "!");
    displayHTMLSearch();
    
    # 2. récupération et affichage
    if(!empty($_GET))
    {	
        $lQuery =  $_GET['q'];

        if(empty($lQuery))
        {
            $lQuery = "";
        }

        // affichage du tableau, erreur si pas trouvé
        $lFoundEntries = getAllUsers($lQuery);
        if(empty($lFoundEntries))
        {
            displayMessage("Votre recherche n'a pas donné de résultats.");
        }
        else
        {
            displayTable($lFoundEntries);
        }
    }

    displayHTMLFooter();
}




