<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QA_UET</title>
    <!-- bootstrap -->

    <!-- <link rel="stylesheet" href="../bootstrap/css/bootstrap.css"> -->
    <link rel="stylesheet" href="{{asset('css/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap/js/bootstrap.js')}}">

    <!-- css -->
    <link rel="stylesheet" href="{{asset('css/userLayouts/index.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://kit.fontawesome.com/c567c646bc.js" crossorigin="anonymous"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Salsa" />

    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">


</head>
<body>
   <div class="menu">
       <div class="container-fluid">
           <div class="row">
               <div class="col-md-7 logo-search">
                   <div class="row">
                       <div class="col-md-5 logo">
                           LOGO
                       </div>
                       <div class="col-md-7 form-search">
                           <form action="#">
                               <label><input type="text"></label>
                               <i class="fa fa-search"></i>
                           </form>
                       </div>
                   </div>
               </div>
               <div class="col-md-5">
                   <div class="row">
                       <div class="col-md-7 nav-class">
                           <ul class="nav">
                               <li class="nav-item">
                                   <a class="nav-link" href="#">Home</a>
                               </li>
                               <li class="nav-item">
                                   <a class="nav-link" href="#">Blog</a>
                               </li>
                               <li class="nav-item">
                                   <a class="nav-link" href="#">Term</a>
                               </li>
                               <li class="nav-item">
                                   <a class="nav-link" href="#">Contact</a>
                               </li>

                           </ul>
                       </div>
                       <div class="col-md-5 login-register">
                           <a href="#">Login or Register</a>
                       </div>
                   </div>

               </div>
           </div>
       </div>
   </div>
   <div class="body-qa">
       <div class="container-fluid">
           <div class="row">
               <div class="ask-question col-md-2">
                   <div class="btn-ask-question row">
                       <button class="btn btn-primary"><i style="margin-right: 5px" class="fas fa-plus"></i>ASK A QUESTION</button>
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
                       <strong>16</strong>
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
   </div>
   <div class="bg-cover">
       <div class="display">

       </div>
       <div class="qa-login col-md-6">
           <div class="col-md-12 login"><!-- col-md-9 Begin -->
               <div class="row">
                   <div class="col-sm-6 img-login">
                       <img class="img-responsive" src="{{asset('images/signin-image.jpg')}}"/></div>
                   <div class="col-sm-6">
                       <h2 id="signup">Sign In</h2>
                       <form method="post" action="#">
                           <div class="email">
                               <label><i class="fa fa-envelope"></i></label>
                               <input type="email" placeholder="Your Email" name="email-login" id="email-login" required>
                           </div>
                           <div class="password">
                               <label><i class="fa fa-lock"></i></label>
                               <input type="password" placeholder="Password" name="password-login" id="password-login" required>
                           </div>
                           <div class="remember">
                               <input type="checkbox" name="remember" id="remember"><label for="remember"><span>Remember me</span></label>
                           </div>
                           <input type="submit" value="Login">
                       </form>
                   </div>
               </div>
               <div class="link-to-register">
                   <a id="sign-up-here" href="#">Sign up here</a>
               </div>
           </div>
           <div class="col-md-12 register">
               <div class="link-to-login">
                   <a id="login-here" href="#"><i style="margin-right: 5px" class="fas fa-arrow-left"></i> Sign in</a>
               </div>
              <div class="row">
                  <div class="col-sm-6 register-form">
                      <h2 id="signup-register">Sign Up</h2>
                      <form action="#" method="post" enctype="multipart/form-data">
                          <div class="username">
                              <label><i class="fas fa-user"></i></label>
                              <input type="text" placeholder="Your Name" name="name" id="name">
                          </div>
                          <div class="email">
                              <label><i class="fa fa-envelope"></i></label>
                              <input type="email" placeholder="Your Email" name="email-register" id="email-register">
                          </div>
                          <div class="password">
                              <label><i class="fa fa-lock"></i></label>
                              <input type="password" placeholder="Password" name="password-register" id="password-register">
                          </div>
                          <div class="password">
                              <label><i class="fa fa-lock"></i></label>
                              <input type="password" placeholder="Re-password" name="repassword-register" id="repassword-register">
                          </div>
                          <input type="submit" value="Register">
                      </form>
                  </div>
                  <div class="col-sm-6 register-img">
                      <img class="img-responsive" src="{{asset('images/signup-image.jpg')}}">
                  </div>
              </div>

           </div>
       </div>
   </div>
