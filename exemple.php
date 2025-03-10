<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Black Friday Sale</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero {
            background-color: #f8f9fa;
            padding: 50px 0;
            text-align: center;
        }
        .footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        .customizable-section {
            background-color: #e9ecef;
            padding: 40px 0;
            text-align: center;
        }
        .customizable-section img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">My Store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="hero">
        <h1>BLACK FRIDAY</h1>
        <p>Don't miss our exclusive offers!</p>
        <img src="images/prince.jpg" alt="">
    </div>

    <div class="container my-5">
        
            <!-- Repeat for other mugs -->
        </div>
        <div class="container mt-5">
        <h2>Nouveautés</h2>
        <div class="row">
            <div class="col-md-3"><img src="images/image (12).png" class="img-fluid" alt="Mug"></div>
            <div class="col-md-3"><img src="images/image (13).png" class="img-fluid" alt="Mug"></div>
            <div class="col-md-3"><img src="images/image (14).png" class="img-fluid" alt="Mug"></div>
            <div class="col-md-3"><img src="images/image (15).png" class="img-fluid" alt="Mug"></div>
        </div>
    </div>

        <div class="container mt-5">
        <h2>Feactured collection</h2>
        <div class="row">
            <div class="col-md-3"><img src="images/image (8).png" class="img-fluid" alt="Mug"></div>
            <div class="col-md-3"><img src="images/image (9).png" class="img-fluid" alt="Mug"></div>
            <div class="col-md-3"><img src="images/image (10).png" class="img-fluid" alt="Mug"></div>
            <div class="col-md-3"><img src="images/image (11).png" class="img-fluid" alt="Mug"></div>
        </div>
    </div>
        
        <div class="container mt-5 text-center">
        <h2>Shop by Brands</h2>
        <div class="d-flex justify-content-around brand-logos">
            <img src="images/block.png" alt="Brand">
            <img src="images/block (1).png" alt="Brand">
            <img src="images/block (2).png" alt="Brand">
            <img src="images/block (3).png" alt="Brand">
            <img src="images/block (4).png" alt="Brand">
            <img src="images/block (5).png" alt="Brand">
        </div>
    </div>

    <div class="customizable-section my-5 position-relative">
    <img src="images/image (16).png" alt="Customizable Mugs" class="img-fluid">
    <div class="overlay text-center position-absolute w-800 h-800 d-flex align-items-center justify-content-center">
        <h3 class="text-white">Customisable mugs from top brands</h3>
    </div>
    </div>
        <div class="row my-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="images/vet2.png" alt="">
                    </div>
                </div>
            </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Lorem Ipsum Section 2</h5>
                        <img src="images/vet1.png" alt="">
                    </div>
                </div>
            </div>
        </div>

    </div>

    <footer class="footer">
        <p>&copy; 2025 My Store. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
