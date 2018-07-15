@extends('app')

@section('title', 'Simple Blog')

@section('content')

    @include('header')
    
    @include('main-slider')    
    

    <section class="blog-area section">
        <div class="container">

            <div class="row" id="content-post">
                @if(isset($post))
                    @foreach($post as $key => $value)
                        <div class="col-lg-4 col-md-6">
                              <div class="card h-100">

                                <div class="single-post post-style-2 post-style-3">

                                    <div class="blog-info">

                                        <h6 class="pre-title"><a href="#"><b>{{ $value['category']->name }}</b></a></h6>

                                        <h4 class="title"><a href="{{ url('detail/post/'.$value['alias']) }}"><b>{{ $value['title'] }}</b></a></h4>

                                        <p>{{ $value['short_description'] }}</p>

                                        <div class="avatar-area">
                                            <a class="avatar" href="#"><img src="{{ $value['createdby']['image'] }}" alt="Profile Image"></a>
                                            <div class="right-area">
                                                <a class="name" href="#"><b>{{ $value['createdby']['name'] }}</b></a>
                                                <h6 class="date" href="#">on Sep 29, 2017 at 9:48am</h6>
                                            </div>
                                        </div>

                                        <ul class="post-footer">
                                            <li><a href="#"><i class="ion-heart"></i>{{ $value['like'] }}</a></li>
                                            <li><a href="#"><i class="ion-chatbubble">{{ $value['count_comment'] }}</i></a></li>
                                            <li><a href="#"><i class="ion-eye"></i>{{ $value['view'] }}</a></li>
                                        </ul>

                                    </div><!-- blog-right -->

                                </div><!-- single-post extra-blog -->

                            </div><!-- card -->
                        </div><!-- col-lg-4 col-md-6 -->    
                    @endForeach
                @endIf

            </div>


            @if($pagging['next_page'] != $pagging['current_page'])
                <div id="btn-add-more">
                    <a id="addMore" data-per_page="{{ $pagging['per_page'] }}" data-next_page="{{ $pagging['next_page'] }}" class="load-more-btn" ><b>LOAD MORE</b></a>
                </div>
                <input type="hidden" id="per_page" value="{{ $pagging['per_page'] }}" >
                <input type="hidden" id="next_page" value="{{ $pagging['next_page'] }}" >
            @endIf
            
        </div><!-- container -->
    </section><!-- section -->
    

    @include('footer')

@endsection

@section('footer-script')
    <script type="text/javascript">
        $(function() {
            $("#addMore").click(function(){
                var per_page = $("#per_page").val();
                var next_page = $("#next_page").val();
                
                 $.ajax({
                    type: "GET",
                    url: '{{ URL::to("ajax/other_post") }}?page='+next_page,
                    dataType: 'json',
                    data:{
                        'limit' : per_page
                    },
                    success: function(data){                                       
                        $("#content-post").append(data.content);
                        if(data.pagging.current_page != data.pagging.next_page)
                        {
                            $("#per_page").val(data.pagging.per_page);
                            $("#next_page").val(data.pagging.next_page);
                        }else
                            $("#btn-add-more").hide();
                    }
                });
            });           
        });
    </script>
@endsection