<?php
$data = session()->get();
?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Bituins Flower Shop</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>/public/client_ui/images/website_logo/logo.png" />

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="<?=base_url()?>/public/client_ui/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>/public/client_ui/css/LineIcons.3.0.css" />
    <link rel="stylesheet" href="<?=base_url()?>/public/client_ui/css/tiny-slider.css" />
    <link rel="stylesheet" href="<?=base_url()?>/public/client_ui/css/glightbox.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>/public/client_ui/css/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
    <script src="https://kit.fontawesome.com/e89090f246.js" crossorigin="anonymous"></script>

    
</head>
<style>
.rating {
    display: inline-block;
}

.rating input {
    display: none;
}

.rating label {
    float: right;
    cursor: pointer;
    color: #888;
    font-size: 30px;
}

.rating label:before {
    content: "\2606"; /* Empty star */
}

.rating label:hover:before,
.rating label:hover ~ label:before,
.rating input:checked ~ label:before {
    content: "\2605"; /* Filled star */
    color: #FFD700; /* Star color (adjust as needed) */
    
}
.review-list-container {
        max-height: 390px; /* Adjust the height as needed */
        overflow-y: scroll;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .review-list {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }
    .review-list li {
        margin-bottom: 10px;
        padding: 10px;
        background-color: #f5f5f5;
        border-radius: 5px;
    }
    .review-list li:nth-child(even) {
        background-color: #e9e9e9;
    }
    .review-list li:last-child {
        margin-bottom: 0;
    }
    .swal2-modal {
      max-width: 300px !important; /* Adjust the width as needed */
      max-height: 300px !important;
  }
  .swal2-icon {
    font-size: 10px; /* Change the size to your desired value */
  }
  .button {
    display: flex; /* Display the buttons side by side */
    justify-content: space-between; /* Add space between the buttons */
    align-items: center; /* Align buttons vertically in the middle */
}

/* Style for the "View" button */
.btn-view {
    background-color: #007bff; /* Change the background color to your preference */
    color: #fff; /* Change the text color to your preference */
    padding: 5px 10px; /* Adjust padding as needed */
    border-radius: 5px; /* Add rounded corners if desired */
}
</style>

<body>
    
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/652a3dc36fcfe87d54b9acb4/1hcmg2h6f';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script--> 


   
    <!-- Start Header Area -->
    <header class="header navbar-area">
        <!-- Start Topbar -->
        <div class="topbar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4 col-12">
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-middle">
                                <ul class="useful-links">
                                    <li><a href="<?= base_url('home') ?>">Home</a></li>
                                    <li><a href="<?= base_url('about_us') ?>">About Us</a></li>
                                    <li><a href="<?= base_url('contact_us') ?>">Contact Us</a></li>
                                </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">

                        <div class="top-end">
                            <ul class="user-login">
                                    <?php if(@$data['isLoggedIn']) { ?>
                                    <li>
                                       <div class="user">
                                            <a href="<?=base_url('my_account')?>"><i class="lni lni-user"></i>
                                            <span>My Account</span></a>
                                                <!-- <a href="">My Account</a>
                                                <a href="">My Purchase</a>
                                                <a href="">My Booking</a> -->
                                        </div>
                                    </li>
                                    <li>
                                        <a href="<?=base_url('logout')?>">Logout</a>
                                    </li>
                                    <?php }else { ?>
                                    <li>
                                        <a href="<?=base_url('signin')?>">Sign In</a>
                                    </li>
                                    <li>
                                        <a href="<?=base_url('signup')?>">Register</a>
                                    </li>
                                <?php }?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        <!-- End Topbar -->
        <!-- Start Header Middle -->
        <div class="header-middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-7">
                        <!-- Start Header Logo -->
                        <a class="navbar-brand" href="<?= base_url('home') ?>">
                            <img src="<?=base_url()?>/public/client_ui/images/website_logo/bituins_logo.png" alt="Logo">
                        </a>
                        <!-- End Header Logo -->
                    </div>
                    <div class="col-lg-5 col-md-7 d-xs-none">
                        <!-- Start Main Menu Search -->
                        <div class="main-menu-search">
                        
                        </div>
                        <!-- End Main Menu Search -->
                    </div>
                    <div class="col-lg-4 col-md-2 col-5">
                        <div class="middle-right-area">
                            <div class="nav-hotline">
                                
                            </div>
                            <div class="navbar-cart">
                                <?php $session = session(); ?>
                                <?php if (@$data['isLoggedIn']) : ?>
                          
                                <div class="cart-items">
                                    <a href="javascript:void(0)" class="main-btn">
                                        <i class="lni lni-cart"></i>
                                        <span class="total-items"><?= count($cart_items) ?></span>
                                    </a>
                                    <!-- Shopping Item -->
                                    <div class="shopping-item">
                                        <div class="dropdown-cart-header">
                                            <?php if (count($cart_items) == 0) { ?>
                                                <div class="col-sm-12 text-center">
                                                    <span><i class="lni lni-cart" style="font-size:20px;"></i> Your cart is empty</i></span>
                                                </div>
                                            <?php }else{ ?>
                                            <span><?= count($cart_items) ?> Items</span>
                                            <a href="<?=base_url('cart')?>">View Cart</a>
                                        </div>
                                        <ul class="shopping-list">
                                            <?php
                                                $totalItemPrice = 0;
                                                $subtotal = 0;
                                                foreach ($cart_items as $cart_data) {
                                                $totalItemPrice += $cart_data['cart_cost'] * $cart_data['CartQty'];
                                                $subtotal += $cart_data['cart_cost'] * $cart_data['CartQty'];
                                            ?>
                                            <li>
                                               <a href="javascript:void(0)" id="button" onclick="removeItem(<?= $cart_data['id']; ?>,<?= $cart_data['Cartid']; ?>)" class="remove" title="Remove this item"><i
                                                        class="lni lni-close"></i></a>
                                                <div class="cart-img-head">
                                                    <a class="cart-img"><img src="<?= base_url("public/public/products/" . $cart_data['product_image']) ?>"></a>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="<?= base_url(); ?>/productdetails/<?= $cart_data['id']; ?>"><?= $cart_data['product_name'] ?></a></h4>
                                                    <p class="quantity"><?=$cart_data['CartQty'];?>x - <span class="amount">&#8369; <?= $cart_data['CartQty'] * $cart_data['cart_cost'] ?></span></p>
                                                </div>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                        <div class="bottom">
                                            <div class="total">
                                                <span>Total</span>
                                                <span class="total-amount"><?= '&#8369;' . number_format($subtotal, 2) ?></span>
                                            </div>
                                            <div class="button">
                                                <a href="<?= base_url('checkout') ?>" class="btn animate">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ End Shopping Item -->
                                <?php } endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Middle -->
        <!-- Start Header Bottom -->
         <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="nav-inner">
                        <!-- Start Mega Category Menu -->
                     
                        <!-- End Mega Category Menu -->
                        <!-- Start Navbar -->
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a href="<?= base_url('home') ?>" class="active" aria-label="Toggle navigation">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                            data-bs-target="#submenu-1-3" aria-controls="navbarSupportedContent"
                                            aria-expanded="false" aria-label="Toggle navigation">Flowers</a>
                                        <ul class="sub-menu collapse" id="submenu-1-3">
                                            <?php if(@$data['isLoggedIn']) { ?>
                                                <?php foreach ($category as $item): ?>
                                                <li class="nav-item"><a href="<?= site_url('filterByCategory_' . $item['id']); ?>"><?= $item['cat_name']; ?></a></li>
                                            <?php endforeach; ?>
                                            <?php } else { ?>
                                            <?php foreach ($category as $item): ?>
                                                <li class="nav-item"><a href="<?= site_url('filterByCategory_' . $item['id']); ?>"><?= $item['cat_name']; ?></a></li>
                                            <?php endforeach; ?>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                            data-bs-target="#submenu-4-6" aria-controls="navbarSupportedContent"
                                            aria-expanded="false" aria-label="Toggle navigation">Shop</a>
                                        <ul class="sub-menu collapse" id="submenu-4-6">
                                            <?php if(@$data['isLoggedIn']) { ?>
                                            <li class="nav-item"><a href="<?=base_url('product_grids');?>">Shop Grid</a></li>
                                            <li class="nav-item"><a href="<?=base_url('cart');?>">Cart</a></li>
                                            <li class="nav-item"><a href="<?=base_url('checkout');?>">Checkout</a></li>
                                            <?php } else { ?>
                                            <li class="nav-item"><a href="<?=base_url('signin');?>">Shop Grid</a></li>
                                            <li class="nav-item"><a href="<?=base_url('signin');?>">Shop List</a></li>
                                            <li class="nav-item"><a href="<?=base_url('signin');?>">Cart</a></li>
                                            <li class="nav-item"><a href="<?=base_url('signin');?>">Checkout</a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    
                                     <li class="nav-item">
                                        <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                            data-bs-target="#submenu-4-6" aria-controls="navbarSupportedContent"
                                            aria-expanded="false" aria-label="Toggle navigation">Reservation</a>
                                        <ul class="sub-menu collapse" id="submenu-4-6">
                                            <?php if(@$data['isLoggedIn']) { ?>
                                            <li class="nav-item"><a href="<?=base_url('book_now');?>">Book Now</a></li>
                                            <li class="nav-item"><a href="<?=base_url('my_booking');?>">My Booking</a></li>
                                            <?php } else { ?>
                                            <li class="nav-item"><a href="<?=base_url('signin');?>">Book Now</a></li>
                                            <li class="nav-item"><a href="<?=base_url('signin');?>">My Booking</a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    
                                    
                                    <li class="nav-item">
                                        <a href="<?=base_url('customize')?>" aria-label="Toggle navigation">Customize</a>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->
                        </nav>
                        <!-- End Navbar -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Nav Social -->
                    <div class="nav-social">
                        <h5 class="title">Follow Us:</h5>
                        <ul>
                            <li>
                                <a href="https://www.facebook.com/jenny.acedillo"><i class="lni lni-facebook-filled"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Nav Social -->
                </div>
            </div>
        </div>
        <!-- End Header Bottom -->
    </header>
    <!-- End Header Area -->





    
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Single Product</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="<?= base_url('home') ?>"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="<?= base_url('product_grids') ?>">Shop</a></li>
                        <li>Single Product</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Item Details -->
    <section class="item-details section">
        <div class="container">
            <div class="top-area">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-images">
                            <main id="gallery">
                                <div class="main-img">
                                <img src="<?= base_url("public/public/products/".$productdetails['product_image'])?>" id="current" alt="products">
                                </div>
                            </main>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info">
                            <h2 class="title"><?= $productdetails['product_name']; ?></h2>
                            <ul class="review">
                                <?php
                                    $product_id = $productdetails['id'];
                                    $ratings = array_filter($reviews, function ($review) use ($product_id) {
                                        return $review['product_id'] == $product_id;
                                    });

                                    $rating_sum = 0;
                                    foreach ($ratings as $rating) {
                                        $rating_sum += $rating['rating'];
                                    }

                                    $average_rating = 0;
                                    if (count($ratings) > 0) {
                                        $average_rating = $rating_sum / count($ratings);
                                    }
                                    
                                    $stars = floor($average_rating);
                                    $half_star = ($average_rating - $stars) >= 0.5;

                                    for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $stars) {
                                        echo '<span class="fa fa-star" style="font-size:15px;color:gold;"></span>';
                                    } elseif ($half_star && $i == ($stars + 1)) {
                                        echo '<span class="fa fa-star-half-o" style="font-size:15px;color:gold;"></span>';
                                    } else {
                                        echo '<span class="fa fa-star-o" style="font-size:15px;color:#ccc;"></span>';
                                    }
                                    }
                                ?>
                            </ul>
                            <h3 class="price mt-2">₱ <?= $productdetails['product_price']; ?></h3>
                            <p class="info-text"><?= $productdetails['product_des']; ?></p>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-12">
                                    
                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    
                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    
                                </div>
                            </div>
                            <div class="bottom-content">
                                <div class="row align-items-end">
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <?php if(@$data['isLoggedIn']) { ?>
                                            <div class="button cart-button">
                                                
                                                <a id="addtocartbtn" onclick="add_tocart(<?= $productdetails['id']; ?>, <?= $productdetails['product_price']; ?>, <?= @$data['id']; ?>)"
                                                class="btn" style="width: 100%;">Add to Cart</a>
                                      
                                            </div> 
                                        <?php } else { ?>
                                            <div class="button cart-button">
                                                <a href="<?= base_url('/signin'); ?>" class="btn" style="width: 100%;">Add to Cart</a>
                                            </div> 
                                        <?php } ?>
                                    </div>
                                    
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="wish-button">
                                            <button class="btn" id="see-reviews-btn" onclick="toggleReviews()"><i class="lni lni-comments-alt"></i>Check Reviews</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <!-- <div class="wish-button">
                                            <button class="btn"><i class="lni lni-heart"></i> To Wishlist</button>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="product-details-info" id="reviews-container" style="display: none;">
                <div class="row">
                <?php if (!empty($review)): ?>
                    <div class="col-lg-12 col-12">
                        <div class="single-block">
                            <div class="reviews">
                                <h4 class="title">Latest Reviews</h4>
                                <!-- Start Single Review -->
                                <div class="single-review">
                                    <!-- <img src="assets/images/blog/comment1.jpg" alt="#"> -->
                                    <div class="review-info">
                                    <?php foreach ($review as $review): ?>
                                        <h4>
                                            <div class="d-flex justify-content-between">
                                                <span>Name: <?= $review['name'] ?></span>
                                                <small><span class="review-created-at">Time: <?= $review['date'] ?></span></small>
                                            </div>
                                            <span>Quantity: <?= $review['variation'] ?>pc</span>
                                        </h4>
                                        <ul class="stars"><p>Rating: </p>
                                        <?php for ($i = 1; $i <= $review['rating']; $i++): ?><span class="fa fa-star" style="color: gold;"></span><?php endfor; ?>
                                        </ul>
                                        <?php if (!empty($review['review'])): ?>
                                        <p> Comment: <?= $review['review'] ?></p>
                                        <?php endif; ?>
                                        <?php if (!empty($review['response'])): ?>
                                        <p> Seller Response: <?= $review['response'] ?></p>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <!-- End Single Review -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       <!-- Start Trending Product Area -->
   <?php
if (!empty($best_seller)) {
?>
    <section class="trending-product section" style="margin-top: 12px;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <h2>Trending Product</h2>
                        <p>This is the best products of our shop. You bring the thought. We’ll bring the flowers. Shouldn’t your flowers be unique too?</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
            <?php foreach($best_seller as $best_item) {
          foreach($product as $product_list) {
            if ($product_list['id'] === $best_item['product_id']) {
        ?>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <img src="<?= base_url("public/public/products/" . $product_list['product_image']) ?>">
                            <div class="button">
                           <a id="addtocartbtn" onclick="add_tocart(<?= $product_list['id']; ?>, <?= $product_list['product_price']; ?>, <?= @$data['id']; ?>)"
                                                                        class="btn" style="width: 100%;">Add to Cart</a>
                            <a href="<?= base_url(); ?>/productdetails/<?= $product_list['id']; ?>" class="btn btn-view">View</a>
                        </div>
                        </div>
                        <div class="product-info">
                            <h4 class="title">
                                <a href="javascript:void(0)"><?= $product_list['product_name']; ?></a>
                            </h4>
                            <ul class="review">
                            <?php
                                $product_id = $product_list['id'];
                                $ratings = array_filter($reviews, function ($review) use ($product_id) {
                                    return $review['product_id'] == $product_id;
                                });

                                $rating_sum = 0;
                                foreach ($ratings as $rating) {
                                    $rating_sum += $rating['rating'];
                                }

                                $average_rating = 0;
                                if (count($ratings) > 0) {
                                    $average_rating = $rating_sum / count($ratings);
                                }
                                
                                $stars = floor($average_rating);
                                $half_star = ($average_rating - $stars) >= 0.5;

                                for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $stars) {
                                    echo '<span class="fa fa-star" style="font-size:15px;color:gold;"></span>';
                                } elseif ($half_star && $i == ($stars + 1)) {
                                    echo '<span class="fa fa-star-half-o" style="font-size:15px;color:gold;"></span>';
                                } else {
                                    echo '<span class="fa fa-star-o" style="font-size:15px;color:#ccc;"></span>';
                                }
                                }
                            ?>
                            </ul>
                            <div>
                                <span>₱ <?= $product_list['product_price']; ?></span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
                <?php
              break;
            }
          }
        } ?>
            </div>
        </div>
    <?php
}
?>

<section class="trending-product section" style="margin-top: 12px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>All Products</h2>
                        <p>Affordable & Quality</p>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php foreach($product as $row) : ?>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <img src="<?= base_url("public/public/products/" . $row['product_image']) ?>">
                            <div class="button">
                           <a id="addtocartbtn" onclick="add_tocart(<?= $row['id']; ?>, <?= $row['product_price']; ?>, <?= @$data['id']; ?>)"
                                                                        class="btn" style="width: 100%;">Add to Cart</a>
                            <a href="<?= base_url(); ?>/productdetails/<?= $row['id']; ?>" class="btn btn-view">View</a>
                        </div>
                        </div>
                        <div class="product-info">
                            <h4 class="title">
                                <a href="javascript:void(0)"><?= $row['product_name']; ?></a>
                            </h4>
                            <ul class="review">
                            <?php
                                $product_id = $row['id'];
                                $ratings = array_filter($reviews, function ($review) use ($product_id) {
                                    return $review['product_id'] == $product_id;
                                });

                                $rating_sum = 0;
                                foreach ($ratings as $rating) {
                                    $rating_sum += $rating['rating'];
                                }

                                $average_rating = 0;
                                if (count($ratings) > 0) {
                                    $average_rating = $rating_sum / count($ratings);
                                }
                                
                                $stars = floor($average_rating);
                                $half_star = ($average_rating - $stars) >= 0.5;

                                for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $stars) {
                                    echo '<span class="fa fa-star" style="font-size:15px;color:gold;"></span>';
                                } elseif ($half_star && $i == ($stars + 1)) {
                                    echo '<span class="fa fa-star-half-o" style="font-size:15px;color:gold;"></span>';
                                } else {
                                    echo '<span class="fa fa-star-o" style="font-size:15px;color:#ccc;"></span>';
                                }
                                }
                            ?>
                            </ul>
                            <div>
                                <span>₱ <?= $row['product_price']; ?></span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- End Item Details -->

    
    <!-- Start Footer Area -->
    <footer class="footer">
        <!-- Start Footer Top -->
        <div class="footer-top">
            <div class="container">
                <div class="inner-content">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="footer-logo">
                                <a href="<?=base_url('home')?>">
                                    <img src="<?=base_url()?>/public/client_ui/images/website_logo/footer_logo.png" alt="#">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-12">
                            <div class="footer-newsletter">
                                <h4 class="title">
                                    Subscribe to our Newsletter
                                    <span>Get all the latest information, Sales and Offers.</span>
                                </h4>
                                <div class="newsletter-form-head">
                                    <form action="#" method="get" target="_blank" class="newsletter-form">
                                        <input name="EMAIL" placeholder="Email address here..." type="email">
                                        <div class="button">
                                            <button class="btn">Subscribe<span class="dir-part"></span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Top -->
        <!-- Start Footer Middle -->
        <div class="footer-middle">
            <div class="container">
                <div class="bottom-inner">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-contact">
                                <h3>Get In Touch With Us</h3>
                                <p class="phone">Location:<br>Calapan City, Jp. Rizal St. beside Halina Bakery</p><br>
                                <p class="phone">Phone: (+639)48 812 3232</p>
                                <ul>
                                    <li><span>Monday-Funday: </span> 7.00 am - 6.00 pm</li>
                                    <li><span>Saturday-Sunday: </span> 7.00 am - 7.00 pm</li>
                                </ul>
                                <p class="mail">
                                    <a href="mailto:bituinflowershop@gmail.com">bituinflowershop@gmail.com</a>
                                </p>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        
                        <div class="col-lg-4 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3>Information</h3>
                                <ul>
                                    <li><a href="<?= base_url('about_us') ?>">About Us</a></li>
                                    <li><a href="<?= base_url('contact_us') ?>">Contact Us</a></li>
                                    <li><a href="<?= base_url('about_us') ?>">Sitemap</a></li>
                                    <li><a href="<?= base_url('faq') ?>">FAQs Page</a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3>Shop Departments</h3>
                                <ul>
                                    <li><a href="<?= base_url('') ?>">Flower Design</a></li>
                                    <li><a href="<?= base_url('book_now') ?>">Booking</a></li>
                                    <li><a href="<?= base_url('customize') ?>">Customize</a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Middle -->
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="inner-content">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-12">
                            <div class="payment-gateway">
                                <span>We Accept:</span>
                                <span>Gcash Payment</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="copyright">
                                <p>Designed and Developed by<a>Bituins Flower Shop Team</a></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <ul class="socila">
                                <li>
                                    <span>Follow Us On:</span>
                                </li>
                                <li><a href="https://www.facebook.com/jenny.acedillo"><i class="lni lni-facebook-filled"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="<?=base_url()?>/public/client_ui/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>/public/client_ui/js/tiny-slider.js"></script>
    <script src="<?=base_url()?>/public/client_ui/js/glightbox.min.js"></script>
    <script src="<?=base_url()?>/public/client_ui/js/main.js"></script>
    <script src="<?= base_url() ?>/public/js/custom.js"></script>
     <script src="<?= base_url() ?>/public/sweetalert/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript">

       
