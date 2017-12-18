@extends('layouts.master_fluid')

@section('title')
    Administrator
@endsection


@section('header')
    @include('partials.admin_header')
@endsection

@section('content')
    <div class="row">
        @include('partials.admin_sidebar')
        <div class="col-md-9">
            @if(sizeof($pendOrd)>0)
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Email</th>
                        <th>Ordered Item</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>Phone No</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pendOrd as $row)
                        <tr>
                            <td>{{$row->order_id}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->order_obj}}</td>
                            <td>{{$row->total}}</td>
                            <td>{{$row->date}}</td>
                            <td>{{$row->phone_no}}</td>
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table>


            @else
                No Data Found...
            @endif
        </div>
    </div>
@endsection()


<!-- Edit Item Modal xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<div class="modal fade" id="PendingModel" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Item</h4>
            </div>
        @if(\Illuminate\Support\Facades\Session::get('AdminEditItem'))
            @if(count($errors)>0)   <!-- to show error alerts -->
                <script>
                    $(document).ready(function () {
                        $('#EditItemModal').modal({show: true});
                    })
                </script>
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
                @endif
            @endif
            <div class="modal-body">
                <form class="form-horizontal" method="get" action="{{route('admin.geteditItem')}}">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="proid">Product ID:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pro_id" placeholder="Enter Product ID"
                                   name="pro_id">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
