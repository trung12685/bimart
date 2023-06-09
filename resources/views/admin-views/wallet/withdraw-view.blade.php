@extends('layouts.admin.app')
@section('title',translate('Withdraw information View'))
@push('css_or_js')
    <!-- Custom styles for this page -->
    <link href="{{asset('public/assets')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="{{asset('public/assets/css/croppie.css')}}" rel="stylesheet">

@endpush

@section('content')
<div class="content container-fluid">
    <!-- Page Heading -->
    <div class="page-header">
        <h1 class="page-header-title mr-3 mb-md-0">
            <span class="page-header-icon">
                <img src="{{asset('public/assets/admin/img/withdraw.png')}}" class="w--26" alt="">
            </span>
            <span>
                {{translate('messages.information')}} {{translate('messages.store')}} {{translate('messages.withdraw')}}
            </span>
        </h1>
    </div>
    <!-- Page Heading -->

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header p-3">
                    <h3 class="text-center text-capitalize">
                        {{translate('messages.information')}} {{translate('messages.store')}} {{translate('messages.withdraw')}}
                    </h3>

                    <i class="tio-wallet-outlined fz--30"></i>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <h5 class="text-capitalize">{{translate('messages.amount')}}
                                : {{$wr->amount}}</h5>
                            <h5>{{translate('messages.request_time')}} : {{$wr->created_at}}</h5>
                        </div>
                        <div class="col-4">
                            {{translate('messages.note')}} : {{$wr->transaction_note}}
                        </div>
                        <div class="col-4">
                            @if ($wr->approved== 0)
                                <button type="button" class="btn btn-success float-right" data-toggle="modal"
                                        data-target="#exampleModal">{{translate('messages.proceed')}}
                                    <i class="tio-arrow-forward"></i>
                                </button>
                            @else
                                <div class="text-center float-right text-capitalize">
                                    @if($wr->approved==1)
                                        <label class="badge badge-success p-2 rounded-bottom">
                                            {{translate('messages.approved')}}
                                        </label>
                                    @else
                                        <label class="badge badge-danger p-2 rounded-bottom">
                                            {{translate('messages.denied')}}
                                        </label>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card min-height-260">
                <div class="card-header">
                    <h3 class="h3 mb-0 text-capitalize">{{translate('messages.my_bank_info')}} </h3>
                    <i class="tio tio-dollar-outlined"></i>
                </div>
                <div class="card-body">
                    <div class="col-md-8 mt-2">
                        <h4>{{translate('messages.bank_name')}}
                            : {{$wr->vendor && $wr->vendor->bank_name ? $wr->vendor->bank_name : 'No Data found'}}</h4>
                        <h6 class="text-capitalize">{{translate('messages.branch')}}
                            : {{$wr->vendor && $wr->vendor->branch ? $wr->vendor->branch : 'No Data found'}}</h6>
                        <h6>{{translate('messages.holder_name')}}
                            : {{$wr->vendor && $wr->vendor->holder_name ? $wr->vendor->holder_name : 'No Data found'}}</h6>
                        <h6>{{translate('messages.account_no')}}
                            : {{$wr->vendor && $wr->vendor->account_no ? $wr->vendor->account_no : 'No Data found'}}</h6>
                    </div>
                </div>
            </div>
        </div>
        @if($wr->vendor && $wr->vendor->stores[0])
            <div class="col-md-4">
                <div class="card min-height-260">
                    <div class="card-header">
                        <h3 class="h3 mb-0">{{translate('messages.info')}} {{translate('messages.store')}}</h3>
                        <i class="tio tio-shop-outlined"></i>
                    </div>
                    <div class="card-body">
                        <h5>{{translate('messages.store')}} : {{$wr->vendor->stores[0]->name}}</h5>
                        <h5>{{translate('messages.phone')}} : {{$wr->vendor->stores[0]->contact}}</h5>
                        <h5>{{translate('messages.address')}} : {{$wr->vendor->stores[0]->address}}</h5>
                        <h5 class="text-capitalize badge badge-success">{{translate('messages.balance')}}
                            : {{$wr->vendor->wallet->balance}}
                        </h5>
                    </div>
                </div>
            </div>
        @endif
        <div class="col-md-4">
            <div class="card min-height-260">
                <div class="card-header">
                    <h3 class="h3 mb-0 "> {{translate('messages.info')}} {{translate('messages.owner')}}</h3>
                    <i class="tio tio-user-big-outlined"></i>
                </div>
                <div class="card-body">
                    @if ($wr->vendor)
                        <h5>{{translate('messages.name')}} : {{$wr->vendor->f_name}} {{$wr->vendor->l_name}}</h5>
                        <h5>{{translate('messages.email')}} : {{$wr->vendor->email}}</h5>
                        <h5>{{translate('messages.phone')}} : {{$wr->vendor->phone}}</h5>
                    @else
                        <h5>{{translate('messages.store deleted!')}}</h5>
                    @endif

                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{translate('Withdraw request process')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('admin.vendor.withdraw_status',[$wr->id])}}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">{{translate('messages.request')}}:</label>
                                <select name="approved" class="custom-select" id="inputGroupSelect02">
                                    <option value="1">{{translate('messages.approve')}}</option>
                                    <option value="2">{{translate('messages.deny')}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">{{translate('Note about transaction or
                                    request')}}:</label>
                                <textarea class="form-control" name="note" id="message-text"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{translate('messages.Close')}}</button>
                            <button type="submit" class="btn btn-primary">{{translate('messages.Submit')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')

@endpush
