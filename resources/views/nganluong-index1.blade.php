@php($currency=\App\Models\BusinessSetting::where(['key'=>'currency'])->first()->value)

<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="format-detection" content="telephone=no">
    <title>
        Chọn phương thức thanh toán
    </title>
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="{{asset('public/assets/dulieuchung/css2')}}" rel="stylesheet">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset('public/assets/dulieuchung/bootstrap.bundles.css')}}">
    <!-- end bootstrap -->
    <!-- select2 -->
    <link rel="stylesheet" href="{{asset('public/assets/dulieuchung/select2.bundles.css')}}">
    <!-- end select2 -->
    <!-- css use for this page only -->
    <!-- end css use for this page only -->
    <!-- css use for this page only -->
    <!-- end css use for this page only -->
    <link rel="stylesheet" href="{{asset('public/assets/dulieuchung/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/dulieuchung/custom.bundles.css')}}">
    <link rel="shortcut icon" type="text/html" href="https://sandbox.vnpayment.vn/paymentv2/images/favicon/favicon.png">
</head>

<body>

    <div class="loading" style="display: none;">
        <div class="lds-ring">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="main main-layout-sm">
        <!-- _custom.header -->
        <div class="header-desktop show-desktop">
            <div class="row row-16 align-items-center justify-content-between">
                <div class="col-auto">
                    <!-- button.button -->
                    <a data-bs-toggle="modal" data-bs-target="#modalCancelPayment" class="ubg-transparent ubox-size-button-default ubg-hover ubg-active ubtn">
                        <div class="ubtn-inner">
                            <span class="ubtn-ic ubtn-ic-left">
                                <img src="{{asset('public/assets/dulieuchung/24x24-chevronleft.svg')}}" alt="" class="ic-default">
                            </span>
                            <span class="ubtn-text">Quay lại</span>
                        </div>
                    </a>
                    <!-- end button.button -->
                </div>
                <div class="col-auto block-right">
                    <div class="title h4">
                        <!-- button.button -->
                        <a class="ubg-ghost ubox-size-button-sm ubg-hover ubg-active ubtn" href="#">
                            <div class="ubtn-inner">
                                <span class="ubtn-ic ubtn-ic-left">
                                    <img src="{{asset('public/assets/dulieuchung/en.svg')}}" alt="" class="ic-xl">
                                </span>
                                <span class="ubtn-text">En</span>
                            </div>
                        </a>
                        <!-- end button.button -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end _custom.header -->
        

    <div class="main-wrap">
        <div class="main-inner main-inner-page">
            <div class="box box-main">
                <!-- _custom.header -->
                <div class="box__header header-box header-box-simple">
                    <div class="box__header-inner">
                        <div class="section">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-md-auto header-box-top">
                                    <div class="row align-items-center justify-content-md-center">
                                        <div class="col-auto show-mobile">
                                            <!-- button.button -->
                                            <a data-bs-toggle="modal" data-bs-target="#modalCancelPayment" class="ubg-transparent ubox-size-button-default ubox-square ubg-hover ubg-active ubtn">
                                                <div class="ubtn-inner">
                                                    <span class="ubtn-ic ubtn-ic-left">
                                                        <img src="{{asset('public/assets/dulieuchung/24x24-chevronleft.svg')}}" alt="" class="ic-default">
                                                    </span>
                                                </div>
                                            </a>
                                            <!-- end button.button -->
                                        </div>
                                        <div class="col-md-auto col logo-group-wrap w-100">
                                            <div class="row justify-content-between align-items-center">
                                                <div class="col-md-auto col">
                                                    <div class="logo d-block">
                                                            <img src="{{asset('public/assets/dulieuchung/logo.svg')}}')}}" alt="VNPAY">
                                                    </div>
                                                </div>
                                                <div class="col-md-auto col">
                                                    <div class="logo d-block text-right">
                                                            <img src="{{asset('public/assets/dulieuchung/vban.png')}}" alt="Merchant Logo">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end _custom.header -->
                <div class="box__body ubg-porcelain-light">
                        <form action="{{route('nganluong-payment')}}" method="post" novalidate="">                        <div class="pv32 box-section">{{ csrf_field() }}
                            <div class="list-mb24 list-crop">
                                <div class="h2 text-center main-title-mobile mb24">
                                    Chọn phương thức thanh toán
                                </div>
                                <div class="list-method list-mb8 list-last-mb accordion" id="accordionList">
                                        <!--Check QR Support-->
                                            <div class="list-method-item">
                                                <button type="submit" value="NL_VI" id="VNPAYQR" name="paymethod" class="list-method-button">
                                                    <div class="row row-16 align-items-center">
                                                        <div class="col">
                                                            <div class="title h3 color-default">
                                                                <input type="radio" name='paymethod' checked>Ứng dụng thanh toán hỗ trợ 
                                                                <span class="vnpay-logo b">
                                                                    <span class="vnpay-red">VN</span><span class="vnpay-blue">PAY</span>
                                                                    <sup class="vnpay-red">QR</sup>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="{{asset('public/assets/dulieuchung/64x64-vnpay-qr.svg')}}" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </button>
                                            </div>
                                        <!--Check local bank support-->
                                            <div class="list-method-item accordion-item">
                                                <div class="list-method-button" data-bs-toggle="collapse" data-bs-target="#accordionList2" aria-expanded="true" aria-controls="accordionList2">
                                                    <div class="row row-16 align-items-center">
                                                        <div class="col">
                                                            <div class="title h3 color-default">
                                                                Thẻ nội địa và tài khoản ngân hàng
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="{{asset('public/assets/dulieuchung/64x64-atm.svg')}}" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-method-item-content accordion-collapse collapse" id="accordionList2" data-bs-parent="#accordionList2">
                                                    <div>
                                                        <div class="list-bank list-bank-grid-4">
                                                            <div class="list-mb24 list-last-mb">
                                                                <div class="list-bank-search">
                                                                    <!-- form.input -->
                                                                    <div class="form-group">
                                                                        <div class="input-group-wrap input-default input-size-default input-group-vertical">
                                                                            <label class="input-inner-wrap">
                                                                                <input type="text" class="input input-label-change input-has-clear" placeholder="Tìm kiếm..." autocorrect="off" id="searchPayMethod2">
                                                                                <div class="input-extend input-extend-left">
                                                                                    <div class="input-box input-ic">
                                                                                        <img src="{{asset('public/assets/dulieuchung/24x24-search.svg')}}" alt="" class="ic-default">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="input-extend input-extend-right">
                                                                                    <div class="input-box input-ic-clear"></div>
                                                                                </div>
                                                                                <div class="input-frame"></div>
                                                                            </label>
                                                                        </div>
                                                                        <div class="errorBlock"></div>
                                                                    </div>
                                                                    <!-- end form.input -->
                                                                </div>
                                                                <div class="list-bank-main">
                                                                    <div class="row row-8 list-mb8 list-crop">
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngan hang vietcombank">
                                                                                <button type="submit" value="ATM_ONLINE-VCB" id="EC_VIETCOMBANK" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/vietcombank.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngan hang vietinbank">
                                                                                <button type="submit" value="ATM_ONLINE-ICB" id="VIETINBANK" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/vietinbank.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngân hàng bidv">
                                                                                <button type="submit" value="ATM_ONLINE-BIDV" id="BIDV" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/bidv.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngan hang agribank">
                                                                                <button type="submit" value="ATM_ONLINE-AGB" id="AGRIBANK" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/agribank.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngan hang sacombank">
                                                                                <button type="submit" value="ATM_ONLINE-SCB" id="SACOMBANK" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/sacombank.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngân hàng techcombank">
                                                                                <button type="submit" value="ATM_ONLINE-TCB" id="TECHCOMBANK" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/techcombank.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngan hang mbbank">
                                                                                <button type="submit" value="ATM_ONLINE-MB" id="MBBANK" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/mbbank.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngan hang acb">
                                                                                <button type="submit" value="ATM_ONLINE-ACB" id="ACB" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/acb.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngan hang vpbank">
                                                                                <button type="submit" value="ATM_ONLINE-VPB" id="VPBANK" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/vpbank.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngan hang dong a">
                                                                                <button type="submit" value="ATM_ONLINE-DAB" id="DONGABANK" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/dongabank.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngân hàng tmcp sài gòn - hà nội">
                                                                                <button type="submit" value="ATM_ONLINE-SHB" id="SHB" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/shb.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <!--<div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngan hang eximbank">
                                                                                <button type="submit" value="EXIMBANKOMNI" id="EXIMBANKOMNI" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/eximbankomni.svg')}}"></div>
                                                                                </button>
                                                                            </div>-->
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngan hang eximbank">
                                                                                <button type="submit" value="ATM_ONLINE-EXB" id="EXIMBANK" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/eximbank.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngân hàng tpbank">
                                                                                <button type="submit" value="ATM_ONLINE-TPB" id="TPBANK" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/tpbank.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngan hang ncb">
                                                                                <button type="submit" value="ATM_ONLINE-NCB" id="NCB" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/ncb.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngân hàng oceanbank">
                                                                                <button type="submit" value="ATM_ONLINE-OJB" id="OJB" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/ojb.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <!--<div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngan hang msbank">
                                                                                <button type="submit" value="MSBANK" id="MSBANK" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/msbank.svg')}}"></div>
                                                                                </button>
                                                                            </div>-->
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngan hang hdbank">
                                                                                <button type="submit" value="ATM_ONLINE-HDB" id="HDBANK" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/hdbank.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngan hang namabank">
                                                                                <button type="submit" value="ATM_ONLINE-NAB" id="NAMABANK" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/namabank.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <!--<div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngan hang ocb">
                                                                                <button type="submit" value="OCB" id="OCB" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/ocb.svg')}}"></div>
                                                                                </button>
                                                                            </div>-->
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngan hang scb">
                                                                                <button type="submit" value="ATM_ONLINE-SCB" id="SCB" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/scb.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <!--<div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngân hàng tmcp an bình">
                                                                                <button type="submit" value="ABBANK" id="ABBANK" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/abbank.svg')}}"></div>
                                                                                </button>
                                                                            </div>-->
                                                                            <!--<div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngân hàng ivb">
                                                                                <button type="submit" value="IVB" id="IVB" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/ivb.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngan hang seabank">
                                                                                <button type="submit" value="SEABANK" id="SEABANK" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/seabank.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngân hàng vietbank">
                                                                                <button type="submit" value="VIETBANK" id="VIETBANK" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/vietbank.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngân hàng bản việt">
                                                                                <button type="submit" value="VIETCAPITALBANK" id="VIETCAPITALBANK" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/vietcapitalbank.svg')}}"></div>
                                                                                </button>
                                                                            </div>-->
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngan hang bacabank">
                                                                                <button type="submit" value="ATM_ONLINE-BAB" id="BACABANK" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/bacabank.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngan hang vib">
                                                                                <button type="submit" value="ATM_ONLINE-VIB" id="VIB" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/vib.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngân hàng vietabank">
                                                                                <button type="submit" value="ATM_ONLINE-VAB" id="VIETABANK" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/vietabank.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <!--<div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngân hàng sài gòn">
                                                                                <button type="submit" value="SAIGONBANK" id="SAIGONBANK" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/saigonbank.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngan hang pvcombank">
                                                                                <button type="submit" value="PVCOMBANK" id="PVCOMBANK" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/pvcombank.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngân hàng wooribank">
                                                                                <button type="submit" value="WOORIBANK" id="WOORIBANK" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/wooribank.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngân hàng kiên long">
                                                                                <button type="submit" value="KIENLONGBANK" id="KIENLONGBANK" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/kienlongbank.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngân hàng tmcp bưu điện liên việt">
                                                                                <button type="submit" value="LIENVIETBANK" id="LIENVIETBANK" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/lienvietbank.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngân hàng tmcp bảo việt">
                                                                                <button type="submit" value="BAOVIETBANK" id="BAOVIETBANK" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/baovietbank.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngân hàng xăng dầu (pgbank)">
                                                                                <button type="submit" value="PGBANK" id="PGBANK" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/pgbank.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngân hàng dầu khí toàn cầu gp bank">
                                                                                <button type="submit" value="GPBANK" id="GPBANK" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/gpbank.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngân hàng thnn mtv united overseas bank (viet nam)">
                                                                                <button type="submit" value="UOB" id="UOB" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/uob.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngân hàng liên doanh việt - nga">
                                                                                <button type="submit" value="VRB" id="VRB" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/vrb.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngân hàng vid public">
                                                                                <button type="submit" value="VIDBANK" id="VIDBANK" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/vidbank.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4 domestic-bank" search-value="ngân hàng tnhh mtv shinhan việt nam">
                                                                                <button type="submit" value="SHINHANBANK" id="SHINHANBANK" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/shinhanbank.svg')}}"></div>
                                                                                </button>
                                                                            </div>-->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <!--Check InternalCard Support-->
                                            <div class="list-method-item accordion-item">
                                                <div class="list-method-button" data-bs-toggle="collapse" data-bs-target="#accordionList3" aria-expanded="true" aria-controls="accordionList3">
                                                    <div class="row row-16 align-items-center">
                                                        <div class="col">
                                                            <div class="title h3 color-default">
                                                                Thẻ thanh toán quốc tế
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="{{asset('public/assets/dulieuchung/64x64-credit.svg')}}" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-method-item-content accordion-collapse collapse" id="accordionList3" data-bs-parent="#accordionList">
                                                    <div>
                                                        <div class="list-bank list-bank-grid-4">
                                                            <div class="list-mb24 list-last-mb">
                                                                <div class="list-bank-main">
                                                                    <div class="row row-8 list-mb8 list-crop">
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <button type="submit" value="VISA-VISA" id="VISA" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/visa.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <button type="submit" value="VISA-MASTER" id="MASTERCARD" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/MASTERCARD.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <!--<div class="col-item col-sm-3 col-4">
                                                                                <button type="submit" value="VISA-AMEX" id="AMEX" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/AMEX.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <button type="submit" value="VISA-JCB" id="JCB" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/JCB.svg')}}"></div>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <button type="submit" value="VISA-UPI" id="UPI" name="paymethod" class="list-bank-item">
                                                                                    <div class="list-bank-item-inner" style="background-image: url({{asset('public/assets/dulieuchung/logo/UPI.svg')}}"></div>
                                                                                </button>
                                                                            </div>-->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <!--Check E-wallet support-->
                                            <!--<div class="list-method-item">
                                                <button type="submit" value="VNMART" id="VNMART" name="paymethod" class="list-method-button">
                                                    <div class="row row-16 align-items-center">
                                                        <div class="col">
                                                            <div class="title h3 color-default">
