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
					Job category				
				</h1>	
				<p class="text-white link-nav"><a href="{{url('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="category.html"> Job category</a></p>
			</div>											
		</div>
	</div>
</section>

<section class="post-area section-gap">
	<div class=" " style="margin: 20px">
		<div class="row justify-content-center d-flex">
			<div class="col-lg-12 post-list">

				<div >

					<!-- SmartWizard html -->
					<div id="smartwizard">
						<ul>
							<li><a href="#step-1">Step 1<br /><small>Basic Details</small></a></li>
							<li><a href="#step-2">Step 2<br /><small>Education</small></a></li>
							<li><a href="#step-3">Step 3<br /><small>Work experience</small></a></li>
							<li><a href="#step-4">Step 4<br /><small>Certification</small></a></li>
							<li><a href="#step-5">Step 5<br /><small>Uploads</small></a></li>
							<li><a href="#step-6">Step 6<br /><small>Refree(s)</small></a></li>
						</ul>

						<div>

							@include('category.partials.step1')
							@include('category.partials.step2')
							@include('category.partials.step3')
							@include('category.partials.step4')
							@include('category.partials.step5')
							@include('category.partials.step6')

							@include('category.partials.addJobModal')
	 

						</div> 
					</div>

				</div>
			</div>	
		</div></div></section>

		@endsection

		@section('script')
		
		 		@include('category.partials.genericModal')
		<!-- Include jQuery --> 
		<!-- Include jQuery Validator plugin -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
		<!-- Include SmartWizard JavaScript source -->
		<script type="text/javascript" src="{{asset('dist/js/jquery.smartWizard.min.js')}}"></script>
		<script type="text/javascript">
			$(document).ready(function(){ 
				var btnFinish = $('<button></button>').text('Finish')
				.addClass('btn btn-finish btn-info')
				.on('click', function(){
				 
					if(window.confirm('Are you Sure You want to complete Application?')){
						$.get('{{url('job')}}/complete',function(data){

					if(data.status=='success'){
						window.location='{{url('job')}}/profile?id={{Auth::user()->id}}';
						return;
						}
						return toastr.error(data.message);

						});
					} 
				}); 


       // Smart Wizard
       $('#smartwizard').smartWizard({
       	selected: 0,
       	theme: 'dots',
       	transitionEffect:'fade',
       	toolbarSettings: {toolbarPosition: 'bottom',
       	toolbarExtraButtons: [btnFinish]
       },
       anchorSettings: {
                                markDoneStep: true, // add done css
                                markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                                removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
                                enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
                            }
                        });

       $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
       	var elmForm = $("#form-step-" + stepNumber);
       	if(stepNumber==0){
       		return stepOne();
       	}
       	if(stepNumber == 4){
       		$('.btn-finish').removeClass('hide');
       	}else{
       		$('.btn-finish').addClass('hide');
       	}
                // stepDirection === 'forward' :- this condition allows to do the form validation
                // only on forward navigation, that makes easy navigation on backwards still do the validation when going next

                return true;
            });

       $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
                // Enable finish button only on last step
                if(stepNumber == 4){
                	$('.btn-finish').removeClass('hide');
                }else{
                	$('.btn-finish').addClass('hide');
                }
            });

   });




</script>
@endsection