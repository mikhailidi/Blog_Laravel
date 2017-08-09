@extends('layouts.blog')

@section('title', 'Posts')





@section('body')

    {{--{{dd($posts)}}--}}
    <div class="col-lg-8 blog-main">
        <h1 class="text-center">All posts ({{$posts->total()}})</h1>
        @forelse($posts as $post)
            <div class="blog-post-title">
                <a href="{{route('blog.single', $post->slug)}}" class="lead">{{$post->title}}</a>
            </div>
            <p class="blog-post-meta">{{\Carbon\Carbon::createFromTimestamp(strtotime($post->created_at))->diffForHumans()}}, by <a href="#">Pavlo Mikhailidi</a></p>

            <p>
                {{substr($post->body, 0, 180)}}@if (strlen($post->body) > 180)... @endif
            </p>
            @if (strlen($post->body) > 180)
                 <a class="btn btn-primary" href="{{route('blog.single', $post->slug)}}"> More > </a>
            @endif

            <hr>

            @empty
                <h3>No Posts Yet :(</h3>
        @endforelse

        {{$posts->links()}}

    </div>

@endsection

@section('sidebar')
    <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
        <div class="sidebar-module sidebar-module-inset">
            <a href="{{route('posts.create')}}" class="btn btn-success btn-block">Create new Post</a>
        </div>
    </div>
    @include('layouts.blog.sidebar')
@endsection