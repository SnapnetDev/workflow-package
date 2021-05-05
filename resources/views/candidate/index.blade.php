@extends('layouts.main')

@extends('layouts.logged_user')

@section('inner-content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
                <!-- <div class="card-header">{{ __('Change Password') }}</div> -->



                    {{--<span style="--}}
    {{--text-decoration: none;--}}
    {{--color: #fff;--}}
    {{--font-size: 15px;--}}
    {{--position: relative;--}}
    {{--top: -3px;--}}
    {{--left: -19px;--}}
    {{--display: inline-block;--}}
    {{--background-color: red;--}}
    {{--border-radius: 13px;--}}
    {{--padding: 3px;--}}
    {{--font-weight: bold;--}}
    {{--padding-right: 7px;--}}
    {{--padding-left: 5px;--}}
{{--">Demo</span>                    --}}


                    {{--<span style="--}}
                    {{--text-decoration: none;--}}
                    {{--color: #fff;--}}
                    {{--font-size: 15px;--}}
                    {{--position: relative;--}}
                    {{--top: -3px;--}}
                    {{--left: -19px;--}}
                    {{--display: inline-block;--}}
                    {{--background-color: red;--}}
                    {{--border-radius: 13px;--}}
                    {{--padding: 3px;--}}
                    {{--font-weight: bold;--}}
                    {{--padding-right: 7px;--}}
                    {{--padding-left: 5px;--}}
                    {{--">Demo</span>                    --}}




@include('notifications.message')


@if (!$hasCv)

<div style="
    border-bottom: 3px solid #8c76f7;
    margin-bottom: 17px;
    font-size: 18px;
">
    My C.V
</div>

<div class="col-md-12" align="right">
    <a href="{{ route('job.index') }}" class="btn btn-primary btn-sm">Back</a>
</div>

<div class="col-md-12" align="right">
    @if ($hasCv)
    <a href="" class="btn btn-primary btn-sm" style="margin-bottom: 11px;">Update C.V</a>
    @else
    <a href="/my-cv/{{Auth::user()->id}}/add" class="btn btn-primary btn-sm" style="margin-bottom: 11px;">Upload C.V</a>
    @endif
</div> 
 
 <style type="text/css">
     .cv label{
        font-weight: bold;
     }
 </style>

<div class="cv" style="
    padding: 10px;
    border: 3px dashed #aaa;
    box-shadow: 2px 2px #999;">
    
    <div>
        <label style="color: #000;">Full Name</label>
    </div>
    <div>
        XXXXXXXXXXX
    </div>


    <div>
        <label>E-mail</label>
    </div>
    <div>
        XXXXXXXXXXX
    </div>


    <div>
        <label>Phone Number</label>
    </div>
    <div>
        XXXXXXXXXXX
    </div>


    <div>
        <label>Address</label>
    </div>
    <div>
        XXXXXXXXXXX
    </div>



    <div>
        <label>Date Of Birth</label>
    </div>
    <div>
        XXXXXXXXXXX
    </div>



    <div>
        <label>Gender</label>
    </div>
    <div>
        XXXXXXXXXXX
    </div>



    <div>
        <label>Marital Status</label>
    </div>
    <div>
        XXXXXXXXXXX
    </div>



</div>
@else
 @include('candidate.edit')
@endif


                
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


@endsection
