<?php include_once("header.php"); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Produit - Mug</title>
</head>
<body class="bg-gray-100 p-8">

    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <!-- Conteneur principal pour l'image et les détails -->
        <div class="flex">
            <!-- Image principale -->
            <div class="flex-1 mb-4">
                <img src="<?= isset($_POST['product_image']) ? htmlspecialchars($_POST['product_image']) : 'default-image.png'; ?>" alt="Mug" class="w-full h-auto rounded-lg">
            </div>

            <!-- Détails du produit à droite -->
            <div class="flex-1 pl-6">
                <form action="cart.php" method="POST">
                    <h1 class="text-2xl font-bold mb-4"><?= isset($_POST['product_name']) ? htmlspecialchars($_POST['product_name']) : 'Nom du produit'; ?></h1>

                    <div class="flex items-center mb-2">
                        <span class="text-yellow-500">★★★★★</span>
                        <span class="ml-2">(250 Ratings)</span>
                    </div>

                    <div class="mt-4 flex items-center">
                        <span class="text-3xl font-bold text-gray-800">$<?= isset($_POST['product_price']) ? number_format($_POST['product_price'], 2) : '0.00'; ?></span>
                        <span class="line-through text-gray-500 ml-2">$78.66</span>
                        <span class="text-red-500 ml-2">50% OFF</span>
                    </div>

                    <div class="mt-4">
                        <label class="block text-gray-700">Quantity:</label>
                        <div class="flex items-center border border-gray-300 rounded-md">
                            <button type="button" class="px-2" onclick="changeQuantity(-1)">-</button>
                            <input type="number" id="quantity" name="quantity" value="1" class="w-16 border-none text-center" min="1">
                            <button type="button" class="px-2" onclick="changeQuantity(1)">+</button>
                        </div>
                    </div>

                    <input type="hidden" name="product_name" value="<?= isset($_POST['product_name']) ? htmlspecialchars($_POST['product_name']) : ''; ?>">
                    <input type="hidden" name="product_price" value="<?= isset($_POST['product_price']) ? number_format($_POST['product_price'], 2) : ''; ?>">
                    <input type="hidden" name="product_image" value="<?= isset($_POST['product_image']) ? htmlspecialchars($_POST['product_image']) : ''; ?>">

                    <div class="border border-gray-300 rounded-md p-4 mt-4">
                        <label class="block text-gray-700">Choose Mug Color:</label>
                        <div class="flex space-x-2 mt-1">
                            <div class="w-6 h-6 bg-white border rounded-full cursor-pointer" onclick="selectColor('white')"></div>
                            <div class="w-6 h-6 bg-black border rounded-full cursor-pointer" onclick="selectColor('black')"></div>
                            <div class="w-6 h-6 bg-blue-500 border rounded-full cursor-pointer" onclick="selectColor('blue')"></div>
                            <button id="moreColorsBtn" class="flex items-center text-blue-500 underline" onclick="toggleMoreColors()">
                                <span class="w-6 h-6 bg-blue-500 border rounded-full flex items-center justify-center text-white">+</span>
                            </button>
                        </div>
                        <div id="moreColors" class="hidden mt-2">
                            <div class="flex space-x-2">
                                <div class="w-6 h-6 bg-red-500 border rounded-full cursor-pointer" onclick="selectColor('red')"></div>
                                <div class="w-6 h-6 bg-green-500 border rounded-full cursor-pointer" onclick="selectColor('green')"></div>
                                <div class="w-6 h-6 bg-yellow-500 border rounded-full cursor-pointer" onclick="selectColor('yellow')"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Upload Design -->
                    <div class="border border-gray-300 rounded-md p-4 mt-4">
                        <label class="block text-gray-700">Upload your Design/Picture:</label>
                        <input type="file" class="mt-2 block w-full border border-gray-300 rounded-md p-2">
                    </div>

                    <!-- Choisir la taille -->
                    <div class="border border-gray-300 rounded-md p-4 mt-4">
                        <label class="block text-gray-700">Choose Mug Size:</label>
                        <div class="flex space-x-2 mt-1">
                            <div class="w-8 h-8 border rounded-full flex items-center justify-center cursor-pointer" onclick="selectSize('S')">S</div>
                            <div class="w-8 h-8 border rounded-full flex items-center justify-center cursor-pointer" onclick="selectSize('M')">M</div>
                            <div class="w-8 h-8 border rounded-full flex items-center justify-center cursor-pointer" onclick="selectSize('L')">L</div>
                            <div class="w-8 h-8 border rounded-full flex items-center justify-center cursor-pointer" onclick="selectSize('XL')">XL</div>
                        </div>
                    </div>

                    <!-- Wrap your Mug as Gift -->
                    <div class="border border-gray-300 rounded-md p-4 mt-4 flex items-center justify-between">
                        <span>Wrap your Mug as Gift</span>
                        <span class="text-red-500">100 RS Extra</span>
                        <input type="checkbox" class="ml-2">
                    </div>

                    <div class="flex space-x-2 flex justify-end mt-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add to Cart</button>
                        <button class="bg-gray-300 text-black px-4 py-2 rounded">Add to Wishlist</button>
                    </div>
                </form>
            </div>
        </div>

        

        <div class="mt-6">
            <h2 class="text-lg font-semibold">Ratings and Reviews</h2>
            <p class="text-gray-600">No reviews yet.</p>
        </div>

        <!-- Section pour les petites images -->
        <div class="mt-6">
            <h2 class="text-lg font-semibold">Related Images</h2>
            <div class="flex items-center justify-between mt-2">
                <button id="prevImgBtn" class="bg-gray-200 p-2 rounded-full hover:bg-gray-300" onclick="scrollImages(-1)">&lt;</button>
                <div id="thumbnailContainer" class="flex space-x-2 overflow-x-auto flex-1 mx-2">
                    <img src="images/vente.png" alt="Image 1" class="w-20 h-20 rounded cursor-pointer" onclick="selectImage('Image 1')">
                    <img src="images/vente.png" alt="Image 2" class="w-20 h-20 rounded cursor-pointer" onclick="selectImage('Image 2')">
                    <img src="images/vente.png" alt="Image 3" class="w-20 h-20 rounded cursor-pointer" onclick="selectImage('Image 3')">
                    <img src="images/vente.png" alt="Image 4" class="w-20 h-20 rounded cursor-pointer" onclick="selectImage('Image 4')">
                    <img src="images/vente.png" alt="Image 1" class="w-20 h-20 rounded cursor-pointer" onclick="selectImage('Image 4')">
                    <img src="images/vente.png" alt="Image 2" class="w-20 h-20 rounded cursor-pointer" onclick="selectImage('Image 5')">
                    <img src="images/vente.png" alt="Image 3" class="w-20 h-20 rounded cursor-pointer" onclick="selectImage('Image 6')">
                    <img src="images/vente.png" alt="Image 4" class="w-20 h-20 rounded cursor-pointer" onclick="selectImage('Image 7')">
                </div>
                <button id="nextImgBtn" class="bg-gray-200 p-2 rounded-full hover:bg-gray-300" onclick="scrollImages(1)">&gt;</button>
            </div>
        </div>
        <div class="mt-6">
            <a href="#"><h2 class="text-lg font-semibold hover:#1B4B66">Product Description</h2></a>
            <p class="text-gray-600">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                Reprehenderit laborum error ratione molestias tenetur molestiae.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                Reprehenderit laborum error ratione molestias tenetur molestiae.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                Reprehenderit laborum error ratione molestias tenetur molestiae.

            </p>
        </div>
    </div>

    <script>
        // Changer la quantité
        function changeQuantity(amount) {
            const quantityInput = document.getElementById('quantity');
            let newQuantity = parseInt(quantityInput.value) + amount;
            if (newQuantity < 1) newQuantity = 1; // Empêcher les quantités négatives
            quantityInput.value = newQuantity;
        }

        // Sélectionner une couleur
        function selectColor(color) {
            console.log(`Couleur sélectionnée: ${color}`);
            // Ajoutez la logique pour gérer la sélection de couleur
        }

        // Sélectionner une taille
        function selectSize(size) {
            console.log(`Taille sélectionnée: ${size}`);
            // Ajoutez la logique pour gérer la sélection de taille
        }

        // Ajouter au panier
        function addToCart() {
            console.log("Ajouté au panier");
            // Ajoutez la logique pour ajouter au panier
        }

        // Ajouter à la liste de souhaits
        function addToWishlist() {
            console.log("Ajouté à la liste de souhaits");
            // Ajoutez la logique pour ajouter à la liste de souhaits
        }

        // Sélectionner une image
        function selectImage(image) {
            console.log(`Image sélectionnée: ${image}`);
            // Ajoutez la logique pour gérer la sélection d'image
        }

        // Faire défiler les images
        const thumbnailContainer = document.getElementById('thumbnailContainer');
        let scrollAmount = 0;

        function scrollImages(direction) {
            scrollAmount += direction * 80; // Ajustez en fonction de la largeur des images
            if (scrollAmount < 0) scrollAmount = 0; // Empêche le défilement au-delà du début
            thumbnailContainer.scrollTo({ left: scrollAmount, behavior: 'smooth' });
        }

        // Gestion de l'affichage des couleurs supplémentaires
        function toggleMoreColors() {
            const moreColors = document.getElementById('moreColors');
            moreColors.classList.toggle('hidden');
        }
    </script>
    <?php include_once("footer.php"); ?>
</body>
</html>