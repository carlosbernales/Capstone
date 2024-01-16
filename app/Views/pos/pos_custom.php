<?php
$admin_data = session()->get();
?>
<!DOCTYPE html>
<html lang="en">


<!-- datatables.html  21 Nov 2019 03:55:21 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Bituin</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url('public/assets/css/app.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('public/assets/bundles/datatables/datatables.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('public/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') ?>">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('public/assets/css/style.css') ?>">
  <link rel="stylesheet" href="<?= base_url('public/assets/css/components.css') ?>">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?= base_url('public/assets/css/custom.css') ?>">
  <link rel='shortcut icon' type='image/x-icon' href="<?= base_url('public/assets/img/bituinlogo.png') ?>"' />

  <style>
        #receipt h2,
        #receipt #receipt-list {
            display: none;
        }

        @media print {
            #search-input,
            #repeater,
            button[type="submit"],
            #print-button {
                display: none !important;
            }

            #receipt h2,
            #receipt #receipt-list,
            #receipt-total,
            #amount-paid,
            #change {
                display: block !important;
            }
           }
          .repeater-row.border {
            border: 10px solid #000;
            padding: 7px; /* Add more spacing to all corners */
          }
          .input-container input {
            width: 200px; /* Adjust the width as needed */
            height: 30px; /* Adjust the height as needed */
            margin-bottom: 10px;
          }
          #receipt-total {
            font-size: larger;
            font-weight: bold;
          }
          .swal2-modal {
              max-width: 330px !important; /* Adjust the width as needed */
              max-height: 300px !important;
          }
          .swal2-icon {
            font-size: 10px; /* Change the size to your desired value */
          }

          .card-img-top {
            transition: transform 0.3s ease; /* Add a smooth transition effect */
          }

          .card-img-top.clicked {
            transform: scale(1.1); /* Increase the size of the image */
          }

    </style>
</head>

<body>
<div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
              <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          

  <li class="dropdown dropdown-list-toggle">
    <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg">
        <i data-feather="bell"></i>
        <?php
        $totalNotifications = (empty($newOrders) ? 0 : 1) + (empty($newcomment) ? 0 : 1) + (empty($newBooking) ? 0 : 1);
        if ($totalNotifications > 0):
        ?>
            <span class="badge badge-primary" id="notificationCount">
                <?php echo $totalNotifications; ?>
            </span>
        <?php endif; ?>
    </a>
    <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
        <div class="dropdown-header ">
            Notifications
            <div class="float-right">
            </div>
        </div>
        <?php if ($totalNotifications > 0): ?>
            <ul class="list-unstyled">
                <?php if (!empty($newOrders)): ?>
                    <li class="dropdown-item">
                        <a href="<?php echo base_url('pendingorders'); ?>" class="media-body text-decoration-none text-dark">
                            <div class="media-title"><b>New Order! Accept it now!</b></div>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (!empty($newcomment)): ?>
                    <li class="dropdown-item">
                        <div class="media-body">
                        <a href="<?php echo base_url('reviews'); ?>" class="media-body text-decoration-none text-dark">
                            <div class="media-title" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><b>New Review! Your response is needed for <br> buyer's reference!</b></div>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if (!empty($newBooking)): ?>
                    <li class="dropdown-item">
                        <div class="media-body">
                        <a href="<?php echo base_url('reservationlist'); ?>" class="media-body text-decoration-none text-dark">
                            <div class="media-title" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><b>New Booking! Accept it now!</b></div>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        <?php else: ?>
            <p class="dropdown-item">No new notifications.</p>
        <?php endif; ?>
    </div>
