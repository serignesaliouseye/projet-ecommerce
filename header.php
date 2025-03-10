<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header du Projet</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    

    <!-- Barre de navigation -->
    <nav class="bg-white flex items-center px-6 h-20 sticky top-0 shadow-md">
        <div class="p-2">
            <img width="100px" src="./images/logo.png" alt="Logo">
        </div>

        <div class="flex space-x-6 px-10">
            <a href="home.php" class="text-gray-800 font-bold hover:text-gray-500">HOME</a>
            <a href="#" class="text-gray-800 font-bold hover:text-gray-500">Item2</a>
            <a href="#" class="text-gray-800 font-bold hover:text-gray-500">Item3</a>
            <a href="#" class="text-gray-800 font-bold hover:text-gray-500">Item4</a>
            <a href="a_propos.php" class="text-gray-800 font-bold hover:text-gray-500">A PROPPOS</a>
        </div>

        <!-- Barre de recherche à droite -->
        <div class="ml-auto p-4">
            <input type="text" placeholder="Rechercher" class="border px-4 py-2 rounded-md">
        </div>

        <img width="20px" src="./images/aime.png" alt="Favoris">
        <script>
        function toggleModal() {
            document.getElementById("orderModal").classList.toggle("hidden");
        }

        function updateQuantity(button, change) {
            let quantitySpan = button.parentElement.querySelector("span");
            let currentQuantity = parseInt(quantitySpan.textContent);
            let newQuantity = currentQuantity + change;
            if (newQuantity > 0) {
                quantitySpan.textContent = newQuantity;
            }
        }
    </script>
</head>
<body class="bg-gray-100 p-6">
    
    <div class="p-4">
           <img width="20px" src="./images/personne.png" onclick="toggleModal()" alt="Profil">
           
        </div>
    
    <!-- Modal -->
    <div id="orderModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96 relative">
            <button class="absolute top-2 right-2 text-gray-600" onclick="toggleModal()">&times;</button>
            <h2 class="text-xl font-bold mb-4">Formulaire de Commande</h2>
            <div class="mt-4 space-y-4">
                <div class="flex items-center justify-between border-b pb-4">
                    <img src="images/vente.png" alt="Produit" class="w-16 h-16 object-cover">
                    <div>
                        <h3 class="text-lg font-semibold">Coach</h3>
                        <p class="text-gray-600">Leather Coach Bag</p>
                    </div>
                    <div class="flex items-center border rounded-md overflow-hidden">
                        <button class="px-3 py-1 bg-gray-200" onclick="updateQuantity(this, -1)">-</button>
                        <span class="px-4">1</span>
                        <button class="px-3 py-1 bg-gray-200" onclick="updateQuantity(this, 1)">+</button>
                    </div>
                    <p class="text-lg font-semibold">$54.69</p>
                </div>
            </div>
            <div class="mt-4">
                <div class="flex justify-between">
                    <p>Sous-total:</p>
                    <p class="font-semibold">$54.69</p>
                </div>
                <div class="flex justify-between">
                    <p>Taxe:</p>
                    <p class="font-semibold">$2.00</p>
                </div>
                <div class="flex justify-between text-lg font-bold">
                    <p>Total:</p>
                    <p>$56.69</p>
                </div>
            </div>
            <form action="order.php" method="POST" class="mt-4">
                <input type="text" name="coupon" placeholder="Code Promo" class="w-full p-2 border rounded">
            </form>
            <button class="mt-4 bg-blue-600 text-white w-full p-3 rounded">Passer la Commande</button>
        </div>
    </div>
        <!-- Icône du panier -->
        
            <img width="20px" src="./images/sac.png" alt="Panier">
        </a>
    </nav>

    <script src="./config.js"></script>
</body>
</html>
