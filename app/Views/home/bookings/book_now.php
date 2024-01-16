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
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css" rel="stylesheet"/>
    

    <script>
      var userData = <?php echo json_encode($data); ?>;
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
            max-width: 400px !important; 
        }
        #calendar {
            max-width: 75%; 
            margin: 0 auto; 
        }
        .swal2-modal {
            max-width: 330px !important; 
            max-height: 400px !important;
        }
        .swal2-icon {
            font-size: 8px; 
        }

        .fc-day.fc-day-future:hover,
        .fc-day.fc-day-future.fc-day-clicked {
            background-color: rgba(0, 0, 0, 0.2); 
            cursor: pointer;
        }

        .your-custom-class {
            font-size: 20px; /* Adjust the font size as needed */
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
                                <div class="wishlist">
                                    <a href="javascript:void(0)">
                                        <i class="lni lni-heart"></i>
                                        <span class="total-items">0</span>
                                    </a>
                                </div>
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
                                <a href="https://www.facebook.com/profile.php?id=100088678795529"><i class="lni lni-facebook-filled"></i></a>
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
                        <h1 class="page-title">Booking</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="<?= base_url('home') ?>"><i class="lni lni-home"></i> Home</a></li>
                        <li>Booking</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <?php $validation =  \Config\Services::validation(); ?>
    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="contact-head">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>Schedule Your Events</h2>
                            <p>Your reservation is a promise, and our commitment is to make your experience unforgettable.<br> We can't wait to welcome you!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="contact-form-head">
                    <div class="form-main">
                        <div id='calendar'></div>
                    </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <div class="modal fade review-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"> <!-- Use modal-lg to make the modal wider -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalTitle">Book Now</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>






        
  

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
                                <li><a href="https://www.facebook.com/profile.php?id=100088678795529"><i class="lni lni-facebook-filled"></i></a></li>
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
    <script src="<?= base_url() ?>/js/custom.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jq.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.js"></script>
    <script src="<?= base_url() ?>/public/js/custom.js"></script>
     <script src="<?= base_url() ?>/public/sweetalert/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript">

            document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                eventSources: [

                    function (fetchInfo, successCallback, failureCallback) {
                        var events = [];
                        var currentDate = new Date(fetchInfo.startStr);
                        var endDate = new Date(fetchInfo.endStr);
                        var today = new Date(); 

                        while (currentDate <= endDate) {
                            var dateString = currentDate.toISOString().slice(0, 10);

                            if (currentDate < today) {
                                currentDate.setDate(currentDate.getDate() + 1); 
                                continue;
                            }

                            currentDate.setDate(currentDate.getDate() + 1); 
                        }

                        successCallback(events);
                    },
                ],
                dateClick: function (info) {
                    var clickedDate = new Date(info.date);
                    var today = new Date();

                    if (clickedDate < today) {
                        return;
                    }

                    var year = clickedDate.getFullYear();
                    var month = (clickedDate.getMonth() + 1).toString().padStart(2, '0'); 
                    var day = clickedDate.getDate().toString().padStart(2, '0'); 

                    var selectedDateStr = year + '-' + month + '-' + day;

                    var approvedEvents = <?php echo json_encode($approved); ?>;

                    var selectedEvents = [];
                        for (var i = 0; i < approvedEvents.length; i++) {
                            if (approvedEvents[i].date === selectedDateStr) {
                                selectedEvents.push(approvedEvents[i]);
                            }
                        }

                    if (selectedEvents.length > 0) {
                        var tableHtml = '<table class="table table-bordered">' +
                            '<thead>' +
                            '<tr>' +
                            '<th style="text-align:center;">Date</th>' +
                            '<th style="text-align:center;">Location</th>' +
                            '<th style="text-align:center;">Start</th>' +
                            '</tr>' +
                            '</thead>' +
                            '<tbody>';

                        var groupedEvents = {};
                        for (var j = 0; j < selectedEvents.length; j++) {
                            var startTime = selectedEvents[j].start;
                            if (!groupedEvents[startTime]) {
                                groupedEvents[startTime] = [];
                            }
                            groupedEvents[startTime].push(selectedEvents[j]);
                        }

                        for (var startTime in groupedEvents) {
                            if (groupedEvents.hasOwnProperty(startTime)) {
                                var events = groupedEvents[startTime];
                                var ampm = 'AM';
                                var timeParts = startTime.split(':');
                                var hours = parseInt(timeParts[0]);

                                if (hours >= 12) {
                                    ampm = 'PM';
                                    if (hours > 12) {
                                        hours -= 12;
                                    }
                                }

                                var formattedTime = hours + ':' + timeParts[1] + ' ' + ampm;

                                tableHtml += '<tr>';
                                tableHtml += '<td style="text-align:center;">' + events[0].date + '</td>';
                                tableHtml += '<td style="text-align:center;">' + events[0].location + '</td>';
                                tableHtml += '<td style="text-align:center;" rowspan="' + events.length + '">' + formattedTime + '</td>';
                                tableHtml += '</tr>';

                                for (var i = 1; i < events.length; i++) {
                                    tableHtml += '<tr>';
                                    tableHtml += '<td style="text-align:center;">' + events[i].date + '</td>';
                                    tableHtml += '<td style="text-align:center;">' + events[i].location + '</td>';
                                    tableHtml += '</tr>';
                                }
                            }
                        }

                        tableHtml += '</tbody><strong>Note: You cannot book 4 hours before or after these existing bookings</strong></table>';

                        var startTimeDate = new Date(selectedEvents[0].date + ' ' + selectedEvents[0].start);
                        var timeBefore = new Date(startTimeDate.getTime() - 4 * 60 * 60 * 1000); // 4 hours before
                        var timeAfter = new Date(startTimeDate.getTime() + 4 * 60 * 60 * 1000); // 4 hours after

                        var isOverlap = false;
                        for (var k = 1; k < selectedEvents.length; k++) {
                            var eventStartTime = new Date(selectedEvents[k].date + ' ' + selectedEvents[k].start);
                            var eventEndTime = new Date(eventStartTime.getTime() + 4 * 60 * 60 * 1000); // 4 hours after

                            if (
                                (eventStartTime >= timeBefore && eventStartTime <= timeAfter) || // Event starts within available time
                                (eventEndTime >= timeBefore && eventEndTime <= timeAfter) ||     // Event ends within available time
                                (eventStartTime <= timeBefore && eventEndTime >= timeAfter)      // Event spans across available time
                            ) {
                                isOverlap = true;
                                break;
                            }
                        }

                        if (isOverlap) {
                            $('#myModal .modal-body').html('<p>Selected event has an overlap with other events.</p>');
                        } else {
                            var timeBeforeHours = timeBefore.getHours();
                            var timeBeforeMinutes = timeBefore.getMinutes();
                            var timeBeforeAmPm = timeBeforeHours < 12 ? 'AM' : 'PM';

                            if (timeBeforeHours > 12) {
                                timeBeforeHours -= 12;
                            } else if (timeBeforeHours === 0) {
                                timeBeforeHours = 12;
                            }

                            var timeBeforeFormatted = timeBeforeHours + ':' + (timeBeforeMinutes < 10 ? '0' : '') + timeBeforeMinutes + ' ' + timeBeforeAmPm;

                            var timeAfterHours = timeAfter.getHours();
                            var timeAfterMinutes = timeAfter.getMinutes();
                            var timeAfterAmPm = timeAfterHours < 12 ? 'AM' : 'PM';

                            if (timeAfterHours > 12) {
                                timeAfterHours -= 12;
                            } else if (timeAfterHours === 0) {
                                timeAfterHours = 12;
                            }

                            var timeAfterFormatted = timeAfterHours + ':' + (timeAfterMinutes < 10 ? '0' : '') + timeAfterMinutes + ' ' + timeAfterAmPm;

                            $('#myModal .modal-body').html('<div class="table-container">' +
                                '<div class="table-wrapper">' +
                                tableHtml +
                                '</div>' +
                                '<div class="available-times">' +
                                // '<p style="margin-bottom: 0; text-align:center;"><strong>Available Time (4 Hours Before): ' + timeBeforeFormatted + '</strong></p>' +
                                // '<p style="margin-bottom: 0; text-align:center;"><strong>Available Time (4 Hours After): ' + timeAfterFormatted + '</strong></p>' +
                                '</div>' +
                                '</div>');
                        }
                    } else {
                        $('#myModal .modal-body').html('<p class="text-center p-3 border-bottom">No other event for this date mean this whole day is available</p>');
                    }



                    var formHtml = 
                        '<form action="<?= site_url('book_now') ?>"  enctype="multipart/form-data" method="POST">' +
                            '<div class="row mt-4">' +
                                '<div class="col-sm-6">' +
                                '<div class="form-group">' +
                                '<label>Full Name</label>' +
                                '<input type="text" class="form-control" id="fullname" name="fullname" value="' + userData.firstname + ' ' + userData.lastname + '" style="text-transform: capitalize;" required />' +
                                '</div>' +
                                '</div>' +
                            
                                '<div class="col-sm-6">' +
                                '<div class="form-group">' +
                                '<label>Email Address</label>' +
                                '<input type="text" class="form-control" name="email" value="' + userData.email +'" required />' +
                                '</div>' +
                                '</div>' +
                            '</div>' + 

                            '<div class="row">' +
                                '<div class="col-sm-6">' +
                                '<div class="form-group">' +
                                '<label>Contact</label>' +
                                '<input type="number" class="form-control" name="contact" value="' + userData.phone + '" required />' +
                                '</div>' +
                                '</div>' +
                            
                                '<div class="col-sm-6">' +
                                '<div class="form-group">' +
                                '<label>Date</label>' +
                                '<input type="text" id="selectedDate" class="form-control"  name="date"  readonly />' +
                                '</div>' +
                                '</div>' +
                            '</div>' + 

                            '<div class="row">' +
                                '<div class="col-sm-6">' +
                                '<div class="form-group">' +
                                '<label>Event Location</label>' +
                                '<input type="text" placeholder="City, Barangay, Street/Sitio"class="form-control" name="location"  required />' +
                                '<input type="hidden" class="form-control" value = "Pending" name="status"  required />' +
                                '</div>' +
                                '</div>' +
                              
                                '<input type="hidden" id="balance" class="form-control"  name="balance" value="0">' +
                                '<input type="hidden" id="payment_amount" class="form-control"  name="payment_amount" value="0">' +
                 
                            
                                '<div class="col-sm-6">' +
                                '<div class="form-group">' +
                                '<label>Time Start</label>' +
                                '<input type="time" id="time" class="form-control"  name="start"  required />' +
                                '</div>' +
                                '</div>' +
                            '</div>' + 

                            '<div class="row">' +
                                '<div class="col-sm-12 button">' +
                                '<div class="form-group">' +
                                '<button type="submit" class="btn float-end">Submit booking</button>' +
                                '</div>' +
                                '</div>' +
                            
                            '</div>' + 
                        '</form>';

                    $('#myModal .modal-body').append(formHtml);

                    $('#myModal').modal('show');
                    $('#selectedDate').val(selectedDateStr);

                },

                events: [
                    <?php if (!empty($booked_dates)): ?>
                    <?php
                        $uniqueBookedDates = [];
                        foreach ($booked_dates as $booked_date) {
                            $date = $booked_date['date'];
                            if (!in_array($date, $uniqueBookedDates)) {
                                $uniqueBookedDates[] = $date;
                                
                            }
                        }
                    ?>
                    <?php endif; ?>
                ],
                dayRender: function (info) {
                    var today = new Date();
                    var date = info.date;

                    if (date.getDate() === today.getDate() && date.getMonth() === today.getMonth() && date.getFullYear() === today.getFullYear()) {
                        info.el.style.backgroundColor = 'rgba(0, 0, 0, 0.2)';
                    }
                },
            });

            calendar.render();

            function resizeCalendar() {
                calendar.updateSize();
            }

            window.addEventListener('resize', resizeCalendar);
        });



        $(document).ready(function(){
            <?php if(session()->getFlashdata('status')){?>
                Swal.fire({
                    icon: '<?= session()->getFlashdata('status_icon')?>',
                    title: '<?= session()->getFlashdata('status')?>',
                    showCancelButton: false,
                    confirmButtonText: 'Okay',
                    reverseButtons: true,
                    customClass: {
                        title: 'your-custom-class' // Specify your custom class here
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Place your code to handle confirmation here
                        // For example, you can perform an action or redirect
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        // Handle the cancel action here if needed
                    }
                });
            <?php }?>
        });

    </script>
</body>

</html>