Ví điện tử                                                                    <span class="vnpay-logo b">
                                                                        <span class="vnpay-red">VN</span><span class="vnpay-blue">PAY</span>
                                                                    </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="{{asset('public/assets/dulieuchung/64x64-vi-vnpay.svg')}}" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </button>
                                            </div>-->
                                </div>
                            </div>
                        </div>
</form>                </div>
                <!-- _custom.footerBox -->
                <div class="box__footer footer-box">
    <div class="box__footer-inner">
        <div class="section">
            <div class="row row-32 list-mb24 list-crop align-items-center justify-content-center">
                <div class="col fz-h5 show-mobile">
                    Phát triển bởi VNPAY © 2022
                </div>
                <div class="col-sm show-desktop">
                    <div class="row row-32 align-items-center">
                        <div class="col-auto">
                            <!-- button.button -->
                            <a href="tel:1900555577" class="ubg-ghost ubox-size-button-default ubg-hover ubg-active ubtn">
                                <div class="ubtn-inner">
                                    <div class="ubg-line-porcelain-dark ubox-size-ic-md ubox-square ubox ubox-ic">
                                        <img src="{{asset('public/assets/dulieuchung/24x24-phone.svg')}}" alt="" class="ic-default">
                                    </div>
                                    <span class="ubtn-text h3 color-info u pl12">1900.5555.77</span>
                                </div>
                            </a>
                            <!-- end button.button -->
                        </div>
                        <div class="col-auto">
                            <!-- button.button -->
                            <a href="mailto:hotro@vnpay.vn" class="ubg-ghost ubox-size-button-default ubg-hover ubg-active ubtn">
                                <div class="ubtn-inner">
                                    <div class="ubg-line-porcelain-dark ubox-size-ic-md ubox-square ubox ubox-ic">
                                        <img src="{{asset('public/assets/dulieuchung/24x24-email.svg')}}" alt="" class="ic-default">
                                    </div>
                                    <span class="ubtn-text h3 color-info u pl12">hotro@vnpay.vn</span>
                                </div>
                            </a>
                            <!-- end button.button -->
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="row row-8 justify-content-center">
                        <div class="col-auto">
                            <a href="https://profile.globalsign.com/SiteSeal/siteSeal/profile/profile.do?p1=e797f6ab&amp;p2=a06dada7520ada559537452c666a510c95706240fc2dfde64d4c864bf735462b7a370908847a6060a26daeac4f549d0bc8&amp;p3=7b58e9c169b0b0ff3eb932a37330cc91d466b871" target="_blank" class="footer-logos">
                                <img src="{{asset('public/assets/dulieuchung/global-sign.svg')}}" height="40">
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="https://seal.controlcase.com/index.php?page=showCert&amp;cId=4096647551" target="_blank" class="footer-logos">
                                <img src="{{asset('public/assets/dulieuchung/pcidss.svg')}}" height="40">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                <!-- end _custom.footerBox -->
            </div>
        </div>
    </div>


        <footer class="footer main-footer show-desktop">
            <div class="footer-inner text-center">
                Phát triển bởi VNPAY © 2022
            </div>
        </footer>
    </div>
    <div class="chat-box show-desktop">
        <div class="chat-box-icon">
            <a href="https://zalo.me/4134983655549474109" target="_blank">
                <img src="{{asset('public/assets/dulieuchung/zalo.svg')}}" alt="">
            </a>
        </div>
    </div>
    <!-- _custom.footerMobile -->
    <div class="footer_mobile show-mobile">
        <div class="footer_mobile-inner">
            <div class="row row-32 align-items-center">
                <div class="col">
                    <div class="inline-block">
                        <!-- button.button -->
                        <a class="ubg-ghost ubox-size-button-sm ubg-hover ubg-active ubtn" href="#">
                            <div class="ubtn-inner">
                                <span class="ubtn-ic ubtn-ic-left">
                                    <img src="{{asset('public/assets/dulieuchung/en.svg')}}" alt="" class="ic-xl">
                                </span>
                                <span class="ubtn-text">En</span>
                            </div>
                        </a>
                        <!-- end button.button -->
                    </div>
                </div>
                <div class="col-auto">
                    <div class="row row-0">
                        <div class="col-auto">
                            <!-- button.button -->
                            <a href="https://zalo.me/4134983655549474109" class="ubg-transparent ubox-size-button-default ubox-square ubg-hover ubg-active ubtn">
                                <div class="ubtn-inner">
                                    <span class="ubtn-ic ubtn-ic-left">
                                        <img src="{{asset('public/assets/dulieuchung/zalo.svg')}}" alt="" class="ic-default">
                                    </span>
                                </div>
                            </a>
                            <!-- end button.button -->
                        </div>
                        <div class="col-auto">
                            <!-- button.button -->
                            <a href="tel:1900555577" class="ubg-transparent ubox-size-button-default ubox-square ubg-hover ubg-active ubtn">
                                <div class="ubtn-inner">
                                    <span class="ubtn-ic ubtn-ic-left">
                                        <img src="{{asset('public/assets/dulieuchung/24x24-phone(1).svg')}}" alt="" class="ic-default">
                                    </span>
                                </div>
                            </a>
                            <!-- end button.button -->
                        </div>
                        <div class="col-auto">
                            <!-- button.button -->
                            <a href="mailto:hotro@vnpay.vn" class="ubg-transparent ubox-size-button-default ubox-square ubg-hover ubg-active ubtn">
                                <div class="ubtn-inner">
                                    <span class="ubtn-ic ubtn-ic-left">
                                        <img src="{{asset('public/assets/dulieuchung/24x24-email(1).svg')}}" alt="" class="ic-default">
                                    </span>
                                </div>
                            </a>
                            <!-- end button.button -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end _custom.footerMobile -->
    <!-- modal.modalAlert -->
    <!-- modal.modal -->
    <div class="modal fade text-center" id="modalCancelPayment" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-size-alert-default modal-dialog-scrollable modal-alert" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-wrap">
                        <div class="row row-16 modal-title-wrap">
                            <div class="col-12 text-center">
                                <h2 class="modal-title h2">
                                    Hủy thanh toán
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body color-sub-default fz-h3">
                    Quý khách có chắc chắn muốn hủy thanh toán giao dịch này?
                </div>
                <div class="modal-footer justify-content-center">
                    <!-- button.btnGroup -->
                    <div class="ubtn-group list-mb16 list-crop row row-16 justify-content-center group-col-md-3 group-col-fill">
                        <div class="group-col-item">
                            <!-- button.button -->
                            <a data-bs-dismiss="modal" class="ubg-secondary ubox-size-button-default ubg-hover ubg-active ubtn">
                                <div class="ubtn-inner">
                                    <span class="ubtn-text">Đóng</span>
                                </div>
                            </a>
                            <!-- end button.button -->
                        </div>
                        <div class="group-col-item">
                            <!-- button.button -->
                            <a data-bs-dismiss="modal" href="#" class="ubg-danger ubox-size-button-default ubg-hover ubg-active ubtn" id="btnCancelModal">
                                <div class="ubtn-inner">
                                    <span class="ubtn-text">Xác nhận hủy</span>
                                </div>
                            </a>
                            <!-- end button.button -->
                        </div>
                    </div>
                    <!-- end button.btnGroup -->
                </div>
            </div>
        </div>
    </div>
    <!-- end modal.modal -->
    <!-- end modal.modalAlert -->

