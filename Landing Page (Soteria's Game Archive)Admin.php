<?php 
include "connection.php";
include "checkout.php";
?>
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
    <title>Soteria's Game Archive</title>
    <style>
        body {
            font-family: Arial, "Open Sans", sans-serif;
            margin: 0;
            padding: 0;
            background-color: #2962ff;
            color: white;
        }

        h2 {
            color: #333;
            text-align: center;
            text-transform: uppercase;
            font-family: "Roboto", sans-serif;
            font-weight: bold;
            position: relative;
            margin: 30px 0 60px;
        }
        h2::after {
            width: 100px;
            position: absolute;
            margin: 0 auto;
            height: 3px;
            background: #8fbc54;
            left: 0;
            right: 0;
            bottom: -10px;
        }

        h3 {
            color: #ffffff;
            text-align: center;
            text-transform: uppercase;
            font-family: "Roboto", sans-serif;
            font-weight: bold;
            position: relative;
            margin: 30px 0 60px;
        }

        header {
            background-color: rgb(13, 71, 161);
            padding: 10px;
            text-align: center;
        }

        nav {
            background-color: #1976d2;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 10px;
        }
        .navbar {
            display: flex;
            justify-content: space-between; /* Space between logo and nav items */
            align-items: center; /* Center items vertically */
        }
        .navbar-nav {
            display: flex;
            justify-content: center; /* Center the nav items */
            flex-grow: 1; /* Allow the nav items to take available space */
        }
        .nav-item {
            margin: 0 15px; /* Add some margin between items */
        }
        .navbar-brand {
            margin-right: auto; /* Push the brand/logo to the left */
        }

        .topnav {
            overflow: hidden;
            background-color: #e9e9e9;
        }

        .topnav a {
            float: left;
            display: block;
            color: black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: #2196F3;
            color: white;
        }

        .banner {
            text-align: center;
            padding: 20px;
        }

        .banner img {
            width: 100%;
            max-width: 800px;
            height: auto;
        }

        .content {
            padding: 10px;
            align-items: center;
            text-align: center;
        }

        footer {
            background-color: #0d47a1;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        #nav {
            display: inline-block; /* Center the ul */
            padding: 0;
            position: relative;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown:hover .dropdown-menu {
            display: block; /* Show on hover */
        }

        .dropdown-menu li {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        .dropdown-menu li:hover {
            background-color: white; /* Change to white on hover */
        }

        .dropdown-menu a {
            text-decoration: none;
            color: #333; /* Default text color */
        }

        .dropdown-menu a:hover {
            background-color: white; /* Change background to white on hover */
            color: #333; /* Keep text color black on hover */
        }

        .search-container {
            float: right;
            margin-left: 20px;
            vertical-align: center; /* Aligns the search container with dropdown items */
        }

        input[type="text"] {
            padding: 10px;
            width: 200px;
            border: 1px solid white;
            border-radius: 5px 0 0 5px;
        }

        button {
            background-color: white;
            color: #4285f4;
            padding: 10px 20px;
            border: none;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #f44336; /* Red on hover */
            color: white;
        }
        
        .button-container {
            display: flex; /* Use Flexbox for alignment */
            gap: 10px; /* Optional: Add space between buttons */
            margin-top: 10px; /* Optional: Add some space above the buttons */
        }

        .button-container button {
            font-size: 12px; /* Smaller font size */
            padding: 5px 10px; /* Adjust padding if necessary */
        }

        .col-center {
            margin: 0 auto;
            float: none !important;
        }

        .carousel {
            padding: 0 70px;
        }
    
        .carousel .carousel-item {
            color: #999;
            font-size: 14px;
            text-align: center;
            overflow: hidden;
            min-height: 290px;
        }
    
        .carousel .carousel-item .img-box {
            width: 300px;
            height: 300px;
            margin: 0 auto;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 10px;
        }
    
        .carousel .img-box img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
            border-radius: 10px;
        }
    
        .carousel .testimonial {
            padding: 30px 0 10px;
        }
    
        .carousel .overview {
            font-style: italic;
        }
    
        .carousel .overview b {
            text-transform: uppercase;
            color: #7AA641;
        }
    
        .carousel-control-prev, .carousel-control-next {
            width: 40px;
            height: 40px;
            margin-top: -20px;
            top: 50%;
            background: none;
        }
    
        .carousel-control-prev i, .carousel-control-next i {
            font-size: 68px;
            line-height: 42px;
            position: absolute;
            display: inline-block;
            color: rgba(0, 0, 0, 0.8);
            text-shadow: 0 3px 3px #e6e6e6, 0 0 0 #000;
        }
    
        .carousel-indicators {
            bottom: -40px;
        }
    
        .carousel-indicators li, .carousel-indicators li.active {
            width: 12px;
            height: 12px;
            margin: 1px 3px;
            border-radius: 50%;
            border: none;
        }
    
        .carousel-indicators li {
            background: #999;
            border-color: transparent;
            box-shadow: inset 0 2px 1px rgba(0,0,0,0.2);
        }
    
        .carousel-indicators li.active {
            background: #555;
            box-shadow: inset 0 2px 1px rgba(0,0,0,0.2);
        }

        h5{
        color: black;
       }
        header, footer {
            background-color: #0d47a1;
            padding: 10px;
            text-align: center;
        }
        nav a {
            color: white;
            text-decoration: none;
            padding: 10px;
        }
        .product img {
            width: 200px;
            height: auto;
        }
        footer p {  
            margin: 0;
        }
        .modal-header {
            background-color: #fbfbfc;
            color: rgb(0, 0, 0);
            max-height: 500px;
            
        }
        #cart-items {
            max-height: 500px;
            overflow-y: auto;
            background-color: rgb(108, 108, 236)  ;
        }
        .cart-item {
            display: flex;
            justify-content: normal;
            margin-bottom: 10px;
        }
        button {
            cursor: pointer;
        }
        .button-container {
    display: flex; /* Use Flexbox for alignment */
    gap: 10px; /* Optional: Add space between buttons */
    margin-top: 10px; /* Optional: Add some space above the buttons */
}
         #cart-items {
            max-height: 500px;

            overflow-y: auto;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            color: black;
            background-color: white;
            text-align: left; 
            border-spacing: 0; 
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            
        
        }
        th, td  {
            padding: 10px;
           border: 1px solid #ddd; 
           vertical-align: middle; 
          text-align: center; 
        }
        .coupon-section {
          margin-top: 15px;
           display: flex; 
          justify-content: space-between;
          align-items: center;
        }

        .coupon-section input {
            width: 70%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .coupon-section button {
            width: 25%;
            padding: 5px;
            background-color: #28a745; 
            border: none;
            color: white;
            border-radius: 4px;
        }

        #coupon-message {
            margin-top: 10px;
            color: red;
            font-weight: bold;
            text-align: center;
        }
        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between; 
        }

        .product {
            flex: 1 1 calc(25% - 20px); 
            margin: 10px; 
            text-align: center; 
        }

        .checkout-section {
            flex: 1 1 100%; 
            background-color: #f9f9f9; 
            padding: 20px;
            border-radius: 5px; 
            box-shadow: 0 2px 5px rgba(0,0,0,0.1); 
        }
        .products-container {
                    display: flex; 
                    justify-content: space-between; 
                    flex-wrap: wrap; 
                }
            
                .product {
                    width: 200px; 
                    height: 300px; 
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: space-between; 
                    box-sizing: border-box; 
                    text-align: center;
                }
            
                .product img {
                    width: 100%; 
                    height: 200px; /* Set a fixed height for the image */
                    object-fit: cover; /* Maintain aspect ratio and cover the area */
                }
                .modal-body img {
        width: 100px; /* Make the image responsive */
        height: 120px; /* Maintain aspect ratio */
        max-width: 300px; /* Set a maximum width */
    }
    .content {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.products-container {
    display: grid;
    grid-template-columns: repeat(4, 1fr); 
    gap: 20px; 
    width: 100%;
}
.btn.btn-warning {
    margin-top: 20px;
    padding: 10px 20px
}
.btn-warning {
      background-color: #ffdd00;
      border-color: #ffdd00;
      color: #000;
      font-size: 18px;
      font-weight: bold;
      text-transform: uppercase;
      padding: 12px 40px;
    }

    .btn-warning:hover {
      background-color: #ffd200;
      border-color: #ffd200;
      color: #000;
    }

    .dk-store,
    .company,
    .account,
    .get-social {
      font-size: 16px;
    }

    .dk-store a,
    .company a,
    .account a,
    .get-social a {
      color: #fff;
      text-decoration: none;
    }

    .dk-store a:hover,
    .company a:hover,
    .account a:hover,
    .get-social a:hover {
      color: #ffdd00;
    }
    .quantity-controls {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
}

.quantity-controls button {
    padding: 2px 8px;
    font-size: 14px;
}

.quantity-controls span {
    min-width: 20px;
    text-align: center;
}
.deal-list {
        max-height: 300px;
        overflow-y: auto;
    }
    .list-group-item {
        position: relative;
    }
#navitemu{
    color:white;
    transition-duration: 0.2s;
}

