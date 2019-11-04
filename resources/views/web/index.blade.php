<html lang="utf8">
@include('master.master')
<body>
@include('master.header')
<div class="body-qa">
    <div class="container-fluid">
        <div class="row">
            <div class="ask-question col-md-2">
                <div class="btn-ask-question row">
                    <button class="btn btn-primary" id="new_survey"><i style="margin-right: 5px" class="fas fa-plus"></i>ASK A QUESTION</button>
                </div>
                <div class="task-list row">
                    <ul>
                        <li><a href="#"><i class="fa fa-question-circle"></i> Question</a></li>
                        <li><a href="#"><i class="fa fa-tags"></i>  Tags</a></li>
                        <li><a href="#"><i class="fa fa-trophy"></i> Badges</a></li>
                        <li><a href="#"><i class="fa fa-th-list"></i> Categories</a></li>
                        <li><a href="#"><i class="fa fa-users"></i> Users</a></li>
                    </ul>
                </div>
            </div>
            <div class="list-question col-md-8">
                <div class="filter-question">
                    <div class="row up-filter">
                        <div class="col-md-4">
                            <h3>All Questions</h3>
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
                                <li><a href="#">Latest</a></li>
                                <li><a href="#">Votes</a></li>
                                <li><a href="#">Unanswered</a></li>

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
                    <div class="box-question row">
                        <div class="col-md-8">
                            <div class="content-box">
                                <strong>What is business???</strong>
                                <p>I want to know about business process.</p>
                            </div>
                            <div class="related-content row">
                                <ul class="question-tag">
                                    <li><a href="#">business</a></li>
                                </ul>
                            </div>
                            <div class="user-post row">
                                <img src="" alt="">
                                <p>Nguyen Canh Hoang </p>
                                <p class="user-badge">Train </p>
                                <p>Asked on july 14 2019 in Business </p>

                            </div>
                        </div>
                        <div class="col-md-4 view-question">
                            <ul>
                                <li>16 views</li>
                                <li>2 answers</li>
                                <li>0 votes</li>

                            </ul>
                        </div>
                    </div>
                    <div class="box-question row class-while">
                        <div class="col-md-8">
                            <div class="content-box">
                                <strong>What is business???</strong>
                                <p>I want to know about business process.</p>
                            </div>
                            <div class="related-content row">
                                <ul class="question-tag">
                                    <li><a href="#">business</a></li>
                                </ul>
                            </div>
                            <div class="user-post row">
                                <img src="" alt="">
                                <p>Nguyen Canh Hoang </p>
                                <p class="user-badge">Train </p>
                                <p>Asked on july 14 2019 in Business </p>

                            </div>
                        </div>
                        <div class="col-md-4 view-question">
                            <ul>
                                <li>16 views</li>
                                <li>2 answers</li>
                                <li>0 votes</li>

                            </ul>
                        </div>
                    </div>
                    <div class="box-question row ">
                        <div class="col-md-8">
                            <div class="content-box">
                                <strong>What is business???</strong>
                                <p>I want to know about business process.</p>
                            </div>
                            <div class="related-content row">
                                <ul class="question-tag">
                                    <li><a href="#">business</a></li>
                                </ul>
                            </div>
                            <div class="user-post row">
                                <img src="" alt="">
                                <p>Nguyen Canh Hoang </p>
                                <p class="user-badge">Train </p>
                                <p>Asked on july 14 2019 in Business </p>

                            </div>
                        </div>
                        <div class="col-md-4 view-question">
                            <ul>
                                <li>16 views</li>
                                <li>2 answers</li>
                                <li>0 votes</li>

                            </ul>
                        </div>
                    </div>
                    <div class="box-question row class-while">
                        <div class="col-md-8">
                            <div class="content-box">
                                <strong>What is business???</strong>
                                <p>I want to know about business process.</p>
                            </div>
                            <div class="related-content row">
                                <ul class="question-tag">
                                    <li><a href="#">business</a></li>
                                </ul>
                            </div>
                            <div class="user-post row">
                                <img src="" alt="">
                                <p>Nguyen Canh Hoang </p>
                                <p class="user-badge">Train </p>
                                <p>Asked on july 14 2019 in Business </p>

                            </div>
                        </div>
                        <div class="col-md-4 view-question">
                            <ul>
                                <li>16 views</li>
                                <li>2 answers</li>
                                <li>0 votes</li>

                            </ul>
                        </div>
                    </div>
                </div>
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
                        <li><a href="#">business </a> x 6</li>
                        <li><a href="#">technology</a> x 5</li>
                        <li><a href="#">marketing</a> x 4</li>
                        <li><a href="#">google</a> x 8</li>
                        <li><a href="#">apps</a> x 1</li>
                        <li><a href="#">billionaire</a> x 10</li>
                        <li><a href="#">movie</a> x 5</li>
                    </ul>
                </div>
                <div class="hot-question">
                    <p>HOT QUESTIONS</p>
                    <ul>
                        <li>
                            <a href="#">
                                <img src="" alt="">
                                <p>What are the best mobile apps for traveling?</p></a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="" alt="">
                                <p>Select coordinates which fall within a radius of a central point?</p></a>
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
                                <p>What are the best mobile apps for traveling?</p></a>
                        </li>
                    </ul>
                </div>


            </div>

        </div>
    </div>
    <div class="bg-cover">
            <div class="display">

            </div>
            <div class="session-qa col-md-4">
                    <div class="session-qa-head">
                        <h3>Tạo phiên hỏi đáp</h3>
                    </div>
                    <form action="">
                        @csrf
                        <label id="title">Tiêu đề: <input class="form-control" type="text" name="name_survey" id="name_survey"></label><br>
                        <label id="des">Mô tả: <input type="text" class="form-control" name="description"></label><br>
                        <input type="submit" value="Tạo phiên">
                    </form>
             </div>
    </div>
    
</div>
<script>
    $(document).ready(function () {
        $('#new_survey').click(function (e) { 
        
            $('.bg-cover').addClass('show-bg-cover');
            $('body').addClass('stop-scrolling');
            $('.session-qa').addClass('show-sessgion-qa');
            
        });
        $('.display').click(function () {
               $('.bg-cover').removeClass('show-bg-cover');
               $('body').removeClass('stop-scrolling');
        })
    });
</script>
</body>
