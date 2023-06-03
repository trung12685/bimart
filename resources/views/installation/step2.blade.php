@extends('layouts.blank')
@section('content')
    <div class="container">
        <div class="card mt-6">
            <div class="card-body">
                <div class="card-header d-block">
                    <div class="row">
                        <div class="col-12">
                            @if(session()->has('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{session('error')}}
                                </div>
                            @endif
                            <div class="mar-ver pad-btm text-center">
                                <h1 class="h3">6amMart 1.6.1 - Nulled</h1>
                                <p>
                                    Nulled By Doxec.<br>
                                    <a href="https://babiato.co/members/doxec.99226/"
                                       class="text-info">Join babiato and learn more</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pt-5">
                    <div class="col-3"></div>
                    <div class="col-md-6">
                        <div class="text-muted font-13">
                            <form method="POST" action="{{ route('purchase.code')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="purchase_code">Codecanyon Username</label>
                                    <input type="text" value="Doxec" class="form-control"
                                           id="username"
                                           name="username" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="purchase_code">Purchase Code</label>
                                    <input type="text" value="babiato-forum" class="form-control"
                                           id="purchase_key"
                                           name="purchase_key" readonly>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info">Continue</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
