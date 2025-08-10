<?php
include "connection.php";
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
    <script src="updateData.js"> </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="products.css">
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

      <br>  <h1> <center> Products </center></h1> <br>
     
      <div class="container text-center">
    <div class="row align-items-stretch">
        <!-- Silent Hill Card -->
        <div class="col"> 
            <div class="card" style="height: 400px; background-color: #2962ff;">
                <a href="javascript:alert('This is where description and photo of game goes using bootstrap modal!');">
                    <img src="Silent.png" class="card-img-top img-fluid" alt="Silent Hill" style="height: 180px; object-fit: cover;">
                </a>
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title" style="color: white;">Silent Hill</h5>
                    <p style="color: white;">29$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span>5.0 ★★★★★</span>
                        <span style="margin-left: 5px; color: white;">120 sold</span>
                    </div>
                    <div class="mt-2" style="color: white; text-align: center;">
                        <div style="display: inline-flex; align-items: center;">
                            In stock: 
                            <span id="stock-count-silent-hill" style="margin-left: 5px;">0</span>
                        </div>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                        <button class="btn btn-success buy-now btn-sm" 
                                style="font-size: 0.8em; white-space: nowrap;" 
                                onclick="confirmPurchase('Silent Hill', 29, 'Silent.png'); modifyStock('Silent Hill', -1)">
                            Buy Now
                        </button>
                        <button class="btn btn-light add-to-cart btn-sm" style="font-size: 0.8em; white-space: nowrap;" data-name="Silent Hill" data-price="29" data-image="Silent.png" onclick="addDBuy('Silent Hill', 1, 29);alert('Added to cart')">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tomb Raider Card -->
        <div class="col">
            <div class="card" style="height: 400px; background-color: #2962ff;">
                <img src="Tomb.png" class="card-img-top img-fluid" alt="Tomb Raider" style="height: 180px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title" style="color: white;">Tomb Raider</h5>
                    <p style="color: white;">29$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span>5.0 ★★★★★</span>
                        <span style="margin-left: 5px; color: white;">150 sold</span>
                    </div>
                    <div class="mt-2" style="color: white; text-align: center;">
                        <div style="display: inline-flex; align-items: center;">
                            In stock: 
                            <span id="stock-count-tomb-raider" style="margin-left: 5px;">0</span>
                        </div>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                    <button class="btn btn-success buy-now btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="confirmPurchase('Tomb Raider', 29, 'Tomb.png'); modifyStock('Tomb Raider', -1)">Buy Now</button>
                        <button class="btn btn-light add-to-cart btn-sm" style="font-size: 0.8em; white-space: nowrap;" data-name="Tomb Raider" data-price="29" data-image="Tomb.png" onclick="addDBuy('Tomb Raider', 1, 29);alert('Added to cart')">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Resident Evil Card -->
        <div class="col">
            <div class="card" style="height: 400px; background-color: #2962ff;">
                <img src="Red.jpg" class="card-img-top img-fluid" alt="Resident Evil" style="height: 180px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title" style="color: white;">Resident Evil</h5>
                    <p style="color: white;">29$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span>5.0 ★★★★★</span>
                        <span style="margin-left: 5px; color: white;">200 sold</span>
                    </div>
                    <div class="mt-2" style="color: white; text-align: center;">
                        <div style="display: inline-flex; align-items: center;">
                            In stock: 
                            <span id="stock-count-resident-evil" style="margin-left: 5px;">0</span>
                        </div>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                    <button class="btn btn-success buy-now btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="confirmPurchase('Resident Evil', 29, 'Red.jpg'); modifyStock('Resident Evil', -1)">Buy Now</button>
                        <button class="btn btn-light add-to-cart btn-sm" style="font-size: 0.8em; white-space: nowrap;" data-name="Resident Evil" data-price="29" data-image="Red.jpg" onclick="addDBuy('Resident Evil', 1, 29);alert('Added to cart')">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Crash Bandicoot Card -->
        <div class="col">
            <div class="card" style="height: 400px; background-color: #2962ff;">
                <img src="Crash.png" class="card-img-top img-fluid" alt="Crash Bandicoot" style="height: 180px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title" style="color: white;">Crash Bandicoot</h5>
                    <p style="color: white;">29$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span>4.2 ★★★★☆</span>
                        <span style="margin-left: 5px; color: white;">110 sold</span>
                    </div>
                    <div class="mt-2" style="color: white; text-align: center;">
                        <div style="display: inline-flex; align-items: center;">
                            In stock: 
                            <span id="stock-count-crash-bandicoot" style="margin-left: 5px;">0</span>
                        </div>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                    <button class="btn btn-success buy-now btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="confirmPurchase('Crash Bandicoot', 29, 'Crash.png'); modifyStock('Crash Bandicoot', -1)">Buy Now</button>
                        <button class="btn btn-light add-to-cart btn-sm" style="font-size: 0.8em; white-space: nowrap;" data-name="Crash Bandicoot" data-price="29" data-image="Crash.png" onclick="addDBuy('Crash Bandicoot', 1, 29);alert('Added to cart')">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pepsiman Card -->
        <div class="col">
            <div class="card" style="height: 400px; background-color: #2962ff;">
                <img src="pepsi.jpg" class="card-img-top img-fluid" alt="Pepsiman" style="height: 180px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title" style="color: white;">Pepsiman</h5>
                    <p style="color: white;">19$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span class="star-rating">4.5 ★★★★☆</span>
                        <span style="margin-left: 5px; color: white;">100 sold</span>
                    </div>
                    <div class="mt-2" style="color: white; text-align: center;">
                        <div style="display: inline-flex; align-items: center;">
                            In stock: 
                            <span id="stock-count-pepsiman" style="margin-left: 5px;">0</span>
                        </div>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                    <button class="btn btn-success buy-now btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="confirmPurchase('Pepsiman', 19, 'pepsi.jpg'); modifyStock('Pepsiman', -1)">Buy Now</button>
                        <button class="btn btn-light add-to-cart btn-sm" style="font-size: 0.8em; white-space: nowrap;" data-name="Pepsiman" data-price="19" data-image="pepsi.jpg" onclick="addDBuy('Pepsiman', 1, 19);alert('Added to cart')">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br>

