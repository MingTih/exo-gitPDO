<?php

// Connexion à la base de donnée, très important : Il faut le nom de la bdd, le serveur, l'utilisateur et le mdp
$dsn = 'mysql:dbname=php-pdo;host=127.0.0.1'; //host : nom du serveur, ici localhost = 127.0.0.1
$user = 'root';
$password = '';

try {
    $bdd = new PDO($dsn, $user, $password); //Création de l'objet qui se connecte à la basse de données => démarrage connexion bdd
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Changemt attr
} catch (PDOException $e) {//Si attrape une erreur, il prend l'obj qui contient des erreurs, il l'affiche le message qui est associé
    echo 'Échec lors de la connexion : ' . $e->getMessage();
}

// "->" permet d'appeler une méthode après un objet PDO
    //executer une requête en SQL dans PHP avec méthode exec()
    //Il y a une autre méthode pour insérer des lignes dans un tableau en précisant les colonnes que l'on veut modif ==> Voir cours SQL

// $bdd->exec("INSERT INTO voiture VALUES (NULL,'bmw','z4',5,2015,'white')");
    $requete = "INSERT INTO voiture VALUES (NULL,'bmw','z4',5,2015,'white')";
    // echo $bdd->exec($requete);

    if($bdd->exec($requete)){ // Les méthodes sont rattachées à l'obj. Peut pas être tout seul comme on a vu avec les fonctions. Renvoie int|false
        echo "<p>La voiture a bien été ajouté en base de données !</p>";
    }else{
        echo "<p>Erreur : La bse de donnée n'a pas été affectée</p>";
    }

    $marque = "Mercedes";
    $modele = "Classe-A";
    $puissance = 7;
    $annee = 2018;
    $couleur = "blanc";
    // $couleur = "noir'); DROP TABLE voiture;"; ==injection SQL
    // $couleur = "<script>alert(\"SPAM\");</script>"; ==>injection XSS après un echo

    //!!!!!! On voit qu'utilisée seule, la méthode exec n'est pas sécurisé
    //Elle est susceptible d'être attaquée en utilisant des failles SQL ou des failles XSS
    //On utilisera exec uniquement pour des requêtes simples qui n'impliquent pas d'inputs utilisateurs !!!!!!!
    $requete = "INSERT INTO voiture (marque,modele,puissance,annee,couleur) VALUES ('$marque', '$modele','$puissance','$annee','$couleur')"; 
    // !!!!! On ne fait pas comme ça normalement pour les formulaires car gros souci de sécurité, si rentre une ligne de code SQL ici, il sera executé!!!!!!!!

    if($bdd->exec($requete)){
            echo "<p>La voiture a bien été ajouté en base de données !</p>";
        }else{
            echo "<p>Erreur : La bse de donnée n'a pas été affectée</p>";
        }

    //Les backticks `` sont utiles en SQL, c'est un peu comme les quotes. Mais en php ça peut créer des erreurs. Dans ce cas là, les enlever


    //La méthode de la préparation de requêtes pour plus de sécurité
        //On veut assainir le code---------------------------------------------
            //Il est possible d'utiliser des fonction comme addslash,.. Pour éviter que ce qui est dans l'input soit interprété comme du code.
            //Aujourd'hui, méthode de préparation ==> préparation puis exécution : en 2 temps pour éviter injection de code

    /*On a vu qu'on utilise la méthode prepare() pour préparer une requête

        - Ensuite, il y a deux façons de lier les paramètres:
            - BindParam
            - en argument de execute
        - Puis on utilise la méthode execute() pour exécuter la requête préparée.
        Exécute nous renvoie true si tout a bien fonctionné, false si non.

        Voir détail dans la documentation -> https://www.php.net/manual/fr/pdo.prepared-statements.php


    */

    $marque = "Tesla";
    $modele = "X";
    $puissance = 8;
    $annee = 2020;
    $couleur = "noir";

    $requetePrepare = $bdd->prepare("INSERT INTO voiture (marque,modele,puissance,annee,couleur) VALUES (?,?,?,?,?)");

    $resultat = $requetePrepare->execute([
        $marque,
        $modele,
        $puissance,
        $annee,
        $couleur
    ]);

    if($resultat){
        echo "<p>La $marque a bien été ajouté</p>";
    }else{
        echo "<p>Il y a eu un soucis avec l'enregistrement en base de données!</p>";
    }
    
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="description" content="Web tutorials"><!--description de la page-->
        <meta name="keywords" content="HTML,CSS,JavaScript"> <!--Mot clef de la page-->
        <meta name="author" content="Naggara Samir"><!--Auteur du site-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>COURS SUR BDD</title>
        <link rel="icon" href="images/smiley-tire-la-langue.jpg" type="image/gif" sizes="16x16">
        <link rel="stylesheet" href="css/reset.css" />
        <link rel="stylesheet" href="css/style.css" /> 
    </head>

    <body>
        <?php  
            echo "<p>Hello World ! </p>";  
        ?>
    </body>

</html>
