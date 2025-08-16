<?php
include "connection.php";
?>
<?php
$products = json_decode(file_get_contents('products.json'), true);
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
    font-family: "Open Sans", Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #121218;
    color: #e0e0e0;
}

header, footer {
    background-color: #1e1e2f;
    color: white;
    padding: 15px;
    text-align: center;
}

nav {
    background-color: #1e1e2f;
    padding: 10px;
    text-align: center;
}

nav a {
    color: #f2f2f2;
    text-decoration: none;
    padding: 10px;
    transition: color 0.3s;
}

nav a:hover {
    color: #f2c94c;
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

.banner {
    text-align: center;
    padding: 20px;
}

.banner img {
    width: 100%;
    max-width: 800px;
    height: auto;
    border-radius: 8px;
}

h2, h3 {
    text-align: center;
    text-transform: uppercase;
    font-family: "Roboto", sans-serif;
    font-weight: bold;
    color: #f2f2f2;
    margin: 30px 0 30px;
}

h2::after, h3::after {
    content: "";
    display: block;
    width: 80px;
    height: 3px;
    background: #f2c94c;
    margin: 10px auto 0;
}

.content {
    padding: 20px;
    max-width: 1200px;
    margin: auto;
    background-color: #1b1b27;
    border-radius: 8px;
}

footer p {
    margin: 0;
    color: #ccc;
}

input[type="text"] {
    padding: 8px;
    width: 200px;
    border: none;
    border-radius: 5px 0 0 5px;
    background-color: #2c2c3d;
    color: #fff;
}

button {
    background-color: #f2c94c;
    color: #111;
    padding: 8px 15px;
    border: none;
    border-radius: 0 5px 5px 0;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #e0b93e;
}

.product-container, .products-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 20px;
}

.product {
    width: 220px;
    background-color: #1e1e2f;
    border-radius: 6px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.4);
    padding: 10px;
    text-align: center;
}

.product img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 4px;
}

.checkout-section {
    background-color: #1e1e2f;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    color: white;
}

.btn-warning {
    background-color: #f2c94c;
    color: black;
    border: none;
    font-weight: bold;
    padding: 10px 20px;
    text-transform: uppercase;
    transition: background-color 0.3s;
}

.btn-warning:hover {
    background-color: #e0b93e;
}

.quantity-controls button {
    padding: 4px 8px;
    font-size: 14px;
    background-color: #2c2c3d;
    border: 1px solid #555;
    color: #f2f2f2;
}

.modal-header {
    background-color: #1e1e2f;
    color: #f2f2f2;
}

#cart-items {
    max-height: 500px;
    overflow-y: auto;
    background-color: #181824;
    padding: 10px;
    border: 1px solid #333;
    color: white;
}

#navitemu, #cart-btn {
    color: #ffffff;
    transition: color 0.3s;
}

#navitemu:hover, #cart-btn:hover {
    color: #f2c94c;
}

.card {
    background-color: #1e1e2f !important;
    border-radius: 8px;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.card:hover {
    transform: translateY(-4px);
    box-shadow: 0 4px 20px rgba(0,0,0,0.4);
}

.card-body {
    color: white;
}

.card h5, .card h6 {
    color: #ffffff;
}

.card p {
    color: #cccccc;
}

.star-rating {
    color: gold;
    font-weight: bold;
}

.btn-outline-success {
    color: #00c853;
    border-color: #00c853;
}

.btn-outline-light {
    color: #ffffff;
    border-color: #ffffff;
}

.btn-outline-success:hover,
.btn-outline-light:hover {
    background-color: #00c853;
    color: white;
    border-color: #00c853;
}
/* Cart modal text and layout fixes */
#cart-items {
    color: #ffffff;
    background-color: #181824;
    padding: 10px;
    border: 1px solid #2a2a3a;
}

#cart-items p,
#cart-items span,
#cart-items .item-name,
#cart-items .item-qty,
#cart-items .item-price,
#cart-items .item-total {
    color: #ffffff !important;
}

