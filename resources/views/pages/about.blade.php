@extends('layouts.blog')

@section('body')
    <div class="col-sm-8 blog-main">
        <h1 class="text-center">About {{$name}}</h1>
        <h3 class="text-center">{{$email}}</h3>
    </div>
@endsection

@section('sidebar')
    @include('layouts.blog.sidebar')
@endsection