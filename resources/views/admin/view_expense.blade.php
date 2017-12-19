@extends('layouts.master_fluid')

@section('title')
    View Expenditure
@endsection


@section('header')
    @include('partials.admin_header')
@endsection

@section('scripts1')
    <script type="text/javascript">
        var curdate = new Date().toDateInputValue();
        document.getElementById('datepicker').value = curdate;
        document.getElementById('datepicker').innerHTML = curdate;
    </script>
@endsection

@section('content')


    <div class="row">
        @include('partials.admin_sidebar')
        <div class="col-md-9">

            <table class="table table-striped table-hover">
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Remarks</th>
                    <th>Total</th>

                </tr>
                @foreach($array2 as $key)
                    <tr>
                        <td>{{$key['id']}}</td>
                        <td>{{$key['type']}}</td>
                        <td>{{$key['remarks']}}</td>
                        <td>{{$key['total']}}</td>
                    </tr>
                @endforeach

            </table>

        </div>
    </div>

    {{csrf_field()}}






@endsection
@section('scripts')
    <script scr="{{URL::to('js/jquery-ui/external/jquery/jquery.js')}}"></script>
    <script scr="{{URL::to('js/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{URL::to('js/my/currency.js')}}"></script>
@endsection

@section('header')
    @include('partials.footer')
@endsection

