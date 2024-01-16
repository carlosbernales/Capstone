<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Account_model;
use App\Models\Category_model;
use App\Models\Product_model;
use App\Models\Cart_model;
use App\Models\Shipping_model;
use App\Models\Order_Item_model;
use App\Models\Ship_Checkout_model;
use App\Models\Order_model;
use App\Models\Customize_model;
use App\Models\Payment_model;
use App\Models\Customization;
use App\Models\City_model;
use App\Models\Barangay_model;
use App\Models\Review_model;
use CodeIgniter\Files\File;
use CodeIgniter\HTTP\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Home extends BaseController
{
    public function landingpage()
    {
        $session = session();

        if ($session->get('isLoggedIn')) {
            $isAdmin = $session->get('isAdmin');
            $isEmployee = $session->get('isEmployee');
            $isSuperAdmin = $session->get('isSuperAdmin');

            if ($isAdmin || $isSuperAdmin){
                return redirect()->to('dashboard');
            } elseif ($isEmployee) {
                return redirect()->to('to_pay_orders');
            } else {
                return redirect()->to('home');
            }
        }

        return view('home/landing_page');
    }
    
    public function about_us(){
        $session = session();

        if ($session->get('isLoggedIn')) {
            $isAdmin = $session->get('isAdmin');
            $isEmployee = $session->get('isEmployee');
            $isSuperAdmin = $session->get('isSuperAdmin');

            if ($isAdmin || $isSuperAdmin){
                return redirect()->to('dashboard');
            } elseif ($isEmployee) {
                return redirect()->to('to_pay_orders');
            } else {
                return redirect()->to('home');
            }
        }

        return view('home/about_us');
    }
    
    public function contact_us(){
        $session = session();

        if ($session->get('isLoggedIn')) {
            $isAdmin = $session->get('isAdmin');
            $isEmployee = $session->get('isEmployee');
            $isSuperAdmin = $session->get('isSuperAdmin');

            if ($isAdmin || $isSuperAdmin){
                return redirect()->to('dashboard');
            } elseif ($isEmployee) {
                return redirect()->to('to_pay_orders');
            } else {
                return redirect()->to('home');
            }
        }

        return view('home/contact_us');
    }
    
    public function faq(){
        $session = session();

        if ($session->get('isLoggedIn')) {
            $isAdmin = $session->get('isAdmin');
            $isEmployee = $session->get('isEmployee');
            $isSuperAdmin = $session->get('isSuperAdmin');

            if ($isAdmin || $isSuperAdmin){
                return redirect()->to('dashboard');
            } elseif ($isEmployee) {
                return redirect()->to('to_pay_orders');
            } else {
                return redirect()->to('home');
            }
        }

        return view('home/faq');
    }


    public function home()
    {
        $data = [];
        $useSessionData = session()->get();

        if (empty($useSessionData['id'])) {
            return redirect()->to('/'); // Redirect to the landing page
        }
        $Category_model = new Category_model();
        $Product_model = new Product_model();
        $Order_model = new Order_model();
        $Order_Item_model = new Order_Item_model();
        $Cart_model = new Cart_model();
        $Review_model = new Review_model();


        $data = [
            'best_seller' => $Order_model
            ->join('order_item', 'order_item.fk_order_id = orderdata.id')
            ->whereIn('order_status',['Completed', 'Received'])
            ->whereIn('order_type', ['COD', 'Online', 'Pick Up', 'Pick Up (Paid)'])
            ->groupBy('item_name')
            ->orderBy('item_qty', 'desc')
            ->limit(4)
            ->find(),
           
            'cart_items' => $Product_model
            ->select('product.id,
            product.product_name,
            product.product_des,
            product.product_qty as productquantity,
            product.product_image,
            product.product_price,
            cart.id as Cartid,
            cart.fk_product_id,
            cart.fk_user_id,
            cart.cart_qty as CartQty,
            cart.cart_cost')
            ->where('cart.fk_user_id', $useSessionData['id'])
            ->join('cart', 'cart.fk_product_id = product.id')
            ->findAll(),

            'category' => $Category_model->findAll(),
            'product' => $Product_model->findAll()
        ];
        $data['reviews'] = $Review_model->findAll(); // Get all reviews
        $ratingSum = $Review_model->selectSum('rating')->where('product_id')->first()['rating'];
        
        // Calculate the average rating
        $averageRating = 0;
        if (!empty($data['reviews'])) {
            $averageRating = $ratingSum / count($data['reviews']);
        }
        
        $data['average_rating'] = $averageRating;
         return view('home/homes', $data);
    }
    
    public function productdetails($id)
    {
        $data = [];
        $useSessionData = session()->get();

        if (empty($useSessionData['id'])) {
            return redirect()->to('/'); // Redirect to the landing page
        }
        $Category_model = new Category_model();
        $Product_model = new Product_model();
        $Review_model = new Review_model();
        $Cart_model = new Cart_model();
        $Order_model = new Order_model();
        $Order_Item_model = new Order_Item_model();
        $data = [
            'best_seller' => $Order_model
            ->join('order_item', 'order_item.fk_order_id = orderdata.id')
            ->whereIn('order_status',['Completed', 'Received'])
            ->whereIn('order_type', ['COD', 'Online', 'Pick Up', 'Pick Up (Paid)'])
            ->groupBy('item_name')
            ->orderBy('item_qty', 'desc')
            ->limit(4)
            ->find(),

            'cart_items' => $Product_model
                ->select( 'product.id,
                product.product_name,
                product.product_des,
                product.product_qty as productquantity,
                product.product_image,
                product.product_price,
                cart.id as Cartid,
                cart.fk_product_id,
                cart.cart_qty as CartQty,
                cart.cart_cost')
                ->where('cart.fk_user_id', $useSessionData['id'])
                ->join('cart', 'cart.fk_product_id = product.id')
                ->findAll(),

            'category' => $Category_model->findAll(),
            'product' => $Product_model->findAll()
        ];

        $data['category'] = $Category_model->findAll();

        $Product_model->select(
            'product.id,
            product.product_name,
            product.product_des,
            product.product_qty as productquantity,
            product.product_image,
            product.product_price,
            cart.id as Cartid,
            cart.fk_product_id,
            cart.cart_qty as CartQty,
            cart.cart_cost'
        );

        $Product_model->where('product.id', $id);
        $Product_model->join('cart', 'cart.fk_product_id= product.id', 'left');
        $Product_details = $Product_model->first();
        $data['productdetails'] = $Product_details;
        
        $data['review'] = $Review_model->where('product_id', $id)->findAll();

        $data['reviews'] = $Review_model->findAll(); // Get all reviews
        $ratingSum = $Review_model->selectSum('rating')->where('product_id', $id)->first()['rating'];
        
        // Calculate the average rating
        $averageRating = 0;
        if (!empty($data['reviews'])) {
            $averageRating = $ratingSum / count($data['reviews']);
        }
        
        $data['average_rating'] = $averageRating;

        return view('home/productdetails', $data);
    }
    
    public function product_grids(){
        $data = [];
        $useSessionData = session()->get();

        if (empty($useSessionData['id'])) {
            return redirect()->to('/'); // Redirect to the landing page
        }
        $Product_model = new Product_model();
        $Review_model = new Review_model();
        $Cart_model = new Cart_model();
        $Category_model = new Category_model();
        $useSessionData = session()->get();

        $data = [
            'cart_items' => $Product_model
            ->select( 'product.id,
            product.product_name,
            product.product_des,
            product.product_qty as productquantity,
            product.product_image,
            product.product_price,
            cart.id as Cartid,
            cart.fk_product_id,
            cart.cart_qty as CartQty,
            cart.cart_cost')
            ->where('cart.fk_user_id', $useSessionData['id'])
            ->join('cart', 'cart.fk_product_id = product.id')
            ->findAll(),

            'product' => $Product_model->findAll(),
            'reviews' => $Review_model->findAll(),
            'category' => $Category_model->findAll(),
        ];

        $ratingSum = $Review_model->selectSum('rating')->where('product_id')->first()['rating'];
        // Calculate the average rating
        $averageRating = 0;
        if (!empty($data['reviews'])) {
            $averageRating = $ratingSum / count($data['reviews']);
        }
        
        $data['average_rating'] = $averageRating;
        return view('home/product_grids', $data);
    }
    
    public function my_account() { 
        $data = [];
        $useSessionData = session()->get();
    
        if (empty($useSessionData['id'])) {
            return redirect()->to('/'); // Redirect to the landing page
        }
    
        $Product_model = new Product_model();
        $Category_model = new Category_model();
        $Cart_model = new Cart_model();
        $Account_model = new Account_model(); 
        
        $userData = $Account_model->find($useSessionData['id']);
    
        if (!$userData) {
            return redirect()->to('/');
        }
    
    $data = [
      
        'cart_items' => $Product_model
        ->select('product.id,
        product.product_name,
        product.product_des,
        product.product_qty as productquantity,
        product.product_image,
        product.product_price,
        cart.id as Cartid,
        cart.fk_product_id,
        cart.fk_user_id,
        cart.cart_qty as CartQty,
        cart.cart_cost')
        ->where('cart.fk_user_id', $useSessionData['id'])
        ->join('cart', 'cart.fk_product_id = product.id')
        ->findAll(),
        'category' => $Category_model->findAll(),
        'userData' => $userData,

        
    ];
    
        return view('home/my_account', $data);
    }


    public function flower_bouquet_list()
    {
        $data = [];
        $useSessionData = session()->get();

        if (empty($useSessionData['id'])) {
            return redirect()->to('/'); // Redirect to the landing page
        }
        $Category_model = new Category_model();
        $Product_model = new Product_model();
        $Review_model = new Review_model();
        $Product_model->select('product.id,
        product.product_name,
        product.product_des,
        product.product_qty as productquantity,
        product.product_image,
        product.product_price,
        cart.id as Cartid,
        cart.fk_product_id,
        cart.cart_qty as CartQty,
        cart.cart_cost');
        $Product_model->where('cart.fk_user_id', $useSessionData['id']);
        $Product_model->join('cart', 'cart.fk_product_id = product.id');
        $data['cart_items'] = $Product_model->findAll();
        $data['category'] = $Category_model->findAll();
        $data['product'] = $Product_model->where('cat_name', 'Flowers Bouquet')->findAll();
        $data['main_content'] = 'home/flowers/flower_bouquet';

        $data['reviews'] = $Review_model->findAll(); // Get all reviews
        $ratingSum = $Review_model->selectSum('rating')->where('product_id')->first()['rating'];
        
        // Calculate the average rating
        $averageRating = 0;
        if (!empty($data['reviews'])) {
            $averageRating = $ratingSum / count($data['reviews']);
        }
        
        $data['average_rating'] = $averageRating;

        return view('home/productdetails', $data);
    }

    public function money_bouquet_list()
    {
        $data = [];
        $useSessionData = session()->get();

        if (empty($useSessionData['id'])) {
            return redirect()->to('/'); // Redirect to the landing page
        }
        $Category_model = new Category_model();
        $Product_model = new Product_model();
        $Review_model = new Review_model();
        $Product_model->select('product.id,
        product.product_name,
        product.product_des,
        product.product_qty as productquantity,
        product.product_image,
        product.product_price,
        cart.id as Cartid,
        cart.fk_product_id,
        cart.cart_qty as CartQty,
        cart.cart_cost');
        
        $Product_model->where('cart.fk_user_id', $useSessionData['id']);
        $Product_model->join('cart', 'cart.fk_product_id = product.id');
        $data['cart_items'] = $Product_model->findAll();
        $data['category'] = $Category_model->findAll();
        $data['product'] = $Product_model->where('cat_name', 'Money Bouquet')->findAll();
        $data['main_content'] = 'home/flowers/money_bouquet';

        $data['reviews'] = $Review_model->findAll(); // Get all reviews
        $ratingSum = $Review_model->selectSum('rating')->where('product_id')->first()['rating'];
        
        // Calculate the average rating
        $averageRating = 0;
        if (!empty($data['reviews'])) {
            $averageRating = $ratingSum / count($data['reviews']);
        }
        
        $data['average_rating'] = $averageRating;

        return view('includes/template', $data);
    }

    public function dried_bouquet_list()
    {
        $data = [];
        $useSessionData = session()->get();
        if (empty($useSessionData['id'])) {
            return redirect()->to('/'); // Redirect to the landing page
        }
        $Category_model = new Category_model();
        $Product_model = new Product_model();
        $Review_model = new Review_model();
        $Product_model->select('product.id,
        product.product_name,
        product.product_des,
        product.product_qty as productquantity,
        product.product_image,
        product.product_price,
        cart.id as Cartid,
        cart.fk_product_id,
        cart.cart_qty as CartQty,
        cart.cart_cost');
        $Product_model->where('cart.fk_user_id', $useSessionData['id']);
        $Product_model->join('cart', 'cart.fk_product_id = product.id');
        $data['cart_items'] = $Product_model->findAll();
        $data['category'] = $Category_model->findAll();
        $data['product'] = $Product_model->where('cat_name', 'Dried Flowers Bouquet')->findAll();
        $data['main_content'] = 'home/flowers/dried_bouquet';
        

        $data['reviews'] = $Review_model->findAll(); // Get all reviews
        $ratingSum = $Review_model->selectSum('rating')->where('product_id')->first()['rating'];
        
        // Calculate the average rating
        $averageRating = 0;
        if (!empty($data['reviews'])) {
            $averageRating = $ratingSum / count($data['reviews']);
        }
        
        $data['average_rating'] = $averageRating;

        return view('includes/template', $data);
    }

    public function funeral_list()
    {
        $data = [];
        $useSessionData = session()->get();

        if (empty($useSessionData['id'])) {
            return redirect()->to('/'); // Redirect to the landing page
        }
        $Category_model = new Category_model();
        $Product_model = new Product_model();
        $Product_model->select('product.id,
        product.product_name,
        product.product_des,
        product.product_qty as productquantity,
        product.product_image,
        product.product_price,
        cart.id as Cartid,
        cart.fk_product_id,
        cart.cart_qty as CartQty,
        cart.cart_cost');
        $Product_model->where('cart.fk_user_id', $useSessionData['id']);
        $Product_model->join('cart', 'cart.fk_product_id = product.id');
        $data['cart_items'] = $Product_model->findAll();
        $data['category'] = $Category_model->findAll();
        $data['product'] = $Product_model->where('cat_name', 'Funeral')->findAll();
        $data['main_content'] = 'home/occasions/funeral';
        return view('includes/template', $data);
    }

    public function inaugural_list()
    {
        $data = [];
        $useSessionData = session()->get();

        if (empty($useSessionData['id'])) {
            return redirect()->to('/'); // Redirect to the landing page
        }
        $Category_model = new Category_model();
        $Product_model = new Product_model();
        $Product_model->select('product.id,
        product.product_name,
        product.product_des,
        product.product_qty as productquantity,
        product.product_image,
        product.product_price,
        cart.id as Cartid,
        cart.fk_product_id,
        cart.cart_qty as CartQty,
        cart.cart_cost');
        $Product_model->where('cart.fk_user_id', $useSessionData['id']);
        $Product_model->join('cart', 'cart.fk_product_id = product.id');
        $data['cart_items'] = $Product_model->findAll();
        $data['category'] = $Category_model->findAll();
        $data['product'] = $Product_model->where('cat_name', 'Inaugural')->findAll();
        $data['main_content'] = 'home/occasions/inaugural';
        return view('includes/template', $data);
    }

    public function orders()
    {
    $data = [];
    $useSessionData = session()->get();
    if (empty($useSessionData['id'])) {
        return redirect()->to('/'); // Redirect to the landing page
    }
    $Product_model = new Product_model();
    $Category_model = new Category_model();
    $Order_Item_model = new Order_Item_model();
    $Order_model = new Order_model();
    $Cart_model = new Cart_model();
    $Customize_model = new Customize_model();
    $order_id = $this->request->getVar('fk_order_id');

    
    $data = [
        
        'pendingOrders' => $Order_model
            ->where('fk_user_id', $useSessionData['id'])
            ->whereIn('order_status', ['Pending', 'Request', 'Settle', 'Agree'])
            ->findAll(),

        'accepted' => $Order_model
            ->where('fk_user_id', $useSessionData['id'])
            ->where('order_status', 'To Pay')
            ->findAll(),

        'deliver' => $Order_model
            ->where('fk_user_id', $useSessionData['id'])
            ->where('order_status', 'To Deliver')
            ->findAll(),
        
        'pick_up' => $Order_model
            ->where('fk_user_id', $useSessionData['id'])
            ->where('order_status', 'Ready')
            ->findAll(), 
        

        'count_pending' => $Order_model
            ->where('fk_user_id', $useSessionData['id'] )
            ->whereIn('order_status', ['Pending', 'Request','Settle','Agree'])
            ->countAllResults(),

        'count_accepted' => $Order_model
            ->where('fk_user_id', $useSessionData['id'] )
            ->whereIn('order_status', ['To Pay'])
            ->countAllResults(),

        'count_deliver' => $Order_model
            ->where('fk_user_id', $useSessionData['id'] )
            ->whereIn('order_status', ['To Deliver'])
            ->countAllResults(),

        'count_pick_up' => $Order_model
            ->where('fk_user_id', $useSessionData['id'] )
            ->whereIn('order_status', ['Ready'])
            ->countAllResults(),


        'count_completed' => $Order_model
            ->where('fk_user_id', $useSessionData['id'] )
            ->whereIn('order_status', ['Completed'])
            ->countAllResults(),

        'count_cancelled' => $Order_model
            ->where('fk_user_id', $useSessionData['id'] )
            ->whereIn('order_status', ['Cancelled'])
            ->countAllResults(),

        'cart_items' => $Product_model
        ->select('product.id,
        product.product_name,
        product.product_des,
        product.product_qty as productquantity,
        product.product_image,
        product.product_price,
        cart.id as Cartid,
        cart.fk_product_id,
        cart.fk_user_id,
        cart.cart_qty as CartQty,
        cart.cart_cost')
        ->where('cart.fk_user_id', $useSessionData['id'])
        ->join('cart', 'cart.fk_product_id = product.id')
        ->findAll(),

          
            
        'completed' => $Order_model
            ->where('fk_user_id', $useSessionData['id'] )
            ->whereIn('order_status', ['Completed', 'Received'])
            ->findAll(),

        'cancelled' => $Order_model
            ->where('fk_user_id', $useSessionData['id'] )
            ->whereIn('order_status', ['Cancelled'])
            ->findAll(),

        'order_status' => $Order_model
            ->where('fk_user_id', $useSessionData['id'])
            ->where('order_status', 'Completed')
            ->findAll(),
            

        'Order_Item_model' => $Order_Item_model,
        
        'category' => $Category_model->findAll(),
    ];
    


    return view('home/orders', $data);
    }


    public function view_items($id){
        
        $useSessionData = session()->get();
        $Order_model = new Order_model();
        $Order_Item_model = new Order_Item_model();
        $Product_model = new Product_model();
        $data = [
            'cart_items' => $Product_model
            ->select('*')
            ->where('cart.fk_user_id', $useSessionData['id'])
            ->join('cart', 'cart.fk_product_id = product.id')
            ->findAll(),

            'view_items' => $Order_Item_model
            ->join('orderdata', 'orderdata.id = order_item.fk_order_id')
            ->where('fk_user_id', $useSessionData['id'])
            ->groupBy('order_id')
            ->findAll(),

        ];
        $data['main_content'] = 'home/view_items';
        return view('includes/template', $data);
    }

    public function ordersdelete($id){
        $Order_Item_model = new Order_Item_model();
        $Order_Item_model->delete($id);
        return redirect()->to('orders')
        ->with('status_icon', 'success')
        ->with('status', 'Deleted successfully');
    }

    

    public function addtocart()
    {
        $product = new Product_model();
        $Cart_model = new Cart_model();
        $useSessionData = session()->get();
        if($this->request->getmethod()=='post')
        {
            $returnarray = array();
            $productId = $this->request->getVar('productId');
            $userId = $this->request->getVar('userId');
            $data = array(
                'fk_product_id' => $this->request->getVar('productId'),
                'cart_qty' => 1,
                'cart_cost' => $this->request->getVar('Cost'),
                'fk_user_id' => $this->request->getVar('userId')
            );
            $Product_details = $Cart_model->where('fk_product_id', $productId)->where('fk_user_id', $userId)->findAll();
            $cartcount = $Cart_model->where('fk_user_id', $userId)->countAll();

            if(count($Product_details)==1)
            {
                $oldqty = $Product_details[0]['cart_qty'];
                $id = $Product_details[0]['id'];
                $update_data = array(
                    'cart_qty' => $oldqty + 1,
                );

                if($Cart_model->update($id, $update_data))
                {
                    $product->select(
                        'product.id,
                        product.product_name,
                        product.product_des,
                        product.product_qty as productquantity,
                        product.product_image,
                        product.product_price,
                        cart.id as Cartid,
                        cart.fk_product_id,
                        cart.fk_user_id,
                        cart.cart_qty as CartQty,
                        cart.cart_cost'
                        );
                    $product->where('cart.fk_user_id', $useSessionData['id']);
                    $product->join('cart', 'cart.fk_product_id= product.id');
                    $cart_items = $product->findAll();
                    $totalItemPrice = 0;
                    $subtotal = 0;
                    foreach($cart_items as $cart_data)
                    {
                        $totalItemPrice += $cart_data['cart_cost'] * $cart_data['CartQty'];
                        $subtotal += $cart_data['cart_cost'] * $cart_data['CartQty'];
                    }

                    $returnarray = array(
                        'status' => 'success',
                        'cart_qty' => $oldqty + 1,
                        'count' => $cartcount,
                        'totalItemPrice' => $totalItemPrice,
                        'subtotal' => $subtotal
                    );
                    // echo json_encode($returnarray);
                }else{

                }

            }else{
                if($Cart_model->save($data))
                {
                    $product->select(
                        'product.id,
                        product.product_name,
                        product.product_des,
                        product.product_qty as productquantity,
                        product.product_image,
                        product.product_price,
                        cart.id as Cartid,
                        cart.fk_product_id,
                        cart.fk_user_id,
                        cart.cart_qty as CartQty,
                        cart.cart_cost'
                        );
                    $product->where('cart.fk_user_id', $useSessionData['id']);
                    $product->join('cart', 'cart.fk_product_id= product.id');
                    $cart_items = $product->findAll();
                    $totalItemPrice = 0;
                    $subtotal = 0;
                    foreach($cart_items as $cart_data)
                    {
                        $totalItemPrice += $cart_data['cart_cost'] * $cart_data['CartQty'];
                        $subtotal += $cart_data['cart_cost'] * $cart_data['CartQty'];
                    }
                    $returnarray = array(
                        'status' => 'success',
                        'cart_qty' => 1,
                        'count' => $cartcount + 1,
                        'totalItemPrice' => $totalItemPrice,
                        'subtotal' => $subtotal
                    );
                }else{

                }
            }
            echo json_encode($returnarray);
        }
    }


    
    public function decrement()
    {
        $Cart_model = new Cart_model();
        $product = new Product_model();
        $useSessionData = session()->get();
        if($this->request->getmethod()=='post')
        {
            $returnarray = array();
            $productId = $this->request->getVar('productId');
            $userId = $this->request->getVar('userId');

            $Product_details = $Cart_model->where('fk_product_id', $productId)->where('fk_user_id', $userId)->findAll();
            $cartcount = $Cart_model->where('fk_user_id', $userId)->countAll();
            $oldqty = $Product_details[0]['cart_qty'];
            $id = $Product_details[0]['id'];
            if($oldqty == 1)
            {
                if($Cart_model->where('id', $id)->delete())
                {
                    $product->select(
                        'product.id,
                        product.product_name,
                        product.product_des,
                        product.product_qty as productquantity,
                        product.product_image,
                        product.product_price,
                        cart.id as Cartid,
                        cart.fk_product_id,
                        cart.fk_user_id,
                        cart.cart_qty as CartQty,
                        cart.cart_cost'
                        );
                    $product->where('cart.fk_user_id', $useSessionData['id']);
                    $product->join('cart', 'cart.fk_product_id= product.id');
                    $cart_items = $product->findAll();
                    $totalItemPrice = 0;
                    $subtotal = 0;
                    foreach($cart_items as $cart_data)
                    {
                        $totalItemPrice += $cart_data['cart_cost'] * $cart_data['CartQty'];
                        $subtotal += $cart_data['cart_cost'] * $cart_data['CartQty'];
                    }

                    $returnarray = array(
                        'status' => 'deleted',
                        'count' => $cartcount - 1,
                        'totalItemPrice' => $totalItemPrice,
                        'subtotal' => $subtotal
                    );
                }
            }else{
                    $update_data = array(
                            'cart_qty' => $oldqty - 1,
                        );
                if($Cart_model->update($id, $update_data))
                {
                    $product->select(
                        'product.id,
                        product.product_name,
                        product.product_des,
                        product.product_qty as productquantity,
                        product.product_image,
                        product.product_price,
                        cart.id as Cartid,
                        cart.fk_product_id,
                        cart.fk_user_id,
                        cart.cart_qty as CartQty,
                        cart.cart_cost'
                        );
                    $product->where('cart.fk_user_id', $useSessionData['id']);
                    $product->join('cart', 'cart.fk_product_id= product.id');
                    $cart_items = $product->findAll();
                    $totalItemPrice = 0;
                    $subtotal = 0;
                    foreach($cart_items as $cart_data)
                    {
                        $totalItemPrice += $cart_data['cart_cost'] * $cart_data['CartQty'];
                        $subtotal += $cart_data['cart_cost'] * $cart_data['CartQty'];
                    }
                    $returnarray = array(
                        'status' => 'success',
                        'cart_qty' => $oldqty - 1,
                        'count' => $cartcount,
                        'totalItemPrice' => $totalItemPrice,
                        'subtotal' => $subtotal
                    );
                }else{

                }
            }
            echo json_encode($returnarray);

        }
    }

    public function removeItem()
    {
        $Cart_model = new Cart_model();
        if($this->request->getmethod()=='post')
        {
            $cartId = $this->request->getVar('cartId');
            if($Cart_model->where('id', $cartId)->delete())
            {
                $returnarray = array(
                    'status' => 'success'
                );
                echo json_encode($returnarray);
            }
        }
    }

    public function cart()
    {
        $useSessionData = session()->get();
        $data = [];
        $Category_model = new Category_model();
        $Cart_model = new Cart_model();
        $product = new Product_model();
        $product->select(
            'product.id,
            product.product_name,
            product.product_des,
            product.product_qty as productquantity,
            product.product_image,
            product.product_price,
            cart.id as Cartid,
            cart.fk_product_id,
            cart.fk_user_id,
            cart.cart_qty as CartQty,
            cart.cart_cost'
            );
        $product->where('cart.fk_user_id', $useSessionData['id']);
        $product->join('cart', 'cart.fk_product_id= product.id');
        $data['cart_items'] = $product->findAll();
        $totalItemPrice = 0;
        $data['category'] = $Category_model->findAll();
        return view('home/cart', $data);;
    }

    public function checkout()
    {

        $data = [];
        $useSessionData = session()->get();

        if (empty($useSessionData['id'])) {
            return redirect()->to('/'); // Redirect to the landing page
        }
        $Category_model = new Category_model();
        $product = new Product_model();
        $Shipping_model = new Shipping_model();
        $cityModel = new City_model();
        $Ship_Checkout_model = new Ship_Checkout_model();
        $Account_model = new Account_model();
        
        $product->select(
            'product.id,
            product.product_name,
            product.product_des,
            product.product_qty as productquantity,
            product.product_image,
            product.product_price,
            cart.id as Cartid,
            cart.fk_product_id,
            cart.fk_user_id,
            cart.cart_qty as CartQty,
            cart.cart_cost'
            );
        $product->where('cart.fk_user_id', $useSessionData['id']);
        $product->join('cart', 'cart.fk_product_id= product.id');
        $data['ship_info'] = $Shipping_model->where('fk_user_id', $useSessionData['id'])->findAll();
        $data['shipinfo_checkout'] = $Ship_Checkout_model->where('fk_user_id', $useSessionData['id'])->findAll();
        $data['cart_items'] = $product->findAll();
        $data['category'] = $Category_model->findAll();
        
        $data ['superadminAccounts'] = $Account_model->where('role', 'Superadmin')->findAll();
        $cities = $cityModel->findAll();
        $data['cities'] = json_decode(json_encode($cities));
        $data['ship_info'] = $Shipping_model->where('fk_user_id', $useSessionData['id'])->findAll();
        
        return view('home/checkout', $data);
    }

    
    public function shipaddress()
    {
        $Ship_Checkout_model = new Ship_Checkout_model();

        $fkUserId = $this->request->getPost('fk_user_id');

        $data = [
            'firstname' => $this->request->getPost('firstname'),
            'lastname' => $this->request->getPost('lastname'),
            'contact' => $this->request->getPost('contact'),
            'selected_city' => $this->request->getPost('selected_city'),
            'selected_barangay' => $this->request->getPost('selected_barangay'),
            'barangay_id' => $this->request->getPost('barangay_id'),
            'shipping_fee' => $this->request->getPost('shipping_fee'),
            'city_id' => $this->request->getPost('city_id'),
            'other_infoaddres' => $this->request->getPost('other_infoaddres'),
            'fk_user_id' => $fkUserId,
        ];

        $existingRecord = $Ship_Checkout_model->where('fk_user_id', $fkUserId)->first();

        if ($existingRecord) {
            $Ship_Checkout_model->update($existingRecord['id'], $data);
        } else {
            $Ship_Checkout_model->insert($data);
        }
        
            return redirect()->back()
             ->with('status_icon', 'success')
             ->with('status', 'Address Changed');
    }
    


    public function addshipping_info()
    {
        $Shipping_model = new Shipping_model();
        $useSessionData = session()->get();
        $data = [];
        if($this->request->getmethod()=='post')
        {
            $data = array(
                'firstname' => $this->request->getVar('firstname'),
                'lastname' => $this->request->getVar('lastname'),
                'contact' => $this->request->getVar('contact'),
                'selected_city' => $this->request->getVar('selected_city'),
                'selected_barangay' => $this->request->getVar('selected_barangay'),
                'barangay_id' => $this->request->getVar('barangay_id'),
                'shipping_fee' => $this->request->getVar('shipping_fee'),
                'city_id' => $this->request->getVar('city_id'),
                'other_infoaddres' => $this->request->getVar('other_infoaddres'),
                'fk_user_id' => $useSessionData['id'],
            );
            if($Shipping_model->insert($data))
            {
                $lastinsertID = $Shipping_model->getInsertID();
                $response = array(
                    'status' => 'success',
                    'lastinsertID' => $lastinsertID,
                );
            } else {
                $response = array(
                    'status' => 'failed',
                );
            }
            echo json_encode($response);
        }
    }

   public function proceed_to_order()
    {
        $data = [];
        $Cart_model = new Cart_model();
        $product = new Product_model();
        $Order_model = new Order_model();
        $Order_Item_model = new Order_Item_model();
        $Ship_Checkout_model = new Ship_Checkout_model();
        $Shipping_model = new Shipping_model();
        $useSessionData = session()->get();
        if($this->request->getmethod()=='post')
        {
            $deliveryinfo = $this->request->getVar('deliveryinfo');
            $paymentmethod = $this->request->getVar('paymentmethod');
            
            $product->select(
                'product.id,product.product_name,
                product.product_des,
                product.product_qty as productquantity,
                product.product_image,
                product.id,
                product.product_price,
                cart.id as Cartid,
                cart.fk_product_id,
                cart.fk_user_id,
                cart.cart_qty as CartQty,
                cart.cart_cost'
                );
            $product->where('cart.fk_user_id', $useSessionData['id']);
            $product->join('cart', 'cart.fk_product_id= product.id');
            $cart_items = $product->findAll();
            $totalItemPrice = 0;
            $subtotal = 0;
            foreach($cart_items as $key => $cart_data)
            {
                $subtotal += $cart_data['cart_cost'] * $cart_data['CartQty'];
            }   
                
            
                $shipping_fee = $this->request->getVar('shipping_fee');
                $firstname = $this->request->getVar('firstname');
                $lastname = $this->request->getVar('lastname');
                $contact = $this->request->getVar('contact');
                $selected_city = $this->request->getVar('selected_city');
                $selected_barangay = $this->request->getVar('selected_barangay');
                $other_infoaddres = $this->request->getVar('other_infoaddres');

                $user_email = $useSessionData['email'];
                $ss_payment = $this->request->getVar('proof_payment');
                $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $digits = '0123456789';

                $randomString = substr(str_shuffle($characters), 0, 5) . substr(str_shuffle($digits), 0, 9);
                $orderId = '#' . str_shuffle($randomString);
                
                if ($paymentmethod === 'Pick Up' || $paymentmethod === 'Pick Up (Paid)') {
                    $shipping_fee = 0;
                }

                $orderdata = array(
                    'order_id' => $orderId,
                    'order_amount' => $subtotal,
                    'user_email' => $user_email,
                    'fk_user_id' => $useSessionData['id'],
                    'order_type' => $paymentmethod,
                    'proof_payment' => $ss_payment,
                    'delivery_id' => $deliveryinfo,
                    'shipping_fee' => $shipping_fee,
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'contact' => $contact,
                    'selected_city' => $selected_city,
                    'selected_barangay' => $selected_barangay,
                    'other_infoaddres' => $other_infoaddres,
                    'flower_sizeOrtype' => 'Order',
                );
                if($Order_model->insert($orderdata))
                {
                $order_id = $Order_model->getInsertID();
                foreach($cart_items as $key => $cart_data)
                {
                    $orderItemdata = array(
                        'fk_user_id' => $useSessionData['id'],
                        'fk_order_id' => $order_id,
                        'item_image' => $cart_data['product_image'],
                        'product_id' => $cart_data['id'],
                        'item_name' => $cart_data['product_name'],
                        'item_amount' => $cart_data['cart_cost'],
                        'item_qty' => $cart_data['CartQty'],
                        'total_amount' => $subtotal,
                    );
                    $data = $Order_Item_model->save($orderItemdata);
                }
                    if($data){
                        if($Cart_model = $Cart_model->where('fk_user_id', $useSessionData['id'])->delete())
                        {
                            $response = array('status' => 'success', 'orderdata' => $orderdata);
                        };
                        $response = array('status' => 'success', 'orderdata' => $orderdata);
                    } else {
                        $response = array('status' => 'failed');
                    }
                echo json_encode($response);
            }
        }
    }

    public function order_success($orderId)
    {
        $data = [];
        $useSessionData = session()->get();
        $Product_model = new Product_model();
        $Order_model = new Order_model();
        $Order_Item_model = new Order_Item_model();
        $Category_model = new Category_model();
        $data['category'] = $Category_model->findAll();
        $data['order_data'] = $Order_model->where('fk_user_id', $useSessionData['id'])->findAll();
        $data['orderId'] = $orderId;
        $Product_model->select('*');
        $Product_model->where('cart.fk_user_id', $useSessionData['id']);
        $Product_model->join('cart', 'cart.fk_product_id = product.id');
        $data['cart_items'] = $Product_model->findAll();
     
        return view('home/order_success', $data);
    }

    public function payment()
    {
        $data = [];
        $Payment_model = new Payment_model();
        $useSessionData = session()->get();
        if($this->request->getmethod()=='post')
        {
            $validation = [
              'proof_image' => [
                'label' => 'Image File',
                'rules' => 'uploaded[proof_image]'
                . '|is_image[proof_image]'
                . '|mime_in[proof_image,image/jpg,image/jpeg,image/png]'
              ]
            ];
            if(!$this->validate($validation))
            {
                $data['validation'] = $this->validator;
            }else{
                $file = $this->request->getFile('proof_image');

                if($file->isValid() && ! $file->hasMoved())
                {
                    $ss_payment = $file->getRandomName();
                    $file->move('public/ss_payment/', $ss_payment);
                }
                    $data = array(
                        'fk_userid' => $useSessionData['id'],
                        'name' => $this->request->getVar('name'),
                        'gcash_number' => $this->request->getVar('gcash_number'),
                        'total_payment' => $this->request->getVar('total_payment'),
                        'proof_image' => $ss_payment
                    );
                    if ($Payment_model->save($data)) {
                        return redirect()->back();
                        $data['Flash_message'] = true;
                    }
                }
            }
  
        return view('home/payment', $data);
    }
public function filterByCategory($categoryId)
    {
        $data = [];
        $useSessionData = session()->get();

        if (empty($useSessionData['id'])) {
            return redirect()->to('/'); // Redirect to the landing page
        }
        
        // Load your model for categories and products
        $Category_model = new Category_model();
        $Product_model = new Product_model();
         $Review_model = new Review_model();
         $Order_model = new Order_model();
         

        // Fetch the selected category
        $category = $Category_model->find($categoryId);

        if ($category) {
            // Fetch products based on the selected category
            $filteredProducts = $Product_model->where('category_id', $categoryId)->findAll();

            // Pass the filtered products and category to the view
            $data = [
                'best_seller' => $Order_model
            ->join('order_item', 'order_item.fk_order_id = orderdata.id')
            ->whereIn('order_status',['Completed', 'Received'])
            ->whereIn('order_type', ['COD', 'Online', 'Pick Up', 'Pick Up (Paid)'])
            ->groupBy('item_name')
            ->orderBy('item_qty', 'desc')
            ->limit(4)
            ->find(),
           
            'cart_items' => $Product_model
            ->select('product.id,
            product.product_name,
            product.product_des,
            product.product_qty as productquantity,
            product.product_image,
            product.product_price,
            cart.id as Cartid,
            cart.fk_product_id,
            cart.fk_user_id,
            cart.cart_qty as CartQty,
            cart.cart_cost')
            ->where('cart.fk_user_id', $useSessionData['id'])
            ->join('cart', 'cart.fk_product_id = product.id')
            ->findAll(),
                'category' => $category,
                'products' => $filteredProducts,
                'categories' => $Category_model->findAll(),
            ];
            $data['reviews'] = $Review_model->findAll(); // Get all reviews
        $ratingSum = $Review_model->selectSum('rating')->where('product_id')->first()['rating'];
        
        // Calculate the average rating
        $averageRating = 0;
        if (!empty($data['reviews'])) {
            $averageRating = $ratingSum / count($data['reviews']);
        }
        
        $data['average_rating'] = $averageRating;

            return view('home/product-grids', $data);
        } else {
            // Handle the case when the category does not exist
            return redirect()->to('/home')->with('error', 'Category not found.');
        }
    }
}
