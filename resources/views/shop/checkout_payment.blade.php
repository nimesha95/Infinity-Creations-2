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
                        <form method="post" action="{{route('user.checkout',4)}}">
                            {{ csrf_field() }}
                            <h1>Checkout - Payment method</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="{{ url('/user/checkout/1') }}"><i class="fa fa-map-marker"></i><br>Address</a>
                                </li>
                                <li><a href="{{ url('/user/checkout/2') }}"><i class="fa fa-truck"></i><br>Delivery
                                        Method</a>
                                </li>
                                <li class="active"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                                </li>
                            </ul>

                            <div class="content">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="box payment-method">

                                            <h4>Cash</h4>

                                            <p>Pay later when you pickup</p>

                                            <div class="box-footer text-center">

                                                <input type="radio" name="payment" value="cash" checked>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="box payment-method">

                                            <h4>Paypal</h4>

                                            <p>Paywith your Credit/Debit card</p>

                                            <div class="box-footer text-center">

                                                <input type="radio" name="payment" value="paypal">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                            </div>
                            <!-- /.content -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="{{ url('/user/checkout/2') }}" class="btn btn-default"><i
                                                class="fa fa-chevron-left"></i>Back
                                        to Delivery</a>
                                </div>
                                <div class="pull-right">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary">Continue to Delivery
                                            Method<i
                                                    class="fa fa-chevron-right"></i></button>
                                    <!--
                                    <a href="{{ url('/user/checkout/4') }}" class="btn btn-primary">Review Order<i
                                                class="fa fa-chevron-right"></i></a>
                                                -->

                                    </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>

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
            <!-- /.container -->
        </div>
    </div>

    @include('partials.footer')
@endsection