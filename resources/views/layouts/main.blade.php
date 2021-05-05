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
		<title>Job List</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		<style type="text/css">

    body{
      /*font-weight: bold !important;*/
      color: #000 !important;
      font-size: 16px !important;
    }


    .dropdown-item:hover, .dropdown-item:focus {
        background-color:#444 !important;
        color: #fff !important;
    }



    .modal{
        padding-right: 17px;display: block;background-color: rgba(0,0,0,0.4);
    }
/*8b72fb*/




			.bold{
				font-weight: bold;
			}

			.hide{
				display: none;
			}

			.section-gap{
				    padding: 0px 0 !important;
			}

      *{
        font-size: 13px;
      }


	#toast-container>.toast-error{
		background-color: red;
	}

		</style>
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="/css/linearicons.css">
			<link rel="stylesheet" href="/css/font-awesome.min.css">
			<link rel="stylesheet" href="/css/bootstrap.css">
			<link rel="stylesheet" href="/css/magnific-popup.css">
			<link rel="stylesheet" href="/css/nice-select.css">
			<link rel="stylesheet" href="/css/animate.min.css">
			<link rel="stylesheet" href="/css/owl.carousel.css">
			<link rel="stylesheet" href="/css/main.css">

        <link rel="stylesheet" type="text/css" href="/assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css">
  <link href="/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="/assets/plugins/toastr/toastr.min.css" rel="stylesheet">
			<!-- Include SmartWizard CSS -->
<link href="/dist/css/smart_wizard.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="/dist/css/select2.min.css" />

<!-- Optional SmartWizard theme -->
<link href="/dist/css/smart_wizard_theme_circles.css" rel="stylesheet" type="text/css" />
<link href="/dist/css/smart_wizard_theme_arrows.css" rel="stylesheet" type="text/css" />
<link href="/dist/css/smart_wizard_theme_dots.css" rel="stylesheet" type="text/css" />

<link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css" href="/css/sb-admin-2.min.css" />

<link rel="stylesheet" type="text/css" href="/jquery-ui/jquery-ui.theme.min.css" />


<link rel="stylesheet" href="{{ asset('select2/select2.min.css') }}" />

{{--TailWindCss--}}
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">


<script>

    function observable(vl){

        var listeners = [];
        var old = vl;


        function runListeners(vl){
            listeners.forEach(function(value,key){
                value(vl);
            });
        }


        return {

            listen:function(cb){

                listeners.push(cb);

            },
            set:function(vl){

                if (vl == ''){
                    vl = 'N/A';
                }

                if (old != vl){


                    old = vl;

                    // alert(old);

                    runListeners(vl);
                }

            },
            get:function(){
                return old;
            }

        };

    }


    function observableArray(arr){
        var listeners = [];
        var old = JSON.stringify(arr);
        var list_ = [];


        function notify(arr){
            listeners.forEach(function(value,key){

                value.garbage();

                list_.forEach(function(value1,key1){
                    value.loop(value1,arr);
                });


            });
        }



        return {

            append: function(obj){
                list_.push(obj);
                notify(list_);
            },
            set: function(arr){
                list_ = arr;
                notify(list_);
            },
            listen: function(cb,cbg){
                listeners.push({
                    garbage:cbg,
                    loop:cb
                });
            },
            get: function(){
                return list_;
            }


        };

    }
</script>


<style type="text/css">
 .p1-gradient-bg, .banner-area .overlay-bg, .sidebar .single-slidebar .cat-list li:hover, .callto-action-area, .single-price:hover .price-bottom, .single-service:hover, .submit-right, .submit-left, .contact-btns, .form-area .primary-btn {

     /*background-color: #aaa !important;*/
     background-image: none;

 }


/*
Common
*/

.toast-success{
  background-color: green;
}


