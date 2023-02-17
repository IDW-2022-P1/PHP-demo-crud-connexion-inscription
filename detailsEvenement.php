<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- TODO : intégre la nav -->
    <?php
        // on récupére le paramètre d'url id
        $id = $_GET["id"];
        var_dump($id);
        // connexion à la bdd
        $cnx = new PDO('mysql:host=localhost;dbname=gestion_evenements;charset=utf8;port=3306','toto_evenements','toto');
        // requête préparée avec un paramètre => id=?
        // !!!ne pas mettre $id dans la requête SQL!!!
        $stmt = $cnx->prepare("SELECT * FROM evenements_utilisateurs_lieux WHERE id_evenement=:id"); // !!!ne pas mettre $id dans la requête SQL!!!
        $stmt->bindParam(":id", $id);
        $stmt->execute(); // execute prend en paramètre un tableau de valeurs correspondant aux paramètres de la requête SQL
        $evenement = $stmt->fetch(PDO::FETCH_ASSOC); // on utilise fetch (et pas fetchAll) car on s'attend à ne récupérer qu'un seul enregistrement
        if( empty($evenement)) :
        ?>
            <p>Pas d'événement correspondant à cet id</p>
        <?php else : ?>
            <h2><?= $evenement["titre"] ?></h2>
            <p>Organisé par <?= $evenement["organisateur"] ?></p>
            <p><?= $evenement["description"] ?></p>
            <p><?= $evenement["nbPlaces"] ?> places</p>
            <img src="./images/<?= $evenement["imgSrc"] ?>" alt="">
        <?php endif ?>
</body>
</html>