#cart-btn{
    color:white;
    transition-duration: 0.2s;
}

#navitemu:hover{
    color:black;
}

#cart-btn:hover{
    color:black;
}

.testimonial{
    color:white;

}

    </style>
</head>
<body>
    <header>
        <h1><span style="color: red;">S</span>oteria's Game Archive</h1>
    </header>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <a class="navbar-brand" href="Landing Page (Soteria's Game Archive).php">
            <img src="Logo.png" height="100px" width="100px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="collapsibleNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="AboutUs.html" id="navitemu">About Us</a>
                <a class="nav-item nav-link" href="#" data-toggle="modal" data-target="#dealsModal" id="navitemu">Deals and Coupons</a>
                <a class="nav-item nav-link" href="#" id="navitemu">Account</a>
                <a class="nav-item nav-link" href="login.php" id="navitemu">Sign In</a>
                <a class="nav-item nav-link" id="cart-btn" data-toggle="modal" data-target="#cartModal">Cart (<span id="cart-count">0</span>)</a>
                <input type="text" placeholder="Search the store">
                <button>Search</button>
            </div>
        </div>
    </nav>

    <div class="container-xl">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 style="color:white;">Featured Games</h2>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                        <li data-target="#myCarousel" data-slide-to="4"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="img-box"><img src="dragon ball.jpg" alt=""></div>
                            <p class="testimonial">Dragonball Final Bout is the latest in a long line of Dragonball
                                video games dating back to the late 1980's. This particular game
                                is a cut-above the rest; it is a wonderful mix of tried-and-true
                                play mechanics and ground-breaking new technologies.</p>
                            <p class="overview"><b>Sherwin "Wuken" Abesamis</b>, Creator</p>
                        </div>
                        <div class="carousel-item">
                            <div class="img-box"><img src="croc.jpg" alt=""></div>
                            <p class="testimonial">The main goal of each level is to navigate through the stage and reach the gong located at the end of the level in order to transport Croc to the next, while also saving as many captured Gobbos imprisoned throughout the stage as possible.</p>
                            <p class="overview"><b>Argonaut Software</b>, Creator</p>
                        </div>
                        <div class="carousel-item">
                            <div class="img-box"><img src="klonoa.jpg" alt=""></div>
                            <p class="testimonial">Help Klonoa save Phantomile, a land formed by the dreams of its inhabitants, and recently besieged by an unknown evil. Klonoa's breathtaking journey takes him through a series of increasingly difficult stages across multiple kingdoms as he strives to save his friends and homeland.</p>
                            <p class="overview"><b>Hideo Yoshizawa</b>, Designer</p>
                        </div>
                        <div class="carousel-item">
                            <div class="img-box"><img src="Tomb.png" alt=""></div>
                            <p class="testimonial">The object of Tomb Raider is to guide Lara through a series of tombs and other locations in search of treasures and artefacts. On the way, she must kill dangerous animals and creatures while collecting objects and solving puzzles.</p>
                            <p class="overview"><b> Core Design</b>, Developer</p>
                        </div>
                        <div class="carousel-item">
                            <div class="img-box"><img src="tron bonne.jpg" alt=""></div>
                            <p class="testimonial">Action stages let Tron (in her mecha-gorilla armor, the Gustaff) and six Servbots wreak havoc on the general populace, rob banks, loot houses, smash police cars, make money fast. Puzzle stages have Tron working the docks, stealing crates of valuable goods and absconding with the shipments.</p>
                            <p class="overview"><b>Capcom</b>, Developer</p>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="dealsModal" tabindex="-1" role="dialog" aria-labelledby="dealsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dealsModalLabel">Deals and Coupons</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="font-size: 1.1em; margin-bottom: 20px; color: black;">Check out our latest deals and coupons to save on your favorite games!</p>
                    <div class="deal-list">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span style="color: black;">10% off on your first purchase with code <strong>DISCOUNT10</strong></span>
                                <button class="btn btn-info btn-sm" onclick="copyToClipboard('DISCOUNT10')">Copy Code</button>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span style="color: black;">20% off on your first purchase with code <strong>DISCOUNT20</strong></span>
                                <button class="btn btn-info btn-sm" onclick="copyToClipboard('DISCOUNT20')">Copy Code</button>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span style="color: black;">30% off on your first purchase with code <strong>DISCOUNT30</strong></span>
                                <button class="btn btn-info btn-sm" onclick="copyToClipboard('DISCOUNT30')">Copy Code</button>
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
    
    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Shopping Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="cart-items">
                    <p>Your cart is empty.</p>
                </div>
                <div class="modal-footer" style="display: flex; flex-direction: column; align-items: flex-start; width: 100%;">
                    <div class="coupon-section" style="display: flex; align-items: center; width: 100%;">
                        <input type="text" id="coupon-code" class="form-control" placeholder="Enter coupon code" style="flex: 1; margin-right: 10px;">
                        <button class="btn btn-info" id="apply-coupon">Apply Coupon</button>
                    </div>
                    <p id="coupon-message" style="color: red; margin-top: 5px;"></p>
                    <div style="display: flex; justify-content: space-between; width: 100%;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="flex: 1; margin-right: 10px;">Close</button>
                        <button class="btn btn-primary" id="checkout-btn" style="flex: 1;">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <h3>SOTERIA'S RETRO GAME STORE!</h3>
        <p>Buy used video games, original game systems and old school gaming accessories at the largest family run retro video game online store. 
            <br>Shop all our vintage authentic products, with a free 1 year warranty and free domestic shipping on orders over $10!</p>
    </div>

    <div class="content">
        <h3>Shop Latest Deals!</h3>
                <div class="products-container">
                <div class="product">
            <a href="javascript:alert('Modal of the game');"><img src="Silent_Hill_video_game_cover.png" alt="Silent Hill" class="img-fluid"></a>
            <p>Silent Hill<br>5.0 ★★★★★</p>
            <div class="button-container">
                <button class="btn btn-success buy-now" onclick="confirmPurchase('Silent Hill', 29, 'Silent_Hill_video_game_cover.png')">Buy Now</button>
                <button class="btn btn-light add-to-cart" data-name="Silent Hill" data-price="29" data-image="Silent_Hill_video_game_cover.png" onclick="addDBuy('Silent Hill, 1, 29');alert('Added to cart')">Add to Cart</button>
            </div>
            <span class="sold-out-label" style="display: none; color: red;">Sold Out</span>
        </div>

        <div class="product">
            <a href="javascript:alert('Modal of the game');"><img src="Pepsiman.jpg" alt="Pepsiman" class="img-fluid"></a>
            <p>Pepsiman<br>4.9 ★★★★★</p>
            <div class="button-container">
                <button class="btn btn-success buy-now" onclick="confirmPurchase('Pepsiman', 19, 'Pepsiman.jpg')">Buy Now</button>
                <button class="btn btn-light add-to-cart" data-name="Pepsiman" data-price="19" data-image="Pepsiman.jpg" onclick="addDBuy('Pepsiman, 1, 19');alert('Added to cart')">Add to Cart</button>
            </div>
            <span class="sold-out-label" style="display: none; color: red;">Sold Out</span>
        </div>

        <div class="product">
            <a href="javascript:alert('Modal of the game');"><img src="ResidentEvil.jpg" alt="Resident Evil" class="img-fluid"></a>
            <p>Resident Evil<br>4.5 ★★★★</p>
            <div class="button-container">
                <button class="btn btn-success buy-now" onclick="confirmPurchase('Resident Evil', 29, 'ResidentEvil.jpg')">Buy Now</button>
                <button class="btn btn-light add-to-cart" data-name="Resident Evil" data-price="29" data-image="ResidentEvil.jpg" onclick="addDBuy('Resident Evil, 1, 29');alert('Added to cart')">Add to Cart</button>
            </div>
            <span class="sold-out-label" style="display: none; color: red;">Sold Out</span>
        </div>

        <div class="product">
            <a href="javascript:alert('Modal of the game');"><img src="Sonic.PNG" alt="Sonic The Hedgehog" class="img-fluid"></a>
            <p>Sonic The Hedgehog<br>5.0 ★★★★★</p>
            <div class="button-container">
                <button class="btn btn-success buy-now" onclick="confirmPurchase('Sonic the Hedgehog', 19, 'Sonic.PNG')">Buy Now</button>
                <button class="btn btn-light add-to-cart" data-name="Sonic the Hedgehog" data-price="19" data-image="Sonic.PNG" onclick="addDBuy('Sonic the Hedgehog, 1, 19');alert('Added to cart')">Add to Cart</button>
            </div>
            <span class="sold-out-label" style="display: none; color: red;">Sold Out</span>
        </div>
        </div>
        <br>
        <a href="productsAdmin.php" class="btn btn-warning">Shop More Deals</a>
    </div>

    <br>
    
    <div class="container-fluid bg-primary py-5">
        <div class="container mt-5">
          <div class="row">
            <div class="col-md-3 dk-store">
              <h5 class="text-warning mb-3">SOTERIA'S GAME ARCHIVE</h5>
              <ul class="list-unstyled">
                <li><a href="#">About Us</a></li>
                <li><a href="#">Repair Center</a></li>
                <li><a href="#">Deals and Coupons</a></li>
                <li><a href="#">Rewards</a></li>
                <li><a href="#">Blog</a></li>
              </ul>
            </div>
            <div class="col-md-3 company">
              <h5 class="text-warning mb-3">COMPANY</h5>
              <ul class="list-unstyled">
                <li><a href="#">Shipping & Returns</a></li>
                <li><a href="#">Refurbish & Inspection Process</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Privacy</a></li>
                <li><a href="#">California Privacy</a></li>
                <li><a href="#">Testimonials</a></li>
                <li><a href="#">FAQs</a></li>
              </ul>
            </div>
            <div class="col-md-3 account">
              <h5 class="text-warning mb-3">ACCOUNT</h5>
              <ul class="list-unstyled">
                <li><a href="#">Track My Order</a></li>
                <li><a href="#">My Account</a></li>
                <li><a href="#">Shopping Cart</a></li>
                <li><a href="#">Accessibility</a></li>
                <li><a href="#">Terms and Conditions</a></li>
                <li><a href="#">Secure Shopping</a></li>
                <li><a href="#">Sitemap</a></li>
              </ul>
            </div>
            <div class="col-md-3 get-social">
              <h5 class="text-warning mb-3">GET SOCIAL</h5>
              <ul class="list-unstyled d-flex">
                <li class="mr-3"><a href="#"><img src="facebook.png" alt="Facebook" width="24" height="24"></a></li>
                <li class="mr-3"><a href="#"><img src="twitter.png" alt="Twitter" width="24" height="24"></a></li>
                <li class="mr-3"><a href="#"><img src="youtube.png" alt="YouTube" width="24" height="24"></a></li>
                <li class="mr-3"><a href="#"><img src="instagram.png" alt="Instagram" width="24" height="24"></a></li>
                <li class="mr-3"><a href="#"><img src="tiktok.png" alt="TikTok" width="24" height="24"></a></li>
              </ul>
              <p class="mb-0">Soteria's Game Archive.com<br>
                938 Aurora Boulevard, Cubao<br>
                Quezon City, Philippines 1100</p>    
            </div>
          </div>
        </div>
      </div>
    
    
    <br><br><br>

    <footer>
        <p>1 YEAR WARRANTY that nobody can beat!</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
