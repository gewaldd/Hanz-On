<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Hanz On Airsoft Supplies</title>
    <style>
        /* Base Styles */
        body {
            font-family: Arial, "Open Sans", sans-serif;
            margin: 0;
            padding: 0;
            background-color: #0a0a0a;
            color: #ffffff;
        }

        /* Typography */
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Roboto", sans-serif;
            color: #ffffff;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 700;
        }

        h2 {
            text-align: center;
            text-transform: uppercase;
            font-weight: bold;
            position: relative;
            margin: 30px 0 60px;
        }

        h2::after {
            content: "";
            display: block;
            width: 100px;
            height: 3px;
            background: #8fbc54;
            margin: 10px auto 0;
        }

        h3 {
            text-align: center;
            text-transform: uppercase;
            margin: 30px 0 60px;
        }

        /* Header & Navigation */
        header {
            background-color: #000000;
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #333;
        }

        nav {
            background-color: #000000;
            padding: 10px;
            border-bottom: 1px solid #333;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-nav {
            display: flex;
            justify-content: center;
            flex-grow: 1;
        }

        .nav-item {
            margin: 0 15px;
        }

        .navbar-brand {
            margin-right: auto;
        }

        .nav-link {
            color: #ffffff;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: #8fbc54;
        }

        /* Hero Section */
        .hero {
            position: relative;
            background: url("bgbg.jpg") no-repeat center center;
            background-size: cover;
            height: 90vh;
            color: white;
            display: flex;
            align-items: center;
        }

        .hero-overlay {
            background: rgba(0, 0, 0, 0.6);
            padding: 40px;
            max-width: 500px;
            margin-left: 5%;
            border-radius: 8px;
        }

        .hero h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .hero p {
            font-size: 1.1rem;
        }

        .btn-shop {
            background-color: #8fbc54;
            color: black;
            border: none;
            padding: 10px 25px;
            margin-top: 15px;
            font-weight: bold;
            border-radius: 25px;
            transition: background 0.2s, color 0.2s;
        }

        .btn-shop:hover {
            background: #7aa641;
            color: #fff;
        }

        /* Category Grid */
        .shop-category-title {
            text-align: center;
            font-size: 1.5rem;
            margin: 48px 0 32px 0;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .category-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 18px;
            max-width: 1140px;
            margin-bottom: 2.5rem;
            margin-left: auto;
            margin-right: auto;
        }

        .category-grid>div {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .category-img {
            width: 100%;
            aspect-ratio: 1/1;
            object-fit: cover;
            border-radius: 6px;
            transition: transform 0.2s;
        }

        .category-label {
            margin-top: 8px;
            text-align: center;
            font-size: 1rem;
            color: #ccc;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 500;
            cursor: pointer;
            transition: color 0.2s;
        }

        .category-img:hover {
            transform: scale(1.03);
        }

        .category-label:hover {
            color: #8fbc54;
            text-decoration: underline;
        }

        @media (max-width: 991.98px) {
            .category-grid {
                grid-template-columns: repeat(3, 1fr);
                max-width: 720px;
            }
        }

        @media (max-width: 767.98px) {
            .category-grid {
                grid-template-columns: repeat(2, 1fr);
                max-width: 95vw;
            }
        }

        @media (max-width: 575.98px) {
            .category-grid {
                grid-template-columns: 1fr;
                max-width: 95vw;
            }
        }

        /* Featured Grid */
        .featured-grid {
            margin: 56px 0 32px 0;
        }

        .featured-card {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            min-height: 340px;
            background: #1a1a1a;
            cursor: pointer;
            transition: box-shadow 0.2s;
            height: 100%;
        }

        .featured-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.85);
            transition: filter 0.3s;
        }

        .featured-card:hover img {
            filter: brightness(0.7);
        }

        .featured-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #fff;
            background: rgba(34, 34, 34, 0.22);
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.25);
            padding: 24px;
        }

        .featured-title {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 18px;
        }

        .featured-btn {
            background: #8fbc54;
            color: #000;
            border-radius: 0;
            font-weight: 600;
            padding: 10px 28px;
            border: none;
            font-size: 1rem;
            transition: background 0.2s, color 0.2s;
        }

        .featured-btn:hover {
            background: #7aa641;
            color: #fff;
        }

        @media (max-width: 991px) {
            .featured-title {
                font-size: 1.5rem;
            }

            .featured-card {
                min-height: 220px;
            }
        }

        @media (max-width: 767px) {
            .featured-title {
                font-size: 1.2rem;
            }

            .featured-card {
                min-height: 160px;
            }

            .category-label {
                font-size: 0.9rem;
            }
        }

        /* Impact Banner */
        .impact-banner {
            min-height: 210px;
            background: url("https://images.unsplash.com/photo-1600180758890-6b94519c8c49?auto=format&fit=crop&w=1500&q=80") center center/cover no-repeat;
            border-radius: 0;
            margin-top: 0;
        }

        .banner-content {
            padding: 40px 0;
        }

        .banner-btn {
            background: #8fbc54;
            color: #000;
            border-radius: 0;
            font-weight: 600;
            padding: 10px 38px;
            border: none;
            font-size: 1.1rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            transition: background 0.2s, color 0.2s;
        }

        .banner-btn:hover {
            background: #7aa641;
            color: #fff;
        }

        @media (max-width: 991.98px) {
            .impact-banner {
                min-height: 120px;
            }

            .banner-content h2 {
                font-size: 1.3rem;
            }
        }

        /* Product Cards */
        .card-img-top {
            object-fit: cover;
            aspect-ratio: 3/4;
            width: 100%;
            border-radius: 0;
            background: #1a1a1a;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 3%;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-size: 80% 80%;
        }

        @media (max-width: 767.98px) {
            .card-img-top {
                aspect-ratio: 7/8;
            }
        }

        .carousel-indicators {
            position: static;
            margin-top: 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1px;
            padding: 0;
        }

        .carousel-indicators button.active {
            background-color: #8fbc54;
            transform: scale(1.2);
        }

        .carousel-control-prev-icon {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%238fbc54' viewBox='0 0 16 16'%3E%3Cpath d='M11 2L5 8l6 6' stroke='%238fbc54' stroke-width='2' fill='none'/%3E%3C/svg%3E");
        }

        .carousel-control-next-icon {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%238fbc54' viewBox='0 0 16 16'%3E%3Cpath d='M5 2l6 6-6 6' stroke='%238fbc54' stroke-width='2' fill='none'/%3E%3C/svg%3E");
        }

        .fixed-size-img {
            width: 100%;
            max-width: 400px;
            height: 600px;
            object-fit: cover;
        }

        .divider {
            border-top: 1px solid #333;
            margin: 2rem 0;
        }

        .image-card {
            transition: transform 0.3s;
        }

        .image-card:hover {
            transform: scale(1.02);
        }

        .btn-link {
            font-weight: bold;
            text-decoration: underline;
            color: #8fbc54;
        }

        .subtitle {
            color: #ccc;
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }

        .black-text {
            color: white;
        }

        /* Cart icon overlay */
        .cart-overlay {
            position: absolute;
            top: 12px;
            right: 12px;
            background: #fff;
            border-radius: 50%;
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .cart-overlay svg {
            width: 22px;
            height: 22px;
            color: #222;
        }

        /* Fix for hidden inactive items */
        #menCarousel .carousel-inner {
            overflow: hidden;
        }

        #menCarousel .carousel-item {
            display: none;
            transition: transform 0.5s ease;
        }

        #menCarousel .carousel-item.active {
            display: block;
        }

        #menCarousel .row {
            margin: 0;
            width: 100%;
        }

        #menCarousel .col {
            padding: 0 10px;
            display: flex;
            justify-content: center;
        }

        #menCarousel .card {
            border: none;
            background: none;
            box-shadow: none;
            position: relative;
            width: 230px;
            aspect-ratio: 1 / 1;
            height: 230px;
            overflow: hidden;
        }

        #menCarousel img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 6px;
        }

        /* Carousel controls positioned outside carousel images */
        #menCarousel .carousel-control-prev,
        #menCarousel .carousel-control-next {
            width: 4vw;
            min-width: 40px;
            max-width: 60px;
            opacity: 0.8;
            top: 0;
            bottom: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #menCarousel .carousel-control-prev {
            left: -2vw;
        }

        #menCarousel .carousel-control-next {
            right: -2vw;
        }

        #menCarousel .carousel-control-prev-icon,
        #menCarousel .carousel-control-next-icon {
            background-size: 70% 70%;
        }

        /* Remove outline on control click */
        #menCarousel .carousel-control-prev:focus,
        #menCarousel .carousel-control-next:focus {
            outline: none;
            box-shadow: none;
        }

        /* Search */
        .search-container {
            display: flex;
            margin-left: 20px;
        }

        input[type="text"] {
            padding: 10px;
            width: 200px;
            background-color: #333;
            color: #fff;
            border: 1px solid #555;
            border-radius: 5px 0 0 5px;
        }

        .search-container button {
            background-color: #8fbc54;
            color: #000;
            border: none;
            border-radius: 0 5px 5px 0;
            padding: 10px 15px;
            cursor: pointer;
        }

        .search-container button:hover {
            background-color: #7aa641;
        }

        /* Buttons */
        .btn {
            transition: all 0.3s;
        }

        .btn-warning {
            background-color: #8fbc54;
            border-color: #8fbc54;
            color: #000;
            font-weight: bold;
            text-transform: uppercase;
            padding: 12px 40px;
        }

        .btn-warning:hover {
            background-color: #7aa641;
            border-color: #7aa641;
            color: #000;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #218838;
        }

        .btn-light {
            background-color: #555;
            border-color: #555;
            color: #fff;
        }

        .btn-light:hover {
            background-color: #666;
            border-color: #666;
            color: #fff;
        }

        /* Products Grid */
        .products-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            width: 100%;
            margin-bottom: 30px;
        }

        .product {
            background-color: #1e1e2f;
            border-radius: 6px;
            padding: 15px;
            text-align: center;
            transition: transform 0.3s;
        }

        .product:hover {
            transform: translateY(-5px);
        }

        .product img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .button-container {
            display: flex;
            gap: 10px;
            margin-top: 15px;
            justify-content: center;
        }

        /* Footer */
        footer {
            background-color: #000;
            padding: 15px;
            text-align: center;
            border-top: 1px solid #333;
            position: relative;
            width: 100%;
        }

        footer p {
            margin: 0;
            color: #ccc;
        }

        /* Footer Sections */
        .footer-section {
            background-color: #000;
            padding: 40px 0;
        }

        .footer-section h5 {
            color: #8fbc54;
            margin-bottom: 20px;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
        }

        .footer-section ul li {
            margin-bottom: 10px;
        }

        .footer-section a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-section a:hover {
            color: #8fbc54;
        }

        .social-icons {
            display: flex;
            gap: 15px;
        }

        .social-icons img {
            width: 24px;
            height: 24px;
        }

        /* Modals */
        .modal-content {
            background-color: #1e1e2f;
            color: #fff;
        }

        .modal-header {
            border-bottom: 1px solid #333;
        }

        .modal-footer {
            border-top: 1px solid #333;
        }

        .close {
            color: #fff;
        }

        #cart-items {
            max-height: 500px;
            overflow-y: auto;
            background-color: #181824;
            padding: 10px;
            border: 1px solid #333;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #333;
        }

        .cart-item img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 4px;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .quantity-controls button {
            padding: 2px 8px;
            background-color: #333;
            border: 1px solid #555;
            color: #fff;
        }

        .coupon-section {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }

        #coupon-code {
            flex: 1;
            background-color: #333;
            color: #fff;
            border: 1px solid #555;
        }

        #coupon-message {
            color: #ff6b6b;
            font-weight: bold;
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .products-container {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .products-container {
                grid-template-columns: repeat(2, 1fr);
            }

            .carousel {
                padding: 0 20px;
            }
        }

        @media (max-width: 576px) {
            .products-container {
                grid-template-columns: 1fr;
            }

            .navbar-nav {
                flex-direction: column;
                align-items: flex-start;
            }

            .nav-item {
                margin: 5px 0;
            }

            .search-container {
                margin: 10px 0;
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1><span style="color: #ebee5dff;"><b>H</b></span>anzOn Airsoft Supplies.</h1>
    </header>

    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">
            <img src="Logo.png" height="100px" width="100px" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"
            aria-controls="collapsibleNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="AboutUs.html">About Us</a>
                <a class="nav-item nav-link" href="products.php">Products</a>
                <a class="nav-item nav-link" href="#" data-toggle="modal" data-target="#dealsModal">Deals and
                    Coupons</a>
                <a class="nav-item nav-link" href="#">Account</a>
                <a class="nav-item nav-link" href="login.php">Sign In</a>
                <a class="nav-item nav-link" id="cart-btn" data-toggle="modal" data-target="#cartModal">Cart (<span
                        id="cart-count">0</span>)</a>
                <div class="search-container">
                    <input type="text" placeholder="Search the store">
                    <button>Search</button>
                </div>
            </div>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-overlay text-white">
            <h1>TOYZ FOR THE BIG BOYZ!</h1>
            <p>Shop all our different equipments, with a free 1 year warranty and free domestic shipping on orders over
                $10!</p>
            <button class="btn btn-shop">Shop Now</button>
        </div>
    </section>

    <div class="container">
        <div class="shop-category-title">Shop by Category</div>
        <div class="category-grid mb-5 mx-auto">
            <div>
                <img src="sniper rifles.jpg" class="category-img" alt="Sniper Rifles" />
                <div class="category-label">SNIPER RIFLES</div>
            </div>
            <div>
                <img src="assault rifles.jpg" class="category-img" alt="Assault Rifles" />
                <div class="category-label">ASSAULT RIFLES</div>
            </div>
            <div>
                <img src="pistols.jpg" class="category-img" alt="Pistols" />
                <div class="category-label">PISTOLS</div>
            </div>
            <div>
                <img src="Gears.jpg" class="category-img" alt="Gear" />
                <div class="category-label">GEAR</div>
            </div>
            <div>
                <img src="accesories.jpg" class="category-img" alt="Accessories" />
                <div class="category-label">ACCESSORIES</div>
            </div>
        </div>

        <!-- FEATURED GRID -->
        <div class="row featured-grid justify-content-center">
            <div class="col-12 col-md-4 mb-4 mb-md-0">
                <div class="featured-card" onclick="window.location='#';">
                    <img src="https://images.unsplash.com/photo-1576790372116-ba8821b13667?auto=format&fit=crop&w=600&q=80"
                        alt="New Arrivals" />
                    <div class="featured-overlay">
                        <div class="featured-title">New Arrivals</div>
                        <button class="btn featured-btn">SHOP THE LATEST</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4 mb-md-0">
                <div class="featured-card" onclick="window.location='#';">
                    <img src="https://images.unsplash.com/photo-1629996528813-fc8c4e98cabd?auto=format&fit=crop&w=600&q=80"
                        alt="Best Sellers" />
                    <div class="featured-overlay">
                        <div class="featured-title">Best-Sellers</div>
                        <button class="btn featured-btn">SHOP YOUR FAVORITES</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="featured-card" onclick="window.location='#';">
                    <img src="https://images.unsplash.com/photo-1610998342129-4a4d7ef9cbb0?auto=format&fit=crop&w=600&q=80"
                        alt="Special Offers" />
                    <div class="featured-overlay">
                        <div class="featured-title">Special Offers</div>
                        <button class="btn featured-btn">SHOP DEALS</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid my-5 px-0">
        <div class="impact-banner d-flex align-items-center justify-content-center">
            <div class="text-center w-100 banner-content">
                <h2 class="text-white mb-3">
                    We're Committed to Quality and Performance
                </h2>
                <div class="text-white mb-4 fs-5">
                    All our products come with a 1-year warranty and free shipping on orders over $10.
                </div>
                <a href="#" class="btn banner-btn">LEARN MORE</a>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="text-center mb-2" style="font-size: 2rem; font-weight: 500">
            HanzOn Favorites
        </div>
        <div class="text-center mb-4" style="font-size: 1.08rem; color: #ccc">
            High Performance. Precision Engineered. Battle Ready.
        </div>

        <div id="favoritesCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <!-- First Carousel Item (Active) -->
                <div class="carousel-item active">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-3">
                        <div class="col">
                            <div class="card border-0 h-100">
                                <img src="dbell.jpg" class="card-img-top" alt="D-Bell VSR-10" />
                                <div class="card-body p-2 pb-0">
                                    <div class="fw-semibold small">
                                        D-Bell VSR-10 Wood Design
                                    </div>
                                    <div class="text-muted small mb-1">Sniper Rifle</div>
                                    <div class="fw-semibold">$199</div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border-0 h-100">
                                <img src="glock18.jpg" class="card-img-top" alt="Glock-18" />
                                <div class="card-body p-2 pb-0">
                                    <div class="fw-semibold small">
                                        Glock-18
                                    </div>
                                    <div class="text-muted small mb-1">Pistol</div>
                                    <div class="fw-semibold">$89</div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border-0 h-100">
                                <img src="hk416.jpg" class="card-img-top" alt="HK416" />
                                <div class="card-body p-2 pb-0">
                                    <div class="fw-semibold small">
                                        HK416
                                    </div>
                                    <div class="text-muted small mb-1">Assault Rifle</div>
                                    <div class="fw-semibold">$249</div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border-0 h-100">
                                <img src="onimask.jpg" class="card-img-top" alt="Oni Mask" />
                                <div class="card-body p-2 pb-0">
                                    <div class="fw-semibold small">
                                        Oni Mask
                                    </div>
                                    <div class="text-muted small mb-1">Protective Gear</div>
                                    <div class="fw-semibold">$29</div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border-0 h-100">
                                <img src="Vortex Diamondback Tactical 4-16×44 .jpg" class="card-img-top"
                                    alt="Vortex Diamondback" />
                                <div class="card-body p-2 pb-0">
                                    <div class="fw-semibold small">Vortex Diamondback</div>
                                    <div class="text-muted small mb-1">Tactical Scope</div>
                                    <div class="fw-semibold">$179</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Second Carousel Item -->
                <div class="carousel-item">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-3">
                        <div class="col">
                            <div class="card border-0 h-100">
                                <img src="EC.png" class="card-img-top" alt="EC 501C L96 BLACK" />
                                <div class="card-body p-2 pb-0">
                                    <div class="fw-semibold small">EC 501C L96 BLACK</div>
                                    <div class="text-muted small mb-1">Sniper Rifle</div>
                                    <div class="fw-semibold">$159</div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border-0 h-100">
                                <img src="https://images.unsplash.com/photo-1594282382309-5c6c7262026c?auto=format&fit=crop&w=500&q=80"
                                    class="card-img-top" alt="Desert Eagle" />
                                <div class="card-body p-2 pb-0">
                                    <div class="fw-semibold small">Desert Eagle</div>
                                    <div class="text-muted small mb-1">Pistol</div>
                                    <div class="fw-semibold">$99</div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border-0 h-100">
                                <img src="https://images.unsplash.com/photo-1623071645586-23e0e2020d34?auto=format&fit=crop&w=500&q=80"
                                    class="card-img-top" alt="Tactical Vest" />
                                <div class="card-body p-2 pb-0">
                                    <div class="fw-semibold small">Tactical Vest</div>
                                    <div class="text-muted small mb-1">Gear</div>
                                    <div class="fw-semibold">$79</div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border-0 h-100">
                                <img src="https://images.unsplash.com/photo-1623071645586-23e0e2020d34?auto=format&fit=crop&w=500&q=80"
                                    class="card-img-top" alt="Helmet" />
                                <div class="card-body p-2 pb-0">
                                    <div class="fw-semibold small">Tactical Helmet</div>
                                    <div class="text-muted small mb-1">Protective Gear</div>
                                    <div class="fw-semibold">$69</div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border-0 h-100">
                                <img src="https://images.unsplash.com/photo-1610998342129-4a4d7ef9cbb0?auto=format&fit=crop&w=500&q=80"
                                    class="card-img-top" alt="Red Dot Sight" />
                                <div class="card-body p-2 pb-0">
                                    <div class="fw-semibold small">Red Dot Sight</div>
                                    <div class="text-muted small mb-1">Accessory</div>
                                    <div class="fw-semibold">$49</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-target="#favoritesCarousel" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>

            <button class="carousel-control-next" type="button" data-target="#favoritesCarousel" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>

        <div class="container my-5">
            <div id="testimonialCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row align-items-center">
                            <div class="col-md-6 p-5">
                                <h6>People Are Talking</h6>
                                <div class="stars mb-3">
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                </div>
                                <p class="lead">"The HK416 I purchased from HanzOn outperforms everything I've tried.
                                    The build quality is exceptional and it's incredibly accurate right out of the box."
                                </p>
                                <div class="text-muted">— Marcus J., Airsoft Team Leader</div>
                            </div>
                            <div class="col-md-6">
                                <img src="https://images.unsplash.com/photo-1576790372116-ba8821b13667?auto=format&fit=crop&w=600&q=80"
                                    class="img-fluid rounded" alt="Testimonial image">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row align-items-center">
                            <div class="col-md-6 p-5">
                                <h6>Exceptional Service</h6>
                                <div class="stars mb-3">
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                </div>
                                <p class="lead">"When my scope arrived with a minor issue, HanzOn's customer service
                                    team had a replacement shipped the same day. Now that's service you can count on!"
                                </p>
                                <div class="text-muted">— Sarah T., Competitive Player</div>
                            </div>
                            <div class="col-md-6">
                                <img src="https://images.unsplash.com/photo-1623071645586-23e0e2020d34?auto=format&fit=crop&w=600&q=80"
                                    class="img-fluid rounded" alt="Testimonial image">
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-target="#testimonialCarousel"
                    data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#testimonialCarousel"
                    data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-4 mb-md-0">
                    <h5>Shop</h5>
                    <ul>
                        <li><a href="#">Sniper Rifles</a></li>
                        <li><a href="#">Assault Rifles</a></li>
                        <li><a href="#">Pistols</a></li>
                        <li><a href="#">Gear</a></li>
                        <li><a href="#">Accessories</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4 mb-md-0">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Shipping & Returns</a></li>
                        <li><a href="#">Warranty</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Repairs</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4 mb-md-0">
                    <h5>About</h5>
                    <ul>
                        <li><a href="#">Our Story</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Press</a></li>
                        <li><a href="#">Responsibility</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Stay Connected</h5>
                    <p>Subscribe to our newsletter for the latest products and exclusive offers.</p>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Your email" aria-label="Your email">
                        <div class="input-group-append">
                            <button class="btn btn-warning" type="button">Subscribe</button>
                        </div>
                    </div>
                    <div class="social-icons">
                        <a href="#"><i class="fa fa-facebook fa-lg text-light"></i></a>
                        <a href="#"><i class="fa fa-instagram fa-lg text-light"></i></a>
                        <a href="#"><i class="fa fa-twitter fa-lg text-light"></i></a>
                        <a href="#"><i class="fa fa-youtube fa-lg text-light"></i></a>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <p class="text-muted">© 2023 HanzOn Airsoft Supplies. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Cart Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Your Shopping Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="cart-items">
                        <p class="text-center py-4">Your cart is empty</p>
                    </div>
                    <div class="coupon-section mt-3">
                        <input type="text" class="form-control" id="coupon-code" placeholder="Enter coupon code">
                        <button class="btn btn-light" id="apply-coupon">Apply</button>
                    </div>
                    <div id="coupon-message" class="mt-2"></div>
                    <div class="d-flex justify-content-between mt-3">
                        <span>Subtotal:</span>
                        <span id="cart-subtotal">$0.00</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Shipping:</span>
                        <span id="cart-shipping">$0.00</span>
                    </div>
                    <div class="d-flex justify-content-between font-weight-bold">
                        <span>Total:</span>
                        <span id="cart-total">$0.00</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Continue Shopping</button>
                    <button type="button" class="btn btn-warning" id="checkout-btn">Checkout</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Deals Modal -->
    <div class="modal fade" id="dealsModal" tabindex="-1" role="dialog" aria-labelledby="dealsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dealsModalLabel">Current Deals & Coupons</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">WELCOME10</h5>
                            <p class="card-text">Get 10% off your first order!</p>
                            <small class="text-muted">Valid for new customers only.</small>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">FREESHIP</h5>
                            <p class="card-text">Free shipping on all orders over $50.</p>
                            <small class="text-muted">Valid until end of month.</small>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">GEARUP15</h5>
                            <p class="card-text">15% off all tactical gear and accessories.</p>
                            <small class="text-muted">Valid this week only.</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Simple cart functionality
        let cartCount = 0;
        let cartItems = [];

        // Update cart count display
        function updateCartCount() {
            document.getElementById('cart-count').textContent = cartCount;
        }

        // Add to cart functionality
        document.querySelectorAll('.btn-add-to-cart').forEach(button => {
            button.addEventListener('click', function () {
                cartCount++;
                updateCartCount();

                // Get product details (simplified)
                const productCard = this.closest('.card');
                const productName = productCard.querySelector('.fw-semibold').textContent;
                const productPrice = productCard.querySelector('.fw-semibold:last-child').textContent;

                // Add to cart items array
                cartItems.push({
                    name: productName,
                    price: productPrice
                });

                // Show confirmation
                alert(`${productName} added to cart!`);
            });
        });

        // Initialize carousels
        $(document).ready(function () {
            $('.carousel').carousel();
        });
    </script>
</body>

</html>