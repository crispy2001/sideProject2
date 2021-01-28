<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-shrink" id="mainNav">
    <div class="container">
        <a class="navbar-brand nav-item" href="#">
            <div class = "row">
                <div class = "col"><i class="fas fa-star navbar-icon"></i>sideproject</div>
            </div>
        </a>
        
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ml-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            
            <ul class="navbar-nav text-uppercase ml-auto">
                <!-- <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Services</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a></li> -->
                <li class="nav-item"><a class="nav-link " href="{{ route('main.index') }}">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-friends"></i>
                        User mamagement
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if(Auth::check())
                        <li><a class="dropdown-item" href="{{ route('user.profile') }}">profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a></li>
                        @else
                        <li> <a class="dropdown-item" href="{{ route('user.signup') }}">Signup</a></li>
                        <li> <a class="dropdown-item" href="{{ route('user.signin') }}">Signin</a></li>
                        @endif

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>