function toggleReviews() {
    var reviewsContainer = document.getElementById("reviews-container");
    var seeReviewsBtn = document.getElementById("see-reviews-btn");
    var hasReviews = <?php echo !empty($review) ? 'true' : 'false'; ?>;

    if (hasReviews) {
    if (reviewsContainer.style.display === "none") {
        reviewsContainer.style.display = "block";
        seeReviewsBtn.innerHTML = '<i class="lni lni-circle-minus"></i> Hide Reviews'; // Set the HTML content correctly
    } else {
        reviewsContainer.style.display = "none";
        seeReviewsBtn.innerHTML = '<i class="lni lni-comments-alt"></i> Check Reviews'; // Set the HTML content correctly
    }
} else {
    showNoReviewsAlert();
}
}

    function showNoReviewsAlert() {
        Swal.fire({
            icon: 'info',
            title: 'No Reviews Yet',
            text: 'Be the first to leave a review!',
            confirmButtonText: 'OK'
        });
    }

 // Convert the review created_at time to desired formats
 const reviewCreatedAtElements = document.querySelectorAll('.review-created-at');
    reviewCreatedAtElements.forEach(element => {
        const createdAt = new Date(element.textContent);

        // Format the month name
        const monthNames = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];
        const month = monthNames[createdAt.getMonth()];

        // Format the day name
        const dayNames = [
            "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"
        ];
        const day = dayNames[createdAt.getDay()];

        // Format the time with AM/PM
        let hours = createdAt.getHours();
        let ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12;
        hours = hours ? hours : 12;
        let minutes = createdAt.getMinutes();
        minutes = minutes < 10 ? '0' + minutes : minutes;
        let seconds = createdAt.getSeconds();
        seconds = seconds < 10 ? '0' + seconds : seconds;

        // Construct the formatted date and time
        const formattedDate = `${month} ${createdAt.getDate()}, ${day}`;
        const formattedTime = `${hours}:${minutes}:${seconds} ${ampm}`;

        element.textContent = `${formattedDate} ${formattedTime}`;
    });


 // Client-side validation
 var reviewForm = document.getElementById('reviewForm');
        var ratingInputs = reviewForm.querySelectorAll('input[name="rating"]');
        var ratingError = document.getElementById('rating-error');

        reviewForm.addEventListener('submit', function (event) {
            // Check if a rating is selected
            var ratingSelected = false;
            for (var i = 0; i < ratingInputs.length; i++) {
                if (ratingInputs[i].checked) {
                    ratingSelected = true;
                    break;
                }
            }

            if (!ratingSelected) {
                event.preventDefault(); // Prevent form submission
                ratingError.textContent = 'Please select a rating.'; // Display error message
            }
        });


 $(document).ready(function(){
    <?php if(session()->getFlashdata('status')){?>
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
Toast.fire({
  icon: '<?= session()->getFlashdata('status_icon')?>',
  title: '<?= session()->getFlashdata('status')?>'
})
      <?php }?>
});

</script>
</body>

</html>