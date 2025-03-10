
<?php
session_start();


$cart = isset($_POST['cart']) ? unserialize($_POST['cart']) : [];
$discount = isset($_POST['discount']) ? $_POST['discount'] : 0;
$shipping_fee = isset($_POST['shipping_fee']) ? $_POST['shipping_fee'] : 0;
$grand_total = isset($_POST['grand_total']) ? $_POST['grand_total'] : 0;

// Exemple de données utilisateur
$user = [
    'first_name' => 'John',
    'last_name' => 'Doe',
    'email' => 'johndoe@example.com',
    'mobile' => '+11 202-555-0114',
    'dob' => '01/01/1990',
    'profile_picture' => 'images/profile-placeholder.png'
];

// Vérification si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['first_name'])) {
    // Récupération des données du formulaire
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $mobile = htmlspecialchars($_POST['mobile']);
    $dob = htmlspecialchars($_POST['dob']);

    // Enregistrement des données utilisateur dans la session
    $_SESSION['user'] = [
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email,
        'mobile' => $mobile,
        'dob' => $dob,
    ];

    // Redirection vers details.php
    header('Location: details.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>Mon Profil</title>
</head>
<body class="bg-gray-100">
    <div class="flex justify-between p-4 bg-white shadow-md">
        <h1 class="text-xl font-semibold">Mon Profil</h1>
        <button class="bg-red-500 text-white flex items-center px-4 py-2 rounded">
            <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
        </button>
    </div>

    <div class="flex">
        <div class="w-1/4 bg-white shadow-md rounded-lg p-4 mr-6">
            <h2 class="text-xl font-semibold mb-4">Navigation</h2>
            <ul>
                <li class="mb-2"><a href="#" class="text-blue-500">Informations Personnelles</a></li>
                <li class="mb-2"><a href="#" class="text-blue-500">Référer et Gagner</a></li>
                <li class="mb-2"><a href="#" class="text-blue-500">Mes Commandes</a></li>
                <li class="mb-2"><a href="#" class="text-blue-500">Ma Liste de Souhaits</a></li>
                <li class="mb-2"><a href="#" class="text-blue-500">Mes Cartes</a></li>
            </ul>
        </div>

        <div class="flex-1 p-6">
            <h1 class="text-2xl font-bold mb-4">Informations Personnelles</h1>
            <div class="bg-white shadow-md rounded-lg p-4 mb-4">
                <h2 class="text-xl font-semibold mb-2">Photo de Profil</h2>
                <div class="flex items-center mb-4">
                    <img src="<?= htmlspecialchars($user['profile_picture']) ?>" alt="Photo de profil" class="w-20 h-20 rounded-full mr-4">
                    <div>
                        <input type="file" id="profile_picture" class="border border-gray-300 rounded-md p-2" accept="image/*">
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-md rounded-lg p-4 mb-4">
                <h2 class="text-xl font-semibold mb-2">Informations Personnelles</h2>
                <form method="POST">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="first-name" class="block text-sm font-medium text-gray-700">Prénom</label>
                            <input type="text" name="first_name" id="first-name" value="<?= htmlspecialchars($user['first_name']) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                        </div>
                        <div>
                            <label for="last-name" class="block text-sm font-medium text-gray-700">Nom de famille</label>
                            <input type="text" name="last_name" id="last-name" value="<?= htmlspecialchars($user['last_name']) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" value="<?= htmlspecialchars($user['email']) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                    </div>
                    <div class="mt-4">
                        <label for="mobile" class="block text-sm font-medium text-gray-700">Numéro de mobile</label>
                        <input type="text" name="mobile" id="mobile" value="<?= htmlspecialchars($user['mobile']) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                    </div>
                    <div class="mt-4">
                        <label for="dob" class="block text-sm font-medium text-gray-700">Date de naissance</label>
                        <input type="text" name="dob" id="dob" value="<?= htmlspecialchars($user['dob']) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="JJ/MM/AAAA" required>
                    </div>
                    <div class="flex justify-end space-x-2 mt-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Enregistrer</button>
                        <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>