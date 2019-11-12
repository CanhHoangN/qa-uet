<!doctype html>
<html lang="en">
@include('master.master')
<body style="background: #eef1f7">
@include('master.header')
<div class="container">
    <div class="chairman-session not-shadow row">
        <div class="col-md-2">
            <img src="{{asset("images/web/profile.png")}}" id="profile" alt="profile">
        </div>
        <div class="col-md-6">
            <ul class="profile-session">
                <li id="title-session"><i class="fa fa-check"></i>{{$survey[0]->name_survey}}</li>
                <li id="person-session"><i class="fa fa-edit"></i>{{$name = (DB::table('users')->where('id',$survey[0]->id_user))->value('name')}}</li>
                <li id="des-session"><i class="far fa-sticky-note"></i>{{$survey[0]->description}}</li>
                <li id="time-session"><i class="fa fa-history"></i>{{$survey[0]->created_at}}</li>
            </ul>
        </div>

    </div>
    <div class="box-questions">
        <div class="who-posted">
            <h5>Đăng bởi: Thành viên ẩn danh</h5>
        </div>
        <div class="list-questions">
            <a  href="{{route('show_detail_session',$survey[0]->id_survey)}}">Trở về bảng câu hỏi</a>
            <div class="question">
                <div class="content-question">
                    <div class="head-content-question">
                        <h5>Nội dung câu hỏi</h5>
                    </div>
                    <div class="body-content-question">
                        <p>Câu hỏi nè!</p>
                    </div>
                    <div class="quantity-like-question">
                        <span style="color: #606670"><i style="color: rgb(32, 120, 244)" class="far fa-thumbs-up"></i> {{$like->count()}} people like</span>
                    </div>
                    <div class="like-comment-content-question row">
                        <div class="col-md-6 col-sm-6 like-question">
                            @if((DB::table('like_question')->where('id_user',\Illuminate\Support\Facades\Auth::id())->where('id_question',$id_question))->count() > 0)
                                <a style="color: rgb(32, 120, 244)" href="{{route('un_like_question',$id_question)}}"><i class="far fa-thumbs-up"></i> like</a>
                            @else
                            <a href="{{route('like_question',$id_question)}}"><i class="far fa-thumbs-up"></i> like</a>
                            @endif
                        </div>
                        <div class="col-md-6 col-sm-6 comment-question">
                            <a href="#"><i class="far fa-comment"></i> comment</a>
                        </div>
                    </div>
                    <div class="write-comment-question row">
                        <div class="col-md-1 avatar-people">
                            <img src="{{asset("images/web/profile.png")}}" alt="">
                        </div>
                        <div class="col-md-11 write-comment">
                            <form id="send_comment" action="{{route('add_comment',$id_question)}}" method="post">
                                @csrf
                                <input class="form-control" type="text" placeholder="Viết nhận xét..." name="comment_question">
                            </form>
                        </div>
                    </div>

                    @foreach($comments as $comment)
                        <div class="list-comment row">
                            <div class="col-md-1 avatar-people">
                                <img src="{{asset("images/web/profile.png")}}" alt="">
                            </div>
                            <div class="col-md-10 el-comment">
                                <span style="color: #385898"><a href="#">{{\App\User::where('id',$comment->id_user)->value('name')}}</a></span><b> {{$comment->content}}</b>
                                <ul class="like-comment-question">
                                    <li class="like-comment-{{$comment->id_comment}}"><a href="#">Thích</a></li>
                                    @if(($comments_in=DB::table('comment_in')->where('id_comment',$comment->id_comment)->get())->count() == 0)
                                        <li class="res-comment-{{$comment->id_comment}}">Trả lời</li>
                                    @else
                                        <li class="res-comment-{{$comment->id_comment}}">Trả lời ({{$comments_in->count()}})</li>
                                    @endif
                                </ul>
                                @foreach( $comments_in = DB::table('comment_in')->where('id_comment',$comment->id_comment)->get() as $cmt)
                                    <div class="rep-comment-{{$comment->id_comment}} rep-comment col-md-12 row">
                                        <div class="col-md-1 avatar-people size-avatar">
                                            <img src="{{asset("images/web/profile.png")}}" alt="">
                                        </div>
                                        <div class="col-md-11 content-rep-comment">
                                            <span style="color: #385898"><a href="#">{{\App\User::where('id',$cmt->id_user)->value('name')}}</a></span><b> {{$cmt->content}}</b>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="rep-comment-{{$comment->id_comment}} rep-comment col-md-12 row" id="show_rep_comment">
                                    <div class="col-md-1 avatar-people size-avatar">
                                        <img src="{{asset("images/web/profile.png")}}" alt="">
                                    </div>
                                    <div class="col-md-11 content-rep-comment">
                                        <form action="{{route('add_comment_in_comment',[$id_question,$comment->id_comment])}}" method="post">
                                            @csrf
                                            <input  class="form-control" type="text" name="comment_rep" placeholder="viết phản hồi...">
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    </div>
                </div>
            </div>

        </div>
    </div>




    <!-- Modal -->



</div>
<script>
    $(document).ready(function () {
        $('input[name="comment_question"]').keypress(function (e) {
            if (e.which == 13) {
                $('form#send_comment').submit();
                return false;    //<---- Add this line
            }
        });
        $("ul li:nth-child(2)").click(function () {
            var cl = $(this).attr('class');
            var id = cl.split('-')[2];
            $(".rep-comment-".concat(id)).toggleClass("show-rep-comment");
        });
    });
</script>
</body>
</html>
