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
        Mot de passe -->

    

        <h1 class="text-center m-5">Nouveau conducteur</h1>

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
                <input type="text" class="form-control" id="age" placeholder="Age" name="age">
                <label for="age">Age</label>
            </div>

            
            <select class="form-select m-3 p-3" aria-label="Default select example" name="permis">
                <option selected disabled>Permis</option>
                <option value="a">Permis A</option>
                <option value="b">Permis B</option>
                <option value="c">Permis C</option>
                <option value="d">Permis D</option>
                <option value="c">Permis C</option>
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

            <input type="submit" value="Valider" class="btn btn-warning d-block mx-auto">

        </form>




    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>

</html>
