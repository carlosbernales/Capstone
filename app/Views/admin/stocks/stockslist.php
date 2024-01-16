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
  <link rel="stylesheet" href="<?= base_url('public/assets/css/custom.cs') ?>s">
  <link rel='shortcut icon' type='image/x-icon' href="<?= base_url('public/assets/img/bituinlogo.png') ?>" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 
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
      max-height: 330px !important;
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

            <li class="dropdown active">
              <a href="<?= base_url('stocks') ?>" class="menu-toggle nav-link has-dropdown"><i data-feather="archive"></i><span>Stocks</span></a>
              <ul class="dropdown-menu">
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
                <table class="table table-striped table-hover" id="example" style="width:100%;">
                  <thead>
                    <tr>
                      <th>Category Name</th>
                      <th>Image</th>
                      <th>Product Name</th>
                      <th>Color</th>
                      <th>Price per Pcs/Yard</th>
                      <th>Pcs per Bundle</th>
                      <th>Bundle Price</th>
                      <th>Remaining Pcs</th>
                      <!-- <th>Pieces Price</th> -->
                      <th>Used (pcs)</th>
                      <th>Reject (pcs)</th>
                      <!-- <th>Price of Rejects</th>
                      <th>Price of Goods</th> -->
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($product_stocks as $row) : ?>
                      <tr>
                        <td><?php echo $row['category_name']; ?></td>
                        <td><img src="<?= base_url("public/public/stocks/".$row['image']); ?>" height="100px" width="100px" alt="image"></td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><?php echo $row['color']; ?></td>
                        <td><?php echo $row['stock_price']; ?></td>
                        <td><?php echo $row['fix_stock_qty']; ?></td>
                        <td>&#8369; <?php echo $row['bundle_price']; ?></td>
                        <td><?php echo $row['stock_qty']; ?></td>
                        <!-- <td>&#8369; <?php echo $row['stock_price']; ?></td> -->
                        <td><?php echo $row['goods']; ?></td>
                        <td><?php echo $row['reject']; ?></td>
                        <!-- <td>&#8369; <?php echo $row['rejectprice']; ?></td>
                        <td>&#8369; <?php echo $row['goodprice']; ?></td> -->
                        <td style="width:7%">
                          <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Action
                          </button>
                          <div class="dropdown-menu">
                            <div class="p-3">
                              <a class="dropdown-item btn btn-primary mb-1" style="color: white;" data-toggle="modal" data-target="#addstockModal-<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>">Add Stock</a>
                              <a class="dropdown-item btn btn-warning mb-1" style="color: white;"  data-toggle="modal" data-target="#minusStockModal-<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>">Add Used</a>
                              <a class="dropdown-item btn btn-danger" style="color: white;" data-toggle="modal" data-target="#rejectstockModal-<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>">Add Reject</a><hr>
                              <a class="dropdown-item btn btn-success mb-1" style="color: white;" data-toggle="modal" data-target="#editstocksModal-<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>">Edit</a>
                              <a class="dropdown-item btn btn-danger" style="color: white;" data-toggle="modal" href="<?= site_url('delete_stocks_'.$row['id']) ?>" onclick="confirmDelete(event)">Delete</a>
                            </div>
                            
                          </div>
                        </div>
                        </td>
                      </tr>


                      <!-- Edit Stocks MODAL-->
                      <div class="modal fade" id="editstocksModal-<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editstocksModalLabel" aria-hidden="true" data-backdrop="false">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="editstocksModalLabel-<?php echo $row['id']; ?>">Edit Product</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="<?= site_url('edit_stocks_' . $row['id']) ?>" method="POST" enctype="multipart/form-data" onsubmit="return editconfirmSubmit(event)">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <?= csrf_field(); ?>
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label>Product Name</label>
                                        <input type="text" name="product_name" class="form-control" value="<?php echo $row['product_name']; ?>">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Color</label>
                                        <input type="text" name="color" class="form-control" value="<?php echo $row['color']; ?>">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Image</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label>Pcs per Bundle/Yard</label>
                                        <input type="text" name="fix_stock_qty" value="<?php echo $row['fix_stock_qty']; ?>" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Price per Bundle/Yard</label>
                                        <input type="number" name="bundle_price" value="<?php echo $row['bundle_price']; ?>" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Price per Pcs</label>
                                        <input type="number" name="stock_price" value="<?php echo $row['stock_price']; ?>" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                                <hr>
                                <button type="submit" class="btn btn-primary px-4 float-right">Submit</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <!-- ADD STOCK MODAL-->
                      <div class="modal fade" id="addstockModal-<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="addstockModalLabel" aria-hidden="true" data-backdrop="false">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="addstockModalLabel-<?php echo $row['id']; ?>">Add Stocks</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="<?= site_url('add_update_' . $row['id']) ?>" method="POST" enctype="multipart/form-data" onsubmit="return confirmSubmit(event)">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <?= csrf_field(); ?>
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group mb-2">
                                      <label>Product Name</label>
                                      <input type="hidden" name="category_name"  class="form-control" value="<?php echo $row['category_name']; ?>" readonly>
                                      <input type="text" name="product_name"  class="form-control" value="<?php echo $row['product_name']; ?>" readonly>
                                    </div>
                                    <div class="form-group mb-2">
                                      <label>Add Stock (bundle/yard)</label>
                                      <input type="number" id="addstock-<?php echo $row['id']; ?>" class="form-control" oninput="calculateTotalPcs(<?php echo $row['id']; ?>)" required>
                                    </div>

                                    <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group mb-2">
                                              <label>Pieces per Bundle</label>
                                              <input type="number" value="<?php echo $row['fix_stock_qty']; ?>" class="form-control" readonly>
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group mb-2">
                                              <label>Bundle/Yard Price</label>
                                              <input type="number" id="bundle_price-<?php echo $row['id']; ?>" value="<?php echo $row['bundle_price']; ?>" class="form-control" readonly>
                                          </div>
                                      </div>
                                  </div>


                                    <div class="form-group mb-2">
                                      <label>Current Stocks (Pcs/Yard)</label>
                                      <input type="number" id="current-<?php echo $row['id']; ?>" value="<?php echo $row['stock_qty']; ?>" class="form-control" readonly>
                                    </div>

                                    <input type="hidden" name="goods" value="<?php echo $row['goods']; ?>" class="form-control">
                                    <input type="hidden" name="fix_stock_qty" id="fix_qty-<?php echo $row['id']; ?>" value="<?php echo $row['fix_stock_qty']; ?>" class="form-control">
                                    <input type="hidden" name="rejectprice" value="<?php echo $row['rejectprice']; ?>" class="form-control">
                                    <input type="hidden" name="stock_price" value="<?php echo $row['stock_price']; ?>" class="form-control">
                                    <input type="hidden" name="stock_qty" id="addtotalpcs-<?php echo $row['id']; ?>" class="form-control">
                                    <input type="hidden" name="reject" value="<?php echo $row['reject']; ?>" class="form-control">
                                    <input type="hidden" name="goodprice" value="<?php echo $row['goodprice']; ?>" class="form-control">


                                    <input type="hidden" id="investment-<?php echo $row['id']; ?>" value="<?php echo $row['investment']; ?>" class="form-control">
                                    <input type="hidden" name="investment" id="total_investment-<?php echo $row['id']; ?>" class="form-control">
                                  </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary px-4 float-right">Submit</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- REJECT STOCKS MODAL -->
                      <div class="modal fade" id="rejectstockModal-<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="rejectstockModalLabel" aria-hidden="true" data-backdrop="false">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="rejectstockModalLabel-<?php echo $row['id']; ?>">Add Reject Stocks</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="<?php echo site_url('reject_update_' . $row['id']); ?>" method="POST" enctype="multipart/form-data" onsubmit="validateRejectStock(event, <?php echo $row['id']; ?>)">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group mb-2">
                                      <label>Product Name</label>
                                      <input type="text" name="product_name" class="form-control" value="<?php echo $row['product_name']; ?>" readonly>
                                    </div>
                                    <div class="form-group mb-2">
                                      <label>Add Reject (Pcs/Yard)</label>
                                      <input type="number" id="addreject-<?php echo $row['id']; ?>" class="form-control" oninput="calculateRejectStock(<?php echo $row['id']; ?>)" required>
                                    </div>
                                    <div class="form-group mb-2">
                                      <label>Current Stock (Pcs/Yard)</label>
                                      <input type="number" id="thecurrentstocks-<?php echo $row['id']; ?>" value="<?php echo $row['stock_qty']; ?>" class="form-control" readonly>
                                    </div>
                                    <input type="hidden" id="curreject-<?php echo $row['id']; ?>" value="<?php echo $row['reject']; ?>" class="form-control">
                                    <input type="hidden" name="fix_stock_qty" id="fixstock_qty-<?php echo $row['id']; ?>" value="<?php echo $row['fix_stock_qty']; ?>" class="form-control">
                                    <input type="hidden" name="stock_price" id="priceperstock-<?php echo $row['id']; ?>"  value="<?php echo $row['stock_price']; ?>" class="form-control">
                                    <input type="hidden" name="rejectprice" value="<?php echo $row['rejectprice']; ?>" class="form-control">
                                    <input type="hidden" name="goods" value="<?php echo $row['goods']; ?>" class="form-control">
                                    <input type="hidden" name="goodprice" value="<?php echo $row['goodprice']; ?>" class="form-control">
                                    <input type="hidden" name="stock_qty" id="newtotalstocks-<?php echo $row['id']; ?>" class="form-control">
                                    <input type="hidden" name="reject" id="newtotalreject-<?php echo $row['id']; ?>" class="form-control">
                                    <input type="hidden" name="rejectprice" id="newtotalrejectprice-<?php echo $row['id']; ?>" class="form-control">
                                  </div>
                                </div>
                                <hr>
                                <!-- Inside the <form> tag -->
                                <button type="submit" class="btn btn-primary px-4 float-right" >Submit</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- MINUS STOCKS MODAL -->
                      <div class="modal fade" id="minusStockModal-<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="minusStockModalLabel" aria-hidden="true" data-backdrop="false">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="minusStockModalLabel-<?php echo $row['id']; ?>">Add Used Stocks</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="<?= site_url('minus_update_' . $row['id']) ?>" method="POST" enctype="multipart/form-data" onsubmit="validateReduceStock(event, <?php echo $row['id']; ?>)">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <?= csrf_field(); ?>
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group mb-2">
                                      <label>Product Name</label>
                                      <input type="text" name="product_name" class="form-control" value="<?php echo $row['product_name']; ?>" readonly>
                                    </div>
                                    <div class="form-group mb-2">
                                      <label>Add Used (Pcs/Yard)</label>
                                      <input type="number" id="reducepcs-<?php echo $row['id']; ?>" class="form-control" oninput="calculateReduceStock(<?php echo $row['id']; ?>)"required>
                                    </div>
                                    <div class="form-group mb-2">
                                      <label>Current Stock (Pcs/Yard)</label>
                                      <input type="number" id="currentstocks-<?php echo $row['id']; ?>" value="<?php echo $row['stock_qty']; ?>" class="form-control" readonly>
                                    </div>
                                    <input type="hidden" id="curgoods-<?php echo $row['id']; ?>" value="<?php echo $row['goods']; ?>" class="form-control">
                                    <input type="hidden" name="fix_stock_qty" id="fix_stock_qty-<?php echo $row['id']; ?>" value="<?php echo $row['fix_stock_qty']; ?>" class="form-control">
                                    <input type="hidden" name="stock_price" id="price-<?php echo $row['id']; ?>"  value="<?php echo $row['stock_price']; ?>" class="form-control">
                                    <input type="hidden" name="reject" value="<?php echo $row['reject']; ?>" class="form-control">
                                    <input type="hidden" name="rejectprice" value="<?php echo $row['rejectprice']; ?>" class="form-control">
                                    <input type="hidden" name="stock_qty" id="totals-<?php echo $row['id']; ?>" class="form-control">
                                    <input type="hidden" name="goods" id="totalreduce-<?php echo $row['id']; ?>" class="form-control">
                                    <input type="hidden" name="goodprice" id="totalgoodsprice-<?php echo $row['id']; ?>" class="form-control">
                                  </div>
                                </div>
                                <hr>
                                <!-- Inside the <form> tag -->
                                <button type="submit" class="btn btn-primary px-4 float-right">Submit</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  </tbody>
                  <!-- <tfoot>
                    <tr>
                      <th colspan="6"></th>
                      <th id="total"></th>
                      <th id="total"></th>
                      <th></th>
                    </tr>
                  </tfoot> -->
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

    



