@extends('app')

@section('title', 'Register User Blog')

@section('content')

    @include('header')
    

    <section class="blog-area section">
        <div class="container" style="background: white">

            <div class="row">                

                <div class="col-lg-12">
                	<div class="comment-form">
						<form method="post" action="{{ url('register/user') }}" style="margin: 10px">
							<div class="row">
								@csrf
								<div class="col-sm-12">
									<h1>Form Register</h1>
								</div>

								<div class="col-sm-12">
									<input type="text" aria-required="true" name="name" class="form-control"
										placeholder="Enter your name" aria-invalid="true" required >
								</div>

								<div class="col-sm-12">
									<input type="email" aria-required="true" name="email" class="form-control"
										placeholder="Enter your email" aria-invalid="true" required>
								</div>

								<div class="col-sm-12">
									<input type="password" aria-required="true" name="password" class="form-control"
										placeholder="Enter your password" aria-invalid="true" required>
								</div>

								<div class="col-sm-12">
									<button class="submit-btn" type="submit" id="form-submit"><b>Register</b></button>
								</div><!-- col-sm-12 -->

							</div><!-- row -->
						</form>
					</div><!-- comment-form -->
                </div>
            </div><!-- row -->

        </div><!-- container -->
    </section><!-- section -->

@endsection
