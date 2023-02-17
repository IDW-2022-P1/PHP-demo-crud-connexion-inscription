<?php
// permet d'utiliser les session ($_SESSION)
session_start();

var_dump($_POST);

// vérifier s'il existe un utilisateur dans la bdd avec cet email

$cnx = new PDO('mysql:host=localhost;dbname=gestion_evenements;charset=utf8;port=3306','toto_evenements','toto');
$stmt = $cnx->prepare("SELECT * FROM utilisateur WHERE email=:email");
$email = htmlspecialchars($_POST["email"]);
$stmt->bindParam(':email', $email);
$stmt->execute();
$utilisateur = $stmt->fetch(PDO::FETCH_ASSOC); // fetch renvoie false si l'email n'est pas dans la bdd
// vérifier le mot de passe
if($utilisateur) // équivaut à if($utilisateur) != false
{
    var_dump($utilisateur);
    $mdp = $_POST["mdp"];
    if(password_verify($mdp, $utilisateur["mdp"])){
        echo 'ok';
        // mettre l'utilisateur en session
        $_SESSION['id_utilisateur'] = $utilisateur["id_utilisateur"];
        $_SESSION['nom_utilisateur'] = $utilisateur["nom"];
        $_SESSION['prenom_utilisateur'] = $utilisateur["prenom"];
        $_SESSION['role_utilisateur'] = $utilisateur["role"];
        var_dump($_SESSION);
        header('location:index.php');
    }else{
        header('location:connexion.php');
    }
}else{
    header('location:connexion.php');
}
