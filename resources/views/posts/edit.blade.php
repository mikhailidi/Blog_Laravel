@extends('layouts.blog')

@section('title', 'View post')

@section('style')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('js')
    {!! Html::script('js/parsley.min.js') !!}
@endsection

@section('body')

    {{--{{dd($post)}}--}}
    <div class="col-lg-8">
        <div class="blog-post">

            {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'id' => 'update_post', 'data-parsley-validate' => '']) !!}
                {{Form::label('title', 'Title:')}}
                {{Form::text('title', null, ['placeholder' => 'Title', 'class' => 'form-control input-lg', 'required' => '', 'maxlength' => '255'])}}

                {{Form::label('slug', 'Slug:')}}
                {{Form::text('slug', null, ['placeholder' => '/posts/{YOUR_SLUG}', 'class' => 'form-control', 'required' => '',  'minlength' => '5','maxlength' => '255'])}}

                {{Form::label('body', 'Post body:', ['style' => 'margin-top: 30px;'])}}
                {{Form::textarea('body', null, ['placeholder' => 'Write your post here', 'required' => '', 'class' => 'form-control ', 'rows' => '12'])}}
            {!! Form::close() !!}




        </div><!-- /.blog-post -->
    </div>

@endsection

@section('sidebar')
    <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
        <div class="sidebar-module sidebar-module-inset">
            <p>
                Created at: {{ date('Y-m-d H:i:s',strtotime($post->created_at))  }}
            </p>
            <p>
                Last update: {{ date('Y-m-d H:i:s',strtotime($post->updated_at))  }}
            </p>
            {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block', 'onclick' => '$("#update_post").submit()']) }}
            {!! Html::linkRoute('posts.show', 'Cancel', [$post->id], ['class' => 'btn btn-danger btn-block']) !!}
        </div>
    </div>

    @include('layouts.blog.sidebar')
@endsection