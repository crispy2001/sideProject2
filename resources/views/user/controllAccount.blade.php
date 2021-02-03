@extends('layouts.master')

@section('title')
controll accounts
@endsection
@section('content')


<section class="page-section bg-white" id="my-list">
    <div class="container">
        <br>
        <div class="text-center">
            <h2 class="section-heading text-uppercase">accounts</h2>
            <h3 class="section-subheading text-muted">in this page, u can delete or restore users accounts</h3>
        </div>
        <hr>
        <!-- <div class=" bd-highlight my-list-bar ">
            <div class="d-flex">
                <div class=" me-auto row">
                    <div class="bd-highlight col my-list-bar-item">test</div>
                </div>
                <div class="row">
                    <div class="bd-highlight col">
                    </div>
                </div>
            </div>
        </div> -->

        <div class="bg-white my-scroll" id = "my-list-fliter " data-spy="scroll" data-target="#navbar-example" data-offset="0" >
            @foreach($users as $user)
            <div class=" bd-highlight my-list-item">
                <div class="d-flex " >
                    <div class=" me-auto row">
                        <div class="my-list-caption-heading bd-highlight my-list-title">
                            <div class="my-list-title-dot">{{$user->userName}}</div>
                        </div>
                        <div class="my-list-caption-heading bd-highlight my-list-subtitle">{{$user->email}}</div>
                    </div>
                    <div class="row">
                        <form action="{{route('admin.DRAccount',  ['id' => $user->id])}}" method="POST" class=" col">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            @if($user->deleted_at == null)
                            <button class="btn btn-primary btn-edit-delete">delete</button>
                            @else
                            <button class="btn btn-primary btn-edit-delete">restore</button>
                            @endif
                        </form>
                        <a data-toggle="modal" href="#{{$user->id}}" class="bd-highlight col"><i class="fas fa-chevron-down align-items-end dot-dot-dot collapsed btn-edit-delete" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$user->id}}" aria-expanded="false" aria-controls="flush-collapse{{$user->id}}"></i></a>
                    </div>
                </div>
                <div id="flush-collapse{{$user->id}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$user->id}}" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div>user name: {{$user->userName}}</div>
                        <div>user email: {{$user->email}}</div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>


</section>



@endsection