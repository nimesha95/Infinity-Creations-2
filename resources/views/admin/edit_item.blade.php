@extends('layouts.master_fluid')

@section('title')
    Edit Items
@endsection


@section('header')
    @include('partials.admin_header')
@endsection

@section('content')
    <div class="row">
        @include('partials.admin_sidebar')
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-4">
                    @if(session()->has('message'))
                        <div class="alert alert-success alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    @if(session()->has('Err_message'))
                        <div class="alert alert-danger alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ session()->get('Err_message') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    @foreach($productQry as $productQry1)
                        <form class="form-horizontal" action="{{route('admin.editItems')}}" method="post"
                              enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="proid">Product ID:</label>
                                <div class="col-sm-2">
                                    <input type="text" id="productid" name="productid"
                                           value="{{$productQry1->pro_id}}"
                                           class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="Model">Name:</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="name" placeholder="Enter Name"
                                           name="name" value="{{$productQry1->name}}" required="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="Price">Price:</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" pattern="\d+.{1,}" id="price" title=""
                                           placeholder="Enter Price"
                                           name="price" value="{{$productQry1->price}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="Price">Discount:</label>
                                <div class="col-sm-1">
                                    <input type="checkbox"
                                           id="discountBox" {{$productQry1->discount == "0.00" ? '' : 'checked'}}>Yes
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="discount" title=""
                                           placeholder="Enter Discount Amount"
                                           name="discount" value="{{$productQry1->discount}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="Availability">Availability:</label>
                                <div class="col-sm-2">
                                    <select class="form-control" id="availability" name="availability">
                                        <option value="Available" selected>Available</option>
                                        <option value="Not Available">Not Available</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="Quantity">Remaining Quantity:</label>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" id="quantity" title=""
                                           placeholder="Remaining Quantity"
                                           name="quantity" required="true" value="{{$productQry1->quantity}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="Sold">Sold Quantity:</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" pattern="\d+.{1,}" id="sold quantity" title=""
                                           placeholder="Sold Quantity" required="true" value="{{$productQry1->sold}}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="Description">Description:</label>
                                <div class="col-sm-10">
                                <textarea class="form-control" rows="5" id="description" title="description"
                                          placeholder="Enter a brief description"
                                          name="description" required="true">
                                    {{$productQry1->item_description}}
                                </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default" name="add">Edit Item</button>
                                    <button type="reset" class="btn btn-default" name="clear">Clear</button>
                                </div>
                            </div>
                            {{ csrf_field() }}
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(function () {
            var checkbox = $("#discountBox");
            var hidden = $("#discount");

            if (checkbox.is(':checked')) {
                hidden.show();
            } else {
                hidden.val(0);
                hidden.hide();
            }

            checkbox.change(function () {
                if (checkbox.is(':checked')) {
                    hidden.show();
                } else {
                    hidden.val(0);
                    hidden.hide();
                }
            });
        });
    </script>
@endsection