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

    </div>
</section>
<section class="page-section bg-light" id="essay">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">my essay</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>


        @foreach($essays->chunk(2) as $essayChunk)
        <div class="">
            @foreach($essayChunk as $essay)
            <div class=" bd-highlight mb-3 my-list-item">
                <div class="d-flex">
                    <div class="my-list-caption-heading bd-highlight me-auto my-list-title">{{$essay->title}}</div>
                    <form><a type="button" class="btn btn-primary btn-edit-delete" href="{{route('essay.edit', ['id' => $essay->id])}}">edit</a></form>
                    
                    <form action="{{route('essay.delete',  ['id' => $essay->id])}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-primary btn-edit-delete">delete</button>
                    </form>
                    <a data-toggle="modal" href="#{{$essay->title}}" class="bd-highlight"><i class="fas fa-chevron-down align-items-end dot-dot-dot collapsed " data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$essay->id}}" aria-expanded="false" aria-controls="flush-collapse{{$essay->id}}"></i></a>
                </div>
                <div id="flush-collapse{{$essay->id}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$essay->id}}" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">{{$essay->content}}</div>
                </div>
            </div>

            @endforeach
        </div>
        @endforeach


    </div>
</section>


@endsection