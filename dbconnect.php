<?php
// Informations de connexion à la base de données
$host = 'localhost';
$db_name = 'shopping_cart';
$username = "root"; 
$password = ""; 

try {
    // Création d'une connexion avec PDO
    $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
    // Définir le mode d'erreur de PDO sur Exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Mode par défaut des fetchs
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    // Journaliser l'erreur au lieu de l'afficher
    error_log("Erreur de connexion : " . $e->getMessage());
    exit; 
}
?>