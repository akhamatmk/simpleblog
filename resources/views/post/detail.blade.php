@extends('app')

@section('title', $post['title'])

@section('content')

    @include('header')
    
    <link href="{{ asset('single-post-1/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('single-post-1/css/responsive.css') }}" rel="stylesheet">
    <!-- <link href="single-post-1/css/styles.css" rel="stylesheet">

    <link href="single-post-1/css/responsive.css" rel="stylesheet"> -->

    <div class="slider" style="background-image : url({{$post['category']['image']}});">
        <div class="display-table  center-text">
            <h1 class="title display-table-cell"><b>{{ strtoupper($post['category']['name']) }}</b></h1>
        </div>
    </div><!-- slider -->

    <section class="post-area section">
        <div class="container">

            <div class="row">

                <div class="col-lg-8 col-md-12 no-right-padding">

                    <div class="main-post">

                        <div class="blog-post-inner">

                            <div class="post-info">

                                <div class="left-area">
                                    <a class="avatar" href="#"><img src="{{ $post['createdby']['image'] }}" alt="Profile Image"></a>
                                </div>

                                <div class="middle-area">
                                    <a class="name" href=""><b>{{ $post['createdby']['name'] }}</b></a>
                                    <h6 class="date">on  Sep 29, 2017 at 9:48 am</h6>
                                </div>

                            </div><!-- post-info -->

                            <h3 class="title"><a href="#"><b>{{ $post['title'] }}</b></a></h3>

                            {!! $post['long_description'] !!}
                        </div><!-- blog-post-inner -->

                        <div class="post-icons-area">
                            <ul class="post-icons">
                                <li><a href="#"><i class="ion-heart"></i>57</a></li>
                                <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                                <li><a href="#"><i class="ion-eye"></i>138</a></li>
                            </ul>

                         
                        </div>

                        <div class="post-footer post-info">

                            <div class="left-area">
                                <a class="avatar" href="#"><img src="{{ $post['createdby']['image'] }}" alt="Profile Image"></a>
                            </div>

                            <div class="middle-area">
                                <a class="name" href="#"><b>{{ $post['createdby']['name'] }}</b></a>
                                <h6 class="date">on Sep 29, 2017 at 9:48 am</h6>
                            </div>

                        </div><!-- post-info -->


                    </div><!-- main-post -->
                </div><!-- col-lg-8 col-md-12 -->

                <div class="col-lg-4 col-md-12 no-left-padding">

                    <div class="single-post info-area">

                        <div class="sidebar-area subscribe-area">

                            <h4 class="title"><b>SUBSCRIBE</b></h4>
                            <div class="input-area">
                                <form>
                                    <input class="email-input" type="text" placeholder="Enter your email">
                                    <button class="submit-btn" type="submit"><i class="icon ion-ios-email-outline"></i></button>
                                </form>
                            </div>

                        </div><!-- subscribe-area -->

                        <div class="tag-area">

                            <h4 class="title"><b>TAG</b></h4>
                            <ul>
                                @if(isset($tag))
                                    @foreach($tag as $key => $value)
                                        <li><a href="{{ url('tag/'.$value['name']) }}">{{ ucfirst($value['name']) }}</a></li>    
                                    @endForeach
                                @endIf                                                                
                            </ul>

                        </div><!-- subscribe-area -->

                    </div><!-- info-area -->

                </div><!-- col-lg-4 col-md-12 -->

            </div><!-- row -->

        </div><!-- container -->
    </section><!-- post-area -->


    <section class="recomended-area section">
        <div class="container">
            <div class="row">
            
                @if(isset($random))
                    @foreach($random as $key => $value)
                        <div class="col-lg-4 col-md-6">
                            <div class="card h-100">
                                <div class="single-post post-style-1">


                                    <div class="blog-image"><img src="{{ $value['category']['image'] }}" alt="Blog Image"></div>

                                    <a class="avatar" href="#"><img src="{{ $value['createdby']['image'] }}" alt="Profile Image"></a>

                                    <div class="blog-info">

                                        <h4 class="title"><a href="{{ url('detail/post/'.$value['alias']) }}"><b>{{ $value['title'] }}</b></a></h4>
                                        <p>{{ $value['short_description'] }}</p><br/>
                                        <ul class="post-footer">
                                            <li><a href="#"><i class="ion-heart"></i>{{ $value['like'] }}</a></li>
                                            <li><a href="#"><i class="ion-chatbubble"></i>{{ $value['count_comment'] }}</a></li>
                                            <li><a href="#"><i class="ion-eye"></i>{{ $value['view'] }}</a></li>
                                        </ul>

                                    </div><!-- blog-info -->
                                </div><!-- single-post -->
                            </div><!-- card -->
                        </div><!-- col-md-6 col-sm-12 -->    
                    @endForeach
                @endIf

                            

            </div><!-- row -->

        </div><!-- container -->
    </section>

    <section class="comment-section">
        <div class="container">
            <h4><b>POST COMMENT</b></h4>
            <div class="row">

                <div class="col-lg-8 col-md-12">
                    <div class="comment-form">
                        <form method="post">
                            <div class="row">
                                <div class="col-sm-12">
                                    <textarea name="contact-form-message" rows="2" id="comment_text" class="text-area-messge form-control"
                                        placeholder="Enter your comment" aria-required="true" aria-invalid="false"></textarea >
                                </div><!-- col-sm-12 -->
                                <div class="col-sm-12">
                                    <button class="submit-btn" type="button" id="form-submit"><b>POST COMMENT</b></button>
                                </div><!-- col-sm-12 -->

                            </div><!-- row -->
                        </form>
                    </div><!-- comment-form -->

                    <h4><b>COMMENTS ({{ $post['count_comment']}})</b></h4>

                    <div id="first_comment">
                        
                    </div>

                    @if(isset($postComment))
                        @foreach($postComment as $key => $value)
                        <div class="commnets-area">
                            <div class="comment">

                                <div class="post-info">

                                    <div class="left-area">
                                        <a class="avatar" href="#"><img src="{{ $value['createdby']['image'] }}" alt="Profile Image"></a>
                                    </div>

                                    <div class="middle-area">
                                        <a class="name" href="#"><b>{{ $value['createdby']['name'] }}</b></a>
                                        <h6 class="date">on  {{date('M d, Y H:i' , strtotime($value['created_at'] )) }}</h6>
                                    </div>

                                </div><!-- post-info -->

                                <p>{{ $value['text'] }}</p>

                            </div>
                        </div>
                        @endForeach
                    @endIf

                    <div id="more_comment">
                        
                    </div>

                    @if($paggingComment['next_page'] != $paggingComment['current_page'])
                        <a id="more" class="more-comment-btn" style="cursor: pointer;"><b>VIEW MORE COMMENTS</a>
                    @endIf

                    <input type="hidden" id="per_page" value="{{ $paggingComment['per_page'] }}" >
                    <input type="hidden" id="next_page" value="{{ $paggingComment['next_page'] }}" >

                </div><!-- col-lg-8 col-md-12 -->

            </div><!-- row -->

        </div><!-- container -->
    </section>



    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Login Modal</h4>
          </div>
          <div class="modal-body">
            
            <form>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required="required">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" required="required">
              </div>
              
              <button type="button" id="submit_login" class="btn btn-primary">Submit</button>
            </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>

    @include('footer')
