	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="" />
		<!-- Meta Keyword -->
		<meta name="keywords" content="" />
		<!-- meta character set -->
		<meta charset="UTF-8" />
		<!-- Site Title -->
		<title>@yield('title')</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
		<style type="text/css">

			.bold{
				font-weight: bold;
			}

			.hide{
				display: none;
			}

			.section-gap{
				    padding: 0px 0 !important;
			}

		</style>
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="{{asset('css/linearicons.css')}}">
			<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
			<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
			<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
			<link rel="stylesheet" href="{{asset('css/nice-select.css')}}">					
			<link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
			<link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
			<link rel="stylesheet" href="{{asset('css/main.css')}}">

        <link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}">
  <link href="{{asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/plugins/toastr/toastr.min.css')}}" rel="stylesheet">
			@yield('css')
		</head>
		<body>

			  <header id="header" id="home">
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="index.html"><img src="img/logo.png" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="/">Home</a></li>
				             @if(!Auth::guest() && Auth::user()->role==0)
									       
				          <li><a href="{{url('job')}}/profile?id={{Auth::user()->id}}">Profile</a></li>
				          <li><a href="{{url('job')}}/jobAppliedFor?user_id={{Auth::user()->id}}">Job Applied For</a></li>
				          @endif
				          @if(Auth::guest())
				          <li><a   href="{{route('register')}}"  >Signup</a></li>
				          <li><a  href="{{route('login')}}"  >Login</a></li>	
				          @else
				          <li><a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form22').submit();">Logout
                               </a>
                            </li>
								<form id="logout-form22" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                </form>
				          @endif
				          @if(!Auth::guest() && Auth::user()->role==3)
									       
				          <li><a  href="#" data-toggle="modal" data-target="#addjobs">Add Position</a></li>	
				          @if(Request::is('job/viewApplicant'))
				           <li><a class="ticker-btn"  data-toggle="modal" data-target="#approveReject" href="javascript::void()"  onclick="sessionStorage.setItem('checkid',0)">Approve Selected</a></li>
				           @endif
				          	  @endif  			          				          
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->

			 @yield('content') 
