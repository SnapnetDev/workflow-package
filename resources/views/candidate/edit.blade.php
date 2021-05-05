@extends('layouts.main')

@extends('layouts.logged_user')

@section('body-style')
    background-color: #eee;
@endsection

@section('inner-content')

<div style="
    border-bottom: 3px solid #8c76f7;
    margin-bottom: 17px;
    font-size: 18px;
">
    Update Your C.V {!! (session()->has('jobName'))? '<br />(Currently applying for <b style="color: #000;font-size: 18px;">' . session()->get('jobName') . '</b>)' : '' !!}
</div>



 <style type="text/css">
     .cv label{
        font-weight: bold;
     }
 </style>
 
 



 <script>

     JQ.add(function(){


        //$("#wizard").steps();


     });

 </script>


<form method="post" action="{{ route('process.action',['candidate-update']) }}" enctype="multipart/form-data">
 @csrf
 <input type="hidden" name="id" value="{{ $data->id }}"/>
<div class="cv" style="
    /*padding: 10px;*/
    background-color: #e9ecef;
    ">

    <!-- jb_recruitment_type_id -->


<!-- jb_competency_id -->


<!-- years_of_experience -->
@include('notifications.message')


<div class="card">

        <h1 class="cv-title">Your BIO</h1>
        <div>


            <div class="row">

                <div class="col-md-6">

                    <div>
                        <label class="cv-label">Full Name</label>
                    </div>
                    <div>
                        <input type="text" name="name" class="form-control cv-input" value="{{$data->name}}" />
                    </div>


                    <div>
                        <label class="cv-label">E-mail</label>
                    </div>
                    <div>
                        <input type="email" name="email" class="form-control cv-input" value="{{$data->email}}" />
                    </div>


                </div>


                <div class="col-md-6">

                    <div>
                        <label class="cv-label">Age</label>
                    </div>
                    <div>
                        <input type="number" name="age" class="form-control cv-input" value="{{$data->age}}" />
                    </div>



                    <div>
                        <label class="cv-label">Gender</label>
                    </div>
                    <div>
                        <select class="form-control cv-input" name="gender" data-value="{{$data->gender}}">
                            <option value="">--Select Gender--</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>


                </div>

            </div>


            <h1 class="cv-title">Profile</h1>


            <div class="row">

                <div class="col-md-6">

                    <div>
                        <label class="cv-label">Select Discipline</label>
                    </div>
                    <div>
                        <select class="form-control cv-input" name="jb_discipline_id" data-value="{{ $data->jb_discipline_id }}">
                            <option value="">--Select Discipline--</option>
                            @foreach ($discipline as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach

                        </select>
                    </div>


                </div>

                <div class="col-md-6">
                    <div>
                        <label class="cv-label">Phone Number</label>
                    </div>
                    <div>
                        <input type="text" name="phone_number" class="form-control cv-input" value="{{$data->phone_number}}" />
                    </div>
                </div>

                <div class="col-md-12">
                    <div>
                        <label class="cv-label">Address</label>
                    </div>
                    <div>
                        <input type="text" name="address" class="form-control cv-input" value="{{$data->address}}" />
                    </div>
                </div>

                <div class="col-md-12">

                    <div>
                        <label class="cv-label">Cover Letter</label>
                    </div>
                    <div>
                        <textarea data-editor style="height: 33px;" class="form-control cv-input" name="cover_letter">{{$data->cover_letter}}</textarea>
                    </div>


                    @if (!empty($data->cv_upload))
                        <a style="
    margin-top: 10px;
    display: inline-block;
    margin-bottom: 3px;
    font-weight: bold;
    font-size: 14px;
" href="{{ asset('uploads/' . $data->cv_upload) }}">Download CV</a>
                    @endif


                    <div>
                        <label class="cv-label">Upload C.V</label>
                    </div>


                    <div>
                        {{--accept="application/pdf"--}}
                        <input  type="file" name="cv_upload"  class="form-control" title="( CV-Uploaded {{strlen($data->cv_string)}} characters.)" />
                    </div>
                    
                    
                    @if (!empty($data->profile_photo))
                        <img  src="{{ asset('uploads/' . $data->profile_photo) }}" alt="" style="width: 128px;margin-top: 17px;margin-bottom: 5px;border-radius: 12px;" />
                    @endif

                    <div>
                        <label class="cv-label">Upload Profile Photo</label>
                    </div>

                    <div>
                        <input type="file" name="profile_photo" class="form-control"  />
                    </div>


                    <div>
                    @if (!empty($data->profile_video))
                        <video controls  src="{{ asset('uploads/' . $data->profile_video) }}" alt="" style="width: 128px;margin-top: 17px;margin-bottom: 5px;border-radius: 12px;" />
                    @endif
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


                </div>

            </div>






                            {{-- <div>
                                <label>Marital Status</label>
                            </div>
                            <div>
                                <select class="form-control" name="marital_status" data-value="{{$candidate->marital_status}}">
                                    <option value="">--Select Marital Status--</option>
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                </select>
                            </div> --}}





        </div>


        {{--<h1 class="cv-title">Upload CV</h1>--}}

        <div>



                    <div align="right">
                            <button style="margin-top: 17px;" class="btn btn-success cv-button">Save</button>
                    </div>

        </div>

 </div>













</div>
</form>

@include('candidate_document.index')

<div style="clear: both;">&nbsp;</div>

<!-- candidate education -->
@include('candidate_education.index')

<!-- candidate skill -->
@include('candidate_skill.index')

<!-- candidate certification -->
{{--@include('candidate_certification.index')--}}


<!-- candidate workexperience -->
@include('candidate_work_experience.index')


@endsection

