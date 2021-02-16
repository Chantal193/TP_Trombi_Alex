<?php

// affiche un tableau de tableau  PHP de type associatif nom, prenom photo
function displayTable($pTable)
{
    if(!empty($pTable))
    {
        // affichage en mode TABLE HTML
        $lHTMLTable = "<BR><CENTER><TABLE BORDER=\"0\">\n";
        foreach($pTable as $lEntry)
        {
            $lPhoto = $lEntry['Photo'];
            $lPrenom = $lEntry['Prenom'];
            $lNom = $lEntry['Nom'];
            
            $lHTMLTable .= "<TR>\n";
            $lHTMLTable .= "<TD>\n";
            $lHTMLTable .= "<img height='100px' src=\"$lPhoto\">\n";
            $lHTMLTable .= "</TD><TD>\n";
            $lHTMLTable .= "$lPrenom\n";
            $lHTMLTable .= "</TD><TD>\n";
            $lHTMLTable .= "$lNom\n";
            $lHTMLTable .= "</TD>\n";
            $lHTMLTable .= "</TR>\n";
        }
    
        $lHTMLTable .= "</TABLE></CENTER>";
        echo "$lHTMLTable";
    }
}

// Affichage un header basique, avec paramètrage du titre 
function displayHTMLHeader($pTitle)
{
    ?>
    <HTML>
        <HEAD>
            <title><?= $pTitle ?> </title>
        </HEAD>
    <BODY>
    
    <?php
}

// affichage du footer
function displayHTMLFooter()
{
    echo "</body>
    </html>";
}

// affichage du formulaire de recherche
function displayHTMLSearch()
{
    ?>

<form action="trombi.php" method="get">
    <p align='center'>Qui recherchez-vous ?</p>
    <p align='center'><input type="text" name="q"/><input type="submit" value="OK"></p>
</form>

    <?php
}

// affichage du formulaire d'identification
function displayHTMLLogin()
{
    ?>
<p align='center'>Bienvenue dans la classe des 19.7, c'est pas la classe ça ?</p>
<form action="trombi.php" method="post">
    <p align='center'>Login: <input type="text" name="login"/></p>
    <p align='center'>Password: <input type="password" name="pwd"/></p>
    <p align='center'><input type="submit" value="Login"></p>
</form>

<p align="center"><a href="inscription.php">Pas encore inscrit ? cliquer ici,c'est rapide et gratuit !</a></p> 

    <?php
}

// affichage du formulaire d'enregistrement
function displayRegistrationForm()
{
    ?>

<form action="inscription.php" method="post">
    <p align='center'>Nom <input type="text" name="name"/></p>
    <p align='center'>Prénom <input type="text" name="firstname"/></p>
    <p align='center'>URL de la photo <input type="text" name="photo"/></p>
    <p align='center'>Description <input type="text" name="description"/></p>
    <p align='center'>Mot de passe <input type="password" name="pwd"/></p>
    <p align='center'><input type="submit" value="Inscription"></p>
</form>   

<?php
}

// affichage d'un message d'erreur
function displayMessage($pMessage)
{
    ?>
    <p align="center"><font size="3" color="red"> <?= $pMessage ?> </font></p>
    <?php
}

?>