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


<script>
    // Show/Hide Image Upload based on Payment Method Selection
    const paymentMethodRadios = document.querySelectorAll('input[name="payment"]');
    const imageUploadDiv = document.getElementById('image-upload');

    paymentMethodRadios.forEach(radio => {
        radio.addEventListener('change', () => {
            if (radio.value === 'online') {
                imageUploadDiv.style.display = 'block';
            } else {
                imageUploadDiv.style.display = 'none';
            }
        });
    });
</script>
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
  .swal2-modal {
      max-width: 400px !important; /* Adjust the width as needed */
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
                        <h1 class="page-title">checkout</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="<?= base_url('home') ?>"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="<?= base_url('product_grids') ?>">Shop</a></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->




<section class="checkout-wrapper section">
    <div class="container">
        <form action="<?= base_url('cus_checkout_' . $orderDetails['id']) ?>" method="POST" enctype="multipart/form-data">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="checkout-steps-form-style-1">
                    <ul id="accordionExample">
                        <li>
                            <h6 class="title" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">Cart Overview</h6>
                            <section class="checkout-steps-form-content collapse show" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="row">
                                    <div class="cart-list-head mt-3">
                                        <!-- Cart List Title -->
                                        <div class="cart-list-title">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-1 col-12">
                                                    <p>Image</p>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-12">
                                                    <p>Product Name</p>
                                                </div>
                                                <?php
                                                    if ($orderDetails['flower_sizeOrtype'] !== 'DragNdrop') {
                                                        echo '<div class="col-lg-2 col-md-2 col-12">
                                                                <p>Price</p>
                                                              </div>';
                                                    }
                                                    ?>
                                                 <?php
                                                    if ($orderDetails['flower_sizeOrtype'] === 'DragNdrop') {
                                                        echo '<div class="col-lg-3 col-md-2 col-12">
                                                                <p>Color</p>
                                                              </div>';
                                                    }
                                                    ?>
                                                
                                                <div class="col-lg-1 col-md-2 col-12">
                                                    <p>Quantity</p>
                                                </div>
                                                <div class="col-lg-2 col-md-1 col-12">
                                                </div>
                                                <?php
                                                    if ($orderDetails['flower_sizeOrtype'] !== 'DragNdrop') {
                                                        echo '<div class="col-lg-2 col-md-2 col-12">
                                                                <p>Subtotal</p>
                                                              </div>';
                                                    }
                                                    ?>

                                            </div>
                                        </div>
                                        <!-- End Cart List Title -->
                                        <!-- Cart Single List list -->
                                        <?php
                                        $totalItemPrice = 0;
                                        $subtotal = 0;
                                        foreach ($orderItems as $index => $item) {
                                            $totalItemPrice += $item['item_amount'] * $item['item_qty'];
                                            $subtotal += $item['item_amount'] * $item['item_qty'];
                                            ?>
                                            <div class="cart-single-list">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-1 col-md-1 col-12">
                                                        <a><img src="<?= base_url("public/public/products/" . $item['item_image']) ?>"></a>
                                                    </div>
                                                    <div class="col-lg-1 col-md-1 col-12">
                                                    </div>
                                                    
                                                    <div class="col-lg-3 col-md-1 col-12">
                                                        <input type="hidden" name="order_status" value="Agree">
                                                        <h5 class="product-name"><a><?= $item['item_name'] ?></a></h5>
                                                        <input type="hidden" name="order_id" value="<?= $item['id'] ?>">
                                                    </div>
                                                    
                                                    <?php if ($orderDetails['flower_sizeOrtype'] === 'DragNdrop'): ?>
                                                        <div class="col-lg-3 col-md-3 col-12">
                                                            <p><?= $item['item_color'] ?></p>
                                                        </div>
                                                    <?php endif; ?>
                                                    
                                                    <?php if ($orderDetails['flower_sizeOrtype'] !== 'DragNdrop'): ?>
                                                        <div class="col-lg-2 col-md-1 col-12">
                                                            <p><?= $item['item_amount'] ?></p>
                                                        </div>
                                                    <?php endif; ?>

                                                    
                                                    <div class="col-lg-1 col-md-1 col-12">
                                                        <p><?= $item['item_qty'] ?></p>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-12">
                                                    </div>
                                                    <?php
                                                    if ($orderDetails['flower_sizeOrtype'] !== 'DragNdrop') {
                                                        echo '<div class="col-lg-2 col-md-2 col-12">
                                                                <p>&#8369 ' . ($item['item_amount'] * $item['item_qty']) . '</p>
                                                              </div>';
                                                    }
                                                    ?>

                                                    <input type="hidden" name="order_amount" value="<?= $orderDetails['order_amount'] ?>">
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <!-- End Single List list -->
                                    </div>
                                </div>
                            </section>
                        </li>
                        <li>
                            <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                    aria-expanded="false" aria-controls="collapseFour">Payment Method</h6>
                                <section class="checkout-steps-form-content collapse" id="collapseFour"
                                    aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="checkout-payment-option id="paymentMethod">
                                                <p class="note"><strong>Note: </strong>Shipping Fee is not applied if you choose "Pick up" as your order type</p>
                                                <input type="hidden" name="user_email" value="<?=$data['email']?>">  <!-- input email hidden -->
                                                <h6 class="heading-6 font-weight-400 payment-title">Select Delivery
                                                    Option</h6>
                                                    
                                                <div class="payment-option-wrapper">
                                                    <div class="single-payment-option">
                                                        <input class="form-check-input" type="radio" name="order_type" id="pick_up" value="Pick Up" >
                                                        <label for="pick_up">
                                                            <img src="<?=base_url()?>/public/client_ui/images/payment-method/pickup.png" alt="payment-method-img">
                                                            <p>Pick up</p>
                                                        </label>
                                                    </div>

                                                <div class="single-payment-option">
                                                    <input data-bs-toggle="modal" data-bs-target="#onlinePayModal" class="form-check-input" type="radio" name="order_type" id="online_pickup" value="Pick Up (Paid)">
                                                    <label for="online_pickup">
                                                        <img src="<?=base_url()?>/public/client_ui/images/payment-method/pickandpay.png" alt="payment-method-img">
                                                        <p>Pick up and Pay Gcash</p>
                                                    </label>
                                                </div>
                                            
                                                <div class="single-payment-option">
                                                    <input class="form-check-input" type="radio" name="order_type" id="cod_payment" value="COD">
                                                    <label for="cod_payment">
                                                        <img src="<?=base_url()?>/public/client_ui/images/payment-method/cod.png" alt="payment-method-img">
                                                        <p>Cash on Delivery</p>
                                                    </label>
                                                </div>
                                            
                                                <div class="single-payment-option">
                                                    <input data-bs-toggle="modal" data-bs-target="#onlinePayModal" class="form-check-input" type="radio" name="order_type" id="online_payment" value="Online">
                                                    <label for="online_payment">
                                                        <img src="<?=base_url()?>/public/client_ui/images/payment-method/online.png" alt="payment-method-img">
                                                        <p>Gcash</p>
                                                    </label>
                                                </div>

                                             <!-- Modal for GCash Payment Details -->
                                        <div class="modal fade review-modal" id="onlinePayModal" tabindex="-1" role="dialog" aria-labelledby="onlinePayModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="onlinePayModalLabel">Recipient Details</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="" method="post" id="paymentForm">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <div class="gcash-details">
                                                                        <label><h6>Recipient Name</h6></label>
                                                                        <span class="fs-6">Jennifer Acedillo</span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="gcash-details">
                                                                        <label><h6>Gcash Number</h6></label>
                                                                        <span class="fs-6"><?php foreach ($superadminAccounts as $account): ?>
                                                                            <?php echo $account['gcash_no']; ?></p>
                                                                        <?php endforeach; ?></span>
                                                                    </div>
                                                                </div><hr>
                                                                <div class="form-group">
                                                                    <label>Enter Reference No.</label>
                                                                    <input type="number" class="form-control" name="proof_payment" id="proof_payment"  required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Amount Paid</label>
                                                                    <input type="number" class="form-control" name="amount_paid" id="amount_paid"  required>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer button" id="placeOrderContainer">
                                            <!-- <button class="btn" data-bs-toggle="collapse"data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">previous</button> -->
                                                <button type="submit" class="btn btn-alt">Place Order</button>
                                            </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col-md-12">
                                            <?php if ($orderDetails['order_status'] == 'Settle'): ?>
                                                <div class="steps-form-btn button" id="placeOrderContainer">
                                                    <!-- <button class="btn" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">previous</button> -->
                                                    <button type="submit" class="btn btn-alt">Place Order</button>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        </form>
                                    </div>
                            </section>    
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="checkout-sidebar">
                    <div class="checkout-sidebar-coupon">
                        <p class="title">Shipping Address</p>
                        <?php if (empty($shipinfo_checkout)): ?>
                            <p class="ship-info">No shipping information available.</p>
                        <?php else: ?>
                            <div class="add-ship-info">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    <?php foreach ($shipinfo_checkout as $shipinfo): ?>
                                        <label>
                                            <input type="radio" class="fs-1" name="ship_info" checked value="<?= $shipinfo['id'] ?>" style="display: none;">
                                            <div>
                                                <span class="text-capitalize fs-6"><i class="lni lni-user"></i> <?= $shipinfo['firstname'] . ' ' . $shipinfo['lastname'] ?></span><br>
                                                <i class="lni lni-phone"></i> <?= $shipinfo['contact'] ?><br>
                                                <i class="lni lni-map-marker"></i> <?= $shipinfo['selected_city'] . ', ' . $shipinfo['selected_barangay'] . ', ' . $shipinfo['other_infoaddres'] ?>
                                            </div>
                                        </label>
                                        <input type="hidden" value="<?=$shipinfo['firstname']?>"   name="fname" required />
                                        <input type="hidden" value="<?=$shipinfo['lastname']?>"   name="lname" required />
                                        <input type="hidden" value="<?=$shipinfo['contact']?>"   name="cont" required />
                                        <input type="hidden" value="<?=$shipinfo['selected_city']?>"   name="city" required />
                                        <input type="hidden" value="<?=$shipinfo['selected_barangay']?>"   name="barangay" required />
                                        <input type="hidden" value="<?=$shipinfo['other_infoaddres']?>"   name="otherinfoadd" required />
                                        <input type="hidden" value="<?=$shipinfo['shipping_fee']?>"   name="shipping_fees" required />
                                    <?php endforeach; ?>
                                </label>
                            </div>
                        <?php endif; ?>
                        <div class="button">
                            <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#addShippingModal">Add Address</a>
                            <button type="button" class="btn btn-alt" class="btn btn-alt" data-bs-toggle="modal" data-bs-target="#chooseAddress">Choose Address</button>
                        </div>
                    </div>
            
                    <div class="checkout-sidebar-price-table mt-30">
                        <h5 class="title">Pricing Table</h5>
                        <div class="sub-total-price">
                            <div class="total-price">
                                <p class="value">Subtotal Price:</p>
                                <p class="price">&#8369 <?= $orderDetails['order_amount'] ?></p>
                            </div>
                            <?php
                                $shippingFee = 0; // Default shipping fee
                                if (!empty($shipinfo_checkout)) {
                                    foreach ($shipinfo_checkout as $cart_data) {
                                        $shippingFee = $cart_data['shipping_fee'];
                                    }
                                }
                            ?>
                            <div class="total-price shipping">
                                <p class="value">Shipping Fee:</p>
                                <p class="price">&#8369 <?= $shippingFee ?></p>
                            </div>
                        </div>
            
                        <div class="total-payable">
                            <div class="payable-price">
                                <p class="value">Total Price:</p>
                                <p class="price">&#8369 <span id="subtotal"><?= $orderDetails['order_amount'] + $shippingFee ?></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </div>
</section>     


    

                        



         <!-- Add Shipping Address -->
    <div class="modal fade review-modal" id="addShippingModal" tabindex="-1" aria-labelledby="addShippingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addShippingModalLabel">Shipping Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                                <input class="form-control" type="text" id="lastname" name="lastname" style="text-transform: capitalize;"  required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="contact">Contact Number</label>
                                <input class="form-control" type="number" maxlength="11" id="contact" name="contact" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="cityname">City</label>
                                <select name="city" id="cityname" class="form-control" cols="30" rows="2" required>
                                    <option value="" selected disabled>Select City</option>
                                    <?php foreach ($cities as $city): ?>
                                        <option value="<?= $city->id ?>"><?= $city->city_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="barangay">Barangay</label>
                                <select id="barangay" class="form-control" cols="30" rows="2" required>
                                    <option value="" selected disabled>Select Barangay</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="shipping_fee">Shipping Fee</label>
                                <input class="form-control" type="text" id="shipping_fee" name="shipping_fee" readonly>
                            </div>
                        </div>

                        <!--to submit to the database-->
                        <div class="col-md-12 mrg10">
                            <input type="hidden" id="selected_city" class="form-control mt-2 float-end" style="text-transform: capitalize;" cols="30" rows="2"  readonly>
                        </div>
                        <!--to submit to the database-->

                        <div class="col-md-12 mrg10">
                        <input type="hidden" id="selected_barangay" class="form-control mt-2 float-end" style="text-transform: capitalize;" cols="30" rows="2"  readonly>
                        </div>
                        <!--to submit to the database-->
                        <div class="col-md-12 mrg10">
                            <input type="hidden" id="city_id" class="form-control mt-2" name="city_id"  readonly>
                        </div>
                        <!--to submit to the database-->
                        <div class="col-md-12 mrg10">
                            <input type="hidden"  id="barangay_id"class="form-control mt-2" name="barangay_id"  readonly>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                            <label for="other_infoaddres">Area (Street name, Block & Lot)</label>
                            <input type="text" id="other_infoaddres" class="form-control" style="text-transform: capitalize;" name="other_infoaddres" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer button">
                    <a href="javascript:void(0)" onclick="add_shipinfo()" class="btn">Submit</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Add Shipping Address -->
    
 <!-- Edit Shipping Address -->
    <div class="modal fade review-modal" id="chooseAddress" tabindex="-1" aria-labelledby="chooseAddressLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="chooseAddressLabel">Shipping Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="<?= site_url('ship_address') ?>" method="POST">
                   <?php foreach ($ship_info as $shipinfo): ?>
                    <div class="row p-3">
                        <div class="col-md-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="shipinfo_id" value="<?= $shipinfo['id'] ?>" required id="flexRadioDefault1">
                                <div class="float-end">
                                    <a href="<?= site_url('delete_address_'.$shipinfo['id']) ?>" ><i class="lni lni-cross-circle"></i></a>
                                </div><span style="text-transform: capitalize;"><strong>
                                <?= $shipinfo['firstname'] ?> <?= $shipinfo['lastname'] ?> | <?= $shipinfo['contact'] ?><br>
                                <?= $shipinfo['other_infoaddres'] ?> <br>
                                <?= $shipinfo['selected_city'] ?>,  
                                <?= $shipinfo['selected_barangay'] ?></strong></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <?php endforeach; ?>
                    <input type="hidden" class="form-control ship-info-fields" name="firstname" id="firstname">
                    <input type="hidden" class="form-control ship-info-fields" name="lastname" id="lastname">
                    <input type="hidden" class="form-control ship-info-fields" name="contact" id="contact">
                    <input type="hidden" class="form-control ship-info-fields" name="selected_city" id="selected_city">
                    <input type="hidden" class="form-control ship-info-fields" name="selected_barangay" id="selected_barangay">
                    <input type="hidden" class="form-control ship-info-fields" name="barangay_id" id="barangay_id">
                    <input type="hidden" class="form-control ship-info-fields" name="shipping_fee" id="shipping_fee">
                    <input type="hidden" class="form-control ship-info-fields" name="city_id" id="city_id">
                    <input type="hidden" class="form-control ship-info-fields" name="other_infoaddres" id="other_infoaddres">
                    <input type="hidden" class="form-control ship-info-fields" name="fk_user_id" id="fk_user_id">
                </div>
                <div class="modal-footer button">
                     <button type="submit" class="btn btn-alt">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Edit Shipping Address -->

   
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    


    <script type="text/javascript">
    

    function validateShippingInfo() {
        if (document.querySelectorAll('input[name="selected_shipping_info"]:checked').length === 0) {
            alert('Please add shipping information.');
            return false;
        }
        return true;
    }
    // Add event listener to radio buttons
    
$('#cityname').change(function() {
    var cityId = $(this).val();
    var cityName = $(this).find('option:selected').text(); // Get the selected city name
    var url = "<?= route_to('get.barangays') ?>";

    $.ajax({
        url: url,
        type: 'GET',
        data: {
            city_id: cityId
        },
        success: function(response) {
            $('#barangay').empty().prop('disabled', false);
            $('#barangay').append('<option value="">Select Barangay</option>');

            $.each(response, function(key, value) {
                $('#barangay').append('<option value="' + value.id + '">' + value.brgy_name + '</option>');
            });

            // Set the selected city_id and display the city name
            $('#city_id').val(cityId);
            $('#selected_city').val(cityName); // Update the value with the city name

            // Reset shipping fee value
            $('#shipping_fee').val('');
        }
    });
});

$('#barangay').change(function() {
    var selectedOption = $(this).find('option:selected');
    var barangayId = selectedOption.val();
    var barangayName = selectedOption.text(); // Get the selected barangay name
    var cityId = $('#city_id').val();

    // Set the selected barangay ID and city ID
    $('#barangay_id').val(barangayId);
    $('#city_id').val(cityId);

    // Display the selected city and barangay names
    $('#selected_city').val($('#cityname').find('option:selected').text()); // Update the value with the selected city name
    $('#selected_barangay').val(barangayName); // Update the value with the selected barangay name

    // Fetch shipping fee for the selected barangay
    fetchShippingFee(barangayId);
});

function fetchShippingFee(barangayId) {
    var url = "<?= route_to('get.shipping_fee') ?>";

    $.ajax({
        url: url,
        type: 'GET',
        data: {
            barangay_id: barangayId
        },
        success: function(response) {
            $('#shipping_fee').val(response.shipping_fee);
        }
    });
}

$(document).ready(function() {
  $("#online_payment,#online_pickup").click(function() {
    if ($(this).is(":checked")) {
      $("#payment-image").show();
    } else {
      $("#payment-image").hide();
    }
  });
  $("#cod_payment,#pick_up").click(function() {
    if ($(this).is(":checked")) {
        $("#payment-image").hide();
    } else {
        $("#payment-image").show();
    
    }
  });
});
const orderTypeRadios = document.querySelectorAll('input[name="order_type"]');
    const proofPaymentInput = document.getElementById('proof_payment');
    const referenceInputContainer = document.querySelector('.reference-input');

    orderTypeRadios.forEach(radio => {
        radio.addEventListener('change', () => {
            if (radio.id === 'cod_payment' || radio.id === 'pick_up') {
                referenceInputContainer.style.display = 'none';
                proofPaymentInput.removeAttribute('required');
            } else {
                referenceInputContainer.style.display = 'block';
                proofPaymentInput.setAttribute('required', 'required');
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
        var orderStatus = "<?= $orderDetails['order_status'] ?>"; // Replace with your PHP code to get the order status value
        
        if (orderStatus === "Agree") {
            var placeOrderButton = document.querySelector("#placeOrderContainer button");
            placeOrderButton.disabled = true;
            placeOrderButton.innerText = "This Order has been Placed Successfully!";
        }
    });
    
    
     document.addEventListener('DOMContentLoaded', function () {
        var onlinePickup = document.getElementById('online_pickup');
        var codPayment = document.getElementById('cod_payment');
        var onlinePayment = document.getElementById('online_payment');
        var proofPayment = document.getElementById('proof_payment');
        var amountPaid = document.getElementById('amount_paid');

        // Function to toggle the required attribute based on the selected radio button
        function toggleRequired() {
            if (onlinePickup.checked || onlinePayment.checked) {
                proofPayment.setAttribute('required', 'required');
                amountPaid.setAttribute('required', 'required');
            } else {
                proofPayment.removeAttribute('required');
                amountPaid.removeAttribute('required');
            }
        }

        // Add event listeners to the radio buttons
        onlinePickup.addEventListener('change', toggleRequired);
        codPayment.addEventListener('change', toggleRequired);
        onlinePayment.addEventListener('change', toggleRequired);

        // Initial check to set the required attribute on page load if necessary
        toggleRequired();
    });
    
   
    
    $(document).ready(function () {
    // Event listener for the form submission
    $('#paymentMethod').submit(function (event) {
      // Check if at least one radio button is selected
      if ($('input[name="order_type"]:checked').length === 0) {
        // Prevent form submission
        event.preventDefault();
        console.log('Please select a payment method.');
        // You can also display a message or perform other actions here
      }
    });
  });

  $(document).ready(function () {
    // Function to check if at least one radio button is selected
    function isRadioButtonSelected() {
      return $('input[name="order_type"]:checked').length > 0;
    }

    // Function to display the alert
    function showAlert() {
      alert('Please select a payment method.');
    }

    // Event listener for the form submission
    $('paymentMethod').submit(function (event) {
      // Check if at least one radio button is selected
      if (!isRadioButtonSelected()) {
        // Prevent form submission
        event.preventDefault();
        // Display the alert
        showAlert();
      }
    });
  });

   $(document).ready(function () {
        // Add an event listener to the form submission
        $('#paymentForm').submit(function (e) {
            // Check if 'Pick Up (Paid)' or 'Online' is selected
            if ($('input[name="order_type"]:checked').val() === 'Pick Up (Paid)' || $('input[name="order_type"]:checked').val() === 'Online') {
                // Prevent form submission if 'proof_payment' or 'amount_paid' is empty
                if ($('#proof_payment').val() === '' || $('#amount_paid').val() === '') {
                    e.preventDefault();
                    alert('Proof of payment and amount paid are required.');
                }
            }
        });

        // Add an event listener to the "Place Order" button click
        $('#placeOrderContainer button[type="submit"]').click(function (e) {
            // Check if 'Pick Up (Paid)' or 'Online' is selected
            if ($('input[name="order_type"]:checked').val() === 'Pick Up (Paid)' || $('input[name="order_type"]:checked').val() === 'Online') {
                // Prevent button action if 'proof_payment' or 'amount_paid' is empty
                if ($('#proof_payment').val() === '' || $('#amount_paid').val() === '') {
                    e.preventDefault();
                    alert('Proof of payment and amount paid are required.');
                }
            }
        });
    });
    
    
    const radioInputs = document.querySelectorAll('input[name="shipinfo_id"]');
    const shipInfoFields = document.querySelectorAll('.ship-info-fields');

    radioInputs.forEach(function(radioInput) {
        radioInput.addEventListener('change', function() {
            const selectedShipInfoId = this.value;

            const shipInfoData = <?= json_encode($ship_info) ?>.find(function(shipinfo) {
                return shipinfo.id === selectedShipInfoId;
            });

            shipInfoFields.forEach(function(field) {
                const fieldId = field.id;
                field.value = shipInfoData[fieldId];
            });
        });
    });
    $(document).ready(function(){
    <?php if(session()->getFlashdata('status')){?>
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
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