</li>
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="<?= base_url('public/assets/img/user.png') ?>"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
            <div class="dropdown-title">Hello <?= $user_info['firstname'] ?></div>
              <a href="<?= base_url('admin_profile') ?>" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              </a> <a href="<?= base_url('admins') ?>" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                Admins
              </a> 
              <div class="dropdown-divider"></div> 
              <a href="<?= base_url('admin_logout') ?>" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a> <img alt="image" src="<?= base_url('public/assets/img/bituinlogo.png') ?>" class="header-logo" /> <span
                class="logo-name">Bituin</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown ">
              <a href="<?= base_url('dashboard') ?>" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>

            <li class="dropdown">
              <a href="<?= base_url('reservationlist') ?>" class="menu-toggle nav-link has-dropdown"><i data-feather="book-open"></i><span>Reservation</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="<?= base_url('reservationlist') ?>">Reservations</a></li>
                <li><a class="nav-link" href="<?= base_url('reservation_report') ?>">Reservation Report</a></li>
                <li><a class="nav-link" href="<?= base_url('payment_list') ?>">Payments</a></li>
              </ul>
            </li>

            
           <li class="dropdown">
              <a href="<?= base_url('productlist') ?>" class="menu-toggle nav-link has-dropdown"><i data-feather="codepen"></i><span>Products</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="<?= base_url('categorylist') ?>">Product Category</a></li>
                <li><a class="nav-link" href="<?= base_url('productlist') ?>">Products</a></li>
              </ul>
            </li>
            
            <li class="dropdown">
              <a href="<?= base_url('orderlist') ?>" class="menu-toggle nav-link has-dropdown"><i data-feather="shopping-bag"></i><span>Orders</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="<?= base_url('orderlist') ?>">All Orders</a></li>
                <li><a class="nav-link" href="<?= base_url('pendingorders') ?>">Pending</a></li>
                <li><a class="nav-link" href="<?= base_url('topay_orders') ?>">Accepted</a></li>
                <li><a class="nav-link" href="<?= base_url('todeliver_orders') ?>">To Ship</a></li>
                <li><a class="nav-link" href="<?= base_url('pickup_orders') ?>">Pick Up</a></li>
                <li><a class="nav-link" href="<?= base_url('reviews') ?>">Order Reviews</a></li>
              </ul>
            </li>


            <li class="dropdown">
              <a href="<?= base_url('stocks') ?>" class="menu-toggle nav-link has-dropdown"><i data-feather="archive"></i><span>Stocks</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="<?= base_url('stocks') ?>">Stocks</a></li>
                <li><a class="nav-link" href="<?= base_url('stocks_category') ?>">Stocks Category</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="<?= base_url('sales') ?>" class="nav-link"><i data-feather="dollar-sign"></i><span>Sales</span></a>
            </li>

            <li class="dropdown active">
            <a href="<?= base_url('pos_view') ?>" class="menu-toggle nav-link has-dropdown"><i data-feather="clipboard"></i><span>POS</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="<?= base_url('pos_view') ?>">POS Products</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="<?= base_url('orderlist') ?>" class="menu-toggle nav-link has-dropdown"><i data-feather="shopping-bag"></i><span>Address</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="<?= base_url('citylist') ?>">City</a></li>
              <li><a class="nav-link" href="<?= base_url('brgylist') ?>">Barangay</a></li>
              </ul>
              
            </li>
          </ul>
        </aside>
      </div>
















