/* Quantity button colors */
#cart-items .btn {
    color: #ffffff;
    background-color: #333;
    border: 1px solid #555;
}

#cart-items .btn:hover {
    background-color: #555;
}

/* Make sure the image is visible and styled */
#cart-items img {
    width: 60px;
    height: 60px;
    object-fit: contain;
    background-color: #fff;
    border-radius: 4px;
    padding: 4px;
}

/* Table-style row enhancements */
.cart-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    color: white;
    padding: 10px 0;
    border-bottom: 1px solid #333;
}

.cart-item span,
.cart-item div {
    color: #ddd;
}

.cart-item .remove-btn {
    background-color: #e74c3c;
    border: none;
    padding: 4px 10px;
    color: white;
    border-radius: 4px;
}
#cart-items table {
    width: 100%;
    border-collapse: collapse;
    color: #fff;
    background-color: transparent;
}

#cart-items th,
#cart-items td {
    padding: 10px;
    text-align: center;
    color: #e0e0e0;
    border-bottom: 1px solid #333;
}
.modal-footer {
    background-color: #2e2e2e; /* dark grey background */
    color: #fff; /* white text */
    border-top: 1px solid #444; /* subtle border on top */
}

.modal-footer .btn {
    color: #fff; /* ensure buttons have white text */
}

/* Optional: specifically style the coupon message text color */
#coupon-message {
    color: #ff6b6b; /* or keep your existing text-danger style */
}
#coupon-code {
    background-color: #f0f0f0; /* light grey background */
    color: #333; /* dark text for readability */
    border: 1px solid #ccc; /* subtle border */
    padding: 6px 10px; /* add some padding for comfort */
    border-radius: 4px;
    transition: border-color 0.3s ease;
}

#coupon-code:focus {
    border-color: #28a745; /* green border on focus (matching apply button) */
    outline: none;
    box-shadow: 0 0 5px #28a745;
}


    </style>
</head>
<body>
    
    <header style="background-color: #222; color: white; padding: 15px; text-align: center;">
    <h1 style="margin: 0; font-weight: 600; font-size: 1.8em;">
        <span style="color: #f2c94c;">H</span>anzOn Airsoft Supplies.
    </h1>
</header>

