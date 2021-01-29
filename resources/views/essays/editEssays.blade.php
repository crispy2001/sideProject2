@extends('layouts.master')

@section('title')
manage essays
@endsection
@section('content')


<section class="page-section " id="Write">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Edit</h2>
        </div>
        <form action="{{ route('essay.edit', ['id' => $essay->id])}}" method="POST">
            <div class="form-group">
                <h4 class="my-3">Title</h4>
                <input type="text" id="title" name="title" class="form-control" value="{{$essay->title}}">
            </div>
            <div class="form-group">
                <h4 class="my-3">Content</h4>
                <!-- <input type="text" id="content" name="content" class="form-content"> -->
                <textarea type="text" name="content" class="form-content ">{{$essay->content}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-edit-delete">Submit</button>

            {{ csrf_field() }}
            {{ method_field('PATCH') }}
        </form>

        <form action="{{route('essay.delete',  ['id' => $essay->id])}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="btn btn-primary btn-edit-delete">delete</button>
        </form>


    </div>
</section>

@endsection