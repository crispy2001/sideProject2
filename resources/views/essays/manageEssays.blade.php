@extends('layouts.master')

@section('title')
manage essays
@endsection
@section('content')

<section class="page-section">
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