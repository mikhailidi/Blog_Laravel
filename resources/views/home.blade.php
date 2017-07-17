@extends('layouts.blog')

@section('title', ' User dashboard')

@section('body')

    {{--{{dd($user)}}--}}
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    You are logged in as {{$user->name}}, your email is: {{$user->email}}!


                    {!! Form::open(['route' => 'logout']) !!}
                        {!! Form::submit('Log Out', ['class' => 'btn btn-danger', 'style' => 'margin: 15px 0 0 0 ;']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
