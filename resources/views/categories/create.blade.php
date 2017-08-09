@extends('layouts.blog')

@section('title', 'Add Category')

@section('style')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('js')
    {!! Html::script('js/parsley.min.js') !!}
@endsection


@section('body')
    <div class="row">
        <div class="col-md-8 ">
            <h3>Create new category</h3>
            <hr>
            {!! Form::open(['route' => 'category.store', 'data-parsley-validate' => '']) !!}
                {{Form::label('name', 'Category:')}}
                {{Form::text('name', null, ['placeholder' => 'Category', 'class' => 'form-control', 'required' => '', 'maxlength' => '255'])}}

                {{Form::submit('Create Category', ['class' => 'btn btn-success btn-lg btn-block',  'style' => 'margin: 20px 0;'])}}

            {!! Form::close() !!}


        </div>
    </div>
@endsection