<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <select class="form-control select2" id="category-select" name="category-select" style="width: 200px; height: 40px;" required>
                <option value="" selected disabled>Select Category</option>
                <option value="">All Category</option>
                <?php foreach ($stocks_category as $cat) : ?>
                  <option value="<?php echo $cat['id']; ?>"><?php echo $cat['category_name']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div id="product-scroll-container" style="max-height: 650px; overflow-y: auto;">
              <div id="product-container" class="row">
                <!-- Products will be displayed here -->
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <form action="<?php echo site_url('submit-custom'); ?>" method="post" id="my-form">
                  <datalist id="product-list">
                    <?php foreach ($stocks as $productName) : ?>
                      <?php if ($productName['stock_category_id'] == '<stock_category_id>') : ?>
                        <option value="<?php echo $productName['product_name']?>" 
                                data-category="<?php echo $productName['stock_category_id']; ?>" 
                                data-price="<?php echo $productName['stock_price']; ?>" 
                                data-image="<?php echo $productName['image']; ?>" 
                                data-name="<?php echo $productName['product_name']; ?>" 
                                data-color="<?php echo $productName['color']; ?>" 
                                data-id="<?php echo $productName['id']; ?>"></option>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </datalist>
                  <div id="repeater" class="form-group mb-2">
                  <!-- Rows will be added dynamically here -->
                  </div>
                  <label for=""><strong>Customer Details</strong></label>
                  <div>
                      <label for="firstname">Firstname:</label>
                      <input class="form-control-sm" type="text" id="firstname" name="firstname">
                    </div>
                    <div>
                      <label for="lastname">Lastname:</label>
                      <input class="form-control-sm" type="text" id="lastname" name="lastname">
                    </div>
                    <div>
                      <label for="contact">Contact #:</label>
                      <input class="form-control-sm" type="number" id="contact" name="contact">
                    </div>
                  <div class="input-container" style="text-align: right;">
                    <div id="receipt-total" class="my-2">Total: 0.00</div>
                      <input type="hidden" name="receipt-total" id="receipt-total-input" value="0.00">
                      <label for="labor">Additional Fee:</label>
                      <input class="form-control-sm" type="number" id="labor" name="labor" required>
                    <div>
                    <div class="input-container" style="text-align: right;">
                      <label for="amount-paid">Amount Paid:</label>
                      <input class="form-control-sm" type="number" id="amount-paid" name="amount-paid" required>
                    <div>
                    <label for="change">Change:</label>
                    <input class="form-control-sm" type="number" id="change" name="change" readonly>
                    </div>
                    <button type="button" class="btn btn-primary" style="width: 150px;" onclick="showConfirmation()">Proceed</button>
                  </div>
                </form>
                <div id="receipt">
                  <h2>Receipt</h2>
                  <ul id="receipt-list"></ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>


































        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
        <strong>Copyright &copy; 2021-2023 <a href="http://adminlte.io">Bituin Flowers</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <!-- <b>Version</b> 3.0.2 -->
    </div>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>





  
  <!-- General JS Scripts -->
  <script src="<?= base_url('public/assets/js/app.min.js') ?>"></script>
  <!-- JS Libraies -->
  <script src="<?= base_url('public/assets/bundles/datatables/datatables.min.js') ?>"></script>
  <script src="<?= base_url('public/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') ?>"></script>
  <script src="<?= base_url('public/assets/bundles/jquery-ui/jquery-ui.min.js') ?>"></script>
  <!-- Page Specific JS File -->
  <script src="<?= base_url('public/assets/js/page/datatables.js') ?>"></script>
  <!-- Template JS File -->
  <script src="<?= base_url('public/assets/js/scripts.j') ?>s"></script>
  <!-- Custom JS File -->
  <script src="<?= base_url('public/assets/js/custom.js') ?>"></script>

  <script src="<?= base_url() ?>/public/sweetalert/dist/sweetalert2.all.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
  var categorySelect = document.getElementById('category-select');
  var productContainer = document.getElementById('product-container');
  var products = <?php echo json_encode($stocks); ?>;

  // Function to display products based on the selected category
  function displayProducts(selectedCategoryId) {
    // Clear the product container
    productContainer.innerHTML = '';

    products.forEach(function(product) {
        if (selectedCategoryId === '' || product.category_id == selectedCategoryId) {
            // Create a product card for each product
            var productCard = document.createElement('div');
            productCard.classList.add('col-md-3', 'mb-2', 'px-4'); // Adjust the classes as needed

            // Modify the cardContent template to make the product image clickable
            var cardContent = `
                <div class="card">
                    <img src="public/public/stocks/${product.image}" class="card-img-top p-2 rounded product-image" width="100" height="200" alt="Product Image" data-product='${JSON.stringify(product)}'>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h6 class="card-title">${product.product_name}</h6>
                        </div>
                        <p class="card-text">₱${product.stock_price}</p>
                    </div>
                </div>
            `;

            // Set the HTML content of the product card
            productCard.innerHTML = cardContent;

            // Add event listener to the product image for click effect
            var productImage = productCard.querySelector('.card-img-top');
            productImage.addEventListener('click', function() {
                productImage.classList.add('clicked');

                // Remove the 'clicked' class after the transition ends
                productImage.addEventListener('transitionend', function() {
                    productImage.classList.remove('clicked');
                });
            });

            // Append the product card to the product container
            productContainer.appendChild(productCard);
        }
    });
}