<div class="container text-center">
    <div class="row align-items-stretch">
        <div class="col">
            <div class="card" style="height: 400px; background-color: #2962ff;">
                <img src="Oca.jpg" class="card-img-top img-fluid" alt="The Legend of Zelda: Ocarina of Time" style="height: 180px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title" style="color: white;">Legend of Zelda</h5>
                    <p style="color: white;">15$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span class="star-rating">4.3 ★★★★☆</span>
                        <span style="margin-left: 5px; color: white;">300 sold</span>
                    </div>
                    <div class="mt-2" style="color: white; text-align: center;">
                        <div style="display: inline-flex; align-items: center;">
                            In stock: 
                            <span id="stock-count-legend-of-zelda" style="margin-left: 5px;">0</span>
                        </div>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                    <button class="btn btn-success buy-now" style="font-size: 0.8em; white-space: nowrap;" onclick="confirmPurchase('The Legend of Zelda: Ocarina of Time', 15, 'Oca.jpg'); modifyStock('Legend of Zelda', -1)">Buy Now</button>
                        <button class="btn btn-light add-to-cart" style="font-size: 0.8em; white-space: nowrap;" data-name="The Legend of Zelda: Ocarina of Time" data-price="15" data-image="Oca.jpg" onclick="addDBuy('The Legend of Zelda: Ocarina of Time', 1, 15);alert('Added to cart')">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card" style="height: 400px; background-color: #2962ff;">
                <img src="Gold.jpg" class="card-img-top img-fluid" alt="GoldenEye 007" style="height: 180px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title" style="color: white;">GoldenEye 007</h5>
                    <p style="color: white;">15$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span class="star-rating">4.5 ★★★★☆</span>
                        <span style="margin-left: 5px; color: white;">250 sold</span>
                    </div>
                    <div class="mt-2" style="color: white; text-align: center;">
                        <div style="display: inline-flex; align-items: center;">
                            In stock: 
                            <span id="stock-count-goldeneye-007" style="margin-left: 5px;">0</span>
                        </div>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                    <button class="btn btn-success buy-now" style="font-size: 0.8em; white-space: nowrap;" onclick="confirmPurchase('GoldenEye 007', 15, 'Gold.jpg'); modifyStock('GoldenEye 007', -1)">Buy Now</button>
                        <button class="btn btn-light add-to-cart" style="font-size: 0.8em; white-space: nowrap;" data-name="GoldenEye 007" data-price="15" data-image="Gold.jpg" onclick="addDBuy('GoldenEye 007', 1, 15);alert('Added to cart')">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card" style="height: 400px; background-color: #2962ff;">
                <img src="Duke.jpg" class="card-img-top img-fluid" alt="Duke Nukem 64" style="height: 180px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title" style="color: white;">Duke Nukem 64</h5>
                    <p style="color: white;">15$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span class="star-rating">4.0 ★★★★☆</span>
                        <span style="margin-left: 5px; color: white;">180 sold</span>
                    </div>
                    <div class="mt-2" style="color: white; text-align: center;">
                        <div style="display: inline-flex; align-items: center;">
                            In stock: 
                            <span id="stock-count-duke-nukem-64" style="margin-left: 5px;">0</span>
                        </div>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                    <button class="btn btn-success buy-now" style="font-size: 0.8em; white-space: nowrap;" onclick="confirmPurchase('Duke Nukem 64', 15, 'Duke.jpg'); modifyStock('Duke Nukem 64', -1)">Buy Now</button>
                        <button class="btn btn-light add-to-cart" style="font-size: 0.8em; white-space: nowrap;" data-name="Duke Nukem 64" data-price="15" data-image="Duke.jpg" onclick="addDBuy('Duke Nukem 64', 1, 15);alert('Added to cart')">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card" style="height: 400px; background-color: #2962ff;">
                <img src="SuperMario.jpg" class="card-img-top img-fluid" alt="Super Mario 64" style="height: 180px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title" style="color: white;">Super Mario 64</h5>
                    <p style="color: white;">15$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span class="star-rating">4.7 ★★★★★</span>
                        <span style="margin-left: 5px; color: white;">220 sold</span>
                    </div>
                    <div class="mt-2" style="color: white; text-align: center;">
                        <div style="display: inline-flex; align-items: center;">
                            In stock: 
                            <span id="stock-count-super-mario-64" style="margin-left: 5px;">0</span>
                        </div>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                    <button class="btn btn-success buy-now" style="font-size: 0.8em; white-space: nowrap;" onclick="confirmPurchase('Super Mario 64', 15, 'SuperMario.jpg'); modifyStock('Super Mario 64', -1)">Buy Now</button>
                        <button class="btn btn-light add-to-cart" style="font-size: 0.8em; white-space: nowrap;" data-name="Super Mario 64" data-price="15" data-image="SuperMario.jpg" onclick="addDBuy('Super Mario 64', 1, 15);alert('Added to cart')">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card" style="height: 400px; background-color: #2962ff;">
                <img src="Donkey.jpg" class="card-img-top img-fluid" alt="Donkey Kong 64" style="height: 180px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title" style="color: white;">Donkey Kong 64</h5>
                    <p style="color: white;">15$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span class="star-rating">4.4 ★★★★☆</span>
                        <span style="margin-left: 5px; color: white;">150 sold</span>
                    </div>
                    <div class="mt-2" style="color: white; text-align: center;">
                        <div style="display: inline-flex; align-items: center;">
                            In stock: 
                            <span id="stock-count-donkey-kong-64" style="margin-left: 5px;">0</span>
                        </div>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                    <button class="btn btn-success buy-now" style="font-size: 0.8em; white-space: nowrap;" onclick="confirmPurchase('Donkey Kong 64', 15, 'Donkey.jpg'); modifyStock('Donkey Kong 64', -1)">Buy Now</button>
                        <button class="btn btn-light add-to-cart" style="font-size: 0.8em; white-space: nowrap;" data-name="Donkey Kong 64" data-price="15" data-image="Donkey.jpg" onclick="addDBuy('Donkey Kong 64', 1, 15);alert('Added to cart')">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br>

