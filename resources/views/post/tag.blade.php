@extends('app')

@section('title', 'Simple Blog')

@section('content')

    @include('header')

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
                                            <a class="avatar" href="{{ url('detail/post/'.$value['alias']) }}"><img src="{{ $value['image'] }}" alt="Profile Image"></a>
                                            <div class="right-area">
                                                <a class="name" href="#"><b>{{ $value['createdby']['name'] }}</b></a>
                                                <h6 class="date" href="#">on Sep 29, 2017 at 9:48am</h6>
                                            </div>
                                        </div>

                                        <ul class="post-footer">
                                            <li><a href="#"><i class="ion-heart"></i>{{ $value['like'] }}</a></li>
                                            <li><a href="#"><i class="ion-chatbubble"></i></a></li>
                                            <li><a href="#"><i class="ion-eye"></i>{{ $value['view'] }}</a></li>
                                        </ul>

                                    </div><!-- blog-right -->

                                </div><!-- single-post extra-blog -->

                            </div><!-- card -->
                        </div><!-- col-lg-4 col-md-6 -->    
                    @endForeach
                @endIf

            </div>           
            
        </div><!-- container -->
    </section><!-- section -->
    

    @include('footer')

@endsection