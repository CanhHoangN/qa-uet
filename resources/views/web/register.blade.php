<!doctype html>
<html lang="en">
    @include('master.master')

<body style="background: #eef1f7">
@include('master.header')
<div class="col-md-6 offset-3 register">
    <div class="link-to-login">
        <a id="login-here" href="{{route('login')}}"><i style="margin-right: 5px" class="fas fa-arrow-left"></i> Sign in</a>
    </div>
    <div class="row">
        <div class="col-sm-6 register-form">
            <h2 id="signup-register">Sign Up</h2>
            <form action="{{route('post_register')}}" method="post" enctype="multipart/form-data">
                @csrf
                @if ($errors->any())
                    <div class="alert-danger">
                        <ul style="list-style: none;padding: 0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="username">
                    <label><i class="fas fa-user"></i></label>
                    <input type="text" placeholder="Your Name" name="name" id="name">
                </div>
                <div class="email">
                    <label><i class="fa fa-envelope"></i></label>
                    <input type="email" placeholder="Your Email" name="email" id="email-register">
                </div>
                <div class="password">
                    <label><i class="fa fa-lock"></i></label>
                    <input type="password" placeholder="Password" name="password" id="password-register">
                </div>
                <div class="password">
                    <label><i class="fa fa-lock"></i></label>
                    <input type="password" placeholder="Re-password" name="password_confirmation" id="repassword-register">
                </div>
                <input type="submit" value="Register">
            </form>
        </div>
        <div class="col-sm-6 register-img">
            <img class="img-responsive" src="{{asset('images/signup-image.jpg')}}">
        </div>
    </div>

</div>

</body>

</html>
