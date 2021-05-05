@extends('layouts.cat_layout')

@section('title','Job List')

@section('content')

<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Job category				
							</h1>	
							<p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="category.html"> Job category</a></p>
						</div>											
					</div>
				</div>
			</section>

		<section class="post-area section-gap">
				<div class="" style="margin:20px;">
					<div class="row justify-content-center d-flex">
						<div class="col-lg-8 post-list">
							@if(count($alljobs)>0)
								@foreach($alljobs as $job)
								<div class="single-post d-flex flex-row">
								<div class="thumb">
									<img src="http://northfieldhealthservices.com/comingsoon/images/icons/NHS-2-1.png" alt="" style="width: 100px">
									 
								</div>
								<div class="details">
									<div class="title d-flex flex-row justify-content-between">
										<div class="titles">
											<a href="single.html"><h4>{{$job->title}}</h4></a>
											<h6>North Field Services</h6>					
										</div>
										<ul class="btns">
											<!-- <li><a href="#"><span class="lnr lnr-heart"></span></a></li> -->
											 
											<li><a href="{{url('job')}}/apply?job_id={{$job->id}}">View</a></li>
											 
											@if(!Auth::guest() && Auth::user()->role==3)
											<li><a href="#" onclick="editListing({{$job->id}})"> Edit</a>
											<li><a href="{{url('job')}}/viewApplicant?job_id={{$job->id}}">View Applicant</a>
											@endif
											</li>
										</ul>
									</div>
									<p>
										{{mb_strimwidth($job->job_desc, 0, 400, "...")}}
									</p>
									<h5>Job Nature: {{$job->joblevel->level}}</h5>
									<p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>
									<p class="address"><span class="lnr lnr-database"></span> 
										@if(is_null($job->min_sal) && is_null($job->max_sal))
											Not Applicable
										@else
											₦{{number_format($job->min_sal,2)}} - ₦{{ number_format($job->max_sal,2)}}
										@endif
									</p>
								</div>
							</div>
						@endforeach
						{!! $alljobs->appends(Request::capture()->except('page'))->render() !!}
						@else
							<H4>No Jobs Found</H4>
						@endif
						</div>
						@include('category.partials.sidebar')
					</div>
				</div>
				</section>
			@include('category.partials.addJobModal')
		 		@include('category.partials.genericModal')
	 	
@endsection