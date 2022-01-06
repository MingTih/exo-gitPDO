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
 
//Notre objectif est d'afficher le résultat d'une requête-------------------------------------------------------------------------------------------------------

    $resultatRequete = $bdd->query("SELECT * FROM voiture"); //"Matérialisation" des infos de la bdd dans un objet qui nous renvoie un objet non lisible en l'état

//On constate que resultatRequete ne contient pas directement tout le résultat de la requete, et qu'il contient/renvoie un obj
    // echo "<pre>"; 
    //     print_r($resultatRequete);
    // echo "</pre>";

//La méthode qui permet d'extirper les informations ---------------------------------------------------------------------------------------------------------------
    //fetch() permet d'extraire/récup UNE ligne sous forme de tableau.------------------------
    // ATTENTION, il permet de récupérer uniquement une ligne et par odre croissante (d'ab la 1ere, puis la 2eme, ...)
    //FETCH_ASSOC est une constante qui dépend/est rattachée à la classe PDO (il est possible qu'une librairie ait aussi déf une constante du même nom dans ce cas là, risque de conflts). On précise donc PDO:: devant FETCh_ASSOC.
    //Il existe plein d'autre constante pour fetch, par exemple FETCH_NUM,.. Voir docu et tester
        //$uneLigne = $resultatRequete->fetch(PDO::FETCH_ASSOC); //Index = nom des colonnes
        //$uneAutreLigne = $resultatRequete->fetch(PDO::FETCH_NUM); // Index = nméroté à partir de 0 et croissant
        //$bothLigne = $resultatRequete->fetch(PDO::FETCH_NUM); // Index = les 2

    // echo "<pre>"; 
    //     print_r($uneLigne);
    //     print_r($uneAutreLigne);
    // echo "</pre>";

    // fetchAll() permet de récup TOUTES les lignes-------------------------------------------
    $toutesLesLignes = $resultatRequete->fetchAll(PDO::FETCH_ASSOC);

    // echo "<pre>"; 
    //     print_r($toutesLesLignes);
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
        <title>COURS SUR SELECT</title>
        <link rel="icon" href="images/smiley-tire-la-langue.jpg" type="image/gif" sizes="16x16">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css" /> 
    </head>

    <body>
        <h1 class="text-center m-5">Liste des voitures</h1>

        <table class="table table-striped container w-75 mx-auto mt-5">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Marque</th>
                <th scope="col">Modèle</th>
                <th scope="col">Puissance</th>
                <th scope="col">Année</th>
                <th scope="col">Couleur</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <!-- On va faire boucler pour faire les lignes. Ici, la  liste s'appelle $toutesLesLignes -->

                <?php

                //Parcours toutesles ligne de toutesLesLignes
                    foreach($toutesLesLignes as $ligne=>$listeLigne){
                        ?>
                        <tr>
                            <th scope="row"><?=$listeLigne["id_voiture"]; ?></th>
                            <td><?=$listeLigne["marque"];?></td>
                            <td><?=$listeLigne["modele"];?></td>
                            <td><?=$listeLigne["puissance"];?> chv</td>
                            <td><?=$listeLigne["marque"];?></td>
                            <td><?=$listeLigne["couleur"];?></td>
                            <td><a href="detail-voiture.php?id=<?=$listeLigne["id_voiture"];?>" class="btn btn-success">Detail</td>
                        </tr>

                        <?php

                    }     
                
                ?>
                
            </tbody>
        </table>




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>

</html>


<!-- o2switch : hébergement -->
<!-- ovh -->
<!-- infinity free -->