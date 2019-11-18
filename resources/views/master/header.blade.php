<div class="menu">
    <div class="container-fluid">
        <div class="row box">
            <div class="col-md-2 col-sm-2 logo">
                <a href="{{route('home')}}"><img src="{{asset('images/web/logo.png')}}" alt=""></a>
            </div>
            <div class="col-md-4 form-search">
                <form id="form-search" action="{{route('search.session')}}" method="GET">
                    @csrf
                    <label><input id="search_session" placeholder="Search session...." type="text" name="tag_name"></label>
                </form>
            </div>
            <div class="col-md-4 col-sm-4">
                <!-- nav-class <ul class="nav">
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

                 </ul>-->
            </div>
            <div class="col-md-2 col-sm-2 login-register">
                @if(Auth::check())
                    <div class="dropdown user_login">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{Auth::user()->name}}</a>
                        <ul id="list-menu-user" class="dropdown-menu">
                            <li><a href="{{route('profile_user',\Illuminate\Support\Facades\Auth::id())}}"><i class="far fa-user"></i> User Profile</a></li>
                            <li><a href="{{route('logout')}}"><i class="fas fa-chevron-right"></i> Logout</a></li>
                        </ul>
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-6 l-login" style="border-right: 2px solid white">
                            <a href="{{route('login')}}">Login</a>
                        </div>
                        <div class="col-md-6 r-register">
                            <a href="{{route('register')}}">register</a>
                        </div>
                    </div>
                @endif


            </div>
        </div>
    </div>
</div>
