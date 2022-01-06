<?php
    echo "<pre>";
        print_r($_POST);
    echo "</pre>";

    $msg="";

    if(isset($_POST["nom"])
        && isset($_POST["prenom"])
        && isset($_POST["age"])
        && isset($_POST["permis"])
        && isset($_POST["mail"])
        && isset($_POST["ville"])
        && isset($_POST["mdp"])){

            $nom=strtoupper(trim($_POST["nom"]));
            $prenom=ucfirst(trim($_POST["prenom"]));
            $age=$_POST["age"];
            $permis=strtoupper($_POST["permis"]);
            $mail=$_POST["mail"];
            $ville=strtoupper($_POST["ville"]);
            $mdp=$_POST["mdp"]; //!!!!!!!!!!Ce n'est pas bon de recup de mot de passe en brut comme ça. Il faut donc le hâcher. ===> Voir correction
                                    //On peut use password_hash() avec php
          
            if(empty($_POST["nom"])
                ||empty($_POST["prenom"])
                ||empty($_POST["age"])
                ||empty($_POST["mail"])
                ||empty($_POST["ville"])
                ||empty($_POST["mdp"])){

                    $msg = "<div class=\"alert alert-danger\" role=\"alert\">Veuillez saisir tous les champs.</div>";

            }else{
                $dsn = 'mysql:dbname=php-pdo;host=127.0.0.1';
                $user = 'root';
                $password = '';
        
                try {
                    $bdd = new PDO($dsn, $user, $password); 
                    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
                } catch (PDOException $e) {
                    echo 'Échec lors de la connexion : ' . $e->getMessage();
                }
    
                $requeteCond = $bdd->prepare("INSERT INTO conducteur (nom, prenom, age, permis, mail, ville, mdp) VALUES (?,?,?,?,?,?,?)");
    
                $newConducteur = $requeteCond->execute([
                    $nom,
                    $prenom,
                    $age,
                    $permis,
                    $mail,
                    $ville,
                    $mdp
                ]);
                
                $msg = "<div class=\"alert alert-success\" role=\"alert\">Félicitations " .$prenom." , votre compte a bien été enregistré.</div>";
            }

    }elseif(isset($_POST["nom"])
        && isset($_POST["prenom"])
        && isset($_POST["age"])
        && !isset($_POST["permis"])
        && isset($_POST["mail"])
        && isset($_POST["ville"])
        && isset($_POST["mdp"])){
        $msg = "<div class=\"alert alert-danger\" role=\"alert\">Veuillez saisir tous les champs.</div>";
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
        <title>Exo BDD - utilisateur</title>
        <link rel="icon" href="images/smiley-tire-la-langue.jpg" type="image/gif" sizes="16x16">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css" /> 
    </head>

    <body>
    
    <!--Exercice 3 : Realiser un formulaire avec la methode post, et affichez les données

        Nouveau conducteur 

        Nom
        Prenom
        Age
        Permis (liste deroulante)
        Mail
        Ville
        Mot de passe 
    
            
        1_Formulaire avec les champs
        2_ Créer la table sql "conducteur" avec les champs (sans oublier le champs id
        3_ Dans le formulaire, recuperer les informations dans le POST
        4_ Enregistrer les infos dans des variables
        5_ Connexion a la BDD
        6_ Preparer la requete
        7_ Executer la requete avec la bonne liste au parametre
        8_ Recuperer dans une variable l'information de si la requete est un succes ou non.
        Si c'est un succes, afficher le message que l'enregistrement est reussi
-->

    

        <h1 class="text-center m-5">Ajouter un nouveau conducteur</h1>

        <?=$msg?>

        <form action="" method="post" class="w-50 mx-auto">

            <div class="form-floating m-3">
                <input type="text" class="form-control" id="nom" placeholder="Nom" name="nom">
                <label for="nom">Nom</label>
            </div>
            <div class="form-floating m-3">
                <input type="text" class="form-control" id="prenom" placeholder="Prénom" name="prenom">
                <label for="prenom">Prénom</label>
            </div>
            <div class="form-floating m-3">
                <input type="number" class="form-control" id="age" placeholder="Age" name="age">
                <label for="age">Age</label>
            </div>

            
            <select class="form-select m-3 p-3" aria-label="Sélectionner le permis" name="permis">
                <!-- !!! Pour la première opion, peut mettre value="", c'est plus simple pour les conditions en php -->
                <option selected disabled>Permis</option>
                <option value="a">Permis A</option>
                <option value="b">Permis B</option>
                <option value="c">Permis C</option>
                <option value="d">Permis D</option>
                <option value="e">Permis E</option>
                <option value="am">Permis AM</option>
            </select>

            <div class="form-floating m-3">
                <input type="email" class="form-control" id="mail" placeholder="name@example.com" name="mail">
                <label for="mail">Mail</label>
            </div>
            <div class="form-floating m-3">
                <input type="text" class="form-control" id="ville" placeholder="Ville" name="ville">
                <label for="ville">Ville</label>
            </div>
            <div class="form-floating m-3">
                <input type="password" class="form-control" id="mdp" placeholder="Mot de passe" name="mdp">
                <label for="mdp">Mot de passe</label>
            </div>

            <input type="submit" value="Valider" class="btn btn-primary d-block mx-auto">

        </form>




    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>

</html>