// Call the function to display all products initially
displayProducts('');

// Add an event listener for the category select element
categorySelect.addEventListener('change', function() {
    var selectedCategoryId = this.value;

    // Call the function to display products based on the selected category
    displayProducts(selectedCategoryId);

    // Handle category selection here, if needed
    // You can further customize the behavior when a category is selected
});
});

function showConfirmation() {
  var rows = document.querySelectorAll('.repeater-row');
  if (rows.length === 0) {
    Swal.fire({
      title: 'Error',
      confirmButtonColor: '#28a745',
      text: 'Please choose a product',
      icon: 'error'
    });
    return;
  }

  var laborInput = document.getElementById('labor').value;
    if (laborInput.trim() === '') {
      Swal.fire({
        title: 'Error',
        confirmButtonColor: '#28a745',
        text: 'Please add your labor price',
        icon: 'error'
      });
      return;
    }
  var isEmpty = false;
  rows.forEach(function (row) {
    var newInput = row.querySelector('input[name="new_input[]"]');
    if (newInput.value === '') {
      isEmpty = true;
    }
  });

  if (isEmpty) {
    Swal.fire({
      title: 'Error',
      confirmButtonColor: '#28a745',
      text: 'Have an empty quantity!',
      icon: 'error'
    });
    return;
  }
  var amountPaidInput = document.getElementById('amount-paid');
  var amountPaid = parseFloat(amountPaidInput.value);
  var receiptTotal = parseFloat(document.getElementById('receipt-total').textContent.replace('Total: ', ''));

  if (amountPaid <= 0 || isNaN(amountPaid) || amountPaid < receiptTotal) {
    Swal.fire({
      title: 'Error',
      confirmButtonColor: '#28a745',
      text: 'Make sure to input correct amount!',
      icon: 'error'
    });
    return;
  }

  Swal.fire({
    title: 'Are you sure?',
    text: 'You want to proceed to payment?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#28a745',  // Green color for the "Yes" button
    cancelButtonColor: '#d33',
    confirmButtonText: 'Proceed!'
  }).then((result) => {
    if (result.isConfirmed) {
      document.getElementById('my-form').submit();
    }
  });
}