<!-- ADD PRODUCT MODAL-->
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
        <form action="<?= site_url('addproduct_stocks') ?>" method="POST" enctype="multipart/form-data" id="addproductform">
          <?= csrf_field(); ?>
          <div class="row">
            <div class="input-group mb-3 col-md-12">
              <select class="custom-select"  id="category_name" name="category_name" id="inputGroupSelect01"required>
              <option value="" disabled selected>Select Category</option>
                <?php foreach($stocks_category as $row) { ?>
                  <option value="<?= $row['id']; ?>"><?= $row['category_name']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">


                <input type="hidden" name="category_name"  class="form-control">
                <input type="hidden" name="stock_category_id"  class="form-control">

                <div class="form-group mb-2">
                  <label>Product Name</label>
                  <input type="text" name="product_name" class="form-control" required>
                </div>

                <div class="row">
                  <div class="col-md-6">
                      <div class="form-group mb-2">
                          <label>Price per pcs/yard</label>
                          <input type="number" name="stock_price" id="total" class="form-control" required>
                      </div>
                      <div class="form-group mb-2">
                          <label>Color</label>
                          <input type="text" name="color" class="form-control" value="Default">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group mb-2">
                          <label>Bundle Quantity</label>
                          <input type="number" id="bundle_qty" name="bundle" class="form-control" oninput="calculateTotal()" required>
                      </div>
                      <div class="form-group mb-2">
                          <label>Pcs per Bundle/Yard</label>
                          <input type="number" id="pcs_bundle" name="fix_stock_qty" class="form-control" oninput="calculateTotal()" required>
                      </div>
                  </div>
              </div>


              <div class="form-group mb-2">
                <input type="hidden" name="stock_qty" id="total_remain" class="form-control" required>
              </div>

              <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <label>Price per Bundle/Yard</label>
                        <input type="number" id="price_bundle" class="form-control" oninput="calculateTotal()" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                </div>
            </div>


              <div class="form-group mb-2">
                <input type="hidden" name="bundle_price" id="bundle_price" class="form-control" required>
                <input type="hidden" name="investment" id="investment" class="form-control" required>
              </div>

              
                  
              
            </div>
            <div class="col-md-12">
              <hr>
              <button type="submit" class="btn btn-primary px-4 float-right">Submit</button>
            </div>
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
<script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>

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
      $('#category_name').change(function() {
        var selectedCategoryName = $('#category_name option:selected').text();
        var selectedCategoryId = $(this).val();

        $('input[name="category_name"]').val(selectedCategoryName);
        $('input[name="stock_category_id"]').val(selectedCategoryId);
      });
    });


  function confirmSubmit(event) {
    event.preventDefault();
    Swal.fire({
      title: 'Add Stocks?',
      text: "Are you sure? This cannot be undone!",
      showCancelButton: true,
      confirmButtonColor: '#28a745',  // Green color for the "Yes" button
      cancelButtonColor: '#d33',
      icon: 'question',
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.isConfirmed) {
        event.target.submit();
      }
    });
  }


  function editconfirmSubmit(event) {
    event.preventDefault();
    Swal.fire({
      title: 'Edit Stocks?',
      text: "Are you sure?",
      showCancelButton: true,
      confirmButtonColor: '#28a745',  // Green color for the "Yes" button
      cancelButtonColor: '#d33',
      icon: 'question',
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.isConfirmed) {
        event.target.submit();
      }
    });
  }

