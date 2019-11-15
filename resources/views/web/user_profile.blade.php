@extends('web.index_master')
@section('profile_user')
    <div class="head-profile row">
        <h3>{{$user[0]->name}}'s profile</h3>
    </div>
    <div class="body-profile row">
        <div class="col-md-8 col-sm-8 profile-left row">
            <img class="img-avatar" src="{{asset('images/web/avatar_default.png')}}" alt="">
            <ul class="list-info">
                <li id="name_profile">{{$user[0]->name}}</li>
                <li id="role_profile">default</li>
                <li id="email_profile"><i class="fas fa-envelope"></i> {{$user[0]->email}}</li>
            </ul>
        </div>
        <div class="col-md-4 col-sm-4 profile-right">
            <ul class="list-point">
                <li id="point-1">
                    <ul id="ul-point-1">
                        <li id="question-point">Question</li>
                        <li id="point-question"><strong>18</strong></li>
                    </ul>
                </li>
                <li id="point-2">
                    <ul id="ul-point-2">
                        <li id="answer-point">Answer</li>
                        <li id="point-answer"><strong>18</strong></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="footer-profile row">
        <ul class="list-footer">
            <li><a href="">Sessions</a></li>
            <li><a href="">Questions</a></li>

        </ul>
    </div>
    <div class="list-box-question">
        @foreach($allsession as $su)
            @if(($su->id_session % 2) != 0)
                <div style="background: #fff" class="box-question row">
                    @else
                        <div  class="box-question row">
                            @endif
                            <div class="col-md-8">
                                <div class="content-box">
                                    <strong id="title-sesison"><a href="{{route("show_detail_session",$su->id_session)}}">{{$su->name_session}}</a></strong>
                                    <p>{{$su->description}}</p>
                                </div>
                                <div class="related-content row">
                                    <ul class="question-tag">
                                        <li><a href="#">{{$su->type_session}}</a></li>
                                    </ul>
                                </div>
                                <div class="user-post row">
                                    <img  id="avatar_default" src="{{asset('images/web/avatar_default.png')}}" alt="">
                                    <p id="chutoa"><strong>Chairman: </strong>{{DB::table('users')->where('id',$su->id_user)->value('name')}}</p>
                                    <!--  <p class="user-badge">Train </p>-->
                                    <p id="created_at">Asked on {{$su->created_at}} in <a href="#">{{$su->type_session}}</a> </p>

                                </div>
                            </div>
                            <div class="col-md-3 view-question">
                                <!--  <ul>
                                      <li>16 views</li>
                                      <li>2 questions</li>
                                  </ul>-->

                            </div>
                            <div class="col-md-1">
                                <div class="delete-session"><a href="{{route('delete_session',$su->id_session)}}"><i class="fas fa-trash"></i></a></div>
                            </div>
                        </div>
                        @endforeach
                </div>
@stop

    </div>
<script>
    @if (session('delete'))
        alert({{session('delete')}});
    @endif
</script>
