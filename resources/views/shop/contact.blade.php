@extends('layouts.master')

@section('title')
    Contact US
@endsection


@section('header')
    @include('partials.header')
@endsection

@section('content')
    <div id="fh5co-wrapper">

        <div class="fh5co-hero fh5co-hero-2">
            <div class="fh5co-overlay"></div>
            <div class="fh5co-cover fh5co-cover_2 text-center" data-stellar-background-ratio="0.5"
                 style="background-image: url({{asset('img/Contact-us.jpg')}});">
                <div class="desc animate-box">
                    <h2><strong>Contact</strong> Us</h2>
                </div>
            </div>
        </div>
        <!-- end:header-top -->

        <div id="fh5co-contact" class="animate-box">
            <div class="container">
                <form action="#">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="section-title">Our Address</h3>
                            <p>Our office located in front of Peoples hospitel. You have to turn into Cristhuraga
                                Mawatha and you'll see the main entrance </p>
                            <ul class="contact-info">
                                <ul><span class="glyphicon glyphicon-road" aria-hidden="true"></span> No. 548/1/1
                                    Negambo Road, Mahabage, Ragama.
                                </ul>
                                <ul><span class="glyphicon glyphicon-phone" aria-hidden="true"></span> +94 11 449 4503
                                </ul>
                                <ul><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> <a href="#">info@infinitycreations.lk</a>
                                </ul>
                                <ul><span class="glyphicon glyphicon-cloud" aria-hidden="true"></span> <a href="#">www.infinitycreations.lk</a>
                                </ul>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="" class="form-control" id="" cols="30" rows="7"
                                                  placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" value="Send Message" class="btn btn-primary">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END fh5co-contact -->
        <div id="map" class="fh5co-map"></div>
        <!-- END map -->
    </div>
    @include('partials.footer')
@endsection