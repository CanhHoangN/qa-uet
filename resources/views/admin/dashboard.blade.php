@extends('layouts.admin_layouts.admin_design')
@section('content')
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{asset('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">
        <div class="quick-actions_homepage">
          <h2>Welcome To Dashboard</h2>
        </div>
        <!--End-Action boxes-->

        <!--Chart-box-->
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
                    <h5>Dashboard</h5>
                </div>
                <div class="widget-content" >
                    <div class="row-fluid">
                        <div class="span9">
                                <img src="{{asset('images/backend_images/qa.png')}}" alt="q&a">
                        </div>
                        <div class="span3">
                            <ul class="site-stats">
                                <li class="bg_lh"><i class="icon-user"></i> {{$totalUsers}}</strong> <small>Users</small></li>
                            </ul>
                            <ul class="site-stats">
                                <li class="bg_lh"><i class="fab fa-accusoft"></i>{{$totalSessions}}</strong> <small>Sessions</small></li>
                            </ul>
                            <ul class="site-stats">
                                <li class="bg_lh"><i class="fas fa-level-up-alt"></i>{{$totalSurveys}}</strong> <small>Surveys</small></li>
                            </ul>
                            <ul class="site-stats">
                                <li class="bg_lh"><i class="fas fa-angle-double-right"></i>{{$totalQuestions}}</strong> <small>Questions</small></li>
                            </ul>
                            <ul class="site-stats">
                                <li class="bg_lh"><i class="fas fa-align-left"></i>{{$totalComments}}</strong> <small>Comments</small></li>
                            </ul>
                            <ul class="site-stats">
                                <li class="bg_lh"><i class="fas fa-book"></i>{{$totalAnswers}}</strong> <small>Answers Surveys</small></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End-Chart-box-->
    </div>
</div>

<!--end-main-container-part-->
@endsection()