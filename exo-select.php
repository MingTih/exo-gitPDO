<?php
// Connexion àà la BDD
$dsn = 'mysql:dbname=php-pdo;host=127.0.0.1';
$user = 'root';
$password = '';

try {
    $bdd = new PDO($dsn, $user, $password); 
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch (PDOException $e) {
    echo 'Échec lors de la connexion : ' . $e->getMessage();
}

    $infoTableConduct = $bdd->query("SELECT * FROM conducteur");


    $allConductors = $infoTableConduct->fetchAll(PDO::FETCH_ASSOC);

    // echo "<pre>"; 
    //     print_r($allConductors);
    // echo "</pre>";

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="description" content="Web tutorials"><!--description de la page-->
        <meta name="keywords" content="HTML,CSS,JavaScript"> <!--Mot clef de la page-->
        <meta name="author" content="Naggara Samir"><!--Auteur du site-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Exo select</title>
        <link rel="icon" href="images/smiley-tire-la-langue.jpg" type="image/gif" sizes="16x16">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css" /> 
    </head>

    <body>
        <!-- EXERCICE : Afficher tous les conducteurs dans un tableau 
            1_ Connexion a la bdd
            2_Execution de la requete avec la methode query
            3_Recuperer toutes les donnéeds dans une listes grace à la mathode fetchAll
            4_ Commencer votre tableau HTML
            5_ Ajoutez au tableau la boucle foreach, qui vous permet d'afficher toutes les données au bon endroit-->

        <h1 class="text-center m-5">Liste des conducteurs</h1>

        <table class="table container table-striped w-75 mx-auto mt-5">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Age</th>
                    <th scope="col">Permis</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Ville</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    foreach($allConductors as $conductor){
                ?>            
                    <tr>
                        <th scope="row"><?=$conductor["id_conducteur"]?></th>
                        <td><?=$conductor["nom"]?></td>
                        <td><?=$conductor["prenom"]?></td>
                        <td><?=$conductor["age"]?></td>
                        <td><?=$conductor["permis"]?></td>
                        <td><?=$conductor["mail"]?></td>
                        <td><?=$conductor["ville"]?></td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>

</html>