<nav class="navbar navbar-expand-lg" style="background-color: #333; padding: 10px;">
    <a class="navbar-brand" href="Landing Page (Soteria's Game Archive).php">
        <img src="Hanz-On1.png" height="60px" width="60px" alt="Logo" style="border-radius: 5px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" 
        aria-controls="collapsibleNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
    </button>

    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <div class="navbar-nav ml-auto" style="display: flex; align-items: center; gap: 20px;">
            <a class="nav-item nav-link" href="AboutUs.html" id="navitemu" style="color: white;">About Us</a>
            <a class="nav-item nav-link" href="#" data-toggle="modal" data-target="#dealsModal" id="navitemu" style="color: white;">Deals and Coupons</a>
            <a class="nav-item nav-link" href="#" id="navitemu" style="color: white;">Account</a>
            <a class="nav-item nav-link" href="login.php" id="navitemu" style="color: white;">Sign In</a>
            <a class="nav-item nav-link" id="cart-btn" data-toggle="modal" data-target="#cartModal" style="color: white;">Cart (<span id="cart-count">0</span>)</a>

            <div class="search-container" style="display: flex;">
                <input type="text" placeholder="Search the store" style="padding: 6px; border: 1px solid #ccc; border-radius: 5px 0 0 5px;">
                <button style="background-color: #f2c94c; color: black; border: none; border-radius: 0 5px 5px 0; padding: 6px 10px;">Search</button>
            </div>
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
                        <input type="text" id="coupon-code" class="form-control custom-input-dark" placeholder="Enter coupon code">
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

      <br>  <h1> <center> Products </center></h1> <br>
     
      <div class="container text-center">
    <div class="row align-items-stretch">
        <?php if (isset($products['GLOCK 18'])): ?>
            <div class="col"> 
                <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                    <a href="javascript:alert('This is where description and photo of game goes using bootstrap modal!');">
                        <img src="GLOCK 18.jpg" class="card-img-top img-fluid" alt="GLOCK 18" style="height: 180px; object-fit: cover;">
                    </a>
                    <div class="card-body d-flex flex-column">
                        <h5 class="feature-title" style="color: white;">GLOCK 18</h5>
                        <p style="color: white;"><?= $products['GLOCK 18']['price'] ?>$</p>
                        <div class="d-flex align-items-center" style="color: gold;">
                            <span style="font-weight: bold;"><?= $products['GLOCK 18']['rating'] ?> ★★★★★</span>
                            <span style="margin-left: 5px; color: white;"><?= $products['GLOCK 18']['sold'] ?> sold</span>
                        </div>
                        <div class="d-flex align-items-center mt-2" style="color: white;">
                            In stock: 
                            <button class="btn btn-secondary btn-sm" onclick="modifyStock('GLOCK 18', -1)">-</button>
                            <span id="stock-count-glock-18"class="mx-2"><?= $products['GLOCK 18']['stock'] ?></span>
                            <button class="btn btn-secondary btn-sm" onclick="modifyStock('GLOCK 18', 1)">+</button>
                        </div>
                        <div class="button-container mt-auto d-flex justify-content-center">
                            <button class="btn btn-outline-danger btn-sm" style="font-size: 0.8em;" onclick="deleteProduct('GLOCK 18')">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    <?php if (isset($products['CZ P-10C C02 BLK'])): ?>
    <div class="col">
        <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
            <img src="CZ P-10C C02 BLK.webp" class="card-img-top img-fluid" alt="CZ P-10C C02 BLK" style="height: 180px; object-fit: cover;">
            <div class="card-body d-flex flex-column">
                <h5 class="feature-title" style="color: white;">CZ P-10C C02</h5>
                <p style="color: white;"><?= $products['CZ P-10C C02 BLK']['price'] ?>$</p>
                <div class="d-flex align-items-center" style="color: gold;">
                    <span style="font-weight: bold;"><?= $products['CZ P-10C C02 BLK']['rating'] ?> ★★★★★</span>
                    <span style="margin-left: 5px; color: white;"><?= $products['CZ P-10C C02 BLK']['sold'] ?> sold</span>
                </div>
                <div class="d-flex align-items-center mt-2" style="color: white;">
                    In stock: 
                    <button class="btn btn-secondary btn-sm" onclick="modifyStock('CZ P-10C C02 BLK', -1)">-</button>
                    <span id="stock-count-cz-p-10c-c02-blk"class="mx-2"><?= $products['CZ P-10C C02 BLK']['stock'] ?></span>
                    <button class="btn btn-secondary btn-sm" onclick="modifyStock('CZ P-10C C02 BLK', 1)">+</button>
                </div>
                <div class="button-container mt-auto d-flex justify-content-center">
                    <button class="btn btn-outline-danger btn-sm" onclick="deleteProduct('CZ P-10C C02 BLK')">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if (isset($products['KJW CZ TS2'])): ?>
    <div class="col">
        <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
            <img src="KJW CZ TS2.jpg" class="card-img-top img-fluid" alt="KJW CZ TS2" style="height: 180px; object-fit: cover;">
            <div class="card-body d-flex flex-column">
                <h5 class="feature-title" style="color: white;">KJW CZ TS2</h5>
                <p style="color: white;"><?= $products['KJW CZ TS2']['price'] ?>$</p>
                <div class="d-flex align-items-center" style="color: gold;">
                    <span style="font-weight: bold;"><?= $products['KJW CZ TS2']['rating'] ?> ★★★★★</span>
                    <span style="margin-left: 5px; color: white;"><?= $products['KJW CZ TS2']['sold'] ?> sold</span>
                </div>
                <div class="d-flex align-items-center mt-2" style="color: white;">
                    In stock: 
                    <button class="btn btn-secondary btn-sm" onclick="modifyStock('KJW CZ TS2', -1)">-</button>
                    <span id="stock-count-kjw-cz-ts2"class="mx-2"><?= $products['KJW CZ TS2']['stock'] ?></span>
                    <button class="btn btn-secondary btn-sm" onclick="modifyStock('KJW CZ TS2', 1)">+</button>
                </div>
                <div class="button-container mt-auto d-flex justify-content-center">
                    <button class="btn btn-outline-danger btn-sm" onclick="deleteProduct('KJW CZ TS2')">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if (isset($products['WG 701 BLK'])): ?>
    <div class="col">
        <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
            <img src="WG 701 BLK.jpg" class="card-img-top img-fluid" alt="WG 701 BLK" style="height: 180px; object-fit: cover;">
            <div class="card-body d-flex flex-column">
                <h5 class="feature-title" style="color: white;">WG 701 BLK</h5>
                <p style="color: white;"><?= $products['WG 701 BLK']['price'] ?>$</p>
                <div class="d-flex align-items-center" style="color: gold;">
                    <span style="font-weight: bold;"><?= $products['WG 701 BLK']['rating'] ?> ★★★★☆</span>
                    <span style="margin-left: 5px; color: white;"><?= $products['WG 701 BLK']['sold'] ?> sold</span>
                </div>
                <div class="d-flex align-items-center mt-2" style="color: white;">
                    In stock: 
                    <button class="btn btn-secondary btn-sm" onclick="modifyStock('WG 701 BLK', -1)">-</button>
                    <span id="stock-count-wg-701-blk"class="mx-2"><?= $products['WG 701 BLK']['stock'] ?></span>
                    <button class="btn btn-secondary btn-sm" onclick="modifyStock('WG 701 BLK', 1)">+</button>
                </div>
                <div class="button-container mt-auto d-flex justify-content-center">
                    <button class="btn btn-outline-danger btn-sm" onclick="deleteProduct('WG 701 BLK')">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if (isset($products['KJW KP-06 HICAPA'])): ?>
    <div class="col">
        <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
            <img src="KJW KP-06 HICAPA.webp" class="card-img-top img-fluid" alt="KJW KP-06 HICAPA" style="height: 180px; object-fit: cover;">
            <div class="card-body d-flex flex-column">
                <h5 class="feature-title" style="color: white;">KJW KP-06</h5>
                <p style="color: white;"><?= $products['KJW KP-06 HICAPA']['price'] ?>$</p>
                <div class="d-flex align-items-center" style="color: gold;">
                    <span style="font-weight: bold;"><?= $products['KJW KP-06 HICAPA']['rating'] ?> ★★★★☆</span>
                    <span style="margin-left: 5px; color: white;"><?= $products['KJW KP-06 HICAPA']['sold'] ?> sold</span>
                </div>
                <div class="d-flex align-items-center mt-2" style="color: white;">
                    In stock: 
                    <button class="btn btn-secondary btn-sm" onclick="modifyStock('KJW KP-06 HICAPA', -1)">-</button>
                    <span id="stock-count-kjw-kp-06-hicapa"class="mx-2"><?= $products['KJW KP-06 HICAPA']['stock'] ?></span>
                    <button class="btn btn-secondary btn-sm" onclick="modifyStock('KJW KP-06 HICAPA', 1)">+</button>
                </div>
                <div class="button-container mt-auto d-flex justify-content-center">
                    <button class="btn btn-outline-danger btn-sm" onclick="deleteProduct('KJW KP-06 HICAPA')">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<br>

