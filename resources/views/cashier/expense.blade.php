@extends('layouts.master_fluid')

@section('title')
    Expenditure
@endsection


@section('header')
    @include('partials.admin_header')
@endsection

@section('content')
    <div class="row">
        <form>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="hidden" id="selectedDate" name="selectedDate" >
            </div>

            <div class="form-group">
                <label for="type">Type</label>
                <select class="form-control" id="typeSelected">
                    <option>Water Bill</option>
                    <option>Current Bill</option>
                    <option>raw materials</option>
                </select>
            </div>
            <div class="form-group">
                <label for="remarks">Remarks</label>
                <textarea class="form-control" id="description" placeholder="description" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="total">Total expense</label>
                <input type="number" value="1000" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="currency" id="c1" />
            </div>


        </form>{{ csrf_field() }}
                    </form>
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