<?php
session_start();
include_once("header.php");


$cart = isset($_POST['cart']) ? unserialize($_POST['cart']) : [];
$discount = isset($_POST['discount']) ? $_POST['discount'] : 0;
$shipping_fee = isset($_POST['shipping_fee']) ? $_POST['shipping_fee'] : 0;
$grand_total = isset($_POST['grand_total']) ? $_POST['grand_total'] : 0;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-lg flex flex-col md:flex-row gap-6">

        <div class="w-full md:w-2/3">
            <h2 class="text-2xl font-bold mb-4">Paiement</h2>
            <form action="personnel.php" method="POST">
                <div class="mb-6">
                    <h3 class="font-semibold mb-2">Informations de contact</h3>
                    <input type="text" name="contact_info" class="w-full p-2 border rounded-lg" placeholder="Entrez votre email ou numéro de téléphone" required>
                </div>

                <h3 class="text-lg font-semibold mb-3">Méthodes de paiement</h3>
                <div class="flex space-x-4">
                    <div class="border rounded-lg relative p-4 flex items-center justify-center">
                        <input type="radio" name="payment_method" id="easypaisa" value="Easypaisa" class="mr-2" required>
                        <label for="easypaisa" class="cursor-pointer flex flex-col items-center">
                            <img src="images/d&g (12).jpg" alt="Easypaisa Logo" class="w-20 h-20 mb-2">       
                        </label>
                    </div>
                    <div class="border rounded-lg relative p-4 flex items-center justify-center">
                        <input type="radio" name="payment_method" id="creditcard" value="Credit Card" class="mr-2" required>
                        <label for="creditcard" class="cursor-pointer flex flex-col items-center">
                            <img src="images/d&g (17).jpg" alt="Credit Card Logo" class="w-16 h-16 mb-2">
                        </label>
                    </div>
                    <div class="border rounded-lg relative p-4 flex items-center justify-center">
                        <input type="radio" name="payment_method" id="applepay" value="Apple Pay" class="mr-2" required>
                        <label for="applepay" class="cursor-pointer flex flex-col items-center">
                            <img src="images/d&g (8).jpg" alt="Apple Pay Logo" class="w-16 h-16 mb-2"> 
                        </label>
                    </div>
                    <div class="border rounded-lg relative p-4 flex items-center justify-center">
                        <input type="radio" name="payment_method" id="amazonpay" value="Amazon Pay" class="mr-2" required>
                        <label for="amazonpay" class="cursor-pointer flex flex-col items-center">
                            <img src="images/d&g (14).jpg" alt="Amazon Pay Logo" class="w-16 h-16 mb-2">
                        </label>
                    </div>
                </div>

                <div class="mb-6">
                    <h3 class="font-semibold mb-2">Détails du paiement</h3>
                    <div class="border p-4 rounded-lg">
                        <div class="flex items-center mb-2">
                            <img src="images/d&g (27).jpg" alt="Easypaisa" class="h-8 mr-2">
                            <span class="font-medium">Easypaisa</span>
                        </div>
                        <input type="text" name="transaction_id" id="transaction_id" class="w-full p-2 border rounded-lg" placeholder="Entrez l'ID de la transaction" required>
                        <p class="text-sm text-gray-500 mt-1">Envoyez le montant à 032xxxxxxxx et entrez l'ID de la transaction</p>
                        <label class="flex items-center mt-2">
                            <input type="checkbox" name="save_transaction" class="mr-2"> Sauvegarder pour les futures transactions
                        </label>
                    </div>
                </div>

                <!-- Champs cachés pour transmettre des données du panier -->
                <input type="hidden" name="cart" value="<?= htmlspecialchars(serialize($cart)) ?>">
                <input type="hidden" name="discount" value="<?= htmlspecialchars($discount) ?>">
                <input type="hidden" name="shipping_fee" value="<?= htmlspecialchars($shipping_fee) ?>">
                <input type="hidden" name="grand_total" value="<?= htmlspecialchars($grand_total) ?>">

                <button type="submit" class="mt-4 w-full bg-blue-500 text-white py-2 rounded-lg">Suivant</button>
            </form>
        </div>
        
        <div class="w-full md:w-1/3 bg-gray-100 p-4 rounded-lg">
            <h3 class="font-semibold mb-2">Résumé de la commande</h3>
            <div class="flex flex-col gap-4 mb-4">
                <?php foreach ($cart as $item): ?>
                    <div class="flex items-center border-b pb-2">
                        <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="h-12 mr-4">
                        <div>
                            <p class="font-medium"><?= htmlspecialchars($item['name']) ?></p>
                            <p class="text-sm text-gray-600">Catégorie</p>
                            <p class="text-sm">Qty: <?= htmlspecialchars($item['quantity']) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <h3 class="font-semibold mb-2">Détails de la commande</h3>
            <div class="flex justify-between">
                <span>Sous-total:</span> <span>$<?= number_format($grand_total + $discount - $shipping_fee, 2) ?></span>
            </div>
            <div class="flex justify-between">
                <span>Remise:</span> <span>-$<?= number_format($discount, 2) ?></span>
            </div>
            <div class="flex justify-between">
                <span>Frais de livraison:</span> <span>$<?= number_format($shipping_fee, 2) ?></span>
            </div>
            <div class="flex justify-between font-bold mt-2">
                <span>Total:</span> <span>$<?= number_format($grand_total, 2) ?></span>
            </div>
        </div>
    </div> 
    <h1></h1>
    <h1></h1><br>

     <?php include_once("footer.php"); ?>

</body>

</html>