<!-- jquery -->
<script src="{{asset('public/assets/dulieuchung/jquery.bundles.js')}}"></script>
<script src="{{asset('public/assets/dulieuchung/jquery.init.js')}}"></script>
<!-- jquery -->
<!-- bootstrap -->
<script src="{{asset('public/assets/dulieuchung/bootstrap.bundles.js')}}"></script>
<script src="{{asset('public/assets/dulieuchung/bootstrap.init.js')}}"></script>
<!-- bootstrap -->
<!-- select2 -->
<script src="{{asset('public/assets/dulieuchung/select2.bundles.js')}}"></script>
<script src="{{asset('public/assets/dulieuchung/select2.init.js')}}"></script>
<!-- select2 -->
<!-- parsley -->
<script src="{{asset('public/assets/dulieuchung/parsley.bundles.js')}}"></script>
<script src="{{asset('public/assets/dulieuchung/parsley.init.js')}}"></script>
<!-- parsley -->
<!-- cleave -->
<script src="{{asset('public/assets/dulieuchung/cleave.bundles.js')}}"></script>
<script src="{{asset('public/assets/dulieuchung/cleave.init.js')}}"></script>
<!-- cleave -->
<!-- autosize -->
<script src="{{asset('public/assets/dulieuchung/autosize.bundles.js')}}"></script>
<script src="{{asset('public/assets/dulieuchung/autosize.init.js')}}"></script>
<!-- autosize -->
<!-- script use for this page only -->
<!-- end script for this page only -->
<script src="{{asset('public/assets/dulieuchung/custom.min.js')}}"></script>
<script>
    $(document).ready(function () {
            $('#btnCancelModal')
                .click(function () {
                    var x = this;
                    var postData ={"btnCancel": "confirm"};
                    var submitUrl = $(x).closest('form').attr("action");
                    $(".loading").show();
                    $.ajax({
                         type: "POST",
                         url: submitUrl,
                         data: postData,
                         dataType: 'JSON',
                         success: function (data) {
                             if (data.code === '00') {
                             //Check ifram container
                                 if (self === top) {
                                    //  location.href = data.url;
                                    setTimeout(function () {location.href = data.url;},200);
                                 } else {
                                    //  window.top.location.href = data.url;
                                     setTimeout(function () {window.top.location.href = data.url; },200);}
                                        return false;
                                     } else {
                                        alert(data.message);
                                     }
                                 }
                             });
                    $(".loading").hide();
                    return false;
                });
        });
