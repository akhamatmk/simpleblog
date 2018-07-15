@extends('app')

@section('title', 'Create Post Simple Blog')

@section('content')

    @include('header')
	
	<!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!-- <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.js"></script>    

    <section class="blog-area section">
        <div class="container" style="background: white">

            <div class="row">                

                <div class="col-lg-12" style="margin-top: 20px">
                	<div class="comment-form">
						
						<form method="post" action="{{ url('admin/post/create') }}">

							@csrf
							<div class="form-group">
								<label>Title</label>
								<input type="text" name="title" placeholder="Title" class="form-control" >
							</div>

							<div class="form-group">
								<label>Category</label>
								<select class="form-control" name="category">
									@foreach($category as $key => $value)
										<option value="{{ $value->id }}"> {{ $value->name}} </option>
									@endForeach
								</select>
							</div>

							<div class="form-group"><br/>
								<label>Tags</label>
								<input type="text" name="tags" placeholder="Tags" class="tm-input form-control tm-input-info"/>
							</div>
							
							<div class="form-group">
								<label>Short Description</label>
								<textarea name="short_desc" class="form-control"></textarea>
							</div>

							<div class="form-group">
								<label>Logn Description</label>
								<textarea name="long_desc" name="editor1" id="editor1"></textarea>
							</div>

							<div class="form-group">
								<button class="btn btn-success">Submit</button>
							</div>
						</form>


							<script type="text/javascript">
								$(".tm-input").tagsManager();
							</script>


					</div><!-- comment-form -->
                </div>
            </div><!-- row -->

        </div><!-- container -->
    </section><!-- section -->

    <script>
    	$(function() {
    CKEDITOR.replace( 'editor1' );
});
    	
	</script>

@endsection
