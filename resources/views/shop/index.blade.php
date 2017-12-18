@extends('layouts.master')

@section('title')
    Infinity Creations
@endsection

@section('header')
    @include('partials.header')
@endsection

@section('content')

    <div class="container">

        <div id="all">

            <div id="content">

                <div class="container">
                    <div class="col-md-12">
                        <div id="main-slider" class="owl-carousel owl-theme" style="display: block; opacity: 1;">

                            <div class="item">

                                <img src="{{ asset('img/main-slider1.jpg') }}" alt="" class="img-responsive">
                            </div>
                            <div class="item">
                                <img class="img-responsive" src="{{ asset('img/main-slider2.jpg') }}" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive" src="{{ asset('img/main-slider3.jpg') }}" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive" src="{{ asset('img/main-slider4.jpg') }}" alt="">
                            </div>
                        </div>
                        <!-- /#main-slider -->
                    </div>
                </div>

                <!-- *** ADVANTAGES HOMEPAGE ***
     _________________________________________________________ -->
                <div id="advantages">

                    <div class="container">
                        <div class="same-height-row">
                            <div class="col-sm-4">
                                <div class="box same-height clickable">
                                    <img src="{{ asset('img/large-format-printing.png') }}" alt="" width="100"
                                         height="100">

                                    <h3><a href="#"><b>DIGITAL PRINTING</b></a></h3>
                                    <p>Large Format Digital Printing, Out Door Advertising, Sticker Printing.</p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="box same-height clickable">
                                    <img src="{{ asset('img/mug.png') }}" alt="" width="100" height="100">
                                    <h3><a href="#"><b>MUG PRINTING</b></a></h3>
                                    <p>Print Any logo, slogan or graphic in full colour onto a mug</p>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="box same-height clickable">
                                    <img src="{{ asset('img/otherAccessories.png') }}" alt="" width="100" height="100">
                                    <h3><a href="#"><b>OTHER SERVICES</b></a></h3>
                                    <p>Visit our showroom which is located in Welisara</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->

        </div>
        <!-- /#advantages -->

        <!-- *** ADVANTAGES END *** -->

        <!-- *** HOT PRODUCT SLIDESHOW ***
    _________________________________________________________ -->
        <div id="hot">

            <div class="box">
                <div class="container">
                    <div class="col-md-12">
                        <h2>Hot this week</h2>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="product-slider">
                    @if(sizeof($items)>0)
                        @foreach($items as $item)
                            <div class="item">
                                <div class="product">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front">
                                                <a href="{{route('product.show' , ['id'=> $item->pro_id])}}">
                                                    <img src="{{ $item->thumb }}" alt=""
                                                         class="img-responsive">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text">
                                        <h3>
                                            <a href="{{route('product.show' , ['id'=> $item->pro_id])}}">{{$item->name}}</a>
                                        </h3>
                                        <p class="price">500 LKR</p>
                                    </div>
                                    <!-- /.text -->
                                </div>
                                <!-- /.product -->
                            </div>
                        @endforeach
                    @endif
                </div>
                <!-- /.product-slider -->
            </div>
            <!-- /.container -->

        </div>
        <!-- /#hot -->

        <!-- *** HOT END *** -->

        <!-- *** GET INSPIRED ***
    _________________________________________________________ -->

        <!-- *** GET INSPIRED END *** -->

        <!-- *** BLOG HOMEPAGE ***
    _________________________________________________________ -->

        <div class="box text-center" data-animate="fadeInUp">
            <div class="container">
                <div class="col-md-12">
                    <h3 class="text-uppercase">From our blog</h3>

                    <p class="lead">What's new in the world of fashion? <a href="blog.html">Check our blog!</a>
                    </p>
                </div>
            </div>
        </div>


        <!-- /.container -->

        <!-- *** BLOG HOMEPAGE END *** -->


    </div>
    @include('partials.footer')
@endsection