.wizard,
.tabcontrol
{
display: block;
width: 100%;
overflow: hidden;
}
.wizard a,
.tabcontrol a
{
outline: 0;
}
.wizard ul,
.tabcontrol ul
{
list-style: none !important;
padding: 0;
margin: 0;
}
.wizard ul > li,
.tabcontrol ul > li
{
display: block;
padding: 0;
}
/* Accessibility */
.wizard > .steps .current-info,
.tabcontrol > .steps .current-info
{
position: absolute;
left: -999em;
}
.wizard > .content > .title,
.tabcontrol > .content > .title
{
position: absolute;
left: -999em;
}
/*
Wizard
*/
.wizard > .steps
{
position: relative;
display: block;
width: 100%;
}
.wizard.vertical > .steps
{
display: inline;
float: left;
width: 30%;
}
.wizard > .steps .number
{
font-size: 1.429em;
}
.wizard > .steps > ul > li
{
width: 25%;
}
.wizard > .steps > ul > li,
.wizard > .actions > ul > li
{
float: left;
}
.wizard.vertical > .steps > ul > li
{
float: none;
width: 100%;
}
.wizard > .steps a,
.wizard > .steps a:hover,
.wizard > .steps a:active
{
display: block;
width: auto;
margin: 0 0.5em 0.5em;
padding: 1em 1em;
text-decoration: none;
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
}
.wizard > .steps .disabled a,
.wizard > .steps .disabled a:hover,
.wizard > .steps .disabled a:active
{
background: #eee;
color: #aaa;
cursor: default;
}
.wizard > .steps .current a,
.wizard > .steps .current a:hover,
.wizard > .steps .current a:active
{
background: #2184be;
color: #fff;
cursor: default;
}
.wizard > .steps .done a,
.wizard > .steps .done a:hover,
.wizard > .steps .done a:active
{
background: #9dc8e2;
color: #fff;
}
.wizard > .steps .error a,
.wizard > .steps .error a:hover,
.wizard > .steps .error a:active
{
background: #ff3111;
color: #fff;
}
.wizard > .content
{
background: #eee;
display: block;
margin: 0.5em;
min-height: 27em;
overflow: hidden;
position: relative;
width: auto;
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
}
.wizard.vertical > .content
{
display: inline;
float: left;
margin: 0 2.5% 0.5em 2.5%;
width: 65%;
}
.wizard > .content > .body
{
float: left;
position: absolute;
width: 95%;
height: 95%;
padding: 2.5%;
}
.wizard > .content > .body ul
{
list-style: disc !important;
}
.wizard > .content > .body ul > li
{
display: list-item;
}
.wizard > .content > .body > iframe
{
border: 0 none;
width: 100%;
height: 100%;
}
.wizard > .content > .body input
{
display: block;
border: 1px solid #ccc;
}
.wizard > .content > .body input[type="checkbox"]
{
display: inline-block;
}
.wizard > .content > .body input.error
{
background: rgb(251, 227, 228);
border: 1px solid #fbc2c4;
color: #8a1f11;
}
.wizard > .content > .body label
{
display: inline-block;
margin-bottom: 0.5em;
}
.wizard > .content > .body label.error
{
color: #8a1f11;
display: inline-block;
margin-left: 1.5em;
}
.wizard > .actions
{
position: relative;
display: block;
text-align: right;
width: 100%;
}
.wizard.vertical > .actions
{
display: inline;
float: right;
margin: 0 2.5%;
width: 95%;
}
.wizard > .actions > ul
{
display: inline-block;
text-align: right;
}
.wizard > .actions > ul > li
{
margin: 0 0.5em;
}
.wizard.vertical > .actions > ul > li
{
margin: 0 0 0 1em;
}
.wizard > .actions a,
.wizard > .actions a:hover,
.wizard > .actions a:active
{
background: #2184be;
color: #fff;
display: block;
padding: 0.5em 1em;
text-decoration: none;
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
}
.wizard > .actions .disabled a,
.wizard > .actions .disabled a:hover,
.wizard > .actions .disabled a:active
{
background: #eee;
color: #aaa;
}
.wizard > .loading
{
}
.wizard > .loading .spinner
{
}
/*
Tabcontrol
*/
.tabcontrol > .steps
{
position: relative;
display: block;
width: 100%;
}
.tabcontrol > .steps > ul
{
position: relative;
margin: 6px 0 0 0;
top: 1px;
z-index: 1;
}
.tabcontrol > .steps > ul > li
{
float: left;
margin: 5px 2px 0 0;
padding: 1px;
-webkit-border-top-left-radius: 5px;
-webkit-border-top-right-radius: 5px;
-moz-border-radius-topleft: 5px;
-moz-border-radius-topright: 5px;
border-top-left-radius: 5px;
border-top-right-radius: 5px;
}
.tabcontrol > .steps > ul > li:hover
{
background: #edecec;
border: 1px solid #bbb;
padding: 0;
}
.tabcontrol > .steps > ul > li.current
{
background: #fff;
border: 1px solid #bbb;
border-bottom: 0 none;
padding: 0 0 1px 0;
margin-top: 0;
}
.tabcontrol > .steps > ul > li > a
{
color: #5f5f5f;
display: inline-block;
border: 0 none;
margin: 0;
padding: 10px 30px;
text-decoration: none;
}
.tabcontrol > .steps > ul > li > a:hover
{
text-decoration: none;
}
.tabcontrol > .steps > ul > li.current > a
{
padding: 15px 30px 10px 30px;
}
.tabcontrol > .content
{
position: relative;
display: inline-block;
width: 100%;
height: 27em;
overflow: hidden;
border-top: 1px solid #bbb;
padding-top: 20px;
}
.tabcontrol > .content > .body
{
float: left;
position: absolute;
width: 95%;
height: 95%;
padding: 2.5%;
}
.tabcontrol > .content > .body ul
{
list-style: disc !important;
}
.tabcontrol > .content > .body ul > li
{
display: list-item;
}







