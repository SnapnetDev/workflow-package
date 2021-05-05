@extends('layouts.cat_layout')

@section('title','Job List')

@section('css')
<!-- Include SmartWizard CSS -->
<link href="{{asset('dist/css/smart_wizard.css')}}" rel="stylesheet" type="text/css" />

<!-- Optional SmartWizard theme -->
<link href="{{asset('dist/css/smart_wizard_theme_circles.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('dist/css/smart_wizard_theme_arrows.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('dist/css/smart_wizard_theme_dots.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<section class="banner-area relative" id="home">	
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					Jobs(s) Applied For			
				</h1>	
				<p class="text-white link-nav"><a href="{{url('/')}}">Home </a>  </p>
			</div>											
		</div>
	</div>
</section>

<div class="col-lg-12" style="margin-top: 15px">
<section class="post-area section-gap">
	<div class="" style="margin:0 50px 50px 50px">
		<div class="row justify-content-center d-flex"> 
						@include('category.partials.sidebar2')
			<div class="col-lg-8 post-list">
				<div class="table-responsive">
		<table class="table table-hover">
		<thead class="bg-blue-grey-100">
			<tr>
			<th>Job Title</th>
			<th>Application Status</th>
			<th>Action</th>
			<th>Date Applied</th>
			</tr>
		</thead>
		<tbody>
		@if(count($appliedfor) > 0)
			@foreach($appliedfor as $job) 
			
			<tr>
				<td><a target="_blank" style="text-decoration:none" href="{{url('job/apply?job_id=')}}{{$job->joblisting->id}}" >{{$job->joblisting->title}}</a></td>
				 
				<td style="padding: 18px"> {!! $job->resolve_status !!}</td>
				<td>
					@if($job->complete==0)
					<a class="btn btn-sm btn-success" href="{{url('job')}}/appllyToJob?job_id={{$job->id}}#step-2">Continue Application</a>
					@endif
				</td>
				<td> {{$job->created_at->diffForHumans()}} </td>
			</tr>
			
			@endforeach
		@else
			<div class="alert alert-danger">
				<h3>You have not applied for any job yet.</h3>
			</div>
		@endif
		</tbody>
		</table>
		
		{{ $appliedfor->links() }}
		
			</div>
			</div>	

		</div></div>
	</div></section>
		@include('category.partials.addJobModal')
		 		@include('category.partials.genericModal')
	 