<!-- Start callto-action Area -->
		 		
			<!-- End calto-action Area -->			
		
			<!-- start footer Area -->		<br>
			@if(Request::is('password/reset')) <br><br><br> @endif
			<footer class="footer-area section-gap">
				<div class="container">
					
					<div class="row footer-bottom d-flex justify-content-between">
						<p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved 
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
						
					</div>
				</div>
			</footer>
			<!-- End footer Area -->		

			<script src="{{asset('js/vendor/jquery-2.2.4.min.js')}}"></script>
			<script src="{{asset('js/popper.min.js')}}" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="{{asset('js/vendor/bootstrap.min.js')}}"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="{{asset('js/easing.min.js')}}"></script>			
			<script src="{{asset('js/hoverIntent.js')}}"></script>
			<script src="{{asset('js/superfish.min.js')}}"></script>	
			<script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>
			<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>	
			<script src="{{asset('js/owl.carousel.min.js')}}"></script>			
			<script src="{{asset('js/jquery.sticky.js')}}"></script>
			<script src="{{asset('js/jquery.nice-select.min.js')}}"></script>			
			<script src="{{asset('js/parallax.min.js')}}"></script>		
			<script src="{{asset('js/mail-script.js')}}"></script>	
			  <script src="{{asset('assets/plugins/toastr/toastr.min.js')}}"></script>

        <script type="text/javascript" src="{{asset('assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}"></script>
			<script src="{{asset('js/main.js')}}"></script>

        <script src="{{asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>

        <script type="text/javascript">
        	$(function(){
        		@if(session()->has('login'))
  			  	$('#loginModal').modal('show');	
  			  	@endif

				  $("#checkAll").change(function () {
                      $("input:checkbox").prop('checked', $(this).prop("checked"));
                    });

        		$('.applicantProfileLink').click(function(e){
					e.preventDefault();
					console.log($(this).attr('href'));
					$('#applicantProfile').load($(this).attr('href'));
				})
        				@if(session()->has('message'))
									 
								toastr.error('{{session('message')}}');
									 
									@endif
        		   $('.datepicker').datepicker({
				        format: "yyyy-mm-dd",
				        autoclose: true
				     });

   				$('.datepicker2').datepicker({
				        format: "yyyy",
				        autoclose: true,
				          viewMode: "years",
    					 minViewMode: "years"
				     });

                    try{
                      $('.wysiwyg').wysihtml5();
                    }catch(exception){
                       console.log(exception);
                    }

        	 });

        	function checkempty(value){
    	   		if(value==''){
    	   			return toastr.info('Some field(s) are empty');
    	   		}
    	   		return 0;
    	   	}
    	    function checkOwn($id){
    	    	// alert('d');
    	    	sessionStorage.setItem('checkid',$id);
    	    	$('#'+$id).trigger('click');
    	    }
    	    function unCheck(){
    	     
    	    	$('#'+sessionStorage.getItem('checkid')).trigger('click');
    	    
    	    }
     function processPost(formData,route,type=0){
    	   	$.post('{{url('/')}}/'+route,formData,function(data,status,xhr){

    	 		if(data.status=='success'){
    	 			toastr.success(data.message);
    	 			 
    	 				 window.location.reload();
    	 		 
    	 			return true;
    	 		}

    	 		toastr.error(data.message);
    	 		return false;
    	 	})
    	   	}

     function resolvetype($type){
     	if($type==1){
     		return 'Apprroved';
     	}
     	return 'Rejected';
     }

   	function decideApplicant($type){

   		    $ids=$('.decision:checked').map(function() {return this.value;}).get();
		        if($ids.length<=0){
		          return toastr.error('No Applicant selected');
				}
				if($('#messsage').val()==''){
					return 'Please Specify '+resolvetype($type)+' message';
				}

			formData={
				ids:$ids,
				_token:'{{csrf_token()}}',
				message:$('#messsage').val(),
				type:'decideApplicant',
				status:$type
			}

			$.post('{{url('job')}}',formData,function(data,status,xhr){

				if(data.status=='success'){
					
					toastr.success(data.message);
					window.location.reload();
					return; 
				}
				return toastr.error(data.message);
			})

   	}

   	function sendEMail(){
   		$ids=$('.decision:checked').map(function() {return this.value;}).get();
   		if($ids.length<=0){
   			return toastr.error('No Applicant selected');
   		}
   		if($('#messsageMail').val()==''){
   			return 'Please Enter Message to Send';
   		}
   	formData={
				ids:$ids,
				_token:'{{csrf_token()}}',
				message:$('#messsageMail').val(),
				type:'mailApplicant'
				 
			}

			$.post('{{url('job')}}',formData,function(data,status,xhr){

				if(data.status=='success'){
					
					toastr.success(data.message);
					unCheck();
					 $('.modal').modal('hide');
					return; 
				}
				return toastr.error(data.message);
			})
   	}

 function editListing(jobid){
 	$.get('{{url('job')}}/apply?job_id='+jobid,function(data,status,xhr){
 

 		$(".titleText").val(data.message.title);
 		$('.job_desc').val(data.message.job_desc);
 		$('.job_ref').val(data.message.job_ref);
 		$('.min_sal').val(data.message.min_sal);
 		$('.max_sal').val(data.message.max_sal);
 		$('.required_exp').val(data.message.required_exp);
 		$('.min_exp').val(data.message.min_exp);
 		$('.max_exp').val(data.message.max_exp);
 		$('.level_id').val(data.message.level_id);
 		$('.location_id').val(data.message.location_id);
 		$('.qualification').val(data.message.qualification);
 		$('.date_expire').val(data.message.date_expire);
 		$('.otherskill').val(data.message.otherskill);
 		$('.jobid').val(data.message.id);
 		$('#addjobs').modal('show'); 
 	});

 }


   function setDescription(desc){
    	  	$('#genericdesc').html(desc);
  }
        </script>
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">		
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" crossorigin="anonymous"></script>
 
  <script>
   $( function() {
    $("#slider").slider({
    	change: function( event, ui ) {
    		console.log('changed',ui);
    		//percentage-progress
    		$('#percentage-progress').html(ui.value + ' % ');
    	}
    });
    console.log('called.');
   });
  </script>

		@yield('script')
  
  </body>

</html>





