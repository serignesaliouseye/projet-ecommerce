<?php
// Configuration de la base de données
$servername = "localhost"; // Le nom du serveur
$username = "root";         // Votre nom d'utilisateur de base de données
$password = "";             // Votre mot de passe de base de données
$dbname = "login"; // Remplacez par le nom de votre base de données

// Créer la connexion
$con = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($con->connect_error) {
    die("Échec de la connexion: " . $con->connect_error);
}
?>