<div class="container text-center">
    <div class="row align-items-stretch">

        <?php if (isset($products['D BELL VSR 10 WOOD DESIGN'])): ?>
        <div class="col">
            <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                <img src="D BELL VSR 10 WOOD DESIGN.jpg" class="card-img-top img-fluid" alt="D BELL VSR 10 WOOD DESIGN" style="height: 180px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title" style="color: white;">D BELL VSR 10</h5>
                    <p style="color: white;"><?= $products['D BELL VSR 10 WOOD DESIGN']['price'] ?? '15' ?>$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span class="star-rating"><?= $products['D BELL VSR 10 WOOD DESIGN']['rating'] ?? '4.3' ?> ★★★★☆</span>
                        <span style="margin-left: 5px; color: white;"><?= $products['D BELL VSR 10 WOOD DESIGN']['sold'] ?? '300' ?> sold</span>
                    </div>
                    <div class="d-flex align-items-center mt-2" style="color: white; margin-top: 5px;">
                        In stock: 
                        <button class="btn btn-secondary btn-sm" onclick="modifyStock('D BELL VSR 10 WOOD DESIGN', -1)">-</button>
                        <span id="stock-count-d-bell-vsr-10-wood-design"class="mx-2"><?= $products['D BELL VSR 10 WOOD DESIGN']['stock'] ?? 0 ?></span>
                        <button class="btn btn-secondary btn-sm" onclick="modifyStock('D BELL VSR 10 WOOD DESIGN', 1)">+</button>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                        <button class="btn btn-outline-danger btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="deleteProduct('D BELL VSR 10 WOOD DESIGN')">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if (isset($products['DBELL VSR10 BLACK'])): ?>
        <div class="col">
            <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                <img src="DBELL VSR10 BLACK.jpg" class="card-img-top img-fluid" alt="DBELL VSR10 BLACK" style="height: 180px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title" style="color: white;">DBELL VSR10</h5>
                    <p style="color: white;"><?= $products['DBELL VSR10 BLACK']['price'] ?? '15' ?>$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span class="star-rating"><?= $products['DBELL VSR10 BLACK']['rating'] ?? '4.5' ?> ★★★★☆</span>
                        <span style="margin-left: 5px; color: white;"><?= $products['DBELL VSR10 BLACK']['sold'] ?? '250' ?> sold</span>
                    </div>
                    <div class="d-flex align-items-center mt-2" style="color: white; margin-top: 5px;">
                        In stock: 
                        <button class="btn btn-secondary btn-sm" onclick="modifyStock('DBELL VSR10 BLACK', -1)">-</button>
                        <span id="stock-count-dbell-vsr10-black"class="mx-2"><?= $products['DBELL VSR10 BLACK']['stock'] ?? 0 ?></span>
                        <button class="btn btn-secondary btn-sm" onclick="modifyStock('DBELL VSR10 BLACK', 1)">+</button>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                        <button class="btn btn-outline-danger btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="deleteProduct('DBELL VSR10 BLACK')">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if (isset($products['MOD 24 SSG GSPEC'])): ?>
        <div class="col">
            <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                <img src="MOD 24 SSG GSPEC.jpg" class="card-img-top img-fluid" alt="MOD 24 SSG GSPEC" style="height: 180px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title" style="color: white;">MOD 24 SSG</h5>
                    <p style="color: white;"><?= $products['MOD 24 SSG GSPEC']['price'] ?? '15' ?>$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span class="star-rating"><?= $products['MOD 24 SSG GSPEC']['rating'] ?? '4.0' ?> ★★★★☆</span>
                        <span style="margin-left: 5px; color: white;"><?= $products['MOD 24 SSG GSPEC']['sold'] ?? '180' ?> sold</span>
                    </div>
                    <div class="d-flex align-items-center mt-2" style="color: white; margin-top: 5px;">
                        In stock: 
                        <button class="btn btn-secondary btn-sm" onclick="modifyStock('MOD 24 SSG GSPEC', -1)">-</button>
                        <span id="stock-count-mod-24-ssg-gspec"class="mx-2"><?= $products['MOD 24 SSG GSPEC']['stock'] ?? 0 ?></span>
                        <button class="btn btn-secondary btn-sm" onclick="modifyStock('MOD 24 SSG GSPEC', 1)">+</button>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                        <button class="btn btn-outline-danger btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="deleteProduct('MOD 24 SSG GSPEC')">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if (isset($products['LT-28AB LANCER TACTICAL M24'])): ?>
        <div class="col">
            <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                <img src="LT-28AB LANCER TACTICAL M24.jpg" class="card-img-top img-fluid" alt="LT-28AB LANCER TACTICAL M24" style="height: 180px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title" style="color: white;">LT-28AB</h5>
                    <p style="color: white;"><?= $products['LT-28AB LANCER TACTICAL M24']['price'] ?? '15' ?>$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span class="star-rating"><?= $products['LT-28AB LANCER TACTICAL M24']['rating'] ?? '4.7' ?> ★★★★★</span>
                        <span style="margin-left: 5px; color: white;"><?= $products['LT-28AB LANCER TACTICAL M24']['sold'] ?? '220' ?> sold</span>
                    </div>
                    <div class="d-flex align-items-center mt-2" style="color: white; margin-top: 5px;">
                        In stock: 
                        <button class="btn btn-secondary btn-sm" onclick="modifyStock('LT-28AB LANCER TACTICAL M24', -1)">-</button>
                        <span id="stock-count-lt-28ab-lancer-tactical-m24"class="mx-2"><?= $products['LT-28AB LANCER TACTICAL M24']['stock'] ?? 0 ?></span>
                        <button class="btn btn-secondary btn-sm" onclick="modifyStock('LT-28AB LANCER TACTICAL M24', 1)">+</button>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                        <button class="btn btn-outline-danger btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="deleteProduct('LT-28AB LANCER TACTICAL M24')">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if (isset($products['EC 501C L96 BLACK'])): ?>
        <div class="col">
            <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                <img src="EC 501C L96 BLACK.jpg" class="card-img-top img-fluid" alt="EC 501C L96 BLACK" style="height: 180px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title" style="color: white;">EC 501C L96</h5>
                    <p style="color: white;"><?= $products['EC 501C L96 BLACK']['price'] ?? '15' ?>$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span class="star-rating"><?= $products['EC 501C L96 BLACK']['rating'] ?? '4.4' ?> ★★★★☆</span>
                        <span style="margin-left: 5px; color: white;"><?= $products['EC 501C L96 BLACK']['sold'] ?? '150' ?> sold</span>
                    </div>
                    <div class="d-flex align-items-center mt-2" style="color: white; margin-top: 5px;">
                        In stock: 
                        <button class="btn btn-secondary btn-sm" onclick="modifyStock('EC 501C L96 BLACK', -1)">-</button>
                        <span id="stock-count-ec-501c-l96-black"class="mx-2"><?= $products['EC 501C L96 BLACK']['stock'] ?? 0 ?></span>
                        <button class="btn btn-secondary btn-sm" onclick="modifyStock('EC 501C L96 BLACK', 1)">+</button>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                        <button class="btn btn-outline-danger btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="deleteProduct('EC 501C L96 BLACK')">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

    </div>