// Add event listener to the "Add" button
document.addEventListener('click', function (event) {
  if (event.target.classList.contains('product-image')) {
    var productData = JSON.parse(event.target.getAttribute('data-product'));
    var productId = productData.id;

    // Check if the product with this ID is already in the repeater
    var existingRow = document.querySelector('.repeater-row input[name="stock_category_id[]"][value="' + productId + '"]');
    if (existingRow) {
      // Product already exists, update the quantity
      var newInput = existingRow.closest('.repeater-row').querySelector('input[name="new_input[]"]');
      var currentQuantity = parseInt(newInput.value) || 0;
      newInput.value = currentQuantity + 1;
      updateTotalInput(newInput);
    } else {
      // Product doesn't exist, add a new row
      var repeater = document.getElementById('repeater');
      var row = document.createElement('div');
      row.classList.add('repeater-row', 'border', 'd-flex', 'align-items-center'); // Add border and flex classes

      // Append the product image to the row
      var imageClone = event.target.cloneNode(true);
      imageClone.classList.remove('product-image'); // Remove the product-image class to prevent recursion
      row.appendChild(imageClone);

      var productImage = productData.image;

var productName = productData.product_name;
var productPrice = productData.stock_price;
var productColor = productData.color;
var productId = productData.id;

    // Create a new row and populate it with the selected product data
    var repeater = document.getElementById('repeater');
    var row = document.createElement('div');
    row.classList.add('repeater-row', 'border', 'd-flex', 'align-items-center'); // Add border and flex classes
    var removeBtnContainer = document.createElement('div');
    removeBtnContainer.classList.add('remove-btn-container', 'd-flex', 'align-items-center'); // Add flex classes

    var imageInput = document.createElement('img');
    imageInput.setAttribute('src', 'public/public/stocks/' + productImage);
    imageInput.setAttribute('height', '50px');
    imageInput.setAttribute('width', '100px');
    imageInput.setAttribute('alt', 'image');
    imageInput.classList.add('image', 'col-md-2');

    var nameInput = document.createElement('input');
    nameInput.setAttribute('type', 'text');
    nameInput.setAttribute('name', 'name[]');
    nameInput.classList.add('input', 'form-control', 'col-md-3');
    nameInput.setAttribute('placeholder', 'Name');
    nameInput.value = productName;
    nameInput.readOnly = true;

    var productIdInput = document.createElement('input');
    productIdInput.setAttribute('type', 'number');
    productIdInput.setAttribute('name', 'stock_category_id[]');
    productIdInput.setAttribute('placeholder', 'Product ID');
    productIdInput.value = productId;
    productIdInput.type = 'hidden';
    productIdInput.readOnly = true;

    var priceInput = document.createElement('input');
    priceInput.setAttribute('type', 'text');
    priceInput.setAttribute('name', 'price[]');
    priceInput.classList.add('input', 'form-control', 'col-md-1', 'ml-1');
    priceInput.value = productPrice;
    priceInput.readOnly = true;

    var colorInput = document.createElement('input');
    colorInput.setAttribute('type', 'text');
    colorInput.setAttribute('name', 'color[]');
    colorInput.classList.add('input', 'form-control', 'col-md-2', 'ml-1');
    colorInput.value = productColor;
    colorInput.readOnly = true;

    var newInput = document.createElement('input');
    newInput.setAttribute('type', 'number');
    newInput.setAttribute('name', 'new_input[]');
    newInput.setAttribute('value', '1'); // Set the default value to 1
    newInput.classList.add('input', 'form-control', 'col-md-2', 'ml-1');

    var totalInput = document.createElement('input');
    totalInput.setAttribute('type', 'number');
    totalInput.setAttribute('name', 'total_input[]');
    totalInput.classList.add('input', 'form-control', 'col-md-3', 'ml-1');
    totalInput.setAttribute('placeholder', 'Total');
    totalInput.value = productPrice; // Set the default value to productPrice
    totalInput.readOnly = true;

    var removeBtn = document.createElement('button');
    removeBtn.setAttribute('type', 'button');
    removeBtn.classList.add('btn', 'btn-danger', 'form-control', 'col-md-1', 'ml-1'); // Add 'btn' and 'btn-danger' classes
    removeBtn.textContent = 'x';


    newInput.addEventListener('input', function () {
        updateTotalInput(this);
        calculateSum();
        displayReceipt();
      });

    removeBtn.addEventListener('click', function () {
      row.parentNode.removeChild(row);
      updateRemoveButtonVisibility();
      calculateSum();
      displayReceipt();
    });

    removeBtnContainer.appendChild(imageInput);
    removeBtnContainer.appendChild(nameInput);
    removeBtnContainer.appendChild(priceInput);
    removeBtnContainer.appendChild(colorInput);
    removeBtnContainer.appendChild(newInput);
    removeBtnContainer.appendChild(totalInput);
    removeBtnContainer.appendChild(removeBtn);

    row.appendChild(removeBtnContainer);
    row.appendChild(removeBtn);
    row.appendChild(productIdInput);

    repeater.appendChild(row);
  }
    updateRemoveButtonVisibility();
    calculateSum();
    displayReceipt();
  }
});

function updateRemoveButtonVisibility() {
  var rows = document.querySelectorAll('.repeater-row');
  var removeButtons = document.querySelectorAll('.btn.btn-success'); // Select buttons with 'btn' and 'btn-success' classes
  removeButtons.forEach(function (button) {
    button.style.display = 'block';
  });
}

