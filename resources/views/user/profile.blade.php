@extends('layouts.master')

@section('title')
signin
@endsection
@section('content')




<section class="page-section">

    <div class="container">
        <div class="my-profile-container">
            <div class="row ">
                <div class="col-4 d-flex justify-content-center my-profile-icon"><i class="fas fa-user profile-user"></i></div>
                <div class="col ">
                    <div class="row my-profile">
                        <h1 class="col-4 my-profile-item">Name</h1>
                        <h3 class="col-4 my-profile-item">{{$user->userName}}</h3>
                    </div>
                    <div class="row my-profile">
                        <h1 class="col-4 my-profile-item">email</h1>
                        <h3 class="col-4 my-profile-item">{{$user->email}}</h3>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
@endsection