</div>


<br>
<div class="container text-center">
  <div class="row align-items-stretch">
    <?php if (isset($products['Heckler & Koch - HK416'])): ?>
    <div class="col mb-4">
      <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
        <img src="Heckler & Koch - HK416.jpg" class="card-img-top img-fluid" alt="Heckler & Koch - HK416" style="height: 180px; object-fit: cover;">
        <div class="card-body d-flex flex-column">
          <h5 class="feature-title" style="color: white;">Heckler & Koch</h5>
          <p style="color: white;"><?= $products['Heckler & Koch - HK416']['price'] ?? '19' ?>$</p>
          <div class="d-flex align-items-center" style="color: gold;">
            <span class="star-rating"><?= $products['Heckler & Koch - HK416']['rating'] ?? '4.5' ?> ★★★★☆</span>
            <span class="ml-2" style="color: white;"><?= $products['Heckler & Koch - HK416']['sold'] ?? '300' ?> sold</span>
          </div>
          <div class="d-flex align-items-center mt-2" style="color: white; margin-top: 5px;">
            In stock:
            <button class="btn btn-secondary btn-sm ml-2" onclick="modifyStock('Heckler & Koch - HK416', -1)">-</button>
            <span id="stock-count-heckler-&-koch---hk416" class="mx-2"><?= $products['Heckler & Koch - HK416']['stock'] ?? 0 ?></span>
            <button class="btn btn-secondary btn-sm" onclick="modifyStock('Heckler & Koch - HK416', 1)">+</button>
          </div>
          <div class="button-container mt-auto d-flex justify-content-center">
            <button class="btn btn-outline-danger btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="deleteProduct('Heckler & Koch - HK416')">Delete</button>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>

    <?php if (isset($products['Tokyo Marui VSR-10'])): ?>
    <div class="col mb-4">
      <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
        <img src="Tokyo Marui VSR-10.jpg" class="card-img-top img-fluid" alt="Tokyo Marui VSR-10" style="height: 180px; object-fit: cover;">
        <div class="card-body d-flex flex-column">
          <h6 class="feature-title" style="color: white;">Tokyo Marui VSR-10</h6>
          <p style="color: white;"><?= $products['Tokyo Marui VSR-10']['price'] ?? '20' ?>$</p>
          <div class="d-flex align-items-center" style="color: gold;">
            <span class="star-rating"><?= $products['Tokyo Marui VSR-10']['rating'] ?? '4.5' ?> ★★★★☆</span>
            <span class="ml-2" style="color: white;"><?= $products['Tokyo Marui VSR-10']['sold'] ?? '500' ?> sold</span>
          </div>
          <div class="d-flex align-items-center mt-2" style="color: white; margin-top: 5px;">
            In stock:
            <button class="btn btn-secondary btn-sm ml-2" onclick="modifyStock('Tokyo Marui VSR-10', -1)">-</button>
            <span id="stock-count-tokyo-marui-vsr-10" class="mx-2"><?= $products['Tokyo Marui VSR-10']['stock'] ?? 0 ?></span>
            <button class="btn btn-secondary btn-sm" onclick="modifyStock('Tokyo Marui VSR-10', 1)">+</button>
          </div>
          <div class="button-container mt-auto d-flex justify-content-center">
            <button class="btn btn-outline-danger btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="deleteProduct('Tokyo Marui VSR-10')">Delete</button>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>

    <?php if (isset($products['AK74 SERIES'])): ?>
    <div class="col mb-4">
      <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
        <img src="AK74 SERIES.jpg" class="card-img-top img-fluid" alt="AK74 SERIES" style="height: 180px; object-fit: cover;">
        <div class="card-body d-flex flex-column">
          <h5 class="feature-title" style="color: white;">AK74 SERIES</h5>
          <p style="color: white;"><?= $products['AK74 SERIES']['price'] ?? '20' ?>$</p>
          <div class="d-flex align-items-center" style="color: gold;">
            <span class="star-rating"><?= $products['AK74 SERIES']['rating'] ?? '4.2' ?> ★★★★☆</span>
            <span class="ml-2" style="color: white;"><?= $products['AK74 SERIES']['sold'] ?? '350' ?> sold</span>
          </div>
          <div class="d-flex align-items-center mt-2" style="color: white; margin-top: 5px;">
            In stock:
            <button class="btn btn-secondary btn-sm ml-2" onclick="modifyStock('AK74 SERIES', -1)">-</button>
            <span id="stock-count-ak74-series" class="mx-2"><?= $products['AK74 SERIES']['stock'] ?? 0 ?></span>
            <button class="btn btn-secondary btn-sm" onclick="modifyStock('AK74 SERIES', 1)">+</button>
          </div>
          <div class="button-container mt-auto d-flex justify-content-center">
            <button class="btn btn-outline-danger btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="deleteProduct('AK74 SERIES')">Delete</button>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>

    <?php if (isset($products['M4A1 SERIES'])): ?>
    <div class="col mb-4">
      <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
        <img src="M4A1 SERIES.jpg" class="card-img-top img-fluid" alt="M4A1 SERIES" style="height: 180px; object-fit: cover;">
        <div class="card-body d-flex flex-column">
          <h5 class="feature-title" style="color: white;">M4A1 SERIES</h5>
          <p style="color: white;"><?= $products['M4A1 SERIES']['price'] ?? '20' ?>$</p>
          <div class="d-flex align-items-center" style="color: gold;">
            <span class="star-rating"><?= $products['M4A1 SERIES']['rating'] ?? '4.3' ?> ★★★★☆</span>
            <span class="ml-2" style="color: white;"><?= $products['M4A1 SERIES']['sold'] ?? '400' ?> sold</span>
          </div>
          <div class="d-flex align-items-center mt-2" style="color: white; margin-top: 5px;">
            In stock: 
            <button class="btn btn-secondary btn-sm ml-2" onclick="modifyStock('M4A1 SERIES', -1)">-</button>
            <span id="stock-count-m4a1-series" class="mx-2"><?= $products['M4A1 SERIES']['stock'] ?? 0 ?></span>
            <button class="btn btn-secondary btn-sm" onclick="modifyStock('M4A1 SERIES', 1)">+</button>
          </div>
          <div class="button-container mt-auto d-flex justify-content-center">
            <button class="btn btn-outline-danger btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="deleteProduct('M4A1 SERIES')">Delete</button>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>

    <?php if (isset($products['FN SCAR'])): ?>
    <div class="col mb-4">
      <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
        <img src="FN SCAR.jpg" class="card-img-top img-fluid" alt="FN SCAR" style="height: 180px; object-fit: cover;">
        <div class="card-body d-flex flex-column">
          <h5 class="feature-title" style="color: white;">FN SCAR</h5>
          <p style="color: white;"><?= $products['FN SCAR']['price'] ?? '20' ?>$</p>
          <div class="d-flex align-items-center" style="color: gold;">
            <span class="star-rating"><?= $products['FN SCAR']['rating'] ?? '4.1' ?> ★★★★☆</span>
            <span class="ml-2" style="color: white;"><?= $products['FN SCAR']['sold'] ?? '250' ?> sold</span>
          </div>
          <div class="d-flex align-items-center mt-2" style="color: white; margin-top: 5px;">
            In stock: 
            <button class="btn btn-secondary btn-sm ml-2" onclick="modifyStock('FN SCAR', -1)">-</button>
            <span id="stock-count-fn-scar" class="mx-2"><?= $products['FN SCAR']['stock'] ?? 0 ?></span>
            <button class="btn btn-secondary btn-sm" onclick="modifyStock('FN SCAR', 1)">+</button>
          </div>
          <div class="button-container mt-auto d-flex justify-content-center">
            <button class="btn btn-outline-danger btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="deleteProduct('FN SCAR')">Delete</button>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
  </div>
</div>

</div>




    <br>


</div>
      </div>
      </div>
    <br><br><br>

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
          <li class="mr-3"><a href="#"><img src="facebook.png" alt="Facebook" width="24" height="24"></a></li>
          <li class="mr-3"><a href="#"><img src="twitter.png" alt="Twitter" width="24" height="24"></a></li>
          <li class="mr-3"><a href="#"><img src="youtube.png" alt="YouTube" width="24" height="24"></a></li>
          <li class="mr-3"><a href="#"><img src="instagram.png" alt="Instagram" width="24" height="24"></a></li>
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

<footer style="background-color: #000; text-align: center; padding: 10px 0;">
  <p style="color: white; margin: 0;">1 YEAR WARRANTY that nobody can beat!</p>
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
                        cart[index].quantity++;
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

        function deleteProduct(name) {
            if (confirm("Are you sure you want to delete this product forever?")) {
                const formData = new FormData();
                formData.append('product', name);

                fetch('delete_product.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    alert(data);
                    location.reload();
                });
            }
        }


    </script>
</body>
</html>

     
 


