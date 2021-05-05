@extends('layouts.main')

@extends('layouts.logged_user')

@section('body-style')
    background-color: #eee;
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
    color: black;
    font-weight: bold;
">
    Upload Your C.V and Continue application {!! (session()->has('jobName'))? '<br />(Currently applying for <b style="color: #000;font-size: 18px;">' . session()->get('jobName') . '</b>)' : '' !!}
</div>


@include('notifications.message')


 <style type="text/css">
     .cv label{
        font-weight: bold;
     }
 </style>


  {{-- <div id="wizard"></div> --}}

 <script>

     JQ.add(function(){


        //$("#wizard").steps();


     });

 </script>

 {{--route('candidate.store')--}}
<form method="post" action="{{ route('process.action',['candidate-create']) }}" enctype="multipart/form-data">

 @csrf
 @method('POST')

<div class="card" style="
     /*padding: 10px;*/
     /*background-color: #eee;*/
    ">

{{-- start --}}


<div id="wizard">

        <h1 class="cv-title">Your BIO</h1>
        <div class="row">


            <div class="col-md-6">
                <div>
                    <label class="cv-label">Full Name</label>
                </div>
                <div>
                    <input type="text" name="name" class="form-control cv-input" value="{{ Auth::user()->name }}" readonly />
                </div>
            </div>

            <div class="col-md-6">
                <div>
                    <label class="cv-label">E-mail</label>
                </div>
                <div>
                    <input type="email" name="email" class="form-control cv-input" value="{{ Auth::user()->email }}" readonly />
                </div>
            </div>


             <div class="col-md-6">
                 <div>
                     <label class="cv-label">Age</label>
                 </div>
                 <div>
                     <input type="number" name="age" class="form-control cv-input" value="{{ Auth::user()->age }}" />
                 </div>
             </div>

             <div class="col-md-6">
                 <div>
                     <label class="cv-label">Gender</label>
                 </div>
                 <div>
                     <select class="form-control cv-input" name="gender">
                         <option value="">--Select Gender--</option>
                         <option value="male">Male</option>
                         <option value="female">Female</option>
                     </select>
                 </div>
             </div>



              <div class="col-md-6">
                  <div>
                      <label class="cv-label">Marital Status</label>
                  </div>
                  <div>
                      <select class="form-control cv-input" name="marital_status">
                          <option value="">--Select Marital Status--</option>
                          <option value="single">Single</option>
                          <option value="married">Married</option>
                      </select>
                  </div>
              </div>


             <div class="col-md-6">
                 <div>
                     <label class="cv-label">Select Discipline</label>
                 </div>
                 <div>
                     <select class="form-control cv-input" name="jb_discipline_id">
                         <option value="">--Select Discipline--</option>
                         @foreach ($list as $item)
                             <option value="{{ $item->id }}">{{ $item->name }}</option>
                         @endforeach

                     </select>
                 </div>
             </div>



        </div>

        <h1 class="cv-title">Contact Information
            {{--<i class="fas fa-arrow-down"></i>--}}
        </h1>


       <div class="row">
           <div class="col-md-6">

               <div>
                   <label class="cv-label">Phone Number</label>
               </div>
               <div>
                   <input type="text" name="phone_number" class="form-control cv-input" value="{{ Auth::user()->phone_num }}" />
               </div>

           </div>

           <div class="col-md-6">
               <div>
                   <label class="cv-label">Address</label>
               </div>
               <div>
                   <input type="text" name="address" class="form-control"  value="{{ Auth::user()->address }}" />
               </div>
           </div>
       </div>



        <h1 class="cv-title">Upload CV</h1>
        <div>


                <div>
                        <label class="cv-label">Cover Letter</label>
                    </div>
                    <div>
                        <textarea data-editor class="form-control cv-input" name="cover_letter"></textarea>
                    </div>






                    <div>
                        <label class="cv-label">Upload C.V</label>
                    </div>

                    <div>
                        <input type="file" name="cv_upload" class="form-control" required />
                    </div>

            <div>
                <label class="cv-label">Upload Profile Photo</label>
            </div>

            <div>
                <input type="file" name="profile_photo" class="form-control"  required />
            </div>


            @if ($requires_video)

            <div>
                <label class="cv-label">Upload a 2 minute Video CV
                    <span style="color: #fe3c38;">(Recommended Max 2Mb)*</span>
                </label>
            </div>

            <div>
                <input {{ $requires_video? ' required ':'' }} type="file" name="profile_video" class="form-control"  />
            </div>

            @endif



                    <div align="right">
                            <button class="btn btn-success cv-button" style="margin-top: 15px;">Submit</button>
                    </div>

        </div>

 </div>




{{-- stop  --}}



</div>
</form>



        </div>
    </div>
    
    
    {{--@include('candidate_document.index')--}}

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