let cart = [];
let discount = 0;

$(document).ready(function() {
    // Event listener for adding items to the cart
    $('.add-to-cart').click(function() {
        let name = $(this).data('name');
        let price = parseFloat($(this).data('price'));
        let image = $(this).data('image');

        // Check if the item is already in the cart
        let itemIndex = cart.findIndex(item => item.name === name);

        if (itemIndex > -1) {
            // If item exists, increase its quantity
            cart[itemIndex].quantity += 1;
        } else {
            // If the item doesn't exist, add it to the cart
            let item = { name, price, image, quantity: 1 };
            cart.push(item);
        }
        updateCart(); // Update the cart display
        updateCartCount(); // Update the cart count in the header
    });

    // Event listener for the cart button
    $('#cart-btn').click(function() {
        updateCart();
        $('#cartModal').modal('show');
    });

    // Event listener for applying coupon
    $('#apply-coupon').click(function() {
        let couponCode = $('#coupon-code').val().trim();
        applyCoupon(couponCode);
    });

    // Event listener for checkout button
    $('#checkout-btn').click(function() {
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
            // Modified quantity cell with plus and minus buttons
            row.append(`
                <td>
                    <div class="quantity-controls" style="display: flex; align-items: center;">
                        <button class="btn btn-sm btn-secondary minus-quantity" data-index="${index}" onclick="decrementData('${item.name}, ${item.price}')">-</button>
                        <span class="mx-2">${item.quantity}</span>
                        <button class="btn btn-sm btn-secondary plus-quantity" data-index="${index}" onclick="addDBuy('${item.name}, 1, ${item.price}')">+</button>
                    </div>
                </td>
            `);
            row.append(`<td>$${(item.price * item.quantity).toFixed(2)}</td>`);
            row.append(`<td><button class="btn btn-danger btn-sm remove-item" data-index="${index}" onclick="removeData('${item.name}')">Remove</button></td>`);
            tbody.append(row);
        });

        table.append(tbody);
        cartItems.append(table);

        let total = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
        let discounted = total - (total * discount / 100);
        cartItems.append(`<p><strong>Total: $${total.toFixed(2)}</strong></p>`);
        if (discount > 0) {
            cartItems.append(`<p>Discount: ${discount}%</p>`);
            cartItems.append(`<p>Discounted Total: $${discounted.toFixed(2)}</p>`);
        }

        // Add event listeners for quantity buttons
        $('.plus-quantity').click(function() {
            let index = $(this).data('index');
            cart[index].quantity += 1;
            updateCart();
        });

        $('.minus-quantity').click(function() {
            let index = $(this).data('index');
            if (cart[index].quantity > 1) {
                cart[index].quantity -= 1;
                updateCart();
            } else {
                // If quantity would go below 1, remove the item
                cart.splice(index, 1);
                updateCart();
                updateCartCount();
            }
        });

        // Add event listener for remove buttons
        $('.remove-item').click(function() {
            let index = $(this).data('index');
            cart.splice(index, 1);
            updateCart();
            updateCartCount();
        });
    }

    $('#cart-count').text(cart.length);
}

