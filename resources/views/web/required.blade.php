<!doctype html>
<html lang="en">
@include('master.master')
<body style="background: #eef1f7">
@include('master.header')
<div class="required-password col-md-6 offset-3 col-sm-6"><!-- col-md-9 Begin -->
    <form action="{{route('post_required_password',$id)}}" method="post">
        @csrf
        <div class="head-required">
            <h5>Xác thực mật khẩu</h5>
        </div>
        <div class="body-required">
            @if (session('error_required_password'))
                <div class="alert-danger">
                    {{ session('error_required_password') }}
                </div>
            @endif
            <input placeholder="Vui lòng nhập key..." type="password" name="required_password" id="required_password">
            <input class="btn btn-primary" type="submit" value="submit">
        </div>

    </form>
</div>
</body>
</html>


