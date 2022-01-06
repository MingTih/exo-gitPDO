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

    

        <h1 class="text-center m-5">Nouvelle voiture</h1>

        <form action="" method="post" class="w-50 mx-auto">

            <div class="form-floating m-3">
                <input type="text" class="form-control" id="marque" placeholder="Marque de la voiture" name="marque">
                <label for="marque">Marque</label>
            </div>
            <div class="form-floating m-3">
                <input type="text" class="form-control" id="modele" placeholder="Modèle de la voiture" name="modele">
                <label for="modele">Modèle</label>
            </div>
            <div class="form-floating m-3">
                <input type="text" class="form-control" id="puissance" placeholder="Puissance de la voiture" name="puissance">
                <label for="puissance">Puissance</label>
            </div>
            <div class="form-floating m-3">
                <input type="text" class="form-control" id="annee" placeholder="annee" name="annee">
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
