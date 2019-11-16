@extends('web.index_master')
@section('list-box-question')
    <div class="filter-question">
        <div class="row up-filter">
            <div class="col-md-4">
                <h3>Session & Survey</h3>
            </div>
            <div class="col-md-8 filter">
                <div class="el-filter">
                    <label>Filter by</label>
                    <label id="category">
                        <select class="form-control" id="sel1" name="sellist1">
                            <option>Select Categories</option>
                            <option>Accessories</option>
                            <option>Accounting</option>
                            <option>Advice</option>
                            <option>Arts</option>
                        </select>
                    </label>
                    <label id="all">
                        <select class="form-control" id="sel2" name="sellist2">
                            <option>All</option>
                            <option>Poll</option>
                            <option>Normal</option>
                        </select>
                    </label>
                </div>
            </div>
        </div>
        <div class="row down-amount">
            <div class="col-md-4 state-question-pre">
                <ul class="state-question">
                    <li><a href="{{route('home')}}">Session</a></li>
                    <li><a href="#">Survey</a></li>
                    <li><a href="{{route('un_question')}}">Un-question</a></li>

                </ul>
            </div>
            <div class="col-md-8 amount-question">
                <div class="el-amount-question">
                    <label>Questions Per Page: </label>
                    <label id="amount">
                        <form action="#">
                            <div class="form-group">
                                <select class="form-control" id="sel3" name="sellist3">
                                    <option>12</option>
                                    <option>15</option>
                                    <option>20</option>
                                </select>
                            </div>
                            <!--  <button type="submit" class="btn btn-primary">Submit</button>-->
                        </form>
                    </label>
                </div>

            </div>
        </div>
    </div>
    <div class="list-box-question">
        @foreach($allsurvey as $su)
            @if(($su->id_session % 2) != 0)
                <div style="background: #fff" class="box-question row">
                    @else
                        <div  class="box-question row">
                            @endif
                            <div class="col-md-8">
                                <div class="content-box">
                                    <strong id="title-sesison"><a href="{{route('handle.survey',$su->id)}}">{{$su->title}}</a></strong>
                                    <p>{{$su->description}}</p>
                                </div>
                                <div class="related-content row">
                                    <ul class="question-tag">
                                        <li><a href="#">aas</a></li>
                                    </ul>
                                </div>
                                <div class="user-post row">
                                    <img  id="avatar_default" src="{{asset('images/web/avatar_default.png')}}" alt="">
                                    <p id="chutoa"><strong>Chairman: </strong>{{DB::table('users')->where('id',$su->user_id)->value('name')}}</p>
                                    <!--  <p class="user-badge">Train </p>-->
                                    <p id="created_at">Asked on {{$su->created_at}} in <a href="#">aaaa</a> </p>

                                </div>
                            </div>
                            <div class="col-md-4 view-question">
                                <ul class="ul-info">
                                    <li class="session-views">
                                        <ul>
                                            <li id="views">
                                                20
                                            </li>
                                            <li class="text-li-info">views</li>
                                        </ul>
                                    </li>
                                    <li class="session-questions">
                                        <ul>
                                            <li id="questions">
                                            </li>
                                            <li class="text-li-info">questions</li>
                                        </ul>
                                    </li>
                                    <li class="session-vote">
                                        <ul>
                                            <li id="votes">25</li>
                                            <li class="text-li-info">votes</li>
                                        </ul>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        @endforeach
                </div>
@stop
