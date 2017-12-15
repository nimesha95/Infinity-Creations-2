@extends('layouts.master')

@section('title')
    Custom Order
@endsection

@section('header')
    @include('partials.header')
@endsection

@section('content')
    <form method="post" action="#">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="sel1">Select Order Type:</label>
                    <select class="form-control" id="order_type">
                        <option value="0">-- Select A category --</option>
                        <option value="1">Printing</option>
                        <option value="2">Designing</option>
                        <option value="3">Event Planing</option>
                        <option value="4">Other</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6" id="printing_div">
                <div class="form-group">
                    <label for="printing">Select Your Printing Need:</label>
                    <select class="form-control" id="printing_method">
                        <option>-- Select A category --</option>
                        <option>Digital Printing</option>
                        <option>Mug Printing</option>
                        <option>Laser Printing</option>
                        <option>Other</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6" id="design_div">
                <div class="form-group">
                    <label for="designing">Select Your Designing Need:</label>
                    <select class="form-control" id="design_method">
                        <option>-- Select A category --</option>
                        <option>Posters</option>
                        <option>Banners</option>
                        <option>Calenders</option>
                        <option>Other</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="designing">Enter a brief description:</label>
                    <textarea class="form-control" rows="5" id="comment"></textarea>
                </div>
            </div>
        </div>
    </form>
    @include('partials.footer')
@endsection
@section('scripts')
    <script src="{{URL::to('js/my/custom_order.js')}}"></script>
@endsection

