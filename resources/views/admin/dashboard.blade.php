@extends('app')

@section('title', 'Simple Blog')

@section('content')

    @include('header-dashboard')
	

    <section class="blog-area section">
        <div class="container" style="background: white">

            <div class="row">                

                <div class="col-lg-12">
                	<div class="comment-form">
                		<h3 style="text-align: center">Your Post</h3>
                		<a style="float: right;" href="{{ url('admin/post/create') }}" class="btn btn-primary"> Create Post</a>
                		<div class="clearfix"></div>
						<table class="table" style="margin-top: 10px">
							<tr>
								<th>No</th>
								<th>Title</th>
								<th>Short Description</th>
								<th>View</th>
								<th>Comment</th>
								<th>Action</th>
							</tr>
						</table>
					</div><!-- comment-form -->
                </div>
            </div><!-- row -->

        </div><!-- container -->
    </section><!-- section -->   

    @include('footer')

@endsection