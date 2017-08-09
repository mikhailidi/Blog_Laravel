


<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item {{ Request::is('/') ? "active" : "" }}" href="/">Home</a>
            <a class="blog-nav-item {{ Request::is('posts') ? "active" : "" }}" href="/posts">Posts</a>
            <a class="blog-nav-item {{ Request::is('about') ? "active" : "" }}" href="/about">About</a>
            <a class="blog-nav-item {{ Request::is('contact') ? "active" : "" }}" href="/contact">Contact</a>
            <ul class="nav navbar-right">
                <li class="dropdown">
                    {{--{{dd($auth)}}--}}
                    <a href="#" class=" blog-nav-item" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="user"></span> {{ Auth::check() ? $auth->name : 'Profile' }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        @if (Auth::check())
                            <li><a href="{{ url('home') }}">Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('posts.create') }}">Create New Post</a></li>
                            <li><a href="{{ route('category.create') }}">Create New Category</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('logout') }}">Log Out</a></li>
                        @else
                            <li><a href="{{ url('login') }}">Log In</a></li>
                            <li><a href="{{ url('register') }}">Registration</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>