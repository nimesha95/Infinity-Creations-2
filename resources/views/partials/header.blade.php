<!-- *** TOPBAR ***
_________________________________________________________ -->
<div id="top">
    <div class="container">
        <div class="col-md-6 offer" data-animate="fadeInDown">
        </div>
        <div class="col-md-6" data-animate="fadeInDown">
            <ul class="menu">
                @if(Auth::check())
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">{{ Auth::user()->name }}</a></li>
                @else
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a></li>
                    <li><a href="{{ route('user.signup') }}">Register</a></li>
                @endif
                <li><a href="{{route('product.contact')}}">Contact</a></li>
                @if(Auth::check())
                    <li><a href="{{ route('user.logout') }}">Logout</a></li>
                @endif
            </ul>
        </div>
    </div>
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
        <div class="modal-dialog modal-sm">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="Login">Customer login</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.signin') }}" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" id="email-modal" placeholder="email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password-modal"
                                   placeholder="password">
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label><input type="checkbox" name="rememberme" value="1">Remember Me!</label>
                            </div>
                        </div>
                        <p class="text-center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                        </p>
                        {{ csrf_field() }}
                    </form>

                    <p class="text-center text-muted">Not registered yet?</p>
                    <p class="text-center text-muted"><a href="{{ route('user.signup') }}"><strong>Register now</strong></a>!
                        It is
                        easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                </div>
            </div>
        </div>
    </div>

</div>

<!-- *** TOP BAR END *** -->

<!-- *** NAVBAR ***
_________________________________________________________ -->

<div class="navbar navbar-default yamm" role="navigation" id="navbar">
    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand home" href="index.html" data-animate-hover="bounce">
                <img src="{{ asset('img/infinityCreationLogo.png') }}" height="100" style="float:left"/>
                <h1 id="fh5co-logo"><a href="/">Infinity <font color="#aaaaaa">Creations</font></a></h1>
            </a>
            <div class="navbar-buttons">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button>
                <a class="btn btn-default navbar-toggle" href="basket.html">
                    <i class="fa fa-shopping-cart"></i> <span class="hidden-xs">3 items in cart</span>
                </a>
            </div>
        </div>
        <!--/.navbar-header -->

        <div class="navbar-collapse collapse" id="navigation">

            <ul class="nav navbar-nav navbar-left">
                <li class="{{ Request::is('/') ? 'active' : '' }}">
                    <a href="/">Home</a>
                </li>

                <li class="dropdown yamm-fw">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Services
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h5>Digital Printing</h5>
                                        <ul>
                                            <li><a href="{{route('product.custom_order')}}">T-Flex Banners</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">PVC Stickers</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">REverse Printing</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">Sign Boards</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">Dealer Boards</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">Fabric Printing</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-2">
                                        <h5>Mug Printing</h5>
                                        <ul>
                                            <li><a href="{{route('product.custom_order')}}">Normal Mugs</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">Radium Mugs</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">Magic Mugs</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">Glass Magic Mugs</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">Heart Magic Mugs</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">Pearl Mugs</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">Steel Mugs</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">Other Mugs</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-2">
                                        <h5>Laser Printing</h5>
                                        <ul>
                                            <li><a href="{{route('product.custom_order')}}">Prinouts</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">Photocopy</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">Certificates</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">Booklets</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">Leaflets</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">Visiting Cards</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">Stickers</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">Labels</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">Other Laser Printings</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-2">
                                        <h5>Creative Designing</h5>
                                        <ul>
                                            <li><a href="{{route('product.custom_order')}}">Leaflets</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">Posters</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">Banners</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">Booklets</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">Applications</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">ID Cards</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">Mugs</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">Caladers</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">Latterheads</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">Other</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-2">
                                        <h5>Web Designing</h5>
                                        <ul>
                                            <li><a href="{{route('product.custom_order')}}">Planning</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">Designing</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">Domain Registration</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">Host</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">Update</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-2">
                                        <h5>Photo & Video Editing</h5>
                                        <ul>
                                            <li><a href="{{route('product.custom_order')}}">Photography</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">Poto Editing</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">Event Management</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">Video Albums</a>
                                            </li>
                                            <li><a href="{{route('product.custom_order')}}">Others</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /.yamm-content -->
                            <
                        </li>
                    </ul>
                </li>
                <li class="dropdown yamm-fw">
                    <a href="{{route('product.contact')}}">Contact US</a>
                </li>
            </ul>

        </div>
        <!--/.nav-collapse -->

        <div class="navbar-buttons">

            @if(Auth::check())
                <div class="navbar-collapse collapse right" id="basket-overview">
                    <a href="{{route('user.getCart')}}" class="btn btn-primary navbar-btn"><i
                                class="fa fa-shopping-cart"></i><span
                                class="hidden-sm">{{Auth::check()? Cart::count() : ''}} items in cart</span></a>
                </div>
        @endif
        <!--/.nav-collapse -->

            <div class="navbar-collapse collapse right" id="search-not-mobile">
                <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button>
            </div>

        </div>

        <div class="collapse clearfix" id="search">

            <form class="navbar-form" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-btn">

			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

		    </span>
                </div>
            </form>

        </div>
        <!--/.nav-collapse -->

    </div>
    <!-- /.container -->
</div>
<!-- /#navbar -->

<!-- *** NAVBAR END *** -->
<div class="row">
    <div class="col-md-4 col-md-offset-4">
    @if(count($errors)>0)   <!-- to show error alerts -->
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
        @endif
    </div>
</div>