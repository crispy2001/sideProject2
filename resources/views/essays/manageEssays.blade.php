@extends('layouts.master')

@section('title')
manage essays
@endsection
@section('content')

<section class="page-section " id="Write">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Write Something</h2>
        </div>
        @if(count($errors) > 0)
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <div type="button" class="btn-close d-flex justify-content-end" data-bs-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></div>
            @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif
        <form action="{{ route('essay.addEssay')}}" method="post">
            <div class="form-group">
                <h4 class="my-3">Title</h4>
                <input type="text" id="title" name="title" class="form-control" placeholder="title field cannot be empty">
            </div>
            <div class="form-group">
                <h4 class="my-3">Content</h4>
                <!-- <input type="text" id="content" name="content" class="form-content"> -->
                <textarea type="text" name="content" class="form-content " placeholder="content field cannot be empty."></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary ok-btn">OK</button>
            </div>
            {{ csrf_field()}}
        </form>

    </div>
</section>
<section class="page-section bg-light" id="essay">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">manage essays</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>

        <div class="d-flex ">
            <div class=" me-auto"></div>
            <div class="mine-all-btn">mine/ all</div>
            <label class="switch">
                <input type="checkbox" class="my-essays-btn">
                <span class="slider round"></span>
            </label>
        </div>

        <hr>

        <div id="my-essays" class=" bg-light my-scroll" id="my-list-fliter " data-spy="scroll" data-target="#navbar-example" data-offset="0">

            @foreach($myEssays as $myEssay)
            <div class=" bd-highlight my-list-item">
                <div class="d-flex ">
                    <div class=" me-auto row">
                        <div class="my-list-caption-heading bd-highlight my-list-title">
                            <div class="my-list-title-dot">{{$myEssay->title}}</div>
                        </div>
                        <div class="my-list-caption-heading bd-highlight my-list-subtitle">{{$myEssay->created_at}}</div>
                    </div>
                    <div class="row">
                        <form><a type="button" class="btn btn-primary btn-edit-delete" href="{{route('essay.edit', ['id' => $myEssay->id])}}">edit</a></form>

                        <form action="{{route('essay.delete',  ['id' => $myEssay->id])}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-primary btn-edit-delete">delete</button>
                        </form>
                        <a data-toggle="modal" href="#{{$myEssay->title}}" class="bd-highlight"><i class="fas fa-chevron-down align-items-end dot-dot-dot collapsed " data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$myEssay->id}}" aria-expanded="false" aria-controls="flush-collapse{{$myEssay->id}}"></i></a>
                    </div>
                </div>
                <div id="flush-collapse{{$myEssay->id}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$myEssay->id}}" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">{{$myEssay->content}}</div>
                </div>
            </div>

            @endforeach
        </div>

        <div id="others-essays" class=" bg-light my-scroll" id="my-list-fliter " data-spy="scroll" data-target="#navbar-example" data-offset="0">
            @if(Auth::user()->isAdmin == '1')
            @foreach($essays as $essay)
            <div class=" bd-highlight my-list-item">
                <div class="d-flex ">
                    <div class=" me-auto row">
                        <div class="my-list-caption-heading bd-highlight my-list-title">
                            <div class="my-list-title-dot">{{$essay->title}}</div>
                        </div>
                        <div class="my-list-caption-heading bd-highlight my-list-subtitle">{{$essay->created_at}}</div>
                    </div>
                    <div class="row">
                        <form><a type="button" class="btn btn-primary btn-edit-delete" href="{{route('essay.edit', ['id' => $essay->id])}}">edit</a></form>

                        <form action="{{route('essay.delete',  ['id' => $essay->id])}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-primary btn-edit-delete">delete</button>
                        </form>
                        <a data-toggle="modal" href="#{{$essay->title}}" class="bd-highlight"><i class="fas fa-chevron-down align-items-end dot-dot-dot collapsed " data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$essay->id}}" aria-expanded="false" aria-controls="flush-collapse{{$essay->id}}"></i></a>
                    </div>
                </div>
                <div id="flush-collapse{{$essay->id}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$essay->id}}" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">{{$essay->content}}</div>
                </div>
            </div>

            @endforeach
            @else
            <div class="text-center">
                <br>
                <h2 class="section-heading text-uppercase">u don't have the permission to edit others essays</h2>
            </div>
            @endif
        </div>


    </div>

    </div>
</section>


@endsection