@extends('layouts.blog')

@section('title', 'Add Post')

@section('style')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('js')
    {!! Html::script('js/parsley.min.js') !!}
@endsection


@section('body')
    <div class="row">
        <div class="col-md-8 ">
            <h3>Create new post</h3>
            <hr>
            {!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '']) !!}
                {{Form::label('title', 'Title:')}}
                {{Form::text('title', null, ['placeholder' => 'Title', 'class' => 'form-control', 'required' => '', 'maxlength' => '255'])}}

                {{Form::label('slug', 'Slug:')}}
                {{Form::text('slug', null, ['placeholder' => '/posts/{YOUR_SLUG}', 'class' => 'form-control', 'required' => '',  'minlength' => '5','maxlength' => '255'])}}

                {{Form::label('body', 'Post body:')}}
                {{Form::textarea('body', null, ['placeholder' => 'Write your post here', 'required' => '', 'class' => 'form-control', 'rows' => '12'])}}

                {{Form::submit('Create Post', ['class' => 'btn btn-success btn-lg btn-block',  'style' => 'margin: 20px 0;'])}}

            {!! Form::close() !!}


        </div>
    </div>
@endsection