</style>



<style>

    .cv-title{
        font-size: 16px;
        font-weight: bold;
        text-decoration: underline;
        margin-bottom: 19px;
        margin-top: 19px;
        color: #ff9836;
    }

    .cv-input{

        border: 1px solid #bbb;
        padding: 5px;
        border-radius: 2px;
        font-size: 13px;
        color: #000;

    }

    .cv-label{
        color: #000;font-size: 13px;margin-top: 5px;
    }

    .cv-button{
        /*margin-top: 17px;padding: 9px;width: 23%;border-radius: 0;font-size: 18px;*/
    }

	.card{
		padding: 14px;
		background-color: #fff;
		margin-bottom: 20px;
	}



	.t-overflow {
		max-height: 60px;
		position: relative;
		overflow: hidden;
	}
	.t-overflow .read-more {
		position: absolute;
		top: 22px;
		bottom: 0;
		left: 0;
		width: 100%;
		text-align: center;
		margin: 0;
		padding: 22px 0;
		background-image: linear-gradient(to bottom, transparent, #fff);
	}

	ol,ul{
		list-style: disc;
		padding-left: 35px;
	}


	.h2,h2{
		font-size: 17px !important;
	}


 </style>


<script src="/js/vendor/jquery-2.2.4.min.js"></script>

<script type="text/javascript" src="/jquery-ui/jquery-ui.min.js"></script>

<script type="text/javascript" src="/dist/js/select2.full.min.js"></script>

<script type="text/javascript" src="/js/jb-search.js"></script>

<script type="text/javascript">

    var Ajax = {};

    (function(ajx){


    function callAPI(config){ //data,api,success,error
        config.data._token = '{{csrf_token()}}';
        $.ajax({
           url:config.api,
           type:config.type,
           data:config.data,
           success:function(response){
             config.success(response,function(msg){
              toastr.success(msg);
             });
           },
           error:function(error){
             config.error(response,function(msg){
              toastr.error(msg);
             });
           }

        });


    }



     ajx.post = (function(){

        return function(config){
            config.type = 'POST';
            callAPI(config);

        };

     })();


     ajx.delete = (function(){

        return function(config){
            config.type = 'POST';
            config.data._method = 'DELETE';
            callAPI(config);

        };

     })();


     ajx.patch = (function(){

        return function(config){
            config.type = 'POST';
            config.data._method = 'PATCH';
            callAPI(config);

        };

     })();


     ajx.put = (function(){

        return function(config){
            config.type = 'POST';
            config.data._method = 'PUT';
            callAPI(config);

        };

     })();





    })(Ajax);



    var JQ = {};



    (function(jq_){

         var listeners = [];

         jq_.add = function(cb){
            listeners.push(cb);
         };


         jq_.resolve = function(){
             listeners.forEach(function(v,k){
                  //console.log(v,k);
                 v();
             });
         }

    })(JQ);

    // function callAPI(config){ //data,api,success,error
    //     config.data._token = '{{csrf_token()}}';
    //     $.ajax({
    //        url:config.api,
    //        type:'post',
    //        data:config.data,
    //        success:function(response){
    //          config.success(response,function(msg){
    //           toastr.success(msg);
    //          });
    //        },
    //        error:function(error){
    //          config.error(response,function(msg){
    //           toastr.error(msg);
    //          });
    //        }
    //     });
    // }


    // console.log(123);


  </script>





		@livewireStyles

</head>



		<body style="@yield('body-style','')">


<style type="text/css">

  /*@media (min-width: 992px){*/
    /*.container {*/
      /*max-width: 855px !important;*/
    /*}*/
  /*}*/


  @media (min-width: 992px){
	  .container {
		  max-width: 977px !important;
	  }
  }


  .nav-menu a {
      color: #000;
      font-weight: 600;
  }


</style>

			  <header id="header" id="home" style="background-color: #fff;border-bottom: 1px solid #eee;">
                  {{--#100a46--}}
			    <div class="container">

			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="/"><img style="height: 42px;" src="{{ asset('logo.svg') }}" alt="" title="" /></a>
				      </div>
{{--						snap-logo.png--}}
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
                          <li class="menu-active"><a href="/">Home</a></li>

                          <li class="nav-item">
                            <a class="nav-link" href="https://snapnet.com.ng/">Snapnet</a>
                          </li>

                            {{--#fe3230--}}
                  <li class="menu-active"><a href="/" style="color: #bd1622 ;font-weight: bold;">Jobs Listing</a></li>

<!--                     <li class="nav-item">

                    <a class="nav-link" href="">Company Recruit</a>

                    </li>
 -->

                   @guest
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                      @if (Route::has('register'))
                       <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      @endif
                    </li>
                   @else


                    <li class="nav-item">

                    <a class="nav-link" href="{{ route('user.dashboard') }}">Dashboard</a>

                    </li>

                    @auth

                     @if (Auth::user()->role == 'admin')


                    <li class="nav-item">

                    <a class="nav-link" href="{{ route('app.run',['get-applicants']) }}">Talent Pool</a>

                    </li>

						 {{--//job-create--}}

					<li class="nav-item">
						<a class="nav-link" href="{{ route('job.index') }}?js_trigger=job-create">Post Job</a>
					</li>


                     @endif


                    @endauth


					@if (Auth::user()->candidate()->exists())
						<li class="nav-item">
							<a class="nav-link" href="{{ route('app.get',['my-applications']) }}">My Jobs</a>
						</li>
					@endif





<!--                   <li>
                     <a href="#" data-toggle="modal" data-target="#addjobs">Add Job</a>
                  </li>
 -->

                  <li><a  href="" onclick="event.preventDefault();document.getElementById('logout-form22').submit();">
                     Logout
                        </a>
                  </li>

              <form id="logout-form22" action="{{ route('logout') }}" method="POST" style="display: none;">
                     @csrf
               </form>


			     @if ($hasPermission('r_a_n'))
					<li>
						@if (app()->make(\App\Packages\BooleanPort::class)->notificationIsActive(Auth::user()->id))
							<form style="display: inline-block;background-color: transparent;position: relative;top: 7px;" action="{{ route('process.action',['disable-notification']) }}" method="post">
								@csrf
								<button  title="Disable Notification" style="
    background-color: transparent;
    border: 0;
">
									{{--Notification--}}
									<i class="fas fa-bell" style="font-size: 19px;color: #4ee843;"></i>
								</button>
							</form>
						@else
							<form style="display: inline-block;background-color: transparent;position: relative;top: 7px;" action="{{ route('process.action',['enable-notification']) }}" method="post">
								@csrf
								<button  title="Enable Notification" style="
    background-color: transparent;
    border: 0;
">
									{{--Notification--}}
									<i class="fas fa-bell" style="font-size: 19px;color: #748473;"></i>
								</button>
							</form>
						@endif
					</li>
			     @endif

<!--                  <li>

                  <a class="ticker-btn"  data-toggle="modal" data-target="#approveReject" href="javascript::void()"  onclick="sessionStorage.setItem('checkid',0)">

                    Approve  Selected

                  </a>

                </li>
 -->

                   @endguest

				        </ul>
				      </nav><!-- #nav-menu-container -->
			    	</div>
			    </div>
			  </header><!-- #header -->


<!-- Start callto-action Area -->

			<!-- End calto-action Area -->

<section style="padding-bottom: 80px;background-color: #202020;background-image: none;" class="banner-area relative" id="home">

  <!-- <div class="overlay overlay-bg"></div> -->

<!--   <div class="container">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="about-content col-lg-12" style="padding: 76px 0px !important;">
        <h1 class="text-white">
          Search Your Jobs Here
        </h1>
      </div>
    </div>
  </div>
 -->
</section>

<section class="post-area section-gap" style="min-height: 373px;">
  <div class="" style="margin:20px;">
    <div class="row justify-content-center d-flex">


        @auth

        @include('sidebars.admin_sidebar')

        @endauth


      @yield('content')


    </div>
  </div>

  </section>

			<!-- start footer Area -->
      <br />

       <footer class="footer-area section-gap" style="background-color: #100a46;">
				<div class="container">

					<div class="row footer-bottom d-flex justify-content-between">

						<p class="col-lg-12 col-sm-12 footer-text m-0 text-white" style="padding-bottom: 15px;">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved

                            <span style="float: right;">
                                Powered by <img src="{{ asset('logo.png') }}" alt="">
                            </span>

<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>

					</div>
				</div>
			</footer>
			<!-- End footer Area -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>

			<script src="{{ asset('js/popper.min.js') }}" ></script>
			<script src="/js/vendor/bootstrap.min.js"></script>
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="/js/easing.min.js"></script>
			<script src="/js/hoverIntent.js"></script>
			<script src="/js/superfish.min.js"></script>
			<script src="/js/jquery.ajaxchimp.min.js"></script>
			<script src="/js/jquery.magnific-popup.min.js"></script>
			<script src="/js/owl.carousel.min.js"></script>
			<script src="/js/jquery.sticky.js"></script>
			<script src="/js/jquery.nice-select.min.js"></script>
			<script src="/js/parallax.min.js"></script>
			<script src="/js/mail-script.js"></script>
			  <script src="/assets/plugins/toastr/toastr.min.js"></script>

        <script type="text/javascript" src="/assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
        <script type="text/javascript" src="/assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
			<script src="/js/main.js"></script>

        <script src="/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" crossorigin="anonymous"></script>

  <script src="{{ asset('js/jquery.steps.min.js') }}"></script>

  <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

  <script src="{{ asset('select2/select2.min.js') }}"></script>


   @include('js.js')

   @include('stages.configure')

   @include('stages.manage')


  @yield('script')

  <script>


     (function($){


         $(function(){
            JQ.resolve();
         });

         $('[data-editor]').each(function(){
             var $el = $(this).get(0);
             CKEDITOR.replace($el);
		 });

     })(jQuery);

  </script>



 <script type="text/javascript">
    /**
              $("#checkAll").change(function () {
                          $("input:checkbox").prop('checked', $(this).prop("checked"));
                        });
    **/


    (function($){
      $(function(){


         $('[data-value]').each(function(){
          var vl = $(this).data('value');
          $(this).val(vl);
         });


         // setTimeout(function(){

             $('[data-s2]').each(function(){
                 $(this).select2({
                     tags:true
                 });
             });

		 // },1000);

          function gatherCheckedIds(){
              var r = [];
              $('[data-check-id]').each(function(){
                  if ($(this).is(':checked')){
                   r.push($(this).data('check-id'));
                  }
              });
              return r.join(',');
          }

          $('[data-check-all]').each(function(){



              $(this).on('change',function(){

                  var $el = $(this);

                  $('[data-check-id]').each(function(){
                      $(this).trigger('click');
                      $(this).on('change',function(){
                          $el.attr('checked_ids',gatherCheckedIds());
                      });
                  });

                  $(this).attr('checked_ids',gatherCheckedIds());

              });

          });



         // $('[data-target]=#approveReject').each(function(){
         //  $(this).parent().find('form').on('submit',function(){
         //    return confirm('Do You want to confirm this action?');
         //  });
         // });



         @if (session()->has('message'))


        	@if (session()->has('error') && session()->get('error'))

        		toastr.error('{{ session()->get('message') }}');

            @else

        		toastr.success('{{ session()->get('message') }}');

            @endif
         @else

         @endif


		 @if ($errors->any())

				@foreach ($errors->all() as $error)

				  toastr.error('{{ $error }}');

				@endforeach

		  @endif

      });
    })(jQuery);

</script>


  <script>

/**
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
**/


(function($){
    $(function(){

        @if (request()->filled('js_trigger'))

			 $('#' + '{{ request()->get('js_trigger') }}').trigger('click');

		@endif

	});
})(jQuery);

  </script>

<style>
	@media (min-width: 992px) {
		.container {
			max-width: 1040px !important;
		}
	}

</style>


		@livewireScripts


       <script>

           Livewire.on('toast_notify',function(data){

               data.error = data.error || false;

               if (data.error){
                   toastr.error(data.message);
               }

               if (!data.error){
                   toastr.success(data.message);
               }

           });

       </script>


  </body>
</html>
