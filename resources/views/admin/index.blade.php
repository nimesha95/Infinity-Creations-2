@extends('layouts.master_fluid')

@section('title')
    Administrator
@endsection


@section('header')
    @include('partials.admin_header')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4"></div>
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
        <div class="col-md-4"></div>
    </div>
    <div class="row">
        @include('partials.admin_sidebar')
        <div class="col-md-9">
            <h2>Some stuff goes here</h2>
        </div>
    </div>
@endsection
