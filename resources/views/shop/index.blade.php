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
                    <div class="item">
                        <div class="product">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <a href="detail.html">
                                            <img src="{{ asset('img/radiumMug1.jpg') }}" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="text">
                                <h3><a href="detail.html">Radium Mug</a></h3>
                                <p class="price">500 LKR</p>
                            </div>
                            <!-- /.text -->
                        </div>
                        <!-- /.product -->
                    </div>

                    <div class="item">
                        <div class="product">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <a href="detail.html">
                                            <img src="{{asset('img/sticker.jpg')}}" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="text">
                                <h3><a href="detail.html">Wall Stickers</a></h3>
                                <p class="price">150 LKR onwards</p>
                            </div>
                            <!-- /.text -->

                            <div class="ribbon new">
                                <div class="theribbon">NEW</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->
                        </div>
                        <!-- /.product -->
                    </div>


                    <div class="item">
                        <div class="product">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <a href="detail.html">
                                            <img src="{{asset('img/steelMug.jpg')}}" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="text">
                                <h3><a href="detail.html">Steel Mug Printing</a></h3>
                                <p class="price">750 LKR</p>
                            </div>
                            <!-- /.text -->
                        </div>
                        <!-- /.product -->
                    </div>

                    <div class="item">
                        <div class="product">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <a href="detail.html">
                                            <img src="{{asset('img/booklet.jpg')}}" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="text">
                                <h3><a href="detail.html">BookLet</a></h3>
                                <p class="price">200 LKR</p>
                            </div>
                            <!-- /.text -->
                        </div>
                        <!-- /.product -->
                    </div>

                    <div class="item">
                        <div class="product">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <a href="detail.html">
                                            <img src="{{asset('img/magicMug3.jpg') }}" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="text">
                                <h3><a href="detail.html">Magic Mug</a></h3>
                                <p class="price">
                                    <del>$500</del>
                                    $475.00
                                </p>
                            </div>
                            <!-- /.text -->

                            <div class="ribbon sale">
                                <div class="theribbon">SALE</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->

                            <div class="ribbon new">
                                <div class="theribbon">NEW</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->

                            <div class="ribbon gift">
                                <div class="theribbon">GIFT</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->
                        </div>
                        <!-- /.product -->
                    </div>


                    <div class="item">
                        <div class="product">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <a href="detail.html">
                                            <img src="{{asset('img/fabricprint.jpg')}}" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="text">
                                <h3><a href="detail.html">Fabric Printing</a></h3>
                                <p class="price">250 LKR onwards</p>
                            </div>
                            <!-- /.text -->

                            <div class="ribbon gift">
                                <div class="theribbon">GIFT</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->

                        </div>
                        <!-- /.product -->
                    </div>
                    <!-- /.col-md-4 -->

                    <div class="item">
                        <div class="product">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <a href="detail.html">
                                            <img src="{{asset('img/banner.jpg')}}" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="text">
                                <h3><a href="detail.html">Banner Printing</a></h3>
                                <p class="price">
                                    250 LKR onwards
                                </p>
                            </div>
                            <!-- /.text -->

                            <div class="ribbon sale">
                                <div class="theribbon">SALE</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->

                            <div class="ribbon new">
                                <div class="theribbon">NEW</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->

                            <div class="ribbon gift">
                                <div class="theribbon">GIFT</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->
                        </div>
                        <!-- /.product -->
                    </div>

                    <div class="item">
                        <div class="product">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <a href="detail.html">
                                            <img src="{{asset('img/poster.jpg')}}" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="text">
                                <h3><a href="detail.html">Poster Printing</a></h3>
                                <p class="price">100 LKR onwards</p>
                            </div>
                            <!-- /.text -->
                        </div>
                        <!-- /.product -->
                    </div>

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

    <div id="footer" data-animate="fadeInUp" style="opacity: 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <h4>Pages</h4>

                    <ul>
                        <li><a href="text.html">About us</a>
                        </li>
                        <li><a href="text.html">Terms and conditions</a>
                        </li>
                        <li><a href="faq.html">FAQ</a>
                        </li>
                        <li><a href="contact.html">Contact us</a>
                        </li>
                    </ul>

                    <hr>

                    <h4>User section</h4>

                    <ul>
                        <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                        </li>
                        <li><a href="register.html">Regiter</a>
                        </li>
                    </ul>

                    <hr class="hidden-md hidden-lg hidden-sm">

                </div>
                <!-- /.col-md-3 -->

                <div class="col-md-3 col-sm-6">

                    <h4>Top categories</h4>

                    <h5>Men</h5>

                    <ul>
                        <li><a href="category.html">T-shirts</a>
                        </li>
                        <li><a href="category.html">Shirts</a>
                        </li>
                        <li><a href="category.html">Accessories</a>
                        </li>
                    </ul>

                    <h5>Ladies</h5>
                    <ul>
                        <li><a href="category.html">T-shirts</a>
                        </li>
                        <li><a href="category.html">Skirts</a>
                        </li>
                        <li><a href="category.html">Pants</a>
                        </li>
                        <li><a href="category.html">Accessories</a>
                        </li>
                    </ul>

                    <hr class="hidden-md hidden-lg">

                </div>
                <!-- /.col-md-3 -->

                <div class="col-md-3 col-sm-6">

                    <h4>Where to find us</h4>

                    <p><strong>Obaju Ltd.</strong>
                        <br>13/25 New Avenue
                        <br>New Heaven
                        <br>45Y 73J
                        <br>England
                        <br>
                        <strong>Great Britain</strong>
                    </p>

                    <a href="contact.html">Go to contact page</a>

                    <hr class="hidden-md hidden-lg">

                </div>
                <!-- /.col-md-3 -->


                <div class="col-md-3 col-sm-6">

                    <h4>Get the news</h4>

                    <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac
                        turpis egestas.</p>

                    <form>
                        <div class="input-group">

                            <input type="text" class="form-control">

                            <span class="input-group-btn">

			    <button class="btn btn-default" type="button">Subscribe!</button>

			</span>

                        </div>
                        <!-- /input-group -->
                    </form>

                    <hr>

                    <h4>Stay in touch</h4>

                    <p class="social">
                        <a href="#" class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="twitter external" data-animate-hover="shake"><i
                                    class="fa fa-twitter"></i></a>
                        <a href="#" class="instagram external" data-animate-hover="shake"><i
                                    class="fa fa-instagram"></i></a>
                        <a href="#" class="gplus external" data-animate-hover="shake"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="email external" data-animate-hover="shake"><i class="fa fa-envelope"></i></a>
                    </p>


                </div>
                <!-- /.col-md-3 -->

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->
    </div>

    <div id="copyright">
        <div class="container">
            <div class="col-md-6">
                <p class="pull-left">© 2015 Your name goes here.</p>

            </div>
            <div class="col-md-6">
                <p class="pull-right">Template by <a
                            href="https://bootstrapious.com/e-commerce-templates">Bootstrapious</a> &amp; <a
                            href="https://fity.cz">Fity</a>
                    <!-- Not removing these links is part of the license conditions of the template. Thanks for understanding :) If you want to use the template without the attribution links, you can do so after supporting further themes development at https://bootstrapious.com/donate  -->
                </p>
            </div>
        </div>
    </div>

@endsection