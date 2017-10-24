@extends('layouts.master_fluid')

@section('title')
    Add Items
@endsection
<style>/* The switch - the box around the slider */
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    /* Hide default HTML checkbox */
    .switch input {
        display: none;
    }

    /* The slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>
@section('styles')

@endsection

@section('header')
    @include('partials.admin_header')
@endsection

@section('content')
    <script type="text/javascript">
        function handleChange(checkbox) {
            if (checkbox.checked == true) {
                document.getElementById("availableText").style.color = 'blue';
                //document.getElementById("availableText").style.color = 'blue';
            } else {
                document.getElementById("availableText").style.color = 'red';
            }
        }

        var checkbox = document.getElementById("checkbox");
        // var availableText = document.getElementById("availableText");
        //availableText.val("haha");
        checkbox.checked = true;
        checkbox.setAttribute("checked", "true");
    </script>
    @include('partials.admin_sidebar')
    <div class="col-md-9">
        @if(sizeof($items)>0)
            @foreach(array_chunk($items,3) as $itemschunk)
                <div class="row">
                    @foreach($itemschunk as $item)
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="{{$item->img1}}">
                                <div class="caption">
                                    <a href="{{route('product.show' , ['id'=> $item->pro_id])}}">
                                        <h3>{{$item->name}}</h3>
                                    </a>
                                    <p>{{$item->item_description}}</p>
                                    <div class="clearfix">
                                        <div class="pull-left price">
                                            <h4>{{$item->price}} LKR</h4>
                                        </div>
                                        <div class="pull-right availability">
                                            <h4 id="availableText">{{$item->availability}}</h4>
                                        </div>
                                    </div>
                                    <!-- Rounded switch -->
                                    <label class="switch">
                                        <input id="checkbox" type="checkbox"
                                               onchange='handleChange(this);' {{$item->availability=="Available" ? 'checked' : ''}}>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @else
            <div class="row">
                <h4>Sorry! No items found</h4>
            </div>
        @endif
    </div>

@endsection
@section('scripts')

@endsection