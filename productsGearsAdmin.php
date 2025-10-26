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
      <option value="Mask">Mask</option>
      <option value="Helmet">Helmet</option>
      <option value="Vest">Vest</option>
      <option value="Boots">Boots</option>
    </select>

    <input type="number" id="minPrice" placeholder="Min $" class="filter-input" />
    <input type="number" id="maxPrice" placeholder="Max $" class="filter-input" />

    <select id="filterColor" class="filter-select">
      <option value="">All Colors</option>
      <option value="Black">Black</option>
      <option value="Red">Red</option>
      <option value="Blue">Blue</option>
      <option value="Dessert Tan">Dessert Tan</option>
      <option value="Brown">Brown</option>
    </select>

    <select id="filterSize" class="filter-select">
      <option value="">All Sizes</option>
      <option value="One Size Fits All">One Size Fits All</option>
      <option value="Adjustable">Adjustable</option>
      <option value="Universal">Universal</option>
      <option value="Multiple Sizes">Multiple Sizes</option>
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

      
<br>  <h1> <center> Gears </center></h1> <br>

<div class="container text-center"> 
    <div class="row align-items-stretch">
        <?php if (isset($products['Cyberpunk Oni Mask'])): ?>
            <div class="col product-card" 
                data-name="Cyberpunk Oni Mask"
                data-category="Mask"
                data-price="<?= $products['Cyberpunk Oni Mask']['price'] ?>"
                data-color="Red"
                data-size="One Size Fits All">
                <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#productModalCyberpunkOniMask">
                    <img src="Cyberpunk Oni Mask.png" class="card-img-top img-fluid" alt="Cyberpunk Oni Mask" style="height: 180px; object-fit: cover;">
                </a>
                    <div class="card-body d-flex flex-column">
                        <h5 class="feature-title" style="color: white;">Cyberpunk Oni</h5>
                        <p style="color: white;"><?= $products['Cyberpunk Oni Mask']['price'] ?>$</p>
                        <div class="d-flex align-items-center" style="color: gold;">
                            <span><?= $products['Cyberpunk Oni Mask']['rating'] ?> ★★★★★</span>
                            <span style="margin-left: 5px; color: white;"><?= $products['Cyberpunk Oni Mask']['sold'] ?> sold</span>
                        </div>
                        <div class="d-flex align-items-center mt-2" style="color: white; margin-top: 5px;">
                            In stock: 
                            <button class="btn btn-secondary btn-sm" onclick="modifyStock('Cyberpunk Oni Mask', -1)">-</button>
                            <span id="stock-count-cyberpunk-oni-mask" class="mx-2"><?= $products['Cyberpunk Oni Mask']['stock'] ?? 0 ?></span>
                            <button class="btn btn-secondary btn-sm" onclick="modifyStock('Cyberpunk Oni Mask', 1)">+</button>
                        </div>
                        <div class="button-container mt-auto d-flex justify-content-center">
                            <button class="btn btn-outline-danger btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="deleteProduct('Cyberpunk Oni Mask')">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <?php if (isset($products['NINJA MASK BLK'])): ?>
            <div class="col product-card" 
                data-name="NINJA MASK BLK"
                data-category="Mask"
                data-price="<?= $products['NINJA MASK BLK']['price'] ?>"
                data-color="Black"
                data-size="One Size Fits All">
            <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
            <a href="javascript:void(0);" data-toggle="modal" data-target="#productModalNinjaMaskBlk">
                <img src="NINJA MASK BLK.png" class="card-img-top img-fluid" alt="NINJA MASK BLK" style="height: 180px; object-fit: cover;">
            </a>
                <div class="card-body d-flex flex-column">
                    <h5 class="feature-title" style="color: white;">NINJA MASK</h5>
                    <p style="color: white;"><?= $products['NINJA MASK BLK']['price'] ?>$</p>
                    <div class="d-flex align-items-center" style="color: gold;">
                        <span><?= $products['NINJA MASK BLK']['rating'] ?> ★★★★★</span>
                        <span style="margin-left: 5px; color: white;"><?= $products['NINJA MASK BLK']['sold'] ?> sold</span>
                    </div>
                    <div class="d-flex align-items-center mt-2" style="color: white; margin-top: 5px;">
                        In stock: 
                        <button class="btn btn-secondary btn-sm" onclick="modifyStock('NINJA MASK BLK', -1)">-</button>
                        <span id="stock-count-ninja-mask-blk" class="mx-2"><?= $products['NINJA MASK BLK']['stock'] ?? 0 ?></span>
                        <button class="btn btn-secondary btn-sm" onclick="modifyStock('NINJA MASK BLK', 1)">+</button>
                    </div>
                    <div class="button-container mt-auto d-flex justify-content-center">
                        <button class="btn btn-outline-danger btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="deleteProduct('NINJA MASK BLK')">Delete</button>
                    </div>
                </div>
            </div>
            </div>
        <?php endif; ?>

        <?php if (isset($products['KRAKEN MASK'])): ?>
            <div class="col product-card" 
                data-name="KRAKEN MASK"
                data-category="Mask"
                data-price="<?= $products['KRAKEN MASK']['price'] ?>"
                data-color="Dessert Tan"
                data-size="One Size Fits All">
                <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#productModalKrakenMask">
                    <img src="KRAKEN MASK.png" class="card-img-top img-fluid" alt="KRAKEN MASK" style="height: 180px; object-fit: cover;">
                </a>
                    <div class="card-body d-flex flex-column">
                        <h5 class="feature-title" style="color: white;">KRAKEN MASK</h5>
                        <p style="color: white;"><?= $products['KRAKEN MASK']['price'] ?>$</p>
                        <div class="d-flex align-items-center" style="color: gold;">
                            <span><?= $products['KRAKEN MASK']['rating'] ?> ★★★★★</span>
                            <span style="margin-left: 5px; color: white;"><?= $products['KRAKEN MASK']['sold'] ?> sold</span>
                        </div>
                        <div class="d-flex align-items-center mt-2" style="color: white; margin-top: 5px;">
                            In stock: 
                            <button class="btn btn-secondary btn-sm" onclick="modifyStock('KRAKEN MASK', -1)">-</button>
                            <span id="stock-count-kraken-mask" class="mx-2"><?= $products['KRAKEN MASK']['stock'] ?? 0 ?></span>
                            <button class="btn btn-secondary btn-sm" onclick="modifyStock('KRAKEN MASK', 1)">+</button>
                        </div>
                        <div class="button-container mt-auto d-flex justify-content-center">
                            <button class="btn btn-outline-danger btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="deleteProduct('KRAKEN MASK')">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (isset($products['TACTICAL HELMET BLK'])): ?>
            <div class="col product-card" 
                data-name="TACTICAL HELMET BLK"
                data-category="Helmet"
                data-price="<?= $products['TACTICAL HELMET BLK']['price'] ?>"
                data-color="Black"
                data-size="Adjustable">
                <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#productModalTacticalHelmetBlk">
                    <img src="TACTICAL HELMET BLK.png" class="card-img-top img-fluid" alt="TACTICAL HELMET BLK" style="height: 180px; object-fit: cover;">
                </a>
                    <div class="card-body d-flex flex-column">
                        <h6 class="feature-title" style="color: white;">TACTICAL HELMET</h6>
                        <p style="color: white;"><?= $products['TACTICAL HELMET BLK']['price'] ?>$</p>
                        <div class="d-flex align-items-center" style="color: gold;">
                            <span><?= $products['TACTICAL HELMET BLK']['rating'] ?> ★★★★★</span>
                            <span style="margin-left: 5px; color: white;"><?= $products['TACTICAL HELMET BLK']['sold'] ?> sold</span>
                        </div>
                        <div class="d-flex align-items-center mt-2" style="color: white; margin-top: 5px;">
                            In stock: 
                            <button class="btn btn-secondary btn-sm" onclick="modifyStock('TACTICAL HELMET BLK', -1)">-</button>
                            <span id="stock-count-tactical-helmet-blk" class="mx-2"><?= $products['TACTICAL HELMET BLK']['stock'] ?? 0 ?></span>
                            <button class="btn btn-secondary btn-sm" onclick="modifyStock('TACTICAL HELMET BLK', 1)">+</button>
                        </div>
                        <div class="button-container mt-auto d-flex justify-content-center">
                            <button class="btn btn-outline-danger btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="deleteProduct('TACTICAL HELMET BLK')">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (isset($products['JW MASK BLACK'])): ?>
            <div class="col product-card" 
                data-name="JW MASK BLACK"
                data-category="Mask"
                data-price="<?= $products['JW MASK BLACK']['price'] ?>"
                data-color="Black"
                data-size="One Size Fits All">
                <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#productModalJwMaskBlack">
                    <img src="JW MASK BLACK.png" class="card-img-top img-fluid" alt="JW MASK BLACK" style="height: 180px; object-fit: cover;">
                </a>
                    <div class="card-body d-flex flex-column">
                        <h5 class="feature-title" style="color: white;">JW MASK BLACK</h5>
                        <p style="color: white;"><?= $products['JW MASK BLACK']['price'] ?>$</p>
                        <div class="d-flex align-items-center" style="color: gold;">
                            <span><?= $products['JW MASK BLACK']['rating'] ?> ★★★★★</span>
                            <span style="margin-left: 5px; color: white;"><?= $products['JW MASK BLACK']['sold'] ?> sold</span>
                        </div>
                        <div class="d-flex align-items-center mt-2" style="color: white; margin-top: 5px;">
                            In stock: 
                            <button class="btn btn-secondary btn-sm" onclick="modifyStock('JW MASK BLACK', -1)">-</button>
                            <span id="stock-count-jw-mask-black" class="mx-2"><?= $products['JW MASK BLACK']['stock'] ?? 0 ?></span>
                            <button class="btn btn-secondary btn-sm" onclick="modifyStock('JW MASK BLACK', 1)">+</button>
                        </div>
                        <div class="button-container mt-auto d-flex justify-content-center">
                            <button class="btn btn-outline-danger btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="deleteProduct('JW MASK BLACK')">Delete</button>
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

        <?php if (isset($products['Rothco Tactical Molle Plate Carrier Vest'])): ?>
            <div class="col product-card" 
                data-name="Rothco Tactical Molle Plate Carrier Vest"
                data-category="Vest"
                data-price="<?= $products['Rothco Tactical Molle Plate Carrier Vest']['price'] ?>"
                data-color="Dessert Tan"
                data-size="Adjustable">
                <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#productModalRothcoVest">
                    <img src="Rothco Tactical Molle Plate Carrier Vest.png" class="card-img-top img-fluid" alt="Rothco Tactical Molle Plate Carrier Vest" style="height: 180px; object-fit: cover;">
                </a>
                    <div class="card-body d-flex flex-column">
                        <h5 class="feature-title" style="color: white;">Carrier Vest</h5>
                        <p style="color: white;"><?= $products['Rothco Tactical Molle Plate Carrier Vest']['price'] ?>$</p>
                        <div class="d-flex align-items-center" style="color: gold;">
                            <span><?= $products['Rothco Tactical Molle Plate Carrier Vest']['rating'] ?> ★★★★★</span>
                            <span style="margin-left: 5px; color: white;"><?= $products['Rothco Tactical Molle Plate Carrier Vest']['sold'] ?> sold</span>
                        </div>
                        <div class="d-flex align-items-center mt-2" style="color: white; margin-top: 5px;">
                            In stock: 
                            <button class="btn btn-secondary btn-sm" onclick="modifyStock('Rothco Tactical Molle Plate Carrier Vest', -1)">-</button>
                            <span id="stock-count-rothco-tactical-molle-plate-carrier-vest" class="mx-2"><?= $products['Rothco Tactical Molle Plate Carrier Vest']['stock'] ?? 0 ?></span>
                            <button class="btn btn-secondary btn-sm" onclick="modifyStock('Rothco Tactical Molle Plate Carrier Vest', 1)">+</button>
                        </div>
                        <div class="button-container mt-auto d-flex justify-content-center">
                            <button class="btn btn-outline-danger btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="deleteProduct('Rothco Tactical Molle Plate Carrier Vest')">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <?php if (isset($products['Elite Survival Systems Commandant Tactical Vest'])): ?>
            <div class="col product-card" 
                data-name="Elite Survival Systems Commandant Tactical Vest"
                data-category="Vest"
                data-price="<?= $products['Elite Survival Systems Commandant Tactical Vest']['price'] ?>"
                data-color="Black"
                data-size="Adjustable">
                <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#productModalEliteVest">
                    <img src="Elite Survival Systems Commandant Tactical Vest.png" class="card-img-top img-fluid" alt="Elite Survival Systems Commandant Tactical Vest" style="height: 180px; object-fit: cover;">
                </a>
                    <div class="card-body d-flex flex-column">
                        <h5 class="feature-title" style="color: white;">Tactical Vest</h5>
                        <p style="color: white;"><?= $products['Elite Survival Systems Commandant Tactical Vest']['price'] ?>$</p>
                        <div class="d-flex align-items-center" style="color: gold;">
                            <span><?= $products['Elite Survival Systems Commandant Tactical Vest']['rating'] ?> ★★★★★</span>
                            <span style="margin-left: 5px; color: white;"><?= $products['Elite Survival Systems Commandant Tactical Vest']['sold'] ?> sold</span>
                        </div>
                        <div class="d-flex align-items-center mt-2" style="color: white; margin-top: 5px;">
                            In stock: 
                            <button class="btn btn-secondary btn-sm" onclick="modifyStock('Elite Survival Systems Commandant Tactical Vest', -1)">-</button>
                            <span id="stock-count-elite-survival-systems-commandant-tactical-vest" class="mx-2"><?= $products['Elite Survival Systems Commandant Tactical Vest']['stock'] ?? 0 ?></span>
                            <button class="btn btn-secondary btn-sm" onclick="modifyStock('Elite Survival Systems Commandant Tactical Vest', 1)">+</button>
                        </div>
                        <div class="button-container mt-auto d-flex justify-content-center">
                            <button class="btn btn-outline-danger btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="deleteProduct('Elite Survival Systems Commandant Tactical Vest')">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (isset($products['Elbeco BodyShield External Vest Carrier V4'])): ?>
            <div class="col product-card" 
                data-name="Elbeco BodyShield External Vest Carrier V4"
                data-category="Vest"
                data-price="<?= $products['Elbeco BodyShield External Vest Carrier V4']['price'] ?>"
                data-color="Black"
                data-size="Universal">
                <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#productModalElbecoVest">
                    <img src="Elbeco BodyShield External Vest Carrier V4.png" class="card-img-top img-fluid" alt="Elbeco BodyShield External Vest Carrier V4" style="height: 180px; object-fit: cover;">
                </a>
                    <div class="card-body d-flex flex-column">
                        <h6 class="feature-title" style="color: white;">Elbeco BodyShield</h6>
                        <p style="color: white;"><?= $products['Elbeco BodyShield External Vest Carrier V4']['price'] ?>$</p>
                        <div class="d-flex align-items-center" style="color: gold;">
                            <span><?= $products['Elbeco BodyShield External Vest Carrier V4']['rating'] ?> ★★★★★</span>
                            <span style="margin-left: 5px; color: white;"><?= $products['Elbeco BodyShield External Vest Carrier V4']['sold'] ?> sold</span>
                        </div>
                        <div class="d-flex align-items-center mt-2" style="color: white; margin-top: 5px;">
                            In stock: 
                            <button class="btn btn-secondary btn-sm" onclick="modifyStock('Elbeco BodyShield External Vest Carrier V4', -1)">-</button>
                            <span id="stock-count-elbeco-bodyshield-external-vest-carrier-v4" class="mx-2"><?= $products['Elbeco BodyShield External Vest Carrier V4']['stock'] ?? 0 ?></span>
                            <button class="btn btn-secondary btn-sm" onclick="modifyStock('Elbeco BodyShield External Vest Carrier V4', 1)">+</button>
                        </div>
                        <div class="button-container mt-auto d-flex justify-content-center">
                            <button class="btn btn-outline-danger btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="deleteProduct('Elbeco BodyShield External Vest Carrier V4')">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (isset($products['Blackhawk Omega Elite Cross Draw Vest'])): ?>
            <div class="col product-card" 
                data-name="Blackhawk Omega Elite Cross Draw Vest"
                data-category="Vest"
                data-price="<?= $products['Blackhawk Omega Elite Cross Draw Vest']['price'] ?>"
                data-color="Black"
                data-size="Adjustable">
                <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#productModalBlackhawkVest">
                    <img src="Blackhawk Omega Elite Cross Draw Vest.png" class="card-img-top img-fluid" alt="Blackhawk Omega Elite Cross Draw Vest" style="height: 180px; object-fit: cover;">
                </a>
                    <div class="card-body d-flex flex-column">
                        <h6 class="feature-title" style="color:white;">Blackhawk Vest</h6>
                        <p style="color: white;"><?= $products['Blackhawk Omega Elite Cross Draw Vest']['price'] ?>$</p>
                        <div class="d-flex align-items-center" style="color: gold;">
                            <span><?= $products['Blackhawk Omega Elite Cross Draw Vest']['rating'] ?> ★★★★★</span>
                            <span style="margin-left: 5px; color: white;"><?= $products['Blackhawk Omega Elite Cross Draw Vest']['sold'] ?> sold</span>
                        </div>
                        <div class="d-flex align-items-center mt-2" style="color: white; margin-top: 5px;">
                            In stock: 
                            <button class="btn btn-secondary btn-sm" onclick="modifyStock('Blackhawk Omega Elite Cross Draw Vest', -1)">-</button>
                            <span id="stock-count-blackhawk-omega-elite-cross-draw-vest" class="mx-2"><?= $products['Blackhawk Omega Elite Cross Draw Vest']['stock'] ?? 0 ?></span>
                            <button class="btn btn-secondary btn-sm" onclick="modifyStock('Blackhawk Omega Elite Cross Draw Vest', 1)">+</button>
                        </div>
                        <div class="button-container mt-auto d-flex justify-content-center">
                            <button class="btn btn-outline-danger btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="deleteProduct('Blackhawk Omega Elite Cross Draw Vest')">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <?php if (isset($products['Tasmanian Tiger Vest Base Plus MKII'])): ?>
            <div class="col product-card" 
                data-name="Tasmanian Tiger Vest Base Plus MKII"
                data-category="Vest"
                data-price="<?= $products['Tasmanian Tiger Vest Base Plus MKII']['price'] ?>"
                data-color="Black"
                data-size="Adjustable">
                <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#productModalTasmanianTigerVest">
                    <img src="Tasmanian Tiger Vest Base Plus MKII.png" class="card-img-top img-fluid" alt="Tasmanian Tiger Vest Base Plus MKII" style="height: 180px; object-fit: cover;">
                </a>
                    <div class="card-body d-flex flex-column">
                        <h6 class="feature-title" style="color:white;">Tasmanian Vest</h6>
                        <p style="color: white;"><?= $products['Tasmanian Tiger Vest Base Plus MKII']['price'] ?>$</p>
                        <div class="d-flex align-items-center" style="color: gold;">
                            <span><?= $products['Tasmanian Tiger Vest Base Plus MKII']['rating'] ?> ★★★★★</span>
                            <span style="margin-left: 5px; color: white;"><?= $products['Tasmanian Tiger Vest Base Plus MKII']['sold'] ?> sold</span>
                        </div>
                        <div class="d-flex align-items-center mt-2" style="color: white; margin-top: 5px;">
                            In stock: 
                            <button class="btn btn-secondary btn-sm" onclick="modifyStock('Tasmanian Tiger Vest Base Plus MKII', -1)">-</button>
                            <span id="stock-count-tasmanian-tiger-vest-base-plus-mkii" class="mx-2"><?= $products['Tasmanian Tiger Vest Base Plus MKII']['stock'] ?? 0 ?></span>
                            <button class="btn btn-secondary btn-sm" onclick="modifyStock('Tasmanian Tiger Vest Base Plus MKII', 1)">+</button>
                        </div>
                        <div class="button-container mt-auto d-flex justify-content-center">
                            <button class="btn btn-outline-danger btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="deleteProduct('Tasmanian Tiger Vest Base Plus MKII')">Delete</button>
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
        
        <?php if (isset($products['Oakley Light Assault 3 Boots'])): ?>
            <div class="col product-card" 
                data-name="Oakley Light Assault 3 Boots"
                data-category="Boots"
                data-price="<?= $products['Oakley Light Assault 3 Boots']['price'] ?>"
                data-color="Dessert Tan"
                data-size="Multiple Sizes">
                <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#productModalOakleyBoots">
                    <img src="Oakley Light Assault 3 Boots.png" class="card-img-top img-fluid" alt="Oakley Light Assault 3 Boots" style="height: 180px; object-fit: cover;">
                </a>
                    <div class="card-body d-flex flex-column">
                        <h5 class="feature-title" style="color: white;">Assault Boots</h5>
                        <p style="color: white;"><?= $products['Oakley Light Assault 3 Boots']['price'] ?>$</p>
                        <div class="d-flex align-items-center" style="color: gold;">
                            <span><?= $products['Oakley Light Assault 3 Boots']['rating'] ?> ★★★★★</span>
                            <span style="margin-left: 5px; color: white;"><?= $products['Oakley Light Assault 3 Boots']['sold'] ?> sold</span>
                        </div>
                        <div class="d-flex align-items-center mt-2" style="color: white; margin-top: 5px;">
                            In stock: 
                            <button class="btn btn-secondary btn-sm" onclick="modifyStock('Oakley Light Assault 3 Boots', -1)">-</button>
                            <span id="stock-count-oakley-light-assault-3-boots" class="mx-2"><?= $products['Oakley Light Assault 3 Boots']['stock'] ?? 0 ?></span>
                            <button class="btn btn-secondary btn-sm" onclick="modifyStock('Oakley Light Assault 3 Boots', 1)">+</button>
                        </div>
                        <div class="button-container mt-auto d-flex justify-content-center">
                            <button class="btn btn-outline-danger btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="deleteProduct('Oakley Light Assault 3 Boots')">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (isset($products['Under Armour Charged Loadout Boots'])): ?>
            <div class="col product-card" 
                data-name="Under Armour Charged Loadout Boots"
                data-category="Boots"
                data-price="<?= $products['Under Armour Charged Loadout Boots']['price'] ?>"
                data-color="Dessert Tan"
                data-size="Multiple Sizes">
                <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#productModalUnderArmourBoots">
                    <img src="Under Armour Charged Loadout Boots.png" class="card-img-top img-fluid" alt="Under Armour Charged Loadout Boots" style="height: 180px; object-fit: cover;">
                </a>
                    <div class="card-body d-flex flex-column">
                        <h5 class="feature-title" style="color: white;">Loadout Boots</h5>
                        <p style="color: white;"><?= $products['Under Armour Charged Loadout Boots']['price'] ?>$</p>
                        <div class="d-flex align-items-center" style="color: gold;">
                            <span><?= $products['Under Armour Charged Loadout Boots']['rating'] ?> ★★★★★</span>
                            <span style="margin-left: 5px; color: white;"><?= $products['Under Armour Charged Loadout Boots']['sold'] ?> sold</span>
                        </div>
                        <div class="d-flex align-items-center mt-2" style="color: white; margin-top: 5px;">
                            In stock: 
                            <button class="btn btn-secondary btn-sm" onclick="modifyStock('Under Armour Charged Loadout Boots', -1)">-</button>
                            <span id="stock-count-under-armour-charged-loadout-boots" class="mx-2"><?= $products['Under Armour Charged Loadout Boots']['stock'] ?? 0 ?></span>
                            <button class="btn btn-secondary btn-sm" onclick="modifyStock('Under Armour Charged Loadout Boots', 1)">+</button>
                        </div>
                        <div class="button-container mt-auto d-flex justify-content-center">
                            <button class="btn btn-outline-danger btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="deleteProduct('Under Armour Charged Loadout Boots')">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (isset($products['Altama Maritime Assault Mid Boots'])): ?>
            <div class="col product-card" 
                data-name="Altama Maritime Assault Mid Boots"
                data-category="Boots"
                data-price="<?= $products['Altama Maritime Assault Mid Boots']['price'] ?>"
                data-color="Black"
                data-size="Multiple Sizes">
                <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#productModalAltamaBoots">
                    <img src="Altama Maritime Assault Mid Boots.jpg" class="card-img-top img-fluid" alt="Altama Maritime Assault Mid Boots" style="height: 180px; object-fit: cover;">
                </a>
                    <div class="card-body d-flex flex-column">
                        <h5 class="feature-title" style="color: white;">Altama Boots</h5>
                        <p style="color: white;"><?= $products['Altama Maritime Assault Mid Boots']['price'] ?>$</p>
                        <div class="d-flex align-items-center" style="color: gold;">
                            <span><?= $products['Altama Maritime Assault Mid Boots']['rating'] ?> ★★★★★</span>
                            <span style="margin-left: 5px; color: white;"><?= $products['Altama Maritime Assault Mid Boots']['sold'] ?> sold</span>
                        </div>
                        <div class="d-flex align-items-center mt-2" style="color: white; margin-top: 5px;">
                            In stock: 
                            <button class="btn btn-secondary btn-sm" onclick="modifyStock('Altama Maritime Assault Mid Boots', -1)">-</button>
                            <span id="stock-count-altama-maritime-assault-mid-boots" class="mx-2"><?= $products['Altama Maritime Assault Mid Boots']['stock'] ?? 0 ?></span>
                            <button class="btn btn-secondary btn-sm" onclick="modifyStock('Altama Maritime Assault Mid Boots', 1)">+</button>
                        </div>
                        <div class="button-container mt-auto d-flex justify-content-center">
                            <button class="btn btn-outline-danger btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="deleteProduct('Altama Maritime Assault Mid Boots')">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (isset($products['NIKE 8 SFB B2 Leather Boots'])): ?>
            <div class="col product-card" 
                data-name="NIKE 8 SFB B2 Leather Boots"
                data-category="Boots"
                data-price="<?= $products['NIKE 8 SFB B2 Leather Boots']['price'] ?>"
                data-color="Black"
                data-size="Multiple Sizes">
                <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#productModalNikeBoots">
                    <img src="NIKE 8 SFB B2 Leather Boots.png" class="card-img-top img-fluid" alt="NIKE 8 SFB B2 Leather Boots" style="height: 180px; object-fit: cover;">
                </a>
                    <div class="card-body d-flex flex-column">
                        <h5 class="feature-title" style="color: white;">NIKE 8 Boots</h5>
                        <p style="color: white;"><?= $products['NIKE 8 SFB B2 Leather Boots']['price'] ?>$</p>
                        <div class="d-flex align-items-center" style="color: gold;">
                            <span><?= $products['NIKE 8 SFB B2 Leather Boots']['rating'] ?> ★★★★★</span>
                            <span style="margin-left: 5px; color: white;"><?= $products['NIKE 8 SFB B2 Leather Boots']['sold'] ?> sold</span>
                        </div>
                        <div class="d-flex align-items-center mt-2" style="color: white; margin-top: 5px;">
                            In stock: 
                            <button class="btn btn-secondary btn-sm" onclick="modifyStock('NIKE 8 SFB B2 Leather Boots', -1)">-</button>
                            <span id="stock-count-nike-8-sfb-b2-leather-boots" class="mx-2"><?= $products['NIKE 8 SFB B2 Leather Boots']['stock'] ?? 0 ?></span>
                            <button class="btn btn-secondary btn-sm" onclick="modifyStock('NIKE 8 SFB B2 Leather Boots', 1)">+</button>
                        </div>
                        <div class="button-container mt-auto d-flex justify-content-center">
                            <button class="btn btn-outline-danger btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="deleteProduct('NIKE 8 SFB B2 Leather Boots')">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (isset($products['Danner 8 Tachyon Boots'])): ?>
            <div class="col product-card" 
                data-name="Danner 8 Tachyon Boots"
                data-category="Boots"
                data-price="<?= $products['Danner 8 Tachyon Boots']['price'] ?>"
                data-color="Black"
                data-size="Multiple Sizes">
                <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#productModalDannerBoots">
                    <img src="Danner 8 Tachyon Boots.png" class="card-img-top img-fluid" alt="Danner 8 Tachyon Boots" style="height: 180px; object-fit: cover;">
                </a>
                    <div class="card-body d-flex flex-column">
                        <h6 class="feature-title" style="color: white;">Danner 8 Tachyon</h6>
                        <p style="color: white;"><?= $products['Danner 8 Tachyon Boots']['price'] ?>$</p>
                        <div class="d-flex align-items-center" style="color: gold;">
                            <span><?= $products['Danner 8 Tachyon Boots']['rating'] ?> ★★★★★</span>
                            <span style="margin-left: 5px; color: white;"><?= $products['Danner 8 Tachyon Boots']['sold'] ?> sold</span>
                        </div>
                        <div class="d-flex align-items-center mt-2" style="color: white; margin-top: 5px;">
                            In stock: 
                            <button class="btn btn-secondary btn-sm" onclick="modifyStock('Danner 8 Tachyon Boots', -1)">-</button>
                            <span id="stock-count-danner-8-tachyon-boots" class="mx-2"><?= $products['Danner 8 Tachyon Boots']['stock'] ?? 0 ?></span>
                            <button class="btn btn-secondary btn-sm" onclick="modifyStock('Danner 8 Tachyon Boots', 1)">+</button>
                        </div>
                        <div class="button-container mt-auto d-flex justify-content-center">
                            <button class="btn btn-outline-danger btn-sm" style="font-size: 0.8em; white-space: nowrap;" onclick="deleteProduct('Danner 8 Tachyon Boots')">Delete</button>
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

     
 


