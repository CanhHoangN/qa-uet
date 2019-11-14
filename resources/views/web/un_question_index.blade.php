@extends('web.index_mater')
@section('list-box-question')
    @extends('web.index_mater')
@section('list-box-question')
    <div class="list-box-question">
        @foreach($allsession as $su)
            @if(($su->id_session % 2) != 0)
                <div style="background: #fff" class="box-question row">
                    @else
                        <div  class="box-question row">
                            @endif
                            <div class="col-md-8">
                                <div class="content-box">
                                    <strong><a href="{{route("show_detail_session",$su->id_session)}}">{{$su->name_session}}</a></strong>
                                    <p>{{$su->description}}</p>
                                </div>
                                <div class="related-content row">
                                    <ul class="question-tag">
                                        <li><a href="#">{{$su->type_session}}</a></li>
                                    </ul>
                                </div>
                                <div class="user-post row">
                                    <img src="" alt="">
                                    <p id="chutoa">{{DB::table('users')->where('id',$su->id_user)->value('name')}}</p>
                                    <p class="user-badge">Train </p>
                                    <p id="created_at">Asked on {{$su->created_at}} in {{$su->type_session}} </p>

                                </div>
                            </div>
                            <div class="col-md-4 view-question">
                                <!--  <ul>
                                      <li>16 views</li>
                                      <li>2 questions</li>
                                  </ul>-->
                            </div>
                        </div>
                        @endforeach

                </div>
    </div>
@stop

@stop
