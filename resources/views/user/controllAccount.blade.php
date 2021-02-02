@extends('layouts.master')

@section('title')
controll accounts
@endsection
@section('content')


<section class="page-section bg-light" id="essay">
    <div class="container">
        <br>
        <div class="text-center">
            <h2 class="section-heading text-uppercase">accounts</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>



        @foreach($users->chunk(4) as $userChunk)
        @foreach($userChunk as $user)
        <div class=" bd-highlight mb-3 essay-item row">
            <div class="d-flex justify-content-start row col-11">
                <div class="col-3 essay-caption-heading bd-highlight my-list-title">{{$user->userName}}</div>
                <div class="col essay-caption-heading bd-highlight my-list-subtitle">
                    <div>{{$user->email}}</div>
                </div>
            </div>
            <div class="d-flex justify-content-end row col">
                
                <form action="{{route('admin.DRAccount',  ['id' => $user->id])}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-primary btn-edit-delete">delete</button>
                </form>
            </div>
        </div>

        @endforeach
        @endforeach
    </div>


</section>


@endsection