function showSweetAlert() {
    Swal.fire({
      title: 'Are you sure?',
      text: "You want to add this product?",
      showCancelButton: true,
      confirmButtonColor: '#28a745',  // Green color for the "Yes" button
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


  function validateRejectStock(event, id) {
  event.preventDefault();
  var addRejectInput = document.getElementById('addreject-' + id);
  var currentStocksInput = document.getElementById('thecurrentstocks-' + id);

  var addReject = parseInt(addRejectInput.value);
  var currentStocks = parseInt(currentStocksInput.value);

  if (addReject > currentStocks) {
    Swal.fire({
      icon: 'error',
      title: 'Not enough stocks!',
    });
  } else {
    Swal.fire({
      title: 'Add Reject Stocks?',
      text: "Are you sure? This cannot be undone!",
      showCancelButton: true,
      confirmButtonColor: '#28a745',  // Green color for the "Yes" button
      cancelButtonColor: '#d33',
      icon: 'question',
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.isConfirmed) {
        event.target.submit();
      }
    });
  }
}

function validateReduceStock(event, id) {
  event.preventDefault();
  var reducePcsInput = document.getElementById('reducepcs-' + id);
  var currentStocksInput = document.getElementById('currentstocks-' + id);

  var reducePcs = parseInt(reducePcsInput.value);
  var currentStocks = parseInt(currentStocksInput.value);

  if (reducePcs > currentStocks) {
    Swal.fire({
      icon: 'error',
      title: 'Not enough stocks!',
    });
  } else {
    Swal.fire({
      title: 'Add Used Stocks?',
      text: "Are you sure? This cannot be undone!",
      showCancelButton: true,
      confirmButtonColor: '#28a745',  // Green color for the "Yes" button
      cancelButtonColor: '#d33',
      icon: 'question',
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.isConfirmed) {
        event.target.submit();
      }
    });
  }
}

  function calculateRejectStock(id) {
    var addReject = parseInt(document.getElementById('addreject-' + id).value);
    var theCurrentStocks = parseInt(document.getElementById('thecurrentstocks-' + id).value);
    var curReject = parseInt(document.getElementById('curreject-' + id).value);
    var fixStockQty = parseInt(document.getElementById('fixstock_qty-' + id).value);
    var priceperstock = parseInt(document.getElementById('priceperstock-' + id).value);

    var newtotalstocks = theCurrentStocks - addReject;
    var newtotalreject = curReject + addReject;
    var newtotalrejectprice = newtotalreject * priceperstock;

    document.getElementById('newtotalstocks-' + id).value = newtotalstocks;
    document.getElementById('newtotalreject-' + id).value = newtotalreject;
    document.getElementById('newtotalrejectprice-' + id).value = newtotalrejectprice;

    if (addReject <= 0 || addReject > theCurrentStocks) {
      disableSubmitButton('rejectstockModal-' + id);
    } else {
      enableSubmitButton('rejectstockModal-' + id);
    }
  }

// FOR ADDING OF USED STOCKS
function calculateReduceStock(id) {
  var reducePcs = parseInt(document.getElementById('reducepcs-' + id).value);
  var currentStocks = parseInt(document.getElementById('currentstocks-' + id).value);
  var curGoods = parseInt(document.getElementById('curgoods-' + id).value);
  var fixStockQty = parseInt(document.getElementById('fix_stock_qty-' + id).value);
  var price = parseInt(document.getElementById('price-' + id).value);

  var totals = currentStocks - reducePcs;
  var totalReduce = curGoods + reducePcs;
  var totalGoodsPrice = totalReduce * price;

  document.getElementById('totals-' + id).value = totals;
  document.getElementById('totalreduce-' + id).value = totalReduce;
  document.getElementById('totalgoodsprice-' + id).value = totalGoodsPrice;

  if (reducePcs <= 0 || reducePcs > currentStocks) {
      disableSubmitButton('minusStockModal-' + id);
    } else {
      enableSubmitButton('minusStockModal-' + id);
    }
  }
  
// FOR ADDING OF STOCKS
  function calculateTotalPcs(id) {
  var addStock = parseInt(document.getElementById('addstock-' + id).value);
  var fixQty = parseInt(document.getElementById('fix_qty-' + id).value);
  var currentStock = parseInt(document.getElementById('current-' + id).value);
  var bundleStock = parseInt(document.getElementById('bundle_price-' + id).value);
  var Investment = parseInt(document.getElementById('investment-' + id).value);
  var totalPcs = currentStock + (addStock * fixQty);
  var totalInvestment = Investment + (addStock * bundleStock)
  document.getElementById('addtotalpcs-' + id).value = totalPcs;
  document.getElementById('total_investment-' + id).value = totalInvestment;
}
// FOR ADDING OF PRODUCTS
function calculateTotal() {
  var bundleQty = parseInt(document.getElementById('bundle_qty').value);
  var fixStockQty = parseInt(document.getElementById('pcs_bundle').value);
  var priceBundle = parseInt(document.getElementById('price_bundle').value);
  var totalRemain = bundleQty * fixStockQty;
  var bundlePrice = bundleQty * priceBundle;
  document.getElementById('total_remain').value = totalRemain;
  document.getElementById('bundle_price').value = bundlePrice;
  document.getElementById('investment').value = bundlePrice;
}


// FOR SUBMITTING UPDATE OF NEW STOCKS
$(document).ready(function() {
        $('button[data-toggle="modal"]').click(function() {
            var targetModalId = $(this).data('target'); // Get the target modal ID
            var stockId = $(this).data('id'); // Extract category ID from data-id attribute
            $(targetModalId).find('form').attr('action', 'add_update_' + stockId); // Update form action URL
        });
    });
    $('.modal').on('hidden.bs.modal', function () {
    $('.modal-backdrop').remove();
  });

  // FOR SUBMITTING UPDATE OF MINUS STOCK
  $(document).ready(function() {
        $('button[data-toggle="modal"]').click(function() {
            var targetModalId = $(this).data('target'); // Get the target modal ID
            var stockId = $(this).data('id'); // Extract category ID from data-id attribute
            $(targetModalId).find('form').attr('action', 'minus_update_' + stockId); // Update form action URL
        });
    });
    $('.modal').on('hidden.bs.modal', function () {
    $('.modal-backdrop').remove();
  });

  // FOR SUBMITTING UPDATE OF REJECT STOCK
  $(document).ready(function() {
        $('button[data-toggle="modal"]').click(function() {
            var targetModalId = $(this).data('target'); // Get the target modal ID
            var stockId = $(this).data('id'); // Extract category ID from data-id attribute
            $(targetModalId).find('form').attr('action', 'reject_update_' + stockId); // Update form action URL
        });
    });
    $('.modal').on('hidden.bs.modal', function () {
    $('.modal-backdrop').remove();
  });


$(document).ready(function(){
  var table = $("#example").DataTable({
    "createdRow": function(row, data, index) {
      if (data[6] >= 500) {
        $('td', row).css({
          'background-color': 'white',
          'color': 'black',
          'border-style': 'solid',
          'border-color': 'white' 
        });
      }
    },
    "drawCallback": function() {
      var api = this.api();
      var column6Sum = api.column(6, {page: 'current'}).data().sum();
      var column7Sum = api.column(7, {page: 'current'}).data().sum();
      $(api.column(6).footer()).html(
        'Total: &#8369;' + column6Sum
      );
      $(api.column(7).footer()).html(
        'Total: &#8369;' + column7Sum
      );
    }
  });
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

  function confirmDelete(event) {
    event.preventDefault(); // Prevent the default link behavior
    
    Swal.fire({
      title: 'Are you sure?',
      text: 'Deleting it deletes all associated products.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Delete',
      cancelButtonText: 'Cancel'
    }).then((result) => {
      if (result.isConfirmed) {
        // User confirmed deletion, redirect to the delete URL
        window.location.href = event.target.href;
      }
    });
  }

//SWEET ALERT CONFIRMATION FOR UPDATING CATEGORY
  function showConfirmation(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: 'You are about update this category?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#28a745',  // Green color for the "Yes" button
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('editCategoryForm-' + id).submit();
      }
    });
  }


//SWEET ALERT CONFIRMATION FOR ADDING CATEGORY
document.getElementById('addcategoryform').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting

    Swal.fire({

      title: 'Are you sure?',
      text: "You want to add this category?",
      showCancelButton: true,
      confirmButtonColor: '#28a745',  // Green color for the "Yes" button
      cancelButtonColor: '#d33',
      icon: 'question',
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    });
  });

  function confirmDelete(event) {
    event.preventDefault(); 
    
    Swal.fire({
      title: 'Are you sure?',
      text: 'You are about to delete this product. This is cannot be undone!',
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


</script>
</body>


<!-- datatables.html  21 Nov 2019 03:55:25 GMT -->
</html>



