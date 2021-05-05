@extends('layouts.main')

@extends('layouts.logged_user')

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
    Applicants
</div>

@include('notifications.message')

 
<!-- <div class="col-md-12">
    <label>
      Keywords Search
    </label>

    <input type="text" name="" placeholder="Keywords" style="padding-left: 7px;" />

</div> 
 -->
<span id="outlet" style="display: block;min-height: 300px;">
  

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

        loadAjaxTable("{{ route('job.applicants.pool.ajax') }}");


    });
  })(jQuery);
</script>

@endsection


@section('side-bar')
 <span id="right-tool-bar" style="">
 @include('job.job_filter')
 </span>
@endsection

@section('main-center-style')
 ''
@endsection
