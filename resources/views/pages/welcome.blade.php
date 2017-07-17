@extends('layouts.blog')

@section('body')

    <div class="col-sm-12 blog-main">
        <h1 class="text-center">Most populars posts</h1>
        @forelse($posts as $post)
            <div class="blog-post-title">
                <a href="{{route('blog.single', $post->slug)}}" class="lead">{{$post->title}}</a>
            </div>
            <p class="blog-post-meta">{{\Carbon\Carbon::createFromTimestamp(strtotime($post->created_at))->diffForHumans()}}, by <a href="#">Pavlo Mikhailidi</a></p>

            <p>
                {{substr($post->body, 0, 180)}}@if (strlen($post->body) > 180)... @endif
            </p>
            @if (strlen($post->body) > 180)
                <a class="btn btn-primary" href="{{ url('blog/'.$post->slug) }}"> More > </a>
            @endif

            <hr>

        @empty
            <h3>No Posts Yet :(</h3>
        @endforelse

        {{--{{$posts->links()}}--}}

        {{--<nav>--}}
            {{--<ul class="pager">--}}
                {{--<li><a href="#">Previous</a></li>--}}
                {{--<li><a href="#">Next</a></li>--}}
            {{--</ul>--}}
        {{--</nav>--}}
    </div>

@endsection

{{--@section('sidebar')--}}
    {{--@include('layouts.blog.sidebar')--}}
{{--@endsection--}}


@section('js')
    <script>
        console.log('main page with extra js');
    </script>

@endsection