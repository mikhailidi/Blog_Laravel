@if (Session::has('success_form'))
    <div class="alert alert-success" role="alert">
        <stong>Success: </stong>{{ Session::get('success_form') }}
    </div>

@endif


@if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <stong>Errors: </stong><br>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif