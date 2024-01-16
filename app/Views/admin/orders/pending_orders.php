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
  <link rel="stylesheet" href="<?= base_url('public/assets/css/components.cs') ?>s">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?= base_url('public/assets/css/custom.css') ?>">
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
      background-color: rgba(0, 0, 0, 0.5); /* Adjust the opacity as desired */
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
            <a> <img alt="image" src="public/assets/img/bituinlogo.png" class="header-logo" /> <span
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
            
            <li class="dropdown active">
              <a href="<?= base_url('orderlist') ?>" class="menu-toggle nav-link has-dropdown"><i data-feather="shopping-bag"></i><span>Orders</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="<?= base_url('orderlist') ?>">All Orders</a></li>
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
              <h4>Pending Orders</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                  <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Order Date</th>
                      <th>Order Type</th>
                      <th>Proof Payment</th>
                      <th>Order Amount</th>
                      <th>Shipping Fee</th>
                      <th>Order Total</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($orders as $order) : ?>
                      <tr>
                        <td><?php echo $order['order_id']; ?></td>
                        <td><?php echo $order['order_date_formatted']; ?></td>
                        <td><?php echo $order['order_type']; ?></td>
                        <td><?php echo !empty($order['proof_payment']) ? $order['proof_payment'] : 'N/A'; ?></td>
                       <td>
                            <?php
                            if ($order['order_status'] != 'Request') {
                                echo $order['order_amount'];
                            } else {
                                echo 'Pending';
                            }
                            ?>
                        </td>

                        <td>
                        <?php
                        if ($order['order_status'] == 'Request' || $order['order_status'] == 'Settle') {
                            echo 'Pending';
                        } elseif ($order['order_type'] == 'Pick Up' || $order['order_type'] == 'Pick Up (Paid)') {
                            echo 'PICK UP';
                        } else {
                            echo $order['shipping_fee'];
                        }

                        ?>
                        </td>

                       <td>
                            <?php
                            if ($order['order_status'] != 'Request') {
                                echo $order['order_amount'] + $order['shipping_fee'];
                            } else {
                                echo 'Pending';
                            }
                            ?>
                        </td>

                        <td>
                          <!-- Form to accept order -->
                          <form id="acceptorder" action="<?= base_url('orders_update_' . $order['id']) ?>" method="post">
                          <input type="hidden" name="order_status" value="To Pay">
                          <input type="hidden" value="<?= $order['user_email'] ?>" name="user_email">
                          <input type="hidden" value="<?= $order['order_id'] ?>" name="order_id">
                          <input type="hidden" value="<?= $order['order_amount'] ?>" name="order_amount">
                          <input type="hidden" value="<?= $order['order_type'] ?>" name="order_type">
                          <input type="hidden"   value="<?= $order['flower_sizeOrtype'] ?>" name="flower_sizeOrtype">
                          <input type="hidden" name="shipping_fee" value="<?php echo $order['shipping_fee']; ?>" class="form-control">
                          <input type="hidden" name="firstname" value="<?php echo $order['firstname']; ?>" class="form-control">
                          <input type="hidden" name="lastname" value="<?php echo $order['lastname']; ?>" class="form-control">
                          <input type="hidden" name="contact" value="<?php echo $order['contact']; ?>" class="form-control">
                          <input type="hidden" name="selected_city" value="<?php echo $order['selected_city']; ?>" class="form-control">
                          <input type="hidden" name="selected_barangay" value="<?php echo $order['selected_barangay']; ?>" class="form-control">
                          <input type="hidden" name="other_infoaddres" value="<?php echo $order['other_infoaddres']; ?>" class="form-control">
                          
                          <?php if ($order['order_status'] !== "Request" && $order['order_status'] !== "Settle"): ?>
                        <button type="button" class="btn btn-primary fw-bold acceptButton" data-order-id="<?= $order['id'] ?>" style="width: 70px;">Accept</button>
                    <?php endif; ?>
                          <?php $orderItems = $Order_Item_model->where('fk_order_id', $order['id'])->findAll(); ?>
                          <?php foreach ($orderItems as $orders) {
                              ?>
                              <!-- <input type="hidden" value="<?= site_url("public/public/products/" . $orders['item_image']) ?>" name="item_image[]"> -->
                              <input type="hidden" value="<?= $orders['item_name'] ?>" name="item_name[]">
                              <input type="hidden" value="<?= $orders['item_amount'] ?>" name="item_amount[]">
                              <input type="hidden" value="<?= $orders['item_qty'] ?>" name="item_qty[]">
                              <input type="hidden" value="<?= $order['order_amount'] ?>" name="item_qty[]">
                              <input type="hidden" value="<?= $orders['item_color'] ?>" name="item_color[]">
                              <?php } ?>
                              
                      </form>
                        <?php
                            echo '<button class="btn btn-success" data-toggle="modal" data-target="#editModal-' . $order['id'] . '" data-id="' . $order['id'] . '" style="width: 70px;">View</button>';
                        ?>
                      <?php $orderItems = $Order_Item_model->where('fk_order_id', $order['id'])->findAll(); ?>
                      </td>
                      </tr>

                      <!-- EDIT CUSTOM MODAL -->
            <div class="modal fade" id="editModal-<?php echo $order['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel-<?php echo $order['id']; ?>">Order Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php foreach ($orderItems as $orderItem) {
                                $itemQty = $orderItem['item_qty'];
                                $itemAmount = $orderItem['item_amount'];
                                $orderAmount = $itemQty * $itemAmount;
                            ?>
                            
                            
                            
                                <form action="<?= base_url('add_price_' . $order['id']) ?>" method="POST" enctype="multipart/form-data">
                                  <input type="hidden" name="id" value="<?php echo $order['id']; ?>">
                                  <input type="hidden" name="order_status" value="Settle">
                                  <input type="hidden" name="firstname" value="<?php echo $order['firstname']; ?>" class="form-control">
                                  <input type="hidden" name="lastname" value="<?php echo $order['lastname']; ?>" class="form-control">
                                  <input type="hidden" name="contact" value="<?php echo $order['contact']; ?>" class="form-control">
                                  <input type="hidden" name="user_email" value="<?php echo $order['user_email']; ?>" class="form-control">
                                  <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>" class="form-control">
                                   <input type="hidden" name="details" value="<?php echo $orderItem['details']; ?>" class="form-control">

                                  <?= csrf_field(); ?>
                                  <div class="row">
                                    <div class="col-md-12">
                                    <?php if ($order['order_status'] == 'Request') : ?>
                                    <?php if (!empty($orderItem['details'])) : ?>
                                        <!-- Additional description for customization -->
                                        <div class="form-group mb-2">
                                            <label>Description</label>
                                            <textarea class="form-control" placeholder="No additional description for customization" id="floatingTextarea2" style="height: 100px" readonly><?php echo $orderItem['details']; ?></textarea>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Quantity</label>
                                            <input type="text"  value="<?php echo $orderItem['item_qty']; ?>" class="form-control" readonly>
                                        </div>


                                    <?php endif; ?>
                                    <?php
                                    if ($order['flower_sizeOrtype'] != 'Upload' && $order['flower_sizeOrtype'] != 'DragNdrop') {
                                        ?>
                                        <div class="form-group mb-2">
                                            <label>Item Name</label>
                                            <input type="text" name="item_name" value="<?php echo $orderItem['item_name']; ?>" class="form-control" readonly>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    </div>
                                    <?php endif; ?>

                                    <div class="mb-3 form-group d-flex align-items-start order-item" style="position: relative;">
                                    
                                            <img src="<?= base_url("public/public/products/".$orderItem['item_image'])?>" width="125px" height="100px" alt="product_image" style="border-radius: 10px; margin-right: 10px;">
                                            
                                          <?php if ($order['order_status'] !== 'Request') : ?>
                                            <div class="ml-3">
                                                <label for="item_name" class="form-label"><strong><?= $orderItem['item_name'] ?></strong></label><br>
                                                <label for="item_name" class="form-label"><?= $itemQty ?>x</label><br>
                                                <label for="item_name" class="form-label" style="<?php echo ($order['flower_sizeOrtype'] === 'DragNdrop') ? 'display: none;' : ''; ?>">
                                                    &#8369;<?= $itemAmount ?>
                                                </label>

                                            </div>
                                            <?php
                                            if ($order['flower_sizeOrtype'] !== 'DragNdrop') {
                                                // Display the div only if the flower_sizeOrtype is not 'DragNdrop'
                                                ?>
                                                <div class="order-amount" style="position: absolute; bottom: 5px; right: 5px;">
                                                    Order Total: &#8369;<?= $orderAmount ?>
                                                </div>
                                                <?php
                                            }
                                            ?>

                                            </div>
                                            <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        
                                        <?php
                                        if (
                                            $order['flower_sizeOrtype'] !== 'Order' &&
                                            $order['flower_sizeOrtype'] !== 'Upload' &&
                                            $order['flower_sizeOrtype'] !== 'Regular Bouquet' &&
                                            $order['flower_sizeOrtype'] !== 'Small Bouquet' &&
                                            ($orderAmount !== 0 && !empty($orderAmount)) // Check if $orderAmount is not zero or empty
                                        ) {
                                            // Display the div only when $order['flower_sizeOrtype'] is not equal to 'DragNdrop'.
                                            echo '<div class="order-amount" style="position: absolute; bottom: 5px; right:10px;">';
                                            echo 'Order Total: &#8369;' . $orderAmount;
                                            echo '</div>';
                                        }
                                        ?>

                                        <div class="form-group mb-2">
                                        <?php
                                            if ($order['flower_sizeOrtype'] === 'DragNdrop' && $order['order_status'] !== 'Agree' && $order['order_status'] !== 'Settle' ) {
                                                echo '<label>Product Name and Descriptions</label>';
                                            }
                                            ?>
                                        <?php
                                        foreach ($orderItems as $orderItem) {
                                            if ($order['flower_sizeOrtype'] === 'DragNdrop' && $order['order_status'] !== 'Agree' && $order['order_status'] !== 'Settle'   ) {
                                                $itemInfo = $orderItem['item_name'] . ': ' . $orderItem['item_qty'] . ' pc/s with a color of ' . $orderItem['item_color'];
                                                ?>
                                                <input type="text" name="item_name[]" value="<?php echo $itemInfo; ?>" class="form-control" readonly>
                                                <?php
                                            }
                                        }
                                        ?>
                                        </div>
                                        <div class="form-group mb-2">
                                        <?php if ($order['flower_sizeOrtype'] !== 'DragNdrop' && $order['flower_sizeOrtype'] !== 'Order' && $order['order_status'] !== 'Settle' && $order['order_status'] !== 'Agree' ): ?>
                                            <label>Order Amount</label>
                                            <input type="number" name="item_amount" value="<?php echo $orderItem['item_amount']; ?>"  class="form-control" readonly>
                                        <?php endif; ?>

                                        <?php if ($order['flower_sizeOrtype'] !== 'Upload' && $order['flower_sizeOrtype'] !== 'Order' && $order['flower_sizeOrtype'] !== 'Regular Bouquet' && $order['flower_sizeOrtype'] !== 'Small Bouquet'
                                        && $order['order_status'] !== 'Settle'  && $order['order_status'] !== 'Agree' ): ?>
                                            <label>Order Amounts</label>
                                            <input type="number" name="order_amount" value="<?php echo $order['order_amount']; ?>" class="form-control">
                                        <?php endif; ?>
                                    </div>
                                        <?php if ($order['order_status'] == 'Request') : ?>
                                                <div class="col-md-12 mt-2">
                                                    <button class="btn btn-primary fw-bold" type="button" onclick="showConfirmation(this.form)">Okay</button>
                                                </div>
                                            <?php endif; ?>
                                            <input type="hidden" name="item_qty" value="<?php echo $orderItem['item_qty']; ?>" class="form-control" readonly>
                                            <input type="hidden" name="item_name" value="<?php echo $orderItem['item_name']; ?>" class="form-control" readonly>
                                            <input type="hidden" name="flower_sizeOrtype" value="<?php echo $order['flower_sizeOrtype']; ?>" class="form-control" readonly>
                                            
                                        </form>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
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
  <script src="<?= base_url('public/assets/bundles/jquery-ui/jquery-ui.min.j') ?>s"></script>
  <!-- Page Specific JS File -->
  <script src="<?= base_url('public/assets/js/page/datatables.js') ?>"></script>
  <!-- Template JS File -->
  <script src="<?= base_url('public/assets/js/scripts.js') ?>"></script>
  <!-- Custom JS File -->
  <script src="<?= base_url('public/assets/js/custom.js') ?>"></script>

  <script src="<?= base_url() ?>/public/sweetalert/dist/sweetalert2.all.min.js"></script>
<!-- Page specific script -->
<script>
 document.addEventListener("DOMContentLoaded", function() {
    const tableBody = document.querySelector(".table tbody");

    tableBody.addEventListener("click", function(e) {
        if (e.target.classList.contains("acceptButton")) {
            e.preventDefault();

            const button = e.target;
            const orderId = button.getAttribute("data-order-id");
            const form = button.closest("form");

            // Show SweetAlert confirmation
            Swal.fire({
                title: 'Confirm',
                text: 'Are you sure you want to accept this order?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Accept',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Update the form action URL and submit the form
                    const actionUrl = form.getAttribute('action');
                    const urlWithOrderId = actionUrl + '/' + orderId;
                    form.setAttribute('action', urlWithOrderId);
                    form.submit();
                }
            });
        }
    });
});

function showConfirmation(form) {
        Swal.fire({
            title: "Are you sure?",
            text: "You are about to add price for this order",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#d33',
            confirmButtonText: "Yes",
            cancelButtonText: "No",
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }



   

 

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