<div class="container text-center">
    <div class="row align-items-stretch">
        <div class="col">
            <div class="card" style="height: 400px; background-color: #2962ff;">
                <img src="Sonic.jpg" class="card-img-top img-fluid" alt="Sonic Adventure" style="height: 180px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title" style="color: white;">Sonic Adventure</h5>
                    <p style="color: white;">19$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span class="star-rating">4.5 ★★★★☆</span>
                        <span style="margin-left: 5px; color: white;">300 sold</span>
                    </div>
                    <div class="mt-2" style="color: white; text-align: center;">
                        <div style="display: inline-flex; align-items: center;">
                            In stock: 
                            <span id="stock-count-sonic-adventure" style="margin-left: 5px;"><?php echo isset($products['Sonic Adventure']) ? $products['Sonic Adventure'] : 0; ?></span>
                        </div>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                    <button class="btn btn-success buy-now" style="font-size: 0.8em; white-space: nowrap;" onclick="confirmPurchase('Sonic Adventure', 19, 'Sonic.jpg'); modifyStock('Sonic Adventure', -1)">Buy Now</button>
                        <button class="btn btn-light add-to-cart" style="font-size: 0.8em; white-space: nowrap;" data-name="Sonic Adventure" data-price="19" data-image="Sonic.jpg" onclick="addDBuy('Sonic Adventure', 1, 19);alert('Added to cart')">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card" style="height: 400px; background-color: #2962ff;">
                <img src="Marvel.jpg" class="card-img-top img-fluid" alt="Marvel vs Capcom 2" style="height: 180px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h6 class="feature-title" style="color: white;">Marvel vs Capcom 2</h6>
                    <p style="color: white;">20$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span class="star-rating">4.5 ★★★★☆</span>
                        <span style="margin-left: 5px; color: white;">500 sold</span>
                    </div>
                    <div class="mt-2" style="color: white; text-align: center;">
                        <div style="display: inline-flex; align-items: center;">
                            In stock: 
                            <span id="stock-count-marvel-vs-capcom-2" style="margin-left: 5px;"><?php echo isset($products['Marvel vs Capcom 2']) ? $products['Marvel vs Capcom 2'] : 8; ?></span>
                        </div>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                    <button class="btn btn-success buy-now" style="font-size: 0.8em; white-space: nowrap;" onclick="confirmPurchase('Marvel vs Capcom 2', 20, 'Marvel.jpg'); modifyStock('Marvel vs Capcom 2', -1)">Buy Now</button>
                        <button class="btn btn-light add-to-cart" style="font-size: 0.8em; white-space: nowrap;" data-name="Marvel vs Capcom 2" data-price="20" data-image="Marvel.jpg" onclick="addDBuy('Marvel vs Capcom 2', 1, 20);alert('Added to cart')">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card" style="height: 400px; background-color: #2962ff;">
                <img src="Power.jpg" class="card-img-top img-fluid" alt="Power Stone" style="height: 180px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title" style="color: white;">Power Stone</h5>
                    <p style="color: white;">20$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span class="star-rating">4.2 ★★★★☆</span>
                        <span style="margin-left: 5px; color: white;">350 sold</span>
                    </div>
                    <div class="mt-2" style="color: white; text-align: center;">
                        <div style="display: inline-flex; align-items: center;">
                            In stock: 
                            <span id="stock-count-power-stone" style="margin-left: 5px;"><?php echo isset($products['Power Stone']) ? $products['Power Stone'] : 0; ?></span>
                        </div>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                    <button class="btn btn-success buy-now" style="font-size: 0.8em; white-space: nowrap;" onclick="confirmPurchase('Power Stone', 20, 'Power.jpg'); modifyStock('Power Stone', -1)">Buy Now</button>
                        <button class="btn btn-light add-to-cart" style="font-size: 0.8em; white-space: nowrap;" data-name="Power Stone" data-price="20" data-image="Power.jpg" onclick="addDBuy('Power Stone', 1, 20);alert('Added to cart')">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card" style="height: 400px; background-color: #2962ff;">
                <img src="Jets.jpg" class="card-img-top img-fluid" alt="JetSet Radio" style="height: 180px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title" style="color: white;">JetSet Radio</h5>
                    <p style="color: white;">20$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span class="star-rating">4.3 ★★★★☆</span>
                        <span style="margin-left: 5px; color: white;">400 sold</span>
                    </div>
                    <div class="mt-2" style="color: white; text-align: center;">
                        <div style="display: inline-flex; align-items: center;">
                            In stock: 
                            <span id="stock-count-jetset-radio" style="margin-left: 5px;"><?php echo isset($products['JetSet Radio']) ? $products['JetSet Radio'] : 0; ?></span>
                        </div>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                    <button class="btn btn-success buy-now" style="font-size: 0.8em; white-space: nowrap;" onclick="confirmPurchase('JetSet Radio', 20, 'Jets.jpg');modifyStock('JetSet Radio', -1)">Buy Now</button>
                        <button class="btn btn-light add-to-cart" style="font-size: 0.8em; white-space: nowrap;" data-name="JetSet Radio" data-price="20" data-image="Jets.jpg" onclick="addDBuy('JetSet Radio', 1, 20);alert('Added to cart')">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card" style="height: 400px; background-color: #2962ff;">
                <img src="Crazy.jpg" class="card-img-top img-fluid" alt="Crazy Taxi" style="height: 180px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title" style="color: white;">Crazy Taxi</h5>
                    <p style="color: white;">20$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span class="star-rating">4.1 ★★★★☆</span>
                        <span style="margin-left: 5px; color: white;">250 sold</span>
                    </div>
                    <div class="mt-2" style="color: white; text-align: center;">
                        <div style="display: inline-flex; align-items: center;">
                            In stock: 
                            <span id="stock-count-crazy-taxi" style="margin-left: 5px;"><?php echo isset($products['Crazy Taxi']) ? $products['Crazy Taxi'] : 10; ?></span>
                        </div>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                    <button class="btn btn-success buy-now" style="font-size: 0.8em; white-space: nowrap;" onclick="confirmPurchase('Crazy Taxi', 20, 'Crazy.jpg');modifyStock('Crazy Taxi', -1)">Buy Now</button>
                        <button class="btn btn-light add-to-cart" style="font-size: 0.8em; white-space: nowrap;" data-name="Crazy Taxi" data-price="20" data-image="Crazy.jpg" onclick="addDBuy('Crazy Taxi', 1, 20);alert('Added to cart')">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="row align-items-stretch">
        <div class="col">
            <div class="card" style="height: 400px; background-color: #2962ff;">
                <img src="black.jpg" class="card-img-top img-fluid" alt="Call of Duty: Black Ops 2" style="height: 170px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h6 class="feature-title" style="color: white;">Call of Duty: Black Ops 2</h6>
                    <p style="color: white;">30$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span class="star-rating">4.8 ★★★★★</span>
                        <span style="margin-left: 5px; color: white;">600 sold</span>
                    </div>
                    <div class="mt-2" style="color: white; text-align: center;">
                        <div style="display: inline-flex; align-items: center;">
                            In stock: 
                            <span id="stock-count-call-of-duty-black-ops-2" style="margin-left: 5px;"><?php echo isset($products['Call of Duty Black Ops 2']) ? $products['Call of Duty Black Ops 2'] : 0; ?></span>
                        </div>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                    <button class="btn btn-success buy-now" style="font-size: 0.8em; white-space: nowrap;" onclick="confirmPurchase('Call of Duty Black Ops 2, 30, 'black.jpg'); modifyStock('Call of Duty Black Ops 2', -1)">Buy Now</button>
                        <button class="btn btn-light add-to-cart" style="font-size: 0.8em; white-space: nowrap;" data-name="Call of Duty Black Ops 2" data-price="30" data-image="black.jpg" onclick="addDBuy('Call of Duty Black Ops 2', 1, 30);alert('Added to cart')">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card" style="height: 400px; background-color: #2962ff;">
                <img src="border.jpg" class="card-img-top img-fluid" alt="Borderlands 2" style="height: 170px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title" style="color: white;">Borderlands 2</h5>
                    <p style="color: white;">30$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span class="star-rating">4.7 ★★★★★</span>
                        <span style="margin-left: 5px; color: white;">500 sold</span>
                    </div>
                    <div class="mt-2" style="color: white; text-align: center;">
                        <div style="display: inline-flex; align-items: center;">
                            In stock: 
                            <span id="stock-count-borderlands-2" style="margin-left: 5px;"><?php echo isset($products['Borderlands 2']) ? $products['Borderlands 2'] : 7; ?></span>
                        </div>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                    <button class="btn btn-success buy-now" style="font-size: 0.8em; white-space: nowrap;" onclick="confirmPurchase('Borderlands 2', 30, 'border.jpg');modifyStock('Borderlands 2', -1)">Buy Now</button>
                        <button class="btn btn-light add-to-cart" style="font-size: 0.8em; white-space: nowrap;" data-name="Borderlands 2" data-price="30" data-image="border.jpg" onclick="addDBuy('Borderlands 2', 1, 30);alert('Added to cart')">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card" style="height: 400px; background-color: #2962ff;">
                <img src="fallout.jpg" class="card-img-top img-fluid" alt="Fallout 3" style="height: 170px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title" style="color: white;">Fallout 3</h5>
                    <p style="color: white;">30$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span class="star-rating">4.4 ★★★★☆</span>
                        <span style="margin-left: 5px; color: white;">400 sold</span>
                    </div>
                    <div class="mt-2" style="color: white; text-align: center;">
                        <div style="display: inline-flex; align-items: center;">
                            In stock: 
                            <span id="stock-count-fallout-3" style="margin-left: 5px;"><?php echo isset($products['Fallout 3']) ? $products['Fallout 3'] : 9; ?></span>
                        </div>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                    <button class="btn btn-success buy-now" style="font-size: 0.8em; white-space: nowrap;" onclick="confirmPurchase('Fallout 3', 30, 'fallout.jpg'); modifyStock('Fallout 3', -1)">Buy Now</button>
                        <button class="btn btn-light add-to-cart" style="font-size: 0.8em; white-space: nowrap;" data-name="Fallout 3" data-price="30" data-image="fallout.jpg" onclick="addDBuy('Fallout 3', 1, 30);alert('Added to cart')">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card" style="height: 400px; background-color: #2962ff;">
                <img src="forza.jpg" class="card-img-top img-fluid" alt="Forza Horizon" style="height: 170px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title" style="color: white;">Forza Horizon</h5>
                    <p style="color: white;">30$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span class="star-rating">4.6 ★★★★★</span>
                        <span style="margin-left: 5px; color: white;">450 sold</span>
                    </div>
                    <div class="mt-2" style="color: white; text-align: center;">
                        <div style="display: inline-flex; align-items: center;">
                            In stock: 
                            <span id="stock-count-forza-horizon" style="margin-left: 5px;"><?php echo isset($products['Forza Horizon']) ? $products['Forza Horizon'] : 11; ?></span>
                        </div>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                    <button class="btn btn-success buy-now" style="font-size: 0.8em; white-space: nowrap;" onclick="confirmPurchase('Forza Horizon', 30, 'forza.jpg'); modifyStock('forza-horizon', -1);">Buy Now</button>
                        <button class="btn btn-light add-to-cart" style="font-size: 0.8em; white-space: nowrap;" data-name="Forza Horizon" data-price="30" data-image="forza.jpg" onclick="addDBuy('Forza Horizon', 1, 30);alert('Added to cart')">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card" style="height: 400px; background-color: #2962ff;">
                <img src="Mirror.jpg" class="card-img-top img-fluid" alt="Mirror's Edge" style="height: 170px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title" style="color: white;">Mirror's Edge</h5>
                    <p style="color: white;">30$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span class="star-rating">4.2 ★★★★☆</span>
                        <span style="margin-left: 5px; color: white;">300 sold</span>
                    </div>
                    <div class="mt-2" style="color: white; text-align: center;">
                        <div style="display: inline-flex; align-items: center;">
                            In stock: 
                            <span id="stock-count-mirrors-edge" style="margin-left: 5px;"><?php echo isset($products["Mirrors Edge"]) ? $products["Mirrors Edge"] : 0; ?></span>
                        </div>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                    <button class="btn btn-success buy-now" style="font-size: 0.8em; white-space: nowrap;" onclick="confirmPurchase('Mirrors Edge', 30, 'Mirror.jpg'); modifyStock('Mirrors Edge', -1);">Buy Now</button>
                        <button class="btn btn-light add-to-cart" style="font-size: 0.8em; white-space: nowrap;" data-name="Mirrors Edge" data-price="30" data-image="Mirror.jpg" onclick="addDBuy('Mirrors Edge', 1, 30);alert('Added to cart')">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
      </div>
      </div>
    <br><br><br>

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
              <p style="color: white;">Soteria's Game Archive.com<br>
                938 Aurora Boulevard, Cubao<br>
                Quezon City, Philippines 1100</p>    
            </div>
          </div>
        </div>
      </div>

      </div>
    <footer>
    <p style="color: white;">1 YEAR WARRANTY that nobody can beat!</p>
    </footer>
    
   
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
        let item = cart[index];

        $.ajax({
            url: 'stocks.php',
            type: 'POST',
            data: { productName: item.name },
            dataType: 'json',
            success: function (response) {
                if (response && response.stock !== undefined) {
                    let stock = parseInt(response.stock);
                    if (item.quantity < stock) {
                        cart[index].quantity += 1;
                        addDBuy(item.name, cart[index].quantity, item.price); // Update the database as well
                        updateCart();
                    } else {
                        alert(`Cannot add more. Only ${stock} items available for ${item.name}.`);
                    }
                } else {
                    alert("Invalid stock response from server.");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("Error:", textStatus, errorThrown);
                alert("Error checking stock. Please try again.");
            }
        });
    });

    // Decrease Quantity
    $('.minus-quantity').on('click', function () {
        let index = $(this).data('index');
        let item = cart[index];

        if (item.quantity > 1) {
            cart[index].quantity--;
            updateCart();
            addDBuy(item.name, cart[index].quantity, item.price); // Update the database
        } else {
            cart.splice(index, 1); // Remove item if quantity is 1
            removeData(item.name); // Remove from database as well
            updateCart();
        }
    });

    // Remove Item
    $('.remove-item').on('click', function () {
        let index = $(this).data('index');
        let item = cart[index];
        cart.splice(index, 1);
        removeData(item.name); // Remove from database as well
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

        function addDBuy(name, quantity, price) {
        const data = `${name},${quantity},${price}`;
        $.post("insert.php", { record: data }, function(response) {
            alert(response);
            updateCart();  // Re-update the cart after database change
            updateCartCount();  // Update the cart count in the UI
        });
    }
    
    
        function decrementData(data2) {
            $.post("decrement.php", { rer: data2 }, function(response) {
                alert(response);
            });
        }

        function removeData(name) {
    $.post("remove.php", { rero: name }, function(response) {
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

    // Prepare data to send for checkout
    let record = {
        Total: total.toFixed(2), // Original total formatted to two decimal places
        Discount: discountValue,
        Discounted: discountedTotal.toFixed(2) // Final price after discount formatted to two decimal places
    };

    // Prepare cart data (product name and quantity) for stock update
    let cartData = cart.map(item => ({
        name: item.name,
        quantity: item.quantity
    }));

    // First, update the stock in real-time before proceeding with checkout
    $.ajax({
        url: 'stocks.php', // Path to the stock update endpoint
        type: 'POST',
        data: {
            cartData: JSON.stringify(cartData) // Send cart data as a JSON string
        },
        success: function(response) {
            let res = JSON.parse(response);
            if (res.success) {
                // After successful stock update, proceed with the checkout
                $.ajax({
                    url: 'checkout.php', // Path to the checkout processing endpoint
                    type: 'POST',
                    data: { record: JSON.stringify(record) },
                    success: function(response) {
                        alert(response); // Display checkout success message
                        $('#cartModal').modal('hide');
                        cart = []; // Clear cart after successful checkout
                        updateCart(); // Update the cart UI
                        updateCartCount(); // Update the cart count UI
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error during checkout: ' + textStatus);
                    }
                });
            } else {
                // If stock update fails (e.g., insufficient stock), show the error
                alert(res.error);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error during stock update: ' + textStatus);
        }
    });
});


function modifyStock(productName, change) {
    const stockCountElement = document.getElementById(`stock-count-${productName.replace(/\s/g, '-').toLowerCase()}`);
    let currentStock = parseInt(stockCountElement.innerText);

    if (currentStock + change < 0) {
        alert("No Stocks Available");
        return;
    }

    currentStock += change;
    stockCountElement.innerText = currentStock;

    // Send update to the database
    fetch('stocks.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `Name=${encodeURIComponent(productName)}&Stocks=${currentStock}`
    })
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.text();
        })
        .then(data => {
            console.log(data);
            alert(`Stock updated successfully for ${productName}. Current stock: ${currentStock}`);
        })
        .catch(error => {
            console.error('Error:', error);
            alert(`Error updating stock for ${productName}: ${error.message}`);
        });
}


window.addEventListener('load', () => {
    // Fetch stock data for real-time updates on page load
    fetch('stocks.php')
        .then(response => response.json())
        .then(data => {
            const products = Object.keys(data);
            products.forEach(productName => {
                const stockCountElement = document.getElementById(`stock-count-${productName.replace(/\s/g, '-').toLowerCase()}`);
                const stock = data[productName] || 0; // Handle case where product isn't in DB
                if (stockCountElement) {
                    stockCountElement.innerText = stock;
                }
            });
        })
        .catch(error => {
            console.error('Error fetching stock data:', error);
            alert('Error loading stock information.');
        });
});
    </script>
</body>
</html>

     
 


