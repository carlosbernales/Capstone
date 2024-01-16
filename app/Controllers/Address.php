<?php

namespace App\Controllers;
use App\Models\City_model;
use App\Models\Barangay_model;
use App\Models\Shipping_model;
use App\Models\Ship_Checkout_model;
use App\Models\Product_model;
use App\Models\Order_model;
use App\Models\Review_model;
use App\Models\Booking_model;
use App\Models\Category_model;


class Address extends BaseController
{

    public function brgy_list()
    {   
        $data = [];
        if (!session()->get('isLoggedIn') || (!session()->get('isAdmin') && !session()->get('isSuperAdmin'))) {
            return redirect()->to('/'); // Redirect to landing page if not logged in as admin or superadmin
        }
        $City_model = new City_model();
        $Barangay_model = new Barangay_model();
        $Order_model = new Order_model();
        $Review_model = new Review_model();
        $Booking_model = new Booking_model();
        $toshipOrders = $Order_model
        ->where('order_status', 'To Pay')->findAll();

        $onthewayOrders = $Order_model
        ->where('order_status', 'To Deliver')->findAll();

        $user_info = [
            'firstname' => session()->get('firstname'),
            'lastname' => session()->get('lastname'),
            'email' => session()->get('email'),
            'phone' => session()->get('phone'),
            'address' => session()->get('address'),
            'password' => session()->get('password'),
        ];

        $data=[
            'cities' => $City_model->findAll(),
            'barangays' => $Barangay_model->findAll(),
            'newOrders' => $Order_model->where('order_status', 'Pending')->findAll(),
            'newcomment' => $Review_model->where('status', 'Pending')->findAll(),
            'newBooking' => $Booking_model->where('status', 'Pending')->findAll(),
            'user_info' => $user_info, // Pass user information to the view
            'toshipOrders' => $toshipOrders,
            'onthewayOrders' => $onthewayOrders
        ];
        return view('admin/address/barangaylist', $data);
    }

    public function city_list()
    {   
        $data = [];
        if (!session()->get('isLoggedIn') || (!session()->get('isAdmin') && !session()->get('isSuperAdmin'))) {
            return redirect()->to('/'); // Redirect to landing page if not logged in as admin or superadmin
        }
        $City_model = new City_model();
        $Order_model = new Order_model();
        $Review_model = new Review_model();
        $Booking_model = new Booking_model();

        $user_info = [
            'firstname' => session()->get('firstname'),
            'lastname' => session()->get('lastname'),
            'email' => session()->get('email'),
            'phone' => session()->get('phone'),
            'address' => session()->get('address'),
            'password' => session()->get('password'),
        ];

        $toshipOrders = $Order_model
        ->where('order_status', 'To Pay')->findAll();

        $onthewayOrders = $Order_model
        ->where('order_status', 'To Deliver')->findAll();

        $data=[
            'cities' => $City_model->findAll(),
            'newOrders' => $Order_model->where('order_status', 'Pending')->findAll(),
            'newcomment' => $Review_model->where('status', 'Pending')->findAll(),
            'newBooking' => $Booking_model->where('status', 'Pending')->findAll(),
            'user_info' => $user_info, // Pass user information to the view
            'toshipOrders' => $toshipOrders,
            'onthewayOrders' => $onthewayOrders
        ];
        return view('admin/address/citylist', $data);
    }

    public function add_brgy()
    {
        $Barangay_model = new Barangay_model();
        $data = [];
        
        if($this->request->getmethod()=='post')
        {
            $data = array(
                'brgy_name' => $this->request->getVar('brgy_name'),
                'name_city' => $this->request->getVar('name_city'),
                'city_id' => $this->request->getVar('city_id'),
                'shipping_fee' => $this->request->getVar('shipping_fee')
            );
            if($Barangay_model->save($data))
                {
                    return redirect()->to('brgylist')
            ->with('status_icon', 'success')    
            ->with('status', 'Barangay Added');
                }
        }
        return view('admin/category/barangaylist', $data);
    }

    public function add_city()
    {
        $City_model = new City_model();
        $data = [];
        if($this->request->getmethod()=='post')
        {
            $data = array(
                'city_name' => $this->request->getVar('city_name'),
            );
            if($City_model->save($data))
                {
                    return redirect()->to('citylist')
            ->with('status_icon', 'success')    
            ->with('status', 'City Added');
                }
        }
        return view('admin/category/citylist', $data);
    }

