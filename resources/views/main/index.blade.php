@extends('layouts.master')

@section('title')
laveral sideProject
@endsection
@section('content')
<!-- Masthead-->
<header class="masthead">
    <div class="container">
        <div class="masthead-subheading">Welcome To Our Studio!</div>
        <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Tell Me More</a>
    </div>
</header>
<!-- Services-->
<section class="page-section" id="services">
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
<section class="page-section" id="Write">
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
            <button type="submit" class="btn btn-primary">OK</button>
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
        <!-- 
        <div class="row">
            @foreach($essays->chunk(1) as $essayChunk)
            <div class="col-lg-4 col-sm-6 mb-4">
                @foreach($essayChunk as $essay)
                <div class="essay-item">
                    <a class="essay-link" data-toggle="modal" href="#essayModal">
                        <div class="essay-hover">
                            <div class="essay-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="{{$essay->imgPath}}" alt="" />
                    </a>
                    <div class="essay-caption">
                        <div class="essay-caption-heading">{{$essay->title}}</div>
                        <div class="essay-caption-subheading text-muted">Illustration</div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
         -->
        <div class="essay-block">
            @foreach($essays->chunk(1) as $essayChunk)
            <div class="row essay-row">
                <div class="essay-item">
                    @foreach($essayChunk as $essay)
                    <a type = "button" class="col essay-link " data-toggle="modal" href="">{{$essay->title}}</a>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>


<!-- essay Modals-->
<!-- Modal 1-->
<div class="essay-modal modal fade" id="essayModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal"><img src="src/assets/img/close-icon.svg" alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="modal-body">
                            <!-- Project Details Go Here-->
                            <h2 class="text-uppercase">Project Name</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-fluid d-block mx-auto" src="{{$essay->imgPath}}" alt="" />
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                            <ul class="list-inline">
                                <li>Date: January 2020</li>
                                <li>Client: Threads</li>
                                <li>Category: Illustration</li>
                            </ul>
                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                <i class="fas fa-times mr-1"></i>
                                Close Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection