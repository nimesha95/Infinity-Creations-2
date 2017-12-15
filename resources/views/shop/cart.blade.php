@extends('layouts.master')

@section('title')
    Cart
@endsection

@section('header')
    @include('partials.header')
@endsection

@section('content')

    <div id="all">

        <div id="content">
            <div class="container">


                <div class="col-md-9" id="basket">

                    <div class="box">

                        <form method="post" action="#">

                            <h1>Shopping cart</h1>
                            <p class="text-muted">You currently have {{Cart::count()}} item(s) in your cart.</p>
                            <div class="table-responsive">
                                <table class="table">
                                    @if(Cart::count()>0)
                                        <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Quantity</th>
                                            <th></th>
                                            <th>Unit price</th>
                                            <th>Discount</th>
                                            <th colspan="2">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach(Cart::content() as $row)
                                            <tr class="itemRow" data-rowid="{{$row->rowId}}">
                                                <td></td>
                                                <td>
                                                    <a href="#">{{$row->name}}</a>
                                                </td>
                                                <td>
                                                    <!-- <input type="number" value="2" class="form-control"> -->
                                                    {{$row->qty}}
                                                </td>
                                                <td class="buttonOption">
                                                    <a id="myBtn"
                                                       href="{{route('product.RemoveFromCart' , ['count'=>1,'rowid'=> $row->rowId,'curcount'=>$row->qty])}}""
                                                    class="btn btn-xs btn-danger pull-right rem" role="button">
                                                        <span class="glyphicon glyphicon-minus"></span>&nbsp;
                                                    </a>
                                                    <a href="{{route('product.PlusOneCart' , ['rowid'=> $row->rowId,'curcount'=>$row->qty])}}"
                                                       class="btn btn-xs btn-success pull-right" role="button">
                                                        <span class="glyphicon glyphicon-plus "></span>&nbsp;
                                                        <!--span need some non char to fill the space-->
                                                    </a>
                                                </td>
                                                <td>{{$row->price}} LKR</td>
                                                <td>0 LKR</td>
                                                <td>{{$row->subtotal}} LKR</td>
                                                <td>
                                                    <a href="{{route('product.RemoveFromCart' , ['count'=>'all','rowid'=> $row->rowId])}}"><i
                                                                class="fa fa-trash-o"></i></a>
                                                </td>
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
                                    <a href="/" class="btn btn-default"><i class="fa fa-chevron-left"></i>
                                        Continue shopping</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url('/user/checkout/1') }}" class="btn btn-primary">
                                        Proceed to checkout
                                        <i class="fa fa-chevron-right"></i>
                                    </a>
                                    <!--
                                    <button type="submit" class="btn btn-primary">Proceed to checkout <i
                                                class="fa fa-chevron-right"></i>
                                    </button>
                                    -->
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
@section('scripts')
    <script>
        var token = '{{Session::token()}}';
        var url = '{{route('changeCart')}}';
    </script>
    <script src="{{URL::to('js/myCustomJS.js')}}"></script>
@endsection
@include('partials.footer')
@endsection

