<!doctype html>
<html lang="en">
@include('master.master')
<body style="background: #eef1f7">
@include('master.header')
<div class="container">
    <div class="chairman-session row">
        <div class="col-md-2">
            <img src="{{asset("images/web/profile.png")}}" id="profile" alt="profile">
        </div>
        <div class="col-md-6">
            <ul class="profile-session">
                <li id="title-session"><i class="fa fa-check"></i>{{$session[0]->name_session}}</li>
                <li id="person-session"><i class="fa fa-edit"></i>{{$name = (DB::table('users')->where('id',$session[0]->id_user))->value('name')}}</li>
                <li id="des-session"><i class="far fa-sticky-note"></i>{{$session[0]->description}}</li>
                <li id="time-session"><i class="fa fa-history"></i>{{$session[0]->created_at}}</li>
            </ul>
        </div>
    </div>
    <div class="list-qa-session">
        <div class="list-qa-session row">

        </div>

        <div class="search-create-qa row">
            <div class="col-md-3 search-question">
                <form action="#">
                    <input type="text" placeholder="search" name="search-qa">
                    <input type="submit" value="search">
                </form>
            </div>
            <div style="padding: 0px;margin: 0px" class="col-md-6"></div>
            <div class="col-md-3 create-qa">
                <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Đặt câu hỏi</button>
            </div>
        </div>

        <div class="list-qa" style="margin: 0">
            @foreach($list_qa as $qa)
                <div class="single-qa row" style="margin-bottom: 20px">
                    <img id="img-single-qa" class="img-fluid" src="{{asset("images/web/unanswered-question.png")}}" alt="">
                    <div class="info-qa">
                        <ul>
                            <li id="title-single-qa"><a href="{{route("show_question",[$qa->id_session,$qa->id_question])}}" style="color:red">{{$qa->title_question}}</a></li>
                            @if(($quantity_question = DB::table('comments')->where('id_question',$qa->id_question)->count()) > 0)
                                <li style="color: rgb(32, 120, 244)">Hiện tại có {{$quantity_question}} câu hỏi.</li>
                            @else
                                <li style="color: rgb(32, 120, 244)">Hiện tại chưa có câu hỏi nào.</li>
                            @endif

                        </ul>
                        <span id="post-by">Đăng bởi: {{$qa->whoposted}}</span>
                        <span id="amount-like">lượt thích: {{DB::table('like_question')->where('id_question',$qa->id_question)->count()}}</span>
                    </div>

                </div>
            @endforeach

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Đặt câu hỏi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route("add_qa_session",$id)}}" method="post">
                        @csrf
                        <input class="form-control" type="text" name="title_question" placeholder="Nội dung câu hỏi..."><br>
                        <span>Đặt chế độ ẩn danh: </span><input id="toggle-event" type="checkbox" name="post_person" data-size="mini" data-onstyle="danger" data-toggle="toggle"><br>
                        <input  type="submit" class="btn btn-primary" value="submit">
                    </form>
                </div>

            </div>
        </div>
    </div>


</div>
</body>
</html>
