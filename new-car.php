<?php
    echo "<pre>";
        print_r($_POST);
    echo "</pre>";

//VERSION CORRIGEE

    $msg="";

    if(isset($_POST["marque"])
        && isset($_POST["modele"]) 
        && isset($_POST["puissance"])
        && isset($_POST["annee"])
        && isset($_POST["couleur"])){
        $marque = ucfirst(trim($_POST["marque"])); //Avec trim et ucfirst, je m'assure qu'il n'y ait pas d'espacement inutile, et que la première lettre est en majuscule
        $modele = strtoupper(trim($_POST["modele"]));
        $puissance = trim($_POST["puissance"]);
        $annee = trim($_POST["annee"]);
        $couleur = ucfirst(trim($_POST["couleur"]));

        
        $dsn = 'mysql:dbname=php-pdo;host=127.0.0.1'; //host : nom du serveur, ici localhost = 127.0.0.1
        $user = 'root';
        $password = '';

        try {
            $bdd = new PDO($dsn, $user, $password); //Création de l'objet basse de données => démarrage connexion bdd
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Changemt attr
        } catch (PDOException $e) {//Si attrape une erreur, il prend l'obj qui contient des erreurs, il l'affiche le message qui est associé
            echo 'Échec lors de la connexion : ' . $e->getMessage();
        }

        $requete = $bdd->prepare("INSERT INTO voiture (marque,modele,puissance,annee,couleur) VALUES (?,?,?,?,?)");

        
        if(empty($_POST["marque"])
        || empty($_POST["modele"])
        || empty($_POST["puissance"])
        || empty($_POST["annee"]) 
        || empty($_POST["couleur"])){
            $msg = "<div class=\"alert alert-danger\" role=\"alert\">Veuillez saisir tous les champs.</div>";
        }else{
            $newVoiture = $requete->execute([
                $marque,
                $modele,
                $puissance,
                $annee,
                $couleur
            ]);
            $msg = "<div class=\"alert alert-success\" role=\"alert\">Votre voiture ".$marque. " - " .$modele. " a bien été enregistrée.</div>";
        }
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
        <title>Exo BDD - voiture</title>
        <link rel="icon" href="images/smiley-tire-la-langue.jpg" type="image/gif" sizes="16x16">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css" /> 
    </head>

    <body>
    <!-- Exercice 1 : Réaliser un formulaire avec la methode post, et affichez les données

        Marque
        Modele
        Puissance (nombre)
        L'année
        La couleur-->

    <!-- Exercice : Faites en sorte que le formulaire "ajouter une nouvelle voiture" ajoute la nouvelle voiture dans la BSS.
        Affichez alors un message de succes-->

    

        <h1 class="text-center m-5">Ajouter une nouvelle voiture</h1>

        <?=$msg?> 

        <form action="" method="post" class="w-50 mx-auto">

            <div class="form-floating m-3">
                <input type="text" class="form-control" id="marque" placeholder="Renault" name="marque">
                <label for="marque">Marque</label>
            </div>
            <div class="form-floating m-3">
                <input type="text" class="form-control" id="modele" placeholder="Serie-A" name="modele">
                <label for="modele">Modèle</label>
            </div>
            <div class="form-floating m-3">
                <input type="number" class="form-control" id="puissance" placeholder="7" name="puissance">
                <label for="puissance">Puissance</label>
            </div>
            <div class="form-floating m-3">
                <input type="number" class="form-control" id="annee" placeholder="2015" name="annee">
                <label for="annee">Année</label>
            </div>
            <div class="form-floating m-3">
                <input type="text" class="form-control" id="couleur" placeholder="couleur" name="couleur">
                <label for="couleur">Couleur</label>
            </div>

            <input type="submit" value="Valider" class="btn btn-success d-block mx-auto">

        </form>




    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>

</html>
