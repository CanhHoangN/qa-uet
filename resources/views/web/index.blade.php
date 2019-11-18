@extends('web.index_master')
@section('list-box-question')
    @include('web.filter')
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
                                        <li><a href="{{route('tag.name',$su->type_session)}}">{{$su->type_session}}</a></li>
                                    </ul>
                                </div>
                                <div class="user-post row">
                                    <img  id="avatar_default" src="{{asset('images/web/avatar_default.png')}}" alt="">
                                    <p id="chutoa"><a href="{{route('profile_user',$su->id_user)}}">{{DB::table('users')->where('id',$su->id_user)->value('name')}}</a></p>
                                  <!--  <p class="user-badge">Train </p>-->
                                    <p id="created_at">Posted on {{$su->created_at}} in <a href="{{route('tag.name',$su->type_session)}}">{{$su->type_session}}</a> </p>

                                </div>
                            </div>
                            <div class="col-md-4 view-question">
                                  <ul class="ul-info">
                                      <li class="session-views">
                                          <ul>
                                              <li id="views">
                                                {{$su->count_views}}
                                              </li>
                                              <li class="text-li-info">views</li>
                                          </ul>
                                      </li>
                                      <li class="session-questions">
                                          <ul>
                                              <li id="questions">{{DB::table('questions')
                                                      ->select(DB::raw('count(*) as total'))
                                                      ->where('id_session',$su->id_session)
                                                      ->value('total')}}
                                              </li>
                                              <li class="text-li-info">questions</li>
                                          </ul>
                                      </li>
                                    <!--  <li class="session-vote">
                                          <ul>
                                              <li id="votes">25</li>
                                              <li class="text-li-info">votes</li>
                                          </ul>
                                      </li>-->

                                  </ul>
                            </div>
                        </div>
        @endforeach
    </div>

@stop

