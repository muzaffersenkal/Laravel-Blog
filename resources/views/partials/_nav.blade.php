<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Laravel Blog</a>
        </div>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{  Request::is('/') ? "active" : ""  }}"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item {{  Request::is('blog') ? "active" : ""  }}"><a class="nav-link" href="/blog">Blog</a></li>
                <li class="nav-item {{ Request::is('about') ? "active" : ""  }}"><a class="nav-link" href="/about">About</a></li>
                <li class="nav-item {{ Request::is('contact') ? "active" : ""  }}"><a class="nav-link"  href="/contact">Contact</a></li>
            </ul>
            <ul class="navbar-nav navbar-right mr-auto">
                @if(Auth::check())
                <li class="dropdown">
                    <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hi , {{ Auth::user()->name }}</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('posts.index') }}">Posts</a></li>
                        <li><a href="{{ route('categories.index') }}">Categories</a></li>
                        <li><a href="{{ route('tags.index') }}">Tags</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li>    <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form></li>
                    </ul>
                </li>

                    @else

                <a href=" {{ route('login') }}" class="btn btn-default">Login </a>
                <a href=" {{ route('register') }}" class="btn btn-default">Register </a>

                    @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->

</nav>