    // public function search()
    // {
    //     $cityModel = new City_model();
    // $cities = $cityModel->findAll();

    // // Convert $cities to an array of objects
    // $data['cities'] = json_decode(json_encode($cities));

        
    //     return view('admin/address/search', $data);
    // }

    public function getBarangays()
    {
        $cityId = $this->request->getVar('city_id');

        $barangayModel = new Barangay_model();
        $barangays = $barangayModel->where('city_id', $cityId)->findAll();

        return $this->response->setJSON($barangays);
    }
    
    public function getShippingFee()
    {
        $barangayId = $this->request->getVar('barangay_id');
        $barangayModel = new Barangay_model();
        $barangay = $barangayModel->find($barangayId);

        $shippingFee = $barangay['shipping_fee'];
        
        return $this->response->setJSON(['shipping_fee' => $shippingFee]);
    }


    // public function shippin_datas()
    // {
    //     $shippingModel = new Shipping_model();
    //     $barangayModel = new Barangay_model();

    //     $data = $shippingModel
    //         ->join('barangays', 'shipping_info.city_id = barangays.city_id AND shipping_info.barangay_id = barangays.id')
    //         ->select('shipping_info.*, barangays.shipping_fee AS barangay_shipping_fee')
    //         ->get()
    //         ->getResultArray();

    //     // Pass the data to the view
    //     $tableData = [
    //         'shippingData' => $data
    //     ];

    //     return view('admin/address/shipping_feelist', $tableData);
    // }

    public function updateShippingFee($id)
    {
        $shipping_fee = $this->request->getPost('shipping_fee');

        $Barangay_model = new Barangay_model();

        // Get the city_id and barangay_id from the shipping_info record
        $shippingInfo = $Barangay_model->find($id);
        $cityId = $shippingInfo['city_id'];
        $barangayId = $shippingInfo['id'];

        $Barangay_model->updateShippingFee($cityId, $barangayId, $shipping_fee);

        return redirect()->to('brgylist')
            ->with('status_icon', 'success')
            ->with('status', 'Shipping Fee Changed');
    }


    public function deleteCity($id)
    {
        $City_model = new City_model();
        $Barangay_model = new Barangay_model();
        $Shipping_model = new Shipping_model();
        $Ship_Checkout_model = new Ship_Checkout_model();

        $City_model->delete($id);

        $Barangay_model->where('city_id', $id)->delete();

        $Shipping_model->where('city_id', $id)->delete();

        $Ship_Checkout_model->where('city_id', $id)->delete();

        return redirect()->to('citylist')
            ->with('status_icon', 'success')
            ->with('status', 'City Deleted');
    }

    public function deleteBrgy($id)
    {
        $Barangay_model = new Barangay_model();
        $Shipping_model = new Shipping_model();
        $Ship_Checkout_model = new Ship_Checkout_model();

        $Barangay_model->delete($id);

        $Shipping_model->where('barangay_id', $id)->delete();

        $Ship_Checkout_model->where('barangay_id', $id)->delete();

        return redirect()->to('brgylist')
            ->with('status_icon', 'success')
            ->with('status', 'Barangay Deleted');
    }

    public function edit_shipping_address(){
        $useSessionData = session()->get();
        
        $Product_model = new Product_model();
        $Category_model = new Category_model();
        $Shipping_model = new Shipping_model();
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
        ];
        $data['ship_info'] = $Shipping_model->where('fk_user_id', $useSessionData['id'])->findAll();
        $data['category'] = $Category_model->findAll();
      
        return view('home/edit_shipping_address', $data);
    }



    public function updateShipping($shipinfo_id)
    {
        $updatedData = [
            'firstname' => $this->request->getPost('firstname'),
            'lastname' => $this->request->getPost('lastname'),
            'contact' => $this->request->getPost('contact'),
            'selected_city' => $this->request->getPost('selected_city'),
            'selected_barangay' => $this->request->getPost('selected_barangay'),
            'other_infoaddres' => $this->request->getPost('other_infoaddres')
        ];

        $Shipping_model = new Shipping_model();
        $Shipping_model->update($shipinfo_id, $updatedData);

        return redirect()->to('edit_shipping_address')
        ->with('status_icon', 'success')
        ->with('status', 'Updated successfully');  
    }

    public function deleteAddress($id)
    {
        $Shipping_model = new Shipping_model();

        $Shipping_model->delete($id);


        return redirect()->back()
            ->with('status_icon', 'success')
            ->with('status', 'Address Deleted');
    }


}
