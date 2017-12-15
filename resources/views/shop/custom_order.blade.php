@extends('layouts.master')

@section('title')
    Custom Order
@endsection

@section('header')
    @include('partials.header')
@endsection

@section('content')
    <form method="post" id="customForm" action="{{route('product.custom_order')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="sel1">Select Order Type:</label>
                    <select class="form-control" name="order_type" id="order_type">
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
                    <select class="form-control" name="printing_method" id="printing_method">
                        <option value="0">-- Select A category --</option>
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
                    <select class="form-control" name="design_method" id="design_method">
                        <option value="0">-- Select A category --</option>
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
                    <textarea class="form-control" rows="5" name="comment" id="comment" required></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label class="control-label col-sm-2" for="image">Designs</label>
                <div class="col-sm-6">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <span class="btn btn-default btn-file">
                                        <span>Choose file</span>
                                        <input name="img" type="file" multiple/>
                                    </span>
                        <span class="fileinput-filename"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </div>
    </form>
    @include('partials.footer')
@endsection
@section('scripts')
    <script src="{{URL::to('js/my/custom_order.js')}}"></script>
@endsection

