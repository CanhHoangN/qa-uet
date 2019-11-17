<link rel="stylesheet" href="{{asset('css/materialize.min.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
    .row {
        margin-left: -15px !important;
        margin-right: -15px !important;
        margin-bottom:0  !important;
        /* margin-bottom: 20px; */
    }
</style>

    <div class="row">
        <div class="col s12 m10 offset-m1 l8 offset-l2" style="margin-top:10px;">
            @yield('content')
        </div>
    </div>

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/materialize.min.js')}}"></script>
<script src="{{ asset('js/init.js') }}"></script>
