<?php
session_start(); // Démarrer la session en premier

include_once("header.php");

// Initialiser le panier s'il n'existe pas
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Ajouter un produit au panier
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_name'])) {
    $product = [
        'name' => $_POST['product_name'],
        'price' => floatval($_POST['product_price']),
        'image' => $_POST['product_image'],
        'quantity' => 1
    ];

    // Vérifier si le produit existe déjà dans le panier
    $exists = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['name'] === $product['name']) {
            $item['quantity'] += 1;
            $exists = true;
            break;
        }
    }

    if (!$exists) {
        $_SESSION['cart'][] = $product;
    }
}

// Supprimer un produit du panier
if (isset($_GET['remove'])) {
    $index = $_GET['remove'];
    unset($_SESSION['cart'][$index]);
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}

// Calcul des totaux
$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += floatval($item['price']) * $item['quantity'];
}

$discount = 13.40;
$shipping_fee = 0.00;
$grand_total = $total - $discount + $shipping_fee;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-5">
        <h1 class="text-2xl font-bold mb-4">Panier</h1>
        <table class="w-full bg-white shadow-md rounded-lg overflow-hidden mb-5">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-3">Produit</th>
                    <th class="p-3">Prix</th>
                    <th class="p-3">Qté</th>
                    <th class="p-3">Subtotal</th>
                    <th class="p-3">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['cart'] as $index => $item): ?>
                    <?php 
                    $subtotal = floatval($item['price']) * $item['quantity'];
                    ?>
                    <tr class="border-b">
                        <td class="p-3 flex items-center">
                            <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="w-16 h-16 object-cover mr-3">
                            <?= htmlspecialchars($item['name']) ?>
                        </td>
                        <td class="p-3">$<?= number_format(floatval($item['price']), 2) ?></td>
                        <td class="p-3"><?= $item['quantity'] ?></td>
                        <td class="p-3">$<?= number_format($subtotal, 2) ?></td>
                        <td class="p-3">
                            <a href="cart.php?remove=<?= $index ?>" class="text-red-500">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr class="bg-gray-300">
                    <td colspan="3" class="p-3 font-bold">Total</td>
                    <td class="p-3 font-bold">$<?= number_format(floatval($total), 2) ?></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>

        <div class="mt-5 bg-white p-4 rounded-lg shadow-md text-right">
            <h2 class="text-xl font-bold">Résumé de la Commande</h2>
            <div class="mt-2">
                <p>Sous-total: <span class="font-bold">$<?= number_format(floatval($total), 2) ?></span></p>
                <p>Remise: <span class="font-bold">- $<?= number_format($discount, 2) ?></span></p>
                <p>Frais de livraison: <span class="font-bold">$<?= number_format($shipping_fee, 2) ?></span></p>
                <p class="mt-4 font-bold">Grand Total: <span class="text-xl">$<?= number_format(floatval($grand_total), 2) ?></span></p>
            </div>
        </div>

        <div class="flex justify-end mt-4">
            <a href="img.php" class="bg-blue-500 text-white py-1 px-3 rounded-lg mr-2 text-sm">Retour aux produits</a>
            <form action="checkout.php" method="POST">
                <input type="hidden" name="cart" value="<?= htmlspecialchars(serialize($_SESSION['cart'])) ?>">
                <button type="submit" class="bg-white border border-blue-500 text-blue-500 py-1 px-3 rounded-lg text-sm">Placer la commande</button>
            </form>
        </div>
    </div>

    <?php include_once("footer.php"); ?>
</body>
</html>