@extends('layouts.master')

@section('title')
signin
@endsection
@section('content')

<section class="page-section">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Sign In</h2>
        </div>
        @if(count($errors) > 0)
        <div class=alert alert-danger>
            @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif
        <form action="{{ route('user.signin')}}" method="post">
            <div class="form-group">
                <h4 class="my-3">UserName</h4>
                <input type="text" id="userName" name="userName" class="form-control">
            </div>
            <div class="form-group">
                <h4 class="my-3">E-Mail</h4>
                <input type="text" id="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <h4 class="my-3">Password</h4>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <div class = "text-center"><button type="submit" class="btn btn-primary ok-btn">Sign in</button></div>
            {{ csrf_field()}}
        </form>


    </div>
</section>