@endsection

@section('footer-script')
    <script type="text/javascript">
        $(function() {
            $("#more").click(function(){
                var per_page = $("#per_page").val();
                var next_page = $("#next_page").val();
                
                 $.ajax({
                    type: "GET",
                    url: '{{ URL::to("ajax/other_comment/".$post['id']) }}?page='+next_page,
                    dataType: 'json',
                    data:{
                        'limit' : per_page
                    },
                    success: function(data){                                       
                        $("#more_comment").append(data.content);
                        if(data.pagging.current_page != data.pagging.next_page)
                        {
                            $("#per_page").val(data.pagging.per_page);
                            $("#next_page").val(data.pagging.next_page);
                        }else
                            $("#more").hide();
                    }
                });
            });

            $("#submit_login").click(function(){
                $.ajax({
                    type: "POST",
                    url: '{{ URL::to("ajax/login") }} ',
                    dataType: 'json',
                    data:{
                        "_token": "{{ csrf_token() }}",
                        'email'     : $("#email").val(),
                        'password'  : $("#password").val(),
                    },
                    success: function(data){                                       
                        if(data.code != 200)
                            alert('wrong email or password')
                        else
                        {
                            alert('Login succes');
                            $("#myModal").modal('hide');
                        }
                    }
                });
            });

            $("#form-submit").click(function(){
                 $.ajax({
                    type: "POST",
                    url: '{{ URL::to("comment/ajax_store/".$post['id']) }} ',
                    dataType: 'json',
                    data:{
                        "_token": "{{ csrf_token() }}",
                        'comment_text' : $("#comment_text").val()
                    },
                    success: function(data){                                       
                        if(data.code == 401)
                            $("#myModal").modal('show');
                        else
                        {
                            var a = '<div class="commnets-area"><div class="comment"><div class="post-info"><div class="left-area"><a class="avatar" href=""><img src="'+data.user.image+'" alt="Profile Image"></a></div><div class="middle-area"><a class="name" href="#"><b>'+data.user.name+'</b></a><h6 class="date">on  {{date('M d, Y H:i') }}</h6></div></div><p>'+ $("#comment_text").val() +'</p></div></div>';

                            $('#first_comment').append(a);
                        }
                    }
                });
            });
        });
    </script>
@endsection
