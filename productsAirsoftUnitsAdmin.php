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
    <link rel="stylesheet" href="productsAdmin.css">
    <script src="productsAdmin.js"></script>
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
                    <div class="d-flex align-items-center mt-2" style="color: white; margin-top: 5px;">
                        In stock: 
                        <button class="btn btn-secondary btn-sm" onclick="modifyStock('GLOCK 18', -1)">-</button>
                        <span id="stock-count-glock-18"class="mx-2"><?= $products['GLOCK 18']['stock'] ?? 0 ?></span>
                        <button class="btn btn-secondary btn-sm" onclick="modifyStock('GLOCK 18', 1)">+</button>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                        <button class="btn btn-outline-danger btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="deleteProduct('GLOCK 18')">Delete</button>
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
                <a href="javascript:alert('This is where description and photo of game goes using bootstrap modal!');">
                    <img src="CZ P-10C C02 BLK.jpg" class="card-img-top img-fluid" alt="CZ P-10C C02 BLK" style="height: 180px; object-fit: cover;">
                </a>
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title" style="color: white;">CZ P-10C C02</h5>
                    <p style="color: white;"><?= $products['CZ P-10C C02 BLK']['price'] ?>$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span><?= $products['CZ P-10C C02 BLK']['rating'] ?> ★★★★★</span>
                        <span style="margin-left: 5px; color: white;"><?= $products['CZ P-10C C02 BLK']['sold'] ?> sold</span>
                    </div>
                    <div class="d-flex align-items-center mt-2" style="color: white; margin-top: 5px;">
                        In stock: 
                        <button class="btn btn-secondary btn-sm" onclick="modifyStock('CZ P-10C C02 BLK', -1)">-</button>
                        <span id="stock-count-cz-p-10c-c02-blk"class="mx-2"><?= $products['CZ P-10C C02 BLK']['stock'] ?? 0 ?></span>
                        <button class="btn btn-secondary btn-sm" onclick="modifyStock('CZ P-10C C02 BLK', 1)">+</button>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                        <button class="btn btn-outline-danger btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="deleteProduct('CZ P-10C C02 BLK')">Delete</button>
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
                <a href="javascript:alert('This is where description and photo of game goes using bootstrap modal!');">
                    <img src="KJW CZ TS2.png" class="card-img-top img-fluid" alt="KJW CZ TS2" style="height: 180px; object-fit: cover;">
                </a>
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title" style="color: white;">KJW CZ TS2</h5>
                    <p style="color: white;"><?= $products['KJW CZ TS2']['price'] ?>$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span><?= $products['KJW CZ TS2']['rating'] ?> ★★★★★</span>
                        <span style="margin-left: 5px; color: white;"><?= $products['KJW CZ TS2']['sold'] ?> sold</span>
                    </div>
                    <div class="d-flex align-items-center mt-2" style="color: white; margin-top: 5px;">
                        In stock: 
                        <button class="btn btn-secondary btn-sm" onclick="modifyStock('KJW CZ TS2', -1)">-</button>
                        <span id="stock-count-kjw-cz-ts2"class="mx-2"><?= $products['KJW CZ TS2']['stock'] ?? 0 ?></span>
                        <button class="btn btn-secondary btn-sm" onclick="modifyStock('KJW CZ TS2', 1)">+</button>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                        <button class="btn btn-outline-danger btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="deleteProduct('KJW CZ TS2')">Delete</button>
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
                <a href="javascript:alert('This is where description and photo of game goes using bootstrap modal!');">
                    <img src="WG 701 BLK.jpg" class="card-img-top img-fluid" alt="WG 701 BLK" style="height: 180px; object-fit: cover;">
                </a>
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title" style="color: white;">WG 701 BLK</h5>
                    <p style="color: white;"><?= $products['WG 701 BLK']['price'] ?>$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span><?= $products['WG 701 BLK']['rating'] ?> ★★★★★</span>
                        <span style="margin-left: 5px; color: white;"><?= $products['WG 701 BLK']['sold'] ?> sold</span>
                    </div>
                    <div class="d-flex align-items-center mt-2" style="color: white; margin-top: 5px;">
                        In stock: 
                        <button class="btn btn-secondary btn-sm" onclick="modifyStock('WG 701 BLK', -1)">-</button>
                        <span id="stock-count-wg-701-blk"class="mx-2"><?= $products['WG 701 BLK']['stock'] ?? 0 ?></span>
                        <button class="btn btn-secondary btn-sm" onclick="modifyStock('WG 701 BLK', 1)">+</button>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                        <button class="btn btn-outline-danger btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="deleteProduct('WG 701 BLK')">Delete</button>
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
                <a href="javascript:alert('This is where description and photo of game goes using bootstrap modal!');">
                    <img src="KJW KP-06 HICAPA.webp" class="card-img-top img-fluid" alt="KJW KP-06 HICAPA" style="height: 180px; object-fit: cover;">
                </a>
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title" style="color: white;">KJW KP-06</h5>
                    <p style="color: white;"><?= $products['KJW KP-06 HICAPA']['price'] ?>$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span><?= $products['KJW KP-06 HICAPA']['rating'] ?> ★★★★★</span>
                        <span style="margin-left: 5px; color: white;"><?= $products['KJW KP-06 HICAPA']['sold'] ?> sold</span>
                    </div>
                    <div class="d-flex align-items-center mt-2" style="color: white; margin-top: 5px;">
                        In stock: 
                        <button class="btn btn-secondary btn-sm" onclick="modifyStock('KJW KP-06 HICAPA', -1)">-</button>
                        <span id="stock-count-kjw-kp-06-hicapa"class="mx-2"><?= $products['KJW KP-06 HICAPA']['stock'] ?? 0 ?></span>
                        <button class="btn btn-secondary btn-sm" onclick="modifyStock('KJW KP-06 HICAPA', 1)">+</button>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                        <button class="btn btn-outline-danger btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="deleteProduct('KJW KP-06 HICAPA')">Delete</button>
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
                <img src="D BELL VSR 10 WOOD DESIGN.png" class="card-img-top img-fluid" alt="D BELL VSR 10 WOOD DESIGN" style="height: 180px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title text-white">D BELL VSR 10</h5>
                    <p class="text-white"><?= $products['D BELL VSR 10 WOOD DESIGN']['price'] ?>$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span><?= $products['D BELL VSR 10 WOOD DESIGN']['rating'] ?> ★★★★★</span>
                        <span class="text-white ms-2"><?= $products['D BELL VSR 10 WOOD DESIGN']['sold'] ?> sold</span>
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
        <div class="col product-card"
            data-name="DBELL VSR10 BLACK"
            data-category="Sniper Rifle"
            data-price="<?= $products['DBELL VSR10 BLACK']['price'] ?>"
            data-color="Black"
            data-size="Full-size">
            <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                <img src="DBELL VSR10 BLACK.png" class="card-img-top img-fluid" alt="DBELL VSR10 BLACK" style="height: 180px; object-fit: cover;">
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
        <div class="col product-card"
            data-name="MOD 24 SSG GSPEC"
            data-category="Sniper Rifle"
            data-price="<?= $products['MOD 24 SSG GSPEC']['price'] ?>"
            data-color="Black"
            data-size="Full-size">
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
        <div class="col product-card"
            data-name="LT-28AB LANCER TACTICAL M24"
            data-category="Sniper Rifle"
            data-price="<?= $products['LT-28AB LANCER TACTICAL M24']['price'] ?>"
            data-color="Black"
            data-size="Full-size">
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
        <div class="col product-card"
            data-name="EC 501C L96 BLACK"
            data-category="Sniper Rifle"
            data-price="<?= $products['EC 501C L96 BLACK']['price'] ?>"
            data-color="Black"
            data-size="Full-size">
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
            <div class="col product-card"
                data-name="Heckler & Koch - HK416"
                data-category="Rifle"
                data-price="<?= $products['Heckler & Koch - HK416']['price'] ?>"
                data-color="Black"
                data-size="Full-size">
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

        <?php if (isset($products['HK M110A1'])): ?>
            <div class="col product-card"
                data-name="HK M110A1"
                data-category="Rifle"
                data-price="<?= $products['HK M110A1']['price'] ?>"
                data-color="Dessert Tan"
                data-size="Full-size">
        <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
            <img src="HK M110A1.jpg" class="card-img-top img-fluid" alt="HK M110A1" style="height: 180px; object-fit: cover;">
            <div class="card-body d-flex flex-column">
            <h5 class="feature-title" style="color: white;">HK M110A1</h5>
            <p style="color: white;"><?= $products['HK M110A1']['price'] ?? '20' ?>$</p>
            <div class="d-flex align-items-center" style="color: gold;">
                <span class="star-rating"><?= $products['HK M110A1']['rating'] ?? '4.5' ?> ★★★★☆</span>
                <span class="ml-2" style="color: white;"><?= $products['HK M110A1']['sold'] ?? '500' ?> sold</span>
            </div>
            <div class="d-flex align-items-center mt-2" style="color: white; margin-top: 5px;">
                In stock:
                <button class="btn btn-secondary btn-sm ml-2" onclick="modifyStock('HK M110A1', -1)">-</button>
                <span id="stock-count-hk-m110a1" class="mx-2"><?= $products['HK M110A1']['stock'] ?? 0 ?></span>
                <button class="btn btn-secondary btn-sm" onclick="modifyStock('HK M110A1', 1)">+</button>
            </div>
            <div class="button-container mt-auto d-flex justify-content-center">
                <button class="btn btn-outline-danger btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="deleteProduct('HK M110A1')">Delete</button>
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
            <div class="col product-card"
                data-name="M4A1 SERIES"
                data-category="Rifle"
                data-price="<?= $products['M4A1 SERIES']['price'] ?>"
                data-color="Black"
                data-size="Full-size">
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
            <div class="col product-card"
                data-name="FN SCAR"
                data-category="Rifle"
                data-price="<?= $products['FN SCAR']['price'] ?>"
                data-color="Dessert Tan"
                data-size="Full-size">
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

