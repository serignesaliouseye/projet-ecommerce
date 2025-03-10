
<?php
session_start();
include_once("header.php"); 

// Exemple de données de produits ajoutés au panier
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [
        [
            'name' => 'Produit 1',
            'price' => 50.00,
            'quantity' => 2,
            'status' => 'Payé',
            'image' => 'images/image1.png',
            'description' => 'Description du produit 1.' // Assurez-vous de définir cette clé
        ],
        [
            'name' => 'Produit 2',
            'price' => 30.00,
            'quantity' => 1,
            'status' => 'Payé',
            'image' => 'images/image2.png',
            'description' => 'Description du produit 2.' // Assurez-vous de définir cette clé
        ],
    ];
}

$cart = $_SESSION['cart'];
$total = 0;
foreach ($cart as $item) {
    $total += $item['price'] * $item['quantity'];
}
$total += 5; // Frais de livraison

// Récupération des informations utilisateur
$user = isset($_SESSION['user']) ? $_SESSION['user'] : [];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Détails de la Commande</title>
    <script>
        function toggleDetails(index) {
            const details = document.getElementById('details-' + index);
            if (details.style.display === 'none') {
                details.style.display = 'block';
            } else {
                details.style.display = 'none';
            }
        }
    </script>
</head>
<body class="bg-gray-100">
    <div class="flex">
        <div class="w-1/4 bg-white shadow-md rounded-lg p-4 mr-6">
            <h2 class="text-xl font-semibold mb-4">Mon Profil</h2>
            <ul>
                <li class="mb-2"><a href="#" class="text-blue-500">Informations Personnelles</a></li>
                <li class="mb-2"><a href="#" class="text-blue-500">Référer et Gagner</a></li>
                <li class="mb-2"><a href="#" class="text-blue-500">Mes Commandes</a></li>
                <li class="mb-2"><a href="#" class="text-blue-500">Ma Liste de Souhaits</a></li>
                <li class="mb-2"><a href="#" class="text-blue-500">Mes Cartes</a></li>
            </ul>
        </div>

        <div class="flex-1 p-6">
            <h1 class="text-2xl font-bold mb-4">Commande</h1>
            <div class="bg-white shadow-md rounded-lg p-4 mb-4">
                <h2 class="text-xl font-semibold mb-2">Articles Commandés</h2>
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="py-2 px-4 text-left">Produit</th>
                            <th class="py-2 px-4 text-left">Qty</th>
                            <th class="py-2 px-4 text-left">Prix</th>
                            <th class="py-2 px-4 text-left">Subtotal</th>
                            <th class="py-2 px-4 text-left">Statut</th>
                            <th class="py-2 px-4 text-left">Détails</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cart as $index => $item): ?>
                            <tr class="hover:bg-gray-100">
                                <td class="border-b py-2 px-4 flex items-center">
                                    <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="mr-2 w-20 h-20">
                                    <?= htmlspecialchars($item['name']) ?>
                                </td>
                                <td class="border-b py-2 px-4"><?= htmlspecialchars($item['quantity']) ?></td>
                                <td class="border-b py-2 px-4">$<?= number_format($item['price'], 2) ?></td>
                                <td class="border-b py-2 px-4">$<?= number_format($item['price'] * $item['quantity'], 2) ?></td>
                                <td class="border-b py-2 px-4"><?= isset($item['status']) ? htmlspecialchars($item['status']) : 'Payé' ?></td>
                                <td class="border-b py-2 px-4">
                                    <button onclick="toggleDetails(<?= $index ?>)" class="text-blue-500">Voir Détails</button>
                                </td>
                            </tr>
                            <tr id="details-<?= $index ?>" style="display: none;">
                                <td colspan="6" class="border-b py-2 px-4">
                                    <div>
                                        <strong>Description:</strong> <?= htmlspecialchars($item['description'] ?? 'Aucune description disponible.') ?>
                                    </div>
                                    <div>
                                        <strong>Image:</strong> <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="w-20 h-20">
                                    </div>
                                    <div>
                                        <strong>Informations de la Commande:</strong>
                                        <p><strong>Subtotal:</strong> $<?= number_format($total - 5, 2) ?></p>
                                        <p><strong>Discount:</strong> $0.00</p>
                                        <p><strong>Frais de livraison:</strong> $5.00</p>
                                        <p class="font-bold"><strong>Total:</strong> $<?= number_format($total, 2) ?></p>
                                    </div>
                                    <div>
                                        <strong>Détails de Paiement:</strong>
                                        <p><strong>Nom:</strong> <?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?></p>
                                        <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
                                        <p><strong>Numéro de mobile:</strong> <?= htmlspecialchars($user['mobile']) ?></p>
                                        <p><strong>Date de naissance:</strong> <?= htmlspecialchars($user['dob']) ?></p>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="flex justify-end space-x-2">
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Réorganiser</button>
                <button class="bg-gray-500 text-white px-4 py-2 rounded">Annuler</button>
            </div>
        </div>
    </div>
    <h1></h1>
    <h1></h1><br>

     <?php include_once("footer.php"); ?>
</body>
</html>