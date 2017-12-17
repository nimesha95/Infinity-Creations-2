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
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Employee ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Role</th>
                        <th>Monthly Salary</th>
                    </tr>
                    @foreach($array2 as $key)
                        {{--<tr>--}}
                            {{--<td>{{$data['emp_id'][0]}}</td>--}}
                            {{--<td>{{$data['first_name'][0]}}</td>--}}
                            {{--<td>{{$data['last_name'][0]}}</td>--}}
                            {{--<td>{{$data['role'][0]}}</td>--}}
                            {{--<td>{{$data['salary'][0]}}</td>--}}
                        {{--</tr>--}}
                        <tr>
                            <td>{{$key['emp_id']}}</td>
                            <td>{{$key['first_name']}}</td>
                            <td>{{$key['last_name']}}</td>
                            <td>{{$key['role']}}</td>
                            <td>{{$key['salary']}}</td>
                        </tr>
                    @endforeach
                </table>
            @else
                No Stuff
            @endif
        </div>
    </div>
@endsection
