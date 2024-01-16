<?php
use App\Models\Cart_model;
$data = session()->get();
$Cart_model = new Cart_model();
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
s1.src='https://embed.tawk.to/6458bc40ad80445890ebb0d7/1gvt9uocu';
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
                                    <li><a href="<?= base_url('/') ?>">Home</a></li>
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
                                            <i class="lni lni-user"></i>
                                            <span><?= $data['firstname']?>.<?= $data['lastname']?></span>
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
       
        <!-- End Topbar -->
        <!-- Start Header Middle -->
        <div class="header-middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-7">
                        <!-- Start Header Logo -->
                        <a class="navbar-brand" href="<?= base_url('/') ?>">
                           <img src="<?=base_url()?>/public/client_ui/images/website_logo/bituins_logo.png" alt="Logo">
                        </a>
                        <!-- End Header Logo -->
                    </div>
                    <div class="col-lg-5 col-md-7 d-xs-none">
                        <!-- Start Main Menu Search -->
                        <div class="main-menu-search">
                            <!-- navbar search start -->
                           
                            <!-- navbar search Ends -->
                        </div>
                        <!-- End Main Menu Search -->
                    </div>
                    <div class="col-lg-4 col-md-2 col-5">
                        <div class="middle-right-area">
                            <div class="nav-hotline">
                                
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
                                        <a href="<?= base_url('signin') ?>" class="active" aria-label="Toggle navigation">Home</a>
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
                                        <a href="<?=base_url('signin')?>" aria-label="Toggle navigation">Customize</a>
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

    
    <!-- Start Hero Area -->
    <section class="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 custom-padding-right">
                    <div class="slider-head">
                        <!-- Start Hero Slider -->
                        <div class="hero-slider">
                            <!-- Start Single Slider -->
                            <div class="single-slider"
                                style="background-image: url(/public/client_ui/images/hero/slide4.jpg);">
                                <div class="content">
                                    <h2><span>Online Shop for Flowers</span>
                                        Go and grab your products to cart now!
                                    </h2>
                                    <p>We arrange the flowers and the smiles. Whatever the occasion, our flowers will make it special</p>
                                    <h3><span>Quality assurance products</span></h3>
                                    <?php if(@$data['isLoggedIn']) { ?>
                                    <div class="button">
                                        <a href="<?=base_url('product_grids')?>" class="btn">Shop Now</a>
                                    </div>
                                    <?php }else { ?>
                                    <div class="button">
                                        <a href="<?=base_url('signin')?>" class="btn">Shop Now</a>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- End Single Slider -->
                            <!-- Start Single Slider -->
                            <div class="single-slider"
                                style="background-image: url(/public/client_ui/images/hero/slide3.jpg);">
                                <div class="content">
                                    <h2><span>Schedule your date</span>
                                        Book for an Event desired
                                    </h2>
                                    <p>Very simply, an event reservation system is a webiste suite designed to help you schedule, manage, and run events.</p>
                                    <h3><span>Affordable services</span></h3>
                                    <?php if(@$data['isLoggedIn']) { ?>
                                    <div class="button">
                                        <a href="<?=base_url('book_now')?>" class="btn">Book Now</a>
                                    </div>
                                    <?php }else { ?>
                                    <div class="button">
                                        <a href="<?=base_url('signin')?>" class="btn">Book Now</a>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- End Single Slider -->
                        </div>
                        <!-- End Hero Slider -->
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-12 md-custom-padding">
                            <!-- Start Small Banner -->
                            <div class="hero-small-banner"
                                style="background-image: url(/public/client_ui/images/hero/slide5.jpeg);">
                                <div class="content">
                                    <h2 style="background: rgba(98, 93, 93, 0.3); color: #fff; padding: 10px;">
                                        Offer a good services that makes our customer a satisfied experience of their expected wedding.
                                    </h2>
                                </div>
                            </div>
                            <!-- End Small Banner -->
                        </div>
                        <div class="col-lg-12 col-md-6 col-12">
                            <!-- Start Small Banner -->
                            <div class="hero-small-banner style2">
                                <div class="content">
                                    <h2>Weekly Sale!</h2>
                                    <p>Saving up to 10% of the products available</p>
                                    <div class="button">
                                        <a class="btn" href="product-grids.html">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Start Small Banner -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Area -->
    


    <!-- Start Shipping Info -->
    <section class="shipping-info">
        <div class="container">
            <ul>
                <li>
                    <div class="media-icon">
                        <i class="lni lni-calendar"></i>
                    </div>
                    <div class="media-body">
                        <h5>Book Event</h5>
                        <span>Scheduled your date</span>
                    </div>
                </li>
                <li>
                    <div class="media-icon">
                        <i class="lni lni-wallet"></i>
                    </div>
                    <div class="media-body">
                        <h5>Good Pricing.</h5>
                        <span>Affordable Product & Services</span>
                    </div>
                </li>
                <li>
                    <div class="media-icon">
                        <i class="lni lni-credit-cards"></i>
                    </div>
                    <div class="media-body">
                        <h5>Online Payment.</h5>
                        <span>Secure Payment Services.</span>
                    </div>
                </li>
                <li>
                    <div class="media-icon">
                        <i class="lni lni-delivery"></i>
                    </div>
                    <div class="media-body">
                        <h5>Fast Shipping</h5>
                        <span>On time Delivery</span>
                    </div>
                </li>
                
                
                
            </ul>
        </div>
    </section>
    <!-- End Shipping Info -->

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
                                    <li><span>Monday-Friday: </span> 7.00 am - 6.00 pm</li>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script type="text/javascript">

        //========= Hero Slider 
        tns({
            container: '.hero-slider',
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 0,
            items: 1,
            nav: false,
            controls: true,
            controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
        });

        // //======== Brand Slider
        // tns({
        //     container: '.brands-logo-carousel',
        //     autoplay: true,
        //     autoplayButtonOutput: false,
        //     mouseDrag: true,
        //     gutter: 15,
        //     nav: false,
        //     controls: false,
        //     responsive: {
        //         0: {
        //             items: 1,
        //         },
        //         540: {
        //             items: 3,
        //         },
        //         768: {
        //             items: 5,
        //         },
        //         992: {
        //             items: 6,
        //         }
        //     }
        // });


          //======== Sweet Alert
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