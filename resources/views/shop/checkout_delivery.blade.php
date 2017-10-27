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
                        <form method="post" action="#">
                            <h1>Checkout - Delivery method</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="{{ url('/user/checkout/1') }}"><i class="fa fa-map-marker"></i><br>Address</a>
                                </li>
                                <li class="active"><a href="#"><i class="fa fa-truck"></i><br>Delivery Method</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                                </li>
                            </ul>

                            <div class="content">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="box shipping-method">

                                            <h4>USPS Next Day</h4>

                                            <p>Get it right on next day - fastest option possible.</p>

                                            <div class="box-footer text-center">

                                                <input type="radio" name="delivery" value="delivery1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="box shipping-method">

                                            <h4>USPS Next Day</h4>

                                            <p>Get it right on next day - fastest option possible.</p>

                                            <div class="box-footer text-center">

                                                <input type="radio" name="delivery" value="delivery2">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="box shipping-method">

                                            <h4>USPS Next Day</h4>

                                            <p>Get it right on next day - fastest option possible.</p>

                                            <div class="box-footer text-center">

                                                <input type="radio" name="delivery" value="delivery3">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                            </div>
                            <!-- /.content -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="{{ url('/user/checkout/1') }}" class="btn btn-default"><i
                                                class="fa fa-chevron-left"></i>Back
                                        to Addresses</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url('/user/checkout/3') }}" class="btn btn-primary">Continue to Payment
                                        Method<i
                                                class="fa fa-chevron-right"></i></a>

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
            <!-- /.container -->
        </div>
    </div>

    @include('partials.footer')
@endsection