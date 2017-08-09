<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.blog.partials._head')
</head>
<body>

    @include('layouts.blog.partials._menu')

    <div class="container">
        <div class="blog-header">
            <h1 class="blog-title">Some Laravel Blog</h1>
            <p class="lead blog-description">Simple blog description blablablab</p>
            <hr>
        </div>

        <div class="row">

            @include('layouts.blog.partials._messages')
            @yield('body')
            @yield('sidebar')

        </div><!-- /.row -->

    </div><!-- /.container -->

    @include('layouts.blog.partials._footer')


    @include('layouts.blog.partials._js')

</body>
</html>
