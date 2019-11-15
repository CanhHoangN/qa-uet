<html lang="utf8">
@include('master.master')

<body>
@include('master.header')
<div class="body-qa">
    <div class="container-fluid">
        <div class="row">
            <div class="ask-question col-md-2">
                <div class="btn-ask-question row">
                    <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary" id="new_session"><i style="margin-right: 5px" class="fas fa-plus"></i>CREATE A SESSION</button>
                </div>
                <div class="task-list row">
                    <ul>
                        <li><a href="#"><i class="fa fa-question-circle"></i> Question</a></li>
                        <li><a href="#"><i class="fa fa-tags"></i> Tags</a></li>
                        <li><a href="#"><i class="fa fa-trophy"></i> Badges</a></li>
                        <li><a href="#"><i class="fa fa-th-list"></i> Categories</a></li>
                        <li><a href="#"><i class="fa fa-users"></i> Users</a></li>
                        <li><a href="#"><i class="fas fa-poll-h"></i> session</a></li>
                    </ul>
                </div>
            </div>
            <div class="list-question col-md-8">
                @yield('list-box-question')
                @yield('profile_user')
            </div>
            <div class="col-md-2 detail-state">
                <div class="total-question">
                    <p>Questions</p>
                    <strong>18</strong>
                </div>
                <div class="total-member">
                    <p>Members</p>
                    <strong>{{$amountUser}}</strong>
                </div>
                <div class="most-used-tags">
                    <p>MOST USED TAGS</p>
                    <ul>
                        @foreach($type_sessions as $type)
                            <li><a href="#">{{$type->type_session}} </a> x {{$type->total}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="hot-question">
                    <p>HOT QUESTIONS</p>
                    <ul>
                        <li>
                            <a href="#">
                                <img src="" alt="">
                                <p>What are the best mobile apps for traveling?</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="" alt="">
                                <p>Select coordinates which fall within a radius of a central point?</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="" alt="">
                                <p>How to become a billionaire in the next 5 years?</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="" alt="">
                                <p>How to be rich?</p>
                            </a>
                        </li>
                        <li>
                            <a href="#"><img src="" alt="">
                                <p>What are the best mobile apps for traveling?</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Tạo phiên hỏi đáp</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-session" style="padding:10px" action="{{route('session')}}" method="post">
                            @csrf
                            <div class="row el-form">
                                <div class="col-md-5"><strong>Tiêu đề phiên hỏi đáp(*)</strong></div>
                                <div class="col-md-7"><input class="form-control" type="text" id="name-session" name="name_session"></div>
                            </div>
                            <div class="row el-form">
                                <div class="col-md-5"><strong>Mô tả phiên hỏi đáp(*)</strong></div>
                                <div class="col-md-7">
                                    <textarea name="description" id="des-session" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="row el-form">
                                <div class="col-md-5"><strong>Chủ đề(*)</strong></div>
                                <div class="col-md-7">
                                    <select name="type_session" id="">
                                        <option value="business">business</option>
                                        <option value="technology">technology</option>
                                        <option value="marketing">marketing </option>
                                        <option value="billionaire">billionaire</option>
                                        <option value="Q&A">Q&A</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row el-form">
                                <div class="col-md-5"><strong>Mật khẩu tham gia</strong></div>
                                <div class="col-md-7"><input class=form-control type="password" name="password" placeholder="Công khai: đễ trống"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-5"><strong>Thời gian tồn tại</strong></div>
                                <div class='col-sm-7'>
                                    <input placeholder="Để trống: nếu muốn tồn tại đến khi xoá" type='text' class="form-control" id='datetimepicker4' name="time_session" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9"></div>
                                <div class="col-md-3">
                                    <input class="btn btn-primary" type="submit" value="Tạo phiên">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(function () {
        $('#datetimepicker4').datetimepicker({
            format: 'YYYY-MM-DD HH:mm'
        });
    });
</script>



<script>
    $(document).ready(function() {


    });
</script>
</body>
