<?php
session_start();
include_once("header.php");

// Vérifier si le panier existe, sinon rediriger
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit;
}

// Récupérer le panier depuis la soumission du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cart'])) {
    $_SESSION['cart'] = unserialize($_POST['cart']);
}

// Calcul des totaux
$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['quantity'];
}

// Remises et frais de livraison
$discount = 13.40;
$shipping_fee = 0.00;
$grand_total = $total - $discount + $shipping_fee;

// Vider le panier après le passage à la caisse
// $_SESSION['cart'] = []; // Ne pas vider si vous voulez garder le panier
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-4">Checkout</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <form id="address-form" action="paiye.php" method="POST">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="full-name" class="block text-sm font-medium text-gray-700">Nom complet</label>
                            <input type="text" id="full-name" name="full_name" class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Entrez votre nom" required>
                        </div>
                        <div>
                            <label for="mobile-number" class="block text-sm font-medium text-gray-700">Numéro de mobile</label>
                            <input type="text" id="mobile-number" name="mobile_number" class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Entrez le numéro" required>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                        <div>
                            <label for="street-address" class="block text-sm font-medium text-gray-700">Adresse</label>
                            <input type="text" id="street-address" name="street_address" class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Entrez votre adresse" required>
                        </div>
                        <div>
                            <label for="state" class="block text-sm font-medium text-gray-700">État</label>
                            <input type="text" id="state" name="state" class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Entrez l'état" required>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700">Ville</label>
                            <input type="text" id="city" name="city" class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Entrez la ville" required>
                        </div>
                        <div>
                            <label for="pin-code" class="block text-sm font-medium text-gray-700">Code postal</label>
                            <input type="text" id="pin-code" name="pin_code" class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Entrez le code postal" required>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold mt-6">Sélectionner la méthode de paiement</h3>
                    <select id="payment-method" name="payment_method" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        <option value="credit-card">Carte de crédit</option>
                        <option value="paypal">PayPal</option>
                        <option value="bank-transfer">Virement bancaire</option>
                    </select>
                    <input type="hidden" name="cart" value="<?= htmlspecialchars(serialize($_SESSION['cart'])) ?>">
                    <input type="hidden" name="discount" value="<?= htmlspecialchars($discount) ?>">
                    <input type="hidden" name="shipping_fee" value="<?= htmlspecialchars($shipping_fee) ?>">
                    <input type="hidden" name="grand_total" value="<?= htmlspecialchars($grand_total) ?>">
                    <div class="flex justify-between items-center mt-4">
                        <a href="cart.php" class="text-blue-500">Retour au panier</a>
                        <button type="submit" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600">Confirmer la commande</button>
                    </div>
                </form>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-bold">Résumé de la commande</h2>
                <div class="flex flex-col mb-4">
                    <?php foreach ($_SESSION['cart'] as $item): ?>
                        <div class="flex items-center mb-2 border-b pb-2">
                            <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="w-16 h-16 mr-4">
                            <div class="flex flex-col">
                                <p class="font-semibold"><?= htmlspecialchars($item['name']) ?></p>
                                <p class="text-sm text-gray-500">Qty: <?= $item['quantity'] ?></p>
                                <p class="text-sm text-gray-700">Prix: $<?= number_format($item['price'], 2) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div>
                    <p class="font-semibold">Sous-total: <span class="float-right">$<?= number_format($total, 2) ?></span></p>
                    <p class="font-semibold">Remise: <span class="float-right">- $<?= number_format($discount, 2) ?></span></p>
                    <p class="font-semibold">Frais de livraison: <span class="float-right">$<?= number_format($shipping_fee, 2) ?></span></p>
                    <p class="font-bold">Total: <span class="float-right">$<?= number_format($grand_total, 2) ?></span></p>
                </div>
            </div>
        </div>
    </div>

   <?php include_once("footer.php");?>
</body>
</html>