@extends('layouts.master')

@section('title')
    Payment
@endsection

@section('header')
    @include('partials.header')
@endsection

@section('content')
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-9" id="checkout">

                    <div class="box">
                        <form method="post" action="{{route('user.checkout',2)}}">
                            {{ csrf_field() }}
                            <h1>Checkout</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li class="active"><a href="#"><i class="fa fa-map-marker"></i><br>Address</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-truck"></i><br>Delivery Method</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                                </li>
                            </ul>

                            <div class="content">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="sel1">Delivery Address:</label>
                                            <select class="form-control" name="addr_sel" id="addr_sel">
                                                <option value="1">Use my default Address</option>
                                                <option value="2">Custom Address</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div id="addr_info">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="firstname">Name</label>
                                                <input type="text" class="form-control" name="firstname" id="firstname"
                                                       value=" " required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6"></div>
                                    </div>
                                    <!-- /.row -->

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="company">Address</label>
                                                <input type="text" class="form-control" name="addr_line1" id="addr"
                                                       value=" " required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="street">Street</label>
                                                <input type="text" class="form-control" name="addr_line2" id="street"
                                                       value=" " required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->

                                    <div class="row">
                                        <div class="col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <label for="city">City</label>
                                                <input type="text" class="form-control" name="addr_city" id="city"
                                                       value=" " required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="phone">Telephone</label>
                                                <input type="text" class="form-control" name="phone_no" id="phone"
                                                       value=" " required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <div class="row" id="current_addr">
                                    <div class="col-sm-2">Your Current Address:</div>
                                    <div class="col-sm-4">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                {{$addr->addr_line1}}<br>
                                                {{$addr->addr_line2}}<br>
                                                {{$addr->addr_city}}<br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="{{route('user.getCart')}}" class="btn btn-default"><i
                                                class="fa fa-chevron-left"></i>Back
                                        to
                                        Cart</a>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Continue to Delivery
                                        Method<i
                                                class="fa fa-chevron-right"></i></button>
                                <!--<a href="{{ url('/user/checkout/2')}}" class="btn btn-primary">Continue to Delivery
                                        Method<i
                                                class="fa fa-chevron-right"></i></a>-->
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col-md-9 -->

                <div class="col-md-3">
                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Order summary</h3>
                        </div>
                        <p class="text-muted">Delivery costs are not included in this following summary</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>Order subtotal</td>
                                    <th>{{Cart::subtotal()}} LKR</th>
                                </tr>
                                <tr>
                                    <td>Delivery Costs</td>
                                    <th>N/A</th>
                                </tr>
                                <tr>
                                    <td>Discount</td>
                                    <th>0 LKR</th>
                                </tr>
                                <tr class="total">
                                    <td>Total</td>
                                    <th>{{Cart::subtotal()}}LKR</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- /.col-md-3 -->
            </div>
        </div>
    </div>
    @include('partials.footer')
@endsection

@section('scripts')
    <script src="{{URL::to('js/my/cart.js')}}"></script>
    <script>
        var token = '{{\Illuminate\Support\Facades\Session::token()}}';
    </script>
@endsection
