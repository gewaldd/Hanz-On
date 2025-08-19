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
            background-color: #000000;
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

        /* Content Sections */
        .content {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        /* Carousel */
        .carousel {
            padding: 0 70px;
            margin-bottom: 50px;
        }

        .carousel-indicators {
            bottom: -50px;
            /* Adjust this value as needed (e.g., 20px, 30px) */
        }

        .carousel-item {
            color: #999;
            font-size: 14px;
            text-align: center;
            overflow: hidden;
            min-height: 290px;
        }

        .carousel-item .img-box {
            width: 300px;
            height: 300px;
            margin: 0 auto;
            padding: 5px;
            border: 1px solid #333;
            border-radius: 10px;
            background-color: #000;
        }

        .carousel-item img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
            border-radius: 10px;
        }

        .testimonial {
            color: #ffffff;
            padding: 30px 0 10px;
        }

        .overview {
            font-style: italic;
            color: #ffffff;
        }

        .overview b {
            text-transform: uppercase;
            color: #8fbc54;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 40px;
            height: 40px;
            margin-top: -20px;
            top: 50%;
            background: none;
        }

        .carousel-control-prev i,
        .carousel-control-next i {
            font-size: 68px;
            line-height: 42px;
            position: absolute;
            display: inline-block;
            color: rgba(255, 255, 255, 0.8);
            text-shadow: 0 3px 3px #333, 0 0 0 #000;
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

        /* Footer */
        footer {
            background-color: #000;
            padding: 15px;
            text-align: center;
            border-top: 1px solid #333;
            position: fixed;
            bottom: 0;
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

    <div class="container-xl">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2>Featured Items</h2>
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
                            <div class="img-box"><img src="dbell.jpg" alt="D-Bell VSR-10"></div>
                            <p class="testimonial">The D-Bell VSR-10 Wood Design refers to a type of airsoft sniper
                                rifle that is a part of the VSR-10 family, made by the brand D-Bell. The VSR-10 itself
                                is one of the most popular bolt-action sniper rifles used in airsoft, originally
                                designed by Tokyo Marui. The "Wood Design" typically refers to the aesthetic appearance
                                of the gun, which mimics a wooden stock, giving it a more traditional and realistic
                                look, as opposed to the more common plastic or synthetic materials used in other airsoft
                                rifles.</p>
                            <p class="overview"><b>D-Bell VSR-10 Wood Design</b></p>
                        </div>
                        <div class="carousel-item">
                            <div class="img-box"><img src="glock18.jpg" alt="Glock-18"></div>
                            <p class="testimonial">The Glock 18 Airsoft is a replica of the real-world Glock 18, a
                                semi-automatic and fully-automatic handgun, but designed for airsoft use. Airsoft
                                versions of the Glock 18 are typically gas blowback (GBB) or electric blowback (EBB)
                                pistols, offering a mix of realism and performance.</p>
                            <p class="overview"><b>Glock-18</b></p>
                        </div>
                        <div class="carousel-item">
                            <div class="img-box"><img src="hk416.jpg" alt="HK416"></div>
                            <p class="testimonial">The HK416 Airsoft is a replica of the Heckler & Koch HK416, a
                                versatile and highly regarded assault rifle used by military and law enforcement around
                                the world. In the airsoft world, the HK416 is known for its reliability, accuracy, and
                                realistic performance, often favored by players who want a tactical, high-performance
                                rifle for their airsoft skirmishes.</p>
                            <p class="overview"><b>HK416</b></p>
                        </div>
                        <div class="carousel-item">
                            <div class="img-box"><img src="onimask.jpg" alt="Oni Mask"></div>
                            <p class="testimonial">An Oni Mask for an airsoft helmet is a type of protective gear that
                                is both functional and visually striking. The Oni mask design originates from Japanese
                                mythology, where Oni are supernatural creatures, often depicted as large, horned demons.
                                These masks, typically worn as part of traditional costumes or martial arts gear, have
                                become popular in various subcultures, including airsoft, due to their intimidating look
                                and cultural significance.</p>
                            <p class="overview"><b>Oni Mask</b></p>
                        </div>
                        <div class="carousel-item">
                            <div class="img-box"><img src="Vortex Diamondback Tactical 4-16×44 .jpg"
                                    alt="Vortex Diamondback"></div>
                            <p class="testimonial">The Vortex Diamondback Tactical 4-16×44 is a high-quality riflescope
                                that's an excellent option for airsoft snipers or players looking for long-range
                                precision. It's built to be durable, versatile, and accurate, with features that make it
                                suitable for airsoft games, especially those that involve longer-range engagements.</p>
                            <p class="overview"><b>Vortex Diamondback Tactical 4-16×44</b></p>
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

    <div class="content">
        <h3>HANZ ON AIRSOFT EQUIPMENTS!</h3>
        <p>TOYZ FOR THE BIG BOYZ!
            <br>Shop all our different equipments, with a free 1 year warranty and free domestic shipping on orders over
            $10!
        </p>
    </div>

    <div class="content">
        <h3>Shop Latest Deals!</h3>
        <div class="products-container">
            <div class="product">
                <a href="javascript:alert('Modal of the game');"><img src="onimask.jpg" alt="Oni Mask"></a>
                <p>Oni Mask<br>★5.0 ★★★★</p>
                <div class="button-container">
                    <button class="btn btn-success buy-now" onclick="buyNow('Oni Mask', 29, 'onimask.jpg')">Buy
                        Now</button>
                    <button class="btn btn-light add-to-cart" data-name="Oni Mask" data-price="29"
                        data-image="onimask.jpg">Add to Cart</button>
                </div>
                <span class="sold-out-label" style="display: none; color: #ff0000;">Sold Out</span>
            </div>

            <div class="product">
                <a href="javascript:alert('Modal of the game');"><img src="EC.png" alt="EC 501C L96 BLACK"></a>
                <p>EC 501C L96 BLACK<br>4.9 ★★★★★</p>
                <div class="button-container">
                    <button class="btn btn-success buy-now" onclick="buyNow('Pepsiman', 19, 'Pepsiman.jpg')">Buy
                        Now</button>
                    <button class="btn btn-light add-to-cart" data-name="EC 501C L96 BLACK" data-price="19"
                        data-image="EC.png">Add to Cart</button>
                </div>
                <span class="sold-out-label" style="display: none; color: #ff0000;">Sold Out</span>
            </div>

            <div class="product">
                <a href="javascript:alert('Modal of the game');"><img src="hk416.jpg" alt="Heckler & Koch HK416"></a>
                <p>Heckler & Koch HK416<br>4.5 ★★★★</p>
                <div class="button-container">
                    <button class="btn btn-success buy-now"
                        onclick="buyNow('HK416', 29, 'hk416.jpg')">Buy Now</button>
                    <button class="btn btn-light add-to-cart" data-name="Resident Evil" data-price="29"
                        data-image="hk416.jpg">Add to Cart</button>
                </div>
                <span class="sold-out-label" style="display: none; color: #ff0000;">Sold Out</span>
            </div>

            <div class="product">
                <a href="javascript:alert('Modal of the game');"><img src="dbell.jpg" alt="D BELL VSR 10 WOOD"></a>
                <p>D BELL VSR 10 WOOD DESIGN<br>5.0 ★★★★★</p>
                <div class="button-container">
                    <button class="btn btn-success buy-now" onclick="buyNow('D BELL VSR 10 WOOD', 19, 'dbell.jpg')">Buy
                        Now</button>
                    <button class="btn btn-light add-to-cart" data-name="D BELL VSR 10 WOOD" data-price="19"
                        data-image="dbell.jpg">Add to Cart</button>
                </div>
                <span class="sold-out-label" style="display: none; color: #ff0000;">Sold Out</span>
            </div>
        </div>
        <br>
        <a href="products.php" class="btn btn-warning">Shop More Deals</a>
    </div>

    <!-- Footer Sections -->
    <div class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h5>Hanz On Airsoft Archives!</h5>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Repair Center</a></li>
                        <li><a href="#">Deals and Coupons</a></li>
                        <li><a href="#">Rewards</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>COMPANY</h5>
                    <ul>
                        <li><a href="#">Shipping & Returns</a></li>
                        <li><a href="#">Refurbish & Inspection Process</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">California Privacy</a></li>
                        <li><a href="#">Testimonials</a></li>
                        <li><a href="#">FAQs</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>ACCOUNT</h5>
                    <ul>
                        <li><a href="#">Track My Order</a></li>
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Shopping Cart</a></li>
                        <li><a href="#">Accessibility</a></li>
                        <li><a href="#">Terms and Conditions</a></li>
                        <li><a href="#">Secure Shopping</a></li>
                        <li><a href="#">Sitemap</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>GET SOCIAL</h5>
                    <div class="social-icons">
                        <a href="#"><img src="facebook.png" alt="Facebook"></a>
                        <a href="#"><img src="twitter.png" alt="Twitter"></a>
                        <a href="#"><img src="youtube.png" alt="YouTube"></a>
                        <a href="#"><img src="instagram.png" alt="Instagram"></a>
                        <a href="#"><img src="tiktok.png" alt="TikTok"></a>
                    </div>
                    <p style="margin-top: 15px;">
                        Hanz On Airsoft Archives.com<br>
                        938 Aurora Boulevard, Cubao<br>
                        Quezon City, Philippines 1100
                    </p>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>1 YEAR WARRANTY that nobody can beat!</p>
    </footer>

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
                    <p style="font-size: 1.1em; margin-bottom: 20px;">Check out our latest deals and coupons to save on
                        your favorite games!</p>
                    <div class="deal-list">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>10% off on your first purchase with code <strong>DISCOUNT10</strong></span>
                                <button class="btn btn-info btn-sm" onclick="copyToClipboard('DISCOUNT10')">Copy
                                    Code</button>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>20% off on your first purchase with code <strong>DISCOUNT20</strong></span>
                                <button class="btn btn-info btn-sm" onclick="copyToClipboard('DISCOUNT20')">Copy
                                    Code</button>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>30% off on your first purchase with code <strong>DISCOUNT30</strong></span>
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

    <!-- Cart Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel"
        aria-hidden="true">
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
                <div class="modal-footer"
                    style="display: flex; flex-direction: column; align-items: flex-start; width: 100%;">
                    <div class="coupon-section" style="display: flex; align-items: center; width: 100%;">
                        <input type="text" id="coupon-code" class="form-control" placeholder="Enter coupon code"
                            style="flex: 1; margin-right: 10px;">
                        <button class="btn btn-info" id="apply-coupon">Apply Coupon</button>
                    </div>
                    <p id="coupon-message" style="color: #ff6b6b; margin-top: 5px;"></p>
                    <div style="display: flex; justify-content: space-between; width: 100%;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            style="flex: 1; margin-right: 10px;">Close</button>
                        <button class="btn btn-primary" id="checkout-btn" style="flex: 1;">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        let cart = [];
        let discount = 0;

        $(document).ready(function () {
            // Event listener for adding items to the cart
            $('.add-to-cart').click(function () {
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
                    // Modified quantity cell with plus and minus buttons
                    row.append(`
                <td>
                    <div class="quantity-controls" style="display: flex; align-items: center;">
                        <button class="btn btn-sm btn-secondary minus-quantity" data-index="${index}">-</button>
                        <span class="mx-2">${item.quantity}</span>
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

                // Add event listeners for quantity buttons
                $('.plus-quantity').click(function () {
                    let index = $(this).data('index');
                    cart[index].quantity += 1;
                    updateCart();
                });

                $('.minus-quantity').click(function () {
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
                $('.remove-item').click(function () {
                    let index = $(this).data('index');
                    cart.splice(index, 1);
                    updateCart();
                    updateCartCount();
                });
            }

            $('#cart-count').text(cart.length);
        }

        function updateCartCount() {
            let cartItems = $('#cart-items');
            cartItems.empty();
            $('#cart-count').text(count);
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
    </script>

</body>

</html>