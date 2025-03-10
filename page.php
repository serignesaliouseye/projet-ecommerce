<?php
    include_once("header.php");
?>
    <div class="mx-4">
        <img src="images/groupe.png" alt="">
    </div>

    <?php
include 'dbconnect.php'; // Connexion à la base de données

// Gestion de l'ajout d'un produit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    
    // Gestion de l'upload de l'image
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    // Insertion du produit en base de données
    $sql = "INSERT INTO products (name, price, category, image) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bind_param("sdss", $name, $price, $category, $target_file);
    $stmt->execute();
}

// Récupération des produits
$categoryFilter = isset($_GET['category']) ? $_GET['category'] : '';
$priceFilter = isset($_GET['price']) ? $_GET['price'] : '';

$sql = "SELECT * FROM products WHERE 1";
if ($categoryFilter) {
    $sql .= " AND category = '" . $pdo->real_escape_string($categoryFilter) . "'";
}
if ($priceFilter) {
    $sql .= " ORDER BY price " . ($priceFilter === 'asc' ? 'ASC' : 'DESC');
}
$result = $pdo->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Produits</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6">
    <h1 class="text-2xl font-bold mb-4">Ajouter un Produit</h1>
    <form action="" method="POST" enctype="multipart/form-data" class="space-y-4 bg-gray-100 p-6 rounded-md">
        <input type="text" name="name" placeholder="Nom du produit" required class="border p-2 w-full">
        <input type="number" name="price" placeholder="Prix" required class="border p-2 w-full">
        <input type="text" name="category" placeholder="Catégorie" required class="border p-2 w-full">
        <input type="file" name="image" required class="border p-2 w-full">
        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Ajouter</button>
    </form>

    <h1 class="text-2xl font-bold mt-8">Liste des Produits</h1>
    <div class="flex space-x-4 my-4">
        <select onchange="window.location.href='?category=' + this.value" class="border p-2">
            <option value="">Toutes les catégories</option>
            <option value="Electronics">Électronique</option>
            <option value="Clothing">Vêtements</option>
        </select>
        <select onchange="window.location.href='?price=' + this.value" class="border p-2">
            <option value="">Trier par prix</option>
            <option value="asc">Prix croissant</option>
            <option value="desc">Prix décroissant</option>
        </select>
    </div>
    
    <div class="grid grid-cols-3 gap-4">
    <?php 
    // Assuming you have already executed the PDO query and assigned the result to $stmt
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
        <div class="border p-4 rounded-md">
            <img src="<?php echo $row['image']; ?>" alt="<?php echo htmlspecialchars($row['name']); ?>" class="w-full h-40 object-cover">
            <h2 class="text-lg font-bold mt-2"><?php echo htmlspecialchars($row['name']); ?></h2>
            <p class="text-gray-600"><?php echo number_format($row['price'], 2); ?> $</p>
        </div>
    <?php endwhile; ?>
</div>

</body>
</html>
