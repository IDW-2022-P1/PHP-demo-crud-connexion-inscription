<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Inscription</h1>
    <!-- si email existe déjà -->
    <?php if(isset($_SESSION['erreurEmailExistant'])): ?>
        <p class="error"><?= $_SESSION['erreurEmailExistant'] ?></p>
        <?php 
            session_destroy();
            endif; 
        ?>
    <main>

        <form action="register.php" method="post">
            <div class="mb-3">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="form-control">
            </div>
            <div class="mb-3">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" class="form-control">
                </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="mdp">Mot de passe</label>
                <input type="password" name="mdp" class="form-control">
            </div>
            <div class="mb-3">
                <input type="submit" value="Enregistrer" class="btn btn-primary">
            </div>
        </form>
    </main>
</body>
</html>