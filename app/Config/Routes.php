<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('test', 'DraggableController::index');


$routes->match(['get','post'], 'test', 'Welcome::draganddrop', ['filter' => 'noauth']);
$routes->match(['get','post'], 'buy', 'Cart::buy', ['filter' => 'noauth']);



$routes->match(['get','post'], 'signin', 'Account::signin', ['filter' => 'noauth']);
$routes->match(['get','post'], 'signup', 'Account::signup', ['filter' => 'noauth']);
$routes->match(['get','post'], '/verify/(:any)', 'Account::verify_account/$1', ['filter' => 'noauth']);
$routes->get('logout', 'Account::logout');
/** <-------------------------------------------------> */

$routes->match(['get','post'], '/', 'Home::landingpage', ['filter' => 'noauth']);
$routes->match(['get','post'], 'about_us', 'Home::about_us', ['filter' => 'noauth']);
$routes->match(['get','post'], 'contact_us', 'Home::contact_us', ['filter' => 'noauth']);
$routes->match(['get','post'], 'faq', 'Home::faq', ['filter' => 'noauth']);
$routes->match(['get','post'], 'home', 'Home::home', ['filter' => 'noauth']);
$routes->match(['get','post'], 'product_grids', 'Home::product_grids', ['filter' => 'noauth']);
$routes->match(['get','post'], 'my_account', 'Home::my_account', ['filter' => 'auth']);
$routes->match(['get','post'], 'edituser/(:any)', 'Home::edituser/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'uploadimage/(:any)', 'Home::uploadimage/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'exportuserdata', 'Home::exportuserdata', ['filter' => 'auth']);
$routes->match(['get','post'], 'flower_bouquet_list', 'Home::flower_bouquet_list', ['filter' => 'noauth']);
$routes->match(['get','post'], 'money_bouquet_list', 'Home::money_bouquet_list', ['filter' => 'noauth']);
$routes->match(['get','post'], 'dried_bouquet_list', 'Home::dried_bouquet_list', ['filter' => 'noauth']);
$routes->match(['get','post'], 'funeral_list', 'Home::funeral_list', ['filter' => 'noauth']);
$routes->match(['get','post'], 'inaugural_list', 'Home::inaugural_list', ['filter' => 'noauth']);
$routes->match(['get','post'], 'productdetails/(:any)', 'Home::productdetails/$1', ['filter' => 'noauth']);
$routes->match(['get','post'], 'write_reviews', 'Home::write_reviews', ['filter' => 'auth']);
$routes->match(['get','post'], 'addtocart', 'Home::addtocart', ['filter' => 'auth']);
$routes->match(['get','post'], 'decrement', 'Home::decrement', ['filter' => 'auth']);
$routes->match(['get','post'], 'removeItem', 'Home::removeItem', ['filter' => 'auth']);
$routes->match(['get','post'], 'cart', 'Home::cart', ['filter' => 'auth']);
$routes->match(['get','post'], 'checkout', 'Home::checkout', ['filter' => 'auth']);
$routes->match(['get','post'], 'addshipping_info', 'Home::addshipping_info', ['filter' => 'auth']);
$routes->match(['get','post'], 'proceed_to_order', 'Home::proceed_to_order', ['filter' => 'auth']);
$routes->match(['get','post'], 'order_success_(:any)', 'Home::order_success/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'payment', 'Home::onlinepayment', ['filter' => 'auth']);
$routes->match(['get','post'], 'orders', 'Home::orders', ['filter' => 'auth']);
$routes->match(['get','post'], 'view_items_(:any)', 'Home::view_items/$1', ['filter' => 'auth']);
// $routes->match(['get','post'], 'orders_delete_(:any)', 'Home::ordersdelete/$1', ['filter' => 'auth']);


$routes->match(['get','post'], 'customize', 'Customize::customize', ['filter' => 'auth']);
$routes->match(['get','post'], 'add_price_(:any)', 'Customize::add_price/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'small_customize', 'Customize::small_customize', ['filter' => 'auth']);
$routes->match(['get','post'], 'regular_customize', 'Customize::regular_customize', ['filter' => 'auth']);


/**-------- Admin Routes ---------------------------------------> */

$routes->match(['get','post'], 'admin_login', 'Admin::admin_login', ['filter' => 'noauth']);
$routes->match(['get','post'], 'admin_register', 'Admin::admin_register', ['filter' => 'noauth']);
$routes->match(['get','post'], 'dashboard', 'Admin::dashboard', ['filter' => 'auth']);
$routes->match(['get','post'], 'reservationlist', 'Admin::reservationlist', ['filter' => 'auth']);
$routes->match(['get','post'], 'reservation_report', 'Admin::reservation_report', ['filter' => 'auth']);
$routes->match(['get','post'], 'categorylist', 'Admin::categorylist', ['filter' => 'auth']);
$routes->match(['get','post'], 'productlist', 'Admin::productlist', ['filter' => 'auth']);
$routes->match(['get','post'], 'stocks', 'Admin::stocks', ['filter' => 'auth']);
$routes->match(['get','post'], 'stocks_category', 'Admin::stocks_category', ['filter' => 'auth']);
$routes->match(['get','post'], 'sales', 'Admin::sales', ['filter' => 'auth']);
$routes->match(['get','post'], 'reviews', 'Admin::reviews', ['filter' => 'auth']);
// $routes->match(['get','post'], 'salesreport', 'Admin::salesreport', ['filter' => 'auth']);
$routes->match(['get','post'], 'orderlist', 'Admin::orderlist', ['filter' => 'auth']);
// $routes->match(['get','post'], 'userlist', 'Admin::userlist', ['filter' => 'auth']);
$routes->match(['get','post'], 'employeelist', 'Admin::employeelist', ['filter' => 'auth']);

$routes->get('admin_logout', 'Admin::admin_logout');

$routes->match(['get','post'], 'employee_login', 'Employee::employee_login', ['filter' => 'noauth']);
$routes->match(['get','post'], 'employee_register', 'Employee::employee_register', ['filter' => 'noauth']);
$routes->match(['get','post'], 'employee_dashboard', 'Employee::employee_dashboard', ['filter' => 'auth']);
$routes->match(['get','post'], 'pending_orders', 'Employee::pending_orders', ['filter' => 'auth']);
$routes->match(['get','post'], 'to_pay_orders', 'Employee::to_pay_orders', ['filter' => 'auth']);
$routes->match(['get','post'], 'to_delivery_orders', 'Employee::to_delivery_orders', ['filter' => 'auth']);
$routes->match(['get','post'], 'completed_orders', 'Employee::completed_orders', ['filter' => 'auth']);
$routes->match(['get','post'], 'employee_orders_edit_(:any)', 'Employee::employee_orders_edit/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'employee_orders_update_(:any)', 'Employee::employee_orders_update/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'update_employee_(:any)', 'Employee::update_employee/$1', ['filter' => 'auth']);
$routes->get('employee_logout', 'Employee::employee_logout');


// $routes->match(['get','post'], 'customizationlist', 'Admin::customizationlist', ['filter' => 'auth']);
// $routes->match(['get','post'], 'editcustom_(:any)', 'Product::editcustom/$1', ['filter' => 'auth']);
// $routes->match(['get','post'], 'updatecustom_(:any)', 'Product::updatecustom/$1', ['filter' => 'auth']);
// $routes->match(['get','post'], 'deletecustom_(:any)', 'Product::deletecustom/$1', ['filter' => 'auth']);

$routes->match(['get','post'], 'orders_edit_(:any)', 'Orders::ordersedit/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'orders_update_(:any)', 'Orders::ordersupdate/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'delete_orders_(:any)', 'Orders::ordersdelete/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'topay_orders', 'Orders::topay_orders', ['filter' => 'auth']);
$routes->match(['get','post'], 'todeliver_orders', 'Orders::todeliver_orders', ['filter' => 'auth']);
$routes->match(['get','post'], 'pendingorders', 'Orders::pending_orders', ['filter' => 'auth']);
$routes->match(['get','post'], 'orderscancel_(:any)', 'Orders::orderscancel/$1', ['filter' => 'auth']);


$routes->match(['get','post'], 'book_now', 'Booking::book_now', ['filter' => 'auth']);
$routes->match(['get','post'], 'wedding_roles', 'Booking::wedding_roles', ['filter' => 'auth']);
$routes->match(['get','post'], 'my_booking', 'Booking::my_booking', ['filter' => 'auth']);
$routes->match(['get','post'], 'send_proof_payment', 'Booking::send_proof_payment', ['filter' => 'auth']);
$routes->match(['get','post'], 'send_email', 'Booking::send_email', ['filter' => 'auth']);
$routes->match(['get','post'], 'mail', 'Booking::mail', ['filter' => 'auth']);
$routes->match(['get','post'], 'event_calendar', 'Booking::event_calendar', ['filter' => 'auth']);


$routes->match(['get','post'], 'reservation_details_(:any)', 'Booking::reservationdetails/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'reservation_edit_(:any)', 'Booking::editreservation/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'reservation_update_(:any)', 'Booking::updatereservation/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'reservation_delete_(:any)', 'Booking::deletereservation/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'cancel_booking_(:any)', 'Booking::cancel_booking/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'update_payment_(:any)', 'Booking::update_payment/$1', ['filter' => 'auth']);

$routes->match(['get','post'], 'update_reviews_(:any)', 'Review::update_reviews/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'delete_reviews_(:any)', 'Review::delete_reviews/$1', ['filter' => 'auth']);

$routes->match(['get','post'], 'addproduct', 'Product::addproduct', ['filter' => 'auth']);
$routes->match(['get','post'], 'product_edit_(:any)', 'Product::editproduct/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'product_update_(:any)', 'Product::updateproduct/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'product_delete_(:any)', 'Product::deleteproduct/$1', ['filter' => 'auth']);

$routes->match(['get','post'], 'reviews_edit_(:any)', 'Product::editreviews/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'reviews_update_(:any)', 'Product::updatereviews/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'reviews_delete_(:any)', 'Product::deletereviews/$1', ['filter' => 'auth']);

$routes->match(['get','post'], 'add_stocks_category', 'Stocks::add_stocks_category', ['filter' => 'auth']);
$routes->match(['get','post'], 'edit_stocks_category(:any)', 'Stocks::edit_stocks_category/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'category_stocks_update_(:any)', 'Stocks::category_stocks_update_/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'delete_stocks_category(:any)', 'Stocks::delete_stocks_category/$1', ['filter' => 'auth']);

$routes->match(['get','post'], 'addcategory', 'Category::addcategory', ['filter' => 'auth']);
$routes->match(['get','post'], 'category_edit_(:any)', 'Category::editcategory/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'category_update_(:any)', 'Category::updatecategory/$1', ['filter' => 'auth']);

$routes->match(['get','post'], 'addproduct_stocks', 'Stocks::addproduct_stocks', ['filter' => 'auth']);
$routes->match(['get','post'], 'add_stocks_(:any)', 'Stocks::add_stocks/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'minus_stocks_(:any)', 'Stocks::minus_stocks/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'reject_stocks_(:any)', 'Stocks::reject_stocks/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'add_update_(:any)', 'Stocks::update_add_stocks/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'minus_update_(:any)', 'Stocks::update_minus_stocks/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'reject_update_(:any)', 'Stocks::update_reject_stocks/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'delete_stocks_(:any)', 'Stocks::delete_stocks/$1', ['filter' => 'auth']);

$routes->match(['get','post'], 'pos_view', 'POS::postview', ['filter' => 'auth']);
$routes->match(['get','post'], 'receipt', 'POS::printView', ['filter' => 'auth']);
$routes->match(['get','post'], 'submit-form', 'POS::submitForm', ['filter' => 'auth']);
$routes->match(['get','post'], 'insert-data', 'POS::insertData', ['filter' => 'auth']);

$routes->match(['get','post'], 'citylist', 'Address::city_list', ['filter' => 'auth']);
$routes->match(['get','post'], 'brgylist', 'Address::brgy_list', ['filter' => 'auth']);
// $routes->match(['get','post'], 'shippinglist', 'Address::shippin_datas', ['filter' => 'auth']);
$routes->match(['get','post'], 'addcity', 'Address::add_city', ['filter' => 'auth']);
$routes->match(['get','post'], 'addbrgy', 'Address::add_brgy', ['filter' => 'auth']);
// $routes->match(['get','post'], 'searchmo', 'Address::checkout', ['filter' => 'auth']);
// $routes->match(['get','post'], 'updateshipping_(:any)', 'Address::updatebrgy/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'shippingupdate_(:any)', 'Address::updateShippingFee/$1', ['filter' => 'auth']);
$routes->get('get-barangays', 'Address::getBarangays', ['as' => 'get.barangays']);
$routes->get('get-shipping-fee', 'Address::getShippingFee', ['as' => 'get.shipping_fee']);
$routes->match(['get','post'], 'delete_city_(:any)', 'Address::deleteCity/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'delete_brgy_(:any)', 'Address::deleteBrgy/$1', ['filter' => 'auth']);
$routes->get('chart/line', 'Admin::dashboard');
$routes->match(['get','post'], 'ship_address', 'Home::shipaddress', ['filter' => 'auth']);
$routes->match(['get','post'], 'edit_orders_(:any)', 'Orders::editorders/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'delete_category(:any)', 'Category::deleteCategory/$1', ['filter' => 'auth']);

$routes->match(['get','post'], 'forgot-password', 'Account::forgotpassword', ['filter' => 'noauth']);
$routes->match(['get','post'], 'forgot-password/send-reset-link', 'Account::sendResetLink', ['filter' => 'noauth']);
$routes->get('reset-password/(:any)', 'Account::resetPassword/$1');
$routes->post('reset-password/update', 'Account::updatePassword');
// $routes->match(['get','post'], 'edit_shipping_address', 'Address::edit_shipping_address', ['filter' => 'auth']);
$routes->match(['get','post'], 'ship_address/update/(:any)', 'Address::updateShipping/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'delete_address_(:any)', 'Address::deleteAddress/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'submit_review', 'Review::submitReview', ['filter' => 'auth']);
$routes->match(['get','post'], 'send_response_(:any)', 'Review::sendresponse/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'pickup_orders', 'Orders::pick_up_orders', ['filter' => 'auth']);
$routes->match(['get','post'], 'dismissreview_(:any)', 'Review::dismiss_review/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'details_(:any)', 'Customize::details/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'cus_checkout_(:any)', 'Customize::cus_checkout/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'edit_stocks_(:any)', 'Stocks::edit_stocks/$1', ['filter' => 'auth']);

$routes->match(['get','post'], 'event_calendar', 'Booking::event_calendar', ['filter' => 'auth']);


$routes->match(['get','post'], 'pos_custom', 'POS::postview_custom', ['filter' => 'auth']);
$routes->match(['get','post'], 'receipt_', 'POS::custom_printView', ['filter' => 'auth']);
$routes->match(['get','post'], 'submit-custom', 'POS::submit_custom_pos', ['filter' => 'auth']);
$routes->match(['get','post'], 'insert-custom-data', 'POS::insertData_custom', ['filter' => 'auth']);
$routes->match(['get','post'], 'admin_profile', 'Admin::admin_profile', ['filter' => 'auth']);
$routes->match(['get','post'], 'admins', 'Admin::admins', ['filter' => 'auth']);
$routes->match(['get','post'], 'update_admin_(:any)', 'Admin::update_admin/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'filterByCategory_(:any)', 'Home::filterByCategory/$1', ['filter' => 'auth']);

$routes->match(['get','post'], 'saveUser', 'Account::saveUser', ['filter' => 'auth']);
$routes->match(['get','post'], 'verifyOtp', 'Account::verifyOtp', ['filter' => 'auth']);
$routes->match(['get','post'], 'payment_list', 'Admin::paymentlist', ['filter' => 'auth']);
$routes->match(['get','post'], 'insert_payment', 'Booking::insertpayment', ['filter' => 'auth']);
$routes->match(['get','post'], 'confirm_Payment_(:any)', 'Booking::confirmPayment/$1', ['filter' => 'auth']);
$routes->match(['get','post'], 'saveAdmin', 'Account::saveAdmin', ['filter' => 'auth']);
$routes->match(['get','post'], 'verifyAdminOtp', 'Account::verifyAdminOtp', ['filter' => 'auth']);
$routes->match(['get','post'], 'myprofile', 'Employee::employee_profile', ['filter' => 'auth']);
$routes->match(['get','post'], 'saveMyaccount', 'Employee::saveEmployee', ['filter' => 'auth']);
$routes->match(['get','post'], 'verifymyAccount', 'Employee::verifyEmployeeOtp', ['filter' => 'auth']);

















/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
