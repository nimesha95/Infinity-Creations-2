<!-- *** TOPBAR ***
_________________________________________________________ -->
<div id="top">
    <div class="container">
        <div class="col-md-6 offer" data-animate="fadeInDown">
            <a href="#" class="btn btn-success btn-sm" data-animate-hover="shake">Offer of the day</a> <a href="#">Get
                flat 35% off on orders over $50!</a>
        </div>
        <div class="col-md-6" data-animate="fadeInDown">
            <ul class="menu">
                <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                </li>
                <li><a href="register.html">Register</a>
                </li>
                <li><a href="contact.html">Contact</a>
                </li>
                <li><a href="#">Recently viewed</a>
                </li>
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
                    <form action="customer-orders.html" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" id="email-modal" placeholder="email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password-modal" placeholder="password">
                        </div>

                        <p class="text-center">
                            <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                        </p>

                    </form>

                    <p class="text-center text-muted">Not registered yet?</p>
                    <p class="text-center text-muted"><a href="register.html"><strong>Register now</strong></a>! It is
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
                <!--<img src="img/logo.png" alt="Obaju logo" class="hidden-xs">-->
                <img src="{{ asset('img/infinityCreationLogo.png') }}" height="100" style="float:left"/>
                <h1 id="fh5co-logo"><a href="index.html">Infinity <font color="#aaaaaa">Creations</font></a></h1>
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
                <li class="active"><a href="index.html">Home</a>
                </li>
                <li class="dropdown yamm-fw">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Projects
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h5>Digital Printing</h5>
                                        <ul>
                                            <li><a href="category.html">T-Flex Banners</a>
                                            </li>
                                            <li><a href="category.html">PVC Stickers</a>
                                            </li>
                                            <li><a href="category.html">REverse Printing</a>
                                            </li>
                                            <li><a href="category.html">Sign Boards</a>
                                            </li>
                                            <li><a href="category.html">Dealer Boards</a>
                                            </li>
                                            <li><a href="category.html">Fabric Printing</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-2">
                                        <h5>Mug Printing</h5>
                                        <ul>
                                            <li><a href="category.html">Normal Mugs</a>
                                            </li>
                                            <li><a href="category.html">Radium Mugs</a>
                                            </li>
                                            <li><a href="category.html">Magic Mugs</a>
                                            </li>
                                            <li><a href="category.html">Glass Magic Mugs</a>
                                            </li>
                                            <li><a href="category.html">Heart Magic Mugs</a>
                                            </li>
                                            <li><a href="category.html">Pearl Mugs</a>
                                            </li>
                                            <li><a href="category.html">Steel Mugs</a>
                                            </li>
                                            <li><a href="category.html">Other Mugs</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-2">
                                        <h5>Laser Printing</h5>
                                        <ul>
                                            <li><a href="category.html">Prinouts</a>
                                            </li>
                                            <li><a href="category.html">Photocopy</a>
                                            </li>
                                            <li><a href="category.html">Certificates</a>
                                            </li>
                                            <li><a href="category.html">Booklets</a>
                                            </li>
                                            <li><a href="category.html">Leaflets</a>
                                            </li>
                                            <li><a href="category.html">Visiting Cards</a>
                                            </li>
                                            <li><a href="category.html">Stickers</a>
                                            </li>
                                            <li><a href="category.html">Labels</a>
                                            </li>
                                            <li><a href="category.html">Other Laser Printings</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-2">
                                        <h5>Creative Designing</h5>
                                        <ul>
                                            <li><a href="category.html">Leaflets</a>
                                            </li>
                                            <li><a href="category.html">Posters</a>
                                            </li>
                                            <li><a href="category.html">Banners</a>
                                            </li>
                                            <li><a href="category.html">Booklets</a>
                                            </li>
                                            <li><a href="category.html">Applications</a>
                                            </li>
                                            <li><a href="category.html">ID Cards</a>
                                            </li>
                                            <li><a href="category.html">Mugs</a>
                                            </li>
                                            <li><a href="category.html">Caladers</a>
                                            </li>
                                            <li><a href="category.html">Latterheads</a>
                                            </li>
                                            <li><a href="category.html">Other</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-2">
                                        <h5>Web Designing</h5>
                                        <ul>
                                            <li><a href="category.html">Planning</a>
                                            </li>
                                            <li><a href="category.html">Designing</a>
                                            </li>
                                            <li><a href="category.html">Domain Registration</a>
                                            </li>
                                            <li><a href="category.html">Host</a>
                                            </li>
                                            <li><a href="category.html">Update</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-2">
                                        <h5>Photo & Video Editing</h5>
                                        <ul>
                                            <li><a href="category.html">Photography</a>
                                            </li>
                                            <li><a href="category.html">Poto Editing</a>
                                            </li>
                                            <li><a href="category.html">Event Management</a>
                                            </li>
                                            <li><a href="category.html">Video Albums</a>
                                            </li>
                                            <li><a href="category.html">Others</a>
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Services
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h5>Digital Printing</h5>
                                        <ul>
                                            <li><a href="category.html">T-Flex Banners</a>
                                            </li>
                                            <li><a href="category.html">PVC Stickers</a>
                                            </li>
                                            <li><a href="category.html">REverse Printing</a>
                                            </li>
                                            <li><a href="category.html">Sign Boards</a>
                                            </li>
                                            <li><a href="category.html">Dealer Boards</a>
                                            </li>
                                            <li><a href="category.html">Fabric Printing</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-2">
                                        <h5>Mug Printing</h5>
                                        <ul>
                                            <li><a href="category.html">Normal Mugs</a>
                                            </li>
                                            <li><a href="category.html">Radium Mugs</a>
                                            </li>
                                            <li><a href="category.html">Magic Mugs</a>
                                            </li>
                                            <li><a href="category.html">Glass Magic Mugs</a>
                                            </li>
                                            <li><a href="category.html">Heart Magic Mugs</a>
                                            </li>
                                            <li><a href="category.html">Pearl Mugs</a>
                                            </li>
                                            <li><a href="category.html">Steel Mugs</a>
                                            </li>
                                            <li><a href="category.html">Other Mugs</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-2">
                                        <h5>Laser Printing</h5>
                                        <ul>
                                            <li><a href="category.html">Prinouts</a>
                                            </li>
                                            <li><a href="category.html">Photocopy</a>
                                            </li>
                                            <li><a href="category.html">Certificates</a>
                                            </li>
                                            <li><a href="category.html">Booklets</a>
                                            </li>
                                            <li><a href="category.html">Leaflets</a>
                                            </li>
                                            <li><a href="category.html">Visiting Cards</a>
                                            </li>
                                            <li><a href="category.html">Stickers</a>
                                            </li>
                                            <li><a href="category.html">Labels</a>
                                            </li>
                                            <li><a href="category.html">Other Laser Printings</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-2">
                                        <h5>Creative Designing</h5>
                                        <ul>
                                            <li><a href="category.html">Leaflets</a>
                                            </li>
                                            <li><a href="category.html">Posters</a>
                                            </li>
                                            <li><a href="category.html">Banners</a>
                                            </li>
                                            <li><a href="category.html">Booklets</a>
                                            </li>
                                            <li><a href="category.html">Applications</a>
                                            </li>
                                            <li><a href="category.html">ID Cards</a>
                                            </li>
                                            <li><a href="category.html">Mugs</a>
                                            </li>
                                            <li><a href="category.html">Caladers</a>
                                            </li>
                                            <li><a href="category.html">Latterheads</a>
                                            </li>
                                            <li><a href="category.html">Other</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-2">
                                        <h5>Web Designing</h5>
                                        <ul>
                                            <li><a href="category.html">Planning</a>
                                            </li>
                                            <li><a href="category.html">Designing</a>
                                            </li>
                                            <li><a href="category.html">Domain Registration</a>
                                            </li>
                                            <li><a href="category.html">Host</a>
                                            </li>
                                            <li><a href="category.html">Update</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-2">
                                        <h5>Photo & Video Editing</h5>
                                        <ul>
                                            <li><a href="category.html">Photography</a>
                                            </li>
                                            <li><a href="category.html">Poto Editing</a>
                                            </li>
                                            <li><a href="category.html">Event Management</a>
                                            </li>
                                            <li><a href="category.html">Video Albums</a>
                                            </li>
                                            <li><a href="category.html">Others</a>
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">About
                        <b class="caret"></b></a>
                </li>

                <li class="dropdown yamm-fw">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Contacts
                        <b class="caret"></b></a>
                </li>
            </ul>

        </div>
        <!--/.nav-collapse -->

        <div class="navbar-buttons">

            <div class="navbar-collapse collapse right" id="basket-overview">
                <a href="basket.html" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span
                            class="hidden-sm">3 items in cart</span></a>
            </div>
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
