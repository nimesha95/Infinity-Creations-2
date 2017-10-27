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
                            <h1>Checkout - Order review</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="{{ url('/user/checkout/1') }}"><i class="fa fa-map-marker"></i><br>Address</a>
                                </li>
                                <li><a href="{{ url('/user/checkout/2') }}"><i class="fa fa-truck"></i><br>Delivery
                                        Method</a>
                                </li>
                                <li><a href="{{ url('/user/checkout/3') }}"><i class="fa fa-money"></i><br>Payment
                                        Method</a>
                                </li>
                                <li class="active"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                                </li>
                            </ul>

                            <div class="content">
                                <div class="table-responsive">
                                    <table class="table">
                                        @if(Cart::count()>0)
                                            <thead>
                                            <tr>
                                                <th colspan="2">Product</th>
                                                <th>Quantity</th>
                                                <th>Unit price</th>
                                                <th>Discount</th>
                                                <th colspan="2">Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach(Cart::content() as $row)
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <a href="#">{{$row->name}}</a>
                                                    </td>
                                                    <td>
                                                        {{$row->qty}}
                                                    </td>
                                                    <td>{{$row->price}} LKR</td>
                                                    <td>0 LKR</td>
                                                    <td>{{$row->subtotal}} LKR</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th colspan="5">Total</th>
                                                <th colspan="2">{{Cart::subtotal()}} LKR</th>
                                            </tr>
                                            </tfoot>
                                        @else
                                            <td>You have No items in the Cart</td>
                                        @endif
                                    </table>

                                </div>
                                <!-- /.table-responsive -->

                                <div class="box-footer">
                                    <div class="pull-left">
                                        <a href="{{ url('/user/checkout/3') }}" class="btn btn-default"><i
                                                    class="fa fa-chevron-left"></i>Back
                                            to Payment</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ url('/user/checkout/5') }}" class="btn btn-primary">Confirm Order<i
                                                    class="fa fa-chevron-right"></i></a>

                                    </div>
                                </div>
                        </form>
                    </div>
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