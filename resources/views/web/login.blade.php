<!doctype html>
<html lang="en">
@include('master.master')
<body style="background: #eef1f7">
@include('master.header')
<div class="col-md-6 offset-3 login"><!-- col-md-9 Begin -->
    <div class="row">
        <div class="col-sm-6 img-login">
            <img class="img-responsive" src="{{asset('images/signin-image.jpg')}}"/></div>
        <div class="col-sm-6">
            <h2 id="signup">Sign In</h2>
            <form method="post" action="{{route('post_login')}}">
                @csrf
                @if (session('error'))
                    <div class="alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('NotLogin'))
                    <div class="alert-danger">
                        {{ session('NotLogin') }}
                    </div>
                @endif

                @if (session('NotLogin_comment'))
                    <div class="alert-danger">
                        {{ session('NotLogin_comment') }}
                    </div>
                @endif
                @if (session('NotLogin_survey'))
                    <div class="alert-danger">
                        {{ session('NotLogin_survey') }}
                    </div>
                @endif
                @if (session('NotLogin_question'))
                    <div class="alert-danger">
                        {{ session('NotLogin_question') }}
                    </div>
                @endif
                <div class="email">
                    <label><i class="fa fa-envelope"></i></label>
                    <input type="email" placeholder="Your Email" name="email" id="email-login" required>
                </div>
                <div class="password">
                    <label><i class="fa fa-lock"></i></label>
                    <input type="password" placeholder="Password" name="password" id="password-login" required>
                </div>
                <div class="remember">
                    <input type="checkbox" name="remember" id="remember"><label for="remember"><span>Remember me</span></label>
                </div>
                <input type="submit" value="Login">
            </form>
        </div>
    </div>
    <div class="link-to-register">
        <a id="sign-up-here" href="{{route('register')}}">Sign up here</a>
    </div>
</div>
</body>
</html>


