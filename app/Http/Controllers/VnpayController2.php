<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CentralLogics\Helpers;
use App\Models\Order;

class VnpayController extends Controller
{
    private $vnp_TmnCode;
    private $vnp_HashSecret;
    private $vnp_Url;
    private $vnp_apiUrl;

    public function __construct()
    {
        $config = Helpers::get_business_settings('vnpay');
        // You can import it from your Database
        $vnp_TmnCode = $config['vnp_TmnCode']; // bKash Merchant API APP KEY
        $vnp_HashSecret = $config['vnp_HashSecret']; // bKash Merchant API APP SECRET
        $vnp_Url = $config['vnp_Url']; // bKash Merchant API USERNAME
        $vnp_apiUrl = $config['vnp_apiUrl']; // bKash Merchant API PASSWORD
        

        $this->vnp_TmnCode = $vnp_TmnCode;
        $this->vnp_HashSecret = $vnp_HashSecret;
        $this->vnp_Url = $vnp_Url;
        $this->vnp_apiUrl = $vnp_apiUrl;
        
    }

    public function payment()
    {
        $order = Order::with(['details','customer'])->where(['id' => session('order_id'), 'user_id'=>session('customer_id')])->first();
        $value = 1000000;
        $user = "123456";
        // $post_data = array();
        
        $vnp_TxnRef = 123456; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Bimart Payment';
        $vnp_OrderType = 'billingpayment';
        $vnp_Amount = $value;
        $vnp_Locale = 'vi';
        $vnp_BankCode = '';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        $vnp_ExpireDate = "";
        //Billing
        $vnp_Bill_Mobile = "091234678";;
        $vnp_Bill_Email = "chiensit36@yahoo.com";
        $fullName = "Nguyen Trung";
        
        $vnp_Bill_FirstName = "Nguyen";
        $vnp_Bill_LastName = "Trung";
        
        $vnp_Bill_Address='NamDinh';
        $vnp_Bill_City='NamDinh';
        $vnp_Bill_Country='vi';
        $vnp_Bill_State='namdinh';
        // Invoice
        $vnp_Inv_Phone='0914849539';
        $vnp_Inv_Email='chiensit36@yahoo.com';
        $vnp_Inv_Customer='Nguyen Duc Trung';
        $vnp_Inv_Address='45 Hung Vuong Nam Dinh';
        $vnp_Inv_Company='Cong ty TNHH Ngoc Khue Minh Thanh';
        $vnp_Inv_Taxcode='0102182292';
        $vnp_Inv_Type='I';
        // $value = $order->order_amount;
        // $user = $order->customer;
        // // $post_data = array();
        
        // $vnp_TxnRef = $order->id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        // $vnp_OrderInfo = 'Bimart Payment';
        // $vnp_OrderType = 'billingpayment';
        // $vnp_Amount = $value;
        // $vnp_Locale = 'vi';
        // $vnp_BankCode = '';
        // $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        // //Add Params of 2.0.1 Version
        // $vnp_ExpireDate = $_POST['txtexpire'];
        // //Billing
        // $vnp_Bill_Mobile = $order->phone;;
        // $vnp_Bill_Email = $order->email;
        // $fullName = trim($order->f_name." ".$order->l_name);
        
        // $vnp_Bill_FirstName = $order->f_name;
        // $vnp_Bill_LastName = $order->l_name;
        
        // $vnp_Bill_Address='NamDinh';
        // $vnp_Bill_City='NamDinh';
        // $vnp_Bill_Country='vi';
        // $vnp_Bill_State='namdinh';
        // // Invoice
        // $vnp_Inv_Phone='0914849539';
        // $vnp_Inv_Email='chiensit36@yahoo.com';
        // $vnp_Inv_Customer='Nguyen Duc Trung';
        // $vnp_Inv_Address='45 Hung Vuong Nam Dinh';
        // $vnp_Inv_Company='Cong ty TNHH Ngoc Khue Minh Thanh';
        // $vnp_Inv_Taxcode='0102182292';
        // $vnp_Inv_Type='I';
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate"=>$vnp_ExpireDate,
            "vnp_Bill_Mobile"=>$vnp_Bill_Mobile,
            "vnp_Bill_Email"=>$vnp_Bill_Email,
            "vnp_Bill_FirstName"=>$vnp_Bill_FirstName,
            "vnp_Bill_LastName"=>$vnp_Bill_LastName,
            "vnp_Bill_Address"=>$vnp_Bill_Address,
            "vnp_Bill_City"=>$vnp_Bill_City,
            "vnp_Bill_Country"=>$vnp_Bill_Country,
            "vnp_Inv_Phone"=>$vnp_Inv_Phone,
            "vnp_Inv_Email"=>$vnp_Inv_Email,
            "vnp_Inv_Customer"=>$vnp_Inv_Customer,
            "vnp_Inv_Address"=>$vnp_Inv_Address,
            "vnp_Inv_Company"=>$vnp_Inv_Company,
            "vnp_Inv_Taxcode"=>$vnp_Inv_Taxcode,
            "vnp_Inv_Type"=>$vnp_Inv_Type
        );
        
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }
        
        //var_dump($inputData);
        ksort($inputData);
        
        /////////////////////////////////
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        //header('Location:' . $vnp_Url); /* Redirect browser */
        //exit();
        // $returnData = array('code' => '00'
        //     , 'message' => 'success'
        //     , 'data' => $vnp_Url);
        //     if (isset($_POST['redirect'])) {
        //         header('Location: ' . $vnp_Url);
        //         die();
        //     } else {
        //         echo json_encode($returnData);
        //     }
        /////////////////////////////////
    }
    
    public function callback_response()
    {
        
    }

    public function createPayment(Request $request)
    {

        $token = session()->get('bkash_token');

        $request['intent'] = 'sale';
        $request['currency'] = 'BDT';
        $request['merchantInvoiceNumber'] = rand();

        $url = curl_init("$this->base_url/checkout/payment/create");
        $request_data_json = json_encode($request->all());
        $header = array(
            'Content-Type:application/json',
            "authorization: $token",
            "x-app-key: $this->app_key"
        );

        curl_setopt($url, CURLOPT_HTTPHEADER, $header);
        curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url, CURLOPT_POSTFIELDS, $request_data_json);
        curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        $resultdata = curl_exec($url);
        curl_close($url);
        return json_decode($resultdata, true);
    }

    public function executePayment(Request $request)
    {
        $token = session()->get('bkash_token');

        $paymentID = $request->paymentID;
        $url = curl_init("$this->base_url/checkout/payment/execute/" . $paymentID);
        $header = array(
            'Content-Type:application/json',
            "authorization:$token",
            "x-app-key:$this->app_key"
        );

        curl_setopt($url, CURLOPT_HTTPHEADER, $header);
        curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
        $resultdata = curl_exec($url);
        curl_close($url);
        return json_decode($resultdata, true);
    }

    public function queryPayment(Request $request)
    {
        $token = session()->get('bkash_token');
        $paymentID = $request->payment_info['payment_id'];

        $url = curl_init("$this->base_url/checkout/payment/query/" . $paymentID);
        $header = array(
            'Content-Type:application/json',
            "authorization:$token",
            "x-app-key:$this->app_key"
        );

        curl_setopt($url, CURLOPT_HTTPHEADER, $header);
        curl_setopt($url, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
        $resultdata = curl_exec($url);
        curl_close($url);
        return json_decode($resultdata, true);
    }

    public function bkashSuccess(Request $request)
    {
        $order = Order::with(['details'])->where(['id' => session('order_id'), 'user_id'=>session('customer_id')])->first();
        $order->transaction_reference = $request->trxID;
        $order->payment_method = 'bkash';
        $order->payment_status = 'paid';
        $order->order_status = 'confirmed';
        $order->confirmed = now();
        $order->save();
        Helpers::send_order_notification($order);
        return response()->json(['status' => true]);
    }
}

