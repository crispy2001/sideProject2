@extends('layouts.master')

@section('title')
signup
@endsection
@section('content')

<section class="page-section">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">
                @if($isAdmin = '1')
                    Admin
                @else
                    User
                @endif
                Sign Up
            </h2>
        </div>
        @if(count($errors) > 0)
        <div class=alert alert-danger>
            @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif
        <form action="{{ route('user.signup',  $isAdmin)}}" method="post">
            <div class="form-group">
                <h4 class="my-3">
                    @if($isAdmin = '1')
                        Admin
                    @else
                        User
                    @endif
                    Name
                </h4>
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
            <div class="text-center"><button type="submit" class="btn btn-primary ok-btn">Sign up</button></div>
            {{ csrf_field()}}
        </form>

    </div>
</section>