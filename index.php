<?php session_start(); ?>

<?php if(isset($_SESSION["id_utilisateur"])): ?>
    <div>
        Bonjour <?= $_SESSION['prenom_utilisateur']; ?>
    </div>
    <div>
        <a href="logout.php">Déconnexion</a>
    </div>
<?php else: ?>
    <div>
        <a href="connexion.php">Connexion</a>
    </div>
<?php endif ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <h1>Gestion des événements</h1>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href=""></a></li>
            <li><a href=""></a></li>
        </ul>
    </nav>
    <hr>
    <main>
        <section>
            <h2>Liste des événements</h2>
            <?php
                $cnx = new PDO('mysql:host=localhost;dbname=gestion_evenements;charset=utf8;port=3306','toto_evenements','toto');
                $stmt = $cnx->prepare("SELECT * FROM evenement");
                $stmt->execute();
                $evenements = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($evenements as $evt):
            ?>
                    <h2><?= $evt['titre'] ?></h2>
                    <a href="detailsEvenement.php?id=<?= $evt['id_evenement'] ?>">Voir les détails</a>
                    <p><?= $evt['description'] ?></p>
                    <img src="./images/<?= $evt['imgSrc'] ?>">
                    <p>Date : <?= $evt['date_heure'] ?></p>
                    <p>Nombre de places : <?= $evt['nbPlaces'] ?></p>
            <?php endforeach ?>
        </section>
    </main>
</body>
</html>