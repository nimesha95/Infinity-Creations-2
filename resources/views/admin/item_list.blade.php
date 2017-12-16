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
            @if(sizeof($itemList)>0)
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Availability</th>
                        <th>Remaining Quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($itemList as $row)
                        <tr>
                            <td>{{$row->pro_id}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->type}}</td>
                            <td>{{$row->availability}}</td>
                            <td>{{$row->quantity}}</td>
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