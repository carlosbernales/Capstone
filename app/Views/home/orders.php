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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
.rating {
    display: inline-block;
}

.text-right {
        text-align: right;
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
    .order-item {
    border: 1px solid black;
    padding: 10px;
    border-radius: 10px;
}
.swal2-modal {
      max-width: 310px !important; /* Adjust the width as needed */
    }

    .scrollable-modal-body {
  max-height: 500px; /* Set the maximum height for the modal body */
  overflow-y: auto; /* Enable vertical scrolling */
}
    .badge-sm {
        font-size: 0.6rem; /* Adjust the font size as desired */
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
                        <h1 class="page-title">My Orders</h1>
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
                                        <li><a href="<?=base_url('my_account')?>">Profile</a></li>
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
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link active text-dark" id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all" type="button" role="tab" aria-controls="nav-all" aria-selected="true">
                                                <strong>Pending
                                                <?php if (!empty($pendingOrders) && !empty($count_pending) && $count_pending > 0): ?>
                                                        <span class="badge bg-danger badge-sm"><?= $count_pending ?></span>
                                                    <?php endif; ?>
                                                </strong>
                                            </button>
                    
                                            <button class="nav-link text-dark" id="nav-pay-tab" data-bs-toggle="tab" data-bs-target="#nav-pay" type="button" role="tab" aria-controls="nav-pay" aria-selected="false">
                                                <h6><span>Accepted<?php if (!empty($count_accepted) && $count_accepted > 0): ?>
                                                        <span class="badge bg-danger badge-sm"><?= $count_accepted ?></span>
                                                    <?php endif; ?></span></h6>
                                                </strong>
                                            </button>
                    
                    
                                            <button class="nav-link text-dark" id="nav-deliver-tab" data-bs-toggle="tab" data-bs-target="#nav-deliver" type="button" role="tab" aria-controls="nav-deliver" aria-selected="false">
                                                <h6><span>To Ship<?php if (!empty($count_deliver) && $count_deliver > 0): ?>
                                                        <span class="badge bg-danger badge-sm"><?= $count_deliver ?></span>
                                                    <?php endif; ?></span></h6>
                                                </strong>
                                            </button>
                    
                                            <button class="nav-link text-dark" id="nav-pickup-tab" data-bs-toggle="tab" data-bs-target="#nav-pickup" type="button" role="tab" aria-controls="nav-pickup" aria-selected="false">
                                                <h6><span>Ready to pickup<?php if (!empty($count_pick_up) && $count_pick_up > 0): ?>
                                                        <span class="badge bg-danger badge-sm"><?= $count_pick_up ?></span>
                                                    <?php endif; ?></span></h6>
                                                </strong>
                                            </button>
                    
                                            <button class="nav-link text-dark" id="nav-completed-tab" data-bs-toggle="tab" data-bs-target="#nav-completed" type="button" role="tab" aria-controls="nav-completed" aria-selected="false">
                                                <h6><span>Completed<?php if (!empty($order_status) && !empty($count_completed) && $count_completed > 0): ?>
                                                        <span class="badge bg-danger badge-sm"><?= $count_completed ?></span>
                                                    <?php else: ?>
                                                        <span class="badge bg-danger badge-sm" style="display: none;"></span>
                                                    <?php endif; ?></span></h6>
                                                </strong>
                                            </button>
                    
                                            <button class="nav-link text-dark" id="nav-cancelled-tab" data-bs-toggle="tab" data-bs-target="#nav-cancelled" type="button" role="tab" aria-controls="nav-cancelled" aria-selected="false">
                                                <h6><span>Cancelled</span></h6>
                                                </strong>
                                            </button>
                                        </div>
                                    </nav>

                                    <!-- Start of All Pending Orders -->
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
                                            <div class="shadow p-3 mb-5 bg-body">
                                                <div class="row align-items-center">
                                                    <div class="col-12 px-4">
                                                        <div class="row">
                                                            <?php $session = session(); ?>
                                                            <?php if(@$data['isLoggedIn']) : ?>
                                                            <?php if(count($pendingOrders) == 0) { ?>
                                                                <div class="col-sm-12 text-center">
                                                                    <span><i class="lni lni-cart" style="font-size:20px;"></i> You don't have pending orders</i></span>
                                                                </div>
                                                            <?php } else { ?>
                                                            <table class="table table-striped" id="example">
                                                            <thead style="background: #e9ecef;">
                                                                <tr>
                                                                    <th style="text-align: center;">ORDER ID</th>
                                                                    <th style="text-align: center;">Order Date</th>
                                                                    <th style="text-align: center;">Order Amount</th>
                                                                    <th style="text-align: center;">Order Type</th>
                                                                    <th style="text-align: center;">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach($pendingOrders as $pending){ ?>
                                                                <td style="text-align: center;"><?= $pending['order_id'] ?></td>
                                                                <td style="text-align: center;"><?= date('l, F j, Y', strtotime($pending['order_date'])) ?></td>
                                                                <td style="text-align: center;">
                                                                    <?php
                                                                    $totalAmount = $pending['shipping_fee'] + $pending['order_amount'];
                                                                
                                                                    if ($totalAmount == 0) {
                                                                        echo "Pending";
                                                                    } else {
                                                                        echo $totalAmount;
                                                                    }
                                                                    ?>
                                                                </td>

                                                                <td style="text-align: center;"><?= $pending['order_type']?></td>
                                                                <td style="text-align: center;">
                                                                   <button type="button" style="background-color: #02a618;border-color:#02a618;border-radius:0px;" class="btn btn-primary" data-toggle="modal" data-target="#reviewModal<?= $pending['id'] ?>"><i class="lni lni-eye"></i></button>
                                                        <button href="<?= site_url('orderscancel_'.$pending['id'])?>" <?php if ($pending['order_status'] === 'To Pay' || $pending['order_status'] ===  'To Deliver' || $pending['order_status'] === 'Completed')
                                                         echo 'disabled'; ?> class="btn btn-warning delete" style="border-radius: 0px;"><i class="lni lni-ban"></i></button>
                                                        <?php $orderItems = $Order_Item_model->where('fk_order_id', $pending['id'])->findAll(); ?>
                                                                                </td>
                                                                            </tr> 
                                                            
                                                    
                                                    <!-- To Deliver Modal -->
                                                    <div class="modal fade" id="reviewModal<?= $pending['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel<?= $pending['id'] ?>" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="reviewModalLabel<?= $pending['id']?>"><strong>Order Details</strong></h4>
                                                                    <button type="button" class="btn-close close" data-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <!-- To Deliver Form -->
                                                                    <?php foreach ($orderItems as $orderItem) {
                                                                    $itemQty = $orderItem['item_qty'];
                                                                    $itemAmount = $orderItem['item_amount'];
                                                                    $orderAmount = $itemQty * $itemAmount;
                                                                    ?>
                                                                    <div class="mb-3 form-group d-flex align-items-start order-item" style="position: relative;">
                                                                        <img src="<?= base_url("public/public/products/".$orderItem['item_image'])?>" width="125px" height="100px" alt="product_image" style="border-radius: 10px; margin-right: 10px;">
                                                                        <div class="ml-3">
                                                                            <label for="item_name" class="form-label">
                                                                            <strong><?= !empty($orderItem['item_name']) ? $orderItem['item_name'] : 'null' ?></strong>
                                                                            </label><br>
                    
                                                                            <label for="item_name" class="form-label">
                                                                                <?= !empty($itemQty) ? $itemQty . 'x' : 'null' ?>
                                                                            </label><br>
                                                                            
                                                                            <?php
                                                                                if ($pending['flower_sizeOrtype'] === 'DragNdrop') {
                                                                                    echo '<label for="item_name" class="form-label">';
                                                                                    echo !empty($orderItem['item_color']) ? $orderItem['item_color'] : 'null';
                                                                                    echo '</label><br>';
                                                                                }
                                                                                ?>

                    
                                                                            <?php
                                                                            if ($pending['flower_sizeOrtype'] !== 'DragNdrop' && !empty($itemAmount) && $itemAmount !== 0) {
                                                                                // Show the HTML block if the condition is not met
                                                                                ?>
                                                                                <label for="item_name" class="form-label">
                                                                                    &#8369;<?= $itemAmount ?>
                                                                                </label>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                        <?php
                                                                        if ($pending['flower_sizeOrtype'] !== 'DragNdrop') {
                                                                            // Display the code block if the condition is not met
                                                                        ?>
                                                                            <?php if (!empty($orderAmount)) { ?>
                                                                                <div class="order-amount" style="position: absolute; bottom: 5px; right: 5px;">
                                                                                    Order Total: &#8369;<?= $orderAmount ?>
                                                                                </div>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <br>
                                                                    <?php } ?>
                                                                    <?php
                                                                        if (!empty($pending['order_amount'])) {
                                                                            echo '<div class="row">';
                                                                            echo '<div class="col-8"></div>';
                                                                            echo '<div class="col-2">';
                                                                            if (!empty($pending['shipping_fee']) && !in_array($pending['order_type'], ['Pick Up', 'Pick Up (Paid)'])) {
                                                                                echo 'Shipping Fee: <br>';
                                                                            }
                                                                            echo 'Subtotal: <br>';
                                                                            echo '</div>';
                                                                            echo '<div class="col-2 fw-bold">';
                                                                            if (!empty($pending['shipping_fee']) && !in_array($pending['order_type'], ['Pick Up', 'Pick Up (Paid)'])) {
                                                                                echo '&#8369;' . $pending['shipping_fee'] . '<br>';
                                                                            }
                                                                            $totalAmount = $pending['order_amount'] + $pending['shipping_fee'];
                                                                            echo ' &#8369;' . $totalAmount . '<br>';
                                                                            echo '</div>';
                                                                            echo '</div>';
                                                                        }
                                                                        ?>
                
                                                                    <?php if ($pending['order_status'] === 'Settle') { ?>
                                                                        <a href="<?= site_url('details_' . $pending['id']) ?>" class="btn btn-success">Agree</a>
                                                                    <?php } ?>
                    
                                                                    <?php if ($pending['order_status'] === 'Settle') { ?>
                                                                        <a href="<?= site_url('' . $pending['id']) ?>" class="btn btn-danger">Decline</a>
                                                                    <?php } ?>
                                                                    <?php if ($pending['order_status'] === 'Request' && ($pending['flower_sizeOrtype'] === 'Small Bouquet' || $pending['flower_sizeOrtype'] === 'Regular Bouquet')): ?>
                                                                        <p>Note: Please wait for the approval</p>
                                                                    <?php elseif ($pending['order_status'] === 'Request'): ?>
                                                                        <p>Note: Please wait for the seller to release the amount for your desired flower design</p>
                                                                    <?php endif; ?>
                                                                    
                                                                    <?php if ($pending['order_status'] === 'Settle' && $pending['flower_sizeOrtype'] === 'Small Bouquet'): ?>
                                                                        <p>Your customize small flower bouquet has been approved. Click Agree to Proceed otherwise Decline, Thank you.</p>
                                                                    <?php elseif ($pending['order_status'] === 'Settle' && $pending['flower_sizeOrtype'] === 'Regular Bouquet'): ?>
                                                                        <p>Your customize regular flower bouquet has been approved. Click Agree to Proceed otherwise Decline, Thank you.</p>
                                                                    <?php elseif ($pending['order_status'] === 'Settle'): ?>
                                                                        <p>This is the price of your desired flower design</p>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <?php } ?>
                                                            </tbody>
                                                        </table>
                                                        <?php } endif; ?> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- End of All Pending Orders -->
                    
                        












                          <div class="tab-pane fade" id="nav-pay" role="tabpanel" aria-labelledby="nav-pay-tab">
                            <div class="shadow p-3 mb-5 bg-body">
                                <div class="row align-items-center">
                                    <div class="col-12 px-4">
                                        <div class="row">
                                            <?php $session = session(); ?>
                                            <?php if (isset($data['isLoggedIn']) && $data['isLoggedIn']) : ?>
                                                <?php if (count($accepted) == 0) : ?>
                                                    <div class="col-sm-12 text-center">
                                                        <span><i class="lni lni-cart" style="font-size:20px;"></i> You don't have on process orders</span>
                                                    </div>
                                                <?php else : ?>
                                                    <table class="table table-striped" id="example">
                                                        <thead style="background: #e9ecef;">
                                                            <tr>
                                                                <th style="text-align: center;">ORDER ID</th>
                                                                <th style="text-align: center;">Order Date</th>
                                                                <th style="text-align: center;">Order Amount</th>
                                                                <th style="text-align: center;">Order Type</th>
                                                                <th style="text-align: center;">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($accepted as $acceptedItem) : ?>
                                                                <tr>
                                                                    <td style="text-align: center;"><?= $acceptedItem['order_id'] ?></td>
                                                                    <td style="text-align: center;"><?= date('l, F j, Y', strtotime($acceptedItem['order_date'])) ?></td>
                                                                    <td style="text-align: center;"><?= $acceptedItem['shipping_fee'] + $acceptedItem['order_amount'] ?></td>
                                                                    <td style="text-align: center;"><?= $acceptedItem['order_type'] ?></td>
                                                                    <td style="text-align: center;">
                                                                        <button type="button" style="background-color: #02a618;border-color:#02a618;border-radius:0px;" class="btn btn-primary" data-toggle="modal" data-target="#reviewModal<?= $acceptedItem['id'] ?>"><i class="lni lni-eye"></i></button>
                                                                        <button class="btn btn-warning" style="border-radius: 0px;" <?php if ($acceptedItem['order_status'] === 'To Pay' || $acceptedItem['order_status'] ===  'To Deliver' || $acceptedItem['order_status'] === 'Completed') echo 'disabled'; ?> onclick="window.location='<?= base_url('delete_' . $acceptedItem['id']) ?>'"><i class="lni lni-ban"></i></button>
                                                                    </td>
                                                                </tr>
                                                                <!-- To Deliver Modal -->
                                                                <div class="modal fade" id="reviewModal<?= $acceptedItem['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel<?= $acceptedItem['id'] ?>" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title" id="reviewModalLabel<?= $acceptedItem['id'] ?>"><strong>Order Details</strong></h4>
                                                                                <button type="button" class="btn-close close" data-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <!-- To Deliver Form -->
                                                                                <?php
                                                                                $orderItems = $Order_Item_model->where('fk_order_id', $acceptedItem['id'])->findAll();
                                                                                foreach ($orderItems as $orderItem) {
                                                                                    $itemQty = $orderItem['item_qty'];
                                                                                    $itemAmount = $orderItem['item_amount'];
                                                                                    $orderAmount = $itemQty * $itemAmount;
                                                                                ?>
                                                                                    <div class="mb-3 form-group d-flex align-items-start order-item" style="position: relative;">
                                                                                        <img src="<?= base_url("public/public/products/" . $orderItem['item_image']) ?>" width="125px" height="100px" alt="product_image" style="border-radius: 10px; margin-right: 10px;">
                                                                                        <div class="ml-3">
                                                                                            <label for="item_name" class="form-label">
                                                                                                <strong><?= !empty($orderItem['item_name']) ? $orderItem['item_name'] : 'null' ?></strong>
                                                                                            </label><br>
                        
                                                                                            <label for="item_name" class="form-label">
                                                                                                <?= !empty($itemQty) ? $itemQty . 'x' : 'null' ?>
                                                                                            </label><br>
                                                                                            <?php if ($acceptedItem['flower_sizeOrtype'] !== 'DragNdrop') { ?>
                                                                                            <label for="item_name" class="form-label">
                                                                                                <?php if (!empty($itemAmount)) { ?>
                                                                                                    &#8369;<?= $itemAmount ?>
                                                                                                <?php } else { ?>
                                                                                                    null
                                                                                                <?php } ?>
                                                                                            </label>
                                                                                        <?php } ?>

                        
                                                                                        </div>
                                                                                       <?php
                                                                                        if ($acceptedItem['flower_sizeOrtype'] !== 'DragNdrop') {
                                                                                            // Only display the div if 'flower_sizeOrtype' is not equal to 'DragNdrop'
                                                                                            echo '<div class="order-amount" style="position: absolute; bottom: 5px; right: 5px;">';
                                                                                            echo 'Order Total: &#8369;' . (!empty($orderAmount) ? $orderAmount : 'null');
                                                                                            echo '</div>';
                                                                                        }
                                                                                        ?>
                                                                                    </div>
                                                                                <?php } ?>
                                                                                <?php
                                                                                    if (!empty($acceptedItem['order_amount'])) {
                                                                                        echo '<div class="row">';
                                                                                        echo '<div class="col-8"></div>';
                                                                                        echo '<div class="col-2">';
                                                                                        if (!empty($acceptedItem['shipping_fee']) && !in_array($acceptedItem['order_type'], ['Pick Up', 'Pick Up (Paid)'])) {
                                                                                            echo 'Shipping Fee: <br>';
                                                                                        }
                                                                                        echo 'Subtotal: <br>';
                                                                                        echo '</div>';
                                                                                        echo '<div class="col-2 fw-bold">';
                                                                                        if (!empty($acceptedItem['shipping_fee']) && !in_array($acceptedItem['order_type'], ['Pick Up', 'Pick Up (Paid)'])) {
                                                                                            echo '&#8369;' . $acceptedItem['shipping_fee'] . '<br>';
                                                                                        }
                                                                                        $totalAmount = $acceptedItem['order_amount'] + $acceptedItem['shipping_fee'];
                                                                                        echo ' &#8369;' . $totalAmount . '<br>';
                                                                                        echo '</div>';
                                                                                        echo '</div>';
                                                                                    }
                                                                                    ?>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>












                        <div class="tab-pane fade" id="nav-deliver" role="tabpanel" aria-labelledby="nav-deliver-tab">
                            <div class="shadow p-3 mb-5 bg-body">
                                <div class="row align-items-center">
                                    <div class="col-12 px-4">
                                        <div class="row">
                                            <?php $session = session(); ?>
                                            <?php if (@$data['isLoggedIn']) : ?>
                                                <?php if (count($deliver) == 0) { ?>
                                                    <div class="col-sm-12 text-center">
                                                        <span><i class="lni lni-cart" style="font-size:20px;"></i> You have no orders to deliver</span>
                                                    </div>
                                                <?php } else { ?>
                                                    <table class="table table-striped" id="example">
                                                        <thead style="background: #e9ecef;">
                                                            <tr>
                                                                <th style="text-align: center;">ORDER ID</th>
                                                                <th style="text-align: center;">Order Date</th>
                                                                <th style="text-align: center;">Order Amount</th>
                                                                <th style="text-align: center;">Order Type</th>
                                                                <th style="text-align: center;">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($deliver as $order) : ?>
                                                                <tr>
                                                                    <td style="text-align: center;"><?= $order['order_id'] ?></td>
                                                                    <td style="text-align: center;"><?= date('l, F j, Y', strtotime($order['order_date'])) ?></td>
                                                                    <td style="text-align: center;"><?= $order['shipping_fee'] + $order['order_amount'] ?></td>
                                                                    <td style="text-align: center;"><?= $order['order_type'] ?></td>
                                                                    <td style="text-align: center;">
                                                                        <button type="button" style="background-color: #02a618; border-color:#02a618; border-radius:0px;" class="btn btn-primary" data-toggle="modal" data-target="#reviewModal<?= $order['id'] ?>"><i class="lni lni-eye"></i></button>
                                                                        <button class="btn btn-warning" style="border-radius: 0px;" <?php if ($order['order_status'] === 'To Deliver' || $order['order_status'] === 'Completed') echo 'disabled'; ?> onclick="window.location='<?= base_url('delete_' . $order['id']) ?>'"><i class="lni lni-ban"></i></button>
                        
                                                                        <!-- To Deliver Modal -->
                                                                        <div class="modal fade" id="reviewModal<?= $order['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel<?= $order['id'] ?>" aria-hidden="true">
                                                                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h4 class="modal-title" id="reviewModalLabel<?= $order['id'] ?>"><strong>Order Details</strong></h4>
                                                                                        <button type="button" class="btn-close close" data-dismiss="modal" aria-label="Close"></button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <!-- To Deliver Form -->
                                                                                        <?php
                                                                                        $orderItems = $Order_Item_model->where('fk_order_id', $order['id'])->findAll();
                                                                                        foreach ($orderItems as $orderItem) {
                                                                                            $itemQty = $orderItem['item_qty'];
                                                                                            $itemAmount = $orderItem['item_amount'];
                                                                                            $orderAmount = $itemQty * $itemAmount;
                                                                                        ?>
                                                                                            <div class="mb-3 form-group d-flex align-items-start order-item" style="position: relative;">
                                                                                                <img src="<?= base_url("public/public/products/" . $orderItem['item_image']) ?>" width="125px" height="100px" alt="product_image" style="border-radius: 10px; margin-right: 10px;">
                                                                                                <div class="ml-3">
                                                                                                    <label for="item_name" class="form-label">
                                                                                                        <strong><?= !empty($orderItem['item_name']) ? $orderItem['item_name'] : 'null' ?></strong>
                                                                                                    </label><br>
                        
                                                                                                    <label for="item_name" class="form-label">
                                                                                                        <?= !empty($itemQty) ? $itemQty . 'x' : 'null' ?>
                                                                                                    </label><br>
                        
                                                                                                    <?php if ($order['flower_sizeOrtype'] !== 'DragNdrop') { ?>
                                                                                                        <label for="item_name" class="form-label">
                                                                                                            <?php if (!empty($itemAmount)) { ?>
                                                                                                                &#8369;<?= $itemAmount ?>
                                                                                                            <?php } else { ?>
                                                                                                                null
                                                                                                            <?php } ?>
                                                                                                        </label>
                                                                                                    <?php } ?>
                                                                                                </div>
                                                                                                 <?php
                                                                                                    if ($order['flower_sizeOrtype'] !== 'DragNdrop') {
                                                                                                        // Only display the div if 'flower_sizeOrtype' is not equal to 'DragNdrop'
                                                                                                        echo '<div class="order-amount" style="position: absolute; bottom: 5px; right: 5px;">';
                                                                                                        echo 'Order Total: &#8369;' . (!empty($orderAmount) ? $orderAmount : 'null');
                                                                                                        echo '</div>';
                                                                                                    }
                                                                                                    ?>
                                                                                            </div>
                                                                                        <?php } ?>
                                                                                        <?php
                                                                                        if (!empty($order['order_amount'])) {
                                                                                            echo '<div class="row">';
                                                                                            echo '<div class="col-8"></div>';
                                                                                            echo '<div class="col-2">';
                                                                                            if (!empty($order['shipping_fee']) && !in_array($order['order_type'], ['Pick Up', 'Pick Up (Paid)'])) {
                                                                                                echo 'Shipping Fee: <br>';
                                                                                            }
                                                                                            echo 'Subtotal: <br>';
                                                                                            echo '</div>';
                                                                                            echo '<div class="col-2 fw-bold">';
                                                                                            if (!empty($order['shipping_fee']) && !in_array($order['order_type'], ['Pick Up', 'Pick Up (Paid)'])) {
                                                                                                echo '&#8369;' . $order['shipping_fee'] . '<br>';
                                                                                            }
                                                                                            $totalAmount = $order['order_amount'] + $order['shipping_fee'];
                                                                                            echo ' &#8369;' . $totalAmount . '<br>';
                                                                                            echo '</div>';
                                                                                            echo '</div>';
                                                                                        }
                                                                                        ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                <?php } endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>















<div class="tab-pane fade" id="nav-pickup" role="tabpanel" aria-labelledby="nav-pickup-tab">
    <div class="shadow p-3 mb-5 bg-body">
        <div class="row align-items-center">
            <div class="col-12 px-4">
                <div class="row">
                    <?php $session = session(); ?>
                    <?php if (@$data['isLoggedIn']) : ?>
                        <?php if (count($pick_up) == 0) { ?>
                            <div class="col-sm-12 text-center">
                                <span><i class="lni lni-cart" style="font-size:20px;"></i>You have no pick up orders yet</span>
                            </div>
                        <?php } else { ?>
                            <table class="table table-striped" id="example">
                                <thead style="background: #e9ecef;">
                                    <tr>
                                        <th style="text-align: center;">ORDER ID</th>
                                        <th style="text-align: center;">Order Date</th>
                                        <th style="text-align: center;">Order Amount</th>
                                        <th style="text-align: center;">Order Type</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pick_up as $pickup) : ?>
                                        <tr>
                                            <td style="text-align: center;"><?= $pickup['order_id'] ?></td>
                                            <td style="text-align: center;"><?= date('l, F j, Y', strtotime($pickup['order_date'])) ?></td>
                                            <td style="text-align: center;"><?= $pickup['shipping_fee'] + $pickup['order_amount'] ?></td>
                                            <td style="text-align: center;"><?= $pickup['order_type'] ?></td>
                                            <td style="text-align: center;">
                                                <button type="button" style="background-color: #02a618;border-color:#02a618;border-radius:0px;" class="btn btn-primary" data-toggle="modal" data-target="#reviewModal<?= $pickup['id'] ?>"><i class="lni lni-eye"></i></button>
                                                <button class="btn btn-warning" style="border-radius: 0px;" <?php if ($pickup['order_status'] === 'Ready' || $pickup['order_status'] === 'Completed') echo 'disabled'; ?> onclick="window.location='<?= base_url('delete_' . $pickup['id']) ?>'"><i class="lni lni-ban"></i></button>

                                                <!-- Pickup Modal -->
                                                <div class="modal fade" id="reviewModal<?= $pickup['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel<?= $pickup['id'] ?>" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="reviewModalLabel<?= $pickup['id'] ?>"><strong>Order Details</strong></h4>
                                                                <button type="button" class="btn-close close" data-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Pickup Form -->
                                                                <?php
                                                                $orderItems = $Order_Item_model->where('fk_order_id', $pickup['id'])->findAll();
                                                                foreach ($orderItems as $orderItem) {
                                                                    $itemQty = $orderItem['item_qty'];
                                                                    $itemAmount = $orderItem['item_amount'];
                                                                    $orderAmount = $itemQty * $itemAmount;
                                                                ?>
                                                                    <div class="mb-3 form-group d-flex align-items-start order-item" style="position: relative;">
                                                                        <img src="<?= base_url("public/public/products/" . $orderItem['item_image']) ?>" width="125px" height="100px" alt="product_image" style="border-radius: 10px; margin-right: 10px;">
                                                                        <div class="ml-3">
                                                                            <label for="item_name" class="form-label">
                                                                                <strong><?= !empty($orderItem['item_name']) ? $orderItem['item_name'] : 'null' ?></strong>
                                                                            </label><br>

                                                                            <label for="item_name" class="form-label">
                                                                                <?= !empty($itemQty) ? $itemQty . 'x' : 'null' ?>
                                                                            </label><br>

                                                                            <?php if ($pickup['flower_sizeOrtype'] !== 'DragNdrop') { ?>
                                                                                <label for="item_name" class="form-label">
                                                                                    <?php if (!empty($itemAmount)) { ?>
                                                                                        &#8369;<?= $itemAmount ?>
                                                                                    <?php } else { ?>
                                                                                        null
                                                                                    <?php } ?>
                                                                                </label>
                                                                            <?php } ?>
                                                                        </div>
                                                                         <?php
                                                                            if ($pickup['flower_sizeOrtype'] !== 'DragNdrop') {
                                                                                // Only display the div if 'flower_sizeOrtype' is not equal to 'DragNdrop'
                                                                                echo '<div class="order-amount" style="position: absolute; bottom: 5px; right: 5px;">';
                                                                                echo 'Order Total: &#8369;' . (!empty($orderAmount) ? $orderAmount : 'null');
                                                                                echo '</div>';
                                                                            }
                                                                            ?>
                                                                    </div>
                                                                <?php } ?>
                                                                <?php
                                                                if (!empty($pickup['order_amount'])) {
                                                                    echo '<div class="row">';
                                                                    echo '<div class="col-8"></div>';
                                                                    echo '<div class="col-2">';
                                                                    if (!empty($pickup['shipping_fee']) && !in_array($pickup['order_type'], ['Pick Up', 'Pick Up (Paid)'])) {
                                                                        echo 'Shipping Fee: <br>';
                                                                    }
                                                                    echo 'Subtotal: <br>';
                                                                    echo '</div>';
                                                                    echo '<div class="col-2 fw-bold">';
                                                                    if (!empty($pickup['shipping_fee']) && !in_array($pickup['order_type'], ['Pick Up', 'Pick Up (Paid)'])) {
                                                                        echo '&#8369;' . $pickup['shipping_fee'] . '<br>';
                                                                    }
                                                                    $totalAmount = $pickup['order_amount'] + $pickup['shipping_fee'];
                                                                    echo ' &#8369;' . $totalAmount . '<br>';
                                                                    echo '</div>';
                                                                    echo '</div>';
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php } endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        

                        <div class="tab-pane fade" id="nav-completed" role="tabpanel" aria-labelledby="nav-completed-tab">
                            <div class="shadow p-3 mb-5 bg-body">
                                <div class="row align-items-center">
                                    <div class="col-12 px-4">
                                        <div class="row">
                                            
                                            <?php $session = session(); ?>
                                            <?php if (@$data['isLoggedIn']) : ?>
                                                <?php if (count($completed) == 0) { ?>
                                                    <div class="col-sm-12 text-center">
                                                        <span><i class="lni lni-cart" style="font-size:20px;"></i> You have no orders completed yet</i></span>
                                                    </div>    
                                                <?php } else { ?>
                                                    <table class="table table-striped" id="example">
                                                        <thead style="background: #e9ecef;">
                                                            <tr>
                                                                <th style="text-align: center;">ORDER ID</th>
                                                                <th style="text-align: center;">Order Date</th>
                                                                <th style="text-align: center;">Order Amount</th>
                                                                <th style="text-align: center;">Order Type</th>
                                                                <th style="text-align: center;">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach ($completed as $completedOrder) { ?>
                                                                <tr>
                                                                    <td style="text-align: center;"><?= $completedOrder['order_id'] ?></td>
                                                                    <td style="text-align: center;"><?= date('l, F j, Y', strtotime($completedOrder['order_date'])) ?></td>
                                                                    <td style="text-align: center;"><?= $completedOrder['order_amount'] ?></td>
                                                                    <td style="text-align: center;"><?= $completedOrder['order_type'] ?></td>
                                                                    <td style="text-align: center;">
                                                                        <?php $orderItems = $Order_Item_model->where('fk_order_id', $completedOrder['id'])->findAll(); ?>
                                                                        <?php if (!empty($orderItems)) { ?>
                                                                            <?php if ($completedOrder['order_status'] !== 'Received') { ?>
                                                                                <button type="button" style="background-color: #02a618;border-color:#02a618;border-radius:0px;" class="btn btn-primary" data-toggle="modal" data-target="#reviewModal<?= $completedOrder['id'] ?>"><i><i class="lni lni-pencil-alt"></i></button>
                                                                            <?php } else { ?>
                                                                                <button type="button" style="background-color: #02a618;border-color:#02a618;border-radius:0px;" class="btn btn-primary" data-toggle="modal" data-target="#reviewModal<?= $completedOrder['id'] ?>" disabled><i class="lni lni-thumbs-up"></i></button>
                                                                            <?php } ?>
                                                                        <?php } else { ?>
                                                                            <span class="text-muted">No items to review</span>
                                                                        <?php } ?>
                                                                        <a href="<?= base_url('product_grids')?>" class="btn btn-info" style="border-radius: 0px;"><i class="lni lni-cart"></i></a>
                                                                    </td>
                                                                </tr>
                                                                <!-- Review Modal -->
                                                                <div class="modal fade" id="reviewModal<?= $completedOrder['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel<?= $completedOrder['id'] ?>" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title" id="reviewModalLabel<?= $completedOrder['id'] ?>"><strong>Write Review</strong></h4>
                                                                                <button type="button" class="btn-close close" data-dismiss="modal" aria-label="Close">
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body scrollable-modal-body">
                                                                                <!-- Review Form -->
                                                                                <form id="reviewForm<?= $completedOrder['id'] ?>" action="<?= site_url('submit_review') ?>" method="post">
                                                                                    <?php foreach ($orderItems as $orderItem) { 
                                                                                        $itemQty = $orderItem['item_qty'];
                                                                                        $itemAmount = $orderItem['item_amount'];
                                                                                        $orderAmount = $itemQty * $itemAmount;
                                                                                    ?>
                                                                                        <!-- Hidden inputs -->
                                                                                        <input type="hidden" name="fk_order_id[]" value="<?= $orderItem['fk_order_id'] ?>">
                                                                                        <input type="hidden" name="product_id[]" value="<?= $orderItem['product_id'] ?>">
                                                                                        <input type="hidden" name="id[]" value="<?= $orderItem['id'] ?>">
                                                                                        <input type="hidden" name="order_status[]" value="Received">

                                                                                        <div class="mb-3 form-group d-flex align-items-start order-item" style="position: relative;">
                                                                                            <img src="<?= base_url("public/public/products/".$orderItem['item_image'])?>" width="125px" height="100px" alt="product_image" style="border-radius: 10px; margin-right: 10px;">
                                                                                            <div class="ml-3">
                                                                                            <label for="item_name" class="form-label">
                                                                                            <strong><?= !empty($orderItem['item_name']) ? $orderItem['item_name'] : 'null' ?></strong>
                                                                                            </label><br>

                                                                                            <label for="item_name" class="form-label">
                                                                                                <?= !empty($itemQty) ? $itemQty . 'x' : 'null' ?>
                                                                                            </label><br>

                                                                                            <label for="item_name" class="form-label">
                                                                                                <?php if (!empty($itemAmount)) { ?>
                                                                                                    &#8369;<?= $itemAmount ?>
                                                                                                <?php } else { ?>
                                                                                                    null
                                                                                                <?php } ?>
                                                                                            </label>

                                                                                            </div>
                                                                                            <div class="order-amount" style="position: absolute; bottom: 5px; right: 5px;">
                                                                                                Order Total: &#8369;<?= !empty($orderAmount) ? $orderAmount : 'null' ?>

                                                                                            </div>
                                                                                        </div>
                                                                                       
                                                                                        <!-- Review inputs -->
                                                                                        <input type="hidden" name="name[]" style="text-transform: capitalize;" value="<?= $completedOrder['firstname'] ?> <?= $completedOrder['lastname'] ?>" class="form-control">
                                                                                        <input type="hidden" name="variation[]" style="text-transform: capitalize;" value="<?= $orderItem['item_qty'] ?>" class="form-control">
                                                                                        <input type="hidden" name="status[]" value="Pending" style="text-transform: capitalize;" class="form-control">

                                                                                        <div class="mb-3 form-group">
                                                                                            <label for="review" class="form-label">Your Review:</label>
                                                                                            <textarea class="form-control" name="review[]" rows="4" cols="50"></textarea>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="">Your Rating</label>
                                                                                        </div>
                                                                                        <div class="rating mb-2">
                                                                                            <input type="radio" id="star5-<?= $orderItem['id'] ?>" name="rating[<?= $orderItem['id'] ?>]" value="5" required>
                                                                                            <label for="star5-<?= $orderItem['id'] ?>" title="5 stars"></label>
                                                                                            <input type="radio" id="star4-<?= $orderItem['id'] ?>" name="rating[<?= $orderItem['id'] ?>]" value="4">
                                                                                            <label for="star4-<?= $orderItem['id'] ?>" title="4 stars"></label>
                                                                                            <input type="radio" id="star3-<?= $orderItem['id'] ?>" name="rating[<?= $orderItem['id'] ?>]" value="3">
                                                                                            <label for="star3-<?= $orderItem['id'] ?>" title="3 stars"></label>
                                                                                            <input type="radio" id="star2-<?= $orderItem['id'] ?>" name="rating[<?= $orderItem['id'] ?>]" value="2">
                                                                                            <label for="star2-<?= $orderItem['id'] ?>" title="2 stars"></label>
                                                                                            <input type="radio" id="star1-<?= $orderItem['id'] ?>" name="rating[<?= $orderItem['id'] ?>]" value="1">
                                                                                            <label for="star1-<?= $orderItem['id'] ?>" title="1 star"></label>
                                                                                        </div>
                                                                                    <?php } ?>
                                                                                <div class="modal-footer">
                                                                                    <div class="form-group">
                                                                                        <button type="submit" class="btn btn-primary form-control" style="background-color: #02a618;border-color:#02a618;border-radius:0px;">Submit Review</button>
                                                                                    </div>
                                                                                </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                <?php } ?>
                                            <?php else : ?>
                                                <div class="col-sm-12 text-center">
                                                    <i class="fa fa-user-circle py-5" style="font-size: 100px; color: #02a618;"></i>
                                                    <h3 class="pb-5"><strong>Please log in to view your orders!</strong></h3>
                                                    <a href="/login" class="btn btn-info px-5 py-2">Login</a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>





                        <div class="tab-pane fade" id="nav-cancelled" role="tabpanel" aria-labelledby="nav-cancelled-tab">
                            <div class="shadow p-3 mb-5 bg-body">
                                <div class="row align-items-center">
                                    <div class="col-12 px-4">
                                        <div class="row">
                                        <?php $session = session(); ?>
                                            <?php if(@$data['isLoggedIn']) : ?>
                                            <?php if(count($cancelled) == 0) { ?>
                                                <div class="col-sm-12 text-center">
                                                    <span><i class="lni lni-cart" style="font-size:20px;"></i> You have no cancelled orders yet</i></span>
                                                </div>
                                            <?php } else { ?>
                                                <table class="table table-striped" id="example">
                                                    <thead style="background: #e9ecef;">
                                                        <tr>
                                                            <th style="text-align: center;">ORDER ID</th>
                                                            <th style="text-align: center;">Order Date</th>
                                                            <th style="text-align: center;">Order Amount</th>
                                                            <th style="text-align: center;">Order Type</th>
                                                            <th style="text-align: center;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($cancelled as $cancelled){ ?>
                                                        <td style="text-align: center;"><?= $cancelled['order_id'] ?></td>
                                                        <td style="text-align: center;"><?= date('l, F j, Y', strtotime($cancelled['order_date'])) ?></td>
                                                        <td style="text-align: center;"><?= $cancelled['order_amount'] ?></td>
                                                        <td style="text-align: center;"><?= $cancelled['order_type']?></td>
                                                        <td style="text-align: center;">
                                                        <button type="button" style="background-color: #02a618;border-color:#02a618;border-radius:0px;" class="btn btn-primary" data-toggle="modal" data-target="#reviewModal<?= $cancelled['id'] ?>"><i class="lni lni-eye"></i></button>
                                                            <?php $orderItems = $Order_Item_model->where('fk_order_id', $cancelled['id'])->findAll(); ?>
                                                                    </td>
                                                                </tr> 
                                                               <!-- To Deliver Modal -->
                                                               <div class="modal fade" id="reviewModal<?= $cancelled['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel<?= $cancelled['id'] ?>" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                        <div class="modal-content">
                                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="reviewModalLabel<?= $cancelled['id'] ?>"><strong>Order Details</strong></h4>
                                                            <button type="button" class="btn-close close" data-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- To Deliver Form -->
                                                            <?php foreach ($orderItems as $orderItem) {
                                                                $itemQty = $orderItem['item_qty'];
                                                                $itemAmount = $orderItem['item_amount'];
                                                                $orderAmount = $itemQty * $itemAmount;
                                                            ?>
                                                                <div class="mb-3 form-group d-flex align-items-start order-item" style="position: relative;">
                                                                    <img src="<?= base_url("public/public/products/".$orderItem['item_image'])?>" width="125px" height="100px" alt="product_image" style="border-radius: 10px; margin-right: 10px;">
                                                                    <div class="ml-3">
                                                                    <strong><?= !empty($orderItem['item_name']) ? $orderItem['item_name'] : 'null' ?></strong>
                                                                    </label><br>

                                                                    <label for="item_name" class="form-label">
                                                                        <?= !empty($itemQty) ? $itemQty . 'x' : 'null' ?>
                                                                    </label><br>

                                                                    <label for="item_name" class="form-label">
                                                                        <?php if (!empty($itemAmount)) { ?>
                                                                            &#8369;<?= $itemAmount ?>
                                                                        <?php } else { ?>
                                                                            null
                                                                        <?php } ?>
                                                                    </label>

                                                                    </div>
                                                                    <div class="order-amount" style="position: absolute; bottom: 5px; right: 5px;">
                                                                        Order Total: &#8369;<?= !empty($orderAmount) ? $orderAmount : 'null' ?>

                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            <?php } endif; ?> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Contact Area -->


    
    
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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>


    <script type="text/javascript">

 $(document).ready(function() {
    $('.rating input').on('click', function() {
        const ratingContainer = $(this).closest('.rating');
        ratingContainer.find('label').removeClass('selected');
        $(this).prevAll('label').addClass('selected');
    });
});




    // Disable the button after form submission
    $('#reviewForm').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        var form = $(this);
        var button = form.find('#submitReviewBtn');

        $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: form.serialize(),
            dataType: 'json',
            success: function(response) {
                // Hide the submit button and show the success message button
                form.find('button[type="submit"]').addClass('d-none');
                button.removeClass('d-none').prop('disabled', true);
            },
            complete: function() {
                // Close the modal after form submission
                $('#reviewModal').modal('hide');
            }
        });
    });
    
  $('.delete').on('click',function (e) {
        e.preventDefault();
        var self = $(this);
        console.log(self.data('title'));
        Swal.fire({
            title: 'Are you sure?',
            text: "Cancel order?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745',  // Green color for the "Yes" button
            cancelButtonColor: '#d33',
            cancelButtonText: 'No',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire
              location.href = self.attr('href');
            }
        })
    })
    

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


  $(document).ready(function() {
        $('.open-modal').click(function() {
            var productId = $(this).data('id');

            // Make an Ajax request to fetch the product data
            $.ajax({
                url: 'get_order_modal_' + productId,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Update the modal content with the retrieved data
                    $('#modal-product-id').text(response.id);

                    // Show the modal
                    $('#product-modal').modal('show');
                },
                error: function() {
                    // Handle error case
                }
            });
        });
    });

</script>
</body>

</html>