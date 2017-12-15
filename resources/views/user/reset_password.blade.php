@extends('layouts.master')

@section('header')
    @include('partials.header')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>Reset Password</h1>
        @if(count($errors)>0)   <!-- to show error alerts -->
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
            @endif
            <form action="{{ route('user.signin') }}" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Send Reset Password Link</button>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection
