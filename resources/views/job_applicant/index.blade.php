@extends('layouts.main')

@extends('layouts.logged_user')

@section('side-bar')

 @include('job_applicant.job_filter')
 
@endsection

@section('main-center-style')
 ''
@endsection

@section('inner-content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
                <!-- <div class="card-header">{{ __('Change Password') }}</div> -->

<div style="
    border-bottom: 3px solid #8c76f7;
    margin-bottom: 17px;
    font-size: 18px;
">
    Jobs Applicants ({{$job->role}})
</div>

@include('notifications.message')

<div class="col-md-12" align="right">
    <a href="/jobs" class="btn btn-primary btn-sm" style="margin-bottom: 11px;">Back</a>
</div>
 

<span id="outlet">
	

</span>
                
        </div>
    </div>

<div class="col-lg-12" style="margin: 11.4%;"></div>
</div>


<!-- dialog -->
<div class="modal fade modal-3d-slit show" id="profileView" aria-labelledby="exampleModalTitle" role="dialog" style="display: none; padding-right: 17px;">

  <div class="modal-dialog modal-lg">



  <!-- [end] -->
  </div>
</div>
<!-- dialog -->


<script type="text/javascript">
	// /view-applicants/{job}/ajax
	(function($){
		$(function(){
         
          function loadAjaxTable(config){
           $('#outlet').html('Loading ... '); 	
           $.ajax({
           	url:'/view-applicants/{{$job->id}}/ajax',
           	type:'get',
           	success:function(response){
               $('#outlet').html(response);  
           	}
           });
          }

          loadAjaxTable({});

		});
	})(jQuery);
</script>

@endsection
