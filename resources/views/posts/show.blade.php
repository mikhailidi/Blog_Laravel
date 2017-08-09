@extends('layouts.blog')

@section('title', 'View post')



@section('body')

    {{--{{dd($post)}}--}}
    <div class="col-lg-8">
        {{ Html::linkRoute('posts.show', '<< See All Posts', [''], ['class' => 'btn btn-primary'])  }}
        <p></p>
        <div class="blog-post">
            <h2 class="blog-post-title">{{$post->title}}</h2>
            <p class="blog-post-meta">
                {{\Carbon\Carbon::createFromTimestamp(strtotime($post->created_at))->diffForHumans()}},
                by <a href="#">Pavlo Mikhailidi</a>,
                Category: {{ $post->category->name }}
            </p>
            <p class="lead">
                {{$post->body}}
            </p>
        </div><!-- /.blog-post -->
    </div>

@endsection

@section('sidebar')
    <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
        <div class="sidebar-module sidebar-module-inset">
            <p>
                URL: <a href="{{route('blog.single', $post->slug)}}">{{route('blog.single', $post->slug)}}</a>
            </p>
            <p>
                Created at: {{ date('Y-m-d H:i:s',strtotime($post->created_at))  }}
            </p>
            <p>
                Last update: {{ date('Y-m-d H:i:s',strtotime($post->updated_at))  }}
            </p>

            {!! Html::linkRoute('posts.edit', 'Edit', [$post->id], ['class' => 'btn btn-primary btn-block']) !!}
            {{--<a href="#" class="btn btn-primary">Edit</a>--}}
            <br>
            {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
            {!! Form::close() !!}
            {{--<a href="#" class="btn btn-danger">Delete</a>--}}
        </div>
    </div>
    @include('layouts.blog.sidebar')
@endsection