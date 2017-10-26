@extends('layouts.master')

@section('title')
    @foreach($items as $item)
        {{$item->name}}
    @endforeach
@endsection

@section('scripts1')
    <script type="text/javascript">
        function changeImage(imgr) {
            document.getElementById("imageReplace").src = imgr;
        }
    </script>
@endsection

@section('header')
    @include('partials.header')
@endsection

@section('content')

    <div id="all">

        <div id="content">
            <div class="container">


                <div class="col-md-2"></div>
                @foreach($items as $item)
                    <div class="col-md-9">

                        <div class="row" id="productMain">
                            <div class="col-sm-6">
                                <div id="mainImage">
                                    <img src="{{$item->img1}}" alt="" class="img-responsive">
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="box">
                                    <h1 class="text-center">{{$item->name}}</h1>
                                    <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product
                                            details, material & care and sizing</a>
                                    </p>
                                    <p class="price">{{$item->price}} LKR {{$item->pricing_unit}}</p>

                                    <p class="text-center buttons">
                                        <a href="basket.html" class="btn btn-primary"><i
                                                    class="fa fa-shopping-cart"></i>
                                            Add to cart</a>
                                        <a href="basket.html" class="btn btn-default"><i class="fa fa-heart"></i> Add to
                                            wishlist</a>
                                    </p>


                                </div>

                                <div class="row" id="thumbs">
                                    <div class="col-xs-4">
                                        <a href="{{$item->img1}}" class="thumb">
                                            <img src="{{$item->img1}}" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="col-xs-4">
                                        <a href="{{$item->img2}}" class="thumb">
                                            <img src="{{$item->img2}}" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="col-xs-4">
                                        <a href="{{$item->img3}}" class="thumb">
                                            <img src="{{$item->img3}}" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="box" id="details">
                            <p>
                            <h4>Product details</h4>
                            <p>{{$item->item_description}}</p>

                            <hr>
                            <div class="social">
                                <h4>Show it to your friends</h4>
                                <p>
                                    <a href="#" class="external facebook" data-animate-hover="pulse"><i
                                                class="fa fa-facebook"></i></a>
                                    <a href="#" class="external gplus" data-animate-hover="pulse"><i
                                                class="fa fa-google-plus"></i></a>
                                    <a href="#" class="external twitter" data-animate-hover="pulse"><i
                                                class="fa fa-twitter"></i></a>
                                    <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                                </p>
                            </div>
                        </div>


                    </div>
                    <!-- /.col-md-9 -->
                @endforeach
            </div>
            <!-- /.container -->
        </div>
    </div>

@endsection