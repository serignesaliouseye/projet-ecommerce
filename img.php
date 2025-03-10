<?php include_once("header.php"); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits avec filtres</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="p-4 mx-2 ">
        <img src="images/upto.png" alt="" class="w-full h-auto">
    </div>
</body>
    </div>
    <div class="container mx-auto p-5 flex">
        <!-- Barre latérale pour les filtres -->
        <div class="w-1/4 mr-6">
            <!-- Size -->
            <div class="bg-white p-4 shadow-md rounded-lg mb-4">
                <div class="flex justify-between items-center">
                    <a href="#" class="flex-1">
                        <h2 class="text-xl font-semibold">Size</h2>
                    </a>
                    <a href="#" class="text-blue-500 text-2xl font-bold">+</a>
                </div>
            </div>
            <!-- Color -->
            <div class="bg-white p-4 shadow-md rounded-lg mb-4">
                <div class="flex justify-between items-center">
                    <a href="#" class="flex-1">
                        <h2 class="text-xl font-semibold">Color</h2>
                    </a>
                    <a href="#" class="text-blue-500 text-2xl font-bold">-</a>
                </div>
                <div class="mt-4 space-y-2">
                    <a href="#" class="flex items-center space-x-2">
                        <span class="w-4 h-4 inline-block bg-blue-500 rounded"></span>
                        <span>Blue</span>
                    </a>
                    <a href="#" class="flex items-center space-x-2">
                        <span class="w-4 h-4 inline-block bg-red-800 rounded"></span>
                        <span>Maroon Red</span>
                    </a>
                    <a href="#" class="flex items-center space-x-2">
                        <span class="w-4 h-4 inline-block bg-red-600 rounded"></span>
                        <span>Crimson Red</span>
                    </a>
                    <a href="#" class="flex items-center space-x-2">
                        <span class="w-4 h-4 inline-block bg-pink-300 rounded"></span>
                        <span>Seinna Pink</span>
                    </a>
                    <a href="#" class="flex items-center space-x-2">
                        <span class="w-4 h-4 inline-block bg-teal-500 rounded"></span>
                        <span>Teal</span>
                    </a>
                    <a href="#" class="flex items-center space-x-2">
                        <span class="w-4 h-4 inline-block bg-teal-300 rounded"></span>
                        <span>Aquarmarine</span>
                    </a>
                    <a href="#" class="flex items-center space-x-2">
                        <span class="w-4 h-4 inline-block bg-gray-200 rounded"></span>
                        <span>Off-White</span>
                    </a>
                    <a href="#" class="flex items-center space-x-2">
                        <span class="w-4 h-4 inline-block bg-orange-300 rounded"></span>
                        <span>Muave Orange</span>
                    </a>
                </div>
            </div>
            <!-- Brand -->
            <div class="bg-white p-4 shadow-md rounded-lg mb-4">
                <div class="flex justify-between items-center">
                    <a href="#" class="flex-1">
                        <h2 class="text-xl font-semibold">Brand</h2>
                    </a>
                    <a href="#" class="text-blue-500 text-2xl font-bold">+</a>
                </div>
            </div>
            <!-- Price Range -->
            <div class="bg-white p-4 shadow-md rounded-lg mb-4">
                <div class="flex justify-between items-center">
                    <a href="#" class="flex-1">
                        <h2 class="text-xl font-semibold">Price Range</h2>
                    </a>
                    <a href="#" class="text-blue-500 text-2xl font-bold">+</a>
                </div>
            </div>
            <!-- Discount -->
            <div class="bg-white p-4 shadow-md rounded-lg mb-4">
                <div class="flex justify-between items-center">
                    <a href="#" class="flex-1">
                        <h2 class="text-xl font-semibold">Discount</h2>
                    </a>
                    <a href="#" class="text-blue-500 text-2xl font-bold">+</a>
                </div>
            </div>
            <!-- Availability -->
            <div class="bg-white p-4 shadow-md rounded-lg">
                <div class="flex justify-between items-center">
                    <a href="#" class="flex-1">
                        <h2 class="text-xl font-semibold">Availability</h2>
                    </a>
                    <a href="#" class="text-blue-500 text-2xl font-bold">+</a>
                </div>
            </div>
        </div>
        <!-- Grille des produits et header -->
        <div class="w-3/4">
            <!-- Header au dessus de la grille des produits -->
            <div class="bg-white p-4 shadow-md rounded-lg mb-4 flex flex-col md:flex-row md:items-center md:justify-between">
                <div class="mb-2 md:mb-0">
                    <span>Showing 1 - 40 of 145 items</span>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="#" class="text-blue-500">To Show: 0</a>
                </div>
            </div>
            <h1 class="text-2xl font-bold mb-4">Catégorie 1</h1>
            <div class="grid grid-cols-3 gap-6">
                <?php 
                $products = [
                    ['name' => 'Produit A', 'price' => 39.49, 'image' => 'images/vente.png'],
                    ['name' => 'Produit B', 'price' => 29.99, 'image' => 'images/vente.png'],
                    ['name' => 'Produit C', 'price' => 49.99, 'image' => 'images/vente.png'],
                    ['name' => 'Produit D', 'price' => 19.99, 'image' => 'images/vente.png'],
                    ['name' => 'Produit E', 'price' => 59.99, 'image' => 'images/vente.png'],
                    ['name' => 'Produit F', 'price' => 15.49, 'image' => 'images/vente.png'],
                    ['name' => 'Produit G', 'price' => 34.99, 'image' => 'images/vente.png'],
                    ['name' => 'Produit H', 'price' => 44.99, 'image' => 'images/vente.png'],
                    ['name' => 'Produit I', 'price' => 27.49, 'image' => 'images/vente.png'],
                ];

                foreach ($products as $product): ?>
                    <div class="bg-white p-4 shadow-md rounded-lg">
                        <!-- Formulaire pour ajouter le produit au panier -->
                        <form action="couleur.php" method="POST">
                            <a href="couleur.php" class="block">
                                <img src="<?= htmlspecialchars($product['image']) ?>" alt="Produit" class="w-full h-40 object-cover mb-3 rounded">
                                <h2 class="text-lg font-semibold"><?= htmlspecialchars($product['name']) ?></h2>
                                <div class="text-red-500 font-bold text-lg">
                                    $<?= number_format($product['price'], 2) ?>
                                </div>
                            </a>
                            <!-- Champs cachés pour le produit -->
                            <input type="hidden" name="product_name" value="<?= htmlspecialchars($product['name']) ?>">
                            <input type="hidden" name="product_price" value="<?= htmlspecialchars($product['price']) ?>">
                            <input type="hidden" name="product_image" value="<?= htmlspecialchars($product['image']) ?>"> <!-- Champ caché pour l'image -->
                            <!-- Bouton "Ajouter au panier" -->
                            <button type="submit" class="w-full mt-3 bg-blue-500 text-white py-2 rounded-lg">Ajouter au panier</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php include_once("footer.php"); ?>
</body>
</html>