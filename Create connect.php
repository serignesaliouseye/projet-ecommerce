<?php
session_start();
include("dbcon.php");

// Traitement du formulaire d'inscription
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['action']) && $_POST['action'] == "register") {
    $nom = $_POST['pnom'];
    $email = $_POST['pemail'];
    $mot_de_passe = $_POST['pmot_de_passe'];

    if (!empty($nom) && !empty($email) && !empty($mot_de_passe)) {
        // Échappement des caractères spéciaux pour éviter les injections SQL
        $nom = mysqli_real_escape_string($con, $nom);
        $email = mysqli_real_escape_string($con, $email);
        $mot_de_passe = mysqli_real_escape_string($con, $mot_de_passe);

        $query = "INSERT INTO users (pnom, pemail, pmot_de_passe) VALUES ('$nom', '$email', '$mot_de_passe')";
        if (mysqli_query($con, $query)) {
            // Inscription réussie
            echo "<script type='text/javascript'>alert('Inscription réussie !');</script>";
            // Afficher la partie connexion après l'inscription
            $_GET['action'] = 'login'; // Changer l'action pour afficher la connexion
        } else {
            echo "<script type='text/javascript'>alert('Erreur lors de l'inscription. Veuillez réessayer.')</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('Veuillez entrer toutes vos informations')</script>";
    }
}

// Traitement du formulaire de connexion
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['action']) && $_POST['action'] == "login") {
    $email = $_POST['pemail'];
    $mot_de_passe = $_POST['pmot_de_passe'];

    if (!empty($email) && !empty($mot_de_passe)) {
        $email = mysqli_real_escape_string($con, $email);
        $mot_de_passe = mysqli_real_escape_string($con, $mot_de_passe);

        $query = "SELECT * FROM users WHERE pemail='$email' AND pmot_de_passe='$mot_de_passe'";
        $result = mysqli_query($con, $query);
        
        if (mysqli_num_rows($result) > 0) {
            // Connexion réussie
            $_SESSION['user'] = $email; // Stocker l'email dans la session
            header("Location: home.php"); // Rediriger vers home.php
            exit();
        } else {
            echo "<script type='text/javascript'>alert('Email ou mot de passe incorrect.')</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('Veuillez entrer toutes vos informations')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="flex justify-center items-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <div class="flex justify-center">
                <img width="200" src="images/logo.png" alt="">
            </div>

            <?php if (!isset($_GET['action']) || $_GET['action'] == 'login') : ?>
                <h4 class="text-xl font-semibold text-center text-gray-600 mb-6">Connexion</h4>
                <form action="" method="POST">
                    <input type="hidden" name="action" value="login">
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-medium">Email</label>
                        <input type="email" id="email" name="pemail" required
                            class="mt-2 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">
                    </div>
                    <div class="mb-6">
                        <label for="mot_de_passe" class="block text-gray-700 font-medium">Mot de passe</label>
                        <input type="password" id="mot_de_passe" name="pmot_de_passe" required
                            class="mt-2 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">
                    </div>
                    <div class="mb-4">
                        <input type="submit" value="Se connecter"
                            class="w-full bg-yellow-500 text-white py-2 rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    </div>
                </form>
                <p class="text-center text-gray-600">
                    Vous n'avez pas de compte ? <a href="?action=register" class="text-blue-500 hover:underline">S'inscrire</a>
                </p>
            <?php else : ?>
                <h4 class="text-xl font-semibold text-center text-gray-600 mb-8">Inscrivez-vous</h4>
                <form action="" method="post">
                    <input type="hidden" name="action" value="register">
                    <div class="mb-4">
                        <label for="pnom" class="block text-gray-700 font-medium">Nom</label>
                        <input type="text" name="pnom" id="pnom" required
                            class="w-full mt-2 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">
                    </div>
                    <div class="mb-4">
                        <label for="pemail" class="block text-gray-700 font-medium">Email</label>
                        <input type="email" name="pemail" id="pemail" required
                            class="w-full mt-2 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">
                    </div>
                    <div class="mb-6">
                        <label for="pmot_de_passe" class="block text-gray-700 font-medium">Mot de passe</label>
                        <input type="password" name="pmot_de_passe" id="pmot_de_passe" required
                            class="w-full mt-2 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">
                    </div>
                    <div class="mb-4">
                        <input type="submit" value="S'inscrire"
                            class="w-full bg-yellow-500 text-white py-2 rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    </div>
                </form>
                <p class="text-center text-gray-600">
                    Vous avez déjà un compte ? <a href="?action=login" class="text-blue-500 hover:underline">Se connecter</a>
                </p>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>