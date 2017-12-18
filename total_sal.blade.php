@extends('layouts.master_fluid');

@section('title')
    Salary Generate
@endsection

@section('header')
    @include('partials.admin_header')
@endsection

@section('content')
    <div class="row">
        @include('partials.admin_sidebar')
        <div class="col-md-9">

            @if(sizeof($array2)>0)
                {{--<table class="table table-striped table-hover">--}}
                    {{--<tr>--}}
                        {{--<th>Employee ID</th>--}}
                        {{--<th>First Name</th>--}}
                        {{--<th>Last Name</th>--}}
                        {{--<th>Role</th>--}}
                        {{--<th>Num of Hours</th>--}}
                        {{--<th>Salary</th>--}}
                    {{--</tr>--}}
                    {{--@foreach($array2 as $key)--}}
                        {{--<tr>--}}
                        {{--<td>{{$data['emp_id'][0]}}</td>--}}
                        {{--<td>{{$data['first_name'][0]}}</td>--}}
                        {{--<td>{{$data['last_name'][0]}}</td>--}}
                        {{--<td>{{$data['role'][0]}}</td>--}}
                        {{--<td>{{$data['salary'][0]}}</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td>{{$key['emp_id']}}</td>--}}
                            {{--<td>{{$key['first_name']}}</td>--}}
                            {{--<td>{{$key['last_name']}}</td>--}}
                            {{--<td>{{$key['role']}}</td>--}}
                            {{--<td>{{$key['num_of_hours']}}</td>--}}
                            {{--<td>{{$key['salary']}}</td>--}}
                        {{--</tr>--}}
                    {{--@endforeach--}}
                {{--</table>--}}

                <div class="row">
                    <label class="control-label col-sm-2" for="emp_id">Employee ID:</label>
                    <div class="col-sm-2">
                        {{$array2[0]['emp_id']}}
                    </div>
                </div>
                <div class="row">
                    <label class="control-label col-sm-2" for="first_name">First Name:</label>
                    <div class="col-sm-2">
                        {{$array2[0]['first_name']}}
                    </div>
                </div>
                <div class="row">
                    <label class="control-label col-sm-2" for="last_name">Last Name:</label>
                    <div class="col-sm-2">
                        {{$array2[0]['last_name']}}
                    </div>
                </div>
                <div class="row">
                    <label class="control-label col-sm-2" for="role">Role:</label>
                    <div class="col-sm-2">
                        {{$array2[0]['role']}}
                    </div>
                </div>
                <div class="row">
                    <label class="control-label col-sm-2" for="num_of_hours">Number Of Hours:</label>
                    <div class="col-sm-2">
                        {{$array2[0]['num_of_hours']}}
                    </div>
                </div>
                <div class="row">
                    <label class="control-label col-sm-2" for="salary">Salary:</label>
                    <div class="col-sm-2">
                        {{$array2[0]['salary']}}
                    </div>
                </div>
            @else
                No Stuff
            @endif
        </div>
    </div>
@endsection
