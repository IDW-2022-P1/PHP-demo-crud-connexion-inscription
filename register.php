<?php
session_start();

// vérifier les données de $_POST

//// on vérifie que les champs ne sont pas vides
if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['mdp'])){
    if($_POST['nom'] != '' && $_POST['prenom'] != '' && $_POST['email'] != ''&& $_POST['mdp'] != ''){
        // protection des champs de formulaires contre l'injection de javascript
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        //// encoder le mot de passe
        $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
        $role = 'user'; // role par défaut

        // enregistrer les données dans la bdd
        $cnx = new PDO('mysql:host=localhost;dbname=gestion_evenements;charset=utf8;port=3306','toto_evenements','toto');
        //// vérifier qu'il n'y a pas déjà un utilisateur avec cet email
        $stmtEmail = $cnx->prepare('SELECT * FROM utilisateur WHERE email=:email');
        $stmtEmail->bindParam(':email',$email);
        $stmtEmail->execute();
        $userExistant = $stmtEmail->fetch(PDO::FETCH_ASSOC);
        if($userExistant){
            $_SESSION['erreurEmailExistant'] = "Un compte avec cet email existe déjà";
            header('location:inscription.php');
        }

        //// faire la requête SQL
        $stmt = $cnx->prepare("INSERT INTO utilisateur(id_utilisateur, nom, prenom, email, mdp, role) VALUES (NULL, :nom, :prenom, :email, :mdp, :role)");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mdp', $mdp);
        $stmt->bindParam(':role', $role);
        $stmt->execute();

    }
}

