<?php
use App\Models\Cart_model;
$data = session()->get();
$Cart_model = new Cart_model();
$totalItemPrice = 0;
$subtotal = 0;
$cartcount = 0;
if(@$data['isLoggedIn']){
    $userId = $data['id'];
    $cartcount = $Cart_model->where('fk_user_id', $userId)->countAll();
    }
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

    <style>
        .modal.fade .modal-dialog {
    transform: translate(0, -50%);
    transition: transform 0.3s ease-out;
  }
  .modal.fade.show .modal-dialog {
    transform: translate(0, 0);
  }
  .modal.fade.show {
    background-color: rgba(0, 0, 0, 0.6); /* Adjust the opacity as desired */
  }
    </style>

</head>


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
                                             <span><?= isset($userData['firstname']) ? $userData['firstname'] : '' ?> <?= isset($userData['lastname']) ? $userData['lastname'] : '' ?></span></a>
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
                                                    <h4><a href="product-details.html"><?= $cart_data['product_name'] ?></a></h4>
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
                                                <a href="<?=base_url('checkout')?>" class="btn animate">Checkout</a>
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
                                            <li class="nav-item"><a href="<?=base_url('orders');?>">My Orders</a></li>
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
                        <h1 class="page-title">My Account</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="<?= base_url('home') ?>"><i class="lni lni-home"></i> Home</a></li>
                        <li>My Account</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->



<!-- Start Contact Area -->
<section id="contact-us" class="contact-us section">
    <div class="container">
        <div class="contact-head">
            <div class="contact-info">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="single-info-head">
                            <!-- Start Single Info -->
                            <div class="single-info">
                                <i class="lni lni-user"></i>
                                <h3><span><?= $data['firstname']?>.<?= $data['lastname']?></span></h3>
                                <ul>
                                    <li><a href="<?=base_url('my_account')?>" class="active">Profile</a></li>
                                </ul>
                            </div>
                            <!-- End Single Info -->
                            <!-- Start Single Info -->
                            <div class="single-info">
                                <i class="lni lni-cart-full"></i>
                                <h3><span>My purchase</span></h3>
                                <ul>
                                    <li><a href="<?=base_url('orders')?>" class="active">View Orders</a></li>
                                </ul>
                            </div>
                            <!-- End Single Info -->
                            <!-- Start Single Info -->
                            <div class="single-info">
                                <i class="lni lni-calendar"></i>
                                <h3><span>My bookings</span></h3>
                                <ul>
                                    <li><a href="<?=base_url('my_booking')?>">View Bookings</a> </li>
                                </ul>
                            </div>
                            <!-- End Single Info -->
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-12">
                        <div class="contact-form-head">
                            <div class="form-main">
                                <?php if (session()->has('success')) : ?>
                                    <div class="alert alert-success"><?= session('success') ?></div>
                                <?php endif; ?>

                                <?php if (session()->has('error')) : ?>
                                    <div class="alert alert-danger"><?= session('error') ?></div>
                                <?php endif; ?>

                                <form class="form" method="post" action="<?= site_url('saveUser') ?>">
                                    <div class="card-body">
                                        <div class="profile-info fs-6">
                                            <div class="profile-field">
                                                <span class="field-label ml-5"><strong>Full Name: </strong></span>
                                                <span class="field-value">
                                                    <?= isset($userData['firstname']) ? $userData['firstname'] : '' ?> <?= isset($userData['lastname']) ? $userData['lastname'] : '' ?>
                                                    <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#fullnameModal">
                                                       <i class="lni lni-pencil-alt" style="color:#F75D59;"></i>
                                                    </a>
                                                </span>
                                            </div>
                                            <div class="profile-field">
                                                <span class="field-label"><strong>Email: </strong></span>
                                                <span class="field-value">
                                                    <?= isset($userData['email']) ? $userData['email'] : '' ?>
                                                    <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#emailModal">
                                                        <i class="lni lni-pencil-alt" style="color:#F75D59;"></i>
                                                    </a>
                                                </span>
                                            </div>
                                            <div class="profile-field">
                                                <span class="field-label"><strong>Contact: </strong></span>
                                                <span class="field-value">
                                                    <?= isset($userData['phone']) ? $userData['phone'] : '' ?>
                                                    <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#contactModal">
                                                        <i class="lni lni-pencil-alt" style="color:#F75D59;"></i>
                                                    </a>
                                                </span>
                                            </div>

                                            <div class="profile-field">
                                                <span class="field-label"><strong>Address: </strong></span>
                                                <span class="field-value">
                                                    <?= isset($userData['address']) ? $userData['address'] : '' ?>
                                                    <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#addressModal">
                                                        <i class="lni lni-pencil-alt" style="color:#F75D59;"></i>
                                                    </a>
                                                </span>
                                            </div>

                                            <div class="profile-field">
                                                <span class="field-label"><strong>Password: </strong></span>
                                                <span class="field-value">
                                                <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#passwordModal">
                                                        <i class="lni lni-pencil-alt" style="color:#F75D59;"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Edit Full Name -->
<div class="modal fade review-modal" id="fullnameModal" tabindex="-1" aria-labelledby="fullnameModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="fullnameModalLabel">Shipping Details</h5> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('saveUser') ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="review-name">First Name</label>
                                <input class="form-control" type="text" id="firstname" name="firstname" style="text-transform: capitalize;" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="review-name">Last Name</label>
                                <input class="form-control" type="text" id="lastname" name="lastname" style="text-transform: capitalize;" required>
                                <input name="id" type="hidden" value="<?= isset($userData['id']) ? $userData['id'] : '' ?>">
                                <input name="address" type="hidden" value="<?= isset($userData['address']) ? $userData['address'] : '' ?>">
                                <input name="phone" type="hidden" value="<?= isset($userData['phone']) ? $userData['phone'] : '' ?>">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer button">
                <!-- Replace the anchor link with a submit button -->
                <button type="submit" class="btn">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End Edit Full Name  -->



