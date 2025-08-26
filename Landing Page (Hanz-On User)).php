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
            background-color: #121218;
            color: #e0e0e0;
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
            background: #f2c94c;
            margin: 10px auto 0;
        }

        h3 {
            text-align: center;
            text-transform: uppercase;
            margin: 30px 0 60px;
        }

        /* Header & Navigation */
        header {
            background-color: #1e1e2f;
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #333;
        }

        nav {
            background-color: #1e1e2f;
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
            color: #f2c94c;
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
            background: rgba(30, 30, 47, 0.8);
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
            background-color: #f2c94c;
            color: black;
            border: none;
            padding: 10px 25px;
            margin-top: 15px;
            font-weight: bold;
            border-radius: 25px;
            transition: background 0.2s, color 0.2s;
        }

        .btn-shop:hover {
            background: #e0b93e;
            color: #fff;
        }

        /* Category Grid */
        .shop-category-title {
            text-align: center;
            font-size: 1.8rem;
            margin: 48px 0 32px 0;
            font-weight: 500;
            letter-spacing: 0.5px;
            color: #f2f2f2;
        }

        .category-grid {
            display: flex;
            justify-content: center;
            gap: 30px;
            max-width: 1140px;
            margin-bottom: 2.5rem;
            margin-left: auto;
            margin-right: auto;
            flex-wrap: wrap;
        }

        .category-grid>div {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 220px;
            /* Fixed width for consistent sizing */
        }

        .category-img {
            width: 100%;
            height: 220px;
            /* Fixed height for consistent sizing */
            object-fit: cover;
            border-radius: 8px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .category-label {
            margin-top: 12px;
            text-align: center;
            font-size: 1.1rem;
            color: #ccc;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 500;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .category-img:hover {
            transform: scale(1.08);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        .category-label:hover {
            color: #f2c94c;
            text-decoration: underline;
        }

        @media (max-width: 991.98px) {
            .category-grid {
                gap: 20px;
            }

            .category-grid>div {
                width: 200px;
            }

            .category-img {
                height: 200px;
            }
        }

        @media (max-width: 767.98px) {
            .category-grid {
                gap: 15px;
            }

            .category-grid>div {
                width: 180px;
            }

            .category-img {
                height: 180px;
            }
        }

        @media (max-width: 575.98px) {
            .category-grid {
                flex-direction: column;
                align-items: center;
            }

            .category-grid>div {
                width: 250px;
            }

            .category-img {
                height: 250px;
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
            background: #f2c94c;
            color: #000;
            border-radius: 0;
            font-weight: 600;
            padding: 10px 28px;
            border: none;
            font-size: 1rem;
            transition: background 0.2s, color 0.2s;
        }

        .featured-btn:hover {
            background: #e0b93e;
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
            background: #f2c94c;
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
            background: #e0b93e;
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
            background-color: #f2c94c;
            transform: scale(1.2);
        }

        .carousel-control-prev-icon {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23f2c94c' viewBox='0 0 16 16'%3E%3Cpath d='M11 2L5 8l6 6' stroke='%23f2c94c' stroke-width='2' fill='none'/%3E%3C/svg%3E");
        }

        .carousel-control-next-icon {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23f2c94c' viewBox='0 0 16 16'%3E%3Cpath d='M5 2l6 6-6 6' stroke='%23f2c94c' stroke-width='2' fill='none'/%3E%3C/svg%3E");
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
            color: #f2c94c;
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
            background-color: #f2c94c;
            color: #000;
            border: none;
            border-radius: 0 5px 5px 0;
            padding: 10px 15px;
            cursor: pointer;
        }

        .search-container button:hover {
            background-color: #e0b93e;
        }

        /* Buttons */
        .btn {
            transition: all 0.3s;
        }

        .btn-warning {
            background-color: #f2c94c;
            border-color: #f2c94c;
            color: #000;
            font-weight: bold;
            text-transform: uppercase;
            padding: 12px 40px;
        }

        .btn-warning:hover {
            background-color: #e0b93e;
            border-color: #e0b93e;
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
            color: #f2c94c;
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
            color: #f2c94c;
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
        <h1><span style="color: #f2c94c;"><b>H</b></span>anzOn Airsoft Supplies.</h1>
    </header>

    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">
            <img src="HO-logo.png" height="100px" width="100px" alt="Logo">
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
                <a href="productsAirsoftUnits.php">
                    <img src="sniper rifles.jpg" class="category-img" alt="Units" />
                    <div class="category-label">Airsoft Units</div>
                </a>
            </div>


            <div>
                <a href="productsGears.php">
                    <img src="Gears.jpg" class="category-img" alt="Gear" />
                    <div class="category-label">GEAR</div>
                </a>
            </div>
            <div>
                <img src="accesories.jpg" class="category-img" alt="Accessories" />
                <div class="category-label">ACCESSORIES</div>
            </div>
        </div>

        <!-- FEATURED GRID -->
        <div class="row featured-grid justify-content-center">
            <div class="col-12 col-md-4 mb-4 mb-md-0">
                <div class="featured-card" onclick="window.location='products.php?category=new-arrivals';">
                    <img src="newarrivals.jpg" alt="New Arrivals" />
                    <div class="featured-overlay">
                        <div class="featured-title">New Arrivals</div>
                        <button class="btn featured-btn">SHOP THE LATEST</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4 mb-md-0">
                <div class="featured-card" onclick="window.location='products.php?category=bestsellers';">
                    <img src="bestseller.jpg" alt="Best Sellers" />
                    <div class="featured-overlay">
                        <div class="featured-title">Best-Sellers</div>
                        <button class="btn featured-btn">SHOP YOUR FAVORITES</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="featured-card" onclick="window.location='products.php?category=special-offers';">
                    <img src="specialoffer.jpg" alt="Special Offers" />
                    <div class="featured-overlay">
                        <div class="featured-title">Special Offers</div>
                        <button class="btn featured-btn">SHOP DEALS</button>
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
                                <img src="hk416fb.png" class="img-fluid rounded" alt="Testimonial image">
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
                                <img src="scopefb.jpg" class="img-fluid rounded" alt="Testimonial image">
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

    <!-- FOOTER SECTION -->
    <div class="container-fluid py-5" style="background-color: #000;">
        <div class="container mt-5 text-white">
            <div class="row">
                <div class="col-md-3 dk-store">
                    <h5 style="color: #fdd835;" class="mb-3">SOTERIA'S GAME ARCHIVE</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white footer-link">About Us</a></li>
                        <li><a href="#" class="text-white footer-link">Repair Center</a></li>
                        <li><a href="#" class="text-white footer-link">Deals and Coupons</a></li>
                        <li><a href="#" class="text-white footer-link">Rewards</a></li>
                        <li><a href="#" class="text-white footer-link">Blog</a></li>
                    </ul>
                </div>
                <div class="col-md-3 company">
                    <h5 style="color: #fdd835;" class="mb-3">COMPANY</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white footer-link">Shipping & Returns</a></li>
                        <li><a href="#" class="text-white footer-link">Refurbish & Inspection Process</a></li>
                        <li><a href="#" class="text-white footer-link">Contact Us</a></li>
                        <li><a href="#" class="text-white footer-link">Privacy</a></li>
                        <li><a href="#" class="text-white footer-link">California Privacy</a></li>
                        <li><a href="#" class="text-white footer-link">Testimonials</a></li>
                        <li><a href="#" class="text-white footer-link">FAQs</a></li>
                    </ul>
                </div>
                <div class="col-md-3 account">
                    <h5 style="color: #fdd835;" class="mb-3">ACCOUNT</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white footer-link">Track My Order</a></li>
                        <li><a href="#" class="text-white footer-link">My Account</a></li>
                        <li><a href="#" class="text-white footer-link">Shopping Cart</a></li>
                        <li><a href="#" class="text-white footer-link">Accessibility</a></li>
                        <li><a href="#" class="text-white footer-link">Terms and Conditions</a></li>
                        <li><a href="#" class="text-white footer-link">Secure Shopping</a></li>
                        <li><a href="#" class="text-white footer-link">Sitemap</a></li>
                    </ul>
                </div>
                <div class="col-md-3 get-social">
                    <h5 style="color: #fdd835;" class="mb-3">GET SOCIAL</h5>
                    <ul class="list-unstyled d-flex">
                        <li class="mr-3"><a href="#"><img src="facebook.png" alt="Facebook" width="24" height="24"></a>
                        </li>
                        <li class="mr-3"><a href="#"><img src="twitter.png" alt="Twitter" width="24" height="24"></a>
                        </li>
                        <li class="mr-3"><a href="#"><img src="youtube.png" alt="YouTube" width="24" height="24"></a>
                        </li>
                        <li class="mr-3"><a href="#"><img src="instagram.png" alt="Instagram" width="24"
                                    height="24"></a></li>
                        <li class="mr-3"><a href="#"><img src="tiktok.png" alt="TikTok" width="24" height="24"></a></li>
                    </ul>
                    <p style="color: white; margin-top: 15px;">
                        Soteria's Game Archive.com<br>
                        938 Aurora Boulevard, Cubao<br>
                        Quezon City, Philippines 1100
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- BOTTOM FOOTER BAR -->
    <footer style="background-color: #000; text-align: center; padding: 10px 0;">
        <p style="color: white; margin: 0;">1 YEAR WARRANTY that nobody can beat!</p>
    </footer>
    <!-- Cart Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content custom-modal-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Shopping Cart</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="cart-items">
                    <p>Your cart is empty.</p>
                </div>
                <div class="modal-footer flex-column align-items-start w-100">
                    <div class="coupon-section w-100 d-flex align-items-center mb-2">
                        <input type="text" id="coupon-code" class="form-control custom-input-dark"
                            placeholder="Enter coupon code">
                        <button class="btn btn-outline-success ml-2" id="apply-coupon">Apply Coupon</button>
                    </div>
                    <p id="coupon-message" class="w-100 text-danger mt-1"></p>
                    <div class="d-flex justify-content-between w-100 mt-2">
                        <button type="button" class="btn btn-secondary w-50 mr-2" data-dismiss="modal">Close</button>
                        <button class="btn btn-warning w-50" id="checkout-btn">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Deals Modal -->
    <div class="modal fade" id="dealsModal" tabindex="-1" role="dialog" aria-labelledby="dealsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dealsModalLabel">Deals and Coupons</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="font-size: 1.1em; margin-bottom: 20px; color: black;">Check out our latest deals and
                        coupons to save on your favorite games!</p>
                    <div class="deal-list">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span style="color: black;">10% off on your first purchase with code
                                    <strong>DISCOUNT10</strong></span>
                                <button class="btn btn-info btn-sm" onclick="copyToClipboard('DISCOUNT10')">Copy
                                    Code</button>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span style="color: black;">20% off on your first purchase with code
                                    <strong>DISCOUNT20</strong></span>
                                <button class="btn btn-info btn-sm" onclick="copyToClipboard('DISCOUNT20')">Copy
                                    Code</button>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span style="color: black;">30% off on your first purchase with code
                                    <strong>DISCOUNT30</strong></span>
                                <button class="btn btn-info btn-sm" onclick="copyToClipboard('DISCOUNT30')">Copy
                                    Code</button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let cart = [];
        let discount = 0;

        $(document).ready(function () {
            // Event listener for the cart button
            $('#cart-btn').click(function () {
                updateCart();
                $('#cartModal').modal('show');
            });

            // Event listener for applying coupon
            $('#apply-coupon').click(function () {
                let couponCode = $('#coupon-code').val().trim();
                applyCoupon(couponCode);
            });

            // Event listener for checkout button
            $('#checkout-btn').click(function () {
                checkoutCart();
            });
        });

        function updateCart() {
            let cartItems = $('#cart-items');
            cartItems.empty();

            if (cart.length === 0) {
                cartItems.append('<p>Your cart is empty.</p>');
            } else {
                let table = $('<table>').addClass('table');
                table.append('<thead><tr><th>Image</th><th>Name</th><th>Quantity</th><th>Price</th><th>Action</th></tr></thead>');
                let tbody = $('<tbody>');

                cart.forEach((item, index) => {
                    let row = $('<tr>');
                    row.append(`<td><img src="${item.image}" alt="${item.name}" width="50"></td>`);
                    row.append(`<td>${item.name}</td>`);
                    row.append(`
                        <td>
                            <div class="quantity-controls" style="display: flex; align-items: center;">
                                <button class="btn btn-sm btn-secondary minus-quantity" data-index="${index}">-</button>
                                <span class="mx-2 quantity-value">${item.quantity}</span>
                                <button class="btn btn-sm btn-secondary plus-quantity" data-index="${index}">+</button>
                            </div>
                        </td>
                    `);
                    row.append(`<td>$${(item.price * item.quantity).toFixed(2)}</td>`);
                    row.append(`<td><button class="btn btn-danger btn-sm remove-item" data-index="${index}">Remove</button></td>`);
                    tbody.append(row);
                });

                table.append(tbody);
                cartItems.append(table);

                let total = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
                let discountedTotal = total - (total * discount / 100);
                cartItems.append(`<p><strong>Total: $${total.toFixed(2)}</strong></p>`);
                if (discount > 0) {
                    cartItems.append(`<p>Discount: ${discount}%</p>`);
                    cartItems.append(`<p>Discounted Total: $${discountedTotal.toFixed(2)}</p>`);
                }
            }

            $('#cart-count').text(cart.reduce((sum, item) => sum + item.quantity, 0));

            // Remove previous event listeners before adding new ones
            $('.plus-quantity').off();
            $('.minus-quantity').off();
            $('.remove-item').off();

            // Increase Quantity
            $('.plus-quantity').on('click', function () {
                let index = $(this).data('index');
                cart[index].quantity += 1;
                updateCart();
            });

            // Decrease Quantity
            $('.minus-quantity').on('click', function () {
                let index = $(this).data('index');
                if (cart[index].quantity > 1) {
                    cart[index].quantity -= 1;
                    updateCart();
                } else {
                    cart.splice(index, 1);
                    updateCart();
                }
            });

            // Remove Item
            $('.remove-item').on('click', function () {
                let index = $(this).data('index');
                cart.splice(index, 1);
                updateCart();
            });
        }

        function applyCoupon(code) {
            if (code === "DISCOUNT10") {
                discount = 10;
                $('#coupon-message').text("10% discount applied!");
            } else if (code === "DISCOUNT20") {
                discount = 20;
                $('#coupon-message').text("20% discount applied!");
            } else if (code === "DISCOUNT30") {
                discount = 30;
                $('#coupon-message').text("30% discount applied!");
            } else {
                discount = 0;
                $('#coupon-message').text("Invalid coupon code.");
            }
            updateCart();
        }

        function checkoutCart() {
            if (cart.length === 0) {
                alert('Your cart is empty!');
            } else {
                let total = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
                if (discount > 0) {
                    total = total * (1 - discount / 100);
                }
                alert(`Thank you for your purchase! Total: $${total.toFixed(2)}`);

                // Clear the cart
                cart = [];
                updateCart();

                // Close the modal
                $('#cartModal').modal('hide');
            }
        }

        function copyToClipboard(code) {
            navigator.clipboard.writeText(code).then(() => {
                alert('Coupon code ' + code + ' copied to clipboard!');
            }, (err) => {
                console.error('Could not copy text: ', err);
            });
        }

        // Initialize carousels
        $(document).ready(function () {
            $('.carousel').carousel();
        });
    </script>
</body>

</html>