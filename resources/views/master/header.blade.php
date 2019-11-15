<div class="menu">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 logo-search">
                <div class="row">
                    <div class="col-md-5 logo">
                        <a href="{{route('home')}}">LOGO</a>
                    </div>
                    <div class="col-md-7 form-search">
                        <form action="#">
                            <label><input type="text"></label>
                            <i class="fa fa-search"></i>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-7 nav-class">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Term</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>

                        </ul>
                    </div>
                    <div class="col-md-5 login-register">
                        @if(Auth::check())
                                <div class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{Auth::user()->name}}</a>
                                    <ul id="list-menu-user" class="dropdown-menu">
                                        <li><a href="{{route('profile_user',\Illuminate\Support\Facades\Auth::id())}}"><i class="far fa-user"></i> User Profile</a></li>
                                        <li><a href="{{route('logout')}}"><i class="fas fa-chevron-right"></i> Logout</a></li>
                                    </ul>
                                </div>
                        @else
                            <div class="row">
                                <div class="col-md-6" style="border-right: 1px solid white">
                                    <a href="{{route('login')}}">Login</a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{route('register')}}">register</a>
                                </div>
                            </div>
                        @endif


                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
