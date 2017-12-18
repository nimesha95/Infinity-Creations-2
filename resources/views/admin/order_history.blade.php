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
            @if(sizeof($orderHist)>0)
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Email</th>
                        <th>Ordered Item</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>Paid Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orderHist as $row)
                        <tr>
                            <td>{{$row->order_id}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->order_obj}}</td>
                            <td>{{$row->total}}</td>
                            <td>{{$row->date}}</td>
                            <td>{{$row->paid_date}}</td>
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