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
					Applicant Applied for {{$jobtitle}}				
				</h1>	
				<p class="text-white link-nav"><a href="{{url('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a @if(isset($_GET['job_id'])) href="{{url('job')}}/apply?job_id={{$_GET['job_id']}}" @else href="{{url('job')}}/profile"  @endif >Back </a></p>
			</div>											
		</div>
	</div>
</section>

<section class="post-area section-gap">
	<div class="" style="margin:20px;">
		<div class="row justify-content-center d-flex">
			<!-- include('category.partials.sidebar3') -->

			@include('category.partials.side_bar_search_applicants')
			<div class="col-lg-9 post-list">
				@if(count($applicantlists)>0)
				<table class="table table-striped">
					<tr>
						<td><input type="checkbox" id="checkAll"></td>
						<td>Name</td>
						<td>Email</td>
						<td>Phone Number</td>
						<td>Status</td>
						<td>Action</td>
					</tr>
						@foreach($applicantlists as $applicant)
					<tr>
						<td><input type="checkbox" class="decision" id="decision{{$applicant->id}}" value="{{$applicant->id}}"></td>
						<td>{{ucwords($applicant->user->name)}}</td>
						<td>{{$applicant->user->email}}</td>
						<td>{{$applicant->user->phone_num}}</td>
						<td>{!! $applicant->resolve_status !!}</td>
						<td>
							 <div class="dropdown">
                                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> 
                                     <a class="dropdown-item applicantProfileLink" href="{{url('job')}}/profile?id={{$applicant->user->id}}" data-toggle="modal" data-target="#profileView"  >View Profile</a> 
                                     <a class="dropdown-item" data-backdrop="false" href="javascript::void(0)"  data-toggle="modal" data-target="#approveReject" onclick="checkOwn('decision{{$applicant->id}}')" >Approve/Reject</a> 
                                     <a class="dropdown-item" target="_blank" href="" href="javascript::void(0)"  data-toggle="modal" data-backdrop="false" data-target="#mailApplicant" onclick="checkOwn('decision{{$applicant->id}}')" >Mail Applicant</a>  
                                     <!-- <a class="dropdown-item" target="_blank" href=""  >Schedule Interview</a>   -->
                                </div>
                            </div>
						</td>
					</tr>
					@endforeach
					
				</table>
				{!! $applicantlists->appends(Request::capture()->except('page'))->render() !!}
				@else
					<h4>No Applicant Found !! </h4>
				@endif

			</div>

		</div></div></section>

		 @include('category.partials.addJobModal')
		 		@include('category.partials.genericModal')
	 