function updateCartCount() {
    $('#cart-count').text(cart.length);
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
        updateCartCount();
        
        // Close the modal
        $('#cartModal').modal('hide');
    }
}
        function buyNow(name, price, image) {
            // Here you can implement the "Buy Now" functionality
            alert(`You bought ${name} for $${price}`);
            // You can also add the item directly to the cart or handle payment here
        }

        function addDBuy(data){
            $.post("insert.php", { record: data }, function(response) {
                alert(response);
            });

    }
    
        function decrementData(data2) {
            $.post("decrement.php", { rer: data2 }, function(response) {
                alert(response);
            });
        }

        function removeData(data3) {
            $.post("remove.php", { rero: data3 }, function(response) {
                alert(response);
            });
        }

        function copyToClipboard(code) {
        navigator.clipboard.writeText(code).then(() => {
            alert('Coupon code ' + code + ' copied to clipboard!');
        }, (err) => {
            console.error('Could not copy text: ', err);
        });
    }

    function viewDetails() {
        // Implement the function to show more details about the deals
        alert('More details coming soon!');
    }
    function confirmPurchase(name, price, image) {
    const confirmation = confirm(`Are you sure you want to buy ${name} for $${price}?`);
    if (confirmation) {
        buyNow(name, price, image);
        addDBuy(`${name}, 1, ${price}`);
    }
}

$('#checkout-btn').click(function() {
    if (cart.length === 0) {
        alert('Your cart is empty!');
        return; // Prevent further execution
    }

    // Confirmation alert
    let confirmation = confirm("Are you sure you want to proceed to checkout?");
    if (!confirmation) {
        return; // Stop the checkout process if the user cancels
    }

    // Calculate the original total
    let total = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
    let discountValue = discount; // Get the current discount percentage
    let discountedTotal = total; // Store the original total for calculation

    if (discountValue > 0) {
        discountedTotal = total - (total * (discountValue / 100)); // Calculate discounted total
    }

    // Prepare data to send
    let record = {
        Total: total.toFixed(2), // Original total formatted to two decimal places
        Discount: discountValue,
        Discounted: discountedTotal.toFixed(2) // Final price after discount formatted to two decimal places
    };

    $.ajax({
        url: 'checkout.php', // Ensure this path is correct
        type: 'POST',
        data: { record: JSON.stringify(record) },
        success: function(response) {
            alert(response);
            $('#cartModal').modal('hide');
            cart = []; // Clear cart after successful checkout
            updateCart(); // Update UI
            updateCartCount(); // Update cart count
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + textStatus);
        }
    });
});
    </script>

    
</body>
</html>
?>