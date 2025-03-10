<?php
include 'dbconnect.php'; // Connexion à la base de données
include_once("header.php");

// Exemple de données du panier (remplace cela par une récupération depuis la base de données)
$cartItems = [
    [
        'name' => 'Coach Leather Coach Bag',
        'price' => 54.69,
        'quantity' => 1,
        'image' => 'sac1.jpg'
    ],
    [
        'name' => 'Nike Air Max 90',
        'price' => 120.00,
        'quantity' => 1,
        'image' => 'shoes1.jpg'
    ],
];

$subtotal = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cartItems));
$discount = 13.40; // Exemple de remise
$shipping = 5.00; // Frais de livraison
$total = $subtotal - $discount + $shipping;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Panier</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-gray-700 mb-6">🛒 Mon Panier</h1>

        <!-- Tableau du panier -->
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-3 text-left">Produit</th>
                    <th class="p-3">Prix</th>
                    <th class="p-3">Qté</th>
                    <th class="p-3">Total</th>
                    <th class="p-3">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($cartItems)): ?>
                    <?php foreach ($cartItems as $index => $item): ?>
                        <tr class="border-b">
                            <td class="p-3 flex items-center">
                                <img src="./images/<?php echo htmlspecialchars($item['image']); ?>" class="w-12 h-12 mr-4 rounded" alt="Produit">
                                <span><?php echo htmlspecialchars($item['name']); ?></span>
                            </td>
                            <td class="p-3 text-center"><?php echo number_format($item['price'], 2); ?> $</td>
                            <td class="p-3 text-center">
                                <button onclick="updateQuantity(<?php echo $index; ?>, -1)" class="px-2 py-1 bg-gray-300 text-gray-700 rounded">-</button>
                                <span id="qty-<?php echo $index; ?>" class="mx-2"><?php echo $item['quantity']; ?></span>
                                <button onclick="updateQuantity(<?php echo $index; ?>, 1)" class="px-2 py-1 bg-gray-300 text-gray-700 rounded">+</button>
                            </td>
                            <td class="p-3 text-center"><?php echo number_format($item['price'] * $item['quantity'], 2); ?> $</td>
                            <td class="p-3 text-center">
                                <button class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">Retirer</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="p-6 text-center text-gray-500">Votre panier est vide.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Résumé de la commande -->
        <div class="mt-6 border-t pt-4">
            <h2 class="text-xl font-semibold text-gray-700">Résumé de la Commande</h2>
            <div class="flex justify-between text-gray-600">
                <span>Sous-total:</span>
                <span><?php echo number_format($subtotal, 2); ?> $</span>
            </div>
            <div class="flex justify-between text-gray-600">
                <span>Remise:</span>
                <span>-<?php echo number_format($discount, 2); ?> $</span>
            </div>
            <div class="flex justify-between text-gray-600">
                <span>Livraison:</span>
                <span><?php echo number_format($shipping, 2); ?> $</span>
            </div>
            <div class="flex justify-between text-xl font-bold mt-2">
                <span>Total:</span>
                <span><?php echo number_format($total, 2); ?> $</span>
            </div>
        </div>

        <!-- Boutons d'action -->
        <div class="flex justify-between mt-6">
            <a href="#" class="px-4 py-2 border-2 border-blue-500 text-blue-500 rounded hover:bg-blue-500 hover:text-white transition">Continuer vos achats</a>
            <a href="checkout.php" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Commander</a>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        function updateQuantity(index, change) {
            let quantitySpan = document.getElementById('qty-' + index);
            let currentQuantity = parseInt(quantitySpan.textContent);
            let newQuantity = currentQuantity + change;
            if (newQuantity > 0) {
                quantitySpan.textContent = newQuantity;
                // Ici, on pourrait envoyer une requête AJAX pour mettre à jour le panier en base de données
            }
        }
    </script>
</body>
</html>
