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
    <script src="products.js"></script>
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

<div class="modal fade" id="productModalCyberpunkOniMask" tabindex="-1" role="dialog" aria-labelledby="productModalLabelCyberpunkOniMask" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #1e1e2f; color: #fff; border-radius: 8px;">
      <div class="modal-header border-0">
        <h5 class="modal-title font-weight-bold" id="productModalLabelCyberpunkOniMask">Cyberpunk Oni Mask</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 1.5rem;">&times;</span>
        </button>
      </div>

      <div class="modal-body row no-gutters">
        <!-- Left: Carousel -->
        <div class="col-md-6 pr-3">
          <div id="oniMaskCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner rounded">
              <div class="carousel-item active">
                <video class="d-block w-100 rounded" style="height: 300px; object-fit: cover;" controls>
                  <source src="Cyberpunk Oni Mask.mp4" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
              </div>
              <div class="carousel-item">
                <img src="Cyberpunk Oni Mask Side View.png" class="d-block w-100 rounded" alt="Cyberpunk Oni Mask Side 1" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="Cyberpunk Oni Mask Side View1.png" class="d-block w-100 rounded" alt="Cyberpunk Oni Mask Side 1" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="Cyberpunk Oni Mask Side View2.png" class="d-block w-100 rounded" alt="Cyberpunk Oni Mask Side 2" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="Cyberpunk Oni Mask Side View3.png" class="d-block w-100 rounded" alt="Cyberpunk Oni Mask Back" style="height: 300px; object-fit: cover;">
              </div>
            </div>
            <a class="carousel-control-prev custom-carousel-arrow" href="#oniMaskCarousel" role="button" data-slide="prev">
              <span class="fa fa-chevron-left"></span>
            </a>
            <a class="carousel-control-next custom-carousel-arrow" href="#oniMaskCarousel" role="button" data-slide="next">
              <span class="fa fa-chevron-right"></span>
            </a>
          </div>
        </div>

        <!-- Right: Product Info -->
        <div class="col-md-6 pl-3 d-flex flex-column justify-content-between">
          <div>
            <h4 class="text-success font-weight-bold mb-3">Price: <?= $products['Cyberpunk Oni Mask']['price'] ?>$</h4>
            <p><i class="fa fa-cogs text-warning mr-1"></i><strong>Style:</strong> LED / Cosplay</p>
            <p><i class="fa fa-shopping-cart text-info mr-1"></i><strong>Sold:</strong> <?= $products['Cyberpunk Oni Mask']['sold'] ?></p>
            <p><i class="fa fa-star text-success mr-1"></i><strong>Rating:</strong> <?= $products['Cyberpunk Oni Mask']['rating'] ?> ★★★★★</p>

            <hr style="border-color: #444;">

            <h6 class="font-weight-bold">Description</h6>
            <p class="small">
              The Cyberpunk Oni Mask is a futuristic, LED-illuminated mask inspired by traditional Japanese oni aesthetics. Designed for raves, cosplay, or futuristic streetwear, it turns heads in any environment.
            </p>

            <h6 class="font-weight-bold">Specifications</h6>
            <ul class="small">
              <li>Material: ABS Plastic</li>
              <li>Lighting: LED (Multiple Modes)</li>
              <li>Power: Rechargeable via USB</li>
              <li>Color: Red with Neon Accents</li>
              <li>Size: One Size Fits All (Adjustable Straps)</li>
              <li>Weight: Approx. 250g</li>
            </ul>
          </div>

          <!-- Buttons -->
          <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success d-flex align-items-center justify-content-center w-50 mr-2 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              onclick="confirmPurchase('Cyberpunk Oni Mask', <?= $products['Cyberpunk Oni Mask']['price'] ?>, 'Cyberpunk Oni Mask.png'); modifyStock('Cyberpunk Oni Mask', -1)">
              <i class="fa fa-credit-card mr-2"></i> Buy Now
            </button>

            <button class="btn btn-outline-light add-to-cart btn-sm d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              data-name="Cyberpunk Oni Mask"
              data-price="<?= $products['Cyberpunk Oni Mask']['price'] ?>"
              data-image="Cyberpunk Oni Mask.png"
              onclick="addDBuy('Cyberpunk Oni Mask', 1, <?= $products['Cyberpunk Oni Mask']['price'] ?>); alert('Added to cart')">
              <i class="fa fa-shopping-cart mr-2"></i> Add to Cart
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="productModalNinjaMaskBLK" tabindex="-1" role="dialog" aria-labelledby="productModalLabelNinjaMaskBLK" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #1e1e2f; color: #fff; border-radius: 8px;">
      <div class="modal-header border-0">
        <h5 class="modal-title font-weight-bold" id="productModalLabelNinjaMaskBLK">NINJA MASK BLK</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 1.5rem;">&times;</span>
        </button>
      </div>

      <div class="modal-body row no-gutters">
        <!-- Left: Carousel -->
        <div class="col-md-6 pr-3">
          <div id="ninjaMaskCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner rounded">
              <div class="carousel-item active">
                <video class="d-block w-100 rounded" style="height: 300px; object-fit: cover;" controls>
                  <source src="NINJA MASK BLK.mp4" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
              </div>
              <div class="carousel-item">
                <img src="NINJA MASK BLK Side View.png" class="d-block w-100 rounded" alt="NINJA MASK BLK Side 1" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="NINJA MASK BLK Side View1.png" class="d-block w-100 rounded" alt="NINJA MASK BLK Side 2" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="NINJA MASK BLK Side View2.png" class="d-block w-100 rounded" alt="NINJA MASK BLK Side 2" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="NINJA MASK BLK Side View3.png" class="d-block w-100 rounded" alt="NINJA MASK BLK Side 2" style="height: 300px; object-fit: cover;">
              </div>
            </div>
            <a class="carousel-control-prev custom-carousel-arrow" href="#ninjaMaskCarousel" role="button" data-slide="prev">
              <span class="fa fa-chevron-left"></span>
            </a>
            <a class="carousel-control-next custom-carousel-arrow" href="#ninjaMaskCarousel" role="button" data-slide="next">
              <span class="fa fa-chevron-right"></span>
            </a>
          </div>
        </div>

        <!-- Right: Product Info -->
        <div class="col-md-6 pl-3 d-flex flex-column justify-content-between">
          <div>
            <h4 class="text-success font-weight-bold mb-3">Price: <?= $products['NINJA MASK BLK']['price'] ?>$</h4>
            <p><i class="fa fa-cogs text-warning mr-1"></i><strong>Style:</strong> Tactical / Stealth</p>
            <p><i class="fa fa-shopping-cart text-info mr-1"></i><strong>Sold:</strong> <?= $products['NINJA MASK BLK']['sold'] ?></p>
            <p><i class="fa fa-star text-success mr-1"></i><strong>Rating:</strong> <?= $products['NINJA MASK BLK']['rating'] ?> ★★★★★</p>

            <hr style="border-color: #444;">

            <h6 class="font-weight-bold">Description</h6>
            <p class="small">
              The NINJA MASK BLK is a lightweight, breathable tactical mask designed for stealth, speed, and style. Ideal for martial arts, cosplay, or covert operations, this mask offers full coverage while remaining comfortable during extended wear.
            </p>

            <h6 class="font-weight-bold">Specifications</h6>
            <ul class="small">
              <li>Material: Breathable Spandex & Cotton Blend</li>
              <li>Color: Matte Black</li>
              <li>Size: One Size Fits All</li>
              <li>Weight: ~120g</li>
              <li>Use Case: Cosplay, Martial Arts, Tactical Events</li>
              <li>Washable: Yes (Hand Wash Recommended)</li>
            </ul>
          </div>

          <!-- Buttons -->
          <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success d-flex align-items-center justify-content-center w-50 mr-2 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              onclick="confirmPurchase('NINJA MASK BLK', <?= $products['NINJA MASK BLK']['price'] ?>, 'NINJA MASK BLK.png'); modifyStock('NINJA MASK BLK', -1)">
              <i class="fa fa-credit-card mr-2"></i> Buy Now
            </button>

            <button class="btn btn-outline-light add-to-cart btn-sm d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              data-name="NINJA MASK BLK"
              data-price="<?= $products['NINJA MASK BLK']['price'] ?>"
              data-image="NINJA MASK BLK.png"
              onclick="addDBuy('NINJA MASK BLK', 1, <?= $products['NINJA MASK BLK']['price'] ?>); alert('Added to cart')">
              <i class="fa fa-shopping-cart mr-2"></i> Add to Cart
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="productModalKrakenMask" tabindex="-1" role="dialog" aria-labelledby="productModalLabelKrakenMask" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #1e1e2f; color: #fff; border-radius: 8px;">
      <div class="modal-header border-0">
        <h5 class="modal-title font-weight-bold" id="productModalLabelKrakenMask">KRAKEN MASK</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 1.5rem;">&times;</span>
        </button>
      </div>

      <div class="modal-body row no-gutters">
        <!-- Left: Carousel -->
        <div class="col-md-6 pr-3">
          <div id="krakenMaskCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner rounded">
              <div class="carousel-item active">
                <video class="d-block w-100 rounded" style="height: 300px; object-fit: cover;" controls>
                  <source src="KRAKEN MASK.mp4" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
              </div>
              <div class="carousel-item">
                <img src="KRAKEN MASK Side View.png" class="d-block w-100 rounded" alt="KRAKEN MASK Side 1" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="KRAKEN MASK Side View1.png" class="d-block w-100 rounded" alt="KRAKEN MASK Side 1" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="KRAKEN MASK Side View2.png" class="d-block w-100 rounded" alt="KRAKEN MASK Side 2" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="KRAKEN MASK Side View3.png" class="d-block w-100 rounded" alt="KRAKEN MASK Side 1" style="height: 300px; object-fit: cover;">
              </div>
            </div>
            <a class="carousel-control-prev custom-carousel-arrow" href="#krakenMaskCarousel" role="button" data-slide="prev">
              <span class="fa fa-chevron-left"></span>
            </a>
            <a class="carousel-control-next custom-carousel-arrow" href="#krakenMaskCarousel" role="button" data-slide="next">
              <span class="fa fa-chevron-right"></span>
            </a>
          </div>
        </div>

        <!-- Right: Product Info -->
        <div class="col-md-6 pl-3 d-flex flex-column justify-content-between">
          <div>
            <h4 class="text-success font-weight-bold mb-3">Price: <?= $products['KRAKEN MASK']['price'] ?>$</h4>
            <p><i class="fa fa-cogs text-warning mr-1"></i><strong>Theme:</strong> Deep Sea Horror / Cyber</p>
            <p><i class="fa fa-shopping-cart text-info mr-1"></i><strong>Sold:</strong> <?= $products['KRAKEN MASK']['sold'] ?></p>
            <p><i class="fa fa-star text-success mr-1"></i><strong>Rating:</strong> <?= $products['KRAKEN MASK']['rating'] ?> ★★★★★</p>

            <hr style="border-color: #444;">

            <h6 class="font-weight-bold">Description</h6>
            <p class="small">
              The KRAKEN MASK is a haunting deep-sea creature-inspired facepiece with bio-mechanical styling. Designed to evoke fear and fascination, this mask is perfect for cyberpunk-themed events, horror cosplay, or high-tech costume displays.
            </p>

            <h6 class="font-weight-bold">Specifications</h6>
            <ul class="small">
              <li>Material: Resin + LED Accents</li>
              <li>Color: Blue / Black</li>
              <li>Lighting: Battery Powered LED Eyes</li>
              <li>Size: One Size (Adjustable)</li>
              <li>Weight: ~350g</li>
              <li>Use Case: Cosplay, Horror Events, Collectibles</li>
            </ul>
          </div>

          <!-- Buttons -->
          <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success d-flex align-items-center justify-content-center w-50 mr-2 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              onclick="confirmPurchase('KRAKEN MASK', <?= $products['KRAKEN MASK']['price'] ?>, 'KRAKEN MASK.png'); modifyStock('KRAKEN MASK', -1)">
              <i class="fa fa-credit-card mr-2"></i> Buy Now
            </button>

            <button class="btn btn-outline-light add-to-cart btn-sm d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              data-name="KRAKEN MASK"
              data-price="<?= $products['KRAKEN MASK']['price'] ?>"
              data-image="KRAKEN MASK.png"
              onclick="addDBuy('KRAKEN MASK', 1, <?= $products['KRAKEN MASK']['price'] ?>); alert('Added to cart')">
              <i class="fa fa-shopping-cart mr-2"></i> Add to Cart
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="productModalTacticalHelmetBLK" tabindex="-1" role="dialog" aria-labelledby="productModalLabelTacticalHelmetBLK" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #1e1e2f; color: #fff; border-radius: 8px;">
      <div class="modal-header border-0">
        <h5 class="modal-title font-weight-bold" id="productModalLabelTacticalHelmetBLK">TACTICAL HELMET BLK</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 1.5rem;">&times;</span>
        </button>
      </div>

      <div class="modal-body row no-gutters">
        <!-- Left: Carousel -->
        <div class="col-md-6 pr-3">
          <div id="tacticalHelmetCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner rounded">
              <div class="carousel-item active">
                <video class="d-block w-100 rounded" style="height: 300px; object-fit: cover;" controls>
                  <source src="TACTICAL HELMET BLK.mp4" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
              </div>
              <div class="carousel-item">
                <img src="TACTICAL HELMET BLK Side View.png" class="d-block w-100 rounded" alt="TACTICAL HELMET BLK Side 1" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="TACTICAL HELMET BLK Side View1.png" class="d-block w-100 rounded" alt="TACTICAL HELMET BLK Side 2" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="TACTICAL HELMET BLK Side View2.png" class="d-block w-100 rounded" alt="TACTICAL HELMET BLK Side 2" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="TACTICAL HELMET BLK Side View3.png" class="d-block w-100 rounded" alt="TACTICAL HELMET BLK Side 2" style="height: 300px; object-fit: cover;">
              </div>
            </div>
            <a class="carousel-control-prev custom-carousel-arrow" href="#tacticalHelmetCarousel" role="button" data-slide="prev">
              <span class="fa fa-chevron-left"></span>
            </a>
            <a class="carousel-control-next custom-carousel-arrow" href="#tacticalHelmetCarousel" role="button" data-slide="next">
              <span class="fa fa-chevron-right"></span>
            </a>
          </div>
        </div>

        <!-- Right: Product Info -->
        <div class="col-md-6 pl-3 d-flex flex-column justify-content-between">
          <div>
            <h4 class="text-success font-weight-bold mb-3">Price: <?= $products['TACTICAL HELMET BLK']['price'] ?>$</h4>
            <p><i class="fa fa-cogs text-warning mr-1"></i><strong>Type:</strong> Ballistic/Training Use</p>
            <p><i class="fa fa-shopping-cart text-info mr-1"></i><strong>Sold:</strong> <?= $products['TACTICAL HELMET BLK']['sold'] ?></p>
            <p><i class="fa fa-star text-success mr-1"></i><strong>Rating:</strong> <?= $products['TACTICAL HELMET BLK']['rating'] ?> ★★★★★</p>

            <hr style="border-color: #444;">

            <h6 class="font-weight-bold">Description</h6>
            <p class="small">
              The TACTICAL HELMET BLK offers advanced head protection for airsoft, paintball, and tactical training. With its modular rail system and matte black finish, it balances function and style for field-ready utility.
            </p>

            <h6 class="font-weight-bold">Specifications</h6>
            <ul class="small">
              <li>Material: High-Density Polymer Shell</li>
              <li>Color: Matte Black</li>
              <li>Size: Adjustable (Head Circumference 54–62cm)</li>
              <li>Weight: ~800g</li>
              <li>Side Rails: Yes (for Flashlight, GoPro, etc.)</li>
              <li>Use Case: Tactical Training, Airsoft, Paintball</li>
            </ul>
          </div>

          <!-- Buttons -->
          <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success d-flex align-items-center justify-content-center w-50 mr-2 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              onclick="confirmPurchase('TACTICAL HELMET BLK', <?= $products['TACTICAL HELMET BLK']['price'] ?>, 'TACTICAL HELMET BLK.jpg'); modifyStock('TACTICAL HELMET BLK', -1)">
              <i class="fa fa-credit-card mr-2"></i> Buy Now
            </button>

            <button class="btn btn-outline-light add-to-cart btn-sm d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              data-name="TACTICAL HELMET BLK"
              data-price="<?= $products['TACTICAL HELMET BLK']['price'] ?>"
              data-image="TACTICAL HELMET BLK.jpg"
              onclick="addDBuy('TACTICAL HELMET BLK', 1, <?= $products['TACTICAL HELMET BLK']['price'] ?>); alert('Added to cart')">
              <i class="fa fa-shopping-cart mr-2"></i> Add to Cart
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="productModalJwMaskBlack" tabindex="-1" role="dialog" aria-labelledby="productModalLabelJwMaskBlack" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #1e1e2f; color: #fff; border-radius: 8px;">
      <div class="modal-header border-0">
        <h5 class="modal-title font-weight-bold" id="productModalLabelJwMaskBlack">JW MASK BLACK</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 1.5rem;">&times;</span>
        </button>
      </div>

      <div class="modal-body row no-gutters">
        <!-- Left: Carousel -->
        <div class="col-md-6 pr-3">
          <div id="jwMaskCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner rounded">
              <div class="carousel-item active">
                <video class="d-block w-100 rounded" style="height: 300px; object-fit: cover;" controls>
                  <source src="JW MASK BLACK.mp4" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
              </div>
              <div class="carousel-item">
                <img src="JW MASK BLACK Side View.png" class="d-block w-100 rounded" alt="JW MASK BLACK Side 1" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="JW MASK BLACK Side View1.png" class="d-block w-100 rounded" alt="JW MASK BLACK Side 1" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="JW MASK BLACK Side View2.png" class="d-block w-100 rounded" alt="JW MASK BLACK Side 2" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="JW MASK BLACK Side View3.png" class="d-block w-100 rounded" alt="JW MASK BLACK Side 1" style="height: 300px; object-fit: cover;">
              </div>
            </div>
            <a class="carousel-control-prev custom-carousel-arrow" href="#jwMaskCarousel" role="button" data-slide="prev">
              <span class="fa fa-chevron-left"></span>
            </a>
            <a class="carousel-control-next custom-carousel-arrow" href="#jwMaskCarousel" role="button" data-slide="next">
              <span class="fa fa-chevron-right"></span>
            </a>
          </div>
        </div>

        <!-- Right: Product Info -->
        <div class="col-md-6 pl-3 d-flex flex-column justify-content-between">
          <div>
            <h4 class="text-success font-weight-bold mb-3">Price: <?= $products['JW MASK BLACK']['price'] ?>$</h4>
            <p><i class="fa fa-cogs text-warning mr-1"></i><strong>Theme:</strong> Stealth / Tactical Ops</p>
            <p><i class="fa fa-shopping-cart text-info mr-1"></i><strong>Sold:</strong> <?= $products['JW MASK BLACK']['sold'] ?></p>
            <p><i class="fa fa-star text-success mr-1"></i><strong>Rating:</strong> <?= $products['JW MASK BLACK']['rating'] ?> ★★★★★</p>

            <hr style="border-color: #444;">

            <h6 class="font-weight-bold">Description</h6>
            <p class="small">
              The JW MASK BLACK is a sleek, minimalist tactical mask designed for covert operations, cosplay, or airsoft loadouts. Lightweight yet durable, it’s inspired by elite assassins and special ops visuals.
            </p>

            <h6 class="font-weight-bold">Specifications</h6>
            <ul class="small">
              <li>Material: Matte Resin + Mesh</li>
              <li>Color: Jet Black</li>
              <li>Breathability: Ventilated Design</li>
              <li>Fit: One Size with Adjustable Straps</li>
              <li>Use Case: Cosplay, Airsoft, Tactical Fashion</li>
              <li>Weight: ~400g</li>
            </ul>
          </div>

          <!-- Buttons -->
          <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success d-flex align-items-center justify-content-center w-50 mr-2 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              onclick="confirmPurchase('JW MASK BLACK', <?= $products['JW MASK BLACK']['price'] ?>, 'JW MASK BLACK.png'); modifyStock('JW MASK BLACK', -1)">
              <i class="fa fa-credit-card mr-2"></i> Buy Now
            </button>

            <button class="btn btn-outline-light add-to-cart btn-sm d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              data-name="JW MASK BLACK"
              data-price="<?= $products['JW MASK BLACK']['price'] ?>"
              data-image="JW MASK BLACK.png"
              onclick="addDBuy('JW MASK BLACK', 1, <?= $products['JW MASK BLACK']['price'] ?>); alert('Added to cart')">
              <i class="fa fa-shopping-cart mr-2"></i> Add to Cart
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="productModalRothcoTacticalVest" tabindex="-1" role="dialog" aria-labelledby="productModalLabelRothcoTacticalVest" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #1e1e2f; color: #fff; border-radius: 8px;">
      <div class="modal-header border-0">
        <h5 class="modal-title font-weight-bold" id="productModalLabelRothcoTacticalVest">Rothco Tactical Molle Plate Carrier Vest</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 1.5rem;">&times;</span>
        </button>
      </div>

      <div class="modal-body row no-gutters">
        <div class="col-md-6 pr-3">
          <div id="rothcoVestCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner rounded">
              <div class="carousel-item active">
                <video class="d-block w-100 rounded" style="height: 300px; object-fit: cover;" controls>
                  <source src="Rothco Tactical Molle Plate Carrier Vest.mp4" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
              </div>
              <div class="carousel-item">
                <img src="Rothco Tactical Molle Plate Carrier Vest Side View.png" class="d-block w-100 rounded" alt="Vest Side 1" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="Rothco Tactical Molle Plate Carrier Vest Side View1.png" class="d-block w-100 rounded" alt="Vest Side 1" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="Rothco Tactical Molle Plate Carrier Vest Side View2.png" class="d-block w-100 rounded" alt="Vest Side 2" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="Rothco Tactical Molle Plate Carrier Vest Side View3.png" class="d-block w-100 rounded" alt="Vest Side 2" style="height: 300px; object-fit: cover;">
              </div>
            </div>
            <a class="carousel-control-prev custom-carousel-arrow" href="#rothcoVestCarousel" role="button" data-slide="prev">
              <span class="fa fa-chevron-left"></span>
            </a>
            <a class="carousel-control-next custom-carousel-arrow" href="#rothcoVestCarousel" role="button" data-slide="next">
              <span class="fa fa-chevron-right"></span>
            </a>
          </div>
        </div>

        <div class="col-md-6 pl-3 d-flex flex-column justify-content-between">
          <div>
            <h4 class="text-success font-weight-bold mb-3">Price: <?= $products['Rothco Tactical Molle Plate Carrier Vest']['price'] ?>$</h4>
            <p><i class="fa fa-cogs text-warning mr-1"></i><strong>Category:</strong> Body Armor / Utility</p>
            <p><i class="fa fa-shopping-cart text-info mr-1"></i><strong>Sold:</strong> <?= $products['Rothco Tactical Molle Plate Carrier Vest']['sold'] ?></p>
            <p><i class="fa fa-star text-success mr-1"></i><strong>Rating:</strong> <?= $products['Rothco Tactical Molle Plate Carrier Vest']['rating'] ?> ★★★★★</p>

            <hr style="border-color: #444;">

            <h6 class="font-weight-bold">Description</h6>
            <p class="small">
              A rugged plate carrier with full MOLLE webbing to attach pouches, magazine holders, and hydration packs. Built for training and LARP scenarios, it offers adjustable comfort and maximum modularity.
            </p>

            <h6 class="font-weight-bold">Specifications</h6>
            <ul class="small">
              <li>Material: Durable Nylon</li>
              <li>Color Options: Black & Brown</li>
              <li>Plate Compatibility: Standard ESAPI Side Plates</li>
              <li>Adjustability: Shoulder and Waist Straps</li>
              <li>Weight: ~900g (empty)</li>
              <li>Use Case: Airsoft, Training, LARP, Outdoor Adventures</li>
            </ul>
          </div>

          <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success d-flex align-items-center justify-content-center w-50 mr-2 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              onclick="confirmPurchase('Rothco Tactical Molle Plate Carrier Vest', <?= $products['Rothco Tactical Molle Plate Carrier Vest']['price'] ?>, 'Rothco Tactical Molle Plate Carrier Vest.png'); modifyStock('Rothco Tactical Molle Plate Carrier Vest', -1)">
              <i class="fa fa-credit-card mr-2"></i> Buy Now
            </button>

            <button class="btn btn-outline-light add-to-cart btn-sm d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              data-name="Rothco Tactical Molle Plate Carrier Vest"
              data-price="<?= $products['Rothco Tactical Molle Plate Carrier Vest']['price'] ?>"
              data-image="Rothco Tactical Molle Plate Carrier Vest.png"
              onclick="addDBuy('Rothco Tactical Molle Plate Carrier Vest', 1, <?= $products['Rothco Tactical Molle Plate Carrier Vest']['price'] ?>); alert('Added to cart')">
              <i class="fa fa-shopping-cart mr-2"></i> Add to Cart
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="productModalEliteCommandantVest" tabindex="-1" role="dialog" aria-labelledby="productModalLabelEliteCommandantVest" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #1e1e2f; color: #fff; border-radius: 8px;">
      <div class="modal-header border-0">
        <h5 class="modal-title font-weight-bold" id="productModalLabelEliteCommandantVest">Elite Survival Systems Commandant Tactical Vest</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 1.5rem;">&times;</span>
        </button>
      </div>

      <div class="modal-body row no-gutters">
        <div class="col-md-6 pr-3">
          <div id="eliteCommandantVestCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner rounded">
                <div class="carousel-item active">
                <video class="d-block w-100 rounded" style="height: 300px; object-fit: cover;" controls>
                    <source src="Elite Survival Systems Commandant Tactical Vest.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                </div>
                <div class="carousel-item">
                <img src="Elite Survival Systems Commandant Tactical Vest Side View.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
                </div>
                <div class="carousel-item">
                <img src="Elite Survival Systems Commandant Tactical Vest Side View1.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
                </div>
                <div class="carousel-item">
                <img src="Elite Survival Systems Commandant Tactical Vest Side View2.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
                </div>
                <div class="carousel-item">
                <img src="Elite Survival Systems Commandant Tactical Vest Side View3.png" class="d-block w-100 rounded" alt="Side View" style="height: 300px; object-fit: cover;">
                </div>
            </div>

            <a class="carousel-control-prev custom-carousel-arrow" href="#eliteCommandantVestCarousel" role="button" data-slide="prev">
              <span class="fa fa-chevron-left"></span>
            </a>
            <a class="carousel-control-next custom-carousel-arrow" href="#eliteCommandantVestCarousel" role="button" data-slide="next">
              <span class="fa fa-chevron-right"></span>
            </a>
          </div>
        </div>

        <div class="col-md-6 pl-3 d-flex flex-column justify-content-between">
          <div>
            <h4 class="text-success font-weight-bold mb-3">Price: <?= $products['Elite Survival Systems Commandant Tactical Vest']['price'] ?>$</h4>
            <p><i class="fa fa-cogs text-warning mr-1"></i><strong>Category:</strong> Tactical Vest</p>
            <p><i class="fa fa-shopping-cart text-info mr-1"></i><strong>Sold:</strong> <?= $products['Elite Survival Systems Commandant Tactical Vest']['sold'] ?></p>
            <p><i class="fa fa-star text-success mr-1"></i><strong>Rating:</strong> <?= $products['Elite Survival Systems Commandant Tactical Vest']['rating'] ?> ★★★★★</p>

            <hr style="border-color: #444;">

            <h6 class="font-weight-bold">Description</h6>
            <p class="small">
              The Commandant Tactical Vest offers superior modularity and durability, designed for maximum comfort and functionality in demanding tactical environments. Equipped with MOLLE webbing and adjustable straps for a perfect fit.
            </p>

            <h6 class="font-weight-bold">Specifications</h6>
            <ul class="small">
              <li>Material: Heavy-Duty Nylon</li>
              <li>Color: Black</li>
              <li>Adjustable: Shoulder and Waist</li>
              <li>MOLLE Compatibility: Full Panel</li>
              <li>Weight: Approximately 1.2 kg</li>
              <li>Use Case: Tactical Operations, Airsoft, Outdoor Training</li>
            </ul>
          </div>

          <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success d-flex align-items-center justify-content-center w-50 mr-2 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              onclick="confirmPurchase('Elite Survival Systems Commandant Tactical Vest', <?= $products['Elite Survival Systems Commandant Tactical Vest']['price'] ?>, 'Elite Survival Systems Commandant Tactical Vest.png'); modifyStock('Elite Survival Systems Commandant Tactical Vest', -1)">
              <i class="fa fa-credit-card mr-2"></i> Buy Now
            </button>

            <button class="btn btn-outline-light add-to-cart btn-sm d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              data-name="Elite Survival Systems Commandant Tactical Vest"
              data-price="<?= $products['Elite Survival Systems Commandant Tactical Vest']['price'] ?>"
              data-image="Elite Survival Systems Commandant Tactical Vest.png"
              onclick="addDBuy('Elite Survival Systems Commandant Tactical Vest', 1, <?= $products['Elite Survival Systems Commandant Tactical Vest']['price'] ?>); alert('Added to cart')">
              <i class="fa fa-shopping-cart mr-2"></i> Add to Cart
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="productModalElbecoBodyShieldV4" tabindex="-1" role="dialog" aria-labelledby="productModalLabelElbecoBodyShieldV4" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color:#1e1e2f; color:#fff; border-radius:8px;">
      <div class="modal-header border-0">
        <h5 class="modal-title font-weight-bold" id="productModalLabelElbecoBodyShieldV4">Elbeco BodyShield External Vest Carrier V4</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size:1.5rem;">&times;</span>
        </button>
      </div>
      <div class="modal-body row no-gutters">
        <!-- Carousel Start -->
        <div class="col-md-6 pr-3">
          <div id="elbecoCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner rounded">
                <div class="carousel-item active">
                <video class="d-block w-100 rounded" style="height: 300px; object-fit: cover;" controls>
                    <source src="Elbeco BodyShield External Vest Carrier V4.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                </div>
                <div class="carousel-item">
                <img src="Elbeco BodyShield External Vest Carrier V4 Side View.png" class="d-block w-100 rounded" alt="Elbeco BodyShield V4" style="height:300px; object-fit:cover;">
                </div>
                <div class="carousel-item">
                <img src="Elbeco BodyShield External Vest Carrier V4 Side View1.png" class="d-block w-100 rounded" alt="Side View 1" style="height:300px; object-fit:cover;">
                </div>
                <div class="carousel-item">
                <img src="Elbeco BodyShield External Vest Carrier V4 Side View2.png" class="d-block w-100 rounded" alt="Side View 2" style="height:300px; object-fit:cover;">
                </div>
                <div class="carousel-item">
                <img src="Elbeco BodyShield External Vest Carrier V4 Side View3.png" class="d-block w-100 rounded" alt="Back View" style="height:300px; object-fit:cover;">
                </div>

            </div>
            <a class="carousel-control-prev custom-carousel-arrow" href="#elbecoCarousel" role="button" data-slide="prev">
              <span class="fa fa-chevron-left"></span>
            </a>
            <a class="carousel-control-next custom-carousel-arrow" href="#elbecoCarousel" role="button" data-slide="next">
              <span class="fa fa-chevron-right"></span>
            </a>
          </div>
        </div>
        <!-- End Carousel -->
        <div class="col-md-6 pl-3 d-flex flex-column justify-content-between">
          <div>
            <h4 class="text-success font-weight-bold mb-3">Price: <?= $products['Elbeco BodyShield External Vest Carrier V4']['price'] ?>$</h4>
            <p><i class="fa fa-cogs text-warning mr-1"></i><strong>Purpose:</strong> Overlay Vest Carrier</p>
            <p><i class="fa fa-shopping-cart text-info mr-1"></i><strong>Sold:</strong> <?= $products['Elbeco BodyShield External Vest Carrier V4']['sold'] ?></p>
            <p><i class="fa fa-star text-success mr-1"></i><strong>Rating:</strong> <?= $products['Elbeco BodyShield External Vest Carrier V4']['rating'] ?> ★★★★★</p>
            <hr style="border-color:#444;">
            <h6 class="font-weight-bold">Description</h6>
            <p class="small">
              Allows discreet wear of a ballistic vest over uniform with added comfort from reinforced side closures, elastic extension, UV and antimicrobial fabric treatment.
            </p>
            <h6 class="font-weight-bold">Specifications</h6>
            <ul class="small">
              <li>Fabric: UVF 50 + Antimicrobial Lining</li>
              <li>Fit: 2″ Elastic Extension</li>
              <li>Closure: FastLock Reinforced</li>
            </ul>
          </div>
          <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success d-flex align-items-center justify-content-center w-50 mr-2 py-2" style="font-size:0.8em; white-space:nowrap;"
                    onclick="confirmPurchase('Elbeco BodyShield External Vest Carrier V4', <?= $products['Elbeco BodyShield External Vest Carrier V4']['price'] ?>, 'Elbeco BodyShield External Vest Carrier V4 Side View.png'); modifyStock('Elbeco BodyShield External Vest Carrier V4', -1)">
              <i class="fa fa-credit-card mr-2"></i> Buy Now
            </button>
            <button class="btn btn-outline-light add-to-cart btn-sm d-flex align-items-center justify-content-center w-50 py-2" style="font-size:0.8em; white-space:nowrap;"
                    data-name="Elbeco BodyShield External Vest Carrier V4"
                    data-price="<?= $products['Elbeco BodyShield External Vest Carrier V4']['price'] ?>"
                    data-image="Elbeco BodyShield External Vest Carrier V4 Side View.png"
                    onclick="addDBuy('Elbeco BodyShield External Vest Carrier V4', 1, <?= $products['Elbeco BodyShield External Vest Carrier V4']['price'] ?>); alert('Added to cart')">
              <i class="fa fa-shopping-cart mr-2"></i> Add to Cart
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="productModalBlackhawkOmegaElite" tabindex="-1" role="dialog" aria-labelledby="productModalLabelBlackhawkOmegaElite" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color:#1e1e2f; color:#fff; border-radius:8px;">
      <div class="modal-header border-0">
        <h5 class="modal-title font-weight-bold" id="productModalLabelBlackhawkOmegaElite">Blackhawk Omega Elite Cross Draw Vest</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size:1.5rem;">&times;</span>
        </button>
      </div>
      <div class="modal-body row no-gutters">
        <!-- Carousel Start -->
        <div class="col-md-6 pr-3">
          <div id="blackhawkCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner rounded">
                <div class="carousel-item active">
                <video class="d-block w-100 rounded" style="height:300px; object-fit:cover;" controls>
                    <source src="Blackhawk Omega Elite Cross Draw Vest.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                </div>
                <div class="carousel-item">
                <img src="Blackhawk Omega Elite Cross Draw Vest Side View.png" class="d-block w-100 rounded" alt="Blackhawk Omega Elite Vest" style="height:300px; object-fit:cover;">
                </div>
                <div class="carousel-item">
                <img src="Blackhawk Omega Elite Cross Draw Vest Side View1.png" class="d-block w-100 rounded" alt="Side view" style="height:300px; object-fit:cover;">
                </div>
                <div class="carousel-item">
                <img src="Blackhawk Omega Elite Cross Draw Vest Side View2.png" class="d-block w-100 rounded" alt="Another side view" style="height:300px; object-fit:cover;">
                </div>
                <div class="carousel-item">
                <img src="Blackhawk Omega Elite Cross Draw Vest Side View3.png" class="d-block w-100 rounded" alt="Back view" style="height:300px; object-fit:cover;">
                </div>

            </div>
            <a class="carousel-control-prev custom-carousel-arrow" href="#blackhawkCarousel" role="button" data-slide="prev"><span class="fa fa-chevron-left"></span></a>
            <a class="carousel-control-next custom-carousel-arrow" href="#blackhawkCarousel" role="button" data-slide="next"><span class="fa fa-chevron-right"></span></a>
          </div>
        </div>
        <!-- End Carousel -->
        <div class="col-md-6 pl-3 d-flex flex-column justify-content-between">
          <div>
            <h4 class="text-success font-weight-bold mb-3">Price: <?= $products['Blackhawk Omega Elite Cross Draw Vest']['price'] ?>$</h4>
            <p><i class="fa fa-cogs text-warning mr-1"></i><strong>Type:</strong> Cross‑Draw / Mag Vest</p>
            <p><i class="fa fa-shopping-cart text-info mr-1"></i><strong>Sold:</strong> <?= $products['Blackhawk Omega Elite Cross Draw Vest']['sold'] ?></p>
            <p><i class="fa fa-star text-success mr-1"></i><strong>Rating:</strong> <?= $products['Blackhawk Omega Elite Cross Draw Vest']['rating'] ?> ★★★★★</p>
            <hr style="border-color:#444;">
            <h6 class="font-weight-bold">Description</h6>
            <p class="small">
              Field-tested adjustable fit with cross-draw holster, S.T.R.I.K.E. webbing, internal zip pockets, and reinforced drag handle.
            </p>
            <h6 class="font-weight-bold">Specifications</h6>
            <ul class="small">
              <li>Material: Breathable nylon mesh</li>
              <li>Adjustment: Up to 6″ length / 32″ girth</li>
              <li>Storage: Internal zip pockets + mag pouches</li>
              <li>Extras: Cross-draw holster</li>
            </ul>
          </div>
          <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success d-flex align-items-center justify-content-center w-50 mr-2 py-2" style="font-size:0.8em; white-space:nowrap;"
                    onclick="confirmPurchase('Blackhawk Omega Elite Cross Draw Vest', <?= $products['Blackhawk Omega Elite Cross Draw Vest']['price'] ?>, 'Blackhawk Omega Elite Cross Draw Vest.png'); modifyStock('Blackhawk Omega Elite Cross Draw Vest', -1)">
              <i class="fa fa-credit-card mr-2"></i> Buy Now
            </button>
            <button class="btn btn-outline-light add-to-cart btn-sm d-flex align-items-center justify-content-center w-50 py-2" style="font-size:0.8em; white-space:nowrap;"
                    data-name="Blackhawk Omega Elite Cross Draw Vest"
                    data-price="<?= $products['Blackhawk Omega Elite Cross Draw Vest']['price'] ?>"
                    data-image="Blackhawk Omega Elite Cross Draw Vest.png"
                    onclick="addDBuy('Blackhawk Omega Elite Cross Draw Vest', 1, <?= $products['Blackhawk Omega Elite Cross Draw Vest']['price'] ?>); alert('Added to cart')">
              <i class="fa fa-shopping-cart mr-2"></i> Add to Cart
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="productModalTasmanianTigerVestBasePlusMKII" tabindex="-1" role="dialog" aria-labelledby="productModalLabelTasmanianTigerVestBasePlusMKII" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color:#1e1e2f; color:#fff; border-radius:8px;">
      <div class="modal-header border-0">
        <h5 class="modal-title font-weight-bold" id="productModalLabelTasmanianTigerVestBasePlusMKII">Tasmanian Tiger Vest Base Plus MKII</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size:1.5rem;">&times;</span>
        </button>
      </div>
      <div class="modal-body row no-gutters">
        <!-- Carousel Start -->
        <div class="col-md-6 pr-3">
          <div id="ttCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner rounded">
                <div class="carousel-item active">
                <video class="d-block w-100 rounded" style="height:300px; object-fit:cover;" controls>
                    <source src="Tasmanian Tiger Vest Base Plus MKII.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                </div>
                <div class="carousel-item">
                <img src="Tasmanian Tiger Vest Base Plus MKII Side View.png" class="d-block w-100 rounded" alt="TT Vest Base Plus MKII" style="height:300px; object-fit:cover;">
                </div>
                <div class="carousel-item">
                <img src="Tasmanian Tiger Vest Base Plus MKII Side View1.png" class="d-block w-100 rounded" alt="Side view 1" style="height:300px; object-fit:cover;">
                </div>
                <div class="carousel-item">
                <img src="Tasmanian Tiger Vest Base Plus MKII Side View2.png" class="d-block w-100 rounded" alt="Side view 2" style="height:300px; object-fit:cover;">
                </div>
                <div class="carousel-item">
                <img src="Tasmanian Tiger Vest Base Plus MKII Side View3.png" class="d-block w-100 rounded" alt="Back view" style="height:300px; object-fit:cover;">
                </div>
            </div>
            <a class="carousel-control-prev custom-carousel-arrow" href="#ttCarousel" role="button" data-slide="prev"><span class="fa fa-chevron-left"></span></a>
            <a class="carousel-control-next custom-carousel-arrow" href="#ttCarousel" role="button" data-slide="next"><span class="fa fa-chevron-right"></span></a>
          </div>
        </div>
        <!-- End Carousel -->
        <div class="col-md-6 pl-3 d-flex flex-column justify-content-between">
          <div>
            <h4 class="text-success font-weight-bold mb-3">Price: <?= $products['Tasmanian Tiger Vest Base Plus MKII']['price'] ?>$</h4>
            <p><i class="fa fa-cogs text-warning mr-1"></i><strong>Type:</strong> MOLLE Vest / Plate Carrier</p>
            <p><i class="fa fa-shopping-cart text-info mr-1"></i><strong>Sold:</strong> <?= $products['Tasmanian Tiger Vest Base Plus MKII']['sold'] ?></p>
            <p><i class="fa fa-star text-success mr-1"></i><strong>Rating:</strong> <?= $products['Tasmanian Tiger Vest Base Plus MKII']['rating'] ?> ★★★★★</p>
            <hr style="border-color:#444;">
            <h6 class="font-weight-bold">Description</h6>
            <p class="small">
              Adjustable tactical MOLLE vest with armor panel cut-outs, Cordura 700D construction, mesh front, zippered pockets, and front zip closure.
            </p>
            <h6 class="font-weight-bold">Specifications</h6>
            <ul class="small">
              <li>Weight: ~720 g</li>
              <li>Material: Cordura® 700D</li>
              <li>Adjustment: Length & Width</li>
              <li>Features: MOLLE, Mesh, Zipped Front, Armor Compatibility</li>
            </ul>
          </div>
          <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success d-flex align-items-center justify-content-center w-50 mr-2 py-2" style="font-size:0.8em; white-space:nowrap;"
                    onclick="confirmPurchase('Tasmanian Tiger Vest Base Plus MKII', <?= $products['Tasmanian Tiger Vest Base Plus MKII']['price'] ?>, 'Tasmanian Tiger Vest Base Plus MKII.png'); modifyStock('Tasmanian Tiger Vest Base Plus MKII', -1)">
              <i class="fa fa-credit-card mr-2"></i> Buy Now
            </button>
            <button class="btn btn-outline-light add-to-cart btn-sm d-flex align-items-center justify-content-center w-50 py-2" style="font-size:0.8em; white-space:nowrap;"
                    data-name="Tasmanian Tiger Vest Base Plus MKII"
                    data-price="<?= $products['Tasmanian Tiger Vest Base Plus MKII']['price'] ?>"
                    data-image="Tasmanian Tiger Vest Base Plus MKII.png"
                    onclick="addDBuy('Tasmanian Tiger Vest Base Plus MKII', 1, <?= $products['Tasmanian Tiger Vest Base Plus MKII']['price'] ?>); alert('Added to cart')">
              <i class="fa fa-shopping-cart mr-2"></i> Add to Cart
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="productModalOakleyBoots" tabindex="-1" role="dialog" aria-labelledby="productModalLabelOakleyBoots" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #1e1e2f; color: #fff; border-radius: 8px;">
      <div class="modal-header border-0">
        <h5 class="modal-title font-weight-bold" id="productModalLabelOakleyBoots">Oakley Light Assault 3 Boots</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 1.5rem;">&times;</span>
        </button>
      </div>

      <div class="modal-body row no-gutters">
        <!-- Left: Carousel -->
        <div class="col-md-6 pr-3">
          <div id="oakleyBootsCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner rounded">
              <div class="carousel-item active">
                <video class="d-block w-100 rounded" style="height: 300px; object-fit: cover;" controls>
                  <source src="Oakley Light Assault 3 Boots.mp4" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
              </div>
              <div class="carousel-item">
                <img src="Oakley Light Assault 3 Boots Side View.png" class="d-block w-100 rounded" alt="Side View 1" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="Oakley Light Assault 3 Boots Side View1.png" class="d-block w-100 rounded" alt="Side View 2" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="Oakley Light Assault 3 Boots Side View2.png" class="d-block w-100 rounded" alt="Side View 3" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="Oakley Light Assault 3 Boots Side View3.png" class="d-block w-100 rounded" alt="Side View 4" style="height: 300px; object-fit: cover;">
              </div>
            </div>
            <a class="carousel-control-prev custom-carousel-arrow" href="#oakleyBootsCarousel" role="button" data-slide="prev">
              <span class="fa fa-chevron-left"></span>
            </a>
            <a class="carousel-control-next custom-carousel-arrow" href="#oakleyBootsCarousel" role="button" data-slide="next">
              <span class="fa fa-chevron-right"></span>
            </a>
          </div>
        </div>

        <!-- Right: Product Info -->
        <div class="col-md-6 pl-3 d-flex flex-column justify-content-between">
          <div>
            <h4 class="text-success font-weight-bold mb-3">Price: <?= $products['Oakley Light Assault 3 Boots']['price'] ?>$</h4>
            <p><i class="fa fa-cogs text-warning mr-1"></i><strong>Style:</strong> Tactical / Lightweight</p>
            <p><i class="fa fa-shopping-cart text-info mr-1"></i><strong>Sold:</strong> <?= $products['Oakley Light Assault 3 Boots']['sold'] ?></p>
            <p><i class="fa fa-star text-success mr-1"></i><strong>Rating:</strong> <?= $products['Oakley Light Assault 3 Boots']['rating'] ?> ★★★★★</p>

            <hr style="border-color: #444;">

            <h6 class="font-weight-bold">Description</h6>
            <p class="small">
              The Oakley Light Assault 3 Boots are engineered for speed and agility without sacrificing durability. These lightweight tactical boots are ideal for demanding missions, outdoor work, and long treks — offering breathable support, grip, and comfort.
            </p>

            <h6 class="font-weight-bold">Specifications</h6>
            <ul class="small">
              <li>Material: Cordura® nylon & synthetic upper</li>
              <li>Color: Brown</li>
              <li>Size: US 7–13</li>
              <li>Weight: Approx. 400g per boot</li>
              <li>Use Case: Tactical, Military, Outdoor</li>
              <li>Sole: Slip-resistant rubber</li>
            </ul>
          </div>

          <!-- Buttons -->
          <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success d-flex align-items-center justify-content-center w-50 mr-2 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              onclick="confirmPurchase('Oakley Light Assault 3 Boots', <?= $products['Oakley Light Assault 3 Boots']['price'] ?>, 'Oakley Light Assault 3 Boots.png'); modifyStock('Oakley Light Assault 3 Boots', -1)">
              <i class="fa fa-credit-card mr-2"></i> Buy Now
            </button>

            <button class="btn btn-outline-light add-to-cart btn-sm d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              data-name="Oakley Light Assault 3 Boots"
              data-price="<?= $products['Oakley Light Assault 3 Boots']['price'] ?>"
              data-image="Oakley Light Assault 3 Boots.png"
              onclick="addDBuy('Oakley Light Assault 3 Boots', 1, <?= $products['Oakley Light Assault 3 Boots']['price'] ?>); alert('Added to cart')">
              <i class="fa fa-shopping-cart mr-2"></i> Add to Cart
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="productModalUnderArmourBoots" tabindex="-1" role="dialog" aria-labelledby="productModalLabelUnderArmourBoots" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #1e1e2f; color: #fff; border-radius: 8px;">
      <div class="modal-header border-0">
        <h5 class="modal-title font-weight-bold" id="productModalLabelUnderArmourBoots">Under Armour Charged Loadout Boots</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 1.5rem;">&times;</span>
        </button>
      </div>

      <div class="modal-body row no-gutters">
        <!-- Left: Carousel -->
        <div class="col-md-6 pr-3">
          <div id="underArmourBootsCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner rounded">
              <div class="carousel-item active">
                <video class="d-block w-100 rounded" style="height: 300px; object-fit: cover;" controls>
                  <source src="Under Armour Charged Loadout Boots.mp4" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
              </div>
              <div class="carousel-item">
                <img src="Under Armour Charged Loadout Boots Side View.png" class="d-block w-100 rounded" alt="Side View 1" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="Under Armour Charged Loadout Boots Side View1.png" class="d-block w-100 rounded" alt="Side View 2" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="Under Armour Charged Loadout Boots Side View2.png" class="d-block w-100 rounded" alt="Side View 3" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="Under Armour Charged Loadout Boots Side View3.png" class="d-block w-100 rounded" alt="Side View 4" style="height: 300px; object-fit: cover;">
              </div>
            </div>
            <a class="carousel-control-prev custom-carousel-arrow" href="#underArmourBootsCarousel" role="button" data-slide="prev">
              <span class="fa fa-chevron-left"></span>
            </a>
            <a class="carousel-control-next custom-carousel-arrow" href="#underArmourBootsCarousel" role="button" data-slide="next">
              <span class="fa fa-chevron-right"></span>
            </a>
          </div>
        </div>

        <!-- Right: Product Info -->
        <div class="col-md-6 pl-3 d-flex flex-column justify-content-between">
          <div>
            <h4 class="text-success font-weight-bold mb-3">Price: <?= $products['Under Armour Charged Loadout Boots']['price'] ?>$</h4>
            <p><i class="fa fa-cogs text-warning mr-1"></i><strong>Style:</strong> Tactical / Athletic Hybrid</p>
            <p><i class="fa fa-shopping-cart text-info mr-1"></i><strong>Sold:</strong> <?= $products['Under Armour Charged Loadout Boots']['sold'] ?></p>
            <p><i class="fa fa-star text-success mr-1"></i><strong>Rating:</strong> <?= $products['Under Armour Charged Loadout Boots']['rating'] ?> ★★★★★</p>

            <hr style="border-color: #444;">

            <h6 class="font-weight-bold">Description</h6>
            <p class="small">
              The Under Armour Charged Loadout Boots combine tactical durability with athletic comfort. Featuring UA's Charged Cushioning® midsole, reinforced upper, and slip-resistant outsole, these boots are built for high-intensity missions and all-day wear.
            </p>

            <h6 class="font-weight-bold">Specifications</h6>
            <ul class="small">
              <li>Material: Textile & Synthetic Upper</li>
              <li>Color: Black</li>
              <li>Size: US 7–14</li>
              <li>Weight: Approx. 450g per boot</li>
              <li>Midsole: UA Charged Cushioning®</li>
              <li>Outsole: High traction rubber with grip lugs</li>
            </ul>
          </div>

          <!-- Buttons -->
          <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success d-flex align-items-center justify-content-center w-50 mr-2 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              onclick="confirmPurchase('Under Armour Charged Loadout Boots', <?= $products['Under Armour Charged Loadout Boots']['price'] ?>, 'Under Armour Charged Loadout Boots.png'); modifyStock('Under Armour Charged Loadout Boots', -1)">
              <i class="fa fa-credit-card mr-2"></i> Buy Now
            </button>

            <button class="btn btn-outline-light add-to-cart btn-sm d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              data-name="Under Armour Charged Loadout Boots"
              data-price="<?= $products['Under Armour Charged Loadout Boots']['price'] ?>"
              data-image="Under Armour Charged Loadout Boots.png"
              onclick="addDBuy('Under Armour Charged Loadout Boots', 1, <?= $products['Under Armour Charged Loadout Boots']['price'] ?>); alert('Added to cart')">
              <i class="fa fa-shopping-cart mr-2"></i> Add to Cart
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="productModalAltamaBoots" tabindex="-1" role="dialog" aria-labelledby="productModalLabelAltamaBoots" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #1e1e2f; color: #fff; border-radius: 8px;">
      <div class="modal-header border-0">
        <h5 class="modal-title font-weight-bold" id="productModalLabelAltamaBoots">Altama Maritime Assault Mid Boots</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 1.5rem;">&times;</span>
        </button>
      </div>

      <div class="modal-body row no-gutters">
        <!-- Left: Carousel -->
        <div class="col-md-6 pr-3">
          <div id="altamaBootsCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner rounded">
              <div class="carousel-item active">
                <video class="d-block w-100 rounded" style="height: 300px; object-fit: cover;" controls>
                  <source src="Altama Maritime Assault Mid Boots.mp4" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
              </div>
              <div class="carousel-item">
                <img src="Altama Maritime Assault Mid Boots Side View.png" class="d-block w-100 rounded" alt="Side View 1" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="Altama Maritime Assault Mid Boots Side View1.png" class="d-block w-100 rounded" alt="Side View 2" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="Altama Maritime Assault Mid Boots Side View2.png" class="d-block w-100 rounded" alt="Side View 3" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="Altama Maritime Assault Mid Boots Side View3.png" class="d-block w-100 rounded" alt="Side View 4" style="height: 300px; object-fit: cover;">
              </div>
            </div>
            <a class="carousel-control-prev custom-carousel-arrow" href="#altamaBootsCarousel" role="button" data-slide="prev">
              <span class="fa fa-chevron-left"></span>
            </a>
            <a class="carousel-control-next custom-carousel-arrow" href="#altamaBootsCarousel" role="button" data-slide="next">
              <span class="fa fa-chevron-right"></span>
            </a>
          </div>
        </div>

        <!-- Right: Product Info -->
        <div class="col-md-6 pl-3 d-flex flex-column justify-content-between">
          <div>
            <h4 class="text-success font-weight-bold mb-3">Price: <?= $products['Altama Maritime Assault Mid Boots']['price'] ?>$</h4>
            <p><i class="fa fa-cogs text-warning mr-1"></i><strong>Style:</strong> Amphibious Tactical</p>
            <p><i class="fa fa-shopping-cart text-info mr-1"></i><strong>Sold:</strong> <?= $products['Altama Maritime Assault Mid Boots']['sold'] ?></p>
            <p><i class="fa fa-star text-success mr-1"></i><strong>Rating:</strong> <?= $products['Altama Maritime Assault Mid Boots']['rating'] ?> ★★★★★</p>

            <hr style="border-color: #444;">

            <h6 class="font-weight-bold">Description</h6>
            <p class="small">
              Designed for SEALs and maritime missions, the Altama Maritime Assault Mid Boots feature fin-friendly soles, full rubber outsoles for grip on wet surfaces, and a quick-dry mesh upper. These boots are ready for both land and sea operations.
            </p>

            <h6 class="font-weight-bold">Specifications</h6>
            <ul class="small">
              <li>Material: Quick-dry mesh & PU upper</li>
              <li>Color: Black</li>
              <li>Size: US 6–13</li>
              <li>Drain Ports: Yes (Medial & Lateral)</li>
              <li>Outsole: Non-slip SEAL Rubber™</li>
              <li>Compatibility: Dive fins</li>
            </ul>
          </div>

          <!-- Buttons -->
          <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success d-flex align-items-center justify-content-center w-50 mr-2 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              onclick="confirmPurchase('Altama Maritime Assault Mid Boots', <?= $products['Altama Maritime Assault Mid Boots']['price'] ?>, 'Altama Maritime Assault Mid Boots.jpg'); modifyStock('Altama Maritime Assault Mid Boots', -1)">
              <i class="fa fa-credit-card mr-2"></i> Buy Now
            </button>

            <button class="btn btn-outline-light add-to-cart btn-sm d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              data-name="Altama Maritime Assault Mid Boots"
              data-price="<?= $products['Altama Maritime Assault Mid Boots']['price'] ?>"
              data-image="Altama Maritime Assault Mid Boots.jpg"
              onclick="addDBuy('Altama Maritime Assault Mid Boots', 1, <?= $products['Altama Maritime Assault Mid Boots']['price'] ?>); alert('Added to cart')">
              <i class="fa fa-shopping-cart mr-2"></i> Add to Cart
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="productModalNikeBoots" tabindex="-1" role="dialog" aria-labelledby="productModalLabelNikeBoots" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #1e1e2f; color: #fff; border-radius: 8px;">
      <div class="modal-header border-0">
        <h5 class="modal-title font-weight-bold" id="productModalLabelNikeBoots">NIKE 8 SFB B2 Leather Boots</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 1.5rem;">&times;</span>
        </button>
      </div>

      <div class="modal-body row no-gutters">
        <!-- Left: Carousel -->
        <div class="col-md-6 pr-3">
          <div id="nikeBootsCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner rounded">
              <div class="carousel-item active">
                <video class="d-block w-100 rounded" style="height: 300px; object-fit: cover;" controls>
                  <source src="NIKE 8 SFB B2 Leather Boots.mp4" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
              </div>
              <div class="carousel-item">
                <img src="NIKE 8 SFB B2 Leather Boots Side View.png" class="d-block w-100 rounded" alt="Side View 1" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="NIKE 8 SFB B2 Leather Boots Side View1.png" class="d-block w-100 rounded" alt="Side View 2" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="NIKE 8 SFB B2 Leather Boots Side View2.png" class="d-block w-100 rounded" alt="Side View 3" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="NIKE 8 SFB B2 Leather Boots Side View3.png" class="d-block w-100 rounded" alt="Side View 4" style="height: 300px; object-fit: cover;">
              </div>
            </div>
            <a class="carousel-control-prev custom-carousel-arrow" href="#nikeBootsCarousel" role="button" data-slide="prev">
              <span class="fa fa-chevron-left"></span>
            </a>
            <a class="carousel-control-next custom-carousel-arrow" href="#nikeBootsCarousel" role="button" data-slide="next">
              <span class="fa fa-chevron-right"></span>
            </a>
          </div>
        </div>

        <!-- Right: Product Info -->
        <div class="col-md-6 pl-3 d-flex flex-column justify-content-between">
          <div>
            <h4 class="text-success font-weight-bold mb-3">Price: <?= $products['NIKE 8 SFB B2 Leather Boots']['price'] ?>$</h4>
            <p><i class="fa fa-cogs text-warning mr-1"></i><strong>Style:</strong> Rugged Tactical</p>
            <p><i class="fa fa-shopping-cart text-info mr-1"></i><strong>Sold:</strong> <?= $products['NIKE 8 SFB B2 Leather Boots']['sold'] ?></p>
            <p><i class="fa fa-star text-success mr-1"></i><strong>Rating:</strong> <?= $products['NIKE 8 SFB B2 Leather Boots']['rating'] ?> ★★★★★</p>

            <hr style="border-color: #444;">

            <h6 class="font-weight-bold">Description</h6>
            <p class="small">
              The NIKE 8 SFB B2 Leather Boots deliver maximum durability and all-terrain grip. Designed with full-grain leather and breathable canvas, this boot balances protection and lightweight agility — ideal for rugged missions.
            </p>

            <h6 class="font-weight-bold">Specifications</h6>
            <ul class="small">
              <li>Material: Full-Grain Leather & Canvas Upper</li>
              <li>Color: Brown</li>
              <li>Height: 8 inches</li>
              <li>Outsole: Slip-resistant, multi-surface grip</li>
              <li>Lining: Moisture-wicking interior</li>
              <li>Fit: True to size</li>
            </ul>
          </div>

          <!-- Buttons -->
          <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success d-flex align-items-center justify-content-center w-50 mr-2 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              onclick="confirmPurchase('NIKE 8 SFB B2 Leather Boots', <?= $products['NIKE 8 SFB B2 Leather Boots']['price'] ?>, 'NIKE 8 SFB B2 Leather Boots.png'); modifyStock('NIKE 8 SFB B2 Leather Boots', -1)">
              <i class="fa fa-credit-card mr-2"></i> Buy Now
            </button>

            <button class="btn btn-outline-light add-to-cart btn-sm d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              data-name="NIKE 8 SFB B2 Leather Boots"
              data-price="<?= $products['NIKE 8 SFB B2 Leather Boots']['price'] ?>"
              data-image="NIKE 8 SFB B2 Leather Boots.png"
              onclick="addDBuy('NIKE 8 SFB B2 Leather Boots', 1, <?= $products['NIKE 8 SFB B2 Leather Boots']['price'] ?>); alert('Added to cart')">
              <i class="fa fa-shopping-cart mr-2"></i> Add to Cart
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="productModalDannerBoots" tabindex="-1" role="dialog" aria-labelledby="productModalLabelDannerBoots" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #1e1e2f; color: #fff; border-radius: 8px;">
      <div class="modal-header border-0">
        <h5 class="modal-title font-weight-bold" id="productModalLabelDannerBoots">Danner 8 Tachyon Boots</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 1.5rem;">&times;</span>
        </button>
      </div>

      <div class="modal-body row no-gutters">
        <!-- Left: Carousel -->
        <div class="col-md-6 pr-3">
          <div id="dannerBootsCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner rounded">
              <div class="carousel-item active">
                <video class="d-block w-100 rounded" style="height: 300px; object-fit: cover;" controls>
                  <source src="Danner 8 Tachyon Boots.mp4" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
              </div>
              <div class="carousel-item">
                <img src="Danner 8 Tachyon Boots Side View.png" class="d-block w-100 rounded" alt="Side View 1" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="Danner 8 Tachyon Boots Side View1.png" class="d-block w-100 rounded" alt="Side View 2" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="Danner 8 Tachyon Boots Side View2.png" class="d-block w-100 rounded" alt="Side View 3" style="height: 300px; object-fit: cover;">
              </div>
              <div class="carousel-item">
                <img src="Danner 8 Tachyon Boots Side View3.png" class="d-block w-100 rounded" alt="Side View 4" style="height: 300px; object-fit: cover;">
              </div>
            </div>
            <a class="carousel-control-prev custom-carousel-arrow" href="#dannerBootsCarousel" role="button" data-slide="prev">
              <span class="fa fa-chevron-left"></span>
            </a>
            <a class="carousel-control-next custom-carousel-arrow" href="#dannerBootsCarousel" role="button" data-slide="next">
              <span class="fa fa-chevron-right"></span>
            </a>
          </div>
        </div>

        <!-- Right: Product Info -->
        <div class="col-md-6 pl-3 d-flex flex-column justify-content-between">
          <div>
            <h4 class="text-success font-weight-bold mb-3">Price: <?= $products['Danner 8 Tachyon Boots']['price'] ?>$</h4>
            <p><i class="fa fa-cogs text-warning mr-1"></i><strong>Style:</strong> Lightweight Tactical</p>
            <p><i class="fa fa-shopping-cart text-info mr-1"></i><strong>Sold:</strong> <?= $products['Danner 8 Tachyon Boots']['sold'] ?></p>
            <p><i class="fa fa-star text-success mr-1"></i><strong>Rating:</strong> <?= $products['Danner 8 Tachyon Boots']['rating'] ?> ★★★★★</p>

            <hr style="border-color: #444;">

            <h6 class="font-weight-bold">Description</h6>
            <p class="small">
              Built for speed and agility, the Danner 8 Tachyon Boots are designed with ultralight materials, breathable mesh, and superior grip — perfect for fast-paced missions without sacrificing durability.
            </p>

            <h6 class="font-weight-bold">Specifications</h6>
            <ul class="small">
              <li>Material: Synthetic upper & abrasion-resistant toe cap</li>
              <li>Color: Coyote</li>
              <li>Height: 8 inches</li>
              <li>Outsole: Rubber with pentagonal lugs for traction</li>
              <li>Lining: Open-cell PU for airflow</li>
              <li>Weight: Approx. 26 oz per pair</li>
            </ul>
          </div>

          <!-- Buttons -->
          <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success d-flex align-items-center justify-content-center w-50 mr-2 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              onclick="confirmPurchase('Danner 8 Tachyon Boots', <?= $products['Danner 8 Tachyon Boots']['price'] ?>, 'Danner 8 Tachyon Boots.png'); modifyStock('Danner 8 Tachyon Boots', -1)">
              <i class="fa fa-credit-card mr-2"></i> Buy Now
            </button>

            <button class="btn btn-outline-light add-to-cart btn-sm d-flex align-items-center justify-content-center w-50 py-2"
              style="font-size: 0.8em; white-space: nowrap;"
              data-name="Danner 8 Tachyon Boots"
              data-price="<?= $products['Danner 8 Tachyon Boots']['price'] ?>"
              data-image="Danner 8 Tachyon Boots.png"
              onclick="addDBuy('Danner 8 Tachyon Boots', 1, <?= $products['Danner 8 Tachyon Boots']['price'] ?>); alert('Added to cart')">
              <i class="fa fa-shopping-cart mr-2"></i> Add to Cart
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
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
                        <div class="mt-2" style="color: white; text-align: center;">
                            In stock: <span id="stock-count-cyberpunk-oni-mask" style="margin-left: 5px;"><?= $products['Cyberpunk Oni Mask']['stock'] ?></span>
                        </div>
                        <div class="button-container mt-auto d-flex justify-content-center">
                            <button class="btn btn-outline-success buy-now btn-sm" style="font-size: 0.8em; white-space: nowrap;"
                                onclick="confirmPurchase('Cyberpunk Oni Mask', <?= $products['Cyberpunk Oni Mask']['price'] ?>, 'Cyberpunk Oni Mask.png'); modifyStock('Cyberpunk Oni Mask', -1)">
                                Buy Now
                            </button>
                            <button class="btn btn-outline-light add-to-cart btn-sm"
                                style="font-size: 0.8em; white-space: nowrap;"
                                data-name="Cyberpunk Oni Mask"
                                data-price="<?= $products['Cyberpunk Oni Mask']['price'] ?>"
                                data-image="Cyberpunk Oni Mask.png"
                                onclick="addDBuy('Cyberpunk Oni Mask', 1, <?= $products['Cyberpunk Oni Mask']['price'] ?>); alert('Added to cart')">
                                Add to Cart
                            </button>
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
                        <a href="javascript:void(0);" data-toggle="modal" data-target="#productModalNinjaMaskBLK">
                            <img src="NINJA MASK BLK.png" class="card-img-top img-fluid" alt="NINJA MASK BLK" style="height: 180px; object-fit: cover;">
                        </a>
                        <div class="card-body d-flex flex-column">
                            <h5 class="feature-title" style="color: white;">NINJA MASK</h5>
                            <p style="color: white;"><?= $products['NINJA MASK BLK']['price'] ?>$</p>
                            <div class="d-flex align-items-center" style="color: gold;">
                                <span><?= $products['NINJA MASK BLK']['rating'] ?> ★★★★★</span>
                                <span style="margin-left: 5px; color: white;"><?= $products['NINJA MASK BLK']['sold'] ?> sold</span>
                            </div>
                            <div class="mt-2" style="color: white; text-align: center;">
                                In stock: <span id="stock-count-ninja-mask-blk" style="margin-left: 5px;"><?= $products['NINJA MASK BLK']['stock'] ?></span>
                            </div>
                            <div class="button-container mt-auto d-flex justify-content-center">
                                <button class="btn btn-outline-success buy-now btn-sm" style="font-size: 0.8em; white-space: nowrap;"
                                    onclick="confirmPurchase('NINJA MASK BLK', <?= $products['NINJA MASK BLK']['price'] ?>, 'NINJA MASK BLK.png'); modifyStock('NINJA MASK BLK', -1)">
                                    Buy Now
                                </button>
                                <button class="btn btn-outline-light add-to-cart btn-sm"
                                    style="font-size: 0.8em; white-space: nowrap;"
                                    data-name="NINJA MASK BLK"
                                    data-price="<?= $products['NINJA MASK BLK']['price'] ?>"
                                    data-image="NINJA MASK BLK.png"
                                    onclick="addDBuy('NINJA MASK BLK', 1, <?= $products['NINJA MASK BLK']['price'] ?>); alert('Added to cart')">
                                    Add to Cart
                                </button>
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
                        <div class="mt-2" style="color: white; text-align: center;">
                            In stock: <span id="stock-count-kraken-mask" style="margin-left: 5px;"><?= $products['KRAKEN MASK']['stock'] ?></span>
                        </div>
                        <div class="button-container mt-auto d-flex justify-content-center">
                            <button class="btn btn-outline-success buy-now btn-sm" style="font-size: 0.8em; white-space: nowrap;"
                                onclick="confirmPurchase('KRAKEN MASK', <?= $products['KRAKEN MASK']['price'] ?>, 'KRAKEN MASK.png'); modifyStock('KRAKEN MASK', -1)">
                                Buy Now
                            </button>
                            <button class="btn btn-outline-light add-to-cart btn-sm"
                                style="font-size: 0.8em; white-space: nowrap;"
                                data-name="KRAKEN MASK"
                                data-price="<?= $products['KRAKEN MASK']['price'] ?>"
                                data-image="KRAKEN MASK.png"
                                onclick="addDBuy('KRAKEN MASK', 1, <?= $products['KRAKEN MASK']['price'] ?>); alert('Added to cart')">
                                Add to Cart
                            </button>
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
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#productModalTacticalHelmetBLK">
                        <img src="TACTICAL HELMET BLK.png" class="card-img-top img-fluid" alt="TACTICAL HELMET BLK" style="height: 180px; object-fit: cover;">
                    </a>
                    <div class="card-body d-flex flex-column">
                        <h6 class="feature-title" style="color: white;">TACTICAL HELMET</h6>
                        <p style="color: white;"><?= $products['TACTICAL HELMET BLK']['price'] ?>$</p>
                        <div class="d-flex align-items-center" style="color: gold;">
                            <span><?= $products['TACTICAL HELMET BLK']['rating'] ?> ★★★★★</span>
                            <span style="margin-left: 5px; color: white;"><?= $products['TACTICAL HELMET BLK']['sold'] ?> sold</span>
                        </div>
                        <div class="mt-2" style="color: white; text-align: center;">
                            In stock: <span id="stock-count-tactical-helmet-blk" style="margin-left: 5px;"><?= $products['TACTICAL HELMET BLK']['stock'] ?></span>
                        </div>
                        <div class="button-container mt-auto d-flex justify-content-center">
                            <button class="btn btn-outline-success buy-now btn-sm" style="font-size: 0.8em; white-space: nowrap;"
                                onclick="confirmPurchase('TACTICAL HELMET BLK', <?= $products['TACTICAL HELMET BLK']['price'] ?>, 'TACTICAL HELMET BLK.png'); modifyStock('TACTICAL HELMET BLK', -1)">
                                Buy Now
                            </button>
                            <button class="btn btn-outline-light add-to-cart btn-sm"
                                style="font-size: 0.8em; white-space: nowrap;"
                                data-name="TACTICAL HELMET BLK"
                                data-price="<?= $products['TACTICAL HELMET BLK']['price'] ?>"
                                data-image="TACTICAL HELMET BLK.png"
                                onclick="addDBuy('TACTICAL HELMET BLK', 1, <?= $products['TACTICAL HELMET BLK']['price'] ?>); alert('Added to cart')">
                                Add to Cart
                            </button>
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
                        <div class="mt-2" style="color: white; text-align: center;">
                            In stock: <span id="stock-count-jw-mask-black" style="margin-left: 5px;"><?= $products['JW MASK BLACK']['stock'] ?></span>
                        </div>
                        <div class="button-container mt-auto d-flex justify-content-center">
                            <button class="btn btn-outline-success buy-now btn-sm" style="font-size: 0.8em; white-space: nowrap;"
                                onclick="confirmPurchase('JW MASK BLACK', <?= $products['JW MASK BLACK']['price'] ?>, 'JW MASK BLACK.png'); modifyStock('JW MASK BLACK', -1)">
                                Buy Now
                            </button>
                            <button class="btn btn-outline-light add-to-cart btn-sm"
                                style="font-size: 0.8em; white-space: nowrap;"
                                data-name="JW MASK BLACK"
                                data-price="<?= $products['JW MASK BLACK']['price'] ?>"
                                data-image="JW MASK BLACK.png"
                                onclick="addDBuy('JW MASK BLACK', 1, <?= $products['JW MASK BLACK']['price'] ?>); alert('Added to cart')">
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

        <?php if (isset($products['Rothco Tactical Molle Plate Carrier Vest'])): ?>
            <div class="col product-card" 
                data-name="Rothco Tactical Molle Plate Carrier Vest"
                data-category="Vest"
                data-price="<?= $products['Rothco Tactical Molle Plate Carrier Vest']['price'] ?>"
                data-color="Dessert Tan"
                data-size="Adjustable">
                <div class="card" style="height: 400px; background-color: #1e1e2f; border: 1px solid #444;">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#productModalRothcoTacticalVest">
                        <img src="Rothco Tactical Molle Plate Carrier Vest.png" class="card-img-top img-fluid" alt="Rothco Tactical Molle Plate Carrier Vest" style="height: 180px; object-fit: cover;">
                    </a>
                    <div class="card-body d-flex flex-column">
                        <h5 class="feature-title" style="color: white;">Carrier Vest</h5>
                        <p style="color: white;"><?= $products['Rothco Tactical Molle Plate Carrier Vest']['price'] ?>$</p>
                        <div class="d-flex align-items-center" style="color: gold;">
                            <span><?= $products['Rothco Tactical Molle Plate Carrier Vest']['rating'] ?> ★★★★★</span>
                            <span style="margin-left: 5px; color: white;"><?= $products['Rothco Tactical Molle Plate Carrier Vest']['sold'] ?> sold</span>
                        </div>
                        <div class="mt-2" style="color: white; text-align: center;">
                            In stock: <span id="stock-count-rothco-tactical-molle-plate-carrier-vest" style="margin-left: 5px;"><?= $products['Rothco Tactical Molle Plate Carrier Vest']['stock'] ?></span>
                        </div>
                        <div class="button-container mt-auto d-flex justify-content-center">
                            <button class="btn btn-outline-success buy-now btn-sm" style="font-size: 0.8em; white-space: nowrap;"
                                onclick="confirmPurchase('Rothco Tactical Molle Plate Carrier Vest', <?= $products['Rothco Tactical Molle Plate Carrier Vest']['price'] ?>, 'Rothco Tactical Molle Plate Carrier Vest.png'); modifyStock('Rothco Tactical Molle Plate Carrier Vest', -1)">
                                Buy Now
                            </button>
                            <button class="btn btn-outline-light add-to-cart btn-sm"
                                style="font-size: 0.8em; white-space: nowrap;"
                                data-name="Rothco Tactical Molle Plate Carrier Vest"
                                data-price="<?= $products['Rothco Tactical Molle Plate Carrier Vest']['price'] ?>"
                                data-image="Rothco Tactical Molle Plate Carrier Vest.png"
                                onclick="addDBuy('Rothco Tactical Molle Plate Carrier Vest', 1, <?= $products['Rothco Tactical Molle Plate Carrier Vest']['price'] ?>); alert('Added to cart')">
                                Add to Cart
                            </button>
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
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#productModalEliteCommandantVest">
                        <img src="Elite Survival Systems Commandant Tactical Vest.png" class="card-img-top img-fluid" alt="Elite Survival Systems Commandant Tactical Vest" style="height: 180px; object-fit: cover;">
                    </a>
                    <div class="card-body d-flex flex-column">
                        <h5 class="feature-title" style="color: white;">Tactical Vest</h5>
                        <p style="color: white;"><?= $products['Elite Survival Systems Commandant Tactical Vest']['price'] ?>$</p>
                        <div class="d-flex align-items-center" style="color: gold;">
                            <span><?= $products['Elite Survival Systems Commandant Tactical Vest']['rating'] ?> ★★★★★</span>
                            <span style="margin-left: 5px; color: white;"><?= $products['Elite Survival Systems Commandant Tactical Vest']['sold'] ?> sold</span>
                        </div>
                        <div class="mt-2" style="color: white; text-align: center;">
                            In stock: <span id="stock-count-elite-survival-systems-commandant-tactical-vest" style="margin-left: 5px;"><?= $products['Elite Survival Systems Commandant Tactical Vest']['stock'] ?></span>
                        </div>
                        <div class="button-container mt-auto d-flex justify-content-center">
                            <button class="btn btn-outline-success buy-now btn-sm" style="font-size: 0.8em; white-space: nowrap;"
                                onclick="confirmPurchase('Elite Survival Systems Commandant Tactical Vest', <?= $products['Elite Survival Systems Commandant Tactical Vest']['price'] ?>, 'Elite Survival Systems Commandant Tactical Vest.png'); modifyStock('Elite Survival Systems Commandant Tactical Vest', -1)">
                                Buy Now
                            </button>
                            <button class="btn btn-outline-light add-to-cart btn-sm"
                                style="font-size: 0.8em; white-space: nowrap;"
                                data-name="Elite Survival Systems Commandant Tactical Vest"
                                data-price="<?= $products['Elite Survival Systems Commandant Tactical Vest']['price'] ?>"
                                data-image="Elite Survival Systems Commandant Tactical Vest.png"
                                onclick="addDBuy('Elite Survival Systems Commandant Tactical Vest', 1, <?= $products['Elite Survival Systems Commandant Tactical Vest']['price'] ?>); alert('Added to cart')">
                                Add to Cart
                            </button>
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
            <div class="card" style="height:400px; background-color:#1e1e2f; border:1px solid #444;">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#productModalElbecoBodyShieldV4">
                <img src="Elbeco BodyShield External Vest Carrier V4.png" class="card-img-top img-fluid" alt="Elbeco BodyShield External Vest Carrier V4" style="height:180px; object-fit:cover;">
                </a>
                <div class="card-body d-flex flex-column">
                <h6 class="feature-title" style="color:white;">Elbeco BodyShield</h6>
                <p style="color:white;"><?= $products['Elbeco BodyShield External Vest Carrier V4']['price'] ?>$</p>
                <div class="d-flex align-items-center" style="color:gold;">
                    <span><?= $products['Elbeco BodyShield External Vest Carrier V4']['rating'] ?> ★★★★★</span>
                    <span style="margin-left:5px; color:white;"><?= $products['Elbeco BodyShield External Vest Carrier V4']['sold'] ?> sold</span>
                </div>
                <div class="mt-2" style="color:white; text-align:center;">
                    In stock: <span id="stock-count-elbeco-bodyshield-external-vest-carrier-v4" style="margin-left:5px;"><?= $products['Elbeco BodyShield External Vest Carrier V4']['stock'] ?></span>
                </div>
                <div class="button-container mt-auto d-flex justify-content-center">
                    <button class="btn btn-outline-success buy-now btn-sm" style="font-size:0.8em; white-space:nowrap;"
                            onclick="confirmPurchase('Elbeco BodyShield External Vest Carrier V4', <?= $products['Elbeco BodyShield External Vest Carrier V4']['price'] ?>, 'Elbeco BodyShield External Vest Carrier V4.png'); modifyStock('Elbeco BodyShield External Vest Carrier V4', -1)">
                    Buy Now
                    </button>
                    <button class="btn btn-outline-light add-to-cart btn-sm" style="font-size:0.8em; white-space:nowrap;"
                            data-name="Elbeco BodyShield External Vest Carrier V4"
                            data-price="<?= $products['Elbeco BodyShield External Vest Carrier V4']['price'] ?>"
                            data-image="Elbeco BodyShield External Vest Carrier V4.png"
                            onclick="addDBuy('Elbeco BodyShield External Vest Carrier V4', 1, <?= $products['Elbeco BodyShield External Vest Carrier V4']['price'] ?>); alert('Added to cart')">
                    Add to Cart
                    </button>
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
            <div class="card" style="height:400px; background-color:#1e1e2f; border:1px solid #444;">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#productModalBlackhawkOmegaElite">
                <img src="Blackhawk Omega Elite Cross Draw Vest.png" class="card-img-top img-fluid" alt="Blackhawk Omega Elite Cross Draw Vest" style="height:180px; object-fit:cover;">
                </a>
                <div class="card-body d-flex flex-column">
                <h6 class="feature-title" style="color:white;">Blackhawk Vest</h6>
                <p style="color:white;"><?= $products['Blackhawk Omega Elite Cross Draw Vest']['price'] ?>$</p>
                <div class="d-flex align-items-center" style="color:gold;">
                    <span><?= $products['Blackhawk Omega Elite Cross Draw Vest']['rating'] ?> ★★★★★</span>
                    <span style="margin-left:5px; color:white;"><?= $products['Blackhawk Omega Elite Cross Draw Vest']['sold'] ?> sold</span>
                </div>
                <div class="mt-2" style="color:white; text-align:center;">
                    In stock: <span id="stock-count-blackhawk-omega-elite-cross-draw-vest" style="margin-left:5px;"><?= $products['Blackhawk Omega Elite Cross Draw Vest']['stock'] ?></span>
                </div>
                <div class="button-container mt-auto d-flex justify-content-center">
                    <button class="btn btn-outline-success buy-now btn-sm" style="font-size:0.8em; white-space:nowrap;"
                            onclick="confirmPurchase('Blackhawk Omega Elite Cross Draw Vest', <?= $products['Blackhawk Omega Elite Cross Draw Vest']['price'] ?>, 'Blackhawk Omega Elite Cross Draw Vest.png'); modifyStock('Blackhawk Omega Elite Cross Draw Vest', -1)">
                    Buy Now
                    </button>
                    <button class="btn btn-outline-light add-to-cart btn-sm" style="font-size:0.8em; white-space:nowrap;"
                            data-name="Blackhawk Omega Elite Cross Draw Vest"
                            data-price="<?= $products['Blackhawk Omega Elite Cross Draw Vest']['price'] ?>"
                            data-image="Blackhawk Omega Elite Cross Draw Vest.png"
                            onclick="addDBuy('Blackhawk Omega Elite Cross Draw Vest', 1, <?= $products['Blackhawk Omega Elite Cross Draw Vest']['price'] ?>); alert('Added to cart')">
                    Add to Cart
                    </button>
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
            <div class="card" style="height:400px; background-color:#1e1e2f; border:1px solid #444;">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#productModalTasmanianTigerVestBasePlusMKII">
                <img src="Tasmanian Tiger Vest Base Plus MKII.png" class="card-img-top img-fluid" alt="Tasmanian Tiger Vest Base Plus MKII" style="height:180px; object-fit:cover;">
                </a>
                <div class="card-body d-flex flex-column">
                <h6 class="feature-title" style="color:white;">Tasmanian Vest</h6>
                <p style="color:white;"><?= $products['Tasmanian Tiger Vest Base Plus MKII']['price'] ?>$</p>
                <div class="d-flex align-items-center" style="color:gold;">
                    <span><?= $products['Tasmanian Tiger Vest Base Plus MKII']['rating'] ?> ★★★★★</span>
                    <span style="margin-left:5px; color:white;"><?= $products['Tasmanian Tiger Vest Base Plus MKII']['sold'] ?> sold</span>
                </div>
                <div class="mt-2" style="color:white; text-align:center;">
                    In stock: <span id="stock-count-tasmanian-tiger-vest-base-plus-mkii" style="margin-left:5px;"><?= $products['Tasmanian Tiger Vest Base Plus MKII']['stock'] ?></span>
                </div>
                <div class="button-container mt-auto d-flex justify-content-center">
                    <button class="btn btn-outline-success buy-now btn-sm" style="font-size:0.8em; white-space:nowrap;"
                            onclick="confirmPurchase('Tasmanian Tiger Vest Base Plus MKII', <?= $products['Tasmanian Tiger Vest Base Plus MKII']['price'] ?>, 'Tasmanian Tiger Vest Base Plus MKII.png'); modifyStock('Tasmanian Tiger Vest Base Plus MKII', -1)">
                    Buy Now
                    </button>
                    <button class="btn btn-outline-light add-to-cart btn-sm" style="font-size:0.8em; white-space:nowrap;"
                            data-name="Tasmanian Tiger Vest Base Plus MKII"
                            data-price="<?= $products['Tasmanian Tiger Vest Base Plus MKII']['price'] ?>"
                            data-image="Tasmanian Tiger Vest Base Plus MKII.png"
                            onclick="addDBuy('Tasmanian Tiger Vest Base Plus MKII', 1, <?= $products['Tasmanian Tiger Vest Base Plus MKII']['price'] ?>); alert('Added to cart')">
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
                        <div class="mt-2" style="color: white; text-align: center;">
                            In stock: <span id="stock-count-oakley-light-assault-3-boots" style="margin-left: 5px;"><?= $products['Oakley Light Assault 3 Boots']['stock'] ?></span>
                        </div>
                        <div class="button-container mt-auto d-flex justify-content-center">
                            <button class="btn btn-outline-success buy-now btn-sm" style="font-size: 0.8em; white-space: nowrap;"
                                onclick="confirmPurchase('Oakley Light Assault 3 Boots', <?= $products['Oakley Light Assault 3 Boots']['price'] ?>, 'Oakley Light Assault 3 Boots.png'); modifyStock('Oakley Light Assault 3 Boots', -1)">
                                Buy Now
                            </button>
                            <button class="btn btn-outline-light add-to-cart btn-sm"
                                style="font-size: 0.8em; white-space: nowrap;"
                                data-name="Oakley Light Assault 3 Boots"
                                data-price="<?= $products['Oakley Light Assault 3 Boots']['price'] ?>"
                                data-image="Oakley Light Assault 3 Boots.png"
                                onclick="addDBuy('Oakley Light Assault 3 Boots', 1, <?= $products['Oakley Light Assault 3 Boots']['price'] ?>); alert('Added to cart')">
                                Add to Cart
                            </button>
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
                        <div class="mt-2" style="color: white; text-align: center;">
                            In stock: <span id="stock-count-under-armour-charged-loadout-boots" style="margin-left: 5px;"><?= $products['Under Armour Charged Loadout Boots']['stock'] ?></span>
                        </div>
                        <div class="button-container mt-auto d-flex justify-content-center">
                            <button class="btn btn-outline-success buy-now btn-sm" style="font-size: 0.8em; white-space: nowrap;"
                                onclick="confirmPurchase('Under Armour Charged Loadout Boots', <?= $products['Under Armour Charged Loadout Boots']['price'] ?>, 'Under Armour Charged Loadout Boots.png'); modifyStock('Under Armour Charged Loadout Boots', -1)">
                                Buy Now
                            </button>
                            <button class="btn btn-outline-light add-to-cart btn-sm"
                                style="font-size: 0.8em; white-space: nowrap;"
                                data-name="Under Armour Charged Loadout Boots"
                                data-price="<?= $products['Under Armour Charged Loadout Boots']['price'] ?>"
                                data-image="Under Armour Charged Loadout Boots.png"
                                onclick="addDBuy('Under Armour Charged Loadout Boots', 1, <?= $products['Under Armour Charged Loadout Boots']['price'] ?>); alert('Added to cart')">
                                Add to Cart
                            </button>
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
                        <div class="mt-2" style="color: white; text-align: center;">
                            In stock: <span id="stock-count-altama-maritime-assault-mid-boots" style="margin-left: 5px;"><?= $products['Altama Maritime Assault Mid Boots']['stock'] ?></span>
                        </div>
                        <div class="button-container mt-auto d-flex justify-content-center">
                            <button class="btn btn-outline-success buy-now btn-sm" style="font-size: 0.8em; white-space: nowrap;"
                                onclick="confirmPurchase('Altama Maritime Assault Mid Boots', <?= $products['Altama Maritime Assault Mid Boots']['price'] ?>, 'Altama Maritime Assault Mid Boots.jpg'); modifyStock('Altama Maritime Assault Mid Boots', -1)">
                                Buy Now
                            </button>
                            <button class="btn btn-outline-light add-to-cart btn-sm"
                                style="font-size: 0.8em; white-space: nowrap;"
                                data-name="Altama Maritime Assault Mid Boots"
                                data-price="<?= $products['Altama Maritime Assault Mid Boots']['price'] ?>"
                                data-image="Altama Maritime Assault Mid Boots.jpg"
                                onclick="addDBuy('Altama Maritime Assault Mid Boots', 1, <?= $products['Altama Maritime Assault Mid Boots']['price'] ?>); alert('Added to cart')">
                                Add to Cart
                            </button>
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
                        <div class="mt-2" style="color: white; text-align: center;">
                            In stock: <span id="stock-count-nike-8-sfb-b2-leather-boots" style="margin-left: 5px;"><?= $products['NIKE 8 SFB B2 Leather Boots']['stock'] ?></span>
                        </div>
                        <div class="button-container mt-auto d-flex justify-content-center">
                            <button class="btn btn-outline-success buy-now btn-sm" style="font-size: 0.8em; white-space: nowrap;"
                                onclick="confirmPurchase('NIKE 8 SFB B2 Leather Boots', <?= $products['NIKE 8 SFB B2 Leather Boots']['price'] ?>, 'NIKE 8 SFB B2 Leather Boots.png'); modifyStock('NIKE 8 SFB B2 Leather Boots', -1)">
                                Buy Now
                            </button>
                            <button class="btn btn-outline-light add-to-cart btn-sm"
                                style="font-size: 0.8em; white-space: nowrap;"
                                data-name="NIKE 8 SFB B2 Leather Boots"
                                data-price="<?= $products['NIKE 8 SFB B2 Leather Boots']['price'] ?>"
                                data-image="NIKE 8 SFB B2 Leather Boots.png"
                                onclick="addDBuy('NIKE 8 SFB B2 Leather Boots', 1, <?= $products['NIKE 8 SFB B2 Leather Boots']['price'] ?>); alert('Added to cart')">
                                Add to Cart
                            </button>
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
                        <div class="mt-2" style="color: white; text-align: center;">
                            In stock: <span id="stock-count-danner-8-tachyon-boots" style="margin-left: 5px;"><?= $products['Danner 8 Tachyon Boots']['stock'] ?></span>
                        </div>
                        <div class="button-container mt-auto d-flex justify-content-center">
                            <button class="btn btn-outline-success buy-now btn-sm" style="font-size: 0.8em; white-space: nowrap;"
                                onclick="confirmPurchase('Danner 8 Tachyon Boots', <?= $products['Danner 8 Tachyon Boots']['price'] ?>, 'Danner 8 Tachyon Boots.png'); modifyStock('Danner 8 Tachyon Boots', -1)">
                                Buy Now
                            </button>
                            <button class="btn btn-outline-light add-to-cart btn-sm"
                                style="font-size: 0.8em; white-space: nowrap;"
                                data-name="Danner 8 Tachyon Boots"
                                data-price="<?= $products['Danner 8 Tachyon Boots']['price'] ?>"
                                data-image="Danner 8 Tachyon Boots.png"
                                onclick="addDBuy('Danner 8 Tachyon Boots', 1, <?= $products['Danner 8 Tachyon Boots']['price'] ?>); alert('Added to cart')">
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
</body>
</html>

     
 


