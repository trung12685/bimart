<?php

namespace App\Http\Controllers;

use App\CentralLogics\Helpers;
use App\Models\Order;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class Paytabs
{
    function send_api_request($request_url, $data, $request_method = null)
    {
        $config = Helpers::get_business_settings('paytabs');

        $data['profile_id'] = $config['profile_id'];
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $config['base_url'] . $request_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_CUSTOMREQUEST => isset($request_method) ? $request_method : 'POST',
            CURLOPT_POSTFIELDS => json_encode($data, true),
            CURLOPT_HTTPHEADER => array(
                'authorization:' . $config['server_key'],
                'Content-Type:application/json'
            ),
        ));

        $response = json_decode(curl_exec($curl), true);
        curl_close($curl);
        return $response;
    }

    function is_valid_redirect($post_values)
    {
        $config = Helpers::get_business_settings('paytabs');

        $serverKey = $config['server_key'];

        // Request body include a signature post Form URL encoded field
        // 'signature' (hexadecimal encoding for hmac of sorted post form fields)
        $requestSignature = $post_values["signature"];
        unset($post_values["signature"]);
        $fields = array_filter($post_values);

        // Sort form fields
        ksort($fields);

        // Generate URL-encoded query string of Post fields except signature field.
        $query = http_build_query($fields);

        $signature = hash_hmac('sha256', $query, $serverKey);
        if (hash_equals($signature, $requestSignature) === TRUE) {
            // VALID Redirect
            return true;
        } else {
            // INVALID Redirect
            return false;
        }
    }
}

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
        $value = $order->order_amount;
        $user = $order->customer;
        $value = $value*100;
        $vnp_TxnRef = $order->id."_".time(); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Bimart Payment';
        $vnp_OrderType = 'billingpayment';
        $vnp_Amount = $value;
        $vnp_Locale = 'vi';
        $vnp_BankCode = '';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $vnp_ExpireDate = "";
        //Billing
        $vnp_Bill_Mobile = $user->phone;
        $vnp_Bill_Email = $user->email;
        $fullName = $user->f_name." ".$user->l_name;
        $vnp_Bill_FirstName = $user->f_name;
        $vnp_Bill_LastName = $user->l_name;
        $vnp_Bill_Address=json_decode($order->delivery_address)->address;
        $vnp_Bill_City='NamDinh';
        $vnp_Bill_Country='vi';
        //$vnp_Bill_State='namdinh';
        // Invoice
        $vnp_Inv_Phone=$user->phone;
        $vnp_Inv_Email=$user->email;
        $vnp_Inv_Customer=$user->f_name." ".$user->l_name;
        $vnp_Inv_Address=json_decode($order->delivery_address)->address;
        $vnp_Inv_Company='Cong ty TNHH Ngoc Khue Minh Thanh';
        $vnp_Inv_Taxcode='0102182292';
        $vnp_Inv_Type='I';
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $this->vnp_TmnCode,
            "vnp_Amount" => $value,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => 'vi',
            "vnp_OrderInfo" => "1",
            "vnp_OrderType" => "1",
            "vnp_ReturnUrl" => url('/') . "/vnpay-response",
            // "vnp_ExpireDate"=>$vnp_ExpireDate,
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
            "vnp_Inv_Type"=>$vnp_Inv_Type,
            "vnp_TxnRef" => '9',
        );

        ksort($inputData);
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
        $this->vnp_Url = $this->vnp_Url . "?" . $query;
        if (isset($this->vnp_HashSecret)) {
            $this->vnp_HashSecret =   hash_hmac('sha512', $hashdata, $this->vnp_HashSecret);//  
            $this->vnp_Url .= 'vnp_SecureHash=' . $this->vnp_HashSecret;
        }
        header('Location:' . $this->vnp_Url); /* Redirect browser */
        exit();

    }

    public function callback_response(Request $request)
    {
        
        $order = Order::with(['details'])->where(['id' => session('order_id'), 'user_id'=>session('customer_id')])->first();
        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        if (!isset($_GET['vnp_SecureHash'])){
            Toastr::error(translate('Giao dịch không hợp lệ'));
            return back();
        }
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $this->vnp_HashSecret);
        
        if ($secureHash == $vnp_SecureHash) {
            if ($_GET['vnp_ResponseCode'] == '00') {
                // $order->transaction_reference = $transRef;
                $order->payment_method = 'Vnpay';
                $order->payment_status = 'paid';
                $order->order_status = 'confirmed';
                $order->confirmed = now();
                $order->save();
                Helpers::send_order_notification($order);
                if ($order->callback != null) {
                    return redirect($order->callback . '&status=success');
                }else{
                    return \redirect()->route('payment-success');
                }
            } else {
                $order->order_status = 'failed';
                $order->failed = now();
                $order->save();
                if ($order->callback != null) {
                    return redirect($order->callback . '&status=fail');
                }else{
                    return \redirect()->route('payment-fail');
                }
            }
        } else {
            Toastr::error(translate('Giao dịch không hợp lệ'));
            return back();
        }
        
        
    }
}
