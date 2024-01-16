<?php
$admin_data = session()->get();
?>
<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Bituin</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url('public/assets/css/app.min.css') ?>">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('public/assets/css/style.css') ?>">
  <link rel="stylesheet" href="<?= base_url('public/assets/css/components.css') ?>">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?= base_url('public/assets/css/custom.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/bundles/datatables/datatables.min.cs') ?>s">
  <link rel="stylesheet" href="<?= base_url('public/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') ?>">
  <link rel='shortcut icon' type='image/x-icon' href="<?= base_url('public/assets/img/bituinlogo.png') ?>" />
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
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image"  src="<?= base_url('public/assets/img/user.png') ?>"
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
            <li class="dropdown active">
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
          <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Products</h5>
                          <h2 class="mb-3 font-18"><?=count($product_count);?></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                        <img  src="<?= base_url('public/assets/img/banner/3.png') ?>" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15"> Users</h5>
                          <h2 class="mb-3 font-18"><?=count($user_count);?></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img  src="<?= base_url('public/assets/img/banner/2.png') ?>" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Product Categories</h5>
                          <h2 class="mb-3 font-18"><?=count($category_count);?></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                        <img  src="<?= base_url('public/assets/img/banner/1.png') ?>" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Total Sales</h5>
                          <h2 class="mb-3 font-18">&#8369; <?php echo $sales; ?></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img  src="<?= base_url('public/assets/img/banner/4.png') ?>" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon l-bg-purple">
                    <i class="fas fa-shopping-cart "></i>
                  </div>
                  <div class="card-wrap">
                    <div class="padding-20">
                      <div class="text-right">
                        <h3 class="font-light mb-0">
                          <i class="ti-arrow-up text-success"></i> <?=count($completed_orders);?>
                        </h3>
                        <span class="text-muted">Succesful Transactions</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon l-bg-green">
                    <i class="fas fa-address-book"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="padding-20">
                      <div class="text-right">
                        <h3 class="font-light mb-0">
                          <i class="ti-arrow-up text-success"></i><?=count($new_bookings);?>
                        </h3>
                        <span class="text-muted">New Bookings</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon l-bg-cyan">
                    <i class="fas fa-cart-plus "></i>
                  </div>
                  <div class="card-wrap">
                    <div class="padding-20">
                      <div class="text-right">
                        <h3 class="font-light mb-0">
                          <i class="ti-arrow-up text-success"></i><?=count($new_orders);?>
                        </h3>
                        <span class="text-muted">New Orders</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon l-bg-orange">
                    <i class="fas fa-dollar-sign"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="padding-20">
                      <div class="text-right">
                        <h3 class="font-light mb-0">
                          <i class="ti-arrow-up text-success"></i>&#8369; <?php echo $salesthismonth; ?>
                        </h3>
                        <span class="text-muted">Sales this Month </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="row clearfix">
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Monthly Sold of Product</h4>
                  </div>
                  <div class="card-body">
                    <div class="recent-report__chart">
                      <canvas id="stackedLineChart"></canvas>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Month of Highest Sales</h4>
                  </div>
                  <div class="card-body">
                    <div class="recent-report__chart">
                      <canvas id="verticalChart"></canvas>
                      <div>
                        <?php 
                        if($possales):
                            $monthpos = [];
                            foreach($possales as $sale):
                                $monthpos[]  = $sale['orderdate'];
                                $salespos[] = $sale['total_sold'];
                            endforeach;
                        else:
                            $monthpos = [0];  // Assuming you want to show at least one point in the chart
                            $salespos = [0];   // You can modify this based on your chart's requirements
                        endif;
                        ?>
                      </div>
                      <div>
                        <!-- Code to render the chart using $monthpos and $salespos arrays -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row clearfix">
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Monthly Sales</h4>
                  </div>
                  <div class="card-body">
                    <div class="recent-report__chart">
                      <canvas id="barChart"></canvas>
                      <div>
                        <?php
                        if ($saleschart):
                            foreach ($saleschart as $saleschart):
                                $month[]  = $saleschart['orderdate'];
                                $amount[] = $saleschart['total_sold'];
                            endforeach;
                        else:
                            // Set default values to zero
                            $month = [];
                            $amount = [];
                        endif;
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Monthly Sales of Product</h4>
                  </div>
                  <div class="card-body">
                    <div class="recent-report__chart">
                      <canvas id="lineChart"></canvas>
                      <div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row clearfix">
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Flower Stocks</h4>
                  </div>
                  <div class="card-body">
                    <div class="recent-report__chart">
                      <canvas id="pieChart"></canvas>
                      <div>
                      <?php
                        $productname = []; // Initialize $item_name as an empty array
                        $total = [];  // Initialize $item_qty as an empty array

                        if ($stockschart):
                            foreach ($stockschart as $stockschart):
                                $productname[] = $stockschart['product_name'];
                                $total[] = ($stockschart['stock_qty'] !== null && $stockschart['product_name'] !== 0) ? $stockschart['stock_qty'] : 0;
                            endforeach;
                        endif;
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Product Sold</h4>
                  </div>
                  <div class="card-body">
                    <div class="recent-report__chart" style="width: 400px; height: 400px; display: flex; justify-content: center; align-items: center;">
                      <canvas id="polarChart"></canvas>
                      <div>
                      <?php
                        $item_name = []; // Initialize $item_name as an empty array
                        $item_qty = [];  // Initialize $item_qty as an empty array

                        if ($piechart):
                            foreach ($piechart as $piechart):
                                $item_name[] = $piechart['item_name'];
                                $item_qty[] = ($piechart['total_sold'] !== null && $piechart['total_sold'] !== 0) ? $piechart['total_sold'] : 0;
                            endforeach;
                        endif;
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>



            
        </section>

            



            
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Customers</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                        <thead>
                          <tr>
                          <th>ID</th>
                          <th>Firstname</th>
                          <th>Lastname</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Address</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach($user as $row) : ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['firstname'] ?></td>
                        <td><?= $row['lastname'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['phone'] ?></td>
                        <td><?= $row['address'] ?></td>
                    </tr>
                       <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>


              
      

        
          



























    
     
          
          
          

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
  <script  src="<?= base_url('public/assets/js/app.min.js') ?>"></script>
  <!-- JS Libraies -->
  <script  src="<?= base_url('public/assets/bundles/apexcharts/apexcharts.min.js') ?>"></script>
  <!-- Page Specific JS File -->
  <script  src="<?= base_url('public/assets/js/page/index.js') ?>"></script>
  <!-- Template JS File -->
  <script  src="<?= base_url('public/assets/js/scripts.j') ?>s"></script>
  <!-- Custom JS File -->
  <script  src="<?= base_url('public/assets/js/custom.js') ?>"></script>
  <script  src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script  src="<?= base_url('public/assets/bundles/datatables/datatables.min.js') ?>"></script>
  <script  src="<?= base_url('public/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.j') ?>s"></script>
  <script  src="<?= base_url('public/assets/js/page/datatables.js') ?>"></script>
  <script>

    
  

 //POS SALES BAR CHART -----------------------------------------
var ctx = document.getElementById('verticalChart').getContext('2d');
var data = {
    labels: <?php echo json_encode($monthpos) ?>,
    datasets: [{
        label: 'MONTHLY SALES',
        data: <?php echo json_encode($salespos) ?>,
        backgroundColor: [
          'rgb(54, 162, 235)',
          'rgb(255, 99, 132)',
          'rgb(75, 192, 192)',
          'rgb(255, 205, 86)',
          'rgb(153, 102, 255)',
          'rgb(255, 159, 64)',
          'rgb(54, 162, 235)',
          'rgb(255, 99, 132)',
          'rgb(75, 192, 192)',
          'rgb(255, 205, 86)',
          'rgb(128, 0, 128)',
          'rgb(0, 128, 128)',
          'rgb(255, 165, 0)',
          'rgb(0, 255, 0)',
          'rgb(0, 0, 255)',
          'rgb(128, 128, 0)',
          'rgb(128, 0, 0)',
          'rgb(0, 128, 0)',
          'rgb(0, 0, 128)',
          'rgb(255, 128, 0)'
        ],
        borderColor: [
          'rgb(54, 162, 235)',
          'rgb(255, 99, 132)',
          'rgb(75, 192, 192)',
          'rgb(255, 205, 86)',
          'rgb(153, 102, 255)',
          'rgb(255, 159, 64)',
          'rgb(54, 162, 235)',
          'rgb(255, 99, 132)',
          'rgb(75, 192, 192)',
          'rgb(255, 205, 86)',
          'rgb(128, 0, 128)',
          'rgb(0, 128, 128)',
          'rgb(255, 165, 0)',
          'rgb(0, 255, 0)',
          'rgb(0, 0, 255)',
          'rgb(128, 128, 0)',
          'rgb(128, 0, 0)',
          'rgb(0, 128, 0)',
          'rgb(0, 0, 128)',
          'rgb(255, 128, 0)'
        ],
        borderWidth: 1
    }]
};

var config = {
    type: 'bar',
    data: data,
    options: {
        scales: {
            x: {
                grid: {
                    display: false 
                }
            },
            y: {
                beginAtZero: true 
            }
        }
    }
};

var barChart = new Chart(ctx, config);
//POS SALES BAR CHART ----------------------------------------------
  





//ONLINE ORDERING SALES BARCHART -----------------------------   
var ctx = document.getElementById('barChart').getContext('2d');

var chartData = {
    labels: <?php echo json_encode($month) ?>,
    datasets: [{
        label: 'MONTHLY SALES',
        data: <?php echo json_encode($amount) ?>,
        backgroundColor: [
          'rgba(54, 162, 235, 0.2)',    
          'rgba(255, 99, 132, 0.2)',    
          'rgba(75, 192, 192, 0.2)',    
          'rgba(255, 206, 86, 0.2)',    
          'rgba(153, 102, 255, 0.2)',   
          'rgba(255, 159, 64, 0.2)',    
          'rgba(255, 0, 0, 0.2)',     
          'rgba(0, 255, 0, 0.2)',      
          'rgba(0, 0, 255, 0.2)',      
          'rgba(255, 255, 0, 0.2)',    
          'rgba(255, 0, 255, 0.2)',    
          'rgba(0, 255, 255, 0.2)',    
          'rgba(128, 0, 0, 0.2)',       
          'rgba(0, 128, 0, 0.2)',       
          'rgba(0, 0, 128, 0.2)',      
          'rgba(128, 128, 0, 0.2)',    
          'rgba(128, 0, 128, 0.2)',     
          'rgba(0, 128, 128, 0.2)',  
          'rgba(255, 165, 0, 0.2)',     
          'rgba(255, 192, 203, 0.2)'   
        ],
        borderColor: [
          'rgb(54, 162, 235)',      // Border color for the first bar
          'rgb(255, 99, 132)',      // Border color for the second bar
          'rgb(75, 192, 192)',      // Border color for the third bar
          'rgb(255, 206, 86)',      // Border color for the fourth bar
          'rgb(153, 102, 255)',     // Border color for the fifth bar
          'rgb(255, 159, 64)',      // Border color for the sixth bar
          'rgb(255, 0, 0)',         // Border color for the seventh bar
          'rgb(0, 255, 0)',         // Border color for the eighth bar
          'rgb(0, 0, 255)',         // Border color for the ninth bar
          'rgb(255, 255, 0)',       // Border color for the tenth bar
          'rgb(255, 0, 255)',       // Border color for the eleventh bar
          'rgb(0, 255, 255)',       // Border color for the twelfth bar
          'rgb(128, 0, 0)',         // Border color for the thirteenth bar
          'rgb(0, 128, 0)',         // Border color for the fourteenth bar
          'rgb(0, 0, 128)',         // Border color for the fifteenth bar
          'rgb(128, 128, 0)',       // Border color for the sixteenth bar
          'rgb(128, 0, 128)',       // Border color for the seventeenth bar
          'rgb(0, 128, 128)',       // Border color for the eighteenth bar
          'rgb(255, 165, 0)',       // Border color for the nineteenth bar
          'rgb(255, 192, 203)'      // Border color for the twentieth bar
        ],
        borderWidth: 1
    }]
};


var chartOptions = {
    scales: {
        y: {
            beginAtZero: true
        }
    }
};

var myChart = new Chart(ctx, {
    type: 'bar',
    data: chartData,
    options: chartOptions
});
//ONLINE ORDERING SALES BARCHART  -------------------------------------------


// POLAR AREA CHART --------------------------------------------------------------
var ctx = document.getElementById('polarChart').getContext('2d');

var chartData = {
    labels: <?php echo json_encode($item_name) ?>,
    datasets: [{
        label: 'Sold',
        data: <?php echo json_encode($item_qty) ?>,
    }]
};

var chartOptions = {
    responsive: true,  // Make the chart responsive to its container size
    maintainAspectRatio: false,  // Do not maintain a fixed aspect ratio
    scales: {
        r: {
            beginAtZero: true
        }
    },
    plugins: {
        legend: {
            display: false
        },
        tooltip: {
            bodyFont: {
                size: 12
            }
        }
    }
};

var myChart = new Chart(ctx, {
    type: 'polarArea',
    data: chartData,
    options: chartOptions
});

// END OF POLAR AREA CHART --------------------------------------------------------------





// LINE CHART PRODUCT SALES --------------------------------------------------------------


var ctx = document.getElementById('lineChart').getContext('2d');
var chartData = JSON.parse(`<?= addslashes($linechartData) ?>`);

new Chart(ctx, {
  type: 'line',
  data: chartData,
  options: {
    responsive: true,
    scales: {
      x: {
        display: true,
        title: {
          display: true,
          text: 'Month',
          font: {
            size: 14,
            weight: 'bold'
          },
          color: '#333'
        },
        ticks: {
          font: {
            size: 12
          },
          color: '#555'
        }
      },
      y: {
        display: true,
        title: {
          display: true,
          text: 'Total Amount',
          font: {
            size: 14,
            weight: 'bold'
          },
          color: '#333'
        },
        ticks: {
          font: {
            size: 12
          },
          color: '#555'
        }
      }
    },
    plugins: {
      legend: {
        display: false
      }
    }
  }
});


  // END OF LINE CHART --------------------------------------------------------------

var ctx = document.getElementById('pieChart').getContext('2d');

var chartData = {
  labels: <?php echo json_encode($productname) ?>,
  datasets: [{
    label: 'Stocks',
    data: <?php echo json_encode($total) ?>,
    backgroundColor: [
      'rgba(255, 99, 132, 0.7)',    // Red
      'rgba(54, 162, 235, 0.7)',    // Blue
      'rgba(255, 206, 86, 0.7)',    // Yellow
      'rgba(75, 192, 192, 0.7)',    // Aqua
      'rgba(153, 102, 255, 0.7)',   // Purple
      'rgba(255, 159, 64, 0.7)',    // Orange
      'rgba(255, 0, 0, 0.7)',       // Dark Red
      'rgba(0, 255, 0, 0.7)',       // Lime Green
      'rgba(0, 0, 255, 0.7)',       // Dark Blue
      'rgba(255, 255, 0, 0.7)',     // Bright Yellow
      'rgba(255, 0, 255, 0.7)',     // Fuchsia
      'rgba(0, 255, 255, 0.7)',     // Aqua Blue
      'rgba(128, 0, 0, 0.7)',       // Dark Maroon
      'rgba(0, 128, 0, 0.7)',       // Medium Green
      'rgba(0, 0, 128, 0.7)',       // Dark Navy
      'rgba(128, 128, 0, 0.7)',     // Dark Olive
      'rgba(128, 0, 128, 0.7)',     // Dark Purple
      'rgba(0, 128, 128, 0.7)',     // Dark Teal
      'rgba(255, 165, 0, 0.7)',     // Dark Orange
      'rgba(255, 192, 203, 0.7)'    // Light Pink
    ],
    borderColor: [
      'rgba(255, 99, 132, 1)',      // Red
      'rgba(54, 162, 235, 1)',      // Blue
      'rgba(255, 206, 86, 1)',      // Yellow
      'rgba(75, 192, 192, 1)',      // Aqua
      'rgba(153, 102, 255, 1)',     // Purple
      'rgba(255, 159, 64, 1)',      // Orange
      'rgba(255, 0, 0, 1)',         // Dark Red
      'rgba(0, 255, 0, 1)',         // Lime Green
      'rgba(0, 0, 255, 1)',         // Dark Blue
      'rgba(255, 255, 0, 1)',       // Bright Yellow
      'rgba(255, 0, 255, 1)',       // Fuchsia
      'rgba(0, 255, 255, 1)',       // Aqua Blue
      'rgba(128, 0, 0, 1)',         // Dark Maroon
      'rgba(0, 128, 0, 1)',         // Medium Green
      'rgba(0, 0, 128, 1)',         // Dark Navy
      'rgba(128, 128, 0, 1)',       // Dark Olive
      'rgba(128, 0, 128, 1)',       // Dark Purple
      'rgba(0, 128, 128, 1)',       // Dark Teal
      'rgba(255, 165, 0, 1)',       // Dark Orange
      'rgba(255, 192, 203, 1)'      // Light Pink
    ],
    borderWidth: 1,
  }]
};

var chartOptions = {
  responsive: true,
  maintainAspectRatio: false,
  plugins: {
    legend: {
      display: false 
    },
    tooltip: {
      bodyFont: {
        size: 12
      }
    }
  }
};

var myChart = new Chart(ctx, {
  type: 'pie',
  data: chartData,
  options: chartOptions
});



//-------------------------

var ctx = document.getElementById('stackedLineChart').getContext('2d');
var chartData = JSON.parse(`<?= addslashes($stackedLineChart) ?>`);

// Swap the order of the datasets
// [chartData.datasets[0], chartData.datasets[1]] = [chartData.datasets[1], chartData.datasets[0]];

const colors = [
  'rgba(255, 0, 0, 0.6)',     // Red
  'rgba(0, 255, 0, 0.6)',     // Green
  'rgba(0, 0, 255, 0.6)',     // Blue
  'rgba(255, 255, 0, 0.6)',   // Yellow
  'rgba(255, 0, 255, 0.6)',   // Magenta
  'rgba(0, 255, 255, 0.6)',   // Cyan
  'rgba(128, 0, 0, 0.6)',     // Maroon
  'rgba(0, 128, 0, 0.6)',     // Green (medium)
  'rgba(0, 0, 128, 0.6)',     // Navy
  'rgba(128, 128, 0, 0.6)',   // Olive
  'rgba(128, 0, 128, 0.6)',   // Purple
  'rgba(0, 128, 128, 0.6)',   // Teal
  'rgba(255, 165, 0, 0.6)',   // Orange
  'rgba(255, 192, 203, 0.6)', // Pink
  'rgba(0, 255, 128, 0.6)',   // Spring Green
  'rgba(255, 0, 128, 0.6)',   // Rose
  'rgba(128, 0, 255, 0.6)',   // Violet
  'rgba(0, 128, 255, 0.6)',   // Azure
  'rgba(255, 128, 0, 0.6)',   // Tangerine
  'rgba(128, 255, 0, 0.6)',   // Lime
  'rgba(128, 128, 128, 0.6)', // Gray
  'rgba(255, 255, 255, 0.6)', // White
  'rgba(0, 0, 0, 0.6)',       // Black
  'rgba(255, 128, 128, 0.6)', // Light Coral
  'rgba(0, 255, 128, 0.6)',   // Sea Green
  'rgba(128, 0, 255, 0.6)',   // Indigo
  'rgba(0, 128, 255, 0.6)',   // Sky Blue
  'rgba(255, 128, 0, 0.6)',   // Dark Orange
  'rgba(128, 255, 0, 0.6)'    // Chartreuse
];

chartData.datasets.forEach((dataset, index) => {
  dataset.type = 'line';
  dataset.fill = true;
  dataset.backgroundColor = colors[index % colors.length]; 
});


new Chart(ctx, {
  type: 'line',
  data: chartData,
  options: {
    responsive: true,
    scales: {
      x: {
        display: true,
        title: {
          display: true,
          text: 'Month',
          font: {
            size: 14,
            weight: 'bold'
          },
          color: '#333'
        },
        ticks: {
          font: {
            size: 12
          },
          color: '#555'
        }
      },
      y: {
        display: true,
        title: {
          display: true,
          text: 'Total Amount',
          font: {
            size: 14,
            weight: 'bold'
          },
          color: '#333'
        },
        ticks: {
          font: {
            size: 12
          },
          color: '#555'
        }
      }
    },
    plugins: {
      legend: {
        display: false
      }
    }
  }
});

</script>
</body>

</html>