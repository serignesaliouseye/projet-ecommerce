<?php
session_start();
include_once("header.php");
?>

<nav class="bg-gray-300 flex h-10 px-6 items-center shadow-lg">
    <p class="text-center ml-[20%] text-fond">We are currently experiencing local customs clearance delays. For the latest updates, please check your order status here</p>
</nav>

<div class="h-screen bg-[url('images/photo.jpg')] bg-cover bg-center">
    <h1 class="text-white text-6xl font-bold text-center pt-[15%]">BLACK FRIDAY</h1>
    <p class="text-white text-center text-2xl p-4">
        We know how large objects will act, but things on a <br>
        small scale just do not act that <br> <br>
        <a href="img.php">
            <button class="px-6 py-2 border-2 border-blue-900 text-blue-900 font-semibold rounded-lg bg-white shadow-md hover:bg-blue-100">
                See All Products
            </button>
        </a>
    </p>
</div>

<div>
    <h1 class="p-8 font-bold text-3xl">New Arrivals</h1>
    <div class="p-2 m-2 bg-blanc h-80 flex">
        <div class="p-4 text-white m-2">
            <a href=""><img src="images/you.jpg" alt=""></a>
            <p class="flex"><img width="20" src="images/aime.png" alt=""></p>
            <h1 class="text-fond text-2xl font-bold">Grande</h1>
            <h2 class="text-black-400 text-black text-1xl">Blassone Punch</h2>
            <h3 class="text-black font-bold">$39.49</h3>
        </div>

        <div class="p-4 text-white m-2">
            <a href=""><img src="images/casse.jpg" alt=""></a>
            <p class="flex"><img width="20" src="images/aime.png" alt=""></p>
            <h1 class="text-fond text-2xl font-bold">Coach</h1>
            <h2 class="text-black-400 text-black text-1xl">Leather Coach Bag</h2>
            <h3 class="text-black font-bold">$54.69</h3>
        </div>

        <div class="p-4 text-white m-2">
            <a href=""><img src="images/double.jpg" alt=""></a>
            <p class="flex"><img width="20" src="images/aime.png" alt=""></p>
            <h1 class="text-fond text-2xl font-bold">Remus</h1>
            <h2 class="text-black-400 text-black text-1xl">Brown Strap Bag</h2>
            <h3 class="text-black font-bold">$57.00</h3>
        </div>

        <div class="p-4 text-white m-2">
            <a href=""><img src="images/cope.jpg" alt=""></a>
            <p class="flex"><img width="20" src="images/aime.png" alt=""></p>
            <h1 class="text-fond text-2xl font-bold">Boujee</h1>
            <h2 class="text-black-400 text-black text-1xl">Black Bag</h2>
            <h3 class="text-black font-bold">$56.49</h3>
        </div>

        <div class="p-4 text-white m-2">
            <a href=""><img src="images/cope.jpg" alt=""></a>
            <p class="flex"><img width="20" src="images/aime.png" alt=""></p>
            <h1 class="text-fond text-2xl font-bold">Boujee</h1>
            <h2 class="text-black-400 text-black text-1xl">Black Bag</h2>
            <h3 class="text-black font-bold">$56.49</h3>
        </div>
    </div>

    <h1 class="p-20 font-bold text-3xl">Featured Collections</h1>
    <div class="p-2 m-2 bg-[#1B4B66] h-83 flex">
        <h1 class="flex m-0">Les Promotions</h1>
        <div class="p-4 text-white m-2">
            <a href="#"><img src="images/customized.png" alt=""></a>
        </div>

        <div class="p-4 text-white m-2">
            <a href="#"><img src="images/picked.png" alt=""></a>
        </div>

        <div class="p-4 text-white m-2">
            <a href="#"><img src="images/topsales.png" alt=""></a>
        </div>

        <div class="p-4 text-white m-2">
            <a href="#"><img src="images/deals.png" alt=""></a>
        </div>
    </div>

    <h1 class="p-8 font-bold text-3xl">Shop By Brands</h1>
    <div class="p-2 m-2 bg-blanc h-80 flex">
        <div class="p-4 text-white m-2">
            <a href=""><img src="images/zara.jpg" alt=""></a>
        </div>

        <div class="p-4 text-white m-2">
            <a href=""><img src="images/dg.jpg" alt=""></a>
        </div>

        <div class="p-4 text-white m-2">
            <a href=""><img src="images/h.m.jpg" alt=""></a>
        </div>

        <div class="p-4 text-white m-2">
            <a href=""><img src="images/chanel.jpg" alt=""></a>
        </div>

        <div class="p-4 text-white m-2">
            <a href=""><img src="images/prada.jpg" alt=""></a>
        </div>

        <div class="p-4 text-white m-2">
            <a href=""><img src="images/biba.jpg" alt=""></a>
        </div>

        <div class="p-4 text-white m-2">
            <a href=""><img src="images/chanel.jpg" alt=""></a>
        </div>

    </div>

    <div class="flex flex-wrap p-0">
        <div class="w-1/2 p-2">
            <div class="cursor-pointer hover:scale-[95%] transition-all duration-700 hover:shadow-lg">
                <img src="images/lorem.png" alt="">
            </div>
        </div>
        <div class="w-1/2 p-2">
            <div class="cursor-pointer hover:scale-[95%] transition-all duration-700 hover:shadow-lg">
                <img src="images/lorem2.png" alt="">
            </div>
        </div>
    </div>
</div>

<?php include_once("footer.php"); ?>