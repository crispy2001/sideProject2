@extends('layouts.master')

@section('title')
signup
@endsection
@section('content')

<section class="page-section">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Sign Up</h2>
            @if(count($errors) > 0)
            <div class=alert alert-danger>
                @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif
            <form action="{{ route('user.signup')}}" method="post">
                <div class="form-group">
                    <label for="email">E-MAIL</label>
                    <input type="text" id="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Sign up</button>
                {{ csrf_field()}}
            </form>
        </div>

    </div>
</section>