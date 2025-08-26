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
.row.align-items-stretch {
  display: flex;
  flex-wrap: wrap;
  justify-content: center; /* or start */
  gap: 7px; /* space between cards */
}

@media (min-width: 992px) {
  .product-card {
    flex: 0 0 calc(20.5% - 12px);
    max-width: calc(20.5% - 12px);
  }
}
/* Filter container matches navbar width and styling */
.filter-container {
  width: 100%;
  background-color: #2c2f33;
  padding: 20px 0;
  display: flex;
  justify-content: center;
}

/* Inner form is centered and responsive */
.filter-form {
  display: flex;
  flex-wrap: wrap;
  gap: 15px;
  align-items: center;
  justify-content: center;
  width: 90%;
  max-width: 1300px;
}

/* Shared input/select styling */
.filter-input,
.filter-select {
  flex: 1 1 120px;
  padding: 10px;
  border-radius: 6px;
  border: none;
  background-color: #40444b;
  color: white;
  font-weight: 600;
  min-width: 100px;
}

/* Button styling */
.filter-button {
  padding: 10px 20px;
  border-radius: 6px;
  font-weight: 700;
  background-color: #ffc107;
  color: black;
  border: none;
  box-shadow: 0 3px 8px rgba(255, 193, 7, 0.6);
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.filter-button:hover {
  background-color: #e0a800;
}
.modal-content {
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.6);
  font-family: 'Open Sans', sans-serif;
}

.modal-title {
  font-family: 'Roboto', sans-serif;
  font-size: 1.4rem;
}

.carousel-inner img {
  transition: transform 0.3s ease-in-out;
}

.carousel-inner img:hover {
  transform: scale(1.02);
}
/* Black carousel arrow buttons */
.custom-carousel-arrow {
  width: 40px;
  height: 40px;
  background-color: #000; /* Solid black */
  border-radius: 50%;
  top: 50%;
  transform: translateY(-50%);
  position: absolute;
  z-index: 2;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #fff; /* White icon */
  font-size: 20px;
  box-shadow: 0 0 6px rgba(0, 0, 0, 0.5);
  transition: background-color 0.2s ease;
}

.carousel-control-prev.custom-carousel-arrow {
  left: 10px;
}

.carousel-control-next.custom-carousel-arrow {
  right: 10px;
}

