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
  <link rel="stylesheet" href="<?= base_url('public/assets/bundles/datatables/datatables.min.cs') ?>s">
  <link rel="stylesheet" href="<?= base_url('public/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.cs') ?>s">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('public/assets/css/style.cs') ?>s">
  <link rel="stylesheet" href="<?= base_url('public/assets/css/components.cs') ?>s">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?= base_url('public/assets/css/custom.c') ?>ss">
  <link rel='shortcut icon' type='image/x-icon' href="<?= base_url('public/assets/img/bituinlogo.png') ?>" />

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
      max-width: 330px !important; /* Adjust the width as needed */
      max-height: 300px !important;
  }
  .swal2-icon {
    font-size: 10px; /* Change the size to your desired value */
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
        $totalNotifications = (empty($newOrders) ? 0 : 1) + (empty($newcomment) ? 0 : 1) 
        + (empty($newBooking) ? 0 : 1) + (empty($toshipOrders) ? 0 : 1) + (empty($onthewayOrders) ? 0 : 1);
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
                <?php if (!empty($toshipOrders)): ?>
                    <li class="dropdown-item">
                        <a href="<?php echo base_url('topay_orders'); ?>" class="media-body text-decoration-none text-dark">
                            <div class="media-title"><b>A order is ready to ship, deliver it now!</b></div>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (!empty($onthewayOrders)): ?>
                    <li class="dropdown-item">
                        <a href="<?php echo base_url('todeliver_orders'); ?>" class="media-body text-decoration-none text-dark">
                            <div class="media-title"><b>This order is delivered? Mark it as delivered!</b></div>
                        </a>
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
              </a> <a href="<?= base_url('employeelist') ?>" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                Employees
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

            
            <li class="dropdown active">
              <a href="<?= base_url('productlist') ?>" class="menu-toggle nav-link has-dropdown"><i data-feather="codepen"></i><span>Products</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="<?= base_url('categorylist') ?>">Product Category</a></li>
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

           

           

            <li class="dropdown">
            <a href="<?= base_url('pos_view') ?>" class="menu-toggle nav-link has-dropdown"><i data-feather="clipboard"></i><span>POS</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="<?= base_url('pos_view') ?>">POS Products</a></li>
              <li><a class="nav-link" href="<?= base_url('pos_custom') ?>">POS Customize</a></li>
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
        <div class="col-12">
          <div class="card">
            <div class="card-header">
            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addProductModal" style="margin-right: 10px;">+ Add Product</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                  <thead>
                    <tr>
                      <th>Category Name</th>
                      <th>Product Name</th>
                      <th>Price</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($product as $row) : ?>
                      <tr>
                        <td><?php echo $row['cat_name']; ?></td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><?php echo $row['product_price']; ?></td>
                        <td><img src="<?= base_url("public/public/products/".$row['product_image']); ?>" height="100px" width="100px" alt="image"></td>
                        <td style="width:12%">
                          <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal-<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>">Edit</button>
                          <a href="<?= site_url('product_delete_'.$row['id']) ?>" class="btn btn-danger btn-sm delete" onclick="confirmDelete(event)">Delete</a>
                        </td>
                      </tr>


                      <!-- EDIT CATEGORY MODAL -->
                      <div class="modal fade" id="editModal-<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true" data-backdrop="false">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="editModalLabel-<?php echo $row['id']; ?>">Edit Details</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form id="editProductForm-<?php echo $row['id']; ?>" action="<?= site_url('product_update_' . $row['id']) ?>" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <div class="row">
                                  <div class="col-4">
                                      <img src="<?= base_url("public/products/".$row['product_image']); ?>" height="350px" width="250px" alt="image">
                                    </div>
                                  <div class="col-8">
                                    <?= csrf_field(); ?>
                                    <label>Category</label>
                                    <div class="input-group mb-1">
                                      <select class="custom-select" id="cat_names-<?php echo $row['id']; ?>" onchange="updateCategoryFields('<?php echo $row['id']; ?>')" required>
                                      <option value="" disabled selected>Select Category</option>
                                        <?php foreach($category as $cat_row) { ?>
                                          <option value="<?= $cat_row['id']; ?>"><?= $cat_row['cat_name']; ?></option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group mb-2">
                                          <label>Product Name</label>
                                          <input type="hidden" name="category_names" value="<?php echo $row['cat_name']; ?>" id="category_names-<?php echo $row['id']; ?>" class="form-control">
                                          <input type="hidden" name="cat_id" value="<?php echo $row['category_id']; ?>" id="cat_id-<?php echo $row['id']; ?>" class="form-control">
                                          <input type="text"  class="form-control" placeholder="Enter product name" value="<?php echo $row['product_name']; ?>" aria-label="Enter product name" readonly>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group mb-2">
                                          <label>Price</label>
                                          <input type="text" name="product_price" class="form-control" placeholder="Enter price" value="<?php echo $row['product_price']; ?>" aria-label="Enter price">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group mb-2">
                                          <label>Availability</label>
                                          <select class="custom-select" name="availability">
                                            <option>Available</option>
                                            <option>Not available</option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group mb-2">
                                          <label>Image</label>
                                          <input type="file" name="product_image" class="form-control">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-group mb-2">
                                      <label>Description</label>
                                      <textarea name="product_des" class="form-control" placeholder="Enter description" aria-label="Enter description" rows="3"><?php echo $row['product_des']; ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                      <hr>
                                      <button type="button" class="btn btn-primary px-4 float-right" onclick="showConfirmation(<?php echo $row['id']; ?>)">Submit</button>
                                    </div>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

 <!-- Add CATEGORY MODAL -->


<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('addproduct') ?>" method="POST" enctype="multipart/form-data" id="addproductform">
          <?= csrf_field(); ?>
          <div class="row">
            <div class="input-group mb-3 col-md-12">
              <select class="custom-select"  id="cat_name" id="inputGroupSelect01"required>
              <option value="" disabled selected>Select Category</option>
                <?php foreach($category as $row) { ?>
                  <option value="<?= $row['id']; ?>"><?= $row['cat_name']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-2">
                <label>Product Name</label>
                <input type="hidden" name="category_name"  class="form-control">
                <input type="hidden" name="category_id"  class="form-control">
                <input type="text" class="form-control" placeholder="BFS #" aria-label="Enter product name" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-2">
                <label>Price</label>
                <input type="text" name="product_price" class="form-control" placeholder="Enter price" aria-label="Enter price" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-2">
                <input type="hidden" name="product_qty" value="1" class="form-control" placeholder="Enter price" aria-label="Enter price">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-2">
                <label>Availability</label>
                <select class="custom-select" name="availability" required>
                  <option>Available</option>
                  <option>Not available</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-2">
                <label>Image</label>
                <input type="file" name="product_image" class="form-control" required>
              </div>
            </div>
          </div>
          <div class="form-group mb-2">
            <label>Description</label>
            <textarea name="product_des" class="form-control" placeholder="Enter description" aria-label="Enter description" rows="3" required></textarea>
          </div>
          <div class="col-md-12">
            <hr>
            <button type="submit" class="btn btn-primary px-4 float-right">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
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
  <script src="<?= base_url('public/assets/js/scripts.js') ?>"></script>
  <!-- Custom JS File -->
  <script src="<?= base_url('public/assets/js/custom.js') ?>"></script>
  <script src="<?= base_url() ?>/public/sweetalert/dist/sweetalert2.all.min.js"></script>

<!-- Page specific script -->
<script>
  function updateCategoryFields(rowId) {
    var selectElement = document.getElementById('cat_names-' + rowId);
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var categoryNameInput = document.getElementById('category_names-' + rowId);
    var categoryIdInput = document.getElementById('cat_id-' + rowId);
    
    categoryNameInput.value = selectedOption.text;
    categoryIdInput.value = selectedOption.value;
  }
  $(document).ready(function() {
      $('#cat_name').change(function() {
        var selectedCategoryName = $('#cat_name option:selected').text();
        var selectedCategoryId = $(this).val();

        $('input[name="category_name"]').val(selectedCategoryName);
        $('input[name="category_id"]').val(selectedCategoryId);
      });
    });

function showSweetAlert() {
    Swal.fire({
      title: 'Are you sure?',
      text: "You want to add this product?",
      showCancelButton: true,
      confirmButtonColor: '#28a745',
      cancelButtonColor: '#d33',
      icon: 'question',
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('addproductform').submit();
      }
    });
  }
  document.getElementById('addproductform').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission
    showSweetAlert(); // Show Sweet Alert confirmation dialog
  });

  function showConfirmation(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: 'You are about update this product?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#28a745',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('editProductForm-' + id).submit();
      }
    });
  }


//SWEET ALERT FOR DELETING A PRODUCT
function confirmDelete(event) {
  event.preventDefault(); 
  
  Swal.fire({
    title: 'Are you sure?',
    text: 'You are about to delete a product. This cannot be undone!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#28a745',  // Green color for the "Yes" button
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes',
    cancelButtonText: 'No'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = event.target.href;
    }
  });
}



  //FOR SUBMITTING THE FORM IN MODAL
  $(document).ready(function() {
        $('button[data-toggle="modal"]').click(function() {
            var targetModalId = $(this).data('target'); // Get the target modal ID
            var categoryId = $(this).data('id'); // Extract category ID from data-id attribute
            $(targetModalId).find('form').attr('action', 'product_update_' + categoryId); // Update form action URL
        });
    });
    $('.modal').on('hidden.bs.modal', function () {
    $('.modal-backdrop').remove();
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


<!-- datatables.html  21 Nov 2019 03:55:25 GMT -->
</html>