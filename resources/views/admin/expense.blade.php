@extends('layouts.master_fluid')

@section('title')
    Expenditure
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

    <container></br></br>
        <div class="col-md-5"></div>
    </container>
    <container>
        <div class="row">
            <div class="col-md-2">
                <h1>Expenditure</h1><br><br>
                <form action="{{route('admin.add_expense1')}}" method="post">
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input class="form-control" type="date" value="<?php echo date('Y-m-d'); ?>" name="date_pick"
                               id="datepicker" required="">
                    </div>

                    <div class="form-group">
                        <label for="type">Type</label>
                        <select class="form-control" name="typeSelected" id="typeSelected" required="">
                            <option>Water Bill</option>
                            <option>Current Bill</option>
                            <option>raw materials</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <textarea class="form-control" name="description" id="description" placeholder="description"
                                  rows="5" required=""></textarea>
                    </div>

                    <div class="form-group">
                        <label for="total">Total expense</label>
                        <div class="input-group" required="">
                            <span class="input-group-addon">LKR</span>
                            <input type="number" value="1000" min="0" step="0.01" data-number-to-fixed="2"
                                   data-number-stepfactor="100" class="form-control currency" name="currency"
                                   id="currency"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="pull-right">
                            <button class="btn btn-primary" type="submit">Add To Expense</button>
                        </div>
                    </div>
                    {{csrf_field()}}
                </form>
            </div>
        </div>
    </container>
    <container>
        <div class="col-md-5"></div>
    </container>

@endsection
@section('scripts')
    <script type="text/javascript">
        jQuery("#currency").blur(function () {
            var curency = $('#currency').val();
            if (curency < 0) {
                $('#currency').val(1000);
            }
            //alert(bla);
        });
    </script>
    <script scr="{{URL::to('js/jquery-ui/external/jquery/jquery.js')}}"></script>
    <script scr="{{URL::to('js/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{URL::to('js/my/currency.js')}}"></script>
@endsection

@section('header')
    @include('partials.footer')
@endsection

