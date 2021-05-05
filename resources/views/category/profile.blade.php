@extends('layouts.cat_layout')

@section('title',"Profile")

@section('content')
<section class="banner-area relative" id="home" style="">	
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					{{Auth::user()->name}}'s Profile'				
				</h1>	
				<p class="text-white link-nav"><a href="{{url('/')}}">Home </a>  <span class="lnr lnr-arrow-left"></span>  </p>
			</div>											
		</div>
	</div>
</section>

<section class="post-area section-gap">
	<div class="" style="margin: 20px;">

		<div class="row justify-content-center d-flex">

						@include('category.partials.sidebar2')
						@include('category.partials.profile')
						@include('category.partials.addJobModal')
		 		@include('category.partials.genericModal')
	 
				</div>
			</div>
		</div>
	</section>
	@endsection

	