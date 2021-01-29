@extends('layouts.master')

@section('title')
laveral sideProject
@endsection
@section('content')
<!-- Masthead-->
<header class="masthead">
    <div class="container">
        <div class="masthead-heading text-uppercase">Welcome </div>
        @if(Auth::check())<div class="masthead-heading text-uppercase">{{Auth::user()->userName}}</div>@endif
        <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Tell Me More</a>
    </div>
</header>
<!-- Services-->
<section class="page-section bg-light" id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Services</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                    <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="my-3">E-Commerce</h4>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                    <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="my-3">Responsive Design</h4>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                    <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="my-3">Web Security</h4>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
            </div>
        </div>
    </div>
</section>

<!-- when the user logged in, they can use it to write date-->
<section class="page-section " id="Write">
    <div class="container">
        @if(Auth::check())
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Write Something</h2>
        </div>
        <form action="{{ route('essay.addEssay')}}" method="post">
            <div class="form-group">
                <h4 class="my-3">Title</h4>
                <input type="text" id="title" name="title" class="form-control">
            </div>
            <div class="form-group">
                <h4 class="my-3">Content</h4>
                <!-- <input type="text" id="content" name="content" class="form-content"> -->
                <textarea type="text" name="content" class="form-content "></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary ok-btn">OK</button>
            </div>
            {{ csrf_field()}}
        </form>
        @else
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Signin to write :D</h2>
        </div>
        @endif



    </div>
</section>




<!-- essay Grid-->


<section class="page-section bg-light" id="essay">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">essay</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>


        @foreach($essays->chunk(2) as $essayChunk)
        <div class="">
            @foreach($essayChunk as $essay)
            <div class="d-flex bd-highlight mb-3 essay-item">
                <div class="essay-caption-heading bd-highlight me-auto ">{{$essay->title}}</div>
                <!-- <div class="essay-caption col">
                        <div class="essay-caption-heading ">Threads</div>
                    </div> -->
                <a data-toggle="modal" href="#{{$essay->title}}" class="bd-highlight"><i class="fas fa-ellipsis-h align-items-end dot-dot-dot"></i></a>
            </div>
            @endforeach
        </div>
        @endforeach


    </div>
</section>


<!-- essay Modals-->
<!-- Modal 1-->
@foreach($essays->chunk(2) as $essayChunk)
@foreach($essayChunk as $essay)
<div class="portfolio-modal modal fade" id="{{$essay->title}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal"><img src="src/assets/img/close-icon.svg" alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project Details Go Here-->
                            <h2 class="text-uppercase">{{$essay->title}}</h2>
                            <p>{{$essay->content}}</p>

                            @if(Auth::check() )
                            @if(Auth::user()->email = $essay->editor)
                            <a class="btn btn-danger" type="button" href=" {{route('essay.delete',  ['id' => $essay->id])}} ">
                                <i class="fas fa-times mr-1"></i>
                                Delete
                            </a>
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endforeach


@endsection