<?php
        $products = json_decode(file_get_contents('productsAdd.json'), true);
        $productCount = count($products);
        ?>

        <div class="container text-center">
        <div class="row justify-content-center align-items-stretch">
            <?php
            $counter = 0;
            foreach ($products as $name => $product):
                // Ensure new row every 5 cards
                if ($counter % 5 === 0 && $counter !== 0) {
                    echo '</div><div class="row justify-content-center align-items-stretch">';
                }
                $safeName = htmlspecialchars($name);
                $idSafe = strtolower(str_replace(' ', '-', $name));
            ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 d-flex justify-content-center mb-4 product-card"
                data-name="<?= $safeName ?>"
                data-category="Rifle"
                data-price="<?= $product['price'] ?>"
                data-color="Unknown"
                data-size="Full-size">
                <div class="card" style="height: 400px; width: 100%; background-color: #1e1e2f; border: 1px solid #444;">
                <img src="<?= $product['image'] ?>" class="card-img-top img-fluid" alt="<?= $safeName ?>" style="height: 180px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title" style="color: white;"><?= $safeName ?></h5>
                    <p style="color: white;"><?= $product['price'] ?>$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                    <span class="star-rating"><?= $product['rating'] ?> ★★★★☆</span>
                    <span class="ml-2" style="color: white;"><?= $product['sold'] ?> sold</span>
                    </div>
                    <div class="d-flex align-items-center mt-2" style="color: white; margin-top: 5px;">
                    In stock:
                    <button class="btn btn-secondary btn-sm ml-2" onclick="modifyStock('<?= $safeName ?>', -1)">-</button>
                    <span id="stock-count-<?= $idSafe ?>" class="mx-2"><?= $product['stock'] ?></span>
                    <button class="btn btn-secondary btn-sm" onclick="modifyStock('<?= $safeName ?>', 1)">+</button>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                    <button class="btn btn-outline-danger btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="deleteProduct('<?= $safeName ?>')">Delete</button>
                    </div>
                </div>
                </div>
            </div>
            <?php
                $counter++;
            endforeach;
            ?>
        </div>
        </div>

    <form action="add_product.php" method="POST" enctype="multipart/form-data" class="product-form">
    <h2>Add New Product</h2>
    
    <input type="text" name="name" placeholder="Product Name" required>
    <input type="number" step="0.01" name="price" placeholder="Price ($)" required>
    <input type="number" step="0.1" name="rating" placeholder="Rating (0-5)" required>
    <input type="number" name="sold" placeholder="Units Sold" required>
    <input type="number" name="stock" placeholder="Stock Available" required>
    
    <label class="file-upload">
        <span>Upload Image</span>
        <input type="file" name="image" accept="image/*" required>
    </label>
    
    <button type="submit" class="btn-submit">Add Product</button>
    </form>

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
</body>
</html>

     
 


