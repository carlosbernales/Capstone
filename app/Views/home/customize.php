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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    

    
</head>
<style>


     .img-thumbnail {
            cursor: pointer;
    }
    
      .drop-area {
        border: 2px dashed #ccc;
        padding: 40px;
        text-align: center;
        
         max-height: 650px; /* Set the maximum height for scrollability */
        overflow-y: auto; /* Enable vertical scrolling if the content exceeds the height */
        border: 1px solid #ccc; /* Optional: Add a border for clarity */
    }

	/* Define a CSS animation for the dragged element */
    .dragged {
        animation: scaleUp 0.2s ease-in-out;
    }

    @keyframes scaleUp {
        0% {
            transform: scale(1);
        }
        100% {
            transform: scale(1.1);
        }
    }

    /* Define the cursor style during dragging */
    .dragging {
        cursor: grab;
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
                               <!-- <div class="wishlist">
                                    <a href="javascript:void(0)">
                                        <i class="lni lni-heart"></i>
                                        <span class="total-items">0</span>
                                    </a>
                                </div> -->
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
                                            <li class="nav-item"><a href="<?=base_url('orders');?>">My Orders</a></li>
                                            <?php } else { ?>
                                            <li class="nav-item"><a href="<?=base_url('signin');?>">Shop Grid</a></li>
                                            <li class="nav-item"><a href="<?=base_url('signin');?>">Shop List</a></li>
                                            <li class="nav-item"><a href="<?=base_url('signin');?>">Cart</a></li>
                                            <li class="nav-item"><a href="<?=base_url('signin');?>">Checkout</a></li>
                                            <li class="nav-item"><a href="<?=base_url('orders');?>">My Orders</a></li>
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
                        <h1 class="page-title">Customize</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="<?= base_url('home') ?>"><i class="lni lni-home"></i> Home</a></li>
                        <li>Customize</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
    
    <!-- Start of Upload Customize -->
    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="contact-head">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>Customize</h2>
                            <p>We will prepare your bouquet of flowers with the chosen products and we will wrap it with wrapping paper, raffia / bow and card with dedication.</p>
                        </div>
                    </div>
                </div>
                <div class="contact-info">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="contact-form-head">
                                <div class="form-main">
                                    <form action="<?= site_url('customize') ?>" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <h4>Customer Details</h4>						
    									
                                        <div class="col-12">
                                            <div class="form-group mb-2 mt-3">
        										<label>Firstname</label>
        										<input type="text" name="firstname" id="firstname" style="text-transform:capitalize;"  class="form-control"value="<?= $data['firstname'] ?>" >
        									</div>
        									<div class="form-group mb-2">
            									<label>Lastname</label>
            									<input type="text" name="lastname" id="lastname" style="text-transform:capitalize;" class="form-control" value="<?= $data['lastname'] ?>">
        									</div>
        									<div class="form-group mb-2">
        										<label>Email Address</label>
        										<input type="text" name="email" id="user_email" class="form-control" value="<?= $data['email']?>" >
        									</div>
        									<div class="form-group" style="margin-bottom: 37px;">
        										<label>Contact Number</label>
        										<input type="number" maxlength="11" name="contact" id="contact" class="form-control" value="<?= $data['phone']?>">
        									</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="contact-form-head">
                                <div class="form-main">
                                    <div class="row">
                                        <h4>Flower Details</h4>	
                                        <div class="col-12">
                                            <div class="form-group mb-2 mt-3">
    										    <label>Upload your desired customization</label>
    										    <input type="file" name="item_image" class="form-control" required>
    										</div>
    										<div class="form-group mb-2">
    										    <label>Quantity</label></label>
    										    <input type="number" name="item_qty" class="form-control" required>
    										    <input type="hidden" name="item_name" value="Custom" class="form-control" required>
    										</div>
    										    
                                          
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="form-group mb-2">
        										<label>Customized Description</label>
        										<textarea name="details"  cols="30" rows="3" class="form-control" placeholder="Add some details or info for your product"></textarea>
        										
        										<input type="hidden" name="order_status" id="status" value="Request">
										        <input type="hidden" name="order_type" value="N/A">
										         <input type="hidden" name="flower_sizeOrtype" value="Upload">
    									    </div>
									    </div>
                                        
                                        <div class="col-12">
                                            <div class="form-group button">
                                                <button type="submit" class="btn float-end">Place Request Order</button>
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
        </div>
    <!--/ End of Upload Customize -->
    
    <!-- Start of Drag and Drop -->
        <div class="container mt-5">
            <div class="contact-head">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>Drag and Drop Customization</h2>
                            <p>We will prepare your bouquet of flowers with the chosen products and we will wrap it with wrapping paper, raffia / bow and card with dedication.</p>
                        </div>
                    </div>
                </div>
                <div class="contact-info">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="contact-form-head">
                                <div class="form-main">
                                    <div class="row">
                                        <div class="col-4"><img src="<?= base_url("public/client_ui/images/small.jpg"); ?>" class="img-thumbnail" height="250" width="250" data-toggle="modal" data-target="#smallImageModal"></div>
                                        <div class="col-4"><img src="<?= base_url("public/client_ui/images/regular.jpg"); ?>" class="img-thumbnail" height="250" width="250" data-toggle="modal" data-target="#regularImageModal"></div>
                                        <div class="col-4"><img src="<?= base_url("public/client_ui/images/customize.jpg"); ?>" class="img-thumbnail" height="250" width="250" data-toggle="modal" data-target="#customizeImageModal"></div>
                                    </div>
                                    
                                    <!-- Small Image Modal -->
                                    <div class="modal fade review-modal" id="smallImageModal" tabindex="-1" role="dialog" aria-labelledby="smallImageModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="smallImageModalLabel">Small Bouquet</h5>
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?= site_url('small_customize') ?>" method="POST" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h5 class="mb-4">Price: ₱350.00</h5>
                                                            <div class="form-group">
                                                                <label>Choose color of Primary Rose(3 pcs)</label>
                                                                <select id="roseColors" name="rose_color" class="form-select mb-2" aria-label="Default select example" required>
                                                                    <option selected>Open this select menu</option>
                                                                    <?php foreach ($roseColors as $color): ?>
                                                                        <option value="<?= $color['color'] ?>"><?= $color['color'] ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                            <label>Choose color of Assorted Rhadus</label>
                                                                <select id="rhadusColors" name="rhadus_color" class="form-select mb-2" aria-label="Default select example" required>
                                                                    <option selected>Open this select menu</option>
                                                                    <?php foreach ($rhadusColors as $color): ?>
                                                                        <option value="<?= $color['color'] ?>"><?= $color['color'] ?></option>
                                                                    <?php endforeach; ?>
                                                                     <option value="Mix">Mix</option>
                                                                </select>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                            <label>Choose color of Ribbon</label>
                                                                <select id="ribbonColors" name="ribbon_color" class="form-select mb-2" aria-label="Default select example" required>
                                                                    <option selected>Open this select menu</option>
                                                                    <?php foreach ($ribbonColors as $color): ?>
                                                                        <option value="<?= $color['color'] ?>"><?= $color['color'] ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                            <label>Choose color of Wrapper</label>
                                                                <select id="wrapperColors" name="wrapper_color" class="form-select" aria-label="Default select example" required>
                                                                    <option selected>Open this select menu</option>
                                                                    <?php foreach ($wrapperColors as $color): ?>
                                                                        <option value="<?= $color['color'] ?>"><?= $color['color'] ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            
                                                           
                                                            <input type="hidden" name="firstname" value="<?= $data['firstname'] ?>" style="text-transform: capitalize;">
                                                            <input type="hidden" name="lastname" value="<?= $data['lastname'] ?>" style="text-transform: capitalize;">
                                                            <input type="hidden" name="email" value="<?= $data['email'] ?>">
                                                            <input type="hidden" name="contact" value="<?= $data['phone'] ?>">
                                                            
                                                            <input type="hidden" name="item_name" value="Small Bouquet" class="form-control"required>
                                                            <input type="hidden" name="flower_sizeOrtype" value="Small Bouquet" class="form-control"required>
                                                            <input type="hidden" name="item_amount" value="350" class="form-control" required>
                                                            <input type="hidden" name="item_qty" value="1" class="form-control" required>
                                                            <input type="hidden" name="order_status" id="status" value="Request">
                                                            <input type="hidden" name="order_type" value="N/A">
                                                            
                                                        </div>
                                                        <div class="col-6">
                                                            <img src="<?=base_url('public/client_ui/images/sb.jpg')?>" width="250" height="300">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer button">
                                                    <button type="submit" class="btn">Place request order</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Regular Image Modal -->
                                    <div class="modal fade review-modal" id="regularImageModal" tabindex="-1" role="dialog" aria-labelledby="regularImageModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="regularImageModalLabel">Regular Bouquet</h5>
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?= site_url('regular_customize') ?>" method="POST" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h5>Price: ₱700.00</h5>
                                                            <p class="mb-4">Note: Larger than small bouquet</p>
                                                            
                                                            <div class="form-group">
                                                            <label>Choose color of Primary Rose(3 pcs)</label>
                                                                <select id="regroseColors" name="wrapper_color" class="form-select mb-2" aria-label="Default select example" required>
                                                                    <option selected>Open this select menu</option>
                                                                    <?php foreach ($regroseColors as $color): ?>
                                                                        <option value="<?= $color['color'] ?>"><?= $color['color'] ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                            <label>Choose color of Assorted Rhadus</label>
                                                                <select id="regrhadusColors" name="rhadus_color" class="form-select mb-2" aria-label="Default select example" required>
                                                                    <option selected>Open this select menu</option>
                                                                    <?php foreach ($regrhadusColors as $color): ?>
                                                                        <option value="<?= $color['color'] ?>"><?= $color['color'] ?></option>
                                                                    <?php endforeach; ?>
                                                                     <option value="Mix">Mix</option>
                                                                </select>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                            <label>Choose color of Ribbon</label>
                                                                <select id="regribbonColors" name="ribbon_color" class="form-select mb-2" aria-label="Default select example" required>
                                                                    <option selected>Open this select menu</option>
                                                                    <?php foreach ($regribbonColors as $color): ?>
                                                                        <option value="<?= $color['color'] ?>"><?= $color['color'] ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                            <label>Choose color of Wrapper</label>
                                                                <select id="regwrapperColors" name="wrapper_color" class="form-select" aria-label="Default select example" required>
                                                                    <option selected>Open this select menu</option>
                                                                    <?php foreach ($regwrapperColors as $color): ?>
                                                                        <option value="<?= $color['color'] ?>"><?= $color['color'] ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            
                                                            <input type="hidden" name="firstname" value="<?= $data['firstname'] ?>" style="text-transform: capitalize;">
                                                            <input type="hidden" name="lastname" value="<?= $data['lastname'] ?>" style="text-transform: capitalize;">
                                                            <input type="hidden" name="email" value="<?= $data['email'] ?>">
                                                            <input type="hidden" name="contact" value="<?= $data['phone'] ?>">
                                                            
                                                            
                                                            <input type="hidden" name="item_name" value="Regular Bouquet" class="form-control"required>
                                                            <input type="hidden" name="flower_sizeOrtype" value="Regular Bouquet" class="form-control"required>
                                                            <input type="hidden" name="item_amount" value="700" class="form-control" required>
                                                            <input type="hidden" name="item_qty" value="1" class="form-control" required>
                                                            <input type="hidden" name="order_status" id="status" value="Request">
                                                            <input type="hidden" name="order_type" value="N/A">
                                                            
                                                        </div>
                                                        <div class="col-6">
                                                            <img src="<?=base_url('public/client_ui/images/sb.jpg')?>" width="250" height="300">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer button">
                                                    <button type="submit" class="btn">Place request order</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Customize Image Modal -->
                                    <div class="modal fade" id="customizeImageModal" tabindex="-1" role="dialog" aria-labelledby="customizeImageModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="customizeImageModalLabel">Drag and Drop Customize</h5>
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="customizeForm" action="<?= base_url('Customize/insertOrderItems'); ?>" method="POST">
                                                    <div class="row">
                                						<div class="container">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                							<ul class="nav nav-tabs" id="myTabs" role="tablist">
                                							<?php foreach ($stocks_category as $index => $category) : ?>
                                								<li class="nav-item" role="presentation">
                                									<a class="nav-link <?= $index === 0 ? 'active' : '' ?>" 
                                									id="tab<?= $category['id'] ?>" 
                                									data-bs-toggle="tab" 
                                									href="#content<?= $category['id'] ?>" 
                                									role="tab" 
                                									aria-controls="content<?= $category['id'] ?>" 
                                									aria-selected="<?= $index === 0 ? 'true' : 'false' ?>">
                                										<?= $category['category_name'] ?>
                                									</a>
                                								</li>
                                							<?php endforeach; ?>
                                							</ul>
                                
                                							<div class="tab-content">
                                								<?php foreach ($stocks_category as $category) : ?>
                                								<div class="tab-pane fade<?= $category['id'] === $stocks_category[0]['id'] ? ' show active' : '' ?>" id="content<?= $category['id'] ?>">
                                									<h2 class="my-4 text-center"><?= $category['category_name'] ?></h2>
                                									<?php foreach ($products_by_category[$category['id']] as $product) : ?>
                                    									<div class="row">
                                    										<div class="col-4">
                                    										    <strong><h4><?= $product['product_name'] ?></h4></strong><br>
                                    										    Color: <?= $product['color'] ?>
                                    										</div>
                                    										<div class="col-4 mb-2">
                                        										<?php if ($product['image']) : ?>
                                        											<img src="<?= base_url("public/public/stocks/".$product['image']); ?>" 
                                                                width="100" height="100"
                                                                alt="<?= $product['product_name'] ?>"
                                                                draggable="true"
                                                                data-product-id="<?= $product['id'] ?>"
                                                                data-product-name="<?= $product['product_name'] ?>"
                                                                data-stock-qty="<?= $product['stock_qty'] ?>" 
                                                                data-color="<?= $product['color'] ?>" 
                                                                ondragstart="drag(event)">
                                        										<?php endif; ?>
                                    										</div><hr>
                                        								</div>
                                    								<?php endforeach; ?>
                                								</div>
                                								<?php endforeach; ?>
                                							</div>
                                						</div>
                                						<div class="col-md-6">
                                							<div class="card-body">
                                                <div class="drop-area" id="dropArea" ondragover="allowDrop(event)" ondrop="drop(event)">
                                                    <h3>Drop Area</h3>
                                                    <hr>
                                                </div>
                                							</div>
                                              <input type="hidden" id="droppedProductsInput" name="products">
                                              <!-- Add an ID to the submit button -->
                                            <div class="modal-footer button">
                                                <button type="submit" id="submitButton" class="btn">Place request order</button>
                                            </div>

                                						</div>
                                             
                                            </form>
                                					</div>
                                        </div>
                                      </div>
                                    </section>
    <!--/ End of Drag and Drop -->



  
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
                                    <li><a href="<?= base_url('about_us') ?>">Flower Design</a></li>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= base_url() ?>/public/js/custom.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>

  

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




function drag(event) {
        event.dataTransfer.setData("text", JSON.stringify({
            productId: event.target.dataset.productId,
            productName: event.target.dataset.productName,
            stockQty: event.target.dataset.stockQty,
            color: event.target.dataset.color,
            imageSrc: event.target.src
        }));
    }

    // Function to handle drag over event and prevent default behavior
    function allowDrop(event) {
    event.preventDefault();
}

// Function to handle drop event
function drop(event) {
    event.preventDefault();
    const data = JSON.parse(event.dataTransfer.getData("text"));

    // Check if the product with the same ID is already in the drop area
    const existingProduct = document.querySelector(`.dropped-product[data-product-id="${data.productId}"]`);
    
    

    if (existingProduct) {
        // If the product already exists, increase its quantity
        const quantityElement = existingProduct.querySelector('.quantity');
        const newQuantity = parseInt(quantityElement.textContent, 10) + 1;
        quantityElement.textContent = newQuantity;
    } else {
        // Create a new row for the dropped product
        const newRow = document.createElement('div');
        newRow.className = 'row';

        // Create a custom element for the dropped product
        const productElement = document.createElement('div');
        productElement.className = 'dropped-product';
        productElement.dataset.productId = data.productId;
        productElement.dataset.productName = data.productName; // Add productName to the dataset
        productElement.dataset.color = data.color; // Add color to the dataset
        productElement.innerHTML = `
            <div class="d-flex mt-2">
                <div class="col-2">
                    <img src="${data.imageSrc}" width="100" height="100" alt="${data.productName}">
                </div>
                <div class="col-5">
                    <p><strong>${data.productName}</strong></p>
                    <p>Color: ${data.color}</p>
                </div>
                <div class="col-3">
                    <p>Quantity: <span class="quantity">1</span></p>
                </div>
            </div>
            <button type="button" class="btn btn-danger btn-sm remove-button" onclick="removeProduct(this)">Remove</button>
            <hr>
        `;
        
        // Add imageSrc property to the dataset
        productElement.dataset.imageSrc = data.imageSrc;

        // Append the custom product element to the new row
        newRow.appendChild(productElement);

        // Append the new row to the drop area
        document.getElementById("dropArea").appendChild(newRow);
        
        // Scroll to the bottom of the drop area
        dropArea.scrollTop = dropArea.scrollHeight;
    }
    document.getElementById("dropArea").style.display = 'block';
    document.getElementById("submitButton").style.display = 'block';
}

// Event listener for the submit button
document.getElementById("submitButton").addEventListener("click", function () {
    // Collect the data from the dropped products
    const droppedProducts = document.querySelectorAll('.dropped-product');
   const productsData = Array.from(droppedProducts).map(product => ({
    productId: product.dataset.productId,
    productName: product.dataset.productName,
    color: product.dataset.color,
    quantity: parseInt(product.querySelector('.quantity').textContent, 10),
    imageSrc: product.dataset.imageSrc // Include the image source property
}));

    // Collect additional form data
    const additionalFormData = {
        orderStatus: "Request",
        orderType: "N/A",
        firstname: "<?= $data['firstname'] ?>",
        lastname: "<?= $data['lastname'] ?>",
        email: "<?= $data['email'] ?>",
        contact: "<?= $data['phone'] ?>",
        flowerSizeOrType: "DragNdrop"
    };

    // Combine productsData and additionalFormData into a single object
    const formData = {
        products: productsData,
        additional: additionalFormData
    };

    // Set the data in the hidden input field
    document.getElementById("droppedProductsInput").value = JSON.stringify(formData);

    // Submit the form
    document.getElementById("customizeForm").submit();
});

// Function to remove a product
function removeProduct(button) {
    const product = button.parentNode;
    product.parentNode.removeChild(product);

    // Check if there are any dropped products after removal
    const droppedProductsExist = document.querySelectorAll('.dropped-product').length > 0;

    // Hide or show the submit button based on the existence of dropped products
    document.getElementById("submitButton").style.display = droppedProductsExist ? 'block' : 'none';

    // Hide the drop area if there are no dropped products
}

// Hide the submit button and drop area initially
document.getElementById("submitButton").style.display = 'none';

// Hide the submit button initially


</script>
</body>

</html>




	