<!-- Edit Email -->
<div class="modal fade review-modal" id="emailModal" tabindex="-1" aria-labelledby="emailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="fullnameModalLabel">Shipping Details</h5> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('saveUser') ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="review-name">New Email</label>
                                <input class="form-control" type="email" id="email" name="email"  required>
                                <input name="id" type="hidden" value="<?= isset($userData['id']) ? $userData['id'] : '' ?>">
                                <input name="address" type="hidden" value="<?= isset($userData['address']) ? $userData['address'] : '' ?>">
                                <input name="phone" type="hidden" value="<?= isset($userData['phone']) ? $userData['phone'] : '' ?>">
                                <input name="firstname" type="hidden" value="<?= isset($userData['firstname']) ? $userData['firstname'] : '' ?>">
                                <input name="lastname" type="hidden" value="<?= isset($userData['lastname']) ? $userData['lastname'] : '' ?>">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer button">
                <!-- Replace the anchor link with a submit button -->
                <button type="submit" class="btn">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End Edit Email  -->


<!-- Edit Phone -->
<div class="modal fade review-modal" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="fullnameModalLabel">Shipping Details</h5> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('saveUser') ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="review-name">New Phone #</label>
                                <input class="form-control" type="number" id="phone" name="phone"  required>
                                <input name="id" type="hidden" value="<?= isset($userData['id']) ? $userData['id'] : '' ?>">
                                <input name="address" type="hidden" value="<?= isset($userData['address']) ? $userData['address'] : '' ?>">
                                <input name="firstname" type="hidden" value="<?= isset($userData['firstname']) ? $userData['firstname'] : '' ?>">
                                <input name="lastname" type="hidden" value="<?= isset($userData['lastname']) ? $userData['lastname'] : '' ?>">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer button">
                <!-- Replace the anchor link with a submit button -->
                <button type="submit" class="btn">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End Edit Phone  -->


<!-- Edit address -->
<div class="modal fade review-modal" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="fullnameModalLabel">Shipping Details</h5> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('saveUser') ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="review-name">New Address</label>
                                <input class="form-control" type="text" id="address" name="address"  required>
                                <input name="id" type="hidden" value="<?= isset($userData['id']) ? $userData['id'] : '' ?>">
                                <input name="phone" type="hidden" value="<?= isset($userData['phone']) ? $userData['phone'] : '' ?>">
                                <input name="firstname" type="hidden" value="<?= isset($userData['firstname']) ? $userData['firstname'] : '' ?>">
                                <input name="lastname" type="hidden" value="<?= isset($userData['lastname']) ? $userData['lastname'] : '' ?>">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer button">
                <!-- Replace the anchor link with a submit button -->
                <button type="submit" class="btn">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End Edit Phone  -->

<!-- Edit Full Name -->
<div class="modal fade review-modal" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="fullnameModalLabel">Shipping Details</h5> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('saveUser') ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="review-name">New Password</label>
                                <input class="form-control" type="password" id="password" name="password"  required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="review-name">Confirm Password</label>
                                <input class="form-control" type="password" id="confirm_password" name="confirm_password"  required>
                                <input name="id" type="hidden" value="<?= isset($userData['id']) ? $userData['id'] : '' ?>">
                                <input name="email" type="hidden" value="<?= isset($userData['email']) ? $userData['email'] : '' ?>">
                                <input name="address" type="hidden" value="<?= isset($userData['address']) ? $userData['address'] : '' ?>">
                                <input name="firstname" type="hidden" value="<?= isset($userData['firstname']) ? $userData['firstname'] : '' ?>">
                                <input name="lastname" type="hidden" value="<?= isset($userData['lastname']) ? $userData['lastname'] : '' ?>">
                                <input name="phone" type="hidden" value="<?= isset($userData['phone']) ? $userData['phone'] : '' ?>">
                            </div>
                        </div>
                    </div>

                   <div class="col-sm-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input width-auto" id="show_password_checkbox">
                            <label class="form-check-label" for="show_password_checkbox">Show Password</label>
                         </div>
                     </div>

            </div>
            <div class="modal-footer button">
                <!-- Replace the anchor link with a submit button -->
                <button type="submit" class="btn">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End Edit Full Name  -->






    
    


    
   <!-- Start Footer Area -->
    <footer class="footer">
        <!-- Start Footer Top -->
        <div class="footer-top">
            <div class="container">
                <div class="inner-content">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="footer-logo">
                                <a href="<?=base_url('/')?>">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    


    <script type="text/javascript">

      $(document).ready(function(){
    <?php if(session()->getFlashdata('status')){?>
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
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
  const showPasswordCheckbox = document.getElementById('show_password_checkbox');
        const passwordInput = document.getElementById('password');
        const confirmPassInput = document.getElementById('confirm_password');

        showPasswordCheckbox.addEventListener('change', () => {
            if (showPasswordCheckbox.checked) {
                passwordInput.type = 'text';
                confirmPassInput.type = 'text';
            } else {
                passwordInput.type = 'password';
                confirmPassInput.type = 'password';
            }
        });
</script>
</body>

</html>