.custom-carousel-arrow:hover {
  background-color: #222; /* Slightly lighter on hover */
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
                <input type="text" id="productSearch" onkeyup="searchProducts()" placeholder="Search the store" style="padding: 6px; border: 1px solid #ccc; border-radius: 5px 0 0 5px;">
                <button onclick="searchProducts()" style="background-color: #f2c94c; color: black; border: none; border-radius: 0 5px 5px 0; padding: 6px 10px;">Search</button>
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

<div class="filter-container">
  <form id="filterForm" onsubmit="applyFilters(); return false;" class="filter-form">
    
    <select id="filterCategory" class="filter-select">
      <option value="">All Categories</option>
      <option value="Pistol">Pistol</option>
      <option value="Sniper Rifle">Sniper Rifle</option>
      <option value="Rifle">Rifle</option>
    </select>

    <input type="number" id="minPrice" placeholder="Min $" class="filter-input" />
    <input type="number" id="maxPrice" placeholder="Max $" class="filter-input" />

    <select id="filterColor" class="filter-select">
      <option value="">All Colors</option>
      <option value="Black">Black</option>
      <option value="Wood">Wood</option>
      <option value="Dessert Tan">Dessert Tan</option>
    </select>

    <select id="filterSize" class="filter-select">
      <option value="">All Sizes</option>
      <option value="Full-size">Full-size</option>
      <option value="Compact">Compact</option>
    </select>

    <!-- ✅ Sorting Dropdown -->
    <select id="sortBy" class="filter-select">
      <option value="">Sort By</option>
      <option value="price-asc">Price: Low to High</option>
      <option value="price-desc">Price: High to Low</option>
      <option value="name-asc">Name: A to Z</option>
      <option value="name-desc">Name: Z to A</option>
      <option value="popularity">Most Popular</option>
      <option value="newness">Newest</option>
    </select>

    <button type="submit" class="filter-button">Apply Filters</button>
  </form>
</div>

<div class="modal fade" id="productModalGlock18" tabindex="-1" role="dialog" aria-labelledby="productModalLabelGlock18" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #1e1e2f; color: #fff; border-radius: 8px;">
      <div class="modal-header border-0">
        <h5 class="modal-title font-weight-bold" id="productModalLabelGlock18">GLOCK 18</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 1.5rem;">&times;</span>
        </button>
      </div>

<div class="modal-body row no-gutters">
    <div class="col-md-6 pr-3">
        <div id="glockCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner rounded">
                <div class="carousel-item active">
                    <video class="d-block w-100 rounded" style="height: 300px; object-fit: cover;" controls>
                        <source src="GLOCK 18.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <div class="carousel-item">
                    <img src="GLOCK 18 Side View.png" class="d-block w-100 rounded" alt="GLOCK 18 Side View" style="height: 300px; object-fit: cover;">
                </div>
                <div class="carousel-item">
                    <img src="GLOCK 18 Side View1.png" class="d-block w-100 rounded" alt="GLOCK 18 Side View1" style="height: 300px; object-fit: cover;">
                </div>
                <div class="carousel-item">
                    <img src="GLOCK 18 Side View2.png" class="d-block w-100 rounded" alt="GLOCK 18" style="height: 300px; object-fit: cover;">
                </div>
                <div class="carousel-item">
                    <img src="GLOCK 18 Side View3.png" class="d-block w-100 rounded" alt="GLOCK 18" style="height: 300px; object-fit: cover;">
                </div>
            </div>

            <a class="carousel-control-prev custom-carousel-arrow" href="#glockCarousel" role="button" data-slide="prev">
            <span class="fa fa-chevron-left"></span>
            </a>
            <a class="carousel-control-next custom-carousel-arrow" href="#glockCarousel" role="button" data-slide="next">
            <span class="fa fa-chevron-right"></span>
            </a>
          </div>
        </div>

        <!-- Right: Product Info -->
        <div class="col-md-6 pl-3 d-flex flex-column justify-content-between">
          <div>
            <h4 class="text-success font-weight-bold mb-3">Price: <?= $products['GLOCK 18']['price'] ?>$</h4>
            <p><i class="fa fa-cogs text-warning mr-1"></i><strong>Mode:</strong> Semi/Full Auto</p>
            <p><i class="fa fa-shopping-cart text-info mr-1"></i><strong>Sold:</strong> <?= $products['GLOCK 18']['sold'] ?></p>
            <p><i class="fa fa-star text-success mr-1"></i><strong>Rating:</strong> <?= $products['GLOCK 18']['rating'] ?> ★★★★★</p>

            <hr style="border-color: #444;">


            <h6 class="font-weight-bold">Description</h6>
            <p class="small">
              The GLOCK 18 is a compact, gas-powered airsoft pistol known for its reliability and performance. Perfect for CQB engagements and training.
            </p>

            <h6 class="font-weight-bold">Specifications</h6>
            <ul class="small">
              <li>Type: GBB (Gas Blowback)</li>
              <li>Material: Polymer & Metal</li>
              <li>Color: Black</li>
              <li>Size: Compact</li>
              <li>Magazine Capacity: 25 rounds</li>
              <li>FPS: ~300-320</li>
            </ul>
          </div>
          <!-- Buttons -->
            <div class="d-flex justify-content-between mt-4">
                <button class="btn btn-success d-flex align-items-center justify-content-center w-50 mr-2 py-2"
                    style="font-size: 0.8em; white-space: nowrap;"
                    onclick="confirmPurchase('GLOCK 18', <?= $products['GLOCK 18']['price'] ?>, 'GLOCK 18.jpg'); modifyStock('GLOCK 18', -1)">
                    <i class="fa fa-credit-card mr-2"></i> Buy Now
                </button>

                 <form method="POST" action="wishlist_action.php" class="w-50">
                        <input type="hidden" name="product_name" value="GLOCK 18">
                        <input type="hidden" name="product_price" value="<?= $products['GLOCK 18']['price'] ?>">
                        <input type="hidden" name="product_image" value="GLOCK 18.jpg">
                        <button type="submit" name="add_to_wishlist" 
                          class="btn btn-outline-warning d-flex align-items-center justify-content-center w-100 py-2"
                          style="font-size: 0.8em; white-space: nowrap;">
                    <i class="fa fa-heart mr-2"></i> Add to Wishlist
                  </button>
                </form>


                <button class="btn btn-outline-light add-to-cart btn-sm d-flex align-items-center justify-content-center w-50 py-2"
                    style="font-size: 0.8em; white-space: nowrap;"
                    data-name="GLOCK 18"
                    data-price="<?= $products['GLOCK 18']['price'] ?>"
                    data-image="GLOCK 18.jpg"
                    onclick="addDBuy('GLOCK 18', 1, <?= $products['GLOCK 18']['price'] ?>); alert('Added to cart')">
                    <i class="fa fa-shopping-cart mr-2"></i> Add to Cart
                </button>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="czP10Modal" tabindex="-1" role="dialog" aria-labelledby="czP10ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #1e1e2f; color: white; border: 1px solid #444;">
      
      <div class="modal-header border-0">
        <h5 class="modal-title font-weight-bold" id="czP10ModalLabel">CZ P-10C C02</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body row no-gutters">
        <!-- Left: Carousel -->
        <div class="col-md-6 pr-3">
          <div id="czCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner rounded">
              <div class="carousel-item active">
                    <video class="d-block w-100 rounded" style="height: 300px; object-fit: cover;" controls>
                        <source src="CZ P-10C C02 BLK.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
              </div>
              <div class="carousel-item">
                <img src="CZ P-10C C02 BLK Side View.png" class="d-block w-100 rounded" alt="CZ P-10C" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="CZ P-10C C02 BLK Side View1.png" class="d-block w-100 rounded" alt="CZ P-10C" style="height: 300px; object-fit: cover;">
              </div>
              <<div class="carousel-item">
                <img src="CZ P-10C C02 BLK Side View2.png" class="d-block w-100 rounded" alt="CZ P-10C" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="CZ P-10C C02 BLK Side View3.png" class="d-block w-100 rounded" alt="CZ P-10C" style="height: 300px; object-fit: cover;">
              </div>
            </div>
            <a class="carousel-control-prev custom-carousel-arrow" href="#czCarousel" role="button" data-slide="prev">
              <span class="fa fa-chevron-left text-white"></span>
            </a>
            <a class="carousel-control-next custom-carousel-arrow" href="#czCarousel" role="button" data-slide="next">
              <span class="fa fa-chevron-right text-white"></span>
            </a>
          </div>
        </div>

        <!-- Right: Product Info -->
        <div class="col-md-6 pl-3 d-flex flex-column justify-content-between">
          <div>
            <h4 class="text-success font-weight-bold mb-3">Price: <?= $products['CZ P-10C C02 BLK']['price'] ?>$</h4>
            <p><i class="fa fa-cogs text-warning mr-1"></i><strong>Mode:</strong> Semi-Auto</p>
            <p><i class="fa fa-shopping-cart text-info mr-1"></i><strong>Sold:</strong> <?= $products['CZ P-10C C02 BLK']['sold'] ?></p>
            <p><i class="fa fa-star text-success mr-1"></i><strong>Rating:</strong> <?= $products['CZ P-10C C02 BLK']['rating'] ?> ★★★★★</p>

            <hr style="border-color: #444;">

            <h6 class="font-weight-bold">Description</h6>
            <p class="small">
              The CZ P-10C C02 is a compact, durable, and reliable airsoft pistol. Ideal for close quarters combat and tactical training with CO2 power for consistency.
            </p>

            <h6 class="font-weight-bold">Specifications</h6>
            <ul class="small">
              <li>Type: CO2 Powered</li>
              <li>Material: Polymer Frame, Metal Slide</li>
              <li>Color: Black</li>
              <li>Size: Compact</li>
              <li>Magazine Capacity: 20 rounds</li>
              <li>FPS: ~330-350</li>
            </ul>
          </div>

          <!-- Buttons -->
          <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success d-flex align-items-center justify-content-center w-50 mr-2 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              onclick="confirmPurchase('CZ P-10C C02 BLK', <?= $products['CZ P-10C C02 BLK']['price'] ?>, 'CZ P-10C C02 BLK.jpg'); modifyStock('CZ P-10C C02 BLK', -1)">
              <i class="fa fa-credit-card mr-2"></i> Buy Now
            </button>
            <button class="btn btn-outline-light add-to-cart btn-sm d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              data-name="CZ P-10C C02 BLK"
              data-price="<?= $products['CZ P-10C C02 BLK']['price'] ?>"
              data-image="CZ P-10C C02 BLK.jpg"
              onclick="addDBuy('CZ P-10C C02 BLK', 1, <?= $products['CZ P-10C C02 BLK']['price'] ?>); alert('Added to cart')">
              <i class="fa fa-shopping-cart mr-2"></i> Add to Cart
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="kjwTs2Modal" tabindex="-1" role="dialog" aria-labelledby="kjwTs2ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #1e1e2f; color: white; border: 1px solid #444;">
      
      <div class="modal-header border-0">
        <h5 class="modal-title font-weight-bold" id="kjwTs2ModalLabel">KJW CZ TS2</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body row no-gutters">
        <!-- Left: Carousel -->
        <div class="col-md-6 pr-3">
          <div id="ts2Carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner rounded">
              <div class="carousel-item active">
                <!-- Replace with actual video if available -->
                <video class="d-block w-100 rounded" style="height: 300px; object-fit: cover;" controls>
                    <source src="KJW CZ TS2.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
              </div>
              <div class="carousel-item">
                <img src="KJW CZ TS2 Side View.png" class="d-block w-100 rounded" alt="KJW CZ TS2" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="KJW CZ TS2 Side View1.png" class="d-block w-100 rounded" alt="KJW CZ TS2" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="KJW CZ TS2 Side View2.png" class="d-block w-100 rounded" alt="KJW CZ TS2" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="KJW CZ TS2 Side View3.png" class="d-block w-100 rounded" alt="KJW CZ TS2" style="height: 300px; object-fit: cover;">
              </div>
            </div>
            <a class="carousel-control-prev custom-carousel-arrow" href="#ts2Carousel" role="button" data-slide="prev">
              <span class="fa fa-chevron-left text-white"></span>
            </a>
            <a class="carousel-control-next custom-carousel-arrow" href="#ts2Carousel" role="button" data-slide="next">
              <span class="fa fa-chevron-right text-white"></span>
            </a>
          </div>
        </div>

        <!-- Right: Product Info -->
        <div class="col-md-6 pl-3 d-flex flex-column justify-content-between">
          <div>
            <h4 class="text-success font-weight-bold mb-3">Price: <?= $products['KJW CZ TS2']['price'] ?>$</h4>
            <p><i class="fa fa-cogs text-warning mr-1"></i><strong>Mode:</strong> Semi-Auto</p>
            <p><i class="fa fa-shopping-cart text-info mr-1"></i><strong>Sold:</strong> <?= $products['KJW CZ TS2']['sold'] ?></p>
            <p><i class="fa fa-star text-success mr-1"></i><strong>Rating:</strong> <?= $products['KJW CZ TS2']['rating'] ?> ★★★★★</p>

            <hr style="border-color: #444;">

            <h6 class="font-weight-bold">Description</h6>
            <p class="small">
              The KJW CZ TS2 is a high-performance gas blowback pistol, designed for precision, durability, and realistic feel. Excellent for both training and competitive shooting.
            </p>

            <h6 class="font-weight-bold">Specifications</h6>
            <ul class="small">
              <li>Type: GBB (Gas Blowback)</li>
              <li>Material: Full Metal Construction</li>
              <li>Color: Black</li>
              <li>Size: Full-size</li>
              <li>Magazine Capacity: 25 rounds</li>
              <li>FPS: ~320-340</li>
            </ul>
          </div>

          <!-- Buttons -->
          <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success d-flex align-items-center justify-content-center w-50 mr-2 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              onclick="confirmPurchase('KJW CZ TS2', <?= $products['KJW CZ TS2']['price'] ?>, 'KJW CZ TS2.png'); modifyStock('KJW CZ TS2', -1)">
              <i class="fa fa-credit-card mr-2"></i> Buy Now
            </button>

            <button class="btn btn-outline-warning d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              onclick="addToWishlist('KJW CZ TS2', <?= $products['KJW CZ TS2']['price'] ?>, 'KJW CZ TS2.png')">
              <i class="fa fa-heart mr-2"></i> Add to Wishlist
            </button>

            <button class="btn btn-outline-light add-to-cart btn-sm d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              data-name="KJW CZ TS2"
              data-price="<?= $products['KJW CZ TS2']['price'] ?>"
              data-image="KJW CZ TS2.png"
              onclick="addDBuy('KJW CZ TS2', 1, <?= $products['KJW CZ TS2']['price'] ?>); alert('Added to cart')">
              <i class="fa fa-shopping-cart mr-2"></i> Add to Cart
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

<!-- Modal for WG 701 BLK -->
<div class="modal fade" id="wg701Modal" tabindex="-1" role="dialog" aria-labelledby="wg701ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #1e1e2f; color: white; border: 1px solid #444;">
      
      <div class="modal-header border-0">
        <h5 class="modal-title font-weight-bold" id="wg701ModalLabel">WG 701 BLK</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body row no-gutters">
        <!-- Left: Carousel -->
        <div class="col-md-6 pr-3">
          <div id="wgCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner rounded">
              <div class="carousel-item active">
                <!-- Replace with actual video if available -->
                <video class="d-block w-100 rounded" style="height: 300px; object-fit: cover;" controls>
                    <source src="WG 701 BLK.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
              </div>
              <div class="carousel-item">
                <img src="WG 701 BLK Side View.png" class="d-block w-100 rounded" alt="WG 701 BLK" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="WG 701 BLK Side View1.png" class="d-block w-100 rounded" alt="WG 701 BLK" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="WG 701 BLK Side View2.png" class="d-block w-100 rounded" alt="WG 701 BLK" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="WG 701 BLK Side View3.png" class="d-block w-100 rounded" alt="WG 701 BLK" style="height: 300px; object-fit: cover;">
              </div>
            </div>
            <a class="carousel-control-prev custom-carousel-arrow" href="#wgCarousel" role="button" data-slide="prev">
              <span class="fa fa-chevron-left text-white"></span>
            </a>
            <a class="carousel-control-next custom-carousel-arrow" href="#wgCarousel" role="button" data-slide="next">
              <span class="fa fa-chevron-right text-white"></span>
            </a>
          </div>
        </div>

        <!-- Right: Product Info -->
        <div class="col-md-6 pl-3 d-flex flex-column justify-content-between">
          <div>
            <h4 class="text-success font-weight-bold mb-3">Price: <?= $products['WG 701 BLK']['price'] ?>$</h4>
            <p><i class="fa fa-cogs text-warning mr-1"></i><strong>Mode:</strong> Revolver</p>
            <p><i class="fa fa-shopping-cart text-info mr-1"></i><strong>Sold:</strong> <?= $products['WG 701 BLK']['sold'] ?></p>
            <p><i class="fa fa-star text-success mr-1"></i><strong>Rating:</strong> <?= $products['WG 701 BLK']['rating'] ?> ★★★★★</p>

            <hr style="border-color: #444;">

            <h6 class="font-weight-bold">Description</h6>
            <p class="small">
              The WG 701 BLK is a powerful CO2 revolver, designed for high durability and reliable performance. Its heavy-weight design ensures realism in every shot.
            </p>

            <h6 class="font-weight-bold">Specifications</h6>
            <ul class="small">
              <li>Type: CO2 Revolver</li>
              <li>Material: Full Metal Body</li>
              <li>Color: Black</li>
              <li>Size: Full-size</li>
              <li>Magazine Capacity: 6 shells</li>
              <li>FPS: ~400-450</li>
            </ul>
          </div>

          <!-- Buttons -->
          <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success d-flex align-items-center justify-content-center w-50 mr-2 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              onclick="confirmPurchase('WG 701 BLK', <?= $products['WG 701 BLK']['price'] ?>, 'WG 701 BLK.jpg'); modifyStock('WG 701 BLK', -1)">
              <i class="fa fa-credit-card mr-2"></i> Buy Now
            </button>
            <button class="btn btn-outline-light add-to-cart btn-sm d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              data-name="WG 701 BLK"
              data-price="<?= $products['WG 701 BLK']['price'] ?>"
              data-image="WG 701 BLK.jpg"
              onclick="addDBuy('WG 701 BLK', 1, <?= $products['WG 701 BLK']['price'] ?>); alert('Added to cart')">
              <i class="fa fa-shopping-cart mr-2"></i> Add to Cart
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- Modal for KJW KP-06 HICAPA -->
<div class="modal fade" id="kjwKP06Modal" tabindex="-1" role="dialog" aria-labelledby="kjwKP06ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #1e1e2f; color: white; border: 1px solid #444;">

      <div class="modal-header border-0">
        <h5 class="modal-title font-weight-bold" id="kjwKP06ModalLabel">KJW KP-06 HICAPA</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body row no-gutters">
        <!-- Left: Carousel -->
        <div class="col-md-6 pr-3">
          <div id="kp06Carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner rounded">
              <div class="carousel-item active">
                <video class="d-block w-100 rounded" style="height: 300px; object-fit: cover;" controls>
                    <source src="KJW KP-06 HICAPA.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
              </div>
              <div class="carousel-item">
                <img src="KJW KP-06 HICAPA Side View.png" class="d-block w-100 rounded" alt="KJW KP-06" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="KJW KP-06 HICAPA Side View1.png" class="d-block w-100 rounded" alt="KJW KP-06" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="KJW KP-06 HICAPA Side View2.png" class="d-block w-100 rounded" alt="KJW KP-06" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="KJW KP-06 HICAPA Side View3.png" class="d-block w-100 rounded" alt="KJW KP-06" style="height: 300px; object-fit: cover;">
              </div>
            </div>
            <a class="carousel-control-prev custom-carousel-arrow" href="#kp06Carousel" role="button" data-slide="prev">
              <span class="fa fa-chevron-left text-white"></span>
            </a>
            <a class="carousel-control-next custom-carousel-arrow" href="#kp06Carousel" role="button" data-slide="next">
              <span class="fa fa-chevron-right text-white"></span>
            </a>
          </div>
        </div>

        <!-- Right: Product Info -->
        <div class="col-md-6 pl-3 d-flex flex-column justify-content-between">
          <div>
            <h4 class="text-success font-weight-bold mb-3">Price: <?= $products['KJW KP-06 HICAPA']['price'] ?>$</h4>
            <p><i class="fa fa-cogs text-warning mr-1"></i><strong>Mode:</strong> Semi-Auto</p>
            <p><i class="fa fa-shopping-cart text-info mr-1"></i><strong>Sold:</strong> <?= $products['KJW KP-06 HICAPA']['sold'] ?></p>
            <p><i class="fa fa-star text-success mr-1"></i><strong>Rating:</strong> <?= $products['KJW KP-06 HICAPA']['rating'] ?> ★★★★★</p>

            <hr style="border-color: #444;">

            <h6 class="font-weight-bold">Description</h6>
            <p class="small">
              The KJW KP-06 HICAPA is a high-performance gas blowback pistol, designed for speed and precision. Its extended mag well and adjustable sights make it a top pick for competitive airsoft shooters.
            </p>

            <h6 class="font-weight-bold">Specifications</h6>
            <ul class="small">
              <li>Type: Gas Blowback</li>
              <li>Material: Metal Slide, Polymer Frame</li>
              <li>Color: Black</li>
              <li>Size: Full-size</li>
              <li>Magazine Capacity: 31 rounds</li>
              <li>FPS: ~350-370</li>
            </ul>
          </div>

          <!-- Buttons -->
          <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success d-flex align-items-center justify-content-center w-50 mr-2 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              onclick="confirmPurchase('KJW KP-06 HICAPA', <?= $products['KJW KP-06 HICAPA']['price'] ?>, 'KJW KP-06 HICAPA.jpg'); modifyStock('KJW KP-06 HICAPA', -1)">
              <i class="fa fa-credit-card mr-2"></i> Buy Now
            </button>

            <button class="btn btn-outline-warning d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              onclick="addToWishlist('KJW KP-06 HICAPA', <?= $products['KJW KP-06 HICAPA']['price'] ?>, 'KJW KP-06 HICAPA.jpg')">
              <i class="fa fa-heart mr-2"></i> Add to Wishlist
            </button>

            <button class="btn btn-outline-light add-to-cart btn-sm d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              data-name="KJW KP-06 HICAPA"
              data-price="<?= $products['KJW KP-06 HICAPA']['price'] ?>"
              data-image="KJW KP-06 HICAPA.webp"
              onclick="addDBuy('KJW KP-06 HICAPA', 1, <?= $products['KJW KP-06 HICAPA']['price'] ?>); alert('Added to cart')">
              <i class="fa fa-shopping-cart mr-2"></i> Add to Cart
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="vsr10WoodModal" tabindex="-1" role="dialog" aria-labelledby="vsr10WoodModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #1e1e2f; color: white; border: 1px solid #444;">

      <div class="modal-header border-0">
        <h5 class="modal-title font-weight-bold" id="vsr10WoodModalLabel">D BELL VSR-10 Wood Design</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body row no-gutters">
        <!-- Left: Carousel -->
        <div class="col-md-6 pr-3">
          <div id="vsr10Carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner rounded">
              <div class="carousel-item active">
                    <video class="d-block w-100 rounded" style="height: 300px; object-fit: cover;" controls>
                    <source src="D BELL VSR 10 WOOD DESIGN.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
              </div>              
              <div class="carousel-item">
                <img src="D BELL VSR 10 WOOD DESIGN Side View.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="D BELL VSR 10 WOOD DESIGN Side View1.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="D BELL VSR 10 WOOD DESIGN Side View2.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="D BELL VSR 10 WOOD DESIGN Side View3.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
            </div>
            <a class="carousel-control-prev custom-carousel-arrow" href="#vsr10Carousel" role="button" data-slide="prev">
              <span class="fa fa-chevron-left text-white"></span>
            </a>
            <a class="carousel-control-next custom-carousel-arrow" href="#vsr10Carousel" role="button" data-slide="next">
              <span class="fa fa-chevron-right text-white"></span>
            </a>
          </div>
        </div>

        <!-- Right: Product Info -->
        <div class="col-md-6 pl-3 d-flex flex-column justify-content-between">
          <div>
            <h4 class="text-success font-weight-bold mb-3">Price: <?= $products['D BELL VSR 10 WOOD DESIGN']['price'] ?>$</h4>
            <p><i class="fa fa-cogs text-warning mr-1"></i><strong>Mode:</strong> Bolt Action</p>
            <p><i class="fa fa-shopping-cart text-info mr-1"></i><strong>Sold:</strong> <?= $products['D BELL VSR 10 WOOD DESIGN']['sold'] ?></p>
            <p><i class="fa fa-star text-success mr-1"></i><strong>Rating:</strong> <?= $products['D BELL VSR 10 WOOD DESIGN']['rating'] ?> ★★★★★</p>

            <hr style="border-color: #444;">

            <h6 class="font-weight-bold">Description</h6>
            <p class="small">
              The D BELL VSR-10 Wood Design is a reliable bolt-action sniper rifle, known for its classic wood finish and consistent performance. Perfect for long-range engagements, this airsoft replica offers impressive accuracy and build quality, making it a great choice for both beginners and seasoned snipers.
            </p>

            <h6 class="font-weight-bold">Specifications</h6>
            <ul class="small">
              <li>Type: Spring Bolt Action</li>
              <li>Material: Wood-style Polymer Stock, Metal Barrel</li>
              <li>Color: Wood</li>
              <li>Size: Full-size</li>
              <li>Magazine Capacity: 30 rounds</li>
              <li>FPS: ~400-420</li>
            </ul>
          </div>

          <!-- Buttons -->
          <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success d-flex align-items-center justify-content-center w-50 mr-2 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              onclick="confirmPurchase('D BELL VSR 10 WOOD DESIGN', <?= $products['D BELL VSR 10 WOOD DESIGN']['price'] ?>, 'D BELL VSR 10 WOOD DESIGN.jpg'); modifyStock('D BELL VSR 10 WOOD DESIGN', -1)">
              <i class="fa fa-credit-card mr-2"></i> Buy Now
            </button>

            <button class="btn btn-outline-warning d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              onclick="addToWishlist('D BELL VSR 10 WOOD DESIGN', <?= $products['D BELL VSR 10 WOOD DESIGN']['price'] ?>, 'D BELL VSR 10 WOOD DESIGN.jpg')">
              <i class="fa fa-heart mr-2"></i> Add to Wishlist
            </button>

            <button class="btn btn-outline-light add-to-cart btn-sm d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              data-name="D BELL VSR 10 WOOD DESIGN"
              data-price="<?= $products['D BELL VSR 10 WOOD DESIGN']['price'] ?>"
              data-image="D BELL VSR 10 WOOD DESIGN.png"
              onclick="addDBuy('D BELL VSR 10 WOOD DESIGN', 1, <?= $products['D BELL VSR 10 WOOD DESIGN']['price'] ?>); alert('Added to cart')">
              <i class="fa fa-shopping-cart mr-2"></i> Add to Cart
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="vsr10BlackModal" tabindex="-1" role="dialog" aria-labelledby="vsr10BlackModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #1e1e2f; color: white; border: 1px solid #444;">

      <div class="modal-header border-0">
        <h5 class="modal-title font-weight-bold" id="vsr10BlackModalLabel">DBELL VSR10 BLACK</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body row no-gutters">
        <!-- Left: Carousel -->
        <div class="col-md-6 pr-3">
          <div id="vsr10BlackCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner rounded">
              <div class="carousel-item active">
                    <video class="d-block w-100 rounded" style="height: 300px; object-fit: cover;" controls>
                    <source src="DBELL VSR10 BLACK.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
              </div>              
              <div class="carousel-item">
                <img src="DBELL VSR10 BLACK Side View.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="DBELL VSR10 BLACK Side View1.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="DBELL VSR10 BLACK Side View2.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="DBELL VSR10 BLACK Side View3.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
            </div>
            <a class="carousel-control-prev custom-carousel-arrow" href="#vsr10BlackCarousel" role="button" data-slide="prev">
              <span class="fa fa-chevron-left text-white"></span>
            </a>
            <a class="carousel-control-next custom-carousel-arrow" href="#vsr10BlackCarousel" role="button" data-slide="next">
              <span class="fa fa-chevron-right text-white"></span>
            </a>
          </div>
        </div>

        <!-- Right: Product Info -->
        <div class="col-md-6 pl-3 d-flex flex-column justify-content-between">
          <div>
            <h4 class="text-success font-weight-bold mb-3">Price: <?= $products['DBELL VSR10 BLACK']['price'] ?>$</h4>
            <p><i class="fa fa-cogs text-warning mr-1"></i><strong>Mode:</strong> Bolt Action</p>
            <p><i class="fa fa-shopping-cart text-info mr-1"></i><strong>Sold:</strong> <?= $products['DBELL VSR10 BLACK']['sold'] ?></p>
            <p><i class="fa fa-star text-success mr-1"></i><strong>Rating:</strong> <?= $products['DBELL VSR10 BLACK']['rating'] ?> ★★★★★</p>

            <hr style="border-color: #444;">

            <h6 class="font-weight-bold">Description</h6>
            <p class="small">
              The DBELL VSR10 BLACK is a modernized bolt-action sniper rifle replica, known for its sleek matte-black finish and robust internal components. Engineered for precision and reliability, it’s perfect for players looking for a tactical edge in mid-to-long-range airsoft battles.
            </p>

            <h6 class="font-weight-bold">Specifications</h6>
            <ul class="small">
              <li>Type: Spring Bolt Action</li>
              <li>Material: Metal Barrel, Reinforced Polymer Body</li>
              <li>Color: Matte Black</li>
              <li>Size: Full-size</li>
              <li>Magazine Capacity: 30 rounds</li>
              <li>FPS: ~400-420</li>
            </ul>
          </div>

          <!-- Buttons -->
          <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success d-flex align-items-center justify-content-center w-50 mr-2 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              onclick="confirmPurchase('DBELL VSR10 BLACK', <?= $products['DBELL VSR10 BLACK']['price'] ?>, 'DBELL VSR10 BLACK.jpg'); modifyStock('DBELL VSR10 BLACK', -1)">
              <i class="fa fa-credit-card mr-2"></i> Buy Now
            </button>

            <button class="btn btn-outline-warning d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              onclick="addToWishlist('DBELL VSR10 BLACK', <?= $products['DBELL VSR10 BLACK']['price'] ?>, 'DBELL VSR10 BLACK.jpg')">
              <i class="fa fa-heart mr-2"></i> Add to Wishlist
            </button>

            <button class="btn btn-outline-light add-to-cart btn-sm d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              data-name="DBELL VSR10 BLACK"
              data-price="<?= $products['DBELL VSR10 BLACK']['price'] ?>"
              data-image="DBELL VSR10 BLACK.png"
              onclick="addDBuy('DBELL VSR10 BLACK', 1, <?= $products['DBELL VSR10 BLACK']['price'] ?>); alert('Added to cart')">
              <i class="fa fa-shopping-cart mr-2"></i> Add to Cart
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="mod24Modal" tabindex="-1" role="dialog" aria-labelledby="mod24ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #1e1e2f; color: white; border: 1px solid #444;">

      <div class="modal-header border-0">
        <h5 class="modal-title font-weight-bold" id="mod24ModalLabel">MOD 24 SSG GSPEC</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body row no-gutters">
        <!-- Left: Carousel -->
        <div class="col-md-6 pr-3">
          <div id="mod24Carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner rounded">
              <div class="carousel-item active">
                    <video class="d-block w-100 rounded" style="height: 300px; object-fit: cover;" controls>
                    <source src="MOD 24 SSG GSPEC.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
              </div>              
              <div class="carousel-item">
                <img src="MOD 24 SSG GSPEC Side View.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="MOD 24 SSG GSPEC Side View1.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="MOD 24 SSG GSPEC Side View2.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="MOD 24 SSG GSPEC Side View3.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
            </div>
            <a class="carousel-control-prev custom-carousel-arrow" href="#mod24Carousel" role="button" data-slide="prev">
              <span class="fa fa-chevron-left text-white"></span>
            </a>
            <a class="carousel-control-next custom-carousel-arrow" href="#mod24Carousel" role="button" data-slide="next">
              <span class="fa fa-chevron-right text-white"></span>
            </a>
          </div>
        </div>

        <!-- Right: Product Info -->
        <div class="col-md-6 pl-3 d-flex flex-column justify-content-between">
          <div>
            <h4 class="text-success font-weight-bold mb-3">Price: <?= $products['MOD 24 SSG GSPEC']['price'] ?>$</h4>
            <p><i class="fa fa-cogs text-warning mr-1"></i><strong>Mode:</strong> Bolt Action</p>
            <p><i class="fa fa-shopping-cart text-info mr-1"></i><strong>Sold:</strong> <?= $products['MOD 24 SSG GSPEC']['sold'] ?></p>
            <p><i class="fa fa-star text-success mr-1"></i><strong>Rating:</strong> <?= $products['MOD 24 SSG GSPEC']['rating'] ?> ★★★★★</p>

            <hr style="border-color: #444;">

            <h6 class="font-weight-bold">Description</h6>
            <p class="small">
              The MOD 24 SSG GSPEC is a top-tier airsoft sniper rifle known for its robust construction, precision shooting, and modular design. With a fully upgradable system and high FPS out of the box, it's a favorite among experienced airsoft marksmen looking for competitive accuracy.
            </p>

            <h6 class="font-weight-bold">Specifications</h6>
            <ul class="small">
              <li>Type: Spring Bolt Action</li>
              <li>Material: CNC Aluminum & Polymer</li>
              <li>Color: Tactical Black</li>
              <li>Size: Full-size Rifle</li>
              <li>Magazine Capacity: 30 rounds</li>
              <li>FPS: ~440-460</li>
            </ul>
          </div>

          <!-- Buttons -->
          <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success d-flex align-items-center justify-content-center w-50 mr-2 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              onclick="confirmPurchase('MOD 24 SSG GSPEC', <?= $products['MOD 24 SSG GSPEC']['price'] ?>, 'MOD 24 SSG GSPEC.jpg'); modifyStock('MOD 24 SSG GSPEC', -1)">
              <i class="fa fa-credit-card mr-2"></i> Buy Now
            </button>

            <button class="btn btn-outline-warning d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              onclick="addToWishlist('MOD 24 SSG GSPEC', <?= $products['MOD 24 SSG GSPEC']['price'] ?>, 'MOD 24 SSG GSPEC.jpg')">
              <i class="fa fa-heart mr-2"></i> Add to Wishlist
            </button>

            <button class="btn btn-outline-light add-to-cart btn-sm d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              data-name="MOD 24 SSG GSPEC"
              data-price="<?= $products['MOD 24 SSG GSPEC']['price'] ?>"
              data-image="MOD 24 SSG GSPEC.jpg"
              onclick="addDBuy('MOD 24 SSG GSPEC', 1, <?= $products['MOD 24 SSG GSPEC']['price'] ?>); alert('Added to cart')">
              <i class="fa fa-shopping-cart mr-2"></i> Add to Cart
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="lt28abModal" tabindex="-1" role="dialog" aria-labelledby="lt28abModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #1e1e2f; color: white; border: 1px solid #444;">

      <div class="modal-header border-0">
        <h5 class="modal-title font-weight-bold" id="lt28abModalLabel">LT-28AB Lancer Tactical M24</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body row no-gutters">
        <!-- Left: Carousel -->
        <div class="col-md-6 pr-3">
          <div id="lt28abCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner rounded">
              <div class="carousel-item active">
                    <video class="d-block w-100 rounded" style="height: 300px; object-fit: cover;" controls>
                    <source src="LT-28AB Lancer Tactical M24.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
              </div>              
              <div class="carousel-item">
                <img src="LT-28AB Lancer Tactical M24 Side View.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="LT-28AB Lancer Tactical M24 Side View1.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="LT-28AB Lancer Tactical M24 Side View2.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="LT-28AB Lancer Tactical M24 Side View3.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
            </div>
            <a class="carousel-control-prev custom-carousel-arrow" href="#lt28abCarousel" role="button" data-slide="prev">
              <span class="fa fa-chevron-left text-white"></span>
            </a>
            <a class="carousel-control-next custom-carousel-arrow" href="#lt28abCarousel" role="button" data-slide="next">
              <span class="fa fa-chevron-right text-white"></span>
            </a>
          </div>
        </div>

        <!-- Right: Product Info -->
        <div class="col-md-6 pl-3 d-flex flex-column justify-content-between">
          <div>
            <h4 class="text-success font-weight-bold mb-3">Price: <?= $products['LT-28AB LANCER TACTICAL M24']['price'] ?>$</h4>
            <p><i class="fa fa-cogs text-warning mr-1"></i><strong>Mode:</strong> Bolt Action</p>
            <p><i class="fa fa-shopping-cart text-info mr-1"></i><strong>Sold:</strong> <?= $products['LT-28AB LANCER TACTICAL M24']['sold'] ?></p>
            <p><i class="fa fa-star text-success mr-1"></i><strong>Rating:</strong> <?= $products['LT-28AB LANCER TACTICAL M24']['rating'] ?> ★★★★★</p>

            <hr style="border-color: #444;">

            <h6 class="font-weight-bold">Description</h6>
            <p class="small">
              The LT-28AB Lancer Tactical M24 is a durable and accurate bolt-action sniper rifle, perfect for long-range engagements. Featuring a solid polymer body, full-length barrel, and adjustable hop-up, it’s ideal for airsoft players who demand precision and power from their sniper platform.
            </p>

            <h6 class="font-weight-bold">Specifications</h6>
            <ul class="small">
              <li>Type: Bolt Action (Spring)</li>
              <li>Material: Polymer Body / Metal Barrel</li>
              <li>Color: Matte Black</li>
              <li>Size: Full-size Sniper Rifle</li>
              <li>Magazine Capacity: 20 rounds</li>
              <li>FPS: ~430-450</li>
            </ul>
          </div>

          <!-- Buttons -->
          <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success d-flex align-items-center justify-content-center w-50 mr-2 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              onclick="confirmPurchase('LT-28AB LANCER TACTICAL M24', <?= $products['LT-28AB LANCER TACTICAL M24']['price'] ?>, 'LT-28AB LANCER TACTICAL M24.jpg'); modifyStock('LT-28AB LANCER TACTICAL M24', -1)">
              <i class="fa fa-credit-card mr-2"></i> Buy Now
            </button>

            <button class="btn btn-outline-warning d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              onclick="addToWishlist('LT-28AB LANCER TACTICAL M24', <?= $products['LT-28AB LANCER TACTICAL M24']['price'] ?>, 'LT-28AB LANCER TACTICAL M24.jpg')">
              <i class="fa fa-heart mr-2"></i> Add to Wishlist
            </button>

            <button class="btn btn-outline-light add-to-cart btn-sm d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              data-name="LT-28AB LANCER TACTICAL M24"
              data-price="<?= $products['LT-28AB LANCER TACTICAL M24']['price'] ?>"
              data-image="LT-28AB LANCER TACTICAL M24.jpg"
              onclick="addDBuy('LT-28AB LANCER TACTICAL M24', 1, <?= $products['LT-28AB LANCER TACTICAL M24']['price'] ?>); alert('Added to cart')">
              <i class="fa fa-shopping-cart mr-2"></i> Add to Cart
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ec501cModal" tabindex="-1" role="dialog" aria-labelledby="ec501cModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #1e1e2f; color: white; border: 1px solid #444;">
      <div class="modal-header border-0">
        <h5 class="modal-title font-weight-bold" id="ec501cModalLabel">EC 501C L96 BLACK</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body row no-gutters">
        <div class="col-md-6 pr-3">
          <div id="ec501cCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner rounded">
              <div class="carousel-item active">
                    <video class="d-block w-100 rounded" style="height: 300px; object-fit: cover;" controls>
                    <source src="EC 501C L96 BLACK.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
              </div>              
              <div class="carousel-item">
                <img src="EC 501C L96 BLACK Side View.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="EC 501C L96 BLACK Side View1.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="EC 501C L96 BLACK Side View2.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="EC 501C L96 BLACK Side View3.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
            </div>
            <a class="carousel-control-prev custom-carousel-arrow" href="#ec501cCarousel" role="button" data-slide="prev">
            <span class="fa fa-chevron-left text-white"></span>
            </a>
            <a class="carousel-control-next custom-carousel-arrow" href="#ec501cCarousel" role="button" data-slide="next">
            <span class="fa fa-chevron-right text-white"></span>
            </a>
          </div>
        </div>

        <!-- Right side: Product info -->
        <div class="col-md-6 pl-3 d-flex flex-column justify-content-between">
          <div>
            <h4 class="text-success font-weight-bold mb-3">Price: <?= $products['EC 501C L96 BLACK']['price'] ?>$</h4>
            <p><i class="fa fa-cogs text-warning mr-1"></i><strong>Mode:</strong> Bolt Action</p>
            <p><i class="fa fa-shopping-cart text-info mr-1"></i><strong>Sold:</strong> <?= $products['EC 501C L96 BLACK']['sold'] ?></p>
            <p><i class="fa fa-star text-success mr-1"></i><strong>Rating:</strong> <?= $products['EC 501C L96 BLACK']['rating'] ?> ★★★★★</p>

            <hr style="border-color: #444;">

            <h6 class="font-weight-bold">Description</h6>
            <p class="small">
              The EC 501C L96 BLACK is modeled after the iconic L96 sniper platform, offering high FPS and long-range precision. It features a durable polymer body with a full-metal bolt assembly, and an ergonomic stock design to improve shooter stability in the field. Ideal for sharpshooters looking for power and performance.
            </p>

            <h6 class="font-weight-bold">Specifications</h6>
            <ul class="small">
              <li>Type: Spring Bolt Action</li>
              <li>Material: Polymer Body / Metal Internals</li>
              <li>Color: Tactical Black</li>
              <li>Size: Full-size Sniper Rifle</li>
              <li>Magazine Capacity: 30 rounds</li>
              <li>FPS: ~430-460</li>
            </ul>
          </div>

          <!-- Purchase buttons -->
          <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success d-flex align-items-center justify-content-center w-50 mr-2 py-2"
              style="font-size: 0.8em;"
              onclick="confirmPurchase('EC 501C L96 BLACK', <?= $products['EC 501C L96 BLACK']['price'] ?>, 'EC 501C L96 BLACK.jpg'); modifyStock('EC 501C L96 BLACK', -1)">
              <i class="fa fa-credit-card mr-2"></i> Buy Now
            </button>

            <button class="btn btn-outline-warning d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em;"
              onclick="addToWishlist('EC 501C L96 BLACK', <?= $products['EC 501C L96 BLACK']['price'] ?>, 'EC 501C L96 BLACK.jpg')">
              <i class="fa fa-heart mr-2"></i> Add to Wishlist
            </button>

            <button class="btn btn-outline-light add-to-cart btn-sm d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em;"
              data-name="EC 501C L96 BLACK"
              data-price="<?= $products['EC 501C L96 BLACK']['price'] ?>"
              data-image="EC 501C L96 BLACK.jpg"
              onclick="addDBuy('EC 501C L96 BLACK', 1, <?= $products['EC 501C L96 BLACK']['price'] ?>); alert('Added to cart')">
              <i class="fa fa-shopping-cart mr-2"></i> Add to Cart
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- HK416 Modal -->
<div class="modal fade" id="hk416Modal" tabindex="-1" role="dialog" aria-labelledby="hk416ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #1e1e2f; color: white; border: 1px solid #444;">
      <div class="modal-header border-0">
        <h5 class="modal-title font-weight-bold" id="hk416ModalLabel">Heckler & Koch - HK416</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body row no-gutters">
        <!-- Left: Carousel -->
        <div class="col-md-6 pr-3">
          <div id="hk416Carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner rounded">
              <div class="carousel-item active">
                    <video class="d-block w-100 rounded" style="height: 300px; object-fit: cover;" controls>
                    <source src="Heckler & Koch - HK416.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
              </div>              
              <div class="carousel-item">
                <img src="Heckler & Koch - HK416 Side View.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="Heckler & Koch - HK416 Side View1.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="Heckler & Koch - HK416 Side View2.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="Heckler & Koch - HK416 Side View3.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
            </div>
            <a class="carousel-control-prev custom-carousel-arrow" href="#hk416Carousel" role="button" data-slide="prev">
              <span class="fa fa-chevron-left text-white"></span>
            </a>
            <a class="carousel-control-next custom-carousel-arrow" href="#hk416Carousel" role="button" data-slide="next">
              <span class="fa fa-chevron-right text-white"></span>
            </a>
          </div>
        </div>

        <!-- Right: Info -->
        <div class="col-md-6 pl-3 d-flex flex-column justify-content-between">
          <div>
            <h4 class="text-success font-weight-bold mb-3">Price: <?= $products['Heckler & Koch - HK416']['price'] ?>$</h4>
            <p><i class="fa fa-cogs text-warning mr-1"></i><strong>Mode:</strong> Select Fire (Semi/Auto)</p>
            <p><i class="fa fa-shopping-cart text-info mr-1"></i><strong>Sold:</strong> <?= $products['Heckler & Koch - HK416']['sold'] ?></p>
            <p><i class="fa fa-star text-success mr-1"></i><strong>Rating:</strong> <?= $products['Heckler & Koch - HK416']['rating'] ?> ★★★★★</p>

            <hr style="border-color: #444;">

            <h6 class="font-weight-bold">Description</h6>
            <p class="small">
              The Heckler & Koch HK416 is a modern assault rifle chambered for 5.56mm NATO, known for its reliability and elite military usage. Modeled after the AR-15 platform with enhancements like a gas-piston system and robust internals, it’s built for performance and durability on the field.
            </p>

            <h6 class="font-weight-bold">Specifications</h6>
            <ul class="small">
              <li>Type: AEG (Automatic Electric Gun)</li>
              <li>Material: Metal Upper & Lower Receiver / Polymer Furniture</li>
              <li>Color: Tactical Black</li>
              <li>Size: Full-size Rifle</li>
              <li>Magazine Capacity: 300 rounds (hi-cap)</li>
              <li>FPS: ~380-410</li>
              <li>Fire Modes: Safe, Semi, Full-Auto</li>
            </ul>
          </div>

          <!-- Buttons -->
          <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success d-flex align-items-center justify-content-center w-50 mr-2 py-2"
              style="font-size: 0.8em;"
              onclick="confirmPurchase('Heckler & Koch - HK416', <?= $products['Heckler & Koch - HK416']['price'] ?>, 'Heckler & Koch - HK416.jpg'); modifyStock('Heckler & Koch - HK416', -1)">
              <i class="fa fa-credit-card mr-2"></i> Buy Now
            </button>

            <button class="btn btn-outline-warning d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em;"
              onclick="addToWishlist('Heckler & Koch - HK416', <?= $products['Heckler & Koch - HK416']['price'] ?>, 'Heckler & Koch - HK416.jpg')">
              <i class="fa fa-heart mr-2"></i> Add to Wishlist
            </button>

            <button class="btn btn-outline-light add-to-cart btn-sm d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em;"
              data-name="Heckler & Koch - HK416"
              data-price="<?= $products['Heckler & Koch - HK416']['price'] ?>"
              data-image="Heckler & Koch - HK416.jpg"
              onclick="addDBuy('Heckler & Koch - HK416', 1, <?= $products['Heckler & Koch - HK416']['price'] ?>); alert('Added to cart')">
              <i class="fa fa-shopping-cart mr-2"></i> Add to Cart
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- HK M110A1 Modal -->
<div class="modal fade" id="hkM110A1Modal" tabindex="-1" role="dialog" aria-labelledby="hkM110A1ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #1e1e2f; color: white; border: 1px solid #444;">
      <div class="modal-header border-0">
        <h5 class="modal-title font-weight-bold" id="hkM110A1ModalLabel">HK M110A1</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body row no-gutters">
        <!-- Left: Carousel -->
        <div class="col-md-6 pr-3">
          <div id="hkM110A1Carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner rounded">
              <div class="carousel-item active">
                    <video class="d-block w-100 rounded" style="height: 300px; object-fit: cover;" controls>
                    <source src="HK M110A1.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
              </div>              
              <div class="carousel-item">
                <img src="HK M110A1 Side View.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="HK M110A1 Side View1.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="HK M110A1 Side View2.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="HK M110A1 Side View3.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
            </div>
            <a class="carousel-control-prev custom-carousel-arrow" href="#hkM110A1Carousel" role="button" data-slide="prev">
              <span class="fa fa-chevron-left text-white"></span>
            </a>
            <a class="carousel-control-next custom-carousel-arrow" href="#hkM110A1Carousel" role="button" data-slide="next">
              <span class="fa fa-chevron-right text-white"></span>
            </a>
          </div>
        </div>

        <!-- Right: Info -->
        <div class="col-md-6 pl-3 d-flex flex-column justify-content-between">
          <div>
            <h4 class="text-success font-weight-bold mb-3">Price: <?= $products['HK M110A1']['price'] ?>$</h4>
            <p><i class="fa fa-cogs text-warning mr-1"></i><strong>Mode:</strong> Semi-Auto</p>
            <p><i class="fa fa-shopping-cart text-info mr-1"></i><strong>Sold:</strong> <?= $products['HK M110A1']['sold'] ?></p>
            <p><i class="fa fa-star text-success mr-1"></i><strong>Rating:</strong> <?= $products['HK M110A1']['rating'] ?> ★★★★★</p>

            <hr style="border-color: #444;">

            <h6 class="font-weight-bold">Description</h6>
            <p class="small">
              The HK M110A1 is a precision semi-automatic sniper rifle designed for long-range engagements. Featuring a highly accurate gas-operated system and a modular design, it's ideal for tactical shooters who need both accuracy and power in the field.
            </p>

            <h6 class="font-weight-bold">Specifications</h6>
            <ul class="small">
              <li>Type: Semi-Automatic Sniper Rifle</li>
              <li>Material: Full Metal Construction</li>
              <li>Color: Desert Tan</li>
              <li>Size: Full-size Rifle</li>
              <li>Magazine Capacity: 20 rounds</li>
              <li>FPS: ~400-430</li>
            </ul>
          </div>

          <!-- Buttons -->
          <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success d-flex align-items-center justify-content-center w-50 mr-2 py-2"
              style="font-size: 0.8em;"
              onclick="confirmPurchase('HK M110A1', <?= $products['HK M110A1']['price'] ?>, 'HK M110A1.jpg'); modifyStock('HK M110A1', -1)">
              <i class="fa fa-credit-card mr-2"></i> Buy Now
            </button>

            <button class="btn btn-outline-warning d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em;"
              onclick="addToWishlist('HK M110A1', <?= $products['HK M110A1']['price'] ?>, 'HK M110A1.jpg')">
              <i class="fa fa-heart mr-2"></i> Add to Wishlist
            </button>

            <button class="btn btn-outline-light add-to-cart btn-sm d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em;"
              data-name="HK M110A1"
              data-price="<?= $products['HK M110A1']['price'] ?>"
              data-image="HK M110A1.jpg"
              onclick="addDBuy('HK M110A1', 1, <?= $products['HK M110A1']['price'] ?>); alert('Added to cart')">
              <i class="fa fa-shopping-cart mr-2"></i> Add to Cart
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- AK74 SERIES Modal -->
<div class="modal fade" id="ak74SeriesModal" tabindex="-1" role="dialog" aria-labelledby="ak74SeriesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #1e1e2f; color: white; border: 1px solid #444;">
      <div class="modal-header border-0">
        <h5 class="modal-title font-weight-bold" id="ak74SeriesModalLabel">AK74 SERIES</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body row no-gutters">
        <!-- Left: Carousel -->
        <div class="col-md-6 pr-3">
          <div id="ak74SeriesCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner rounded">
              <div class="carousel-item active">
                    <video class="d-block w-100 rounded" style="height: 300px; object-fit: cover;" controls>
                    <source src="AK74 SERIES.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
              </div>              
              <div class="carousel-item">
                <img src="AK74 SERIES Side View.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="AK74 SERIES Side View1.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="AK74 SERIES Side View2.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="AK74 SERIES Side View3.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
            </div>
            <a class="carousel-control-prev custom-carousel-arrow" href="#ak74SeriesCarousel" role="button" data-slide="prev">
              <span class="fa fa-chevron-left text-white"></span>
            </a>
            <a class="carousel-control-next custom-carousel-arrow" href="#ak74SeriesCarousel" role="button" data-slide="next">
              <span class="fa fa-chevron-right text-white"></span>
            </a>
          </div>
        </div>

        <!-- Right: Info -->
        <div class="col-md-6 pl-3 d-flex flex-column justify-content-between">
          <div>
            <h4 class="text-success font-weight-bold mb-3">Price: <?= $products['AK74 SERIES']['price'] ?>$</h4>
            <p><i class="fa fa-cogs text-warning mr-1"></i><strong>Mode:</strong> Gas Blowback</p>
            <p><i class="fa fa-shopping-cart text-info mr-1"></i><strong>Sold:</strong> <?= $products['AK74 SERIES']['sold'] ?></p>
            <p><i class="fa fa-star text-success mr-1"></i><strong>Rating:</strong> <?= $products['AK74 SERIES']['rating'] ?> ★★★★★</p>

            <hr style="border-color: #444;">

            <h6 class="font-weight-bold">Description</h6>
            <p class="small">
              The AK74 SERIES is a powerful gas blowback rifle known for its reliability and rugged performance. The AK74 series comes with a robust metal construction and excellent recoil action, making it a favorite among enthusiasts and collectors alike.
            </p>

            <h6 class="font-weight-bold">Specifications</h6>
            <ul class="small">
              <li>Type: Gas Blowback Rifle</li>
              <li>Material: Full Metal Construction</li>
              <li>Color: Wood Finish</li>
              <li>Size: Full-size Rifle</li>
              <li>Magazine Capacity: 30 rounds</li>
              <li>FPS: ~380-400</li>
            </ul>
          </div>

          <!-- Buttons -->
          <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success d-flex align-items-center justify-content-center w-50 mr-2 py-2"
              style="font-size: 0.8em;"
              onclick="confirmPurchase('AK74 SERIES', <?= $products['AK74 SERIES']['price'] ?>, 'AK74 SERIES.jpg'); modifyStock('AK74 SERIES', -1)">
              <i class="fa fa-credit-card mr-2"></i> Buy Now
            </button>

            <button class="btn btn-outline-warning d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em;"
              onclick="addToWishlist('AK74 SERIES', <?= $products['AK74 SERIES']['price'] ?>, 'AK74 SERIES.jpg')">
              <i class="fa fa-heart mr-2"></i> Add to Wishlist
            </button>

            <button class="btn btn-outline-light add-to-cart btn-sm d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em;"
              data-name="AK74 SERIES"
              data-price="<?= $products['AK74 SERIES']['price'] ?>"
              data-image="AK74 SERIES.jpg"
              onclick="addDBuy('AK74 SERIES', 1, <?= $products['AK74 SERIES']['price'] ?>); alert('Added to cart')">
              <i class="fa fa-shopping-cart mr-2"></i> Add to Cart
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- M4A1 SERIES Modal -->
<div class="modal fade" id="m4a1SeriesModal" tabindex="-1" role="dialog" aria-labelledby="m4a1SeriesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #1e1e2f; color: white; border: 1px solid #444;">
      <div class="modal-header border-0">
        <h5 class="modal-title font-weight-bold" id="m4a1SeriesModalLabel">M4A1 SERIES</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body row no-gutters">
        <!-- Left: Carousel -->
        <div class="col-md-6 pr-3">
          <div id="m4a1SeriesCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner rounded">
              <div class="carousel-item active">
                    <video class="d-block w-100 rounded" style="height: 300px; object-fit: cover;" controls>
                    <source src="M4A1 SERIES.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
              </div>              
              <div class="carousel-item">
                <img src="M4A1 SERIES Side View.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="M4A1 SERIES Side View1.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="M4A1 SERIES Side View2.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="M4A1 SERIES Side View3.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
            </div>
            <a class="carousel-control-prev custom-carousel-arrow" href="#m4a1SeriesCarousel" role="button" data-slide="prev">
              <span class="fa fa-chevron-left text-white"></span>
            </a>
            <a class="carousel-control-next custom-carousel-arrow" href="#m4a1SeriesCarousel" role="button" data-slide="next">
              <span class="fa fa-chevron-right text-white"></span>
            </a>
          </div>
        </div>

        <!-- Right: Info -->
        <div class="col-md-6 pl-3 d-flex flex-column justify-content-between">
          <div>
            <h4 class="text-success font-weight-bold mb-3">Price: <?= $products['M4A1 SERIES']['price'] ?>$</h4>
            <p><i class="fa fa-cogs text-warning mr-1"></i><strong>Mode:</strong> Select Fire (Semi/Auto)</p>
            <p><i class="fa fa-shopping-cart text-info mr-1"></i><strong>Sold:</strong> <?= $products['M4A1 SERIES']['sold'] ?></p>
            <p><i class="fa fa-star text-success mr-1"></i><strong>Rating:</strong> <?= $products['M4A1 SERIES']['rating'] ?> ★★★★★</p>

            <hr style="border-color: #444;">

            <h6 class="font-weight-bold">Description</h6>
            <p class="small">
              The M4A1 SERIES is a classic choice among tactical rifles, offering versatility, modular customization, and reliable performance. Built with high-quality internals and a durable metal gearbox, it’s ideal for both new and experienced airsoft players.
            </p>

            <h6 class="font-weight-bold">Specifications</h6>
            <ul class="small">
              <li>Type: AEG (Automatic Electric Gun)</li>
              <li>Material: Metal/Polymer Hybrid</li>
              <li>Color: Matte Black</li>
              <li>Size: Full-size Carbine</li>
              <li>Magazine Capacity: 300 rounds (Hi-Cap)</li>
              <li>FPS: ~380-410</li>
            </ul>
          </div>

          <!-- Buttons -->
          <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success d-flex align-items-center justify-content-center w-50 mr-2 py-2"
              style="font-size: 0.8em;"
              onclick="confirmPurchase('M4A1 SERIES', <?= $products['M4A1 SERIES']['price'] ?>, 'M4A1 SERIES.jpg'); modifyStock('M4A1 SERIES', -1)">
              <i class="fa fa-credit-card mr-2"></i> Buy Now
            </button>

            <button class="btn btn-outline-warning d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em;"
              onclick="addToWishlist('M4A1 SERIES', <?= $products['M4A1 SERIES']['price'] ?>, 'M4A1 SERIES.jpg')">
              <i class="fa fa-heart mr-2"></i> Add to Wishlist
            </button>

            <button class="btn btn-outline-light add-to-cart btn-sm d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em;"
              data-name="M4A1 SERIES"
              data-price="<?= $products['M4A1 SERIES']['price'] ?>"
              data-image="M4A1 SERIES.jpg"
              onclick="addDBuy('M4A1 SERIES', 1, <?= $products['M4A1 SERIES']['price'] ?>); alert('Added to cart')">
              <i class="fa fa-shopping-cart mr-2"></i> Add to Cart
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- FN SCAR Modal -->
<div class="modal fade" id="fnScarModal" tabindex="-1" role="dialog" aria-labelledby="fnScarModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #1e1e2f; color: white; border: 1px solid #444;">
      <div class="modal-header border-0">
        <h5 class="modal-title font-weight-bold" id="fnScarModalLabel">FN SCAR</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body row no-gutters">
        <!-- Left: Carousel -->
        <div class="col-md-6 pr-3">
          <div id="fnScarCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner rounded">
              <div class="carousel-item active">
                    <video class="d-block w-100 rounded" style="height: 300px; object-fit: cover;" controls>
                    <source src="FN SCAR.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
              </div>              
              <div class="carousel-item">
                <img src="FN SCAR Side View.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="FN SCAR Side View1.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="FN SCAR Side View2.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="FN SCAR Side View3.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
              </div>
            </div>
            <a class="carousel-control-prev custom-carousel-arrow" href="#fnScarCarousel" role="button" data-slide="prev">
              <span class="fa fa-chevron-left text-white"></span>
            </a>
            <a class="carousel-control-next custom-carousel-arrow" href="#fnScarCarousel" role="button" data-slide="next">
              <span class="fa fa-chevron-right text-white"></span>
            </a>
          </div>
        </div>

        <!-- Right: Info -->
        <div class="col-md-6 pl-3 d-flex flex-column justify-content-between">
          <div>
            <h4 class="text-success font-weight-bold mb-3">Price: <?= $products['FN SCAR']['price'] ?>$</h4>
            <p><i class="fa fa-cogs text-warning mr-1"></i><strong>Mode:</strong> Select Fire (Semi/Full Auto)</p>
            <p><i class="fa fa-shopping-cart text-info mr-1"></i><strong>Sold:</strong> <?= $products['FN SCAR']['sold'] ?></p>
            <p><i class="fa fa-star text-success mr-1"></i><strong>Rating:</strong> <?= $products['FN SCAR']['rating'] ?> ★★★★★</p>

            <hr style="border-color: #444;">

            <h6 class="font-weight-bold">Description</h6>
            <p class="small">
              The FN SCAR is a modern assault rifle platform known for its lightweight design and modularity. Designed for adaptability and durability in diverse combat environments, this replica mirrors those traits with impressive build quality and performance.
            </p>

            <h6 class="font-weight-bold">Specifications</h6>
            <ul class="small">
              <li>Type: AEG (Automatic Electric Gun)</li>
              <li>Material: Reinforced Polymer Body with Metal Rails</li>
              <li>Color: Desert Tan</li>
              <li>Size: Full-size Assault Rifle</li>
              <li>Magazine Capacity: 300 rounds (Hi-Cap)</li>
              <li>FPS: ~400-420</li>
            </ul>
          </div>

          <!-- Buttons -->
          <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success d-flex align-items-center justify-content-center w-50 mr-2 py-2"
              style="font-size: 0.8em;"
              onclick="confirmPurchase('FN SCAR', <?= $products['FN SCAR']['price'] ?>, 'FN SCAR.jpg'); modifyStock('FN SCAR', -1)">
              <i class="fa fa-credit-card mr-2"></i> Buy Now
            </button>

            <button class="btn btn-outline-warning d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em;"
              onclick="addToWishlist('FN SCAR', <?= $products['FN SCAR']['price'] ?>, 'FN SCAR.jpg')">
              <i class="fa fa-heart mr-2"></i> Add to Wishlist
            </button>

            <button class="btn btn-outline-light add-to-cart btn-sm d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em;"
              data-name="FN SCAR"
              data-price="<?= $products['FN SCAR']['price'] ?>"
              data-image="FN SCAR.jpg"
              onclick="addDBuy('FN SCAR', 1, <?= $products['FN SCAR']['price'] ?>); alert('Added to cart')">
              <i class="fa fa-shopping-cart mr-2"></i> Add to Cart
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

    <br>  <h1> <center> Guns </center></h1> <br>

<div class="container text-center"> 
    <div class="row align-items-stretch">
        <?php if (isset($products['GLOCK 18'])): ?>
        <div class="col product-card" 
            data-name="GLOCK 18"
            data-category="Pistol"
            data-price="<?= $products['GLOCK 18']['price'] ?>"
            data-color="Black"
            data-size="Compact">
            <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
            <a href="javascript:void(0);" data-toggle="modal" data-target="#productModalGlock18">
                <img src="GLOCK 18.jpg" class="card-img-top img-fluid" alt="GLOCK 18" style="height: 180px; object-fit: cover;">
            </a>
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title" style="color: white;">GLOCK 18</h5>
                    <p style="color: white;"><?= $products['GLOCK 18']['price'] ?>$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span><?= $products['GLOCK 18']['rating'] ?> ★★★★★</span>
                        <span style="margin-left: 5px; color: white;"><?= $products['GLOCK 18']['sold'] ?> sold</span>
                    </div>
                    <div class="mt-2" style="color: white; text-align: center;">
                        In stock: <span id="stock-count-glock-18" style="margin-left: 5px;"><?= $products['GLOCK 18']['stock'] ?></span>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                        <button class="btn btn-outline-success buy-now btn-sm" style="font-size: 0.8em; white-space: nowrap;"
                            onclick="confirmPurchase('GLOCK 18', <?= $products['GLOCK 18']['price'] ?>, 'GLOCK 18.jpg'); modifyStock('GLOCK 18', -1)">
                            Buy Now
                        </button>

                        <form method="POST" action="wishlist_action.php" class="w-50">
                              <input type="hidden" name="product_name" value="GLOCK 18">
                              <input type="hidden" name="product_price" value="<?= $products['GLOCK 18']['price'] ?>">
                              <input type="hidden" name="product_image" value="GLOCK 18.jpg">
                              <button type="submit" name="add_to_wishlist" 
          class="btn btn-outline-warning d-flex align-items-center justify-content-center w-100 py-2"
          style="font-size: 0.8em; white-space: nowrap;">
      <i class="fa fa-heart mr-2"></i> Add to Wishlist
  </button>
</form>

                        <button class="btn btn-outline-light add-to-cart btn-sm"
                            style="font-size: 0.8em; white-space: nowrap;"
                            data-name="GLOCK 18"
                            data-price="<?= $products['GLOCK 18']['price'] ?>"
                            data-image="GLOCK 18.jpg"
                            onclick="addDBuy('GLOCK 18', 1, <?= $products['GLOCK 18']['price'] ?>); alert('Added to cart')">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        

        <?php if (isset($products['CZ P-10C C02 BLK'])): ?>
        <div class="col product-card"
                data-name="CZ P-10C C02 BLK"
                data-category="Pistol"
                data-price="<?= $products['CZ P-10C C02 BLK']['price'] ?>"
                data-color="Black"
                data-size="Compact">

            <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                <a href="#" data-toggle="modal" data-target="#czP10Modal">
                    <img src="CZ P-10C C02 BLK.jpg" class="card-img-top img-fluid" alt="CZ P-10C C02 BLK" style="height: 180px; object-fit: cover;">
                </a>
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title" style="color: white;">CZ P-10C C02</h5>
                    <p style="color: white;"><?= $products['CZ P-10C C02 BLK']['price'] ?>$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span><?= $products['CZ P-10C C02 BLK']['rating'] ?> ★★★★★</span>
                        <span style="margin-left: 5px; color: white;"><?= $products['CZ P-10C C02 BLK']['sold'] ?> sold</span>
                    </div>
                    <div class="mt-2" style="color: white; text-align: center;">
                        In stock: <span id="stock-count-cz-p-10c-c02-blk"><?= $products['CZ P-10C C02 BLK']['stock'] ?></span>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                        <button class="btn btn-outline-success buy-now btn-sm" style="font-size: 0.8em; white-space: nowrap;"
                            onclick="confirmPurchase('CZ P-10C C02 BLK', <?= $products['CZ P-10C C02 BLK']['price'] ?>, 'CZ P-10C C02 BLK.jpg'); modifyStock('CZ P-10C C02 BLK', -1)">
                            Buy Now
                        </button>

                        <form method="POST" action="wishlist_action.php" class="w-50">
                            <input type="hidden" name="product_name" value="CZ P-10C C02 BLK">
                            <input type="hidden" name="product_price" value="<?= $products['CZ P-10C C02 BLK']['price'] ?>">
                            <input type="hidden" name="product_image" value="CZ P-10C C02 BLK.jpg">
                            <button type="submit" name="add_to_wishlist"
                                class="btn btn-outline-warning d-flex align-items-center justify-content-center w-100 py-2"
                                style="font-size: 0.8em; white-space: nowrap;">
                                <i class="fa fa-heart mr-2"></i> Add to Wishlist
                            </button>
              
                        <button class="btn btn-outline-light add-to-cart btn-sm"
                            style="font-size: 0.8em; white-space: nowrap;"
                            data-name="CZ P-10C C02 BLK"
                            data-price="<?= $products['CZ P-10C C02 BLK']['price'] ?>"
                            data-image="CZ P-10C C02 BLK.jpg"
                            onclick="addDBuy('CZ P-10C C02 BLK', 1, <?= $products['CZ P-10C C02 BLK']['price'] ?>); alert('Added to cart')">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if (isset($products['KJW CZ TS2'])): ?>
        <div class="col product-card"
            data-name="KJW CZ TS2"
            data-category="Pistol"
            data-price="<?= $products['KJW CZ TS2']['price'] ?>"
            data-color="Black"
            data-size="Full-size">

            <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                <a href="#" data-toggle="modal" data-target="#kjwTs2Modal">
                    <img src="KJW CZ TS2.png" class="card-img-top img-fluid" alt="KJW CZ TS2" style="height: 180px; object-fit: cover;">
                </a>
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title" style="color: white;">KJW CZ TS2</h5>
                    <p style="color: white;"><?= $products['KJW CZ TS2']['price'] ?>$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span><?= $products['KJW CZ TS2']['rating'] ?> ★★★★★</span>
                        <span style="margin-left: 5px; color: white;"><?= $products['KJW CZ TS2']['sold'] ?> sold</span>
                    </div>
                    <div class="mt-2" style="color: white; text-align: center;">
                        In stock: <span id="stock-count-kjw-cz-ts2"><?= $products['KJW CZ TS2']['stock'] ?></span>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                        <button class="btn btn-outline-success buy-now btn-sm" style="font-size: 0.8em; white-space: nowrap;"
                            onclick="confirmPurchase('KJW CZ TS2', <?= $products['KJW CZ TS2']['price'] ?>, 'KJW CZ TS2.png'); modifyStock('KJW CZ TS2', -1)">
                            Buy Now
                        </button>

                        <form method="POST" action="wishlist_action.php" class="w-50">
                            <input type="hidden" name="product_name" value="KJW CZ TS2">
                            <input type="hidden" name="product_price" value="<?= $products['KJW CZ TS2']['price'] ?>">
                            <input type="hidden" name="product_image" value="KJW CZ TS2.png">
                            <button type="submit" name="add_to_wishlist"
                                class="btn btn-outline-warning d-flex align-items-center justify-content-center w-100 py-2"
                                style="font-size: 0.8em; white-space: nowrap;">
                                <i class="fa fa-heart mr-2"></i> Add to Wishlist
                            </button>

                        <button class="btn btn-outline-light add-to-cart btn-sm"
                            style="font-size: 0.8em; white-space: nowrap;"
                            data-name="KJW CZ TS2"
                            data-price="<?= $products['KJW CZ TS2']['price'] ?>"
                            data-image="KJW CZ TS2.png"
                            onclick="addDBuy('KJW CZ TS2', 1, <?= $products['KJW CZ TS2']['price'] ?>); alert('Added to cart')">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if (isset($products['WG 701 BLK'])): ?>
        <div class="col product-card"
            data-name="WG 701 BLK"
            data-category="Pistol"
            data-price="<?= $products['WG 701 BLK']['price'] ?>"
            data-color="Black"
            data-size="Full-size">

            <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                <a href="#" data-toggle="modal" data-target="#wg701Modal">
                    <img src="WG 701 BLK.jpg" class="card-img-top img-fluid" alt="WG 701 BLK" style="height: 180px; object-fit: cover;">
                </a>
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title" style="color: white;">WG 701 BLK</h5>
                    <p style="color: white;"><?= $products['WG 701 BLK']['price'] ?>$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span><?= $products['WG 701 BLK']['rating'] ?> ★★★★★</span>
                        <span style="margin-left: 5px; color: white;"><?= $products['WG 701 BLK']['sold'] ?> sold</span>
                    </div>
                    <div class="mt-2" style="color: white; text-align: center;">
                        In stock: <span id="stock-count-wg-701-blk"><?= $products['WG 701 BLK']['stock'] ?></span>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                        <button class="btn btn-outline-success buy-now btn-sm" style="font-size: 0.8em; white-space: nowrap;"
                            onclick="confirmPurchase('WG 701 BLK', <?= $products['WG 701 BLK']['price'] ?>, 'WG 701 BLK.jpg'); modifyStock('WG 701 BLK', -1)">
                            Buy Now
                        </button>

                        <form method="POST" action="wishlist_action.php" class="w-50">
                            <input type="hidden" name="product_name" value="WG 701 BLK">
                            <input type="hidden" name="product_price" value="<?= $products['WG 701 BLK']['price'] ?>">
                            <input type="hidden" name="product_image" value="WG 701 BLK.jpg">
                            <button type="submit" name="add_to_wishlist"
                                class="btn btn-outline-warning d-flex align-items-center justify-content-center w-100 py-2"
                                style="font-size: 0.8em; white-space: nowrap;">
                                <i class="fa fa-heart mr-2"></i> Add to Wishlist
                            </button>

                        <button class="btn btn-outline-light add-to-cart btn-sm"
                            style="font-size: 0.8em; white-space: nowrap;"
                            data-name="WG 701 BLK"
                            data-price="<?= $products['WG 701 BLK']['price'] ?>"
                            data-image="WG 701 BLK.jpg"
                            onclick="addDBuy('WG 701 BLK', 1, <?= $products['WG 701 BLK']['price'] ?>); alert('Added to cart')">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if (isset($products['KJW KP-06 HICAPA'])): ?>
        <div class="col product-card"
            data-name="KJW KP-06 HICAPA"
            data-category="Pistol"
            data-price="<?= $products['KJW KP-06 HICAPA']['price'] ?>"
            data-color="Black"
            data-size="Full-size">

            <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                <a href="#" data-toggle="modal" data-target="#kjwKP06Modal">
                    <img src="KJW KP-06 HICAPA.webp" class="card-img-top img-fluid" alt="KJW KP-06 HICAPA" style="height: 180px; object-fit: cover;">
                </a>
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title" style="color: white;">KJW KP-06</h5>
                    <p style="color: white;"><?= $products['KJW KP-06 HICAPA']['price'] ?>$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span><?= $products['KJW KP-06 HICAPA']['rating'] ?> ★★★★★</span>
                        <span style="margin-left: 5px; color: white;"><?= $products['KJW KP-06 HICAPA']['sold'] ?> sold</span>
                    </div>
                    <div class="mt-2" style="color: white; text-align: center;">
                        In stock: <span id="stock-count-kjw-kp-06-hicapa"><?= $products['KJW KP-06 HICAPA']['stock'] ?></span>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                        <button class="btn btn-outline-success buy-now btn-sm" style="font-size: 0.8em; white-space: nowrap;"
                            onclick="confirmPurchase('KJW KP-06 HICAPA', <?= $products['KJW KP-06 HICAPA']['price'] ?>, 'KJW KP-06 HICAPA.jpg'); modifyStock('KJW KP-06 HICAPA', -1)">
                            Buy Now
                        </button>

                        <form method="POST" action="wishlist_action.php" class="w-50">
                            <input type="hidden" name="product_name" value="KJW KP-06 HICAPA">
                            <input type="hidden" name="product_price" value="<?= $products['KJW KP-06 HICAPA']['price'] ?>">
                            <input type="hidden" name="product_image" value="KJW KP-06 HICAPA.webp">
                            <button type="submit" name="add_to_wishlist"
                                class="btn btn-outline-warning d-flex align-items-center justify-content-center w-100 py-2"
                                style="font-size: 0.8em; white-space: nowrap;">
                                <i class="fa fa-heart mr-2"></i> Add to Wishlist
                            </button>
                            
                        <button class="btn btn-outline-light add-to-cart btn-sm" 
                            style="font-size: 0.8em; white-space: nowrap;"
                            data-name="KJW KP-06 HICAPA"
                            data-price="<?= $products['KJW KP-06 HICAPA']['price'] ?>"
                            data-image="KJW KP-06 HICAPA.webp"
                            onclick="addDBuy('KJW KP-06 HICAPA', 1, <?= $products['KJW KP-06 HICAPA']['price'] ?>); alert('Added to cart')">
                            Add to Cart
                        </button>
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

        <?php if (isset($products['D BELL VSR 10 WOOD DESIGN'])): ?>
        <div class="col product-card"
            data-name="D BELL VSR 10 WOOD DESIGN"
            data-category="Sniper Rifle"
            data-price="<?= $products['D BELL VSR 10 WOOD DESIGN']['price'] ?>"
            data-color="Wood"
            data-size="Full-size">
            <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                <a href="#" data-toggle="modal" data-target="#vsr10WoodModal">
                    <img src="D BELL VSR 10 WOOD DESIGN.png" class="card-img-top img-fluid" alt="D BELL VSR 10 WOOD DESIGN" style="height: 180px; object-fit: cover;">
                </a>
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title text-white">D BELL VSR 10</h5>
                    <p class="text-white"><?= $products['D BELL VSR 10 WOOD DESIGN']['price'] ?>$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span><?= $products['D BELL VSR 10 WOOD DESIGN']['rating'] ?> ★★★★★</span>
                        <span class="text-white ms-2"><?= $products['D BELL VSR 10 WOOD DESIGN']['sold'] ?> sold</span>
                    </div>
                    <div class="mt-2 text-white text-center">
                        In stock: <span id="stock-count-d-bell-vsr-10-wood-design" class="ms-2"><?= $products['D BELL VSR 10 WOOD DESIGN']['stock'] ?></span>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                        <button class="btn btn-outline-success buy-now btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="confirmPurchase('D BELL VSR 10 WOOD DESIGN', <?= $products['D BELL VSR 10 WOOD DESIGN']['price'] ?>, 'D BELL VSR 10 WOOD DESIGN.png'); modifyStock('D BELL VSR 10 WOOD DESIGN', -1)">Buy Now</button>
                        <button class="btn btn-outline-light add-to-cart btn-sm" style="font-size: 0.8em; white-space: nowrap;" data-name="D BELL VSR 10 WOOD DESIGN" data-price="<?= $products['D BELL VSR 10 WOOD DESIGN']['price'] ?>" data-image="D BELL VSR 10 WOOD DESIGN.png" onclick="addDBuy('D BELL VSR 10 WOOD DESIGN', 1, <?= $products['D BELL VSR 10 WOOD DESIGN']['price'] ?>); alert('Added to cart')">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if (isset($products['DBELL VSR10 BLACK'])): ?>
        <div class="col product-card"
            data-name="DBELL VSR10 BLACK"
            data-category="Sniper Rifle"
            data-price="<?= $products['DBELL VSR10 BLACK']['price'] ?>"
            data-color="Black"
            data-size="Full-size">
            <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                <a href="#" data-toggle="modal" data-target="#vsr10BlackModal">
                    <img src="DBELL VSR10 BLACK.png" class="card-img-top img-fluid" alt="DBELL VSR10 BLACK" style="height: 180px; object-fit: cover;">
                </a>
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title text-white">DBELL VSR10</h5>
                    <p class="text-white"><?= $products['DBELL VSR10 BLACK']['price'] ?>$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span><?= $products['DBELL VSR10 BLACK']['rating'] ?> ★★★★★</span>
                        <span class="text-white ms-2"><?= $products['DBELL VSR10 BLACK']['sold'] ?> sold</span>
                    </div>
                    <div class="mt-2 text-white text-center">
                        In stock: <span id="stock-count-dbell-vsr10-black" class="ms-2"><?= $products['DBELL VSR10 BLACK']['stock'] ?></span>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                        <button class="btn btn-outline-success buy-now btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="confirmPurchase('DBELL VSR10 BLACK', <?= $products['DBELL VSR10 BLACK']['price'] ?>, 'DBELL VSR10 BLACK.png'); modifyStock('DBELL VSR10 BLACK', -1)">Buy Now</button>
                        <button class="btn btn-outline-light add-to-cart btn-sm" style="font-size: 0.8em; white-space: nowrap;" data-name="DBELL VSR10 BLACK" data-price="<?= $products['DBELL VSR10 BLACK']['price'] ?>" data-image="DBELL VSR10 BLACK.png" onclick="addDBuy('DBELL VSR10 BLACK', 1, <?= $products['DBELL VSR10 BLACK']['price'] ?>); alert('Added to cart')">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if (isset($products['MOD 24 SSG GSPEC'])): ?>
        <div class="col product-card"
            data-name="MOD 24 SSG GSPEC"
            data-category="Sniper Rifle"
            data-price="<?= $products['MOD 24 SSG GSPEC']['price'] ?>"
            data-color="Black"
            data-size="Full-size">

            <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                <a href="#" data-toggle="modal" data-target="#mod24Modal">
                    <img src="MOD 24 SSG GSPEC.jpg" class="card-img-top img-fluid" alt="MOD 24 SSG GSPEC" style="height: 180px; object-fit: cover;">
                </a>
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title text-white">MOD 24 SSG</h5>
                    <p class="text-white"><?= $products['MOD 24 SSG GSPEC']['price'] ?>$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span><?= $products['MOD 24 SSG GSPEC']['rating'] ?> ★★★★★</span>
                        <span class="text-white ms-2"><?= $products['MOD 24 SSG GSPEC']['sold'] ?> sold</span>
                    </div>
                    <div class="mt-2 text-white text-center">
                        In stock: <span id="stock-count-mod-24-ssg-gspec" class="ms-2"><?= $products['MOD 24 SSG GSPEC']['stock'] ?></span>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                        <button class="btn btn-outline-success buy-now btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="confirmPurchase('MOD 24 SSG GSPEC', <?= $products['MOD 24 SSG GSPEC']['price'] ?>, 'MOD 24 SSG GSPEC.jpg'); modifyStock('MOD 24 SSG GSPEC', -1)">Buy Now</button>
                        <button class="btn btn-outline-light add-to-cart btn-sm" style="font-size: 0.8em; white-space: nowrap;" data-name="MOD 24 SSG GSPEC" data-price="<?= $products['MOD 24 SSG GSPEC']['price'] ?>" data-image="MOD 24 SSG GSPEC.jpg" onclick="addDBuy('MOD 24 SSG GSPEC', 1, <?= $products['MOD 24 SSG GSPEC']['price'] ?>); alert('Added to cart')">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if (isset($products['LT-28AB LANCER TACTICAL M24'])): ?>
        <div class="col product-card"
            data-name="LT-28AB LANCER TACTICAL M24"
            data-category="Sniper Rifle"
            data-price="<?= $products['LT-28AB LANCER TACTICAL M24']['price'] ?>"
            data-color="Black"
            data-size="Full-size">

            <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                <a href="#" data-toggle="modal" data-target="#lt28abModal">
                    <img src="LT-28AB LANCER TACTICAL M24.jpg" class="card-img-top img-fluid" alt="LT-28AB LANCER TACTICAL M24" style="height: 180px; object-fit: cover;">
                </a>
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title text-white">LT-28AB</h5>
                    <p class="text-white"><?= $products['LT-28AB LANCER TACTICAL M24']['price'] ?>$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span><?= $products['LT-28AB LANCER TACTICAL M24']['rating'] ?> ★★★★★</span>
                        <span class="text-white ms-2"><?= $products['LT-28AB LANCER TACTICAL M24']['sold'] ?> sold</span>
                    </div>
                    <div class="mt-2 text-white text-center">
                        In stock: <span id="stock-count-lt-28ab-lancer-tactical-m24" class="ms-2"><?= $products['LT-28AB LANCER TACTICAL M24']['stock'] ?></span>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                        <button class="btn btn-outline-success buy-now btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="confirmPurchase('LT-28AB LANCER TACTICAL M24', <?= $products['LT-28AB LANCER TACTICAL M24']['price'] ?>, 'LT-28AB LANCER TACTICAL M24.jpg'); modifyStock('LT-28AB LANCER TACTICAL M24', -1)">Buy Now</button>
                        <button class="btn btn-outline-light add-to-cart btn-sm" style="font-size: 0.8em; white-space: nowrap;" data-name="LT-28AB LANCER TACTICAL M24" data-price="<?= $products['LT-28AB LANCER TACTICAL M24']['price'] ?>" data-image="LT-28AB LANCER TACTICAL M24.jpg" onclick="addDBuy('LT-28AB LANCER TACTICAL M24', 1, <?= $products['LT-28AB LANCER TACTICAL M24']['price'] ?>); alert('Added to cart')">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if (isset($products['EC 501C L96 BLACK'])): ?>
        <div class="col product-card"
            data-name="EC 501C L96 BLACK"
            data-category="Sniper Rifle"
            data-price="<?= $products['EC 501C L96 BLACK']['price'] ?>"
            data-color="Black"
            data-size="Full-size">
            <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                <a href="#" data-toggle="modal" data-target="#ec501cModal">
                    <img src="EC 501C L96 BLACK.jpg" class="card-img-top img-fluid" alt="EC 501C L96 BLACK" style="height: 180px; object-fit: cover;">
                </a>
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title text-white">EC 501C L96</h5>
                    <p class="text-white"><?= $products['EC 501C L96 BLACK']['price'] ?>$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span><?= $products['EC 501C L96 BLACK']['rating'] ?> ★★★★★</span>
                        <span class="text-white ms-2"><?= $products['EC 501C L96 BLACK']['sold'] ?> sold</span>
                    </div>
                    <div class="mt-2 text-white text-center">
                        In stock: <span id="stock-count-ec-501c-l96-black" class="ms-2"><?= $products['EC 501C L96 BLACK']['stock'] ?></span>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                        <button class="btn btn-outline-success buy-now btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="confirmPurchase('EC 501C L96 BLACK', <?= $products['EC 501C L96 BLACK']['price'] ?>, 'EC 501C L96 BLACK.jpg'); modifyStock('EC 501C L96 BLACK', -1)">Buy Now</button>
                        <button class="btn btn-outline-light add-to-cart btn-sm" style="font-size: 0.8em; white-space: nowrap;" data-name="EC 501C L96 BLACK" data-price="<?= $products['EC 501C L96 BLACK']['price'] ?>" data-image="EC 501C L96 BLACK.jpg" onclick="addDBuy('EC 501C L96 BLACK', 1, <?= $products['EC 501C L96 BLACK']['price'] ?>); alert('Added to cart')">Add to Cart</button>
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
        <div class="col product-card"
            data-name="Heckler & Koch - HK416"
            data-category="Rifle"
            data-price="<?= $products['Heckler & Koch - HK416']['price'] ?>"
            data-color="Black"
            data-size="Full-size">

            <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                <a href="#" data-toggle="modal" data-target="#hk416Modal">
                    <img src="Heckler & Koch - HK416.jpg" class="card-img-top img-fluid" alt="Heckler & Koch - HK416" style="height: 180px; object-fit: cover;">
                </a>
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title text-white">Heckler & Koch</h5>
                    <p class="text-white"><?= $products['Heckler & Koch - HK416']['price'] ?>$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span><?= $products['Heckler & Koch - HK416']['rating'] ?> ★★★★★</span>
                        <span class="text-white ms-2"><?= $products['Heckler & Koch - HK416']['sold'] ?> sold</span>
                    </div>
                    <div class="mt-2 text-white text-center">
                        In stock: <span id="stock-count-heckler-koch-hk416" class="ms-2"><?= $products['Heckler & Koch - HK416']['stock'] ?></span>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                        <button class="btn btn-outline-success buy-now btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="confirmPurchase('Heckler & Koch - HK416', <?= $products['Heckler & Koch - HK416']['price'] ?>, 'Heckler & Koch - HK416.jpg'); modifyStock('Heckler & Koch - HK416', -1)">Buy Now</button>
                        <button class="btn btn-outline-light add-to-cart btn-sm" style="font-size: 0.8em; white-space: nowrap;" data-name="Heckler & Koch - HK416" data-price="<?= $products['Heckler & Koch - HK416']['price'] ?>" data-image="Heckler & Koch - HK416.jpg" onclick="addDBuy('Heckler & Koch - HK416', 1, <?= $products['Heckler & Koch - HK416']['price'] ?>); alert('Added to cart')">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if (isset($products['HK M110A1'])): ?>
        <div class="col product-card"
            data-name="HK M110A1"
            data-category="Rifle"
            data-price="<?= $products['HK M110A1']['price'] ?>"
            data-color="Dessert Tan"
            data-size="Full-size">

            <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                <a href="#" data-toggle="modal" data-target="#hkM110A1Modal">
                <img src="HK M110A1.jpg" class="card-img-top img-fluid" alt="HK M110A1" style="height: 180px; object-fit: cover;">
                </a>
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title text-white">HK M110A1</h5>
                    <p class="text-white"><?= $products['HK M110A1']['price'] ?>$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span><?= $products['HK M110A1']['rating'] ?> ★★★★★</span>
                        <span class="text-white ms-2"><?= $products['HK M110A1']['sold'] ?> sold</span>
                    </div>
                    <div class="mt-2 text-white text-center">
                        In stock: <span id="stock-count-hk-m110a1" class="ms-2"><?= $products['HK M110A1']['stock'] ?></span>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                        <button class="btn btn-outline-success buy-now btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="confirmPurchase('HK M110A1', <?= $products['HK M110A1']['price'] ?>, 'HK M110A1.jpg'); modifyStock('HK M110A1', -1)">Buy Now</button>
                        <button class="btn btn-outline-light add-to-cart btn-sm" style="font-size: 0.8em; white-space: nowrap;" data-name="HK M110A1" data-price="<?= $products['HK M110A1']['price'] ?>" data-image="HK M110A1.jpg" onclick="addDBuy('HK M110A1', 1, <?= $products['HK M110A1']['price'] ?>); alert('Added to cart')">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if (isset($products['AK74 SERIES'])): ?>
        <div class="col product-card"
            data-name="AK74 SERIES"
            data-category="Rifle"
            data-price="<?= $products['AK74 SERIES']['price'] ?>"
            data-color="Wood"
            data-size="Full-size">

            <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                <a href="#" data-toggle="modal" data-target="#ak74SeriesModal">
                    <img src="AK74 SERIES.jpg" class="card-img-top img-fluid" alt="AK74 SERIES" style="height: 180px; object-fit: cover;">
                </a>
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title text-white">AK74 SERIES</h5>
                    <p class="text-white"><?= $products['AK74 SERIES']['price'] ?>$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span><?= $products['AK74 SERIES']['rating'] ?> ★★★★★</span>
                        <span class="text-white ms-2"><?= $products['AK74 SERIES']['sold'] ?> sold</span>
                    </div>
                    <div class="mt-2 text-white text-center">
                        In stock: <span id="stock-count-ak74-series" class="ms-2"><?= $products['AK74 SERIES']['stock'] ?></span>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                        <button class="btn btn-outline-success buy-now btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="confirmPurchase('AK74 SERIES', <?= $products['AK74 SERIES']['price'] ?>, 'AK74 SERIES.jpg'); modifyStock('AK74 SERIES', -1)">Buy Now</button>
                        <button class="btn btn-outline-light add-to-cart btn-sm" style="font-size: 0.8em; white-space: nowrap;" data-name="AK74 SERIES" data-price="<?= $products['AK74 SERIES']['price'] ?>" data-image="AK74 SERIES.jpg" onclick="addDBuy('AK74 SERIES', 1, <?= $products['AK74 SERIES']['price'] ?>); alert('Added to cart')">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if (isset($products['M4A1 SERIES'])): ?>
        <div class="col product-card"
            data-name="M4A1 SERIES"
            data-category="Rifle"
            data-price="<?= $products['M4A1 SERIES']['price'] ?>"
            data-color="Black"
            data-size="Full-size">

            <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                <a href="#" data-toggle="modal" data-target="#m4a1SeriesModal">
                    <img src="M4A1 SERIES.jpg" class="card-img-top img-fluid" alt="M4A1 SERIES" style="height: 180px; object-fit: cover;">
                </a>
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title text-white">M4A1 SERIES</h5>
                    <p class="text-white"><?= $products['M4A1 SERIES']['price'] ?>$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span><?= $products['M4A1 SERIES']['rating'] ?> ★★★★★</span>
                        <span class="text-white ms-2"><?= $products['M4A1 SERIES']['sold'] ?> sold</span>
                    </div>
                    <div class="mt-2 text-white text-center">
                        In stock: <span id="stock-count-m4a1-series" class="ms-2"><?= $products['M4A1 SERIES']['stock'] ?></span>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                        <button class="btn btn-outline-success buy-now btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="confirmPurchase('M4A1 SERIES', <?= $products['M4A1 SERIES']['price'] ?>, 'M4A1 SERIES.jpg'); modifyStock('M4A1 SERIES', -1)">Buy Now</button>
                        <button class="btn btn-outline-light add-to-cart btn-sm" style="font-size: 0.8em; white-space: nowrap;" data-name="M4A1 SERIES" data-price="<?= $products['M4A1 SERIES']['price'] ?>" data-image="M4A1 SERIES.jpg" onclick="addDBuy('M4A1 SERIES', 1, <?= $products['M4A1 SERIES']['price'] ?>); alert('Added to cart')">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if (isset($products['FN SCAR'])): ?>
        <div class="col product-card"
            data-name="FN SCAR"
            data-category="Rifle"
            data-price="<?= $products['FN SCAR']['price'] ?>"
            data-color="Dessert Tan"
            data-size="Full-size">

            <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                <a href="#" data-toggle="modal" data-target="#fnScarModal">
                    <img src="FN SCAR.jpg" class="card-img-top img-fluid" alt="FN SCAR" style="height: 180px; object-fit: cover;">
                </a>
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title text-white">FN SCAR</h5>
                    <p class="text-white"><?= $products['FN SCAR']['price'] ?>$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span><?= $products['FN SCAR']['rating'] ?> ★★★★★</span>
                        <span class="text-white ms-2"><?= $products['FN SCAR']['sold'] ?> sold</span>
                    </div>
                    <div class="mt-2 text-white text-center">
                        In stock: <span id="stock-count-fn-scar" class="ms-2"><?= $products['FN SCAR']['stock'] ?></span>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                        <button class="btn btn-outline-success buy-now btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="confirmPurchase('FN SCAR', <?= $products['FN SCAR']['price'] ?>, 'FN SCAR.jpg'); modifyStock('FN SCAR', -1)">Buy Now</button>
                        <button class="btn btn-outline-light add-to-cart btn-sm" style="font-size: 0.8em; white-space: nowrap;" data-name="FN SCAR" data-price="<?= $products['FN SCAR']['price'] ?>" data-image="FN SCAR.jpg" onclick="addDBuy('FN SCAR', 1, <?= $products['FN SCAR']['price'] ?>); alert('Added to cart')">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

    <br>

</div>
      </div>
      </div>
    <br><br><br>
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

<!-- BOTTOM FOOTER BAR -->
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

    function searchProducts() {
        const input = document.getElementById('productSearch').value.toLowerCase();
        const products = document.querySelectorAll('.product-card');

        products.forEach(product => {
            const productName = product.getAttribute('data-name').toLowerCase();
            if (productName.includes(input)) {
                product.style.display = 'block'; // show
            } else {
                product.style.display = 'none';  // hide
            }
        });
    }

function applyFilters() {
  const category = document.getElementById('filterCategory').value;
  const minPrice = parseFloat(document.getElementById('minPrice').value) || 0;
  const maxPrice = parseFloat(document.getElementById('maxPrice').value) || Infinity;
  const color = document.getElementById('filterColor').value;
  const size = document.getElementById('filterSize').value;
  const sortBy = document.getElementById('sortBy').value;

  const productCards = Array.from(document.querySelectorAll('.product-card'));

  productCards.forEach(card => {
    const price = parseFloat(card.dataset.price);
    const cardCategory = card.dataset.category;
    const cardColor = card.dataset.color;
    const cardSize = card.dataset.size;

    const matchesCategory = !category || category === cardCategory;
    const matchesPrice = price >= minPrice && price <= maxPrice;
    const matchesColor = !color || color === cardColor;
    const matchesSize = !size || size === cardSize;

    if (matchesCategory && matchesPrice && matchesColor && matchesSize) {
      card.style.display = '';
    } else {
      card.style.display = 'none';
    }
  });

  // Sort visible cards
  const container = document.querySelector('.container .row');
  const visibleCards = productCards.filter(card => card.style.display !== 'none');

  visibleCards.sort((a, b) => {
    switch (sortBy) {
      case 'price-asc':
        return parseFloat(a.dataset.price) - parseFloat(b.dataset.price);
      case 'price-desc':
        return parseFloat(b.dataset.price) - parseFloat(a.dataset.price);
      case 'name-asc':
        return a.dataset.name.localeCompare(b.dataset.name);
      case 'name-desc':
        return b.dataset.name.localeCompare(a.dataset.name);
      case 'popularity':
        return parseInt(b.querySelector('span:nth-of-type(2)').textContent) -
               parseInt(a.querySelector('span:nth-of-type(2)').textContent);
      case 'newness':
        return 0; // Placeholder: Implement based on real "newness" logic if available
      default:
        return 0;
    }
  });

  visibleCards.forEach(card => container.appendChild(card)); // Reorder DOM
}

    </script>
</body>
</html>

     
 