</script>

    <script type="text/javascript">
        var errorUrl = '/paymentv2/Payment/Error.html?code=15';
        var timer = 899;
        $("#searchPayMethod1").keypress(function (e) {
            if (e.shiftKey && (e.which === 37 || e.which === 39)) {
                return true;
            }
            //Arrow key
            if (e.keyCode === 37 || e.keyCode === 39) {
                return true;
            }
            if (e.ctrlKey && (e.which === 67 || e.which === 86)) {
                return true;
            }
            if (e.keyCode === 8 || e.keyCode === 46) {
                return true;
            }
            var inputVal = String.fromCharCode(e.which);
            var characterReg = /^\s*[a-zA-Z,\s]+\s*$/;
            if (!characterReg.test(inputVal)) {
                return false;
            }
            return true;
        });
        $("#searchPayMethod1").keyup(function (e) {
            let valueSearch = $('#searchPayMethod1').val().toLowerCase();
            
            $(".domestic-bank").each(function (index) {
                if ($(this).attr('search-value').indexOf(valueSearch) === -1) {
                    $(this).addClass('hidden');
                } else {
                    $(this).removeClass('hidden');
                }
            });
        });
        $("#searchPayMethod2").keypress(function (e) {
                    if (e.shiftKey && (e.which === 37 || e.which === 39)) {
                        return true;
                    }
                    //Arrow key
                    if (e.keyCode === 37 || e.keyCode === 39) {
                        return true;
                    }
                    if (e.ctrlKey && (e.which === 67 || e.which === 86)) {
                        return true;
                    }
                    if (e.keyCode === 8 || e.keyCode === 46) {
                        return true;
                    }
                    var inputVal = String.fromCharCode(e.which);
                    var characterReg = /^\s*[a-zA-Z,\s]+\s*$/;
                    if (!characterReg.test(inputVal)) {
                        return false;
                    }
                    return true;
                });
        $("#searchPayMethod2").keyup(function (e) {
            let valueSearch = $('#searchPayMethod2').val().toLowerCase();
            $(".domestic-bank").each(function (index) {
                if ($(this).attr('search-value').indexOf(valueSearch) === -1) {
                    $(this).addClass('hidden');
                } else {
                    $(this).removeClass('hidden');
                }
            });
        });
    </script>


</body></html>

<!-- 
thanh toan vi dien tu ngan luong: NL_VI
ATM_ONLINE
BIDV
VCB
DAB
TCB
MB
VIB
ICB
EXB


IB_ONLINE
BIDV
VCB
DAB
TCB

ATM_OFFLINE
BIDV



NH_OFFLINE


VISA



CREDIT_CARD_PREPAID  -->