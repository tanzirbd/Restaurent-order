<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderDetails;
use Illuminate\Http\Request;
use Mail;
use Session;
use Cart;

class OrderController extends Controller{

    public function orderNow(){
        return view('front.order.order');
    }

    public function saveCustomerInfo(Request $request){
//        $this->validate($request,[
//            'first_name' =>'required|regex:/^[\pL\s\-]+$/u',
//            'last_name' =>'required|regex:/^[\pL\s\-]+$/u',
//            'email'=>'required|email|unique:customers,email',
//            'password'=>'required',
//            'conf_password'=>'required',
//        ]);

        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);
        $customer->conf_password = bcrypt($request->conf_password);
        $customer->save;

//        Session::put('customerId',$customer->id);
//        Session::put('customerName',$customer->first_name.' '.$customer->last_name);

//        $data = $customer->toArray();
//
//        Mail::send('front.mail.congrat-mail', $data, function ($message) use ($data){
//            $message->to($data['email']);
//            $message->subject('Congratulation Message');
//        });

        return redirect('/');
    }

    public function newOrderInfo(Request $request){

        $tableNo = $request->table_no;
        if ($tableNo == '1'){
            $order = new Order();
            $order->customer_name = $request->customer_name;
            $order->order_total = Session::get('subTotal');
            $order->table_no = $request->table_no;
            $order->save();

            $cartProducts = Cart::content();

            foreach ($cartProducts as $cartProduct){
                $orderDetails = new OrderDetails();
                $orderDetails->order_id = $order->id;
                $orderDetails->product_id = $cartProduct->id;
                $orderDetails->product_name = $cartProduct->name;
                $orderDetails->product_price = $cartProduct->price;
                $orderDetails->product_quantity = $cartProduct->qty;
                $orderDetails->save();

                Cart::destroy();
                return redirect('/');
            }



        }else if ($tableNo == '2'){

        }else if ($tableNo == '3'){

        }else if ($tableNo == '4') {

        }else if ($tableNo == '5') {

        }else if ($tableNo == '6') {

        }

    }
}