function updateTotalInput(inputElement) {
  var quantity = parseInt(inputElement.value) || 0;
  var price = parseFloat(inputElement.closest('.repeater-row').querySelector('input[name="price[]"]').value) || 0;
  var totalInput = inputElement.closest('.repeater-row').querySelector('input[name="total_input[]"]');
  var total = isNaN(quantity) ? 0 : quantity * price;
  totalInput.value = total.toFixed(2); // Display the total with 2 decimal places
}

function calculateSum() {
  var totalInputs = document.querySelectorAll('input[name="total_input[]"]');
  var laborInput = document.getElementById('labor');
  var sum = 0;

  totalInputs.forEach(function (input) {
    var totalValue = parseFloat(input.value);
    if (!isNaN(totalValue)) {
      sum += totalValue;
    }
  });

  var laborCost = parseFloat(laborInput.value);
  if (!isNaN(laborCost)) {
    sum += laborCost;
  }

  // Update the receipt total and the hidden input value
  var receiptTotal = document.getElementById('receipt-total');
  receiptTotal.textContent = 'Total: ' + sum.toFixed(2);
  document.getElementById('receipt-total-input').value = sum.toFixed(2);

  updateChange();
  displayReceipt();
}

// Set up an event listener to trigger the calculation when input changes
var totalInputs = document.querySelectorAll('input[name="total_input[]"]');
totalInputs.forEach(function (input) {
  input.addEventListener('input', calculateSum);
});

var laborInput = document.getElementById('labor');
laborInput.addEventListener('input', calculateSum);



function displayReceipt() {
  var receiptList = document.getElementById('receipt-list');
  receiptList.innerHTML = '';

  // Create a header row for name, price, quantity, and total
  var header = document.createElement('li');
  header.innerHTML = '<strong>Name</strong> - <strong>Price</strong> - <strong>Quantity</strong> - <strong>Total</strong>';
  receiptList.appendChild(header);

  var rows = document.querySelectorAll('.repeater-row');
  rows.forEach(function (row) {
    var name = row.querySelector('input[name="name[]"]').value;
    var price = row.querySelector('input[name="price[]"]').value;
    var newInput = row.querySelector('input[name="new_input[]"]').value;
    var totalInput = row.querySelector('input[name="total_input[]"]').value;
    var productId = row.querySelector('input[name="stock_category_id[]"]').value;


    // Create a new row with name, price, quantity, and total
    var item = document.createElement('li');
    item.textContent = name + ' - ' + price + ' - ' + newInput + ' - ' + totalInput;
    receiptList.appendChild(item);
  });
}




function printReceipt() {
  var receiptDiv = document.getElementById('receipt');
  var printButton = document.getElementById('print-button');
  receiptDiv.style.display = 'none';
  printButton.style.display = 'none';
  var printWindow = window.open('', '_blank');
  printWindow.document.open();
  printWindow.document.write('<html><head><title>Receipt</title>');
  printWindow.document.write('<style>#receipt, #print-button { display: none; }</style>');
  printWindow.document.write('</head><body>');
  printWindow.document.write(receiptDiv.innerHTML);
  printWindow.document.write('</body></html>');
  printWindow.document.close();
  receiptDiv.style.display = 'block';
  printButton.style.display = 'block';

  printWindow.addEventListener('load', function () {
    printWindow.print();
  });
}

var amountPaidInput = document.getElementById('amount-paid');
var changeInput = document.getElementById('change');

amountPaidInput.addEventListener('input', updateChange);
function updateChange() {
  var amountPaidInput = document.getElementById('amount-paid');
  var changeInput = document.getElementById('change');
  var amountPaid = parseFloat(amountPaidInput.value);
  var total = parseFloat(document.getElementById('receipt-total').textContent.replace('Total: ', ''));

  if (!isNaN(amountPaid)) {
    var change = amountPaid - total;
    changeInput.value = change.toFixed(2);
  } else {
    changeInput.value = '';
  }
}





function printReceipt() {
  updateChange(); // Update the change value before printing
  window.print();
}


$(document).ready(function () {
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
      icon: '<?= session()->getFlashdata('status_icon') ?>',
      title: '<?= session()->getFlashdata('status') ?>'
    })
  <?php } ?>
});

</script>


</body>
</html>